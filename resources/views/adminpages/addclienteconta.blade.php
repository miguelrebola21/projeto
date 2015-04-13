@extends ('admin')

@section ('content')


{!! Form::open(['url' => route('add_cliente_conta')]) !!}

	{!! Form::label('idconta', 'Nova Conta:') !!}
    {!! Form::text('idconta',$id) !!}
    <br>
    {!! Form::label('nc1', 'NºCliente:') !!}
    {!! Form::text('nc1') !!}
    <br>
    {!! Form::label('nc2', 'NºCliente:') !!}
    {!! Form::text('nc2') !!}
    <br>
    {!! Form::label('nc3', 'NºCliente:') !!}
    {!! Form::text('nc3') !!}

    {!! Form::submit('Adicionar')!!}
{!! Form::close() !!}
@stop