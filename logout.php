<?php 

session_start();

$_SESSION["user_id"] = null;
$_SESSION["user_email"] = null;
$_SESSION["user_password"] = null;
$_SESSION["user_firstname"] = null;
$_SESSION["user_lastname"] = null;
$_SESSION["user_phone"] = null;
$_SESSION["user_zip"] = null;
$_SESSION["user_city"] = null;
$_SESSION["user_state"] = null;
$_SESSION["user_steet_address"] = null;


header("Location: index.php");