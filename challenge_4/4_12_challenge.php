<?php

$kuten = "";
$file_txt = file_get_contents('4_12_bocchan.txt');

echo '変更前'."<br/>".$file_txt;

echo"<br/>"."<br/>";

echo '変更後'."<br/>".str_replace('。', '。'."<br/>", "$file_txt"); 
//課題12