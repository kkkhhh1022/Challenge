<?php
$fp = fopen('hl_log.txt', 'w');
$date = date('d日H時i分s秒');
fwrite($fp, "$date"."...開始");

//ランダムな数値を返す関数
$dealer = mt_rand(1,13);
echo '先手は'.$dealer."です<br/>";
$draw = mt_rand(1,13);
echo "後手のオープン<br/>";

while ($draw == $dealer){
	echo "$draw"."で引き分け　再度オープン<br/>";
	$draw = mt_rand(1,13);
}

if($draw < $dealer){
	echo "$dealer".'対'."$draw"."　先手の勝利<br/>";
}else{
	echo "$dealer".'対'."$draw"."　後手の勝利<br/>";
}


$fp = fopen('hl_log.txt', 'a');
$date = date('d日H時i分s秒');
fgets($fp); 
fwrite($fp," "."$date"."...終了");
fclose($fp);

$fp = fopen('hl_log.txt','r');
$log1 = fgets($fp);
fclose($fp); 
echo "$log1"."<br/>";