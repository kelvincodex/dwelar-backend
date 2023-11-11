<?php

namespace App\Http\Requests\Api\V1\KycVerification;

use App\Utils\constant\UserTypeUtil;
use App\Utils\Traits\FailedValidationTraits;
use Illuminate\Foundation\Http\FormRequest;

class KycVerificationRequest extends FormRequest
{
    use FailedValidationTraits;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "userId"=>['required', 'string'],
            "bvn"=>['required', 'string', 'max:255'],
            "dob"=>['required', 'string', 'max:255'],
            "firstName"=>['required', 'string', 'max:255'],
            "lastName"=>['required', 'string', 'max:255'],
            "phoneNumber"=>['required', 'string', 'max:255'],
        ];
    }
}
