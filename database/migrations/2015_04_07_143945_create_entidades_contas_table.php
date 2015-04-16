<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadesContasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conta_entidade', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('entidade_id')->unsigned();
		    $table->foreign('entidade_id')->references('id')->on('entidades');
		    $table->integer('conta_id')->unsigned();
		    $table->foreign('conta_id')->references('id')->on('contas');
				
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conta_entidade');
	}

}
