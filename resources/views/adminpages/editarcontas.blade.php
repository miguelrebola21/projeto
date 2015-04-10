@extends ('admin')

@section ('content')
<table>
   <tr>
    <th>ID</th><th>Pin</th><th>Tipo</th><th>Agência</th><th>Saldo</th><th>Editar</th>
    </tr>
  <tr>
      <td>{{$con->id}}</td>
      <td>{{$con->pin}}</td>
      <td>{{$con->tipo}}</td>
      <td>{{$con->agencia}}</td>
      <td>{{$con->saldo}}</td>
  </tr>
</table>

{!! Form::open(['url' => route('update_contas')]) !!}
    
    {!! Form::label('id', 'ID (não alterar):') !!}
    {!! Form::text('id',$con->id) !!}
    <br>
    {!! Form::label('pin', 'Pin:') !!}
    {!! Form::text('pin',$con->pin) !!}
    <br>
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo',$con->tipo) !!}
    <br>
    {!! Form::label('agencia', 'Agência:') !!}
    {!! Form::text('agencia',$con->agencia) !!}
    <br>
    {!! Form::label('saldo', 'Saldo:') !!}
    {!! Form::text('saldo',$con->saldo) !!}

    {!! Form::submit('Editar')!!}
{!! Form::close() !!}
@stop