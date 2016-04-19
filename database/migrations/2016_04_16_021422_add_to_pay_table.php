<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table("pay",function($table){
			$table->integer("enabled");
			$table->integer("is_cod");
			$table->integer("is_online");
		});
    }

    /**
     * reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
