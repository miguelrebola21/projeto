@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>Nome</th><th>BI</th><th>Telefone</th><th>Morada</th><th>Código-Postal</th><th>E-mail</th><th>Estado de Validação</th>
    </tr>
  <tr>
      <td>{{$cli->id}}</td>
      <td>{{$cli->nome}}</td>
      <td>{{$cli->bi}}</td>
      <td>{{$cli->telefone}}</td>
      <td>{{$cli->morada}}</td>
      <td>{{$cli->cp}}</td>
      <td>{{$cli->email}}</td>
      <td>{{$cli->valido}}</td>
</tr>


</table>
{!! Form::open(['url' => route('update_clientes')]) !!}
    
    {!! Form::label('id', 'ID (não alterar):') !!}
    {!! Form::text('id',$cli->id) !!}
    <br>
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome',$cli->nome) !!}
    <br>
    {!! Form::label('bi', 'BI:') !!}
    {!! Form::text('bi',$cli->bi) !!}
    <br>
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone',$cli->telefone) !!}
    <br>
    {!! Form::label('morada', 'Morada:') !!}
    {!! Form::text('morada',$cli->morada) !!}
    <br>
    {!! Form::label('cp', 'cp:') !!}
    {!! Form::text('cp',$cli->cp) !!}
    <br>
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email',$cli->email) !!}
    <br>
    {!! Form::label('valido', 'Valido:') !!}
    {!! Form::text('valido',$cli->valido) !!}


    {!! Form::submit('Editar')!!}
{!! Form::close() !!}
@stop