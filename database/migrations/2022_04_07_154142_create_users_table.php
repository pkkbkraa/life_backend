<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('auth')->default('')->comment('授權平台');
            $table->string('auth_id')->default('')->comment('授權ID');
            $table->string('email')->nullable()->comment('電子郵件');
            $table->string('name')->default('')->comment('會員姓名');
            $table->string('number')->default('')->comment('會員編號');
            $table->string('gender')->nullable()->comment('性別');
            $table->date('birthday')->nullable()->comment('生日');
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
