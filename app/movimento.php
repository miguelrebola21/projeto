<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class movimento extends Model {

		protected $fillable = [     
			'id',
			'origem',
			'destino',
			'valor',
			'data',
			'tipo',
			'observacoes'
	];

	//
	protected $table = 'movimentos';
	public function conta()
    {
        return $this->belongsTo('App\conta');
    }

    public function consultas($compdata,$tipo,$d,$idcontas)
    {
    	
			 		 if ($tipo==='d'){
			 		 	$movimentos=movimento::where('tipo',$d)->WhereIn('destino',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	

			 		 }elseif ($tipo==='c') {
						 $movimentos=movimento::where('tipo',$d)->WhereIn('origem',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	


			 		 }else{


			 			$movimentos=movimento::where('tipo',$d)->WhereIn('origem',$idcontas)->WhereIn('destino',$idcontas)->whereBetween('data', [$compdata, Carbon::now()])->get();	

			 		}

			 		return $movimentos;
    }
 
}
