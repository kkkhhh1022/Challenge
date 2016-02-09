<?php
function my_profile(){
	echo "私の名前は若狭です<br/>";
	echo "誕生日は11/29<br/>";
	echo "蕎麦がすきです<br/>";
}
function guki($i){
	if ($i % 2 == 0) {
		echo "偶数";
	}else{
		echo "奇数";
	}
}
//課題8参照用ファイル