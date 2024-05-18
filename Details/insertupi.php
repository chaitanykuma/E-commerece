<?php
require_once "../config.php";
session_start();
$upiid=$_POST['upiid'];
$sql="INSERT INTO `data` (`user_id`, `upiid`) VALUES ('$_SESSION[id]', '$upiid')";
print_r("INSERT INTO `data` (`user_id`, `upiid`) VALUES ('$_SESSION[id]', '$upiid')");
if ($conn->query($sql) === TRUE) {
    header("Location: ../checkout.php");
}
else 
{
    echo "failed";
}
?>
?>