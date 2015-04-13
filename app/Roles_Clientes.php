<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_Clientes extends Model {

		protected $fillable = [     
			'cliente_id',
            'roles_id'
	];
	protected $table = 'cliente_roles';
	 public function cliente()
    {
        return $this->belongsTo('cliente');
    }

     public function roles()
    {
        return $this->belongsTo('roles');
    }
	


}
