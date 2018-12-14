<?php 
	$koneksi = mysqli_connect("127.0.0.1","root","*123456#","pis");

	if (mysqli_connect_errno()) {
		echo "Connect to Database Failed : " . mysqli_connect_error();
	}
 ?>