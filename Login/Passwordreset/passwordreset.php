<?php
require_once "../../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Furniture || Password Reset</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
if(isset($_POST["reset"])){
	$password = md5($_POST["password"]);
	$confirmpassword = md5($_POST["confirmpassword"]);
	if($_GET['key'] && $_GET['token'])
	{
		$email = $_GET['key'];
		$token = $_GET['token'];
		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `token`='".$token."' and `email`='".$email."'");
        date_default_timezone_set('Asia/Kolkata');
		$curDate = date( 'd-m-Y h:i:s A', time () );
		if (mysqli_num_rows($query) > 0) {
			$row= mysqli_fetch_assoc($query);
			if($row['exp_date'] >= $curDate){
				if($password < 6){
					$errmsg = "Password should be at least 6 characters in length.";
				}else{
					if($password == $confirmpassword){
						$sql = mysqli_query($conn,"UPDATE users set  password='" . $password . "', token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $email . "'");
						//$errmsg = "Password update successfull";
						echo "<script>alert('Congratulations! Your password has been updated successfully.');
						window.location.replace('../login.php');
						</script>";	
					}else{
						$errmsg = "Password and confirm password doesn't match";
					}
				}
			}else{
				$errmsg = "The password reset link has expired.";
			}
		}else{
			$errmsg = "We cant find any user associated with this mail-id";
		}
	}
}
?>
<div class="flex">
    <li class="cont"><a href="../index.php">Furniture</a></li>
    <div class="disc">
    <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../../shop.php">Shop</a></li>
        <li><a href="../../about.php">About Us</a></li>
        <li><a href="../../service.php">Service</a></li>
        <li><a href="../../blog.php">Blog</a></li>
        <li><a href="../../contact.php">Contact Us</a></li>
    </ul>
    </div>
</div>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" method="POST">
				<span class="contact1-form-title">
					Password Reset
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Password is required">
					<input class="input1" type="password" name="password" placeholder="Password">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Confirm password is required">
					<input class="input1" type="password" name="confirmpassword" placeholder="Confirm Password">
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="reset">
						<span>
							Reset
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div><br>
				<p class="error" style="color: #FF0000;"><?php if(!empty($errmsg)){ echo "* ".$errmsg; } ?></p>
			</form>
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="js/main.js"></script>
</body>
</html>
