<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddbadwordFilter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('badwords', function($table){
            $table->string('filter_name')->required()->unique();
            $table->timestamps();
            $table->dropColumn('words');
        });

        Schema::table('badwords', function($table){
            $table->longText('words');
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


        Schema::table('badwords', function($table){
            $table->dropColumn('words');
        });

        Schema::table('badwords', function($table){
            $table->dropColumn('filter_name');
            $table->dropTimestamps();
            $table->text('words');
        });
    }
}
