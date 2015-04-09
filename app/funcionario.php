<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class funcionario extends Model {
	
	protected $fillable = [     
			
	];

	protected $table = 'funcionarios';
	public function agencia()
    {
    	return $this->hasOne('clientes_conta');
    }
 

}
