<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model {

	//
	protected $fillable = [
	'nome'     
	];

	protected $table = 'roles';

	public function cliente(){

    	return $this->BelongsToMany('App\cliente');
	}
	  public function Roles_Clientes(){
        return $this->hasMany('Roles_Clientes');
    }
}
