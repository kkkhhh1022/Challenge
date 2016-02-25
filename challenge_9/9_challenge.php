<?php

abstract class base{						//abstractには子クラスに課すルールのみを記述する
	abstract protected function load();
	abstract public function show();
}

class Human extends base{
	private $table;
	function __construct() {
		$this->table = 'human';
	}
	protected function load(){
		try{
			$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=SJIS','wakasa','sora2525');
		}catch(PDOException $Exception){
			die('接続に失敗しました:'.$Exception->getMessage());
		}
		$sql = "select * from $this->table";//テーブル名はbindできない
		$query = $pdo_object->prepare($sql);
		$query -> execute();

		$data = array();
		$data = $query -> fetchAll(PDO::FETCH_ASSOC);
		$pdo_object= null;
		return $data;
	}
	public function show(){
		$output = $this->load();
		foreach ($output as $key1 => $value1) {
			foreach ($value1 as $key2 => $value2) {
				echo $value2.",";
			}
		}
	}
}


class Station extends base{
	private $table;
	function __construct() {
		$this->table = 'station';
	}
	protected function load(){
		try{
			$pdo_object= new PDO('mysql:host=localhost;dbname=challenge_db;charset=SJIS','wakasa','sora2525');
		}catch(PDOException $Exception){
			die('接続に失敗しました:'.$Exception->getMessage());
		}
		$sql = "select * from $this->table";
		$query = $pdo_object->prepare($sql);
		$query -> execute();

		$data = array();
		$data = $query -> fetchAll(PDO::FETCH_ASSOC);
		$pdo_object= null;
		return $data;
	}
	public function show(){
		$output = $this->load();
		foreach ($output as $key1 => $value1) {
			foreach ($value1 as $key2 => $value2) {
				echo $value2.",";
			}
		}
	}
}

$aaaa = new Human();
$aaaa -> show();
echo "<br/><br/>";

$bbbb = new Station();
$bbbb -> show();
//課題1-6