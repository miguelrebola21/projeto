<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class conta extends Model {
	protected $fillable = [     
			
	];
	protected $table = 'contas';
		public function entidades()
   	{
       return $this->belongsToMany('entidade');
   	}
   	public function entidades_conta()
    {
    	return $this->hasMany('entidades_contas');
    }

	public function clientes()
   	{
       return $this->belongsToMany('cliente');
   	}
	public function clientes_conta()
    {
    	return $this->hasMany('clientes_conta');
    }
    public function movimento()
    {
    	return $this->hasMany('App\movimento');
    }
    

}