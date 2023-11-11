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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid("userId")->primary();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('countryCurrency')->nullable();
            $table->string('referralUserId')->nullable();
            $table->enum('userType', ['agent', 'user'])->default('user');
            $table->string('email')->unique()->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('otpExpiredAt')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('isAdmin')->default(false);
            $table->string('password')->nullable();
            $table->enum('status', ['pending', 'active', 'inActive', 'suspended'])->default("pending");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
