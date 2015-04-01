<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class HBController extends Controller {

	//
	public function index(){

				$homebanking=Auth::user();

				$cliente=$homebanking->cliente();
				$nome=$cliente->nome;
				return view('hbpages.homehb',compact('nome'));
	}





}
