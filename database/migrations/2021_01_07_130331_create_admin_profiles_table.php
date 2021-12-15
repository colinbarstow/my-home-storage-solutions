<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('job_title');
            $table->string('image')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('username')->nullable();
            $table->string('location')->nullable();
            $table->boolean('email')->default(1);
            $table->boolean('sms')->default(1);
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
        Schema::dropIfExists('admin_profiles');
    }
}
