<?php 

class Connection {

	public $dbconn;

	public function __construct(){
		try {
			$this->dbconn = new PDO('mysql:dbname=dbpenjualan;host=127.0.0.1', "root", "");
		} catch(PDOexception $e) {
			echo 'Connection Failed: '. $e->getMessage();
		}
	}
}

?>