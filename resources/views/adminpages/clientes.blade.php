@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>Nome</th><th>BI</th><th>Telefone</th><th>Morada</th><th>Código-Postal</th><th>E-mail</th><th>Estado de Validação</th><th>Alterar Dados</th>
    </tr>
@foreach($clientes as $cli)
  <tr>
      <td>{{$cli->id}}</td>
      <td>{{$cli->nome}}</td>
      <td>{{$cli->bi}}</td>
      <td>{{$cli->telefone}}</td>
      <td>{{$cli->morada}}</td>
      <td>{{$cli->cp}}</td>
      <td>{{$cli->email}}</td>
      <td>{{$cli->valido}}</td>
      <td><a href="{{ route('edit_clientes', $cli->id ) }}">Editar</a></td>
</tr>
@endforeach

</table>
@stop