<?php
function session_chk(){
    $period_time = 120;//前回取得したタイムスタンプと現在のタイムスタンプの差が120を超えた場合に遷移するように修正
    session_start();
    if(!empty($_SESSION['last_access'])){       
        if((mktime() - $_SESSION['last_access']) > $period_time){
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
            logout_s();
            exit;
        }else{
            $_SESSION['last_access']=mktime();
        }
    }else{
        echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
        exit;
    }
}    

/**
 * セッション情報を破棄するための関数
 */
function logout_s(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}



function boardadd($namae,$honbun){
	$fp = fopen('boardlog.txt', 'a');
	fwrite($fp, '名前'."<br/>"."$namae"."<br/>".'本文'."<br/>"."$honbun"."<br/>");
	fclose($fp);
	echo '名前'."<br/>"."$namae"."<br/>".'本文'."<br/>"."$honbun";
}
//名前と本文を外部ファイルに追記する関数を追記
