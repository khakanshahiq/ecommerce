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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->longText('description');
            $table->string('image');
            $table->foreignId('category_id')->nullable()->default(1);
            $table->foreignId('sub_category_id')->nullable()->default(1);
            $table->string('quantity');
            $table->string('selling_price');
            $table->string('discount_price');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
