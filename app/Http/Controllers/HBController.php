<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class HBController extends Controller {

	//
	public function index(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				return view('hbpages.homehb',compact('nome'));
	}

	public function cons(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				return view('hbpages.consultas',compact('nome'));
	}
	public function pay(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				return view('hbpages.pagamentos',compact('nome'));
	}

public function transf(){
	$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
			
				return view('hbpages.transferencias',compact('nome'));
	}






}
