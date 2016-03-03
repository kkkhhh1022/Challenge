<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    if(!isset($_POST['mode']) or !$_POST['mode']=="RESULT"){//issetを用いて不正なアクセスの際Noticeが出ないようにした
    	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
		$result = delete_profile($_POST['id']);
		//エラーが発生しなければ表示を行う
		if(!isset($result)){
    	?>
    	<h1>削除確認</h1>
    	削除しました。<br>
    	<?php
    	}else{
        	echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    	}
    }
    echo return_top(); 
    ?>
   </body> 
</body>
</html>
