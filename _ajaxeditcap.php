<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$siz_id			= intval($_REQUEST['siz_id']);
$SizeName		= strval($_REQUEST['SizeName']);
$SizeAlias		= strval($_REQUEST['SizeAlias']);
$prd_id			= intval($_REQUEST['prd_id']);
$SizeNote		= strval($_REQUEST['SizeNote']);
$capUrut		= strval($_REQUEST['capUrut']);


$stmt	=	$DBcon->prepare("UPDATE table_capacity SET SizeName = :SizeName, SizeAlias = :SizeAlias, prd_id = :prd_id, SizeNote = :SizeNote, edited_date = '$edited_date'  WHERE siz_id =  '$siz_id' ");


$stmt->bindParam(':SizeName', $SizeName);
$stmt->bindParam(':SizeAlias', $SizeAlias);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':SizeNote', $SizeNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>