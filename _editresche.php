<?php 
include 'config.php';

$revT_id		=	'';
$tit_id			=	'';
$type_id		=	'';
$revCode		=	'';
$revDate		=	'';
$reason 		=	'';
$DepartementID 	= 	'';

$revT_id		=	intval($_REQUEST['revT_id']);
$tit_id			=	intval($_REQUEST['tit_id']);
$type_id		=	intval($_REQUEST['type_id']);
$DepartementID	=	intval($_REQUEST['DepartementID']);
$revCode		=	strval($_REQUEST['revCode']);
$revDate		=	date("Y-m-d", strtotime(strval($_REQUEST['revDate'])));
$reason 		=	strval($_REQUEST['reason']);

$stmt		=	$DBcon->prepare("UPDATE table_revisitype SET tit_id = :tit_id, type_id = :type_id, DepartementID = :DepartementID, revCode = :revCode, revDate = :revDate, reason = :reason WHERE revT_id = :revT_id ");
$stmt->bindParam(':revT_id', $revT_id);
$stmt->bindParam(':tit_id', $tit_id);
$stmt->bindParam(':DepartementID', $DepartementID);
$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':revCode', $revCode);
$stmt->bindParam(':revDate', $revDate);
$stmt->bindParam(':reason', $reason);

if ($stmt->execute()) {	
	$res = array(
		'revT_id' 		=> $revT_id,
		'tit_id' 		=> $tit_id,
		'DepartementID' => $DepartementID,
		'type_id' 		=> $type_id,
		'revCode' 		=> $revCode,
		'revDate' 		=> $revDate,
		'reason' 		=> $reason
	);
}else{
	$err = 'Not Inserted';
	echo json_encode($err);
}

echo json_encode($res);

?>