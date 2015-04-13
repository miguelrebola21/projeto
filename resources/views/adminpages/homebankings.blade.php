@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>ID Cliente</th><th>E-mail</th><th>Password</th><th>Estado de Validação</th>
    </tr>
@foreach($homebankings as $hb)
  <tr>
      <td>{{$hb->id}}</td>
      <td>{{$hb->id_cliente}}</td>
      <td>{{$hb->email}}</td>
      <td>{{$hb->password}}</td>
      <td>{{$hb->valido}}</td>
      <td><a href="{{ route('edit_homebankings', $hb->id ) }}">Editar</a></td>
</tr>
@endforeach
  <a href="{{ route('add_homebankings') }}">Adicionar Homebanking</a>
</table>
@stop