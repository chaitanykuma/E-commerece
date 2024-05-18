<?php
require_once "../config.php";
if(!empty($_SESSION["id"])){
	header("Location: index.php");
}
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
	<link rel="icon" type="image/png" href="../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
	<?php
	if(isset($_POST["login"])){
		$email = $_POST["email"];
		$password = md5($_POST["pass"]);
		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$email' OR email =
		'$email'");
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) > 0){
			if($password == $row["password"]){
				if($row["status"] == 0){
					$msg = "Your identification is currently being verified. Please wait for an administrator to activate your account.";
				}else{
					session_start();
					$_SESSION["login"] = true;
					$_SESSION["id"] = $row["id"];
					header("Location: ../index.php");
				}
			}else{
				$msg = "Password doesn't match please try again";
			}
		}else{
			$msg = "We cant a user with that e-mail address";
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
            <li><a class="nav-link" href="../index.php">Home</a></li>
            <li><a class="nav-link" href="../shop.php">Shop</a></li>
            <li><a class="nav-link" href="../about.php">About us</a></li>
            <li><a class="nav-link" href="../services.php">Services</a></li>
            <li><a class="nav-link" href="../blog.php">Blog</a></li>
            <li><a class="nav-link" href="../contact.php">Contact us</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            <?php
            if(!empty($_SESSION["id"])){
            ?>
            <li><a class="nav-link" href="../logout.php"><img src="../red-circle-logout-arrow-20586.png"></a></li>
            <?php
            }else{
                ?>
				<div class="dropdown">
					<li><a class="nav-link"><img src="../images/user.svg"></a></li>
					<div class="dropdown-content">
						<a href="../Signup/signup.php">Signup</a>
						<a href="../Admin/Adminlogin/adminlogin.php">Adminlogin</a>
					</div>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
</nav>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email or username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgotpassword.php">
							Password?
						</a>
					</div>

					<p class="error" style="color: #FF0000;"><?php if(!empty($msg)){ echo $msg; }?></p>


					<div class="text-center p-t-136">
						<a class="txt2" href="../Signup/signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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