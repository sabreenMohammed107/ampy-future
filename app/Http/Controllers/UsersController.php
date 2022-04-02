<?php

namespace App\Http\Controllers;

// use App\Models\Branch;

use App\Models\Company;
use App\Models\User;
// use Spatie\Permission\Models\Role;
use App\Models\User_payrol_rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // This is for General Class Variables.
    protected $model;
    protected $view;
    protected $route;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $model)
    {
        $this->middleware('auth');

        $this->model = $model;
        $this->view = 'admin.users.';
        $this->route = 'users.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model::where('emp_status',1)->get();

        return view($this->view . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companies = Company::pluck('name_ar', 'id')->all();
        return view($this->view . 'add', compact('companies'));
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
            $input = $request->all();
            $input['password'] = \Hash::make($input['password']);
            $input['company_id'] = $request->input('company');
            if ($request->hasFile('image')) {
                $attach_image = $request->file('image');

                $input['image'] = $this->UplaodImage($attach_image);
            }
            $user = $this->model::create($input);
//user payroll
            // $pay = new User_payrol_rule();
            // $pay->user_id = $user->id;
            // $pay->save();

            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // Display a successful message ...
            return redirect()->route($this->route . 'index')->with('flash_success', 'تم إنشاء المستخدم بنجاح');

        } catch (\Exception$e) {
            DB::rollback();

            return redirect()->route($this->route . 'index')->with('flash_danger', 'خطأ ...  !!!');
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
        $row = $this->model::findOrFail($id);

        $row->update(['register_approved'=>1]);

        // Display a successful message ...
        return redirect()->route('emps.index')->with('flash_success', 'تم تعديل بيانات المستخدم بنجاح');
    }

    public function userFinance(Request $request)
    {
        try {
            $pay = User_payrol_rule::where('user_id', $request->get('user_id'))->first();
            $pay->basic_salary = $request->get('basic_salary');
            $pay->settlements = $request->get('settlements');
            $pay->allowances = $request->get('allowances');
            $pay->taxes = $request->get('taxes');
            $pay->insurance = $request->get('insurance');
            $pay->update();
            return redirect()->back()->with('flash_success', 'تم تعديل بيانات المستخدم بنجاح');

        } catch (\Exception$e) {
            return redirect()->back()->with('flash_danger', 'خطأ ...  !!!');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->model::findOrFail($id);
        $user->password = null;
        $companies = Company::pluck('name_ar', 'id')->all();

        return view($this->view . 'edit', compact('user', 'companies'));

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

        try {

            $input = $request->all();
            if ($input['password'] != null) {
                $input['password'] = \Hash::make($input['password']);
            } else {
                unset($input['password']);
            }

            $input['company_id'] = $request->input('company');
            if ($request->hasFile('image')) {
                $attach_image = $request->file('image');

                $input['image'] = $this->UplaodImage($attach_image);
            }
            $user = $this->model::findOrFail($id);
            $user->update($input);

            // Display a successful message ...
            return redirect()->route($this->route . 'index')->with('flash_success', 'تم تعديل بيانات المستخدم بنجاح');

        } catch (\Exception$e) {
            return redirect()->route($this->route . 'index')->with('flash_danger', 'خطأ ...  !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $account = $this->model::findOrFail($id);
            $account->delete();

            // Display a successful message ...
            return redirect()->route($this->route . 'index')->with('flash_success', 'تم حذف بيانات المستخدم بنجاح');
        } catch (\Illuminate\Database\QueryException$e) {
            // Display a successful message ...
            return redirect()->route($this->route . 'index')->with('flash_danger', 'خطأ ... لا يمكن الحذف حتي لا تتأثر البيانات الأخري بعملية الحذف !!!');
        }
    }

    /* uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/users');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
