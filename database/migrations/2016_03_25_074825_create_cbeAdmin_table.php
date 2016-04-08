<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbeAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbeAdmin', function (Blueprint $table) {
            $table->increments('cbeAdminId');

			$table->char("cbeAdminAccount",10);
			$table->char("cbeAdminPass",40);
			$table->char("cbeAdminPhone",11);
			$table->char("cbeAdminMail",20);
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
        Schema::drop('cbeAdmin');
    }
}
