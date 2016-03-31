<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay', function (Blueprint $table) {
#            $table->increments('id');
			$table->increments("pay_id");
			$table->char("pay_code",10);
			$table->char("pay_name",30);
			$table->float("pay_fee");
			$table->char("pay_desc",50)->nullable();
			$table->char("pay_config",50);
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
        Schema::drop('pay');
    }
}
