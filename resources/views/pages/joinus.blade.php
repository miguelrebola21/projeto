@extends ('main')

@section ('content')
  <h1> Junte-se a nós ! </h1>

  <hr>

  {!! Form::open(['url' => 'joinus']) !!}

  		{!! Form::label('nome', 'Nome:') !!}
		{!! Form::text('nome') !!}
		<br>
		{!! Form::label('bi', 'BI:') !!}
		{!! Form::text('bi') !!}

		{!! Form::submit('Enviar aplicação')!!}
  {!! Form::close() !!}
@stop