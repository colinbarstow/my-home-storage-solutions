<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->integer('amount');
            $table->string('type');
            $table->integer('status');
            $table->string('stripe_charge_id')->nullable();
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('stripe_payment_method_id')->nullable();
            $table->integer('refunded')->nullable();
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
        Schema::dropIfExists('order_payments');
    }
}
