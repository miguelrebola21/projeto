<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\cliente;
use App\conta;
use App\homebanking;
use App\clientes_conta;
use App\Suporte;
use App\correio;
use App\Roles;
use App\clientes_contas;
use App\Roles_Clientes;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$cli=cliente::create(array('nome' => 'Miguel Rebola', 'bi' => '15271173', 'telefone' => '968823502', 'morada' => 'Rua Maria Archer nº11 1ºEsq' , 'cp' => '2650-189' , 'email' => 'miguelrebola21@gmail.com' , 'valido' => '1'));
		$id=$cli->id;
		Roles::create(array('name' => 'Cliente'));
		Roles::create(array('name' => 'Balcão'));
		Roles::create(array('name' => 'Escritório'));
		Roles::create(array('name' => 'Gerente'));
		$rol=Roles::create(array('name' => 'Administrador'));
		$idrol=$rol->id;
		Roles_Clientes::create(array('cliente_id' => $id, 'roles_id' => $idrol));
		$con=conta::create(array('pin' => '1234', 'tipo' => 'Particular', 'agencia' => '1', 'saldo' => '1000'));
		$idcon=$con->id;
		clientes_conta::create(array('conta_id' => $idcon, 'cliente_id' => $id));
		homebanking::create(array('id_cliente' => $id, 'email' => 'miguelrebola21@gmail.com' , 'password' => password_hash('password',PASSWORD_DEFAULT) , 'valido' => '1'));

	}

}
