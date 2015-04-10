<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\cliente;
use App\conta;
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

		$clientes=cliente::all();

		var_dump($clientes);



	}

	public function suporte()
	{
		//	

		$clientes=cliente::all();

		var_dump($clientes);



	}



}
