<?php

namespace App\Http\Controllers\Api;

use App\Events\SendNotitficationEvent;
use App\Http\Resources\NotificationsResourse;
use App\Http\Resources\TransactionDataResource;
use App\Http\Resources\TransactionResource;
use App\Models\FCMNotification;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends BaseController
{
    //
    public function allTransactions(Request $request)
    {
        $user = Auth::guard('api')->user();
        $transactions = Transaction::where('user_id','=', $user->id)->orderBy('id', 'DESC');

        if (!empty($request->get("year_id"))) {
            $transactions->whereHas('month', function ($query) use ($request) {
                $query->where('year_id', '=', $request->get("year_id"));
            });
        }

        $transactions = $transactions->get();
        $transactions->account_no=$user->bank_account;

        if ($transactions->count()>0) {
            return $this->sendResponse(TransactionResource::collection($transactions), 'كل المعاملات المالية');
        } else {
            return $this->sendResponse(TransactionResource::collection($transactions),'لا يوجد معاملات حتى الان');
        }

    }

    public function singleTransactions($id){

        //send notifications envent

        $data =[
            'user_id' => 1,
            'title_en' => 'been',
            'title_en' => 'You have been accepted as instructor',
            'body_en' => 'ttttttttttt',
            'body_ar' => 'You',
       ];
       FCMNotification::Create($data);

       broadcast(new SendNotitficationEvent($data))->toOthers();

       //end notifcations code

        $row=Transaction::where('id','=',$id)->first();
        $details=Transaction_detail::where('transaction_id',$id)->first();
        if($details){
            return $this->sendResponse(new TransactionDataResource($details), 'بيانات المعاملة');
        }else{
            return $this->sendError('حدث خطأ لا توجد معاملة ');
        }


    }

    public function listNofications(Request $request)
    {
        $user_id=auth()->user()->id;
        $notifications=FCMNotification::where('user_id',$user_id)->orderBy('id','desc')->limit(10)->get();

        return NotificationsResourse::collection($notifications);

    }

    public function updateNotifications(Request $request)
    {
        $user_id=auth()->user()->id;

        FCMNotification::where('user_id',$user_id)->update(['status'=>'seen']);

        return $this->successResponse();

    }
}
