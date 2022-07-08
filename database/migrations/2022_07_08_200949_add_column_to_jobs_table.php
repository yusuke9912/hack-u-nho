<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            // 外部キーを設定するカラム
            $table->unsignedBigInteger('job_requester');
            // CASCADEの場合
            $table->foreign('job_requester')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        
            // 外部キーを設定するカラム
            $table->unsignedBigInteger('job_receiver');
            // CASCADEの場合
            $table->foreign('job_receiver')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        
            $table->string('date_and_time',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropIndex('job_requester');
            $table->dropIndex('job_receiver');
            $table->dropIndex('date_and_time');
        });
    }
}
