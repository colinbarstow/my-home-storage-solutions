<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_title');
            $table->boolean('show_featured_items');
            $table->boolean('show_daily_special');
            $table->boolean('show_subscribe_to_newsletter');
            $table->boolean('show_best_sellers');
            $table->boolean('show_blog');
            $table->boolean('show_instagram');
            $table->boolean('show_parallax');
            $table->boolean('show_latest');
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
        Schema::dropIfExists('home_pages');
    }
}
