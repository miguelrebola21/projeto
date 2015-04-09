<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriz extends Model {

	//


	public function test($bi){

		srand($bi);
		
   		for ($i=1;$i<8;$i++){

   			for ($j=1;$j<8;$j++){

   				for ($z=1;$z<4;$z++){
   					$matriz[$i][$j][$z]=rand(0,9);
   				}
   			}
   		}
			return $matriz;
	}




}
