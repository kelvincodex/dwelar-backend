<?php

namespace App\Http\Resources\Api\V1\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompleteEnrollmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "userId"=>$this->userId,
            "firstName"=>$this->firstName,
            "phoneNumber"=>$this->phoneNumber,
            "countryCode"=>$this->countryCode,
            "countryCurrency"=>$this->countryCurrency,
            "userType"=>$this->userType,
            "email"=>$this->email,
            "verified"=>$this->verified,
            "status"=>$this->status,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
        ];
    }
}
