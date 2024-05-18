<?php
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login || Furniture</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/tiny-slider.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
	<?php
	function is_valid_image_extension($filename) {
		$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', );
		$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		return in_array($file_extension, $allowed_extensions);
	  }

	if(isset($_POST["submit"])){
		$name = $_POST["name"];
		$description = $_POST["description"];
		$amount = $_POST["amount"];
		date_default_timezone_set('Asia/Kolkata');
		$created_at = date( 'd-m-Y h:i:s A', time ());
		$filename = $_FILES["filename"]["name"];
        $tempname = $_FILES["filename"]["tmp_name"];  
        if ($_FILES['filename']['size'] > 2000000) 
         {
			$msg = "File too large! should not be larger than 2MB";
         }else{
			if (is_valid_image_extension($filename)) {
				move_uploaded_file($tempname, 'folder/' . $filename);
				$query = "INSERT INTO products (`name`, `description`, `amount`, `created_at`) VALUES('$name', '$description','$amount', '$created_at')";
				mysqli_query($conn, $query);

				$query = mysqli_query($conn, "SELECT * FROM products");
				if(mysqli_num_rows($query) > 0){
					while($row = $query->fetch_assoc()){
						$product_id = $row["product_id"];
					}
				}


				$sel = "INSERT INTO image (`product_id`, `image`, `created_at`) VALUES('$product_id', '$filename', '$created_at')";
				mysqli_query($conn, $sel);
				$msg = "Product add successfull";
				header("Location: ../Admindashboard/admindashboard.php");
			}
			else {
				$msg = "Invalid image file extension. Allowed extensions: jpg, jpeg, png, gif";
        }
	}
	}
	?>
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furniture navigation bar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Furniture<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li><a class="nav-link" href="../Admindashboard/admindashboard.php">Home</a></li>
				</ul>
			</div>
		</div>
	</nav>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/image.jpg" style="margin-top: 90px; margin-left: 20px;" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<span class="login100-form-title">
						Add Product's
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Product name is required: abc">
						<input class="input100" type="text" name="name" placeholder="Product Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Product Description is required: abcdefg">
						<input class="input100" type="text" name="description" placeholder="Product Description">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-audio-description" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Amount is required: 1000">
						<input class="input100" type="text" name="amount" placeholder="Product Amount">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
						</span>
					</div>

					<div class="form-group">
						<input type="file" name="filename" value="" class="form-control" style="border-radius: 25px; background-color: rgb(223, 219, 219);" multiple/>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Submit
						</button>
					</div></br>
					<p class="error" style="color: #FF0000;" align="center"><?php if(!empty($msg)){ echo "* ".$msg; }?></p>


					<div class="text-center p-t-136">
						<!-- <a class="txt2" href="../Signup/signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
</body>
</html>