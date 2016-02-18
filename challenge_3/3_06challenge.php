<?php

function userdata($id){
	$user111 = array('id' => "111",'name' => "wakasa",'birth' => "1129",'address' => "tokyo");
	$user222 = array('id' => "222",'name' => "akiyama",'birth' => "0606",'address' => "ibaraki");
	$user333 = array('id' => "333",'name' => "ansai",'birth' => "0923",'address' => "tochigi");
	//idのkeyを追加
	if($id == "111"){
		$result = $user111;
	}
	elseif($id == "222"){
		$result = $user222;
	}
	elseif($id == "333"){
		$result = $user333;
	}
	return $result;
}

//userdataにidを引数として渡すと、対応したユーザー情報が返ってくる
$output = userdata("111");
echo $output['name']."/".$output['birth']."/".$output['address']."<br/>";
$output = userdata("222");
echo $output['name']."/".$output['birth']."/".$output['address']."<br/>";
$output = userdata("333");
echo $output['name']."/".$output['birth']."/".$output['address']."<br/>";
//課題6