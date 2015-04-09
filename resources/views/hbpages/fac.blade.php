@extends ('hb')

@section ('content')
    {!! Form::open(['url' => route('fac')])  !!}
		FACTURAS

		Conta a ser Debitada:
	
		 
		{!! Form::select('origem',$idcontas) !!}
		<br>
  		{!! Form::label('destino', 'Entidade presente na factura:') !!}
		{!! Form::text('destino') !!}
		<br>
		{!! Form::label('observacoes', 'Referência presente na factura:') !!}
		{!! Form::text('observacoes') !!}
	    <br>
		{!! Form::label('valor', 'Valor:') 	!!}
		{!! Form::text('valor') 			!!}
		<br>
		{!! Form::submit('Enviar aplicação')!!}
  	{!! Form::close() !!}
@stop