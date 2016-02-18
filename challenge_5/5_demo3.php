<?php
    require_once '5_demo4.php';
    require_once '5_demo6.php';

    session_chk();
    
    $get_data = array();
    
    if(!empty($_GET['name'])){
        $get_data['name'] = $_GET['name'];
    }
    if(!empty($_GET['mulText'])){
        $get_data['year'] = $_GET['mulText'];
    }
    
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo SHOW ?></title>
</head>
<body>
    <?php 
    if(!isset($_GET['name']) || !isset($_GET['mulText'])){
        echo '入力データが不十分です。もう一度入力を行ってください。';
    }else{
    	echo '書けた！'."<br/><br/>";
    	boardadd($_GET['name'],$_GET['mulText']);
        echo '<meta http-equiv="refresh" content="3;URL='.INPUT.'">';
    }
    ?>
</body>
</html>
