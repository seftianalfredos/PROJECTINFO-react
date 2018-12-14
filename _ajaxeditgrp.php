<?php 
include 'config.php';

date_default_timezone_set('Asia/Bangkok');
$edited_date = date("Y-m-d H:i:s");


$grp_id		= intval($_REQUEST['grp_id']);
$GroupName	= strval($_REQUEST['GroupName']);
$GroupNote	= strval($_REQUEST['GroupNote']);



$stmt	=	$DBcon->prepare("UPDATE table_group SET GroupName = :GroupName, GroupNote = :GroupNote, edited_date = '$edited_date' WHERE grp_id =  '$grp_id' ");


$stmt->bindParam(':GroupName', $GroupName);
$stmt->bindParam(':GroupNote', $GroupNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= array(
		'GroupName'	=>	$GroupName,
		'GroupNote'	=>	$GroupNote
	);
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>