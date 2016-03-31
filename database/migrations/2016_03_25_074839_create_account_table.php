<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
#            $table->increments('id');
 
			$table->char("cbeName",10);
			$table->char("cbeCode",10)->nullable();
			$table->char("cbeNo",11);
			$table->char("pay_id",10)->primary();
			$table->integer("cbeMoneyState");
			$table->integer("cbeMoneyNum");
			$table->bigInteger("cbeMoneyTime");
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
        Schema::drop('account');
    }
}
