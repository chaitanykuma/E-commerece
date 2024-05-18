<?php
session_start();
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
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
            <li><a class="nav-link" href="cart.php"><img src="images/cart.svg" alt="cart"></a></li>
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
</body>
</html>