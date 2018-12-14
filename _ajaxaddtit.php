<?php 
include 'config.php';
$TitleName		= strval($_REQUEST['TitleName']);
$TitleCategory	= strval($_REQUEST['TitleCategory']);
$TitleNotes		= strval($_REQUEST['TitleNotes']);
$DepartementID 	= intval($_REQUEST['DepartementID']);
//$titUrut		= strval($_REQUEST['titUrut']);


$stmt   = $DBcon->prepare("SELECT *FROM table_title ORDER BY tit_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $id = $row['TitleID'];
  $a  = substr($id, 3,3);
  if ($baris == 0) {
		$titUrut = 1;
  }else{
    $a++; 
		$titUrut = $a;
  }
}


if ($titUrut < 10) {
	$TitleID = "TIT00".$titUrut;
}else if ($titUrut < 100) {
	$TitleID = "TIT0".$titUrut;
}else{
	$TitleID = "TIT".$titUrut;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_title(TitleID,TitleName,TitleCategory, DepartementID, TitleNotes) VALUES(:TitleID,:TitleName,:TitleCategory, :DepartementID, :TitleNotes)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_group SET GroupID = '$GroupID', GroupName = '$GroupName', GroupNote = '$GroupNote' ");


$stmt->bindParam(':TitleID', $TitleID);
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