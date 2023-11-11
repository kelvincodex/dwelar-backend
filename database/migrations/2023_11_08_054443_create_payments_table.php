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
        Schema::create('payments', function (Blueprint $table) {
            $table->id("paymentId");
            $table->foreignUuid("userId")->constrained('users', 'userId');
            $table->double("amount")->nullable();
            $table->double("transactionFee")->nullable();
            $table->enum("paymentType", ['account', 'card', 'bank', 'usdt'])->default('account');
            $table->enum("transactionType", ['transfer', 'withdraw', 'none'])->default('none');
            $table->enum("status", ['active', 'inActive', 'paid'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
