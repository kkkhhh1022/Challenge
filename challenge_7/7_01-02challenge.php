<?php
try{
	
	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','ゆーざー','ぱす');

}catch(PDOException $Exception){
	
	die('接続に失敗しました:'.$Exception->getMessage());
}

$sql = "insert into profiles values(:profilesID,:name,:tell,:age,:birthday)";
$query = $pdo_object->prepare($sql);
$query -> bindValue(':profilesID',6);
$query -> bindValue(':name','ああああ'); 
$query -> bindValue(':tell','090-xxxx-yyyy');
$query -> bindValue(':age',20);	
$query -> bindValue(':birthday','1996-6-6');

$query -> execute();
echo '追加できた';

$pdo_object= null;

//課題1-2