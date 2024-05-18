<?php
require_once "../config.php";
if(!empty($_SESSION["id"])){
	header("Location: index.php");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Registration Form || Furniture</title>
    <link rel="icon" type="image/png" href="../favicon.png"/>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
                
				
<?php require_once "../Loader/loader.php"; ?>       
    <?php
    if(isset($_POST["submit"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = md5($_POST["pass"]);
        $confirmpassword = md5($_POST["confirmpass"]);
        date_default_timezone_set('Asia/Kolkata');
        $created_at = date( 'd-m-Y h:i:s A', time ());
        if($password < 6) {
            $err = "Password should be at least 6 characters in length.";
        }else{
        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' or username = '$username'");
        $row = mysqli_fetch_assoc($sql);
        if(mysqli_num_rows($sql) > 0){
            $msg = "* Email id and username already exists";
        }else{
        if($password == $confirmpassword){
            $query = "INSERT INTO users (`firstname`, `lastname`, `username`, `email`, `phone`, `birthday`, `gender`, `password`, `created_at`) VALUES('$firstname', '$lastname', '$username', '$email', '$phone', '$birthday', '$gender', '$password', '$created_at')";
            mysqli_query($conn, $query);
            // Admin mail
            $msg = '<div>
            <p><b>Hello ADMIN!</b></p>
            <p>We have a new user registered. Please activate their account so they can access the site.</p>
            <br>
            <p><button class="btn btn-primary"><a href="http://localhost/Furniture/Admin/Admindashboard/admindashboard.php">Active</a></button></p><br>
            <p>Thankyou</p>
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
            $phpmailer->AddAddress($email);
            $phpmailer->Subject = "Activate user";
            $phpmailer->isHTML( TRUE );
            $phpmailer->Body =$msg;
            if($phpmailer->send())
            {
                $msg = "EMail send successfull";
                }

            //user email
            $message = '<div>
            <p><b>Hello!</b></p>
            <p>Welcome to Furniture shop.</p>
            <br>
            <p>Thankyou for joining us </p>
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
            $phpmailer->AddAddress($email);
            $phpmailer->Subject = "Welcome";
            $phpmailer->isHTML( TRUE );
            $phpmailer->Body =$message;
            if($phpmailer->send())
            {
                echo
                "<script> alert('Registration Successful please Login');
                    window.location.replace('../Login/login.php');
                    </script>";
                }
            // echo
            // "<script> alert('Registration Successful please Login');
            //     window.location.replace('../Login/login.php');
            //     </script>";
        }else{
            $msg = "* Password does'nt match";
        }
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
        <li class="sub-item"><img src="user.svg"></li>
    </ul>
    </div>
</div>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <!-- <p><a href="shop.php" class="btn">Explore</a></p> -->
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" action="">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First name</label>
                                    <input class="input--style-4" type="text" name="firstname" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" name="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User name</label>
                                    <input class="input--style-4" type="text" name="username" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="pass" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" name="confirmpass" required>
                                </div>
                            </div>
                        </div>
                        <p class="error" style="color: #FF0000;"><?php if(!empty($err)){ echo $err; }?></p></br>
                        <label for="login">Already have an account? <a href="../Login/login.php">Log In</a></label>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Submit</button>
                        </div><br>
                        <p class="error" style="color: #FF0000;"><?php if(!empty($msg)){ echo $msg; }?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->