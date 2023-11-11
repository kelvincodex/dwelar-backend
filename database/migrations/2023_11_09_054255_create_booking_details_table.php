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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id("bookingDetailId");
            $table->foreignId("bookingId")->constrained('bookings', 'bookingId');
            $table->string("fullName")->nullable();
            $table->string("email")->nullable();
            $table->string("phoneNumber")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("location")->nullable();
            $table->enum("status", ['active', 'inActive'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
