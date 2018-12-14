<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['role']);
session_destroy();
$_SESSION['username']='';
//unset($_SESSION['hak_akses']);

	//header("Location:../../index.php");
	echo "Log Out";
   header('Refresh: 0; URL = http://10.10.104.251/UserManagement/admin/logout.php?path=admin');
?>