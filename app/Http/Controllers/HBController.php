<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\cliente;
use App\conta;
use App\movimento;
use App\correio;
class HBController extends Controller {

	//
	public function index(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				$id=$cliente->id;
				//dd($cliente->contas()->get());
				$i=0;
				$contas=$cliente->contas();
					foreach ($cliente->contas()->get() as $conta){
						$idcontas[$i]=($conta->id);
						$i=$i+1;
					}
				$j=0;
					foreach ($cliente->contas()->get() as $saldo){
						$saldocontas[$j]=($saldo->saldo);
						$j=$j+1;
					}
				$movimentos=movimento::whereIn('origem', $idcontas)->orWhereIn('destino', $idcontas)->get();


				$correio=correio::whereIn('de',[$id])->orWhereIn('para',[$id])->get();





				return view('hbpages.homehb',compact('nome','movimentos','saldocontas','idcontas','correio'));
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
