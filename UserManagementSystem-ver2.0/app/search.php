<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<script type="text/javascript">
<!--
var flag = 0;
function repush(obj){
	if(flag == obj.value){
    	obj.checked = false;
    	flag = 0;
    }else{
    	flag = obj.value;
    }
}
//-->
</script>
<meta charset="UTF-8">
      <title>ユーザー情報検索画面</title>
</head>
  <body>
  <?php session_chk(); ?>
    <form action="<?php echo SEARCH_RESULT ?>" method="GET">
        
        名前:
        <br>
        <input type="text" name="name">
        <br><br>

        生年:
        <br>
        <select name="year">
            <option value="">----</option>
            <?php
            for($i=1950; $i<=2010; $i++){ ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>年生まれ
        <br><br>

        種別:
        <br>
        <?php
        for($i = 1; $i<=3; $i++){ ?>
        <input type="radio" name="type" value="<?php echo $i; ?>" onClick="repush(this)"><?php echo ex_typenum($i);?><br>
        <?php } //間違ってラジオボタンを選択した際に取り消しができる機能 ?>
        <br>
        <input type="submit" name="btnSubmit" value="検索">
      </form>
      <?php echo return_top(); ?>
  </body>
</html>

<!-- varは変数の宣言、this(inputタグ)にchecked=falseを返す onClickはクリックした時-->
