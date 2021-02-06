<?php
session_start();
if(!isset($_SESSION["user"])) header("Location: Auth.php");

include('functions/Controller.php');
$detail = new Controller;
if(isset($_GET['id_cycle'])){
	$post = $detail->show($_GET['id_cycle']);
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
						<div class="alert alert-danger" role="alert">
							<h4>Nama Pemesan : <?php echo $_SESSION['user']['name'] ?></h4>
							<h5>Email : <?php echo $_SESSION['user']['email'] ?></h5>
						</div>
						<h5 class="card-title"><?php echo $post[1] ?></h5>
						<p class="card-text"><?php echo $post['name'] ?></p>
						<h2>Rp. <?php echo $post['price'] ?></h2>
						<p class="card-text">Quantity : <?php echo $_GET['quantity']; ?></p>
						<hr>
						<h2>Rp. <?php echo $post['price'] * $_GET['quantity'] ?></h2>
						<form>
							<input type="hidden" name="name">
							<input type="hidden" name="merk">
							<input type="hidden" name="price">
							<input type="hidden" name="quantity">
							<div style="margin-top: 50px">
								<input type="submit" name="submit" value="Checkout" class="btn btn-dark btn-sm">
								<a href="#" class="btn btn-danger btn-sm">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>