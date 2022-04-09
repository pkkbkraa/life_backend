<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('會員id');
            $table->integer('coupon_id')->comment('優惠券');
            $table->string('coupon_name')->default('')->comment('優惠活動名稱');
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
        Schema::dropIfExists('coupon_logs');
    }
}
