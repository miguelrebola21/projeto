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
		cliente::create(array('nome' => 'Miguel Rebola', 'bi' => '15271173', 'telefone' => '968823502', 'morada' => 'Rua Maria Archer nº11 1ºEsq' , 'cp' => '2650-189' , 'email' => 'miguelrebola21@gmail.com' , 'valido' => '1'));
		Roles::create(array('nome' => 'Cliente'));
		Roles::create(array('nome' => 'Balcão'));
		Roles::create(array('nome' => 'Escritório'));
		Roles::create(array('nome' => 'Gerente'));
		Roles::create(array('nome' => 'Administrador'));
		Roles_Clientes::create(array('cliente_id' => '1', 'roles_id' => '5'));
		conta::create(array('pin' => '1234', 'tipo' => 'Particular', 'agencia' => '1', 'saldo' => '1000'));
		clientes_conta::create(array('conta_id' => '1', 'cliente_id' => '1'));
		homebanking::create(array('id_cliente' => '1', 'email' => 'miguelrebola21@gmail.com' , 'password' => '$2y$10$u7/SLIT/S4D4tACruWtvoeJYjNKEJ/QswoV72heNR00m80XLki7LK' , 'valido' => '1'));

	}

}
