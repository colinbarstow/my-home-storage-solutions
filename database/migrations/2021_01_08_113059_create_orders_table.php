<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('billing_address_id');
            $table->bigInteger('shipping_address_id');
            $table->integer('status');
            $table->integer('deposit');
            $table->integer('total');
            $table->integer('delivery');
            $table->dateTime('payment_request')->nullable();
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->bigInteger('quantity');
            $table->longText('attributes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_product');
    }
}
