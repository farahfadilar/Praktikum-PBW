<?php
session_start();
unset($_SESSION['name']);
$_SESSION['success'] = "Logout successful!";
header("Location: login.php");
?>