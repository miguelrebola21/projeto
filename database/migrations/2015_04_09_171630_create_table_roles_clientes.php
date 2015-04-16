<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRolesClientes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('cliente_roles',function (Blueprint $table) {

                $table->increments('id')->unsigned();
                $table->integer('cliente_id')->unsigned();
                $table->integer('roles_id')->unsigned();
                $table->foreign('roles_id')->references('id')->on('roles');
                $table->foreign('cliente_id')->references('id')->on('clientes');
               
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
        Schema::drop('cliente_roles');
    }

}
