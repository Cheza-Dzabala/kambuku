<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnsEventTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('eventTickets', function ($table){
            $table->integer('eventId')->change();
            $table->integer('userId')->change();
            $table->boolean('isUsed')->change();
        });

        Schema::table('events', function ($table){
            $table->integer('price')->change();
            $table->integer('clientId')->change();
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
        Schema::table('eventTickets', function ($table){
            $table->string('eventId')->change();
            $table->string('userId')->change();
            $table->string('isUsed')->change();
        });

        Schema::table('events', function ($table){
            $table->string('price')->change();
            $table->string('clientId')->change();
        });
    }
}
