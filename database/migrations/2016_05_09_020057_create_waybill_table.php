<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaybillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('waybill', function (Blueprint $table) {
            $table->increments('id');
            $table->string("billNo", 30);//运单号
            $table->string("billTime");//时间节点
            $table->text("billState");//物流状态
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
