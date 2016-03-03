<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
<?php 
    if(!isset($_POST['mode']) or !$_POST['mode']=="UPDATE"){//issetを用いて不正なアクセスの際Noticeが出ないようにした
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    	
    	echo 'ユーザーID:'.$_POST['id']; 
    	?>
    	<form action="<?php echo UPDATE_RESULT ?>" method="POST">
    	<?php
    	$result = profile_detail($_POST['id']);
    	
    	$birth_stamp = strtotime($result[0]['birthday']);
    	//タイムスタンプへ変換
    	$year = date('Y',$birth_stamp);
    	$month = date('n',$birth_stamp);
    	$day = date('j',$birth_stamp);
    	?>
    	名前:
    	<input type="text" name="name" value="<?php echo $result[0]['name']; ?>">
    	<br><br>

    	生年月日:　
    		<select name="year">
    		<option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
    		<option value="<?php echo $i;?>"<?php if($i==$year){echo "selected";}?> ><?php echo $i ;?></option>
        <?php } ?> <!-- updateは確認画面が無くresultからページを遡ることはないので form_valueが使えない -->
    	</select>年
    		<select name="month">
        	<option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        	<option value="<?php echo $i;?>" <?php if($i==$month){echo "selected";}?>><?php echo $i;?></option>
        <?php } ;?>
    	</select>月
    		<select name="day">
        	<option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        	<option value="<?php echo $i; ?>"<?php if($i==$day){echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    	</select>日
    	<br><br>

    	種別:
    	<br>
    	<?php
    	for($i = 1; $i<=3; $i++){ ?>
    		<input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==$result[0]['type']){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    	<?php } ?>
    	<br>

    	電話番号:
    		<input type="text" name="tell" value="<?php echo $result[0]['tell']; ?>">
    		<br><br>

    	自己紹介文
    		<br>
    		<textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $result[0]['comment']; ?></textarea><br><br>

		<input type="hidden" name="id"  value="<?php echo $_POST['id'];?>">
    	<input type="hidden" name="mode"  value="RESULT">
    	<input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    	</form>
    	<form action="<?php echo RESULT_DETAIL; ?>" method="POST">
    	<input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    	<input type="hidden" name="mode"  value="DETAIL">
    	</form>
    <?php }
    echo return_top(); ?>  
</body>

</html>
