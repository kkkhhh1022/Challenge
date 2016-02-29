<?php
require_once '../common/defineUtil.php';


  function return_top(){
      return "<a href=".ROOT_URL.TOP_URI.">トップへ戻る</a>";
  }
 //回答1.<a href>内が正しくTOPページが参照されるような定数に修正
 
  function keep_val($key,$str){
  	if(!empty($_SESSION["$key"])){
  		echo $_SESSION["$key"];
  	}else{
  		echo "$str";
  	} 
  }
 //渡したキー名のSESSIONに値があれば表示する関数
 
  