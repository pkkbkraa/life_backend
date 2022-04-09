<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->default('NULL')->comment('代碼');
            $table->integer('amount')->default(0)->comment('金額限制');
            $table->integer('discount')->comment('折扣');
            $table->date('start')->comment('起始日期');
            $table->date('end')->comment('結束日期');
            $table->tinyInteger('status')->default('1')->comment('狀態');
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
        Schema::dropIfExists('promotions');
    }
}
