<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    session_chk();
    if((!isset($_GET['id']) && !isset($_POST['mode'])) or
    		(!isset($_GET['id'])&&(!isset($_POST['mode']) or !$_POST['mode']=="DETAIL"))){
    	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    	//$_GETの指定が無く、かつ、削除変更画面への遷移を踏まえていない場合
    	//または、$_GETの指定は無いが、$_POST['mode']に値はある場合に、$_POST['mode']の値が"DETAILE"でない場合
    }else{
		
    	if(isset($_GET['id'])){
    		$result = profile_detail($_GET['id']);
    		//エラーが発生しなければ表示を行う
    		if(is_array($result)){
    			//$GETに値がある場合のみ再表示用にセッションへ値を格納
    			$_SESSION['userID']=$result[0]['userID'];
    			$_SESSION['name']=$result[0]['name'];
    			$_SESSION['birthday']=$result[0]['birthday'];
    			$_SESSION['type']=$result[0]['type'];
    			$_SESSION['tell']=$result[0]['tell'];
    			$_SESSION['comment']=$result[0]['comment'];
    			$_SESSION['newDate']=$result[0]['newDate'];
    		}else{
    			echo return_top();
    			die('データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result);
    		}
    	}
		?>
      
    	<h1>詳細情報</h1>
	ユーザーID:<?php echo $_SESSION['userID'];?><br>
	名前:<?php echo $_SESSION['name'];?><br>
	生年月日:<?php echo $_SESSION['birthday'];?><br>
	種別:<?php echo ex_typenum($_SESSION['type']);?><br>
	電話番号:<?php echo $_SESSION['tell'];?><br>
	自己紹介:<?php echo $_SESSION['comment'];?><br>
	登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($_SESSION['newDate'])); ?><br>
    
    <form action="<?php echo UPDATE; ?>" method="POST">
        <input type="submit" name="update" value="変更"style="width:100px">
        <input type="hidden" name="id"  value="<?php echo $_SESSION['userID'];?>">
        <input type="hidden" name="mode" value="UPDATE">
    </form>
    <form action="<?php echo DELETE; ?>" method="POST">
        <input type="submit" name="delete" value="削除"style="width:100px">
        <input type="hidden" name="id"  value="<?php echo $_SESSION['userID'];?>">
        <input type="hidden" name="mode" value="DELETE">
    </form>
    <?php
    }
	echo return_top(); 
    ?>
  </body>
</html>
