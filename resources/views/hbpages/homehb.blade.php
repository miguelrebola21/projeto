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

<div class="correio">
  <table >
    <tr>
    <th>ID</th><th>Assunto</th><th>Mensagem</th><th>Origem</th><th>Destino</th>
    </tr>
@foreach($correio as $cor)
  <tr>
      <td>{{$cor->id}}</td>
      <td>{{$cor->assunto}}</td>
      <td>{{$cor->msg}}</td>
      <td>{{$cor->de}}</td>
      <td>{{$cor->para}}</td>
</tr>
@endforeach

</table>

</div>
<div class="movimentos">
  <table >
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
</div>



<div class="saldo">
  
 <table >
    <tr>
    <th>Nº Conta</th><th>Saldo</th>
    </tr>

     @for ($i = 0; $i < count($saldocontas); $i++)

  <tr>
      <td>{{$idcontas[$i]}}</td>
      <td>{{$saldocontas[$i]}}</td>


</tr>
    @endfor
</table>
</div>    
@stop