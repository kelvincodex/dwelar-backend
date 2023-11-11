<?php

namespace App\Http\Requests\Api\V1\User;

use App\Utils\Traits\FailedValidationTraits;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            "firstName"=>['required', 'string', 'max:255'],
            "lastName"=>['required', 'string', 'max:255'],
            "userType"=>['required', 'string', 'max:20'],
            "email"=>['required', 'email', 'max:255', 'unique:users'],
        ];
    }


}
