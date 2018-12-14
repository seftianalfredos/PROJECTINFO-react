<?php 
include 'config.php';
session_start();
$tempMonth			= '';

$type_id 			= '';
$revCode 			= '';
$revDate 			= '';
$tit_id 			= '';
$reason 			= '';
$TypeFinishDate 	= '';
$late				= '';
$DepartementID 		= '';

$type_id 		= intval($_REQUEST['type_id']);
$revCode 		= strval($_REQUEST['revCode']);
$revDate 		= date("Y-m-d",strtotime(strval($_REQUEST['revDate'])));
$tit_id 		= intval($_REQUEST['tit_id']);
$DepartementID 	= intval($_REQUEST['DepartementID']);
$reason 		= strval($_REQUEST['reason']);
$author 		= $_SESSION['username'];

$cek	=	$DBcon->prepare("SELECT revDate FROM table_revisitype WHERE type_id = :type_id AND revCode = 'R00' ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();

while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$tempMonth = $row['revDate'];

	$date1 = date_create($tempMonth);
	$date2 = date_create($revDate);

	$year1 = date_format($date1, 'Y');
	$year2 = date_format($date2, 'Y');

	$month1 = date_format($date1, 'm');
	$month2 = date_format($date2, 'm');

	$late = (($year2 - $year1) * 12) + ($month2 - $month1);

}

$stmt	=	$DBcon->prepare("INSERT INTO table_revisitype(type_id, revCode, revDate, tit_id, DepartementID, reason, late, author)VALUES(:type_id, :revCode, :revDate, :tit_id, :DepartementID, :reason, :late, :author) ");

$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':revCode', $revCode);
$stmt->bindParam(':revDate', $revDate);
$stmt->bindParam(':tit_id', $tit_id);
$stmt->bindParam(':DepartementID', $DepartementID);
$stmt->bindParam(':reason', $reason);
$stmt->bindParam(':late', $late);
$stmt->bindParam(':author', $author);

if ($stmt->execute()) {

	$stmt2 = $DBcon->prepare("UPDATE table_type SET TypeFinishDate = :TypeFinishDate WHERE type_id = :type_id");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':TypeFinishDate', $revDate);
	$stmt2->execute();

	$res = array(
	'type_id' 			=> $type_id,
	'revCode' 			=> $revCode,
	'revDate' 			=> $revDate,
	'tit_id' 			=> $tit_id,
	'DepartementID' 	=> $DepartementID,
	'revDate' 			=> $revDate,
	'reason' 			=> $reason,
	'late' 				=> $late,
	'author' 			=> $author
	);
	
	echo json_encode($res);

}else{

	echo json_encode('Error Insert Data');

}

?>