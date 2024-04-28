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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->double('unit_price');
            $table->integer('quantity');
            $table->double('total_price');

            //fk:productId
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('store_id')->references('id')->on('stores')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
