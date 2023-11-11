<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kyc_verifications', function (Blueprint $table) {
            $table->id("kycVerificationId");
            $table->foreignUuid("userId")->constrained("users", "userId");
            $table->string("bvn")->nullable();
            $table->string("dob")->nullable();
            $table->string("firstName")->nullable();
            $table->string("lastName")->nullable();
            $table->string("phoneNumber")->nullable();
            $table->string("reference")->nullable();
            $table->enum("status", ['active', 'inActive'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_verifications');
    }
};
