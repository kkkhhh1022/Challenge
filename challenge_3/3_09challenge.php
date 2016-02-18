<?php

$user111 = array('id' => "111",'name' => "wakasa",'birth' => "1129",'address' => null); //addressをnullに
$user222 = array('id' => "222",'name' => "akiyama",'birth' => "0606",'address' => "ibaraki");
$user333 = array('id' => "333",'name' => "ansai",'birth' => "0923",'address' => "tochigi");
//課題6に伴いidのkeyを修正
$alluser = array($user111,$user222,$user333);

	foreach($alluser as $arr_value){
		foreach($arr_value as $key => $value){
			if($value == null||$key =='id'){
				continue; //valueがnull、またはkeyがidの場合にechoしない
			}
		echo $key."=".$value."/";
		}
	echo "<br/>";
	}
//課題9