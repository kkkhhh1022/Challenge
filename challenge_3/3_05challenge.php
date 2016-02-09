<?php

function userdata(){
	$id = "12345";
	$name = "wakasa";
	$birth = "1129";
	$address = "tokyo";
	return array("$id","$name","$birth","$address");
	
}
$result = userdata();
echo $result[1]."/".$result[2]."/".$result[3];
//課題5