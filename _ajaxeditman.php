<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$man_id			= intval($_REQUEST['man_id']);
$ManName		= strval($_REQUEST['ManName']);
$Otorisasi		= strval($_REQUEST['Otorisasi']);
$Design			= strval($_REQUEST['Design']);
$ManEmail		= strval($_REQUEST['ManEmail']);



$stmt	=	$DBcon->prepare("UPDATE table_manpower SET ManName = :ManName, Otorisasi = :Otorisasi, Design = :Design, ManEmail = :ManEmail, edited_date = '$edited_date'  WHERE man_id =  '$man_id' ");


$stmt->bindParam(':ManName', $ManName);
$stmt->bindParam(':Otorisasi', $Otorisasi);
$stmt->bindParam(':Design', $Design);
$stmt->bindParam(':ManEmail', $ManEmail);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>