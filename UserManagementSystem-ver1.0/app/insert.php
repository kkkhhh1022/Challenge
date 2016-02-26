<?php require_once '../common/defineUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
<?php
session_start(); ?>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name">
    <br><br>
    
    生年月日:　
    <select name="year">
        <option value=<?php echo $_SESSION['year'] ?>><?php echo $_SESSION['year'] ?></option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value=<?php echo $_SESSION['month'] ?>><?php echo $_SESSION['month'] ?></option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value=<?php echo $_SESSION['day'] ?>><?php echo $_SESSION['day'] ?></option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i;?></option>
        <?php } ?><!--これだとセッションが空の場合にエラーが出る、各初期値に分岐を作る必要がある-->>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア"　checked>エンジニア<br>
    <input type="radio" name="type" value="営業">営業<br>
    <input type="radio" name="type" value="その他">その他<br>
    <br>
    
    電話番号:
    <input type="text" name="tell">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $_SESSION['comment']?></textarea><br><br>
    
    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form><!--回答4.初期値をセッションから取得、入力項目を維持する-->
</body>
</html>
