<?php
require_once "config.php";
session_start();
// if(empty($_SESSION["id"])){
//   echo "<script>alert('Please log in to view your cart items.');
//   window.location.replace('Single-products/single-products.php?id=$_SESSION[product_id]');
//   </script>";
//   //print_r($_SESSION["product_id"]);
// }
$sum_total = 0;
date_default_timezone_set('Asia/Kolkata');
$created_at = date( 'd-m-Y h:i:s A', time ());
if(isset($_SESSION["product_id"])){
  if(!empty($_SESSION["product_id"])){
    $insert = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$_SESSION[product_id]'");
    if(mysqli_num_rows($insert) > 0){
      while($data = $insert->fetch_assoc()){
        $amount = $data["amount"];
    }
  }
  $select = mysqli_query($conn, "INSERT INTO user_cart (user_id, product_id, total_amount, created_at) VALUES ('$_SESSION[id]', '$_SESSION[product_id]', $amount * 1 , '$created_at')");
  unset($_SESSION["product_id"]);
}
}
$start = 0;
    $row_per_page = 5;
    $sql = "SELECT * FROM user_cart WHERE user_id = '$_SESSION[id]'";
    $records = $conn->query( $sql );
    $nr_of_rows = $records->num_rows;
    $pages = ceil($nr_of_rows/$row_per_page);
    if(isset($_GET['page-nr'])){
      $page = $_GET['page-nr']-1;
      $start = $page*$row_per_page;
    }
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
		<title>Shopping cart || Furniture</title>
	</head>

	<body>
  <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furniture navigation bar">

<div class="container">
    <a class="navbar-brand" href="index.php">Furniture<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="shop.php">Shop</a></li>
            <li><a class="nav-link" href="about.php">About us</a></li>
            <li><a class="nav-link" href="services.php">Services</a></li>
            <li><a class="nav-link" href="blog.php">Blog</a></li>
            <li><a class="nav-link" href="contact.php">Contact us</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            <?php
            if(!empty($_SESSION["id"])){
            ?>
            <li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
            <?php
            }
            ?>
            <?php
            if(!empty($_SESSION["id"])){
                    $sql = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                    $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
            ?>
            <li>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="images/user.svg" alt="" style="width: 30px; height: 30px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $row["username"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"  style="background-color: blue;">
                            <a href="Updateprofile/updateprofile.php" class="dropdown-item"> My Profile</a>
                            <a href="My order/myorder.php" class="dropdown-item"> My Order</a>
                            <a href="Changepassword/changepassword.php" class="dropdown-item"> Update Pass</a>
                            <a href="logout.php" class="dropdown-item"> Log Out</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            }
        }
    }else{
        ?>
        <li>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="images/user.svg" alt="" style="width: 30px; height: 30px;">
                        <span class="d-none d-lg-inline-flex">user</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"  style="background-color: blue;">
                    <a href="Signup/signup.php" class="dropdown-item">Sign Up</a>
                    <a href="Login/login.php" class="dropdown-item">Login</a>
                </div>
            </div>
        </div>
    </li>
    <?php
    }
    ?>
    </ul>
