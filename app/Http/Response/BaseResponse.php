<?php

namespace App\Http\Response;

class BaseResponse
{
    static function success($responseCode,?string $responseMessage=null,?object $responseData=null){
        return response()->json([
            "responseCode"=>$responseCode,
            "responseMessage"=>$responseMessage,
            "responseData"=>$responseData,
        ]);
    }

    static function error($responseCode, ?string $responseMessage=null,?object $responseData=null){
        return response()->json([
            "responseCode"=>$responseCode,
            "responseMessage"=>$responseMessage,
            "responseData"=>$responseData,
        ]);
    }
}
