<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CollectionMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('vouchers', function ($table){
            $table->boolean('isCollected');
            $table->date('collectionDate');
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
        //
        Schema::table('vouchers', function ($table){
            $table->dropColumn('isCollected');
            $table->dropColumn('collectionDate');
        });
    }
}
