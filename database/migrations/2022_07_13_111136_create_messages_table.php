<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 外部キーを設定するカラム
            $table->BigInteger('user_id')->unsigned();
            // CASCADEの場合
            $table->foreign('user_id')->references('id')->on('users');

            // 外部キーを設定するカラム
            $table->BigInteger('room_id')->unsigned();
            // CASCADEの場合
            $table->foreign('room_id')->references('id')->on('rooms');

            $table->string('body',255);
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
        Schema::dropIfExists('messages');
    }
}
