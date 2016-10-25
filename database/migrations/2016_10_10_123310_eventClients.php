<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('eventClients', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('contactPerson');
            $table->string('contactNumber');
            $table->string('email');
            $table->string('postalAddress');
            $table->string('bankName');
            $table->string('bankBranch');
            $table->string('accountName');
            $table->string('accountNumber');
            $table->string('airtelMoneyNumber')->nullable();
            $table->string('tnmMpambaMoneyNumber')->nullable();
            $table->string('preferredPayments')->nullable();
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
        Schema::drop('eventClients');
    }
}
