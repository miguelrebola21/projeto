<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class entidade extends Model {

	//
	protected $fillable = [     
			
	];
	protected $table = 'entidades';

		public function entidades_conta()
    {
    	return $this->hasMany('entidades_contas');
    }
    public function contas()
    {
        return $this->belongsToMany('App\conta');
    }

}
