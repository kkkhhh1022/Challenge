<?php

function double(){
	global $number;
	static $count;
	$number *=2;
	$count++;
	echo $count."回試行<br/>";
}

$number = 3;
for($i = 0;$i < 20;$i++){
	double();
} //関数を20回呼び出す処理を追加

echo $number;
//課題7