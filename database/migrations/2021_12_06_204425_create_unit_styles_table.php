<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_styles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('model');
            $table->unsignedInteger('minimum_width');
            $table->unsignedInteger('maximum_width');
            $table->unsignedInteger('minimum_height');
            $table->unsignedInteger('maximum_height');
            $table->unsignedInteger('minimum_depth');
            $table->unsignedInteger('maximum_depth');
            $table->boolean('can_have_partitions');
            $table->unsignedTinyInteger('minimum_partitions')->nullable();
            $table->unsignedTinyInteger('maximum_partitions')->nullable();
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
        Schema::dropIfExists('unit_styles');
    }
}
