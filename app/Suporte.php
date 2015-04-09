<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Suporte extends Model {

	//
	protected $fillable = [     
		'nome',
		'email',
		'question'
	];
	protected $table = 'suportes';

	public function clientes()
   	{
       return $this->belongsTo('cliente');
   	}


}
