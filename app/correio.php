<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class correio extends Model {
	protected $fillable = [     
			
	];
	protected $table = 'correio';

	public function clientes()
   	{
       return $this->belongsTo('cliente');
   	}
	

}