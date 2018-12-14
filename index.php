<?php

session_start();
$currentmenu = "1";
// ###############################################  PROTEKSI APABILA TIDAK LOGIN #################################
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
	header("location: http://10.10.104.251/UserManagement/admin/login.php");

	exit();
}else{
	?>
	<!---------------------------------------------------------------------------- html   -->

	<html>
	<head>
		<meta http-equiv="Content-Language" content="en-us">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project Information System 2018 - Beranda</title>


		<script src="_jscript/js/jquery.min.js"></script>
		<script src="_jscript/js/kickstart.js"></script>
		<script src="_jscript/js/jquery-ui.js"></script>
		<script src="_jscript/js/sweetalert.min.js"></script>

		<link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
		<link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
		<link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
		<link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">

		<style type="text/css">
		body {
			margin-top: 0px;
			margin-bottom: 10px;
			margin-left: 10px;
			margin-right: 10px;
			background-color:#fff; 
			align: center;
		}

		td {
			font-size:14px;
			font-family:"Segoe UI";
			color:000;
		}
	</style>

</head>

<?php 
if($_SESSION["username"] != "") {
	?>
	<body>
		<center/>

		<table border="0" cellpadding="0" cellspacing="0" width="1800" height="200" bordercolor="#FF0000" bgcolor="#FFFFFF" style="border-collapse: collapse">

			<tr>
				<td width="1800" height="200" valign="top" >
					<?php 
					include_once ("psi_menu.php");
					?>
					<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%"  bordercolor="#0000FF">
						<tr>
							<td width="100%" height="18" class="title" >
								<h9>Project on Progress</h9>
							</td>
						</tr>
						<tr>
							<td width="100%" height="1" class="header1"></td>
						</tr>
						<tr>
							<td width="100%" height="1">
								<table border="0" width="100%" height="1" bordercolor="#FF0000" style="border-collapse: collapse">
									<tr>
										<td width="100%" height="1" >
											<table class="psi_width2" border="0" height="1" bordercolor="#345F45" style="border-collapse: collapse">
												<tr>
													<td width="100%" height="2000" class="right" bgcolor="#fff" ></td>
												</tr>
												<tr>
													<td width="100%" height="18"></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td width="100%" height="50" class="left"></td>
						</tr>
						<tr>
							<td width="100%" height="1" class="header1"></td>
						</tr>
						<tr>
							<td width="100%" height="36" class="left">R&D - Project Information System 2018</td>
						</tr>
						<tr>
							<td width="100%" height="100" class="left"></td>
						</tr>

					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>


<script>
	window.onscroll = function() {myFunction()};

	var navbar = document.getElementById("navbar");
	var sticky = navbar.offsetTop;

	function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
		} else {
			navbar.classList.remove("sticky");
		}
	}
</script>


</body>
</html>

<?php 
} else {
	header("location: http://10.10.104.251/UserManagement/admin/login.php");

	exit();
}
}
?>