<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entidades', function(Blueprint $table)
		{
			$table->increments('id')->unsigned;
			$table->integer('ent')->unique();
			$table->string('nome');
			$table->string('morada');
			$table->string('telefone');
			$table->string('cp');
			$table->string('email')->unique();
			$table->boolean('valido');
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
		Schema::drop('entidades');
	}

}
