<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class movimento extends Model {

	//
	protected $table = 'movimentos';
	public function conta()
    {
        return $this->belongsTo('App\conta');
    }

}
