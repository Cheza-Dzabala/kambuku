<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('eventTickets', function (Blueprint $table){
            $table->increments('id');
            $table->string('eventId');
            $table->string('userId');
            $table->string('securityKey');
            $table->string('verificationCode');
            $table->string('isUsed');
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
        Schema::drop('eventTickets');
    }
}
