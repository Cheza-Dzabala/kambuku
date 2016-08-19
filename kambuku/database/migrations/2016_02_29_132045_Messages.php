<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('messages', function(Blueprint $table){
           $table->increments('id');
            $table->longText('body');
            $table->boolean('has_attachement');
            $table->string('receiver_id');
            $table->string('sender_id');
            $table->string('conversation_id');
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
        Schema::drop('messages');
    }
}
