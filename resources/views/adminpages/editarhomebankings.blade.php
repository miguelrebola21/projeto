@extends ('admin')

@section ('content')
<table>
   <tr>
    <th>ID</th><th>ID Cliente</th><th>E-mail</th><th>Password</th><th>Estado de Validação</th>
    </tr>
  <tr>
      <td>{{$hb->id}}</td>
      <td>{{$hb->id_cliente}}</td>
      <td>{{$hb->email}}</td>
      <td>{{$hb->password}}</td>
      <td>{{$hb->valido}}</td>
      </tr>
      </table>


{!! Form::open(['url' => route('update_homebankings')]) !!}
    
    {!! Form::label('id', 'ID (não alterar):') !!}
    {!! Form::text('id',$hb->id) !!}
    <br>
    {!! Form::label('id_cliente', 'ID Cliente:') !!}
    {!! Form::text('id_cliente',$hb->id_cliente) !!}
    <br>
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email',$hb->email) !!}
    <br>
    {!! Form::label('password', 'Password Encriptada:(alterar sem encriptação)') !!}
    {!! Form::text('password',$hb->password) !!}
    <br>
    {!! Form::label('valido', 'Estado de Validação:') !!}
    {!! Form::text('valido',$hb->valido) !!}

    {!! Form::submit('Editar') !!}
{!! Form::close() !!}
@stop