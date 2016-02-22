<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>データベース検索</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION)){
	try{
	
		$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=sjis','ゆーざー','ぱす');
	
	}catch(PDOException $Exception){
	
		die('接続に失敗しました:'.$Exception->getMessage());
	}
	$key = $_SESSION['search'];
	$namae = mb_convert_encoding("%$key%", "sjis", "auto");
	$sql = "select * from profiles where name like :name";
	$query = $pdo_object->prepare($sql);
	$query -> bindValue(':name',$namae);
	$query -> execute();
	
	$data = array();
	$data = $query -> fetchAll(PDO::FETCH_ASSOC);
	
	if(isset($data[0])){
		echo $data[0]['profilesID'].'/'.$data[0]['name'].'/'.$data[0]['tell'].'/'.$data[0]['age'].'/'.$data[0]['birthday'];
	}
	$pdo_object= null;
	
}
//検索機能
if($_POST==null){?>
	<form method="POST" action="7_08challenge.php" class="search">
	<input type="text" name="ward" class="textbox"><input type="submit" value="検索" class="btn">
<?php }else{ 
	echo '<meta http-equiv="refresh" content="1;URL=7_08challenge.php">';
	echo "<br/>".'検索します';
	$_SESSION['search']=$_POST['ward'];
}
//検索ワードをセッションに保管
?>

</form>
</body>
</html>
<!-- 課題8 -->