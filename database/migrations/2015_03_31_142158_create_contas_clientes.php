<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateContasClientes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cliente_conta', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('cliente_id')->unsigned();
		    $table->foreign('cliente_id')->references('id')->on('clientes');
		    $table->integer('conta_id')->unsigned();
		    $table->foreign('conta_id')->references('id')->on('contas');
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
		//
		Schema::drop('cliente_conta');
	}

}
