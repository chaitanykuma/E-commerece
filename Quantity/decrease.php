<?php 
include "../config.php"; 
session_start();
if(empty($_SESSION["id"])){
    header("Location: login.php");
  }
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $select = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
    $reselect = $conn->query($select);
    if(mysqli_num_rows($reselect)){
        while($row = $reselect->fetch_assoc()){
            $amount = $row["amount"];
        }
    }
    $upd = "SELECT * FROM `user_cart` WHERE `product_id`='$product_id'";
    $res = $conn->query($upd);
    if(mysqli_num_rows($res)){
        while($row = $res->fetch_assoc()){
            $quantity = $row["quantity"];
        }
    }
    if($quantity >= 1){
    $sql = "UPDATE `user_cart` SET quantity = $quantity - 1, total_amount = ($quantity - 1) * $amount WHERE `product_id`='$product_id'";
     $result = $conn->query($sql);
    }
}
if ($result == TRUE) {
    echo "<script>
    window.location.replace('../cart.php');
    </script>";
}
else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}
?>