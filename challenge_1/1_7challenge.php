<?php
$syubetsu = $_GET['syubetsu'];
$sougaku = $_GET['sougaku'];
$kosu = $_GET['kosu'];

if ($syubetsu == 1){
	echo '雑貨';
} elseif ($syubetsu == 2){
	echo '生鮮食品';
} elseif ($syubetsu == 3){
	echo 'その他';
} else {
	echo '$syubetsuが'."$syubetsu".'の処理は存在しません';
}
//設問①

$tanka = $sougaku / $kosu;
echo '<br/>';
echo '1個'."$tanka".'円';
//設問②

echo '<br/>';
if (($sougaku * $kosu >= 3000) && ($sougaku * $kosu < 5000 ) ){
	$point = $sougaku * $kosu / 100 * 4;
	echo 'お買い物の4%で'."$point".'ポイント';
} elseif ($sougaku * $kosu >= 5000){
	$point = $sougaku * $kosu / 100 * 5;
	echo 'お買い物の5%で'."$point".'ポイント';
}
//設問③