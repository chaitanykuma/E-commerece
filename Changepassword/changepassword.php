<?php
session_start();
require_once "../config.php";
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Furniture || Update Password</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../favicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<?php
		if(isset($_POST["update"])){
			$user_id = $_POST["user_id"];
			$oldpass = md5($_POST["oldpass"]);
			$newpass = md5($_POST["newpass"]);
			$confirmnewpass = md5($_POST["confirmnewpass"]);
			if($newpass < 6){
				$errmsg = "Password should be at least 6 characters in length.";
			}else{
			$sql =  "SELECT * FROM `users` where password='$oldpass' and id='$user_id'";
			$result = $conn->query($sql);
			if(mysqli_num_rows($result) > 0){
					if($newpass == $confirmnewpass){
							$sqll = "UPDATE `users` SET password = '$newpass' where id = '$user_id'";
							$result = $conn->query($sqll);
							echo "<script>alert('Password update Successfull')</script>";
				}else{
					$errmsg = "New password and confirm password not match";
				}
			}
			else{
				$errmsg = "Password doesn't match";
			}
		}
	}
	?>
		<div class="flex">
			<li class="cont"><a href="../index.php">Furniture</a></li>
			<div class="disc">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../shop.php">Shop</a></li>
					<li><a href="../about.php">About Us</a></li>
					<li><a href="../service.php">Service</a></li>
					<li><a href="../blog.php">Blog</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../index.php"><img src="user.svg"></a></li>
				</ul>
			</div>
		</div>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Change password</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-5">
						<div class="login-wrap p-4 p-md-5">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-user-o"></span>
							</div>
							<?php
							if(!empty($_SESSION["id"])){
								$sql = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										?>
										<h3 class="text-center mb-4"><?php echo strtoupper($row["username"]); ?></h3>
										<?php
										}
									}
								}else{
									?>
									<h3 class="text-center mb-4">Password</h3>
									<?php
									}
									?>
									<form method="POST" class="login-form">
										<div class="form-group">
											<label for="password">0ld Password:</label>
										</div>
										<div class="form-group">
											<input type="password" name="oldpass" class="form-control rounded-left" placeholder="Old password" required>
										</div>
										<div class="form-group d-flex">
											<label for="password">New Pasword:</label>
										</div>
											<div class="form-group d-flex">
												<input type="password" name="newpass" class="form-control rounded-left" placeholder="New Password" required>
											</div>
											<div class="form-group d-flex">
												<label for="Password">Confirm Password:</label>
											</div>
											<div>
												<div class="form-group d-flex">
													<input type="password" name="confirmnewpass" class="form-control rounded-left" placeholder="Confirm New Password" required>
												</div>
												<p class="error" style="color: #FF0000;"><?php if(!empty($errmsg)){ echo "* ".$errmsg; }?></p>
												<div class="form-group">
													<input type="hidden" name="user_id" class="form-control rounded-left" value="<?php echo $_SESSION["id"] ?>">
													<button type="submit" name="update" class="btn btn-primary rounded submit p-3 px-5">Update</button>
												</div>
												
									</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>

