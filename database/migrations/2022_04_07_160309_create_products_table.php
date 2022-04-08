<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->default('')->comment('產品編號');
            $table->string('name')->default('')->comment('產品名稱');
            $table->text('spec')->comment('規格');
            $table->longText('detail')->comment('商品詳情');
            $table->integer('price')->comment('價格');
            $table->text('images')->comment('圖片');
            $table->integer('vendor_id')->comment('廠商');
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
        Schema::dropIfExists('products');
    }
}
