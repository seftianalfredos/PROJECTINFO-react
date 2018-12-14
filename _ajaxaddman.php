<?php 
include 'config.php';
$ManName	= strval($_REQUEST['ManName']);
$Otorisasi	= strval($_REQUEST['Otorisasi']);
$Design		= strval($_REQUEST['Design']);
$ManEmail	= strval($_REQUEST['ManEmail']);
//$manUrut	= strval($_REQUEST['manUrut']);


$stmt   = $DBcon->prepare("SELECT *FROM table_manpower ORDER BY man_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$id = $row['ManID'];
	$a  = substr($id, 3,3);
	if ($baris == 0) {
		$manUrut = 1;
	}else{
	  $a++; 
		$manUrut = $a;
	}
}


if ($manUrut < 10) {
	$ManID = "MAN00".$manUrut;
}else if ($manUrut < 100) {
	$ManID = "MAN0".$manUrut;
}else{
	$ManID = "MAN".$manUrut;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_manpower(ManID,ManName,Otorisasi,Design, ManEmail) VALUES(:ManID, :ManName, :Otorisasi, :Design, :ManEmail)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_group SET GroupID = '$GroupID', GroupName = '$GroupName', GroupNote = '$GroupNote' ");


$stmt->bindParam(':ManID', $ManID);
$stmt->bindParam(':ManName', $ManName);
$stmt->bindParam(':Otorisasi', $Otorisasi);
$stmt->bindParam(':Design', $Design);
$stmt->bindParam(':ManEmail', $ManEmail);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>