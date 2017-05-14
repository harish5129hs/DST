 
 <?php
 $outer = explode(" ", 'rameshykannan@gmail.com OR ryk1@le.ac.uk');
						        
						        for ($i=0; $i <count($outer) ; $i++) { 
						        	

						        	$inner = explode(",",$outer[$i]);
						        	for ($j=0; $j <count($inner) ; $j++) { 
						        			

						        			$inner2 = explode(PHP_EOL,$inner[$j]);
						        	      for ($k=0; $k <count($inner2) ; $k++) { 
						        			
						        	      	if(($inner2[$k]!=" ")&&($inner2[$k]!="")){
						        			echo $inner2[$k]."|";
						       				}
						        		}
						        		}
						        }

						        ?>