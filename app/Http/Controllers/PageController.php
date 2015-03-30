<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

	//
	public function index(){
                $data="Bem Vindo";
				return view('pages.home', compact($data));
	}

	public function agencias(){
                $data="Agências";
				return view('pages.agencias', compact($data));
	}

	public function empresa(){
                $data="Empresa";
				return view('pages.empresa', compact($data));
	}

	public function faq(){
                $data="faq";
				return view('pages.faq', compact($data));
	}

	public function joinus(){
                $data="Junte-se a nós";
				return view('pages.joinus', compact($data));
	}

	public function local(){
                $data="Localização";
				return view('pages.local', compact($data));
	}

	public function servicos(){
                $data="Serviços";
				return view('pages.servicos', compact($data));
	}

	public function suport(){
                $data="Suporte";
				return view('pages.suport', compact($data));
	}

	public function contactos(){
                $data="Contactos";
				return view('pages.contactos', compact($data));
	}



}
