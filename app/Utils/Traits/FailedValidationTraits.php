<?php

namespace App\Utils\Traits;

use App\Http\Response\BaseResponse;
use App\Utils\constant\BaseResponseUtil;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidationTraits
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(BaseResponse::error(BaseResponseUtil::FAILED_VALIDATION, null, $validator->errors()->getMessageBag()));
    }
}
