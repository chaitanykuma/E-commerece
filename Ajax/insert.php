<?php
require_once "../config.php";
$card_number=$_POST['card_number'];
$months=$_POST['months'];
$year=$_POST['year'];
$cvv=$_POST['cvv'];

$sql= mysqli_query($conn, "INSERT INTO `user_payment_details` (`card_number`, `month`, `year`, `cvv`) VALUES ('$card_number', '$months', '$year', '$cvv')");

echo "The method has been successfully set.";

?>