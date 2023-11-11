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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id("profileId");
            $table->foreignUuid("userId")->constrained("users", "userId");
            $table->string("image")->nullable();
            $table->string("location")->nullable();
            $table->string("dob")->nullable();
            $table->string("gender")->nullable();
            $table->string("homeAddress")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("facebook")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->enum("status", ['active', 'inActive'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
