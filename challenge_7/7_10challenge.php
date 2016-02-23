<?php
try{
	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=sjis','ゆーざー','ぱす');
}catch(PDOException $Exception){
	die('接続に失敗しました:'.$Exception->getMessage());
}
session_start();



if($_POST==null){?>
<form method="POST" action="7_10challenge.php">
profilesID
<input type="text" name="profilesID">

<input type="submit" value="データ削除">
<?php
}

if(isset($_POST['profilesID'])){

	$sql = "delete from profiles where profilesID=:id";
	$query = $pdo_object->prepare($sql);
	$query -> bindValue(':id',$_POST['profilesID']);
	$query -> execute();

	$pdo_object= null;
	echo "削除しました<br/>";
	$_POST['profilesID'] = array();
	?><a href="7_10challenge.php">入力画面に戻る</a>
<?php } ?>
</form>
</body>
</html>
<!--課題10-->