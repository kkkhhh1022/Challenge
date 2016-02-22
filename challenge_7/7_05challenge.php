<?php
try{

	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=sjis','ゆーざー','ぱす');

}catch(PDOException $Exception){

	die('接続に失敗しました:'.$Exception->getMessage());
}

$namae = mb_convert_encoding("%茂%", "sjis", "auto");
//テキストエディタとサーバー間の文字コードの差異を修正する関数
$sql = "select * from profiles where name like :name";
$query = $pdo_object->prepare($sql);
$query -> bindValue(':name',$namae);

$query -> execute();

$data = array();
$data = $query -> fetchAll(PDO::FETCH_ASSOC);
print_r($data);


$pdo_object= null;
//課題5