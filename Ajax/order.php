<?php
require_once "../config.php";
session_start();
$address_id=$_POST['address_id'];
$payment_method=$_POST['payment_method'];
$card_number=$_POST['card_number'];
$months=$_POST['months'];
$year=$_POST['year'];
$cvv=$_POST['cvv'];

date_default_timezone_set('Asia/Kolkata');
$order_at = date( 'd-m-Y h:i:s A', time () );

$alldata = [];
$sql = mysqli_query($conn, "SELECT * FROM `user_cart` WHERE user_id = '$_SESSION[id]'");
if(mysqli_num_rows($sql) > 0){
    while($data = $sql->fetch_assoc()){
        $alldata[] = $data["product_id"];
    }
}
foreach($alldata as $key => $value){
// print_r($value);
}
$insert = mysqli_query($conn, "INSERT INTO `order` (user_id, product_id, address_id, payment_method, order_at) VALUES ('$_SESSION[id]', '$value', '$address_id', '$payment_method', '$order_at')");

$details = mysqli_query($conn, "INSERT INTO `user_payment_details` (`user_id`, `card_number`, `month`, `year`, `cvv`, `saved_at`) VALUES ('$_SESSION[id]', '$card_number', '$months', '$year', '$cvv', '$order_at')");


?>