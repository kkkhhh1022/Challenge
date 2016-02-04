<?php
$n = $_GET['soinsu'];
$moto = $_GET['soinsu'];
$p2 = 0;
$p3 = 0;
$p5 = 0;
$p7 = 0;
$i = 0;

while ($i == 0){

	if ($n % 2 == 0){
		$n = $n / 2;
		$p2 = $p2 + 1;

	}elseif ($n % 3 == 0){
		$n = $n / 3;
		$p3 = $p3 + 1;

	}elseif ($n % 5 == 0){
		$n = $n / 5;
		$p5 = $p5 + 1;

	}elseif ($n % 7 == 0){
		$n = $n / 7;
		$p5 = $p7 + 1;	
	}else {
		$i = 1;
	}
}
//素因数を求める、$pxにはそれぞれの素数で割った回数がカウントされる


echo '元の値'."$moto".'<br/>';
echo '1桁の素因数';
if ($p2 >= 1){
	echo '2';
}
if ($p2 >= 2){
	echo '^'."$p2";
}

if ($p3 >= 1){
	if ($p2 >= 1){
		echo '*';
	}
	echo '3';
}
if ($p3 >= 2){
	echo '^'."$p3";
}

if ($p5 >= 1){
	if ($p3 >= 1){
		echo '*';
	}
	echo '5';
}
if ($p5 >= 2){
	echo '^'."$p5";
}

if ($p7 >= 1){
	if($p5 >= 1){
		echo '*';
	}
	echo '7';
}
if ($p7 >= 2){
	echo '^'."$p7";
}
//ある素数で一度でも割っていたらechoする。その上で指数が2以上だった場合のみ指数をechoする。
//更に3,5,7は手前のechoがあった場合のみ積の記号をechoする。

echo '<br/>';
if ($n >= 10){
	echo 'その他'."$n";
}
//二桁以上の素数をechoする