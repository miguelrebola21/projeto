<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>
	<body style="padding:100px;padding-top:10px;">

	
	    
		<ul>
		<li><a href="agencias" > Agencias</a></li>
		<li><a href="empresa" > Empresa</a></li>
		<li><a href="joinus" > Junte-se a nós</a></li>
		<li><a href="servicos" > Serviços</a></li>
		<li><a href="suport" > Suporte</a></li>
		<li><h2><a href="home" > Home</a></h2></li>		
		<li><a href="faq" > FAQ</a></li>
		<li><a href="contactos" > Contactos</a></li>
		<li><a href="local" > Localização</a></li>		
		<li><a href="suport" > Suporte</a></li>	
		<hr>
		@if (Auth::check())
    	<li><a href="{{$url = route('logout')}}"> Log out</a></li>
    <li><a href="homebanking"> Homebanking</a></li>
    @else
    <li><a href="login" > Log In</a></li>	
@endif		
		</ul>
		
		
		@yield('content')
		 @if (Session::has('flash_notification.message'))

        <p style="color:red;">{{ Session::get('flash_notification.message') }}</p>

@endif
		</div>

		@yield('footer')
	

	</body>
</html>