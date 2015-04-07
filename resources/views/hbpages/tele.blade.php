@extends ('hb')

@section ('content')
    {!! Form::open(['url' => route('tele')])  !!}
		TELEMOVEIS


		Conta a ser Debitada:
	
		 
		{!! Form::select('origem', $idcontas) !!}
		<br>
		Operadora:
  		{!! Form::select('destino', [
				'1' => 'OEM',
   				'2' => 'SON',
  				'3' => 'ENOFADOV'
  		]) !!}
  		<br>
		{!! Form::label('observacoes', 'Nº de Telemóvel:') !!}
		{!! Form::text('observacoes') !!}
	    <br>
		{!! Form::label('valor', 'Valor:') !!}
		{!! Form::text('valor') !!}
		<br>
		{!! Form::submit('Enviar aplicação')!!}
  	{!! Form::close() !!}
@stop