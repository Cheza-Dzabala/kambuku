<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subscriptions', function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->boolean('is_active');
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('keywords');
            $table->string('is_professional_seller');
            $table->integer('min_price');
            $table->integer('max_price');
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
        Schema::drop('subscriptions');
    }
}
