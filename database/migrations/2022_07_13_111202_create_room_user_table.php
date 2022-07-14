<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 外部キーを設定するカラム
            $table->BigInteger('user_id')->unsigned();;
            // CASCADEの場合
            $table->foreign('user_id')->references('id')->on('users');

            // 外部キーを設定するカラム
            $table->BigInteger('room_id')->unsigned();;
            // CASCADEの場合
            $table->foreign('room_id')->references('id')->on('rooms');
            
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
        Schema::dropIfExists('room_user');
    }
}
