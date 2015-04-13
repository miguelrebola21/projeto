<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\cliente;
use App\conta;
use App\homebanking;
use App\clientes_conta;
use App\suporte;
use App\correio;
use App\roles;
use App\clientes_contas;
use App\Roles_Clientes;
use Auth;
use Input;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function clientes()
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$clientes=cliente::get();

		return view('adminpages.clientes',compact('nome','clientes'));
	}
	public function editclientes($id)
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$cli=cliente::where('id',$id)->get()->first();


		return view('adminpages.editarclientes',compact('nome','cli'));
	}
	public function updateclientes()

	{
		$input = Input::all();
		$id= Input::get('id');
		
		$cli_updated= cliente::where('id',$id)->update(['id'=>Input::get('id'),'nome'=>Input::get('nome'),'bi' =>Input::get('bi'),'telefone' => Input::get('telefone'),'morada'=> Input::get('morada'),'cp'=> Input::get('cp'), 'email' => Input::get('email'), 'valido' => Input::get('valido')]);
	

		return redirect(route('mainview'));
	}


	public function contas()
	{
		//	

		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$conta=conta::get();


		return view('adminpages.contas',compact('nome','conta'));
	}
	public function editcontas($id)
	{
		//	

		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$con=conta::where('id',$id)->get()->first();


		return view('adminpages.editarcontas',compact('nome','con'));

	}
	public function updatecontas()
	{
		//
		$input = Input::all();
		$id= Input::get('id');
		
		$con_updated= conta::where('id',$id)->update(['id'=>Input::get('id'),'pin'=>Input::get('pin'),'tipo' =>Input::get('tipo'),'agencia' => Input::get('agencia'),'saldo'=> Input::get('saldo')]);
	

		return redirect(route('mainview'));

		

	}

	public function homebankings()
	{
		//	

		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$homebankings=homebanking::get();


		return view('adminpages.homebankings',compact('nome','homebankings'));



	}

	public function edithomebankings($id)
	{
		//	

		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$hb=homebanking::where('id',$id)->get()->first();


		return view('adminpages.editarhomebankings',compact('nome','hb'));

	}
	public function addhomebankings()
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		return view('adminpages.addhomebankings', compact('nome'));
	}

	public function updatehomebankings()
	{
		//
		$input = Input::all();
		$id= Input::get('id');
		$h=homebanking::where('id',$id)->get()->first();
		$oldpassword=$h->password;
		$newpassword=Input::get('password');

		if ($newpassword<>$oldpassword){
			$newpassword=password_hash($newpassword, PASSWORD_DEFAULT);

		}
		
		$hb_updated= homebanking::where('id',$id)->update(['id'=>Input::get('id'),'id_cliente'=>Input::get('id_cliente'),'email' =>Input::get('email'),'password' => $newpassword ,'valido'=> Input::get('valido')]);
	

		return redirect(route('mainview'));

		

	}

	public function registarhomebankings()
	{
		//	
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$valido=1;
		$conta=conta::create(Input::all());
		$newpassword=password_hash(Input::get('password'), PASSWORD_DEFAULT);
		

		$hb_created= homebanking::create(array('id_cliente' => Input::get('id_cliente'), 'email' => Input::get('email'), 'password' => $newpassword , 'valido' => $valido));
		
		return redirect(route('mainview'));
	}

	public function suporte()
	{
		//	
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$sup=suporte::get();


		return view('adminpages.suporte',compact('nome','sup'));
		


	}
	public function respsuporte($id)
	{
		//	
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$s=suporte::where('id',$id)->get()->first();

		return view('adminpages.respsuporte',compact('nome','s'));
		
	}
		public function sendsuporte()
	{
		//	
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$id=$cliente->id;
		$data=['ola'];
		$assunto='Pedido de Suporte nº'.Input::get('id').' - Banco M';

			\Mail::send('emails.emailsuporte', array('key' => Input::get('mensagem')), function($message)
		{
		    $message->to(Input::get('email'))->subject('Pedido de Suporte nº'.Input::get('id').' - Banco M');
		});

			if (Input::get('id_cliente')) {
				correio::create(array('assunto' => $assunto, 'msg' => Input::get('mensagem'), 'de' => $id, 'para' => Input::get('id_cliente') ));
			}

			suporte::where('id',Input::get('id'))->delete();


		return redirect(route('mainview'));
		
	}

	public function addcontas()
	{
		//	
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;


		return view('adminpages.addcontas',compact('nome'));

	}

		public function registarcontas()
	{
		//	
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$conta=conta::create(Input::all());
		$id=$conta->id;
		
		return view('adminpages.addclienteconta',compact('nome','id'));

	}

		public function registarclienteconta()
	{
		//	
		$idconta=Input::get('idconta');

		$nc1=Input::get('nc1');
		$nc2=Input::get('nc2');
		$nc3=Input::get('nc3');

		if (isset($nc1)){
			clientes_conta::create(array('conta_id' => $idconta, 'cliente_id' => $nc1));
		}
		if (isset($nc2)){
			clientes_conta::create(array('conta_id' => $idconta, 'cliente_id' => $nc2));
		}		
		if (isset($nc3)){
			clientes_conta::create(array('conta_id' => $idconta, 'cliente_id' => $nc3));
		}		
		

		return redirect(route('mainview'));

	}

	public function roles()
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;

		$clientes=cliente::get();
		$roles=roles::get();
		return view('adminpages.roles',compact('nome','clientes','roles'));

	}

	public function check_roles($id)
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;


		$cliente=cliente::where('id',$id)->get()->first();
		$role=$cliente->roles()->get();
		return view('adminpages.checkroles',compact('nome','cliente','role'));

	}

	public function remove_roles($id,$rol)
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$rc=Roles_Clientes::where('roles_id',$rol)->where('cliente_id',$id)->delete();

		return redirect(route('mainview'));

	}

		public function add_roles($id)
	{
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$rc=Roles_Clientes::where('cliente_id',$id)->get();
		$k=0;
				foreach ($rc as $r){
						$idroles[$k]=($r->roles_id);
						$k=$k+1;
					}			

		return view('adminpages.addrole',compact('nome','id','idroles'));
	}

		public function register_roles($id)
	{
			
		if (Input::get('level1')){
			Roles_Clientes::create(array('cliente_id' => $id, 'roles_id' => 1));

		}
		if (Input::get('level2')){
			Roles_Clientes::create(array('cliente_id' => $id, 'roles_id' => 2));

		}
		if (Input::get('level3')){
			Roles_Clientes::create(array('cliente_id' => $id, 'roles_id' => 3));

		}
		if (Input::get('level4')){
			Roles_Clientes::create(array('cliente_id' => $id, 'roles_id' => 4));

		}
		if (Input::get('level5')){
			Roles_Clientes::create(array('cliente_id' => $id, 'roles_id' => 5));

		}

						

		return redirect(route('mainview'));
	}


}
