<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageCarouselImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_carousel_images', function (Blueprint $table) {
            $table->id();
            $table->integer('home_page_id');
            $table->string('image');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->boolean('active')->nullable();
            $table->integer('position')->nullable();
            $table->string('text_colour')->default('#fff')->nullable();
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
        Schema::dropIfExists('home_page_carousel_images');
    }
}
