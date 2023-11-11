<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Utils\constant\UserTypeUtil;
use App\Utils\Traits\FailedValidationTraits;
use Illuminate\Foundation\Http\FormRequest;

class CompleteEnrollmentRequest extends FormRequest
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
            "otp"=>['required', 'string', 'max:5'],
            "userId"=>['required', 'string'],
        ];
    }
}
