<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessageSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('message_senders', function(Blueprint $table){
           $table->increments('id');
            $table->string('user_id');
            $table->dateTime('send_date');
            $table->string('message_id');
            $table->string('conversation_id');
            $table->string('receiver_id');
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
        Schema::drop('message_senders');
    }
}
