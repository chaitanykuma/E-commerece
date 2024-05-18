<?php
session_start();
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Single Product</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="../css/tiny-slider.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>
<body>
	
	<!--PreLoader-->
    <!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<div class="site-logo">
							<a href="../index.html" style="color: white; font-size: 25px; margin-top: 10px;" >Furniture</a>
						</div>

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="../index.php">Home</a>
								</li>
								<li><a href="../shop.php">Shop</a></li>
								<li><a href="../about.php">About us</a>
								</li>
								<li><a href="../services.php">Services</a>
								</li>
								<li><a href="../blog.php">Blog</a></li>
								<li><a href="../contact.php">Contact us</a>
								</li>
								<li>
									<div class="header-icons">
                                        <?php if(!empty($_SESSION["id"])){ ?>
										<a class="shopping-cart" href="../cart.php"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="../logout.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                            <img class="rounded-circle me-lg-2" src="../images/user.svg" alt="" style="width: 30px; height: 30px;">
                                            <span class="d-none d-lg-inline-flex">Logout</span>
                                        </a>
                                        <?php }else{ ?>
                                            <a href="../Login/login.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                            <img class="rounded-circle me-lg-2" src="../images/user.svg" alt="" style="width: 30px; height: 30px;">
                                            <span class="d-none d-lg-inline-flex">Login</span>
                                        </a>
                                        <?php } ?>
									</div>
								</li>
                                
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
    <?php
    if (isset($_GET['id'])){ 
		$pro_id = $_GET["id"];
		$_SESSION["product_id"] = $pro_id;
        $select = "SELECT * FROM products WHERE product_id = '$_SESSION[product_id]'";
        $que = $conn->query($select);
            if(mysqli_num_rows($que) > 0){
            while ($res = $que->fetch_assoc()){
                $name = $res["name"];
                $price = $res["amount"];
                $description = $res["description"];
                $selec = mysqli_query($conn, "SELECT * FROM image WHERE product_id = '$_SESSION[product_id]'");
                if(mysqli_num_rows($selec)){
                  while($quer = $selec->fetch_assoc()){
                    $image = $quer["image"];
					?>
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php if(!empty($image)){echo "../Admin/Add products/folder/".$image;}else{ echo "";} ?>" alt="Image">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $name; ?></h3>
						<p class="single-product-pricing"><span>Price</span><?php echo $price; ?></p>
						<p><?php echo $description; ?></p>
						<div class="single-product-form">
							<a href="../cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categories: </strong>Furniture</p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><?php
                  }
                }
            }
        }
    }
    ?>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Here are some related products displayed below.</p>
					</div>
				</div>
			</div>
			<div class="row">
                <?php
                $sql = "SELECT * FROM products LIMIT 3";
                            $res = $conn->query($sql);
                            if(mysqli_num_rows($res) > 0){
                              while ($val = $res->fetch_assoc()){
                                $amount = $val["amount"];
                                $product_id = $val["product_id"];
                                $name = $val["name"];
                                ?>
                                <?php
                                $query = "SELECT * FROM image WHERE product_id = '$product_id'";
                                $resol = $conn->query($query);
                                if ($resol->num_rows > 0) {
                                  while ($rows = $resol->fetch_assoc()) {
                                    $image = $rows["image"];
                        ?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
                        <a href="single-products.php?id=<?php echo $product_id; ?>"><img src="<?php echo "../Admin/Add products/folder/".$image; ?>" alt="Image"></a>
						</div>
						<h3><?php echo $name; ?></h3>
						<p class="product-price"><?php echo $amount; ?> </p>
						<a href="single-products.php?id=<?php echo $product_id; ?>" class="cart-btn"><i class="fas fa-cart-plus"></i>Show Details</a>
					</div>
				</div><?php
                        }
                        }
                    }
                }
                        ?>
			</div>         
		</div>
	</div>
	<!-- end more products -->

    <footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="../images/sofa.png" alt="Image" class="img-fluid">
				</div>
<?php
require_once "../config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

	if(isset($_POST["send"]))
	{
		$subscribe_name = $_POST["subscribe_name"];
		$subscribe_email = $_POST["subscribe_email"];
		date_default_timezone_set('Asia/Kolkata');
        $send_time = date( 'd-m-Y h:i:s A', time ());
		$select = mysqli_query($conn, "SELECT * FROM `subscription` WHERE email = '$subscribe_email'");
        $row = mysqli_fetch_assoc($select);
        if(mysqli_num_rows($select) > 0){
            $errmsg = "Email id already exists! Please use different mail id";
        }else{
		$subscribe = "INSERT INTO subscription (`name`, `email`, `send_time`) VALUES ('$subscribe_name', '$subscribe_email', '$send_time')";
		mysqli_query($conn, $subscribe);
		$message = '<div>
            <p><b>Hi '.$subscribe_email.'</b><p>
			<p>Congratulations! You have taken the first step toward a fantastic journey with [Forniture]. Your subscription is complete.<p><br>
			<p>We can not wait to have you on board. Get ready for exclusive content, updates, and much more. Your adventure with us begins now!<p><br>
			<p>Best Regards,</p></br>
			<p>The [Forniture] Team</p>
            <br>
            </div>';
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '0c6d53a5cbce5b';
            $phpmailer->Password = '203b912d400e98';
            $phpmailer->FromName = "";
            $phpmailer->AddAddress($subscribe_email);
            $phpmailer->Subject = "Subscription";
            $phpmailer->isHTML( TRUE );
            $phpmailer->Body =$message;
            if($phpmailer->send())
            {
				$successmsg = "Subscription succesfull";
                }
		}

	}
	?>
<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="../images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form class="row g-3" method="POST">
								<div class="col-auto">
									<input type="text" name="subscribe_name" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" name="subscribe_email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary" name="send">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
								<p class="error" style="color: #FF0000;"><?php if(!empty($errmsg)){ echo "* ".$errmsg; }?></p>
								<p class="error" style="color: green;"><?php if(!empty($successmsg)){ echo $successmsg; }?></p>
							</form>

						</div>
					</div>
				</div>
				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furniture<span>.</span></a></div>
						<p class="mb-4">Until it's easier than to make a pure makeup policy. Until the end of life, no one wants to be a player. He doesn't like trucks. Aliquam vulputate velit imperdiet pain tempor sad. Children live.</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="../about.php">About us</a></li>
									<li><a href="../services.php">Services</a></li>
									<li><a href="../blog.php">Blog</a></li>
									<li><a href="../contact.php">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<!-- <div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://midriffinfosolution.org/">midriff info sol</a> Distributed By <a href="https://google.com">Google</a>
                            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div> -->

			</div>
		</footer>
	
	
	
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.countdown.js"></script>
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<script src="assets/js/waypoints.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<script src="assets/js/sticker.js"></script>
	<script src="assets/js/main.js"></script>

</body>
</html>