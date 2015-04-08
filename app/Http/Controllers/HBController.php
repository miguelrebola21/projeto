<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\cliente;
use App\conta;
use App\movimento;
use App\correio;
use App\entidade;
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
				$bi=$cliente->bi;
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





				return view('hbpages.homehb',compact('nome','movimentos','saldocontas','idcontas','correio','bi'));
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

					 if ($tipo==='d'){

					 	if ($d==='T'){
					 	$movimentos=movimento::whereIn('origem',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();		
					 	}else{
			 		 	$movimentos=movimento::where('tipo',$d)->whereIn('origem',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	
			 		 		}


			 		 }elseif ($tipo==='c') {

			 		 		if ($d==='T'){
					 	$movimentos=movimento::whereIn('destino',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();			
					 	}else{
						 $movimentos=movimento::where('tipo',$d)->whereIn('destino',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	
							}

			 		 }else{

							if ($d==='T'){
					 	$movimentos=movimento::whereIn('origem',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->orWhereIn('destino',$idcontas)->get();			
					 	}else{

			 			$movimentos=movimento::where('tipo',$d)->whereBetween('data', [$compdata, Carbon::now()])->whereIn('origem', $idcontas)->orWhereIn('destino', $idcontas)->get();	

			 			}
			 		}
			 			

			return view('hbpages.consultas',compact('nome','movimentos','d','tipo','compdata','data'));
	}



		public function fac(){
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

			
				
				return view('hbpages.fac',compact('nome','idcontas'));
	}
	public function endfac(Requests\ValidarFac $request){
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




				//$entidade=$request['destino'];
				//$ent=entidade::where('id', $entidade)->get();
				$ent=entidade::where('id', $request['destino'])->get()->first();
				$entidade=$ent->contas()->get()->first();
				
				$idc=$entidade['id'];

				$request['destino']=$idc;
				$request['data']=Carbon::now();
				$request['origem']=$idcontas[$request['origem']];
				var_dump($request['origem']);
				$request['tipo']='FA';

				movimento::create($request->all());










		
			
				return redirect(route('fac'));
	}
		public function presta(){
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

			
				return view('hbpages.presta',compact('nome','idcontas'));
	}
	public function endpresta(Requests\ValidarTele $request){
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


				$ent=entidade::where('id', $request['destino'])->get()->first();
				$entidade=$ent->contas()->get()->first();
				
				$idc=$entidade['id'];

				$request['destino']=$idc;
				$request['data']=Carbon::now();
				$request['origem']=$idcontas[$request['origem']];
				var_dump($request['origem']);
				$request['tipo']='PR';

				movimento::create($request->all());














				
			
				return redirect(route('presta'));
	}
		public function tele(){
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

				
			
				return view('hbpages.tele',compact('nome','idcontas'));
	}
	public function endtele(Requests\ValidarTele $request){
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

					$ent=entidade::where('id', $request['destino'])->get()->first();


					$entidade=$ent->contas()->get()->first();
				
				$idc=$entidade['id'];

				$request['destino']=$idc;
				$request['data']=Carbon::now();
				$request['origem']=$idcontas[$request['origem']];
				var_dump($request['origem']);
				$request['tipo']='TEL';

				movimento::create($request->all());














				
						return redirect(route('tele'));

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

				return redirect(route('transf'));
			}

	public function matriz(){
				
				$homebanking=Auth::user();
				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				$bi=$cliente->bi;






				return view('hbpages.matriz',compact('nome','bi'));
			}

	






}
