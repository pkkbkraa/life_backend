<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_management', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->default('1');
            $table->string('template_name')->default('');
            $table->string('subject')->default('');
            $table->text('body');
            $table->text('sms')->default('NULL')->nullable();
            $table->text('manager_mail')->default('NULL')->nullable();
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
        Schema::dropIfExists('email_management');
    }
}
