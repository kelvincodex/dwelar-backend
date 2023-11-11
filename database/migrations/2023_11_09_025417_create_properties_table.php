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
        Schema::create('properties', function (Blueprint $table) {
            $table->id("propertyId");
            $table->foreignUuid("userId")->constrained("users", "userId");
            $table->foreignId("subCategoryId")->constrained("sub_categories", "subCategoryId");
            $table->foreignId("categoryId")->constrained("categories", "categoryId");
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("location")->nullable();
            $table->string("desc")->nullable();
            $table->string("about")->nullable();
            $table->double("rating")->nullable();
            $table->double("amount")->nullable();
            $table->double("discountRate")->nullable();
            $table->double("discountPrice")->nullable();
            $table->enum("status", ['active', 'inActive', 'paid'])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
