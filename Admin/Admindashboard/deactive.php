<?php 
include "../config.php";
	if (isset($_GET['id'])){ 
		$id = $_GET['id']; 

		$sql="UPDATE `users` SET `status`=0 WHERE id='$id'"; 
		mysqli_query($conn,$sql);

	}
	header('location: admindashboard.php'); 
?>