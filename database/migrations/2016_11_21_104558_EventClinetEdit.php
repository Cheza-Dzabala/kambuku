<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventClinetEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('eventClients', function ($table){
            $table->dropColumn('name');
            $table->dropColumn('contactPerson');
            $table->dropColumn('contactNumber');
            $table->dropColumn('email');
            $table->dropColumn('postalAddress');
            $table->integer('user_id');
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
        Schema::table('eventClients', function ($table){
            $table->string('name');
            $table->string('contactPerson');
            $table->string('contactNumber');
            $table->string('email');
            $table->string('postalAddress');
            $table->dropColumn('user_id');
        });
    }
}
