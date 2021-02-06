<?php
include('functions/Auth.php');
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$login = new Login;
	$status = $login->auth($email, $pass);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Here</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">Cycle Store</a>
		</div>
	</nav>
	<div class="container">
		<div class="card p-4 mx-auto" style="width: 60%; margin-top: 150px;">
			<div class="card-title text-center">
				<h2>Login Here</h2>
			</div>
			<div class="card-content">
				<form method="POST" action="">
					<div class="mb-3">
						<input type="email" name="email" placeholder="Email" class="form-control">
					</div>
					<div class="mb-3">
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>
					<div class="mb-3 d-grid">
						<input type="submit" name="login" value="Login" class="btn btn-dark">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>