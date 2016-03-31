<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbe', function (Blueprint $table) {
#            $table->increments('id');
			$table->char("cbeName",4);
			$table->char("cbeCode",10)->nullable();
			$table->char("cbeNo",11)->primary();
			$table->char("cbeAccount",10);
			$table->float("cbeBalance");
			$table->char("cbePass",40);
			$table->char("cbeChoice",1)->nullable();
			$table->char("cbeLogistics",10)->nullable();
			$table->char("cbePay",10)->nullable();
		 	$table->char("cbeMail",20);
			$table->string("phone",20);
			$table->bigInteger("cbeTime");
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
        Schema::drop('cbe');
    }
}
