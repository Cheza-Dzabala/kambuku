<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SafetyGuidelines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('safety_guidelines', function(Blueprint $table){
            $table->increments('id');
            $table->string('guide');
            $table->boolean('is_active')->default('0');
            $table->string('title');
            $table->integer('order');
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
        Schema::drop('safety_guidelines');
    }
}
