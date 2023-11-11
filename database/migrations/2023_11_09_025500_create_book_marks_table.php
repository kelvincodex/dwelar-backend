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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id("bookmarkId");
            $table->foreignUuid("userId")->constrained("users", "userId");
            $table->foreignId("propertyId")->constrained("properties", "propertyId");
            $table->enum("status", ['active', 'inActive'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_marks');
    }
};
