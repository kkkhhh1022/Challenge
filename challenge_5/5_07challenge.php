<html>
<head>
</head>
<body>
<form method="post">
名前:<input type="text" name="txtName" value="<?php echo $_COOKIE['name'];?>"><br>
性別:男<input type="radio" name="rdoSample" value="男" <?php if($_COOKIE['sex']=="男"){echo "checked= checked";} ?>>
　女<input type="radio" name="rdoSample" value="女" <?php if($_COOKIE['sex']=="女"){echo "checked= checked";} ?>>
<br>趣味:<textarea name="mulText"><?php echo $_COOKIE['hobby'];?></textarea>
<input type="submit" name="btnSubmit">
<br>
<?php
$txtname = $_POST['txtName'];
$rdosample = $_POST['rdoSample'];
$txtmul = $_POST['mulText'];

setcookie('name',"$txtname" );
setcookie('sex',"$rdosample");
setcookie('hobby',"$txtmul");
echo 'ページをリロードすると前回入力した情報を表示';

//課題7 なんか読みにくい
?>
</form>
</body>
</html>
