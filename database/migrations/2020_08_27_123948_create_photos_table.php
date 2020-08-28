<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigIncrements('photo_id');
            $table->unsignedBigInteger('pet_id');
            $table->string('photo_name');
            $table->string('photo_body');
            /**
            *  created_userとupdated_userのデータ型とは？、削除フラグの使い方
            */
            $table->string('created_user_name');
            $table->timestamps('created_at');
            $table->string('updated_user_name');
            $table->timestamps('updated_at');
            
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pet_id')->references('id')->on('pets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
