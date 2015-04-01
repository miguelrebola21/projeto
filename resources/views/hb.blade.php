<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>
	<body style="padding:100px;padding-top:10px;">

	
	    <h3 style="float:right;">Seja bem-vindo Sr. {{$nome}}</h3>
		<ul>
		<li><a href="mainview"> Vista Geral</a></li>
		<li><a href="cons">Consultas</a></li>
		<li><a href="transf">Transferências</a></li>
		<li><a href="pay">Pagamentos</a></li>

		
		@if (Auth::check())
    <li><a href="logout"> Log out</a></li>
     <li><a href="home"> HomePage</a></li>
    @else
    <li><a href="login" > Log In</a></li>	
@endif	

		</ul>
		
		
		@yield('content')
		</div>

		@yield('footer')
	

	</body>
</html>