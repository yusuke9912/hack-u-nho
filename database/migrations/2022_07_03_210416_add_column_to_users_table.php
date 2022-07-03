<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sei',10);
            $table->string('mei',10);
            $table->string('sei_kana',10);
            $table->string('mei_kana',10);
            $table->string('address',30);
            $table->string('gender',10);
            $table->integer('age');
            $table->string('self_introduction',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sei',10);
            $table->string('mei',10);
            $table->string('sei_kana',10);
            $table->string('mei_kana',10);
            $table->string('address',30);
            $table->string('gender',10);
            $table->integer('age');
            $table->string('self_introduction',255);
        });
    }
}
