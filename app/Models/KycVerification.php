<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycVerification extends Model
{
    use HasFactory;

    protected $primaryKey ="kycVerificationId";
    protected $table ="kyc_verifications";

    protected $fillable =[
        "userId",
        "bvn",
        "dob",
        "firstName",
        "lastName",
        "phoneNumber",
        "status",
    ];
}
