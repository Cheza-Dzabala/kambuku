<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParticipantToConversationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //


        Schema::table('messages', function($table){
            $table->boolean('read_status');
        });

        Schema::create('conversation_participants', function(Blueprint $table){
            $table->increments('id');
            $table->string('conversation_id');
            $table->string('participant_id');
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


        Schema::table('messages', function($table){
            $table->dropColumn('read_status');
        });

        Schema::drop('conversation_participants');

    }
}
