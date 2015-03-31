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
    <br>
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone') !!}
    <br>
    {!! Form::label('morada', 'Morada:') !!}
    {!! Form::text('morada') !!}
    <br>
    {!! Form::label('cp', 'cp:') !!}
    {!! Form::text('cp') !!}
    <br>
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email') !!}
    


		{!! Form::submit('Enviar aplicação')!!}
  {!! Form::close() !!}

  @if ($errors->any())
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  @endif
@stop