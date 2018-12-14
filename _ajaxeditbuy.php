<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$buy_id			= intval($_REQUEST['buy_id']);
$BuyerName		= strval($_REQUEST['BuyerName']);
$BuyerNote		= strval($_REQUEST['BuyerNote']);
$con_id			= intval($_REQUEST['con_id']);
$brand			= strval($_REQUEST['brand']);

$stmt	=	$DBcon->prepare("UPDATE table_buyer SET BuyerName = :BuyerName, BuyerNote = :BuyerNote, brand = :brand, con_id = :con_id, edited_date = '$edited_date' WHERE buy_id =  '$buy_id' ");


$stmt->bindParam(':BuyerName', $BuyerName);
$stmt->bindParam(':BuyerNote', $BuyerNote);
$stmt->bindParam(':brand', $brand);
$stmt->bindParam(':con_id', $con_id);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>
