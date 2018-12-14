<?php 
include 'config.php';
$CountryName	= strval($_REQUEST['CountryName']);
$Lot			= strval($_REQUEST['Lot']);
$CountryNote	= strval($_REQUEST['CountryNote']);
//$conUrut		= strval($_REQUEST['conUrut']);

$stmt   = $DBcon->prepare("SELECT * FROM table_country ORDER BY con_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$id = $row['CountryID'];
	$a  = substr($id, 3,3);
	if ($baris == 0) {
		$conUrut = 1;
	}else{
	  $a++; 
	  $conUrut = $a;
	}
}


if ($conUrut < 10) {
	$CountryID = "CON00".$conUrut;
}else if ($conUrut < 100) {
	$CountryID = "CON0".$conUrut;
}else{
	$CountryID = "CON".$conUrut;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_country(CountryID,CountryName,Lot,CountryNote) VALUES(:CountryID,:CountryName,:Lot,:CountryNote)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_group SET GroupID = '$GroupID', GroupName = '$GroupName', GroupNote = '$GroupNote' ");


$stmt->bindParam(':CountryID', $CountryID);
$stmt->bindParam(':CountryName', $CountryName);
$stmt->bindParam(':Lot', $Lot);
$stmt->bindParam(':CountryNote', $CountryNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>