@extends ('hb')

@section ('content')
<style>
td {
    border: solid 2px lightgrey;
}
th {
    border: solid 2px lightgrey;
}
tr {
    border: solid 2px lightgrey;
}
</style>




 {!! Form::open(['url' => route('cons')])  !!}
	Descrição:
	{!! Form::select('descricao', [
	'T' => 'Todos os Movimentos',
   	'PS' => 'Pagamento de Serviços',
   	'TB' => 'Transferências Bancárias',
   	'TEL' => 'Carregamento Telemóvel',
   	'FA' => 'Facturas',
   	'PR' => 'Prestações',
   	'REV' => 'Reversão de Pagamentos'
   ]
) !!}
	Data dos Movimentos:
	{!! Form::select('data', [
	's' => 'desde sempre',
   	'h' => 'hoje',
   	'o' => 'ontem',
   	'us' => 'ultima semana',
   	'um' => 'ultimo mês',
   	'usm' => 'ultimos 6 meses'
   ]  
) !!}
	Tipo:
	{!! Form::select('tipo', [
	'a' => 'ambos',
   	'd' => 'Débito',
   	'c' => 'Crédito',
   ]  
) !!}

<br>
<br>
<br>

  	<table>
  	<tr>
  	<th>Id</th>    <th>Origem</th>    <th>Destino</th>    <th>Valor</th>    <th>Data</th>    <th>Tipo</th> <th>Observações</th>
  	</tr>

  	 @foreach($movimentos as $mov)
  <tr>
      <td>{{$mov->id}}</td>
      <td>{{$mov->origem}}</td>
      <td>{{$mov->destino}}</td>
      <td>{{$mov->valor}}</td>
      <td>{{$mov->data}}</td>
      <td>{{$mov->tipo}}</td>
      <td>{{$mov->observacoes}}</td>

</tr>
@endforeach
	
  	</table>
  	<br>
  	<br>
  	
  	{!! Form::submit('Aplicar Filtros')!!}
	{!! Form::reset('Limpar Filtros')!!}
  	{!! Form::close() !!}
@stop