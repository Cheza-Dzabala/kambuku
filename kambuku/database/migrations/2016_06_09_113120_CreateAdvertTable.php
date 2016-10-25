<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('paid_adverts', function (Blueprint $table){

            $table->increments('id');
            $table->string('client_name')->required();
            $table->string('client_phonenumber')->required();
            $table->string('client_phonenumber2')->nullable();
            $table->string('client_address')->nullable();
            $table->string('page')->required();
            $table->string('ad_name')->required();
            $table->string('ad_type')->required();
            $table->boolean('is_targeted')->required();
            $table->string('min_age')->nullable();
            $table->string('max_age')->nullable();
            $table->string('category_id')->required();
            $table->string('sub_category_id')->required();
            $table->date('expiry_date')->required();
            $table->boolean('is_active')->required();
            $table->string('images_path')->nullable();
            $table->string('clicks')->nullable();
            $table->string('display_order')->required();
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
        Schema::drop('paid_adverts');
    }
}
