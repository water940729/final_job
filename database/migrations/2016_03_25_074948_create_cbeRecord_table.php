<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCbeRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbeRecord', function (Blueprint $table) {
			$table->increments('id');

			$table->integer("cbe_id");
			$table->bigInteger("cbeLoginTime");
			$table->char("cbeLoginIP",20);
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
        Schema::drop('cbeRecord');
    }
}
