<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\aboutUsResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\Policy_itemResource;
use App\Models\Company;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Policy_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ContactController extends BaseController
{
    public function getContact(Request $request)
    {
        if(Auth::guard('api')->check()){
            $company = Company::where('id', '=', 1)->first();
            if ($company) {
                return $this->sendResponse(new CompanyResource($company), ' __("links.companyData")');
            } else {
                return $this->sendError(' __("links.companyDataError")');
            }
        }else{
            return $this->authCheck(' __("links.checkLog")');

        }



    }

    public function getFaq(Request $request)
    {
        if(Auth::guard('api')->check()){
            $faqs = Faq::all();
            return $this->sendResponse(FaqResource::collection($faqs), ' __("links.faq")');
        }else{
            return $this->authCheck(' __("links.checkLog")');

        }



    }

    public function getPolicy(Request $request)
    {

            $policy = Policy_item::all();
            return $this->sendResponse(Policy_itemResource::collection($policy), ' __("links.policy")');




    }
    public function aboutUs(Request $request)
    {
        if(Auth::guard('api')->check()){
            $company = Company::where('id', '=', 1)->first();
            if ($company) {
                return $this->sendResponse(new aboutUsResource($company), ' __("links.companyData")');
            } else {
                return $this->sendError(' __("links.companyDataError") ');
            }
        }else{
            return $this->authCheck(' __("links.checkLog")');

        }



    }
    public function suggest(Request $request)
    {
        if(Auth::guard('api')->check()){
            $userid = Auth::user()->id;

            $validator = Validator::make($request->all(), [
                'subject' => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->convertErrorsToString($validator->messages());
            }
            try {
                $data = [
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'user_id' => $userid,
                    'suggest_date' => Carbon::now(),
                ];
                Message::create($data);
                return $this->successResponse(' __("links.sendSuccess")');

            } catch (\Exception$ex) {
                return $this->sendError($ex->getMessage(), ' __("links.sendError")');
            }


        }else{
            return $this->authCheck(' __("links.checkLog")');

        }

    }
}
