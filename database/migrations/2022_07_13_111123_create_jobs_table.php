<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('description', 255);
            $table->string('location', 30);
            $table->string('reward', 30);
            // 外部キーを設定するカラム
            $table->BigInteger('job_requester')->unsigned();
            // CASCADEの場合
            $table->foreign('job_requester')->references('id')->on('users');
        
            // 外部キーを設定するカラム
            $table->BigInteger('job_receiver')->unsigned();
            // CASCADEの場合
            $table->foreign('job_receiver')->references('id')->on('users');
        
            $table->string('date_and_time',255);
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
        Schema::dropIfExists('jobs');
    }
}
