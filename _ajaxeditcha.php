<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$cha_id			= intval($_REQUEST['cha_id']);
$ChasisName		= strval($_REQUEST['ChasisName']);
$prd_id			= intval($_REQUEST['prd_id']);
$ChasisNote		= strval($_REQUEST['ChasisNote']);



$stmt	=	$DBcon->prepare("UPDATE table_chasis SET ChasisName = :ChasisName, prd_id = :prd_id, ChasisNote = :ChasisNote, edited_date = '$edited_date'  WHERE cha_id =  '$cha_id' ");


$stmt->bindParam(':ChasisName', $ChasisName);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':ChasisNote', $ChasisNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>