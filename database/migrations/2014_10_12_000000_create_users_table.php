<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',25)->unique();
            $table->string('password');
            $table->string('api_token', 80)
            ->unique()
            ->nullable()
            ->default(null);
            $table->string('sei',10);
            $table->string('mei',10);
            $table->string('sei_kana',10);
            $table->string('mei_kana',10);
            $table->string('address',30);
            $table->string('gender',10);
            $table->string('year',10);
            $table->string('month',10);
            $table->string('day',10);
            $table->string('self_introduction',255);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
