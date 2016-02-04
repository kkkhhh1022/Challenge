<?php

$n = 0;
switch ( $n ){
	case 1: echo 'one';
	break;
	
	case 2: echo 'two';
	break;
	
	default : echo '想定外の値';
	break;
}
echo '<br/>';
//課題1

$moji = 'あ';
switch ( $moji ){
	case 'A': echo '英語';
	break;
	
	case 'あ': echo '日本語';
	break;
	
}
echo '<br/>';
//課題2

$r = 8;
for ($i=0; $i<20; $i++){
	$r = $r * 8;
}
echo "$r";
echo '<br/>';
//課題3

$A = 'A';
//echo "$A";
for($i=0; $i<30; $i++){
	$A = "$A".'A';
}
echo "$A";
echo '<br/>';
//課題4

$v = 0;
for ($i=0; $i<=100; $i++){
	$v = $v + $i;
}
echo "$v";
echo '<br/>';
//課題5

$waru = 1000;
while ($waru >= 100){
	$waru = $waru / 2;
}
echo "$waru";
echo '<br/>';
//課題6

$arr = array(10,100,'soeda','hayashi',-20,118,'END');
//課題7
$arr[2] = 33;
echo $arr[2];
echo '<br/>';
//課題7と8

$arr2 = array(1 => 'AAA','hello' => 'world','soeda' => 33, 20 => 20);
echo $arr2[1].$arr2['hello'].$arr2['soeda'].$arr2[20];
echo '<br/>';
//課題9	