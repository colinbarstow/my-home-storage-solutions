<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartitionRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partition_rules', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('unit_style_id');
            $table->unsignedTinyInteger('position');
            $table->unsignedInteger('break_point');
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
        Schema::dropIfExists('partition_rules');
    }
}
