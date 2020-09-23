<?php 

$ROW = 5; 
$COL = 5; 

function isSafe(&$M, $row, $col, 
				&$visited) 
{ 
	global $ROW, $COL; 
	return ($row >= 0) && ($row < $ROW) &&	 
		($col >= 0) && ($col < $COL) &&	 
		($M[$row][$col] && 
			!isset($visited[$row][$col])); 
} 

function DFS(&$M, $row, $col, &$visited) 
{ 

	$rowNbr = array(-1, -1, -1, 0, 
					0, 1, 1, 1); 
	$colNbr = array(-1, 0, 1, -1, 
					1, -1, 0, 1); 

	
	$visited[$row][$col] = true; 

	for ($k = 0; $k < 8; ++$k) 
		if (isSafe($M, $row + $rowNbr[$k], 
				$col + $colNbr[$k], $visited)) 
			DFS($M, $row + $rowNbr[$k], 
				$col + $colNbr[$k], $visited); 
} 

function countIslands(&$M) 
{ 
	global $ROW, $COL; 
	$visited = array(array()); 

	
	$count = 0; 
	for ($i = 0; $i < $ROW; ++$i) 
		for ($j = 0; $j < $COL; ++$j) 
			if ($M[$i][$j] && 
				!isset($visited[$i][$j])) 
			{	
				DFS($M, $i, $j, $visited); 
				++$count;				
			}			

	return $count; 
} 


$M = 	array(array(1, 1, 0, 0, 0), 
		array(0, 1, 0, 0, 1), 
		array(1, 0, 0, 1, 1), 
		array(0, 0, 0, 0, 0), 
		array(1, 0, 1, 0, 1)); 

echo "Number of islands is: ", 
			countIslands($M); 
?> 
