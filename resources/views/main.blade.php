<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
		<br>
		<br>
		<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="text" name="user">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me&nbsp
										<button type="submit" class="btn btn-primary" style="float:right;">Login</button>
									</label>
								</div>
							</div>
						</div>
							
							</form>

	
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
		</ul>
			@yield('content')
		</div>

		@yield('footer')

	</body>
</html>