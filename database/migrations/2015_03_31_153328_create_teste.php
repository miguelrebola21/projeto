<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTeste extends Migration {



	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teste', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('clientesid')->unsigned();
				$table->timestamps('created_at');
			$table->timestamps('updated_at');
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		schema::drop('teste');
	}

}
