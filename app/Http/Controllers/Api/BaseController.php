<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result = [], $message)
    {
    	$response = [
            'status' => true,
            'message' => $message,
            'data'    => $result,
        ];


        return response()->json($response, 200);
        // return json_encode($response,200);
    }


    /**
     * success with out data
     */
    public function successResponse($message = null){
        $success = [
            'status' => true,
            'message' => $message,

        ];

        return response()->json($success, 200);
    }
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    /**
     * convert error from array to string.
     *
     * @return sreting.
     */
    public function convertErrorsToString($errorArray)
    {
        $valArr = array();
        foreach ($errorArray->toArray() as $key => $value) {
            $errStr = $key.' '.$value[0];
            //return $errStr;
            array_push($valArr, $errStr);
        }
        // if(!empty($valArr)){
        //     $errStrFinal = implode(',', $valArr);
        // }
        return $this->sendError('Validation Error', $valArr);

    }


}
