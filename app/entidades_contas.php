<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class entidades_contas extends Model {

	//
	protected $fillable = [     
			
	];
	protected $table = 'entidades_contas';
	 public function cliente()
    {
        return $this->belongsTo('entidades');
    }

     public function conta()
    {
        return $this->belongsTo('conta');
    }
	

}
