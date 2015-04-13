<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class clientes_conta extends Model{
	protected $fillable = [     
    'conta_id',
    'cliente_id'
			
	];
	protected $table = 'cliente_conta';

	 public function cliente()
    {
        return $this->belongsTo('cliente');
    }

     public function conta()
    {
        return $this->belongsTo('conta');
    }
	

}