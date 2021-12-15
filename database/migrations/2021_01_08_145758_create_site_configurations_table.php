<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('favicon');
            $table->string('website_name');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('contact_form_email');
            $table->text('address');
            $table->text('measurement');
            $table->integer('deposit');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->boolean('show_banner');
            $table->text('banner_message');
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
        Schema::dropIfExists('site_configurations');
    }
}
