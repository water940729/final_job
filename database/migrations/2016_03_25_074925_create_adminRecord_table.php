<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminRecord', function (Blueprint $table) {
			$table->increments('id');

			$table->integer("cbeAdminId");
			$table->bigInteger("cbeAdminLoginLasttime");
			$table->char("cbeAdminLoginLastIP",20);
			$table->bigInteger("cbeAdminLogintime");
			$table->char("cbeAdminLoginIP",20);
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
        Schema::drop('adminRecord');
    }
}
