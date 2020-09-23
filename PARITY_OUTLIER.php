<?php  
function getParity( $n) 
{ 
	$parity = 0; 
	while ($n) 
	{ 
		$parity = !$parity; 
		$n = $n & ($n - 1); 
	} 
	return $parity; 
} 

	$n = 7; 
	echo "Parity of no ",$n ," = " , 
		getParity($n)? "odd": "even"; 
	
?> 
