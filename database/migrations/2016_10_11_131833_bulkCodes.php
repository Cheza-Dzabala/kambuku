<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BulkCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('eventTickets', function ($table) {
            $table->dropUnique(['referenceCode']);
            $table->string('referenceCode')->nullable()->change();
            $table->string('bulkCode')->nullable();
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
        Schema::table('eventTickets', function ($table) {
            $table->string('referenceCode')->unique()->change();
            $table->dropColumn('bulkCode');
        });
    }
}
