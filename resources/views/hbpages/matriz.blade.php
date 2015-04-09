@extends ('hb')

@section ('content')
   <table>
   <tr>
   <th>ID</th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th>
   </tr>

   <?php 
   		srand($bi);
   		for ($i=1;$i<8;$i++){

   			for ($j=1;$j<8;$j++){
   				for ($z=1;$z<4;$z++){
   					$matriz[$i][$j][$z]=rand(0,9);
   				}
   			}
   		}



   		for ($i=1;$i<8;$i++){
   		echo '<tr>';
   		echo '<td>'.$i.'</td>';
   			for ($j=1;$j<8;$j++){
   				echo '<td>';
   				for ($z=1;$z<4;$z++){
   					echo $matriz[$i][$j][$z];
   				}
   				echo '</td>';
   			}
   			echo '</tr>';
   		}


   ?>

</table>
@stop