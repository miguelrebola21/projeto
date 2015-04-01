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
		Schema::create('clientes_contas', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('clientesid')->unsigned();
		    $table->foreign('clientesid')->references('id')->on('clientes');
		    $table->integer('contasid')->unsigned();
		    $table->foreign('contasid')->references('id')->on('contas');
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
		Schema::drop('clientes_contas');
	}

}
