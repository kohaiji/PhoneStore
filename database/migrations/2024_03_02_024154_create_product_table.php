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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->integer("price");
            $table->string("description");
            $table->string("image");
            $table->integer("stock");
            $table->string("isbn_code");
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("publisher_id")->nullable();
            $table->unsignedBigInteger("author_id")->nullable();
            $table->foreign("category_id")->references("id")->on("category");
            $table->foreign("publisher_id")->references("id")->on("publisher");
            $table->foreign("author_id")->references("id")->on("author");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
