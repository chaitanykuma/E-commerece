<?php
require_once "../config.php";
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="1.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="../css/tiny-slider.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="../favicon.png">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="../css/tiny-slider.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <!-- <link href="../Signup/css/style.css" rel="stylesheet"> -->
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
            <li><a class="nav-link" href="cart.php"><img src="../images/cart.svg" alt="cart"></a></li>
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
                            <img class="rounded-circle me-lg-2" src="../images/user.svg" alt="" style="width: 30px; height: 30px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $row["username"]; ?></span>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"  style="background-color: blue;">
                            <a href="Updateprofile/updateprofile.php" class="dropdown-item"> My Profile</a>
                            <a href="My order/myorder.php" class="dropdown-item"> My Order</a>
                            <a href="Changepassword/changepassword.php" class="dropdown-item"> Update Pass</a>
                            <a href="logout.php" class="dropdown-content"> Log Out</a>
                        </div> -->
                        <div class="dropdown-content">
                          <a href="Updateprofile/updateprofile.php"> My Profile</a>
                          <a href="My order/myorder.php">My Order</a>
                          <a href="Changepassword/changepassword.php">Update Pass</a>
                          <a href="../logout.php">Log Out</a>
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
                        <img class="rounded-circle me-lg-2" src="../images/user.svg" alt="" style="width: 30px; height: 30px;">
                        <span class="d-none d-lg-inline-flex">user</span>
                    </a>
                    <!-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"  style="background-color: blue;">
                    <a href="../Signup/signup.php" class="dropdown-item">Sign Up</a>
                    <a href="../Login/login.php" class="dropdown-item">Login</a>
                </div> --> <div class="dropdown-content">
                                    <a href="../Login/login.php">Login </a>
                                    <a href="../Signup/signup.php">Signup </a>
                                    
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
  <div class="content">
    <div class="all">
      <div class="content1">
        <div class="content2">
          <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima labore, harum perspiciatis, asperiores aut magni, veniam officia amet non itaque optio. Sapiente iusto dicta minus dolorem ab similique quia a?</p> -->
        </div>
      </div>
      <div class="blog">
        <h4>TOP FURNITURE TRENDS IN THE MILLENNIUM NEW DIRECTIONS FOR FURNITURE IN THE 21ST CENTURY</h4>
        <div class="div-1">
          <img src="./Images/Dining table.jpg" width="835px" hight="577px">
        </div>
        <div class="blogcontent">
          <P> </br></br></br>From art market mainstays to persistent provocateu. It was a tall order and a picky search for</br> us, when we tasked ourselves with determining an ultimate list of the greatest living modern </br>artists. Chances are, that the list below will be debated by many but alas…</br></br></br>

            When you need your company to have a new website or if you venture on updating your old </br>webpage with a new look and functionality, the choices are versatile… Assuming that you</br> will go the easy way and choose a theme for your WordPress website, the overall </br>number of characteristics that you will need to keep in mind narrows down significantly.</br> But how do you stay focused on what kind of a template you need and what do you want</br> to get from that template?</p> </br></br></br>
            
            <p>These are: Design or Visual Looks; Functionality;  Easy Installation and Administering </br>& Google-friendliness. All the WordPress themes that we have here have had a vast</br> team of professional designers sketching, working and executing the ultimate visual </br>look for it.  With such a wide range of choices at hand, we strongly advise you to </br>stick to the WordPress Theme that is based on your business’ or a closely related </br>field. Either way, thanks to all the diversity here you will be able to choose a Theme </br>that can be either of a formal color scheme with some light colors in it.</br></br></br></br>
            
            Furnicom is a furniture-producing company which items can be characterized as</br> unique, non-conformist and authentic – never boring and always full of imagination</br> and inspiration. Creating all kinds of furniture and a wide selection of decor elements</br> and accessories. With the courage to innovate, Furnicom creates trends and unique</br> furnishing collections being affordable and desirable for all people. As an international</br> supplier and generator of change Furnicom continues creating new furnishing designs</br> and art objects.</p>
            
        </div>
      </div>
        <div class="div-2">
          <div class="img1">
            <div class="image">
              <img src="./Images/Dining Table/download (1).jpeg" width="295px" height="200px">
            </div>
            <div class="imagetitle">
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum cum laboriosam eligendi neque nobis vitae cumque, ducimus quaerat accusantium eveniet eius? Voluptas autem sunt ipsum est odio nam nulla itaque!</p>
            </div>
          </div>
          <div class="img2">
            <div class="image">
              <img src="./Images/Dining Table/download (2).jpeg" width="295px" height="200px">
            </div>
            <div class="imagetitle">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis deleniti quidem, at labore totam nemo maiores obcaecati corporis temporibus sunt cupiditate veniam, corrupti similique delectus quo, quisquam debitis a ducimus.</p>
            </div>
          </div>
          <div class="img3">
            <div class="image">
              <img src="./Images/Dining Table/download (3).jpeg" width="295px" height="200px">
            </div>
            <div class="imagetitle">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci sit eligendi obcaecati, placeat exercitationem maiores nihil similique fugiat quam! Ab quia ex libero deserunt, quae corporis maxime autem id error?</p>
            </div>
          </div>
          <div class="img4">
            <div class="image">
              <img src="./Images/Dining Table/download.jpeg" width="295px" height="200px">
            </div>
            <div class="imagetitle">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, velit cupiditate recusandae consequatur a enim ipsam sit dolores asperiores delectus nostrum esse placeat mollitia in ullam rerum deleniti minima. Voluptates?</p>
            </div>
          </div>
    </div>
  </div>
  <footer class="footer-section">
    <div class="container relative">

      <!-- <div class="sofa-img">
        <img src="../images/sofa.png" alt="Image" class="img-fluid">
      </div> -->

      <!-- <?php require_once "../subscription.php"; ?> -->

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
                <li><a href="about.php">About us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact us</a></li>
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

      <div class="border-top copyright">
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
      </div>

    </div>
  </footer>
</body>
</html>