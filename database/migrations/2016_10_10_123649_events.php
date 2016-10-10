<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('events', function (Blueprint $table){
            $table->increments('id');
            $table->string('clientId');
            $table->date('eventDate');
            $table->string('venue');
            $table->string('city');
            $table->time('time');
            $table->string('eventName');
            $table->string('artwork');
            $table->longText('notes');
            $table->string('isActive');
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
        //
        Schema::drop('events');
    }
}
