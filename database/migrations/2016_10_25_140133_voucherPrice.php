<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoucherPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('classifieds', function($table){
            $table->string('voucherPrice')->nullable();
        });
    }

    /**
     *
     * Reverse the migrations.
     * @return void
     *
     */


    public function down()
    {
        //
        Schema::table('classifieds', function($table) {
            $table->dropColumn('voucherPrice');
        });
    }
}
