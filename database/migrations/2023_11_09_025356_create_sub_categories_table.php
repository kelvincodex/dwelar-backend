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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id("subCategoryId");
            $table->foreignId("categoryId")->constrained("categories", "categoryId");
            $table->string("title")->nullable();
            $table->string("iconLink")->nullable();
            $table->string("desc")->nullable();
            $table->enum("status", ['active', 'inActive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
