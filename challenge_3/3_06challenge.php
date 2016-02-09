<?php

function userdata($id){
	$user111 = array('name' => "wakasa",'birth' => "1129",'address' => "tokyo");
	$user222 = array('name' => "akiyama",'birth' => "0606",'address' => "ibaraki");
	$user333 = array('name' => "ansai",'birth' => "0923",'address' => "tochigi");
	
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