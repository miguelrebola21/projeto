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
use App\Roles;
use App\Matriz;
use Carbon\Carbon;
use App\Http\Controllers\Flash;



class HBController extends Controller {

	//
	public function index(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();

				$role=$cliente->roles()->get();
				$k=0;
				foreach ($role as $r){
						$idroles[$k]=($r->id);
						$k=$k+1;
					}
				$max_role=max($idroles);

				

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

					if (isset($idcontas)){
				$j=0;

					foreach ($cliente->contas()->get() as $saldo){
						$saldocontas[$j]=($saldo->saldo);
						$j=$j+1;
					}


				$movimentos=movimento::whereIn('origem', $idcontas)->orWhereIn('destino', $idcontas)->where('valido',1)->get();


				$correio=correio::whereIn('de',[$id])->orWhereIn('para',[$id])->get();


				switch($max_role){

				case 1:
				return view('hbpages.homehb',compact('nome','movimentos','saldocontas','idcontas','correio','bi'));
				break;

				case 2:
				case 3:
				case 4:
				return view('hbpages.funchomehb',compact('nome','movimentos','saldocontas','idcontas','correio','bi'));
				break;

				case 5:
				return view('hbpages.adminhomehb',compact('nome','movimentos','saldocontas','idcontas','correio','bi'));
				break;

				default:
				return view('hbpages.homehb',compact('nome','movimentos','saldocontas','idcontas','correio','bi'));
				break;

				}
			
			}else{

					return view('hbpages.missingaccount');

			}
	}

	public function sendcorreio(){
		$homebanking=Auth::user();

		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$id=$cliente->id;

		return view('hbpages.sendcorreio',compact('nome'));

	}

	public function storecorreio(Requests\ValidarCorreio $request){
		$homebanking=Auth::user();
		$cliente=$homebanking->cliente();
		$nome=$cliente->nome;
		$id=$cliente->id;
		//dd($request);
		$request['de']=$id;

		$cor=correio::create($request->all());
		return redirect(route('mainview'));

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
				$bi=$cliente->bi;
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

				$mov=movimento::create($request->all());
				$mov_id=$mov->id;

			return view('hbpages.validation',compact('nome','bi','mov_id'));
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
				$bi=$cliente->bi;
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

			














				
			
				$mov=movimento::create($request->all());
				$mov_id=$mov->id;

			return view('hbpages.validation',compact('nome','bi','mov_id'));
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
				$bi=$cliente->bi;
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

				













				$mov=movimento::create($request->all());
				$mov_id=$mov->id;

			return view('hbpages.validation',compact('nome','bi','mov_id'));

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
				$bi=$cliente->bi;
				//dd($cliente->contas()->get());
				$i=0;
				$contas=$cliente->contas();
					foreach ($cliente->contas()->get() as $conta){
						$idcontas[$i]=($conta->id);
						$i=$i+1;
					}


				$request['origem']=$idcontas[$request['origem']];
				

				$request['data']=Carbon::now();
						
				$mov=movimento::create($request->all());
				$mov_id=$mov->id;

			return view('hbpages.validation',compact('nome','bi','mov_id'));
		}

	public function matriz(){
				
				$homebanking=Auth::user();
				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				$bi=$cliente->bi;



				return view('hbpages.matriz',compact('nome','bi'));
			}

	public function testvalidation(Requests\ValidarValidation $request){
		//request1 not posting
			//var_dump($request);
			$m= new Matriz;
			$matriz_cliente=$m->test($request['bi']);
			$mov=movimento::where('id', $request['mov_id'])->get()->first();
			$origem=$mov['origem'];
			$destino=$mov['destino'];
			$valor=$mov['valor'];
			$contao=conta::where('id',$origem)->get()->first();
			$saldoo=$contao['saldo'];
			if ($saldoo>=$valor){
			if ($matriz_cliente[$request['x']][$request['y']][$request['z']]===(int)$request['valor']) {

				movimento::where('id', $request['mov_id'])->update(array('valido' => 1));
				
				$newsaldoo=$saldoo-$valor;
				conta::where('id',$origem)->update(array('saldo' => $newsaldoo));

				$contad=conta::where('id',$destino)->get()->first();
				$saldod=$contad['saldo'];
				$newsaldod=$saldod+$valor;
				conta::where('id',$destino)->update(array('saldo' => $newsaldod));
				
				return redirect(route('mainview'));

			}else{
				$teste=true;
				$homebanking=Auth::user();
				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				$bi=$cliente->bi;
				$mov_id=$request['mov_id'];

				return view('hbpages.validation',compact('nome','bi','mov_id','teste'));
			}

		}else{


			\Flash::message('O seu saldo na conta '.$origem.' não é suficiente, experimente outra conta.');
			movimento::where('id', $request['mov_id'])->delete();
			return redirect(route('mainview'));


	}
		}


}
