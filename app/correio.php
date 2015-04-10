<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class correio extends Model {
	protected $fillable = [     
		'de',
		'para',
		'assunto',
		'msg'
	];
	protected $table = 'correio';

	public function clientes()
   	{
       return $this->belongsTo('cliente');
   	}
	

}