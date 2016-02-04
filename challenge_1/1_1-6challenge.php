<?php

echo 'hello world!!<br/>';
//課題1

$message ='groove';
$message2 ='_';
const MOJI ='gear';
echo $message.$message2.MOJI.'<br/>';
//課題2

echo "私の名前は若狭です<br/>";
const AGE ='23';
echo AGE."歳です<br/>";
//課題3

$n1 = 9;
const N2 = 3;

$calc1 = $n1 + N2; 
$calc2 = $n1 - N2;
$calc3 = $n1 * N2;
$calc4 = $n1 / N2;
echo $calc1.'と'.$calc2.'と'.$calc3.'と'.$calc4;
//課題4と5

echo '<br/>';

$i = 1;

if($i == 1){
	echo '1です';

}elseif($i == 2){
	echo 'プログラミングキャンプ！';

}elseif($i == 3){
	echo '文字です';

}else{
	echo'それ以外です';
}
//課題6