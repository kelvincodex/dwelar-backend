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
        Schema::create('email_notifications', function (Blueprint $table) {
            $table->id("emailNotificationId");
            $table->foreignUuid("userId")->constrained("users", "userId");
            $table->boolean("purchase")->nullable();
            $table->boolean("ordered")->nullable();
            $table->boolean("bookmark")->nullable();
            $table->boolean("visit")->nullable();
            $table->enum("status", ['active', 'inActive'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_notifications');
    }
};
