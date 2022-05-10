<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\FCMNotification;
use App\Models\Month;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\User;
use App\Models\User_payrol_rule;
use App\Models\Year;
use App\Services\FCMService;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Transaction $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.transaction.';
        $this->routeName = 'transaction.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = Year::where('year', now()->year)->first();
        $rows = [];
        if ($year) {
            $rows = Month::where('year_id', $year->id)->orderBy("created_at", "Desc")->get();

        }
        $years = Year::all();
        return view($this->viewName . 'index', compact('rows', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $months = Month::all();
        $users = User::all();

        return view($this->viewName . 'add', compact('months', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try
        {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // save transactions && details
            $users = User_payrol_rule::all();
            // dd([$users,$request->get('month_id')]);
            foreach ($users as $user) {
                $transaction = new Transaction();
                $transaction->transaction_date = Carbon::now();
                $transaction->user_id = $user->user_id;
                $transaction->month_id = $request->get('month_id');
                $transaction->payroll_status = 2;
                $transaction->revision_status = 0;
                $transaction->save();
                // details
                $details = new Transaction_detail();
                $details->transaction_id = $transaction->id;
                $details->basic_salary = $user->basic_salary;
                $details->settlements = $user->settlements;
                $details->allowances = $user->allowances;
                $details->taxes = $user->taxes;
                $details->insurance = $user->insurance;
                $details->save();

            }
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // Display a successful message ...
            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Exception$e) {
            DB::rollback();
            return redirect()->route($this->routeName . 'index')->with($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Month::where('id', '=', $id)->first();
        $transactions = Transaction::where('month_id', $id)->get();
        return view($this->viewName . 'veiw', compact('row', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Transaction::where('id', '=', $id)->first();
        $months = Month::all();
        $users = User::all();
        return view($this->viewName . 'edit', compact('row', 'months', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token', 'transaction_date']);

        $input['transaction_date'] = Carbon::parse($request->get('transaction_date'));
        Transaction::findOrFail($id)->update($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Transaction::where('id', $id)->first();
        // Delete File ..

        try {

            $row->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

            // return redirect()->back()->with('flash_danger', 'هذه القضية مربوطه بجدول اخر ..لا يمكن المسح');
        }
    }

    public function yearData(Request $request)
    {

        $rows = [];

        if (!empty($request->get("value"))) {
            $rows = Month::where('year_id', $request->get("value"))->orderBy("created_at", "Desc")->get();

        }
        return view($this->viewName . 'preIndex', compact('rows'))->render();
    }

    public function updateDetails(Request $request)
    {
        try {
            $pay = Transaction_detail::where('transaction_id', $request->get("transaction_id"))->first();
            $pay->basic_salary = $request->get('basic_salary');
            $pay->settlements = $request->get('settlements');
            $pay->allowances = $request->get('allowances');
            $pay->taxes = $request->get('taxes');
            $pay->insurance = $request->get('insurance');
            $pay->update();
            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم تعديل بيانات المستخدم بنجاح');

        } catch (\Exception$e) {
            return redirect()->route($this->routeName . 'index')->with('flash_success', $e->getMessage());

            // return redirect()->route($this->routeName . 'index')->with('flash_danger', 'خطأ ...  !!!');
        }
    }

    public function sendNotification(Request $request)
    {

        try
        {
            $users = User_payrol_rule::pluck('user_id');

            $ids=Transaction::whereIN('user_id', $users)->where('month_id', $request->get('month_id'))->get();
            foreach ($ids as $trans) {

                // $transaction = Transaction::where('user_id', $user->user_id)->where('month_id', $request->get('month_id'))->first();
                if ($trans) {
                    $trans->revision_status = 1;
                    $trans->update();
                    // details
                    $details = Transaction_detail::where('transaction_id', $trans->id)->first();
                    $total = ($details->net_salary + $details->settlements + $details->allowances) - ($details->taxes + $details->insurance);

                    $data = [
                        'title_ar' => 'تم إضافه دفعة ماليه جديده',
                        'body_ar' => $details->net_salary ,
                        'title_en' => 'A new payment has been added',
                        'body_en' =>$details->net_salary ,
                        'status' => 'not_seen',
                    ];


                    FCMService::send(
                        $trans->user->fcm_token,
                        [
                            'title' => 'your title',
                            'body' => 'your body',
                        ],
                        [
                          'message' => 'Extra Notification Data'
                        ],
                    );




                    //save f_c_m notification table
                    FCMNotification::create([
                        'title_ar' => 'تم إضافه دفعة ماليه جديده',
                        'body_ar' => $details->net_salary,
                        'title_en' => 'A new payment has been added',
                        'body_en' => $details->net_salary,
                        'status' => 'not_seen',
                        'user_id' => $trans->user_id,
                    ]);



                }



                else {
                    return redirect()->route($this->routeName . 'index')->with('حدث خطأ');
                }
            }


             //test sabreen
      //fcm notify
      $tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
dd($tokens);
      try
      {
           //test sabreen

           $SERVER_API_KEY = 'AAAA3TCDdrE:APA91bHborGVe-kYXv2ILUlYmCJj9_6g8dz08QidlYQc9i_xGCUUo0IDRoxaiLRyWVrgvfv3J3GwYBJe2ietTenT5IQBf7619j29fHDNzzdXK22jzXSVSkcT09vf0U4yBbL4afNRLZDH';

           $data = [
               "registration_ids" => [$tokens],
               "notification" => [
                   "title" => 'hello',
                   "body" => 'kamal',
               ]
           ];
           $dataString = json_encode($data);

           $headers = [
               'Authorization: key=' . $SERVER_API_KEY,
               'Content-Type: application/json',
           ];

           $ch = curl_init();

           curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

           $response = curl_exec($ch);

           dd($response);

      } catch (\Exception$e) {
          // DB::rollback();
          return redirect()->route($this->routeName . 'index')->with($e->getMessage());
      }

  }
             //end test

            // Display a successful message ...
            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Exception$e) {
            // DB::rollback();
            return redirect()->route($this->routeName . 'index')->with($e->getMessage());
        }

        // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        // $firebaseToken = Device::whereNotNull('token')->pluck('token')->all();

        // $SERVER_API_KEY = 'XXXXXX';

        // $data = [
        //     "registration_ids" => $firebaseToken,
        //     "notification" => [
        //         "title" => $request->title,
        //         "body" => $request->body,
        //     ],
        // ];
        // $dataString = json_encode($data);

        // $headers = [
        //     'Authorization: key=' . $SERVER_API_KEY,
        //     'Content-Type: application/json',
        // ];

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        // $response = curl_exec($ch);

        // dd($response);
    }


    public function testNotification(Request $request)
    {

        try
        {
             //test sabreen

             $SERVER_API_KEY = 'AAAA3TCDdrE:APA91bHborGVe-kYXv2ILUlYmCJj9_6g8dz08QidlYQc9i_xGCUUo0IDRoxaiLRyWVrgvfv3J3GwYBJe2ietTenT5IQBf7619j29fHDNzzdXK22jzXSVSkcT09vf0U4yBbL4afNRLZDH';

             $data = [
                 "registration_ids" => ['fBaYISNeTXu_6M4EaJENK3:APA91bGtSha69KBCxymqTA1WClklasmzhhwxDySjaTM0kgQel_Ng1-i7CS0O3jztz3TCpJcqHIyqdURa3XcOm0J65OjDupTJNI5BNGIfAde1re5-mDz81JUGchBcWTIpQ64Eas55_iFu'],
                 "notification" => [
                     "title" => 'hello',
                     "body" => 'kamal',
                 ]
             ];
             $dataString = json_encode($data);

             $headers = [
                 'Authorization: key=' . $SERVER_API_KEY,
                 'Content-Type: application/json',
             ];

             $ch = curl_init();

             curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
             curl_setopt($ch, CURLOPT_POST, true);
             curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

             $response = curl_exec($ch);

             dd($response);

        } catch (\Exception$e) {
            // DB::rollback();
            return redirect()->route($this->routeName . 'index')->with($e->getMessage());
        }

    }
}
