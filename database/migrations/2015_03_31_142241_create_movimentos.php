<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateMovimentos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		schema::create('movimentos',function(Blueprint $table)
		{
			$table->increments('id')->unsigned;
			$table->integer('origem')->unsigned();
			$table->integer('destino')->unsigned();
            $table->decimal('valor',10,2);
            $table->timestamp('data');
            $table->string('tipo');
            $table->string('observacoes');
            $table->binary('valido');
            $table->foreign('destino')->references('id')->on('contas');
            $table->foreign('origem')->references('id')->on('contas');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('movimentos');
		//
	}

}
