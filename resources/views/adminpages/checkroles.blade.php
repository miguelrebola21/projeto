@extends ('admin')

@section ('content')
<table>
    <tr>
    <th>ID</th><th>Nome</th><th>BI</th><th>Telefone</th><th>Morada</th><th>Código-Postal</th><th>E-mail</th><th>Estado de Validação</th>
    </tr>
  <tr>
      <td>{{$cliente->id}}</td>
      <td>{{$cliente->nome}}</td>
      <td>{{$cliente->bi}}</td>
      <td>{{$cliente->telefone}}</td>
      <td>{{$cliente->morada}}</td>
      <td>{{$cliente->cp}}</td>
      <td>{{$cliente->email}}</td>
      <td>{{$cliente->valido}}</td>
  </tr>
</table>

<table>
<tr>
<th>ID</th><th>Designação</th><th>Remover</th>
</tr>
@foreach($role as $rol)
  <tr>
      <td>{{$rol->id}}</td>
      <td>{{$rol->name}}</td>
      <td><a href="{{ route('remove_role',array($cliente->id,$rol->id))}}">Remover Role</a></td>
  </tr>
  @endforeach
</table>
<a href="{{ route('add_roles',$cliente->id)}}">Adicionar Role</a>
@stop