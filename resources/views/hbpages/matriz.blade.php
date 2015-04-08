@extends ('hb')

@section ('content')
   <table>
   <tr>
   <th>ID</th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th>
   </tr>

   <?php 
   		srand($bi);
   		for ($i=1;$i<8;$i++){

   			for ($j=0;$j<7;$j++){
   				for ($z=0;$z<3;$z++){
   					$matriz[$i][$j][$z]=rand(0,9);
   				}
   			}
   		}



   		for ($i=1;$i<8;$i++){
   		echo '<tr>';
   		echo '<td>'.$i.'</td>';
   			for ($j=0;$j<7;$j++){
   				echo '<td>';
   				for ($z=0;$z<3;$z++){
   					echo $matriz[$i][$j][$z];
   				}
   				echo '</td>';
   			}
   			echo '</tr>';
   		}


   ?>

</table>
@stop