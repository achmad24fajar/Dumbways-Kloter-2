<?php

include('Connection.php');

class Login extends Connection
{

	public function auth($email, $password){
	    $sql = "SELECT * FROM users WHERE email=:email OR password=:password";
	    $statement = $this->dbconn->prepare($sql);
	    
	    $params = array(
	        ":email" => $email,
	        ":password" => $password
	    );

	    $statement->execute($params);

	    $user = $statement->fetch(PDO::FETCH_ASSOC);

	    if($user){
	        if($password == $user["password"]){
	            session_start();
	            $_SESSION["user"] = $user;
	            header("Location: index.php");
	        }else{
	        	echo "Gagal Masuk";
	        }
	    }
	}
}

?>