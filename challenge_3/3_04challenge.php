<?php
function my_profile(){
	echo "私の名前は若狭です<br/>";
	echo "誕生日は11/29<br/>";
	echo "蕎麦がすきです<br/>";
$result = true;
return $result;
}
for($i=0;$i<10;$i++){
	$v = my_profile();
	if($v == true){
		echo "この関数は正しく実行されました<br/>";
	}
}
//課題4