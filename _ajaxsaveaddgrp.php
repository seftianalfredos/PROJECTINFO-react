<?php 
include 'config.php';
$GroupName	= strval($_REQUEST['GroupName']);
$GroupNote	= strval($_REQUEST['GroupNote']);
$assign		= strval($_REQUEST['assign']);

$query	=	$DBcon->prepare("SELECT *FROM table_group");
$query->execute();
$baris	= $query->rowCount();

if ($baris == 0) {
	$assign = 1;
}

if ($assign < 10) {
	$GroupID = "GRP00".$assign;
}else if ($assign < 100) {
	$GroupID = "GRP0".$assign;
}else{
	$GroupID = "GRP".$assign;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_group(GroupID,GroupName,GroupNote) VALUES(:GroupID,:GroupName,:GroupNote)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_group SET GroupID = '$GroupID', GroupName = '$GroupName', GroupNote = '$GroupNote' ");


$stmt->bindParam(':GroupID', $GroupID);
$stmt->bindParam(':GroupName', $GroupName);
$stmt->bindParam(':GroupNote', $GroupNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= array(
		"GroupID" 	=> $GroupID,
		"GroupName" => $GroupName,
		"GroupNote" => $GroupNote
	);
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>