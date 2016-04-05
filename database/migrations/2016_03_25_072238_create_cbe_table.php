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
            $table->increments('id');
			$table->char("cbeName",10)->unique();
			$table->char("cbeCode",10)->nullable();
			$table->char("cbeNo",11)->unique();
			$table->char("cbeAccount",10)->unique();
			$table->float("cbeBalance")->default(0.0);
			$table->char("cbePass",40);
			$table->char("cbeChoice",1)->nullable();
			$table->char("cbeLogistics",10)->nullable();
			$table->char("cbePay",10)->nullable();
#	$table->char("cbeMail",20);
			$table->string("phone",20);
			$table->bigInteger("cbeTime");
			$table->integer("isalive")->default(0);
#            $table->timestamps();
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
