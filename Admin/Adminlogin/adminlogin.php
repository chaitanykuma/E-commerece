<?php
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/tiny-slider.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="favicon.png"/>
	<title>Furniture || Admin Login</title>
</head>
<body>
	<?php
	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = md5($_POST["pass"]);
		$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' or email = '$username'");
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) > 0){
			if($password == $row["password"]){
				session_start();
				$_SESSION["login"] = true;
				$_SESSION["admin_id"] = $row["admin_id"];
				header("Location: ../Admindashboard/admindashboard.php");
			}
			else{
				$msg = "Wrong Password";
			}
		}
		else{
			$msg = "We can't find a ADMIN with that username";
		}
	}
	?>
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furniture navigation bar">
		<div class="container">
			<a class="navbar-brand" href="../index.php">Furniture<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li><a class="nav-link" href="../../index.php">Home</a></li>
					<li><a class="nav-link" href="../../shop.php">Shop</a></li>
					<li><a class="nav-link" href="../../about.php">About us</a></li>
					<li><a class="nav-link" href="../../services.php">Services</a></li>
					<li><a class="nav-link" href="../../blog.php">Blog</a></li>
					<li><a class="nav-link" href="../../contact.php">Contact us</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="../../Login/login.php"><img src="../../images/user.svg"></a></li>
				</ul>
			</div>
		</div>
	</nav>
			
			<div class="limiter">
				<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
					<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
						<form class="login100-form validate-form" method="post">
							<span class="login100-form-title p-b-49">
								Admin Login
							</span>

							<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
								<span class="label-input100">Username</span>
								<input class="input100" type="text" name="username" placeholder="Type your username">
								<span class="focus-input100" data-symbol="&#xf206;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Password is required">
								<span class="label-input100">Password</span>
								<input class="input100" type="password" name="pass" placeholder="Type your password">
								<span class="focus-input100" data-symbol="&#xf190;"></span>
							</div>
							<div class="text-right p-t-8 p-b-31">

							</div>
							
							<div class="container-login100-form-btn">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn" name="login">
										Login
									</button>
								</div>
							</div><br>
							<p class="error" align="center" style="color: #FF0000;"><?php if(!empty($msg)){ echo "* ".$msg; } ?></p>

							<div class="flex-col-c p-t-155">
								<span class="txt1 p-b-17">
									Or Sign Up Using
								</span>

								<a href="../Login/login.php" class="txt2">
									User Login
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
	
	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>