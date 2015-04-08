<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>
	<body style="padding:100px;padding-top:10px;">
	<style>
td {
    border: solid 2px lightgrey;
}
th {
    border: solid 2px lightgrey;
}
tr {
    border: solid 2px lightgrey;
}
</style>


	
	    <h3 style="float:right;">Seja bem-vindo Sr. {{$nome}}</h3>
		<ul>
		<li><a href="{{$url = route('mainview')}}"> Vista Geral</a></li>
		<li><a href="{{$url = route('cons')}}">Consultas</a></li>
		<li><a href="{{$url = route('transf')}}">Transferências</a></li>
		<li>Pagamentos
			<ul>
                <li><a href="{{$url = route('tele')}}">Carregamento de Telémoveis</a></li>
                <li><a href="{{$url = route('fac')}}">Facturas da Casa</a></li>
                <li><a href="{{$url = route('presta')}}">Prestações</a></li>
            </ul>
		<li><a href="{{$url = route('funcionarios')}}"> Funcionarios</a></li>	

		</li>

		
		@if (Auth::check())
    <li><a href="{{$url = route('logout')}}"> Log out</a></li>
     <li><a href="{{$url = route('home')}}"> HomePage</a></li>
    @else
    <li><a href="login" > Log In</a></li>	
@endif	

		</ul>
		
		
		@yield('content')
		</div>

		@yield('footer')
	

	</body>
</html>