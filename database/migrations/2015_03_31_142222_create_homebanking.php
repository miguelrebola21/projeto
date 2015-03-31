<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomebanking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homebanking',function(Blueprint $table)
			{
				$table->increments('id')->unsigned();
				$table->integer('id_cliente')->unsigned();
				$table->foreign('id_cliente')->references('id')->on('clientes');
				$table->string('password');
				$table->boolean('valido');


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
		schema::drop('homebanking');
	}

}
