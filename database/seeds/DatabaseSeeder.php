<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		cliente::create(array('nome' => 'Miguel Rebola', 'bi' => '15271173', 'telefone' => '968823502', 'morada' => 'Rua Maria Archer nº11 1ºEsq' , 'cp' => '2650-189' , 'email' => 'miguelrebola21@gmail.com' , 'valido' => '1'));
		Roles::create(array('nome' => 'Cliente'));
		Roles::create(array('nome' => 'Balcão'));
		Roles::create(array('nome' => 'Escritório'));
		Roles::create(array('nome' => 'Gerente'));
		Roles::create(array('nome' => 'Administrador'));
		Roles_Clientes::create(array('cliente_id' => '1', 'roles_id' => '5'));
		conta::create(array('pin' => '1234', 'tipo' => 'Particular', 'agencia' => '1', 'saldo' => '1000'));
		clientes_conta::create(array('conta_id' => '1', 'cliente_id' => '1'));
	}

}
