<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TicketActivation extends Migration
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
            $table->string('referenceCode')->unique();
            $table->boolean('isActive')->default('0');

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
            $table->dropColumn('referenceCode');
            $table->dropColumn('isActive');

        });
    }
}
