<?php
session_start();
require_once "../config.php";
if(empty($_SESSION["id"])){
	header("Location: index.php");
}
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
    <?php
    if(isset($_POST["update"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $user_id = $_SESSION["id"];
        $sql = "UPDATE `users` SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', phone='$phone', birthday='$birthday', gender='$gender' WHERE id='$user_id'";
        $result = $conn->query($sql); 
        $msg = "Record updated successfull";
    }
    ?>
<div class="flex">
    <li class="cont"><a href="../index.php">Furniture</a></li>
    <div class="disc">
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../shop.php">Shop</a></li>
        <li><a href="../about.php">About Us</a></li>
        <li><a href="../services.php">Service</a></li>
        <li><a href="../blog.php">Blog</a></li>
        <li><a href="../contact.php">Contact Us</a></li>
        <li><a href="../index.php"><img src="user.svg"></a></li>
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
                        <?php
                        $sql = "SELECT * FROM `users` WHERE `id`='$_SESSION[id]'";
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {        
                            while ($row = $result->fetch_assoc()) {
                                $firstname = $row["firstname"];
                                $lastname = $row["lastname"];
                                $username = $row["username"];
                                $email = $row["email"];
                                $gender = $row["gender"];
                                $phone = $row["phone"];
                                $birthday = $row["birthday"];
                            } 
                        }
                        ?>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">First name</label>
                                    <input class="input--style-4" type="text" name="firstname" value="<?php echo $firstname; ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" name="lastname" value="<?php echo $lastname; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User name</label>
                                    <input class="input--style-4" type="text" name="username" value="<?php echo $username; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday" value="<?php echo $birthday; ?>" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";}?>>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";}?>>
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
                                    <input class="input--style-4" type="email" name="email" value="<?php echo $email; ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" value="<?php echo $phone; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" name="update" type="submit">Update</button>
                        </div><br>
                        <p class="error" style="color: #00FF00;"><?php if(!empty($msg)){ echo $msg; }?></p>
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