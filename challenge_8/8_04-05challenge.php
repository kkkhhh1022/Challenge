<?php
class penguin{
	public $a=0; //カプセル化されたオブジェクトをプロパティと呼ぶらしい
	public $b=0;
	public function number(){
		$this->a=8;
		$this->b=14;
	}
	public function write(){
		echo $this->a."<br/>".$this->b."<br/>";
	}	
}
class karappo extends penguin{
	public function reset(){
		$this->a='';
		$this->b='';
	}
}

$emperor = new penguin();//penguinクラスでインスタンス
echo $emperor->a.$emperor->b."<br/>";
$emperor->number();
$emperor->write();

$kogata = new karappo();
$kogata->reset();
echo '---'.$kogata->a.$kogata->b.'---';

//課題4-5