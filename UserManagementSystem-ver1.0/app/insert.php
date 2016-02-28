<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
<?php
session_start();?>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" value=<?php keep_val('name','');?>>
    <br><br>
    
    生年月日:　
    <select name="year">
        <option value=<?php keep_val('year','----') ?>><?php keep_val('year','----') ?></option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value=<?php keep_val('month','--') ?>><?php keep_val('month','--') ?></option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value=<?php keep_val('day','--'); ?>><?php keep_val('day','--'); ?></option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i;?></option>
        <?php } ?><!--SESSIONの値の有無で分岐を作るとアクセス初回の参照でエラーが出たのでPOSTを使うことにした-->
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア" <?php if(isset($_POST['type'])){if($_POST['type']=='エンジニア'){echo 'checked';}}?>>エンジニア<br>
    <input type="radio" name="type" value="営業" <?php if(isset($_POST['type'])){if($_POST['type']=='営業'){echo 'checked';}}?>>営業<br>
    <input type="radio" name="type" value="その他" <?php if(isset($_POST['type'])){if($_POST['type']=='その他'){echo 'checked';}}?>>その他<br>
    <br><!-- 各ボタンとPOSTの値が一致するボタンにchecked -->
    
    電話番号:
    <input type="text" name="tell" value=<?php keep_val('tell','');?>>
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php keep_val('comment','')?></textarea><br><br>
    
    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form><!--回答4.初期値をinsert_confirm.phpのPOSTから取得、入力項目を維持する-->
</body>
</html>
