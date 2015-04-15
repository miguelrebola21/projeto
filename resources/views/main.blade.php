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
    <link rel="stylesheet" href="css\mainpage.css">
  </head>
<body>

  <div id="wrapper" class="active">
	
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <img class="logo" href="home" src="">
          <a class="navbar-brand" href="home">Banco M</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar">
              <li><a href="agencias" > Agencias</a></li>
              <li><a href="empresa" > Empresa</a></li>
              <li><a href="joinus" > Junte-se a nós</a></li>
              <li><a href="servicos" > Serviços</a></li>  
              <li><a href="suport" > Suporte</a></li>   
          </ul>

        @if (Auth::check())
        <ul class="nav navbar-nav navbar-right">
           <li><a href="{{$url = route('logout')}}"> Sair</a></li>
           <li><a href="homebanking" class="btn-info hb" id="hb"><span class="glyphicon glyphicon-home"></span> Homebanking</a></li>
       </ul>
        @else
          <form class="navbar-form navbar-right" method="POST" action="{{ url('/auth/login') }}">
            <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="text" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name= "password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
      
        @endif

      </div>

     </div> 
   </nav>
<div class="mid">
  <div class="container-fluid ">
      <div class="row">
      <div class="row placeholders">
      <div class="mainpage">
              @if (Session::has('flash_notification.message'))
                <p style="color:red;">{{ Session::get('flash_notification.message') }}</p>
              @endif
               @yield('content')

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
</div>
</body>
</html>