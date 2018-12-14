<?php
session_start();

//----------------------------------------------------------------------

//auth code

//if succes ------

$_SESSION["account_psi"] = "terdaftar";

//----------------------------------------------------------------------

header("location:./?link=home");
?>