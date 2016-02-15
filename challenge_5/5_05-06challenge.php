<HTML>
<head>
</head>
<body>
<form enctype="multipart/form-data" action="5_05challenge.php" method="post">
ファイル選択：<input name="userfile" type="file" /><br>
<input type="submit" value="アップロード" /><br>
</form>
</body>
</HTML>
<?php

var_dump($_FILES);
echo "<br/>";
$file_name = 'upload.txt';
move_uploaded_file( $_FILES['userfile']['tmp_name'], "$file_name");
$upload_get = file_get_contents("$file_name");
echo 'アップされたファイルの中身'."$upload_get";
//課題5,6
?>