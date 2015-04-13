@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>ID Cliente</th><th>Nome</th><th>E-mail</th><th>Questão</th>
    </tr>
    <tr>
      <td>{{$s->id}}</td>
      <td>{{$s->id_cliente}}</td>
      <td>{{$s->nome}}</td>
      <td>{{$s->email}}</td>
      <td>{{$s->question}}</td>
</tr>
</table>

{!! Form::open(['url' => route('responder_suporte')]) !!}
    <br>
    {!! Form::hidden('id', $s->id) !!}
    <br>
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', $s->email) !!}
    <br>
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::text('id_cliente', $s->id_cliente) !!}
    <br>
    {!! Form::label('mensagem', 'Mensagem:') !!}
    {!! Form::textarea('mensagem') !!}


    {!! Form::submit('Adicionar') !!}
{!! Form::close() !!}

@stop