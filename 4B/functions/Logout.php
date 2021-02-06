<?php


class Logout
{
	
	public function sign_out(){
		session_start();
		unset($_SESSION['user']);
		unset($_SESSION['email']);
		header('Location: ../index.php');
	}

	
}

$logout = new Logout;
$logout->sign_out();

?>