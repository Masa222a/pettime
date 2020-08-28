<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigIncrements('post_id');
            $table->string('post_title');
            $table->string('post_body');
            $table->string('post_image');
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
        Schema::dropIfExists('posts');
    }
}
