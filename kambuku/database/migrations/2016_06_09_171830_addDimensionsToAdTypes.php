<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDimensionsToAdTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ad_types', function($table){
           $table->string('width_px');
           $table->string('height_px');
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
        Schema::table('ad_types', function($table){
            $table->dropColumn('width_px');
            $table->dropColumn('height_px');
        });
    }
}
