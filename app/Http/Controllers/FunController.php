<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\cliente;
use App\conta;
use App\movimento;
use App\correio;
use App\entidade;
use Carbon\Carbon;



class FunController extends Controller {

	public function index(){
		return view('funpages.homefunc');	
	}

}
