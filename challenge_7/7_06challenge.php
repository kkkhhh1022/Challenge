<?php
try{

	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=sjis','ゆーざー','ぱす');

}catch(PDOException $Exception){

	die('接続に失敗しました:'.$Exception->getMessage());
}


$sql = "delete from profiles where profilesID=6";
$query = $pdo_object->prepare($sql);

$query -> execute();

echo '削除しました';

$pdo_object= null;
//課題6