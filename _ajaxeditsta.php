<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$sta_id			= intval($_REQUEST['sta_id']);
$StatusName		= strval($_REQUEST['StatusName']);
$StatusAlias	= strtoupper(strval($_REQUEST['StatusAlias']));
$StatusNote		= strval($_REQUEST['StatusNote']);
$sc_id			= intval($_REQUEST['sc_id']);



$stmt	=	$DBcon->prepare("UPDATE table_status SET StatusName = :StatusName, StatusAlias = :StatusAlias, StatusNote = :StatusNote, sc_id = :sc_id, edited_date = '$edited_date'  WHERE sta_id =  '$sta_id' ");


$stmt->bindParam(':StatusName', $StatusName);
$stmt->bindParam(':StatusAlias', $StatusAlias);
$stmt->bindParam(':StatusNote', $StatusNote);
$stmt->bindParam(':sc_id', $sc_id);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>