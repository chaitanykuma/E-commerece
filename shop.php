<?php 
require_once "config.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Furniture || Shop</title>
	</head>

	<body>

	<?php require_once "navbar.php"; ?>

		<!-- Start Hero Section -->
		<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="shop.php" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
					<?php
					$sqll = mysqli_query($conn, "SELECT * FROM products");
					if(mysqli_num_rows($sqll)){
						while($row = $sqll->fetch_assoc()){
							$name = $row["name"];
							$amount = $row["amount"];
							$sql = mysqli_query($conn, "SELECT * FROM image WHERE product_id = '$row[product_id]'");
							if(mysqli_num_rows($sql)){
								while($img = $sql->fetch_assoc()){
									$image = $img["image"];
									?>
								
		      		<!-- Start Column 1 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="Single-products/single-products.php?id=<?php echo $row["product_id"]; ?>">
							<img src="<?php if(!empty($image)){echo "Admin/Add products/folder/".$image;}else{ echo "";} ?>" class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $name; ?></h3>
							<strong class="product-price"><?php echo $amount; ?></strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					<?php
								}
							}
						}
					}
					?>
		      	</div>
		    </div>
		</div>


		<!-- Start Footer Section -->
		<?php require_once "footer.php"; ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
