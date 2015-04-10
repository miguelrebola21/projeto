@extends ('hb')

@section ('content')
  <h3> Envie aqui a sua Mensagem para outro Cliente ! </h3>

  <hr>

  {!! Form::open(['url' => route('sendcorreio')]) !!}
    {!! Form::label('para', 'Destino:') !!}
    {!! Form::text('para') !!}
    <br>
    {!! Form::label('assunto', 'Assunto:') !!}
    {!! Form::text('assunto') !!}
    <br>
    <b>Mensagem:</b><br>
    {!! Form::textarea('msg') !!}
    {!! Form::submit('Enviar aplicação')!!}
  {!! Form::close() !!}


@stop