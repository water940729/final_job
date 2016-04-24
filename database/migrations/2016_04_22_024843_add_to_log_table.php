<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table("log",function($table){
				$table->increments("shipping_id");
				$table->string("shipping_code");
				$table->string("shipping_name");
				$table->string("shipping_desc");
				$table->string("insure");
				$table->tinyInteger("enabled");
				$table->tinyInteger("support_cod");
				$table->text("shipping_print");
				$table->string("print_bg");
				$table->text("config_lable");
				$table->tinyInteger("print_model");
				$table->tinyInteger("shipping_order");
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
