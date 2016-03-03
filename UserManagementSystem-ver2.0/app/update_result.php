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
    session_chk();
    if(!isset($_POST['mode']) or !$_POST['mode']=="RESULT"){//不正なアクセスチェック
    	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    	$update_values = array(bind_p2s('name'),bind_p2s('year'),bind_p2s('month'),bind_p2s('day'),bind_p2s('type'),bind_p2s('tell'),bind_p2s('comment'));
    	
    	if(($_POST['month']==2 && $_POST['day']>=29)
    		or($_POST['year']%4==0 && $_POST['month']==2 && $_POST['day']>=30)
    		or(($_POST['month']==4 or $_POST['month']==6 or $_POST['month']==9 or $_POST['month']==11) && $_POST['day']==31)){
    			echo '存在しない日付です。もう一度トップページからやり直してください'."<br/>".return_top();?>        
    	    	</form>
    	    	<?php 
    	    	logout_s();
    	    	die();
    	    	//うるう年などの判別	
    	}
    	
    	foreach($update_values as $key=>$val){
    		if($val==null){
    			echo return_top()."<br>";
    			die('更新データが不完全です。もう一度トップページからやり直してください');
    		}//変更フォームの入力が不完全な場合でも更新が行えた不具合を修正
    	}
    		
    	
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
    logout_s();
    echo return_top();
    ?>
  </body>
</html>
