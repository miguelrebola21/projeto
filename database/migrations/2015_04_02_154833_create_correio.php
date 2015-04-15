<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCorreio extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		schema::create('correio',function(Blueprint $table){
			$table->increments('id')->unsigned();
			$table->string('assunto');
			$table->string('msg');
			$table->integer('de')->unsigned();
			$table->foreign('de')->references('id')->on('clientes');
			$table->integer('para')->unsigned();
			$table->foreign('para')->references('id')->on('clientes');
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
		schema::drop('correio');
		//
	}

}
