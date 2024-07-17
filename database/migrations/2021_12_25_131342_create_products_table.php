<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->unique()->nullable();
            $table->string('sku')->nullable();
            $table->string('upc')->nullable();
            $table->string('ean')->nullable();
            $table->string('c_39')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_type')->nullable();
            $table->string('category')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
