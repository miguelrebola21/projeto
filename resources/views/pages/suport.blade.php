@extends ('main')

@section ('content')
  {!! Form::open(['url' => 'suport']) !!}

  	{!! Form::label('nome', 'Nome:') !!}
	{!! Form::text('nome') !!}
    <br>
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email') !!}
    <br>
    {!! Form::label('id_cliente', 'Se for cliente: NºCliente:') !!}
    {!! Form::text('id_cliente') !!}
    <br>
    {!! Form::label('question', 'Insira aqui a sua questão:') !!}<br>
    {!! Form::textarea('question', '') !!}
	{!! Form::submit('Enviar aplicação')!!}
  {!! Form::close() !!}
@stop