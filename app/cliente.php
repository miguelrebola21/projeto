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
    public function Roles_Clientes(){
        return $this->hasMany('Roles_Clientes');
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
       public function Suporte()
    {
        return $this->hasMany('App\Suporte');
    }

      public function roles()
    {
        return $this->hasMany('App\Roles');
    }
	//

}
