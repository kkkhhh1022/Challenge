
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

$txtname = $_POST['txtName'];
$rdosample = $_POST['rdoSample'];
$txtmul = $_POST['mulText'];
echo $txtname."<br/>".$rdosample."<br/>".$txtmul;
?>
</form>
</body>
</html>
<!--課題2-->