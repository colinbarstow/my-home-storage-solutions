<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_id');
            $table->dateTime('scheduled');
            $table->bigInteger('total_users');
            $table->longText('body');
            $table->string('subject');
            $table->boolean('posted');
            $table->timestamps();
        });

        Schema::create('campaign_marketing_list', function (Blueprint $table) {
            $table->bigInteger('campaign_id');
            $table->bigInteger('marketing_list_id');

            $table->unique(['campaign_id', 'marketing_list_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('campaign_marketing_list');
    }
}
