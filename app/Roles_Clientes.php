<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_Clientes extends Model {

		protected $fillable = [     
			
	];
	protected $table = 'roles_clientes';
	 public function cliente()
    {
        return $this->belongsTo('cliente');
    }

     public function roles()
    {
        return $this->belongsTo('roles');
    }
	


}
