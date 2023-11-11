<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Utils\constant\UserTypeUtil;
use App\Utils\Traits\FailedValidationTraits;
use Illuminate\Foundation\Http\FormRequest;

class InitiateEnrollmentRequest extends FormRequest
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
        $userType = [UserTypeUtil::USER->value, UserTypeUtil::AGENT->value, UserTypeUtil::ADMIN->value];
        return [
            "firstName"=>['required', 'string', 'max:255'],
            "lastName"=>['required', 'string', 'max:255'],
            "phoneNumber"=>['required', 'string', 'max:255'],
            "countryCode"=>['required', 'string', 'max:5'],
            "countryCurrency"=>['required', 'string', 'max:10'],
            "userType"=>['required', 'string', 'in:'. implode(',', $userType)],
            "email"=>['required', 'email', 'max:255', 'unique:users'],
            "password"=>['required', 'string', 'max:12', 'min:6'],
            "retypePassword"=>['required', 'same:password'],
        ];
    }
}
