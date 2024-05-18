<?php 
include "config.php"; 
session_start();
if(empty($_SESSION["id"])){
    header("Location: login.php");
  }
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `user_cart` WHERE `product_id`='$id'";
     $result = $conn->query($sql);
}
if ($result == TRUE) {
    echo "<script>alert('The product has been successfully removed from your cart.');
    window.location.replace('cart.php');
    </script>"; 
}
else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}
?>