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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id("bookingId");
            $table->foreignUuid("userId")->constrained("users", "userId");
            $table->foreignId("paymentId")->constrained("payments", "paymentId");
            $table->double("subtotal")->nullable();
            $table->double("total")->nullable();
            $table->double("vat")->nullable();
            $table->string("recipient")->nullable();
            $table->enum("status", ['confirmed', 'pending'])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
