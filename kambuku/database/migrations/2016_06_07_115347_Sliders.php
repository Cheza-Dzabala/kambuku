<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('home_sliders', function(Blueprint $table){
           $table->increments('id');
            $table->string('client_name');
            $table->string('client_phoneNumber');
            $table->string('name');
            $table->string('header');
            $table->string('sub_header');
            $table->string('image_path');
            $table->string('description');
            $table->string('web_link');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->boolean('is_active');
            $table->string('order')->unique();
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
        Schema::drop('home_sliders');
    }
}
