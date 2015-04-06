@extends ('hb')

@section ('content')
    {!! Form::open(['url' => 'transf'])  !!}


		Conta a ser Debitada:
	
		 
		{!! Form::select('origem', $idcontas) !!}
		<br>
  		{!! Form::label('destino', 'Nº de Conta de Destino:') !!}
		{!! Form::text('destino') !!}
	    <br>
		{!! Form::label('valor', 'Valor:') !!}
		{!! Form::text('valor') !!}
		<br>
		Tipo:
		<br>
		{!! Form::label('tipo', 'Transferência Bancária:') !!}
		{!! Form::radio('tipo', 'TB') !!}
		<br>
		{!! Form::label('tipo', 'Pagamento de Serviços:') !!}
		{!! Form::radio('tipo', 'PS') !!}
		<br>
		Observações:
		<br>
		{!! Form::textarea('observacoes') !!}
		<br>
		{!! Form::submit('Enviar aplicação')!!}
  	{!! Form::close() !!}
@stop