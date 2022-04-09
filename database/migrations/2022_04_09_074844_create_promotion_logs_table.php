<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('會員id');
            $table->integer('promotion_id')->comment('優惠代碼');
            $table->string('code')->default('')->comment('代碼');
            $table->integer('order_id')->comment('訂單id');
            $table->string('order_number')->default('')->comment('訂單編號');
            $table->string('product_name')->default('')->comment('商品名稱');
            $table->string('amount')->default('')->comment('訂單金額');
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
        Schema::dropIfExists('promotion_logs');
    }
}
