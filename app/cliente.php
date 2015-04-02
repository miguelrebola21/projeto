<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class cliente extends Model {

	protected $fillable = [     
			'nome',
			'bi',
			'telefone',
			'morada',
			'cp',
			'email'
	];

	protected $table = 'clientes';
	public function clientes_conta()
    {
    	return $this->hasMany('clientes_conta');
    }
    public function contas()
    {
        return $this->belongsToMany('App\conta');
    }
     public function homebanking()
    {
        return $this->hasOne('homebanking');
    }
      public function correio()
    {
        return $this->hasMany('App\correio');
    }
	//

}
