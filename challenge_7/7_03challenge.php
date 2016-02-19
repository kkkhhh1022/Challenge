<?php

try{

	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=SJIS','ゆーざー','ぱす');

}catch(PDOException $Exception){

	die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "select * from profiles";
$query = $pdo_object->prepare($sql);
$query -> execute();

$data = array();
$data = $query -> fetchAll(PDO::FETCH_ASSOC);
print_r($data);

//fetchallで一括取得する作戦

/*
  while($data = $query -> fetch(PDO::FETCH_ASSOC)){
  print_r($data);
  echo "<br/>";
  } 
*/
//fetchを複数回まわす作戦

$pdo_object= null;
//課題3