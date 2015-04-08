@extends ('hb')

@section ('content')
	{!! Form::open(['url' => route('validation')])  !!}
	 <?php
	 $l=rand(1,7);          
	 $n=rand(1,7); 
	 $p=rand(0,2);
	 $le=chr($l+96);

	 if (isset($teste)){
	 	echo "Tente Novamente, valores errados.";
	 }
	 ?>

	Insira o valor que se encontra nas seguintes coordenadas do seu cartão Matriz M:
	<br>
	{!! $le !!}{!! $n !!} - {!!$p+1!!}º posição
	{!! Form::text('valor') !!}
	{!! Form::hidden('bi', $bi) !!}
	{!! Form::hidden('mov_id',$mov_id) !!}


	{!! Form::hidden('y', $l) !!}
	{!! Form::hidden('x', $n) !!}
	{!! Form::hidden('z', $p) !!}


	<br>
	{!! Form::submit('Enviar aplicação')!!}
  	{!! Form::close() !!}

@stop