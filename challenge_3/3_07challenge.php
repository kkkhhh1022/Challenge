<?php

function double(){
	global $number;
	static $count;
	for($i = 0;$i < 10;$i++){
		$number *=2;
		$count++;
	}
	echo $count."回試行<br/>";
}

$number = 3;
double();
echo $number;
//課題7