<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLol extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		 Schema::create('lol',function (Blueprint $table) {
                
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->timestamps('created_at');
                $table->timestamps('updated_at');
               
            }
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('lol');
	}

}
