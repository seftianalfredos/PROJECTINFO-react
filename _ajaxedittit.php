<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");

$tit_id			= intval($_REQUEST['tit_id']);
$TitleName		= strval($_REQUEST['TitleName']);
$TitleCategory	= strval($_REQUEST['TitleCategory']);
$DepartementID	= strval($_REQUEST['DepartementID']);
$TitleNotes		= strval($_REQUEST['TitleNotes']);



$stmt	=	$DBcon->prepare("UPDATE table_title SET TitleName = :TitleName, TitleCategory = :TitleCategory, DepartementID = :DepartementID, TitleNotes = :TitleNotes, edited_date = '$edited_date'  WHERE tit_id =  '$tit_id' ");


$stmt->bindParam(':TitleName', $TitleName);
$stmt->bindParam(':TitleCategory', $TitleCategory);
$stmt->bindParam(':DepartementID', $DepartementID);
$stmt->bindParam(':TitleNotes', $TitleNotes);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>