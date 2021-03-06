<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessageReceivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('message_receivers', function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->string('message_id');
            $table->string('conversation_id');
            $table->string('sender_id');
            $table->boolean('read_status');
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
        Schema::drop('message_receivers');
    }
}
