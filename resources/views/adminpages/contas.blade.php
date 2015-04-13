@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>Pin</th><th>Tipo</th><th>Agência</th><th>Saldo</th><th>Editar</th>
    </tr>
@foreach($conta as $con)
  <tr>
      <td>{{$con->id}}</td>
      <td>{{$con->pin}}</td>
      <td>{{$con->tipo}}</td>
      <td>{{$con->agencia}}</td>
      <td>{{$con->saldo}}</td>
      <td><a href="{{ route('edit_contas', $con->id ) }}">Editar</a></td>
</tr>
@endforeach
  <a href="{{ route('add_contas') }}">Adicionar Conta</a>
</table>
@stop