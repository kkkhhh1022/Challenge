<?php

function seki($num1, $num2 = 5,$type = false){
	
	$result = $num1 * $num2;
	if($type == false){
		echo "$result<br/>";
	}
	else {
		$result *= $result;
		echo "$result<br/>";
	}
}

seki (3);
seki (3,5,true);
//課題3
