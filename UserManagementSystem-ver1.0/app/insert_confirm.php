<?php require_once '../common/defineUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['year'] = $_POST['year'];
$_SESSION['month'] = $_POST['month'];
$_SESSION['day'] = $_POST['day'];
$_SESSION['type'] = $_POST['type'];
$_SESSION['tell'] = $_POST['tell'];
$_SESSION['comment'] = $_POST['comment'];

    if(($_POST['month']==2 && $_POST['day']>=29)
    or($_POST['year']%4==0 && $_POST['month']==2 && $_POST['day']>=30)
    or(($_POST['month']==4 or $_POST['month']==6 or $_POST['month']==9 or $_POST['month']==11) && $_POST['day']==31)){
    	echo '存在しない日付です'."<br/>";?>
    <form action="<?php echo INSERT ?>" method="POST">
        <input type="submit" name="no" value="登録画面に戻る">
        
    </form>
    <?php die();
    //うるう年などの排除	
    }

    if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['type']) 
            && !empty($_POST['tell']) && !empty($_POST['comment']) && $_POST['year']!='----' && $_POST['month']!='--' && $_POST['day']!='--'){
//回答2.生年月日フォームデフォルトのハイフンでない場合に分岐する処理を追加        
        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        $_SESSION['birthday'] = $post_birthday;
        
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">
          <input type="hidden" name="access" value="t">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">

        </form>
        
    <?php }else{
    	$str=''; 
    	if(empty($_POST['name'])){
        	$str .= ' 名前';
        }
        if($_POST['year']=='----' or $_POST['month']=='--' or $_POST['day']=='--'){
        	$str .= ' 生年月日';
        }
        if(empty($_POST['type'])){
        	$str.= ' 種別';
        }
        if(empty($_POST['tell'])){
        	$str .= ' 電話番号';
        }
        if(empty($_POST['comment'])){
        	$str .= ' 自己紹介文';
        }
//回答3 不足している入力項目を出力?>
        <h1>入力項目が不完全です</h1><br>
        <?php echo "$str<br/>"?>の不足<br>
        再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
            
        </form>
    <?php }?>
</body>
</html>
