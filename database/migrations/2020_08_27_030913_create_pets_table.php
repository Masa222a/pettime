<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigIncrements('pet_id');
            $table->string('pet_name');
            $table->string('pet_image');
            $table->string('pet_type');
            $table->string('pet_gender');
            /**
            *  created_userとupdated_userのデータ型とは？、削除フラグの使い方
            */
            $table->timestamps('created_at');
            
            $table->timestamps('updated_at');
            
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
