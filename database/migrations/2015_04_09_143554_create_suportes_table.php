<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
class CreateSuportesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		schema::create('suportes',function(Blueprint $table){
			$table->increments('id')->unsigned();
			$table->integer('id_cliente')->unsigned();
			$table->string('nome');
			$table->string('email');
			$table->string('question');
			$table->foreign('id_cliente')->references('id')->on('clientes')->nullable() ;
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
		schema::drop('suportes');
		//
	}

}
