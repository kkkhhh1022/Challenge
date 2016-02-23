<html>
<body>

<?php
try{
	$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=sjis','ゆーざー','ぱす');
}catch(PDOException $Exception){
	die('接続に失敗しました:'.$Exception->getMessage());
}
session_start();



if($_POST==null){?>
<form method="POST" action="7_11challenge.php">
選択profilesID
<input type="text" name="profilesID">
name
<input type="text" name="name">
tell
<input type="text" name="tell">
age
<input type="text" name="age">
birthday
<input type="text" name="birthday">
<input type="submit" value="データ上書き">
<?php
}

if(isset($_POST['profilesID'],$_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])){

	$keyname = $_POST['name'];
	$namae = mb_convert_encoding("$keyname", "sjis", "auto");
	$sql = "update profiles set name=:name,tell=:tell,age=:age,birthday=:birthday where profilesID=:id";
	$query = $pdo_object->prepare($sql);
	$query -> bindValue(':id',$_POST['profilesID']);
	$query -> bindValue(':name',$namae);
	$query -> bindValue(':tell',$_POST['tell']);
	$query -> bindValue(':age',$_POST['age']);
	$query -> bindValue(':birthday',$_POST['birthday']);
	$query -> execute();

	$pdo_object= null;
	echo "上書きしました<br/>";
	$_POST['profilesID'] = $_POST['name'] = $_POST['tell'] = $_POST['age'] = $_POST['birthday'] = array();
	?><a href="7_11challenge.php">入力画面に戻る</a>
<?php } ?>
</form>
</body>
</html>
<!-- 課題11 -->