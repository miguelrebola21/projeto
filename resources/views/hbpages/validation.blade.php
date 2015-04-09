@extends ('hb')

@section ('content')
	{!! Form::open(['url' => route('validation')])  !!}
	 <?php
	 use App\Matriz;
	 $rand=substr((string)microtime(), 2, 5);
	 srand($rand);
	 $l=rand(1,7);          
	 $n=rand(1,7); 
	 $p=rand(1,3);
	 $le=chr($l+96);
	 $m= new Matriz;
	 $matriz_cliente=$m->test($bi);
	 echo $matriz_cliente[$n][$l][$p];

	 if (isset($teste)){
	 	echo "Tente Novamente, valores errados.";
	 }
	 ?>

	Insira o valor que se encontra nas seguintes coordenadas do seu cartão Matriz M:
	<br>
	{!! $n !!}{!! $le !!} - {!!$p!!}º posição
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