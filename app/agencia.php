<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class agencia extends Model {

	//
	protected $fillable = [     
	
	];

	protected $table = 'agencias';
	
	public function funcionario()
    {
    	return $this->hasMany('funcionario');
    }

}
