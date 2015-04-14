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
          <img class="logo" href="home" src="..\resources\assets\images\logo.png">
          <a class="navbar-brand" href="home">Banco M</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

        @if (Auth::check())
        <ul class="nav navbar-nav navbar-right">
    	     <li><a href="{{$url = route('logout')}}"> Log out</a></li>
    	     <li><a href="homebanking"> Homebanking</a></li>
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

	<div class="container-fluid ">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id="sidebardireita">
          <ul class="nav nav-sidebar lead esquerda">
        			<li><a href="agencias" > Agencias</a></li>
        			<li><a href="empresa" > Empresa</a></li>
        			<li><a href="joinus" > Junte-se a nós</a></li>
        			<li><a href="servicos" > Serviços</a></li> 	
              <li><a href="suport" > Suporte</a></li>   
    		  </ul>
        </div>
       
 


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="row placeholders">
		        @yield('content')
		          @if (Session::has('flash_notification.message'))
                <p style="color:red;">{{ Session::get('flash_notification.message') }}</p>
		          @endif
		      </div>
		    </div>
		  </div>
	</div>
</div>
</body>
<footer>

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
</footer>
</html>