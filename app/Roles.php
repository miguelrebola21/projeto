<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model {

	//
	protected $fillable = [
	'name'     
	];

	protected $table = 'roles';

	public function cliente(){

    	return $this->BelongsToMany('App\cliente');
	}
	  public function Roles_Clientes(){
        return $this->hasMany('Roles_Clientes');
    }
}
