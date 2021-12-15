<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParallaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parallaxes', function (Blueprint $table) {
            $table->id();
            $table->integer('home_page_id');
            $table->string('image');
            $table->string('pre_title')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('link')->nullable();
            $table->string('button_text')->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('parallaxes');
    }
}
