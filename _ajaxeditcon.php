<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$con_id			= intval($_REQUEST['con_id']);
$CountryName	= strval($_REQUEST['CountryName']);
$Lot			= strval($_REQUEST['Lot']);
$CountryNote	= strval($_REQUEST['CountryNote']);



$stmt	=	$DBcon->prepare("UPDATE table_country SET CountryName = :CountryName, Lot = :Lot, CountryNote = :CountryNote, edited_date = '$edited_date'  WHERE con_id =  '$con_id' ");


$stmt->bindParam(':CountryName', $CountryName);
$stmt->bindParam(':Lot', $Lot);
$stmt->bindParam(':CountryNote', $CountryNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>