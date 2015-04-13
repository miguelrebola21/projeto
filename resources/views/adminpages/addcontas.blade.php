@extends ('admin')

@section ('content')


{!! Form::open(['url' => route('add_contas')]) !!}

    {!! Form::label('pin', 'Pin:') !!}
    {!! Form::text('pin') !!}
    <br>
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo') !!}
    <br>
    {!! Form::label('agencia', 'Agência:') !!}
    {!! Form::text('agencia') !!}
    <br>
    {!! Form::label('saldo', 'Saldo:') !!}
    {!! Form::text('saldo') !!}

    {!! Form::submit('Adicionar')!!}
{!! Form::close() !!}
@stop