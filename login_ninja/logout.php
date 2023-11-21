<?php
// core configuration
include_once "./configuration/configuration.php";
// destroy session, it will remove ALL session settings
session_destroy();
//redirect to login page
header("Location: {$home_url}login.php");
?>