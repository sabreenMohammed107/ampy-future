<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TransactionDataResource;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends BaseController
{
    //
    public function allTransactions(Request $request)
    {
        $user = Auth::user();
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
            return $this->successResponse('لا يوجد معاملات حتى الان');
        }

    }

    public function singleTransactions($id){
        $row=Transaction::where('id','=',$id)->first();
        $details=Transaction_detail::where('transaction_id',$id)->first();
        if($details){
            return $this->sendResponse(new TransactionDataResource($details), 'بيانات المعاملة');
        }else{
            return $this->sendError('حدث خطأ لا توجد معاملة ');
        }


    }
}
