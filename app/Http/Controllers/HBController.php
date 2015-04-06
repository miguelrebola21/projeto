<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\cliente;
use App\conta;
use App\movimento;
use App\correio;
use Carbon\Carbon;



class HBController extends Controller {

	//

	public $call;
	public $user;

public function __construct()
{

$this->beforeFilter('@setvars', ['only' => [
'endtransf',
]]);

}


public function setvars()
{
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


  }


 






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

				return view('hbpages.consultas',compact('nome','movimentos'));
	}

		public function applycons(Requests\ValidarConsulta $request){

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

					$d=$request['descricao'];
					$tipo=$request['tipo'];
					$data=$request['data'];
					switch($data){
						case 's': $compdata=Carbon::now()->subYears(100);
						break;
						case 'h':$horas=date('H'); 
						$compdata=Carbon::now()->subHours($horas+1);
						break;
						case 'o': $compdata=Carbon::now()->subDay();
						break;
						case 'us': $compdata=Carbon::now()->subWeek();
						break;
						case 'um': $compdata=Carbon::now()->subMonth();
						break;
						case 'usm': $compdata=Carbon::now()->subMonths(6);
						break;
					}

					 if ($tipo='d'){
			 		 	$movimentos=movimento::where('tipo',$d)->whereIn('destino',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	

			 		 }elseif ($tipo='c') {
						 $movimentos=movimento::where('tipo',$d)->whereIn('origem',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	


			 		 }else{


			 			$movimentos=movimento::where('tipo',$d)->whereIn('origem',$idcontas)->whereIn('destino',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	

			 		}
			 			

			return view('hbpages.consultas',compact('nome','movimentos','compdata'));
	}


	public function pay(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				//dd($cliente->contas()->get());
				$i=0;
				$contas=$cliente->contas();
					foreach ($cliente->contas()->get() as $conta){
						$idcontas[$i]=($conta->id);
						$i=$i+1;
					}
				return view('hbpages.pagamentos',compact('nome','idcontas'));
	}

	public function transf(){
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
				
				return view('hbpages.transferencias',compact('nome','idcontas'));
	}

	public function endtransf(Requests\ValidarMovimento $request){
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


				$request['origem']=$idcontas[$request['origem']];
				

				$request['data']=Carbon::now();

						
				movimento::create($request->all());

				return redirect('mainview');
			}

	






}
