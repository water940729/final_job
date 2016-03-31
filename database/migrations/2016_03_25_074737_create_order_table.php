<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
#            $table->increments('id');
			$table->char("cbeCode",40);
			$table->char("cbeName",100);
			$table->char("cbeBookNum",20)->primary();
			$table->integer("cbeBookState");
			$table->bigInteger("cbeBookTime");
			$table->char("cbeLogCh");
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
        Schema::drop('order');
    }
}
