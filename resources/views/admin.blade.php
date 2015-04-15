<!doctype html>
<html lang="en">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Banco M</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">
    {!! \Html::style('/css/mainpage.css') !!}
  </head>
<div id="wrapper" class="active">
	
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <img class="logo" href="" src="">
          <a class="navbar-brand" href="{{$url = route('home')}}">Banco M</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar">
              <li><a href="{{$url = route('mainview')}}"> Vista Geral</a></li>
		<li><a href="{{$url = route('sendcorreio')}}"> Enviar Correio</a></li>
		<li><a href="{{$url = route('cons')}}">Consultas</a></li>
		<li><a href="{{$url = route('transf')}}">Transferências</a></li>
		<li><a>Pagamentos</a>
			<ul class="dropdown-menu nav navbar-nav">
                <li><a href="{{$url = route('tele')}}">Carregamento de Telémoveis</a></li>
                <li><a href="{{$url = route('fac')}}">Facturas da Casa</a></li>
                <li><a href="{{$url = route('presta')}}">Prestações</a></li>
            </ul>	
		<li style="padding-top:1%;">@yield('matriz')</li>
		</li> 
		</ul>


		 <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
	<li><a>Seja bem-vindo Sr. {{$nome}}</a></li>
	<li><a class="btn-warning hb" id="hb"><span class="glyphicon glyphicon-dashboard"></span>&nbspZona de Administrador</a>
		<ul class="dropdown-menu navbar-nav">
        <li><a href="{{$url = route('a_clientes')}}">Clientes</a></li>
		<li><a href="{{$url = route('a_homebankings')}}">Homebankings</a></li>
		<li><a href="{{$url = route('a_contas')}}">Contas</a></li>
		<li><a href="{{$url = route('a_roles')}}">Permissões</a></li>
		<li><a href="{{$url = route('a_suporte')}}">Suporte</a></li>
        </ul>
        </li>	
    <li><a href="{{$url = route('logout')}}" class="btn-danger hb" id="hb"><span class="glyphicon glyphicon-home"></span>&nbspSair</a></li>
    @else
    <li><a href="login" > Log In</a></li>	
	@endif	
 </ul>
      </div>

     </div> 
   </nav>

		</ul>
		
		
   <div class="mid">
	<div class="container-fluid ">
      <div class="row">
      <div class="row placeholders">
      <div class="contentbox">
		          @if (Session::has('flash_notification.message'))
                <p style="color:red;">{{ Session::get('flash_notification.message') }}</p>
		          @endif
		           @yield('content')

	  </div>
	  </div>
	  </div>
	</div>
  </div>

		</div>
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
      <div class="container-fluid">
   
        <div id="navbar" class="navbar-collapse collapse">

        
        <ul class="nav navbar-nav navbar-right">
              <li><a href="faq" > FAQ</a></li>
              <li><a href="contactos" > Contactos</a></li>
              <li><a href="local" > Localização</a></li>    
             
      </ul>

      
    
          
      </div>

     </div> 
   </nav>
	

	</body>
</html>