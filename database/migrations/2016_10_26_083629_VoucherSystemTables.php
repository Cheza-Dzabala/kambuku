<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoucherSystemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //


        Schema::create('vouchers', function (Blueprint $table){
            $table->increments('id');
            $table->integer('userId')->required();
            $table->integer('listingId');
            $table->string('voucherCost');
            $table->string('referenceCode');
            $table->boolean('isActive')->default('0');
            $table->date('purchaseDate')->nullable();
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
        Schema::drop('vouchers');
    }
}
