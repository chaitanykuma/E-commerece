<?php
require_once "../config.php";
session_start();
$upi_id=$_POST['upi_id'];
date_default_timezone_set('Asia/Kolkata');
$saved_at = date( 'd-m-Y h:i:s A', time () );

$sql= mysqli_query($conn, "INSERT INTO `user_payment_details` (`user_id`, `upi_id`, `saved_at`) VALUES ('$_SESSION[id]', '$upi_id', '$saved_at')");

echo "The method has been successfully set.";

?>