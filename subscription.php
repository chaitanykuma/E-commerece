<?php
require_once "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
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
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form class="row g-3" method="POST">
								<div class="col-auto">
									<input type="text" name="subscribe_name" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" name="subscribe_email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary" name="send" value="Name" aria-label="Aria Name">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
								<p class="error" style="color: #FF0000;"><?php if(!empty($errmsg)){ echo "* ".$errmsg; }?></p>
								<p class="error" style="color: green;"><?php if(!empty($successmsg)){ echo $successmsg; }?></p>
							</form>

						</div>
					</div>
				</div>
</body>
</html>