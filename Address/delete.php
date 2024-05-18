<?php 
include "../config.php"; 
session_start();
if(empty($_SESSION["id"])){
    header("Location: ../index.php");
  }
if (isset($_GET['address_id'])) {
    $address_id = $_GET['address_id'];
    // $sql = "DELETE FROM `user_address` WHERE `address_id`='$address_id'";
    //  $result = $conn->query($sql);
}
// if ($result == TRUE) {
    echo "<script>alert('Address deleted successfull');
    window.location.replace('../checkout.php');
    </script>"; 
// }
// else{
//     echo "Error:" . $sql . "<br>" . $conn->error;
// }
?>