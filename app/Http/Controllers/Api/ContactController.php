<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\aboutUsResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\Policy_itemResource;
use App\Models\Company;
use App\Models\Faq;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ContactController extends BaseController
{
    public function getContact(Request $request)
    {
        $company = Company::where('id', '=', 1)->first();
        if ($company) {
            return $this->sendResponse(new CompanyResource($company), 'بيانات الشركة');
        } else {
            return $this->sendError('حدث خطأ فى بيانات الشركة ');
        }

    }

    public function getFaq(Request $request)
    {
        $faqs = Faq::all();
        return $this->sendResponse(FaqResource::collection($faqs), 'الاشئلة والاجابة');

    }

    public function getPolicy(Request $request)
    {
        $policy = Faq::all();
        return $this->sendResponse(Policy_itemResource::collection($policy), 'البنود والشروط');

    }
    public function aboutUs(Request $request)
    {
        $company = Company::where('id', '=', 1)->first();
        if ($company) {
            return $this->sendResponse(new aboutUsResource($company), 'بيانات الشركة');
        } else {
            return $this->sendError('حدث خطأ فى بيانات الشركة ');
        }

    }
    public function suggest(Request $request)
    {
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
            return $this->successResponse('تم الاسال بنجاح');

        } catch (\Exception$ex) {
            return $this->sendError($ex->getMessage(), 'حدث خطا فى ارسال الرساله!!');
        }

    }
}
