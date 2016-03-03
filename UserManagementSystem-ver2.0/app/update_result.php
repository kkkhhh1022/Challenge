<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    if(!isset($_POST['mode']) or !$_POST['mode']=="RESULT"){//issetを用いて不正なアクセスの際Noticeが出ないようにした
    	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    	$birthday = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
    	$result = update_profile($_POST['id'],$_POST['name'],$birthday,$_POST['type'],$_POST['tell'],$_POST['comment']);
    	//エラーが発生しなければ表示を行う
    	if(!isset($result)){
    	?>
    		<h1>更新確認</h1>
		名前:<?php echo $_POST['name'];?><br>
		生年月日:<?php echo $birthday;?><br>
		種別:<?php echo ex_typenum($_POST['type']);?><br>
		電話番号:<?php echo $_POST['tell'];?><br>
		自己紹介:<?php echo $_POST['comment'];?><br><br>
		以上の内容で更新しました。<br>
    	<?php
    	}else{
        	echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
    	}
    }
    	echo return_top();
    	?>
  </body>
</html>
