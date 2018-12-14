<?php 
include 'config.php';
$StatusName	 = strval($_REQUEST['StatusName']);
$StatusAlias = strtoupper(strval($_REQUEST['StatusAlias']));
$StatusNote	 = strval($_REQUEST['StatusNote']);
$sc_id	 = intval($_REQUEST['sc_id']);
//$staUrut		= strval($_REQUEST['staUrut']);

$stmt   = $DBcon->prepare("SELECT * FROM table_status ORDER BY sta_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $id = $row['StatusID'];
  $a  = substr($id, 3,3);
  if ($baris == 0) {
		$staUrut = 1;
  }else{
    $a++; 
		$staUrut = $a;
	}
}


if ($staUrut < 10) {
	$StatusID = "STA00".$staUrut;
}else if ($staUrut < 100) {
	$StatusID = "STA0".$staUrut;
}else{
	$StatusID = "STA".$staUrut;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_status(StatusID,StatusName, StatusAlias, sc_id, StatusNote) VALUES(:StatusID,:StatusName, :StatusAlias, :sc_id, :StatusNote)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_group SET GroupID = '$GroupID', GroupName = '$GroupName', GroupNote = '$GroupNote' ");


$stmt->bindParam(':StatusID', 	$StatusID);
$stmt->bindParam(':StatusName', $StatusName);
$stmt->bindParam(':StatusAlias', $StatusAlias);
$stmt->bindParam(':sc_id', $sc_id);
$stmt->bindParam(':StatusNote', $StatusNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>