<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

<?php //回答5.POSTを用いたページ遷移のエラー表示
if(isset($_POST['access'])!='t'){
    echo '不正なアクセスです'."<br/>";
    echo return_top();
}else{
    	
    session_start();
    $name = $_SESSION['name'];
    $birthday = $_SESSION['birthday'];
    $tell = $_SESSION['tell'];
    $type = $_SESSION['type'];
    $comment = $_SESSION['comment'];

    //db接続を確立
    $insert_db = connect2MySQL($name,$birthday,$tell,$type,$comment);

	echo 
	'<h1>登録結果画面</h1><br>'.
    '名前:'.$name.'<br>'.
    '生年月日:'.$birthday.'<br>'.
    '種別:'.$type.'<br>'.
    '電話番号:'.$tell.'<br>'.
    '自己紹介:'.$comment.'<br>'.
    '以上の内容で登録しました。<br>';

    echo return_top();
}?>
</body>
</html>