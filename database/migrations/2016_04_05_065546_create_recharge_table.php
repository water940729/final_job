<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRechargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge', function (Blueprint $table) {
            //
			$table->increments("id");
			$table->integer("cbe_id");
			$table->integer("pay_id");
			$table->char("num",20);
			$table->integer("state");
			$table->bigInteger("time");
			$table->float("money");
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
        Schema::drop('recharge');
    }
}
