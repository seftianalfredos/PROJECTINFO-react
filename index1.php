<?php

  $username = $_GET['username'];
  $role = $_GET['role'];
  
  session_start();
  $_SESSION['username'] = $username; 

  if ($role == "PIS-Administartor") {
  	$_SESSION['role'] = "AD";
  }else if ($role == "PIS-Engineer") {
  	$_SESSION['role'] = "EN";
  }else if ($role == "PIS-Guest") {
  	$_SESSION['role'] = "GE";
  }else if ($role == "PIS-Product-Manager") {
  	$_SESSION['role'] = "M";
  }else if ($role == "PIS-Project-Leader") {
  	$_SESSION['role'] = "PL";
  }else if ($role == "PIS-Section-Head") {
  	$_SESSION['role'] = "SH";
  }
  
  header("location: index.php");
       
?>