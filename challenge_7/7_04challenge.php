<?php
try{

	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=SJIS','ゆーざー','ぱす');

}catch(PDOException $Exception){

	die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "select * from profiles where profilesID=1";
$query = $pdo_object->prepare($sql);
$query -> execute();

$data = array();
$data = $query -> fetchAll(PDO::FETCH_ASSOC);
print_r($data);

$pdo_object= null;
//課題4