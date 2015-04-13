@extends ('admin')

@section ('content')
{!! Form::open(['url' => route('registar_homebankings')]) !!}
    
    <br>
    {!! Form::label('id_cliente', 'ID Cliente:') !!}
    {!! Form::text('id_cliente') !!}
    <br>
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email') !!}
    <br>
    {!! Form::label('password', 'Password: (alterar sem encriptação)') !!}
    {!! Form::text('password') !!}


    {!! Form::submit('Adicionar') !!}
{!! Form::close() !!}
@stop