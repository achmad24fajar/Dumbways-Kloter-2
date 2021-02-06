<?php

session_start();
if(!isset($_SESSION["user"])) header("Location: Auth.php");

include('functions/Controller.php');
$detail = new Controller;
if(isset($_GET['cycle_id'])){
	$post = $detail->show($_GET['cycle_id']);
}

if(isset($_POST['submit'])){
	$quantity = $detail->quantity($_POST['cycle_id'], $_POST['quantity']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cycle Store</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">Cycle Store</a>
			<div>
				<?php 
				if(isset($_SESSION['user'])){ ?>
					<a href="order.php" class="btn btn-dark btn-sm">My Order</a>
					<a href="functions/Logout.php" class="btn btn-dark btn-sm">Logout</a>
				<?php } else { ?>
					<a href="login.php" class="btn btn-dark btn-sm">Login</a>
				<?php } ?>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="card mb-3 mt-5">
			<div class="row g-0">
				<div class="col-md-4">
					<img src="image/<?php echo $post['image'] ?>" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?php echo $post[1] ?></h5>
						<p class="card-text"><?php echo $post['name'] ?></p>
						<h5>Description</h5>
						<p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
						<h2>Rp. <?php echo $post['price'] ?></h2>
						<form method="post" action="">
							<input type="hidden" name="cycle_id" value="<?php echo $post['cycle_id'] ?>">
							<input type="text" name="quantity" placeholder="Quantity" class="form-control" style="width: 100px;">
							<div style="margin-top: 50px">
								<?php 
								if(isset($_SESSION['user'])){ ?>
									<input type="submit" name="submit" value="Buy This Cycle" class="btn btn-dark">
								<?php } else { ?>
									<a href="#" class="btn btn-dark btn-sm" onclick="alert('You have to login first!')">Buy This Cycle</a>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>