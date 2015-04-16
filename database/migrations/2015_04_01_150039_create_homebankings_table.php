<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomebankingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homebankings', function(Blueprint $table)
		{
				$table->increments('id')->unsigned();
				$table->integer('id_cliente')->unsigned();
				$table->foreign('id_cliente')->references('id')->on('clientes');
				$table->string('email')->unique();
				$table->foreign('email')->references('email')->on('clientes');
				$table->string('password');
				$table->rememberToken();
				$table->binary('valido');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('homebankings');
	}

}
