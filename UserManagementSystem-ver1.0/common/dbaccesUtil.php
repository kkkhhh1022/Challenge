<?php

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL($name_val,$birthday_val,$tell_val,$type_val,$comment_val){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','wakasa','sora2525');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //回答8.ファイル一元化に伴いreturn $pdoを削除
        $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
        		. "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";
        $insert_query = $pdo->prepare($insert_sql);
        
        $insert_query->bindValue(':name',$name_val);
        $insert_query->bindValue(':birthday',$birthday_val);
        $insert_query->bindValue(':tell',$tell_val);
        $insert_query->bindValue(':type',$type_val);
        $insert_query->bindValue(':comment',$comment_val);
        $insert_query->bindValue(':newDate',date("Y-m-d H:i:s"));//回答6.time()を書式を指定したdate()に変更

        //SQLを実行
        $insert_query->execute();
        
        //接続オブジェクトを初期化することでDB接続を切断
        $pdo=null;
        
        
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}
//回答7.setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)を追記
//PDOの設定項目ATTR_ERRMODE（例外が発生した際の通知）にERRMODE_EXCEPTION(例外)を設定？