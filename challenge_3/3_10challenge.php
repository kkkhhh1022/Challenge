<?php
$user111 = array('id' => "111",'name' => "wakasa",'birth' => "1129",'address' => null); //addressをnullに
$user222 = array('id' => "222",'name' => "akiyama",'birth' => "0606",'address' => "ibaraki");
$user333 = array('id' => "333",'name' => "ansai",'birth' => "0923",'address' => "tochigi");
//課題6に伴いidのkeyを修正
$alluser = array($user111,$user222,$user333);
$limit = 2;//ここに制限回数を入力
$count = 0;

foreach($alluser as $arr_value){
	if($count > ($limit-1)){
		break;
	}
	foreach($arr_value as $key => $value){
		if($value == null||$key =='id'){
			continue; //課題9に伴いcontinue分岐を修正
		}
		echo $key."=".$value."/";
	}
	echo "<br/>";
	$count++;
}
//課題10