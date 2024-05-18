<?php
require_once "../config.php";
session_start();
if(empty($_SESSION["id"])){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My order || Furniture</title>
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
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furniture navigation bar">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Furniture<span>.</span></a>
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
                <li><a class="nav-link" href="../cart.php"><img src="../images/cart.svg"></a></li>
                <div class="dropdown">
					<li><a class="nav-link"><img src="../red-circle-logout-arrow-20586.png"></a></li>
					<div class="dropdown-content">
						<a href="../logout.php">Logout</a>
						<!-- <a href="../Admin/Adminlogin/adminlogin.php">Adminlogin</a> -->
					</div>
                </div>
             <?php
             }else{
                    ?>
				    <div class="dropdown">
					    <li><a class="nav-link"><img src="../images/user.svg"></a></li>
					    <div class="dropdown-content">
						    <a href="../Signup/signup.php">Signup</a>
						    <a href="../Admin/Adminlogin/adminlogin.php">Adminlogin</a>
					    </div>
                    </div>
                    <?php
                 }
                 ?>
            </ul>
        </div>
    </div>
</nav>
<?php
    $query = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id = $_SESSION[id]");
    if(mysqli_num_rows($query) > 0){
        while($abc = $query->fetch_assoc()){
            $order_id = $abc["order_id"];
            $status = $abc["status"];
            $date = $abc["order_at"];
?>
<div class="container1">
    <h1>My Orders</h1>
    <div class="order">
        
        <div class="order-header"> 
            <span class="order-number"><?php echo "Order #".$order_id; ?></span>
            <span class="order-status"><?php echo $status; ?></span>
        </div>
        <div class="order-date"><?php echo "Date:".$date; ?></div>
            <div class="order-details">
                <div class="order-detail">
                    <?php 
                    $user = mysqli_query($conn, "SELECT * FROM `user_cart` WHERE product_id = $abc[product_id] AND user_id = '$_SESSION[id]'");
                    if(mysqli_num_rows($user) > 0){
                        while($sel = $user->fetch_assoc()){
                            $total_amount = $sel["total_amount"];
                            $quantity = $sel["quantity"];
                            $product_id = $sel["product_id"];
                            ?>
                            <?php
                        }
                    }
                    ?>
                    <span class="detail-label">Total Amount:</span>
                    <span class="detail-value"><?php echo $total_amount; ?></span>
                </div>
                <div class="order-detail">
                    <span class="detail-label">Items:</span>
                    <span class="detail-value"><?php echo $quantity; ?></span>
                </div>
                <div class="order-detail">
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM user_address WHERE user_id = $_SESSION[id] AND address_id = '$abc[address_id]'");
                    if(mysqli_num_rows($select) > 0){
                        while($sel = $select->fetch_assoc()){
                            $firstname = $sel["firstname"];
                            $email = $sel["email"];
                            $address_lan_1 = $sel["address_lan_1"];
                            ?>
                    <span class="detail-label">Shipping Address:</span>
                    <span class="detail-value"><?php echo $firstname; echo ", "; echo $address_lan_1; ?></span>
                    <?php
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php
}
}else{ ?>
<div class="container1">
    <h1>My Orders</h1>
    <div class="order">
        <div class="order-header"> 
                            
        </div>
        <div class="order-details">
            <div class="order-detail">
                <?php echo "Oops! It appears that you haven't placed an order yet."; ?>
            </div>
            <div class="order-detail">
                <!-- <p><a class="form-control" style="border-radius:15px; width: 120px; height: 40px; display:flex; margin-top: 25px;" href="shop.php">Shop Now</a></p> -->
                <p><a href="../shop.php" class="btn" style="border-radius: 25px; margin-top: 20px; width: 150px;">Shop Now</a></p>
            </div>
            <div class="order-detail">
            </div>
        </div>
    </div>
</div>
<?php 
}?>
<!-- Start Product Section -->
<div class="product-section">
	<div class="container">
		<div class="row">
            <!-- Start Column 1 -->
			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                <p class="mb-4">“Elegance meets durability: Our handcrafted leather wallet, meticulously stitched from premium full-grain leather.” </p>
				<p><a href="../shop.php" class="btn">Explore</a></p>
			</div> 
			<!-- End Column 1 -->
            <!-- Start Column 2 -->
            <?php
            $sel = "SELECT * FROM products LIMIT 4 OFFSET 1";
            $ssl = mysqli_query($conn, $sel);
            if(mysqli_num_rows($ssl)){
                while($abc = $ssl->fetch_assoc()){
                    $product_id = $abc["product_id"];
					$name = $abc["name"];
					$amount = $abc["amount"];
					$select = mysqli_query($conn, "SELECT * FROM image WHERE product_id = '$product_id'");
                    if(mysqli_num_rows($select)){
                        while($que = $select->fetch_assoc()){
							$image = $que["image"];
                            ?>
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                <a class="product-item" href="../Single-products/single-products.php?id=<?php echo $product_id; ?>">
                                    <img src="<?php if(!empty($image)){echo "../Admin/Add products/folder/".$image;}else{ echo "";} ?>" class="img-fluid product-thumbnail">
                                    <h3 class="product-title"><?php echo $name ?></h3>
                                    <strong class="product-price"><?php echo $amount ?></strong>
                                    <span class="icon-cross">
                                        <img src="../images/cross.svg" class="img-fluid">
                                    </span>
                                </a>
					        </div>
                            <?php
                            }
                        }
                    }
                }
                ?>
                <!-- End Column 2 -->
        </div>
	</div>
</div>
<!-- End Product Section -->
<?php require_once "footer.php"; ?>
</body>
</html>