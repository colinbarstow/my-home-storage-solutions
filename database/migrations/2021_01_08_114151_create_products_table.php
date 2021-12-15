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
            $table->bigInteger('product_category_id');
            $table->bigInteger('shipping_id');
            $table->string('title');
            $table->string('slug');
            $table->string('meta_description');
            $table->longText('description');
            $table->text('short_description');
            $table->text('additional');
            $table->bigInteger('price');
            $table->bigInteger('sale_price')->nullable();
            $table->boolean('active');
            $table->boolean('featured');
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
