@extends ('admin')

@section ('content')
  {!! Form::open(['url' => route('add_roles', $id)]) !!}
 

  @if(!in_array(1, $idroles))
    Nivel 1: Cliente
    {!!Form::checkbox('level1', '1')!!}
  @endif


  @if(!in_array(2, $idroles))
    <br>Nivel 2: Balcão
    {!!Form::checkbox('level2', '2')!!}
  @endif


  @if(!in_array(3, $idroles))
    <br>Nivel 3: Escritório
    {!!Form::checkbox('level3', '3')!!}
  @endif


  @if(!in_array(4, $idroles))
    <br>Nivel 4: Gerente
    {!!Form::checkbox('level4', '4')!!}
  @endif

  
  @if(!in_array(5, $idroles))
    <br>Nivel 5: Administrador
    {!!Form::checkbox('level5', '5')!!}
  @endif   

  <br>

    {!! Form::submit('Adicionar Permissões')!!}


@stop