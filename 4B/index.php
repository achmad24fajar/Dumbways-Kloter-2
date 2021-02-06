<?php

include('functions/Controller.php');
$posts = new Controller;
$data = $posts->index();

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
			<a class="navbar-brand" href="index.html">Cycle Store</a>
			<div>
				<?php 
				session_start();
				if(isset($_SESSION['user'])){ ?>
					<a href="order.php" class="btn btn-dark btn-sm">My Order</a>
					<a href="functions/Logout.php" class="btn btn-dark btn-sm">Logout</a>
				<?php } else { ?>
					<a href="login.php" class="btn btn-dark btn-sm">Login</a>
				<?php } ?>
			</div>
		</div>
	</nav>

	<div class="container text-center">
		<?php foreach ($data as $value) { ?>
		<div class="d-inline-block">
			<div class="card mt-5" style="width: 18rem;">
				<img src="image/<?php echo $value['image'] ?>" class="card-img-top" alt="..." height="200">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<div style="text-align: left!important;">
								<h3><?php echo $value[1]; ?></h3>
								<span><?php echo $value['price']; ?></span>
							</div>
							<div style="text-align: right!important;">
								<div class="mt-1">
									<span><?php echo $value['name']; ?></span>
								</div>
								<div class="mt-2">
									<span>Stok: <?php echo $value['stock']; ?></span>
								</div>
							</div>
						</div>
					<div class="d-grid mt-2">
						<a href="product.php?cycle_id=<?php echo $value['cycle_id']; ?>" class="btn btn-dark btn-block">Buy</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>


</body>
</html>