<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('廠商名稱');
            $table->string('email')->default('')->comment('電子郵件');
            $table->string('shop_no')->nullable()->comment('銀行編號');
            $table->string('hash')->nullable();
            $table->string('key')->nullable();
            $table->string('bank_name')->nullable()->comment('銀行名稱');
            $table->string('bank_code')->nullable()->comment('銀行代碼');
            $table->tinyInteger('status')->nullable()->comment('狀態');
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
        Schema::dropIfExists('vendors');
    }
}
