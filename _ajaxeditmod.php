<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$mdl_id			= intval($_REQUEST['mdl_id']);
$ModelName		= strval($_REQUEST['ModelName']);
$prd_id			= intval($_REQUEST['prd_id']);



$stmt	=	$DBcon->prepare("UPDATE table_model SET ModelName = :ModelName, prd_id = :prd_id, edited_date = '$edited_date'  WHERE mdl_id =  '$mdl_id' ");


$stmt->bindParam(':ModelName', $ModelName);
$stmt->bindParam(':prd_id', $prd_id);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>