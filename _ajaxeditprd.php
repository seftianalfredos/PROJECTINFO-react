<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$prd_id			= intval($_REQUEST['prd_id']);
$ProductName	= strval($_REQUEST['ProductName']);
$ProductCode	= strtoupper(strval($_REQUEST['ProductCode']));
$ProductNote	= strval($_REQUEST['ProductNote']);



$stmt	=	$DBcon->prepare("UPDATE table_product SET ProductName = :ProductName, ProductCode = :ProductCode, ProductNote = :ProductNote, edited_date = '$edited_date'  WHERE prd_id =  '$prd_id' ");


$stmt->bindParam(':ProductName', $ProductName);
$stmt->bindParam(':ProductCode', $ProductCode);
$stmt->bindParam(':ProductNote', $ProductNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>