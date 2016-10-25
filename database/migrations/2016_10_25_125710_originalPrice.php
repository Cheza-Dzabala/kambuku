<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OriginalPrice extends Migration
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
            $table->string('originalPrice')->nullable();
            $table->boolean('discounted')->nullable();
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
        Schema::table('classifieds', function($table){
            $table->dropColumn('originalPrice');
            $table->dropColumn('discounted');
        });
    }
}
