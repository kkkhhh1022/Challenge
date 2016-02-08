<?php
//フォームから値を受け取って、未入力チェックを行ってから計算用の変数に代入
$pushed = isset($_POST['pushed']) ? $_POST['pushed'] : ""; 	//押されたボタンの値がそのまま入る
$operator = isset($_POST['operator']) ? $_POST['operator'] : "";//計算記号が保持される
$input = isset($_POST['input']) ? $_POST['input'] : "";		//入力された数値が保持される
$answer = isset($_POST['answer']) ? $_POST['answer'] : "";  	//計算結果の値が保持される
$output = isset($_POST['output']) ? $_POST['output'] : "";	//計算フォームに表示するための値。数字と計算記号が組み合わさって保持される
$log = isset($_POST['log']) ? $_POST['log'] : "";		//計算ログが保持される
//もし「=」が押されたら計算式をログとして表示
if($pushed == "＝" && $operator != "＝") {
  $log .= $answer . $operator . $input;
}
if($pushed == "C"){
	$pushed = "";
	$operator = "";
	$input = "";
	$answer = "";
	$output = "";
	$log = "";
	}
//もしCが押されたら各種変数をリセット
//数字か計算記号、もしくは「＝」かで判別
if(is_numeric($pushed)) {
  //もし数字が続けて押されたら、その数字を次の桁にする
  $input .= $pushed;
  
} else {
//最初に計算記号が出現した『後』、もう一度計算記号が出現したときに計算を実行。
  //「1+2-」や「1+2=」の時点で「3」といった計算結果にする。
  if(is_numeric($input)) {
    if($operator == "＋") {
      $answer += (int)$input;
    } elseif($operator == "－") {
      $answer -= (int)$input;
    } elseif($operator == "×") {
      $answer *= (int)$input;
    } elseif($operator == "÷") {
	//0で割ることのないように判別
      if($input != 0) {
        $answer /= (int)$input;
      } else {
        $answer = "error";
      }
    } elseif ($pushed == "税込み"){ 
		$answer = (int)$input * 1.08;
	} elseif ($pushed == "税抜き"){
		$answer = (int)$input / 1.08;
	//すでにinputへ数字が入っている際、税込み/税抜きを入力すると計算を行う
	} elseif ($pushed == "％"){
		$answer = (int)$input / 100;
	} else {
    	$answer = (int)$input;
    }
  }
  $input = "";    //記号が連続でおされても上記の計算自体は行われるが、計算用の数値は空なので何も起こらない
  $operator = $pushed;//押されたボタンの記号を保持。これによりもう一度計算記号が出現したときに計算が実行できる
}
if($pushed == "税込み" or $pushed == "税抜き" ){
	$operator = "＝";
	$input = $answer;
}
//税の計算をする場合のみ、計算記号を保持するための変数を上書きして表示条件を満たす。
//また、計算後の値を引き続き操作できるように、inputの値も上書きする。
//計算フォームにどんな文字を出すのかはここで決定。計算記号が出現したかそうでないかで判別
if($operator == "") {
  //最初に入力する数字部分を表示するように設定。「○○」だけ。まだ○の桁数が増える余地がある
  $output = $input;
} elseif($operator == "＝") {
 //計算結果を表示「☆☆」
  $output = $answer;
  $operator = "";//計算が行われたので計算記号を初期化
  if($pushed == "税込み"){
  	$log .= "税込み". "＝" . $answer . "<br>";
  }elseif($pushed =- "税抜き"){
  	$log .= "税抜き". "＝" . $answer . "<br>";
  }else{
  $log .=  "＝" . $answer . "<br>";
  $input = $answer;//計算結果に対して税率計算できるようにするためにinputを保持
  }
}elseif($pushed == "％"){
	$output = $answer . $input;
	
} else {
 //記号でくっついた計算途中式を表示「○○÷□□」まだ□の桁数が増える余地がある
  $output = $answer . $operator . $input;
}
?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="style.css" media="all">-->
    <style type="text/css"><!-- button{width:50px;} --></style>
    <title>WEB電卓</title>
  </head>
  <body>
    <h3>電卓</h3>
    <form action="./calc.php" method="post" id="calc">
      <input class="outform" type="text" name="output" value="<?php echo $output ?>">
      <table>
        <tr class="row">
          <td><button type="submit" name="pushed" value="税込み" form="calc">税込</button></td>
          <td><button type="submit" name="pushed" value="税抜き" form="calc">税抜</button></td>
          <td><button type="submit" name="pushed" value="％" form="calc">％</button></td>
          <td><button type="submit" name="pushed" value="C" form="calc">C</button></td>
        </tr>
        <tr class="row">
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="1" form="calc">1</button></td>
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="2" form="calc">2</button></td>
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="3" form="calc">3</button></td>
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="＋" form="calc">＋</button></td>
        </tr>
        <tr class="row">
          <td><button type="submit" name="pushed" value="4" form="calc">4</button></td>
          <td><button type="submit" name="pushed" value="5" form="calc">5</button></td>
          <td><button type="submit" name="pushed" value="6" form="calc">6</button></td>
          <td><button type="submit" name="pushed" value="－" form="calc">－</button></td>
        </tr>
        <tr class="row">
          <td><button type="submit" name="pushed" value="7" form="calc">7</button></td>
          <td><button type="submit" name="pushed" value="8" form="calc">8</button></td>
          <td><button type="submit" name="pushed" value="9" form="calc">9</button></td>
          <td><button type="submit" name="pushed" value="×" form="calc">×</button></td>
        </tr>
        <tr class="row">
          <td><button type="submit" name="pushed" value="0" form="calc">0</button></td>
          <td><button type="submit" name="pushed" value="00" form="calc">00</button></td>
          <td><button type="submit" name="pushed" value="＝" form="calc">＝</button></td>
          <td><button type="submit" name="pushed" value="÷" form="calc">÷</button></td>
        </tr>
      </table>
      <input type="hidden" name="input" value="<?php echo $input; ?>">
      <input type="hidden" name="answer" value="<?php echo $answer; ?>">
      <input type="hidden" name="operator" value="<?php echo $operator; ?>">
      <input type="hidden" name="log" value="<?php echo $log; ?>">
    </form>
    <p>計算ログ:</p><br>
    <p><?php echo $log; ?></p>
  </body>
</html>

