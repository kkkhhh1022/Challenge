<?php
try{

	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=sjis','ゆーざー','ぱす');

}catch(PDOException $Exception){

	die('接続に失敗しました:'.$Exception->getMessage());
}
$namae = mb_convert_encoding("松岡 修造", "sjis", "auto");

$sql = "update profiles set name=:name ,age=:age ,birthday=:birthday where profilesID=1";
$query = $pdo_object->prepare($sql);
$query -> bindValue(':name',$namae);
$query -> bindValue(':age',48);
$query -> bindValue(':birthday','1967-11-06');
$query -> execute();

$sql = "select * from profiles";
$query = $pdo_object->prepare($sql);
$query -> execute();
$data = array();
$data = $query -> fetchAll(PDO::FETCH_ASSOC);
print_r($data);

$pdo_object= null;
//課題7