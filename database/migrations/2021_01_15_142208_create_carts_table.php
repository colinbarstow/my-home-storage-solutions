<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('discount_code_id')->nullable();
            $table->timestamps();
        });

        Schema::create('cart_product', function (Blueprint $table) {
            $table->bigInteger('cart_id');
            $table->bigInteger('product_id');
            $table->bigInteger('quantity');
            $table->longText('atts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_product');
    }
}