</div>
</div>
</nav>
		<!-- Start Hero Section -->
    <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Your Cart</h1>
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

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $que = "SELECT * FROM user_cart WHERE user_id = '$_SESSION[id]' LIMIT $start,$row_per_page";
                        $result = $conn->query($que);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $quantity = $row["quantity"];
                            $sql = "SELECT * FROM products WHERE product_id = '$row[product_id]'";
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
                                  }
                                }
                                ?>
                        <tr>
                          <td class="product-thumbnail">
                          <a class="product-item" href="Single-products/single-products.php?id=<?php echo $row["product_id"]; ?>">
                          <img src="<?php if(!empty($image)){echo "Admin/Add products/folder/".$image;}else{ echo "";} ?>" width="150px" class="img-fluid">
                        </a>
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black"><?php if(!empty($name)){echo $name;}else{echo "";} ?></h2>
                          </td>
                          <td><?php if(!empty($amount)){echo $amount;}else{ echo "";} ?></td>
                          <td><?php
                            if(!empty($quantity)){?>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <?php if($quantity >= 1){?>
                                <a class="btn btn-outline-black decrease" type="button" href="Quantity/decrease.php?id=<?php echo $product_id ?>">&minus;</a>
                                <?php } ?>
                              </div>
                              <input type="text" class="form-control text-center quantity-amount" value="<?php echo $quantity; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <a class="btn btn-outline-black increase" type="button" href="Quantity/increase.php?id=<?php echo $product_id ?>">&plus;</a>
                              </div>
                            </div>
                           <?php }else{
                            echo "";
                           }?>
                          </td>
                          <td><?php if(!empty($amount)){echo $amount*$quantity ;}else{echo"";} ?></td>
                          <?php
                          if(!empty($product_id)){
                            ?>
                          <td><a class="btn btn-black btn-sm" href="delete.php?id=<?php echo $product_id ?>" onclick ='return checkdelete()'>X</a></td>
                        </tr>
                        <?php
                          }else{
                            echo "";
                          }
                        ?>
                        <?php
                        }
                            }
                          }
                        }else{
                          echo "It appears that you haven't added any products yet.";
                        }
                        ?>
                        <div class="page-info">
                                    <?php
                                        if(!isset($_GET['page-nr'])){
                                            $page = 1;
                                        }else{
                                            $page = $_GET['page-nr'];
                                        }
                                    ?>
                                    Showing <?php echo $page ?> of <?php echo $pages ?> pages
                                </div>
                            <div class="pagination">
                                <a href="?page-nr=1">First</a>
                                <?php
                                if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                                    ?>
                                    <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                                    <?php
                                    }else{
                                        ?>
                                        <a>Previous</a>
                                        <?php
                                    }
                                    ?>
                                <div class="page-numbers">
                                    <?php
                                    for($counter = 1; $counter <= $pages; $counter ++){
                                        ?>
                                        <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                                        <?php
                                        }
                                        ?>
                                </div>
                                <?php
                                if(!isset($_GET['page-nr'])){
                                    ?>
                                    <a href="?page-nr = 2">Next</a>
                                    <?php
                                    }
                                    else{
                                        if($_GET['page-nr'] >= $pages) {
                                            ?>
                                            <a>Next</a>
                                            <?php
                                            }else{
                                                ?>
                                                <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                                                <?php
                                                }
                                            }
                                            ?>
                        <style>
                        .pagination {
                          display: grid;
                          text-align: center;
                          padding-bottom: 10px;
                          display: left;

                        }
                        
                        .pagination a {
                          color: black;
                          float: left;
                          padding: 8px 16px;
                          text-decoration: none;
                          transition: background-color .3s;
                          border: 1px solid #ddd;
                          margin: 0 4px;
                        }
                        
                        .pagination a.active {
                          background-color: #4CAF50;
                          color: white;
                          border: 1px solid #4CAF50;
                        }
                        
                        .pagination a:hover:not(.active) 
                        {
                            background-color: #ddd;
                        }

                        .page-info{
                            text-align: left;
                            padding-bottom: 5px;
                            color: green;
                        }
                        </style>
                                <a href="?page-nr=<?php echo $pages?>">Last</a>
                            </div>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                    <a class="btn btn-black btn-sm btn-block" onclick="window.location.reload();">Update Cart</a>
                    </div>
                    <div class="col-md-6">
                      <a class="btn btn-outline-black btn-sm btn-block" href="shop.php">Continue Shopping</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <?php
                        $que = "SELECT SUM(total_amount) FROM user_cart WHERE user_id = '$_SESSION[id]'";
                        $result = $conn->query($que);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_array()) {
                            $total = $row["SUM(total_amount)"];
                          }
                        }
                      ?>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">
                            <?php 
                            if(empty($amount)){
                              echo "0";
                            }else{
                              echo $total; 
                            }
                          ?>
                          </strong>
                        </div>
                      </div>


                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Shipping Charge</span>
                          </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">
                          <?php 
                          //print_r($row["total_amount"]);
                            if(empty($amount)){
                              echo "0";
                            }else{
                              if($total >= 10000){
                                echo "0";
                              }else{
                                echo "999";
                              }
                            }                          
                            ?>
                          </strong>
                        </div>
                      </div>


                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">
                          <?php 
                          //print_r($row["total_amount"]);
                            if(empty($amount)){
                              echo "0";
                            }else{
                              echo $total; 
                            }                          
                            ?>
                          </strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		

		<!-- Start Footer Section -->
		<?php require_once "footer.php"; ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
    <script>
      function checkdelete(){
            return confirm('Are you certain you wish to remove the items from your cart?');
        }

</script>
	</body>

</html>
<?php
// }
?>
