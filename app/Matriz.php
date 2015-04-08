<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriz extends Model {

	//


	public function test($bi){

		srand($bi);
		
   		for ($i=1;$i<8;$i++){

   			for ($j=0;$j<7;$j++){

   				for ($z=0;$z<3;$z++){
   					$matriz[$i][$j][$z]=rand(0,9);
   				}
   			}
   		}
			return $matriz;
	}




}
