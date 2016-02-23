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
<form method="POST" action="7_12challenge.php">
profilesID
<input type="text" name="profilesID">
name
<input type="text" name="name">
tell
<input type="text" name="tell">
age
<input type="text" name="age">
birthday
<input type="text" name="birthday">
<input type="submit" value="検索">
<?php
}

if(isset($_POST['profilesID'],$_POST['name'],$_POST['tell'],$_POST['age'],$_POST['birthday'])){

	$keyname = $_POST['name'];
	$namae = mb_convert_encoding("%$keyname%", "sjis", "auto");
	$sql = "select * from profiles where profilesID like :id and name like :name and tell like :tell and age like :age and birthday like :birthday";
	$query = $pdo_object->prepare($sql);
	
	//$id = $_POST['profilesID'];
	//$tell = $_POST['tell'];
	//$age = $_POST['age'];
	//$birthday = $_POST['birthday'];
	//変数でも配列でもbindvalueできる
	
	$query -> bindValue(':id',"%".$_POST['profilesID']."%");
	$query -> bindValue(':name',$namae);
	$query -> bindValue(':tell',"%".$_POST['tell']."%");
	$query -> bindValue(':age',"%".$_POST['age']."%");
	$query -> bindValue(':birthday',"%".$_POST['birthday']."%");
	$query -> execute();

	$data = array();
	$data = $query -> fetchAll(PDO::FETCH_ASSOC);

	if(isset($data[0])){
		echo $data[0]['profilesID'].'/'.$data[0]['name'].'/'.$data[0]['tell'].'/'.$data[0]['age'].'/'.$data[0]['birthday'];
	}
	$pdo_object= null;
	$_POST['profilesID'] = $_POST['name'] = $_POST['tell'] = $_POST['age'] = $_POST['birthday'] = array();
	echo "<br/>処理が終了しました<br/>";
	?><a href="7_12challenge.php">入力画面に戻る</a>
<?php } ?>
</form>
</body>
</html>
<!--課題12-->