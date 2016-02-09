<?php

$user111 = array('name' => "wakasa",'birth' => "1129",'address' => null); //addressをnullに
$user222 = array('name' => "akiyama",'birth' => "0606",'address' => "ibaraki");
$user333 = array('name' => "ansai",'birth' => "0923",'address' => "tochigi");

$alluser = array($user111,$user222,$user333);

	foreach($alluser as $arr_value){
		foreach($arr_value as $key => $value){
			if($value == null){
				continue; //nullの場合にスキップ
			}
		echo $key."=".$value."/";
		}
	echo "<br/>";
	}
//課題9