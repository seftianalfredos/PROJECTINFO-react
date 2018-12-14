<?php 
include 'config.php';
$SizeName		= strval($_REQUEST['SizeName']);
$SizeAlias		= strval($_REQUEST['SizeAlias']);
$prd_id			= intval($_REQUEST['prd_id']);
$SizeNote		= strval($_REQUEST['SizeNote']);
//$capUrut		= strval($_REQUEST['capUrut']);

$stmt   = $DBcon->prepare("SELECT *FROM table_capacity ORDER BY siz_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$id = $row['SizeID'];
	$a  = substr($id, 3,3);
	if ($baris == 0) {
	 	$capUrut = 1;
	}else{
	  $a++; 
	  $capUrut = $a;
	}
}
	

if ($capUrut < 10) {
	$SizeID = "SIZ00".$capUrut;
}else if ($capUrut < 100) {
	$SizeID = "SIZ0".$capUrut;
}else{
	$SizeID = "SIZ".$capUrut;
}

$stmt	=	$DBcon->prepare("INSERT INTO table_capacity(SizeID, SizeName, SizeAlias, prd_id, SizeNote) VALUES(:SizeID, :SizeName, :SizeAlias, :prd_id, :SizeNote)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_chasis SET SizeID = :SizeID, SizeName = :SizeName, prd_id = :prd_id, SizeNote = :SizeNote ");

$stmt->bindParam(':SizeID', $SizeID);
$stmt->bindParam(':SizeName', $SizeName);
$stmt->bindParam(':SizeAlias', $SizeAlias);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':SizeNote', $SizeNote);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>