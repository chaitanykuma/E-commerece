<?php
include 'config.php';
session_start();
unset($_SESSION["admin_id"]);
//session_unset();
session_destroy();
header("location: Adminlogin/adminlogin.php");
?>