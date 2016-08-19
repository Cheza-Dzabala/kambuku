<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('permission_types', function (Blueprint $table){
            $table->increments('id');
            $table->string('module');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table){
            $table->increments('id');
            $table->string('permission_type');
            $table->string('status');
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
        Schema::drop('permission_types');
        Schema::drop('permissions');

    }
}
