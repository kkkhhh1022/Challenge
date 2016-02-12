
<html>
<head>
<title>データ操作</title>
</head>
<body>
<form method="post">
名前:<input type="text" name="txtName"><br>
性別:男<input type="radio" name="rdoSample" value="男">　女<input type="radio" name="rdoSample" value="女"><br>
趣味:<textarea name="mulText"></textarea>
<input type="submit" name="btnSubmit">
<br>
<?php
$today = date ('Y/m/d_H:i:s');
$txtname = $_POST['txtName'];
$rdosample = $_POST['rdoSample'];
$txtmul = $_POST['mulText'];

echo $txtname."<br/>".$rdosample."<br/>".$txtmul."<br/>";

if($_COOKIE['lastlogin'] != null){
	echo '前回のログインは'.$_COOKIE['lastlogin'];
}	
setcookie('lastlogin',$today);

?>

</form>
</body>
</html>
<!-- 課題3 -->