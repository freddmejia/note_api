<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->longText('note');
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        /*Schema::create('alert', function (Blueprint $table) {
            $table->id();
            $table->integer('user_created_id')->nullable();
            $table->string('title');
            $table->string('message');
            $table->timestamps();
        });

        Schema::create('detail_group_alert', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alert_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->string('status');
            $table->foreign('alert_id')->references('id')->on('alert');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamps();
        });*/


        /*
        Schema::create('alert', function (Blueprint $table) {
            $table->id();
            $table->integer('user_created_id')->nullable();
            $table->string('title');
            $table->string('message');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('detail_group_alert', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alert_id');
            $table->unsignedBigInteger('user_id');
            $table->string('resource_type')->nullable();//IF, 1
            $table->string('resource_id')->nullable();//ID RESOURCE, patient_id
            $table->string('status');
            $table->foreign('alert_id')->references('id')->on('alert');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        */

       /*Schema::create('group_alert', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alert_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('alert_id')->references('id')->on('alert');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamps();
        });*/


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
