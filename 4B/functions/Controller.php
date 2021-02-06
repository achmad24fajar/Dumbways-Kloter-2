<?php

include('Connection.php');

class Controller extends Connection{

	public function index(){
		$posts = $this->dbconn->prepare('SELECT cycle.*, merk.name FROM cycle JOIN merk ON cycle.id_merk = merk.merk_id WHERE cycle.stock != 0');
		$posts->execute();
		$data = $posts->fetchAll();
		return $data;
	}

	public function show($cycle_id){
		$sql = 'SELECT cycle.*, merk.name FROM cycle JOIN merk ON cycle.id_merk = merk.merk_id';
		$show = $this->dbconn->prepare($sql);
		$show->bindParam(1, $cycle_id);
		$show->execute();
		return $show->fetch();
	}

	public function quantity($id_cycle, $quantity){
		return header('Location: order.php?id_cycle='.$id_cycle.'&quantity='.$quantity);
	}

}

?>