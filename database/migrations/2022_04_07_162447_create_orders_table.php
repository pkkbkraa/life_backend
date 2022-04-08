<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('商品代碼');
            $table->string('product_name')->default('')->comment('商品名稱');
            $table->integer('qty')->comment('數量');
            $table->integer('amount')->comment('訂單金額');
            $table->integer('vendor_id')->comment('供應商代碼');
            $table->string('vendor_name')->default('')->comment('供應商名稱');
            $table->string('user_id')->default('')->comment('購買人');
            $table->string('bank_name')->default('')->comment('銀行名稱');
            $table->string('bank_code')->default('')->comment('銀行代碼');
            $table->string('bank_account')->default('')->comment('虛擬帳號');
            $table->tinyInteger('status')->default('0')->nullable()->comment('訂單狀態');
            $table->tinyInteger('deliver_type')->default('0')->nullable()->comment('出貨狀態');
            $table->json('receiver')->comment('收貨資料');
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
        Schema::dropIfExists('orders');
    }
}
