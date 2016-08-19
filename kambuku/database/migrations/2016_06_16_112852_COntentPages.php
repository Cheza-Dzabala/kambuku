<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class COntentPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('contentHeaders', function (Blueprint $table){
           $table->increments('id');
            $table->string('title')->unique();
            $table->string('order');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('contentPages', function (Blueprint $table){
           $table->increments('id');
            $table->string('header_id');
            $table->string('title')->unique();
            $table->string('order');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('contentPages_content', function(Blueprint $table){
           $table->increments('id');
            $table->string('contentPage_id');
            $table->longText('content');
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
        Schema::drop('contentHeaders');
        Schema::drop('contentPages');
        Schema::drop('contentPages_content');
    }
}
