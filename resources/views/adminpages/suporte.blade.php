@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>ID Cliente</th><th>Nome</th><th>E-mail</th><th>Questão</th>
    </tr>
@foreach($sup as $s)
  <tr>
      <td>{{$s->id}}</td>
      <td>{{$s->id_cliente}}</td>
      <td>{{$s->nome}}</td>
      <td>{{$s->email}}</td>
      <td>{{$s->question}}</td>
      <td><a href="{{ route('resp_suporte', $s->id ) }}">Responder</a></td>
</tr>
@endforeach
</table>
@stop