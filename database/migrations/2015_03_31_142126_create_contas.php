<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateContas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contas', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('pin');
			$table->string('tipo');
			$table->integer('agencia');
			$table->decimal('saldo',10,2);
				$table->timestamps('created_at');
			$table->timestamps('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contas');
	}

}
