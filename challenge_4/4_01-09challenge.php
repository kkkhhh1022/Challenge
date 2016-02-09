<?php

$stamp = mktime(00, 00, 00, 1, 1, 2015);
$date1 = date('Y/m/d', $stamp);

echo $date1."<br/>";
//課題1

$today = date('Y-m-d_H:i:s');
echo $today."<br/>";
//課題2

$stamp = mktime(10, 00, 00, 11, 4, 2016);
$date1 = date('Y年m月d日 H時i分s秒', $stamp);
echo $date1."<br/>";
//課題3

$stamp = mktime(00, 00, 00, 1, 1, 2015);
$stamp1 = mktime(23, 59, 59, 12, 31, 2015);

$calc = $stamp1 - $stamp;
echo $calc."秒<br/>";
//課題4

echo strlen('若狭')."バイト<br/>";
echo mb_strlen('若狭')."文字<br/>";
//課題5

echo strstr('wakasa.s1129@gmail.com','@')."<br/>";
//課題6

$in = array('U','I');
$out = array('う','い');
echo str_replace($in,$out,'きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます')."<br/>";
//課題7

$fp = fopen('mynameis.txt', 'w');
fwrite($fp, '私は若狭です');
fclose($fp);

$fp = fopen('mynameis.txt', 'r');
$file_txt = fgets($fp);
fclose($fp);

echo $file_txt."<br/>";
//課題8,9