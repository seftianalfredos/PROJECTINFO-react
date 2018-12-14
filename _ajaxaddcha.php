<?php 
include 'config.php';
$ChasisName		= strval($_REQUEST['ChasisName']);
$prd_id			= intval($_REQUEST['prd_id']);
$ChasisNote		= strval($_REQUEST['ChasisNote']);
//$chaUrut		= strval($_REQUEST['chaUrut']);

$stmt   = $DBcon->prepare("SELECT * FROM table_chasis ORDER BY cha_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $id = $row['ChasisID'];
  $a  = substr($id, 3,3);
  if ($baris == 0) {
  	$chaUrut = 1;
  }else{
    $a++;
    $chaUrut = $a; 
  }
}


if ($chaUrut < 10) {
	$ChasisID = "CHA00".$chaUrut;
}else if ($chaUrut < 100) {
	$ChasisID = "CHA0".$chaUrut;
}else{
	$ChasisID = "CHA".$chaUrut;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_chasis(ChasisID, ChasisName, prd_id, ChasisNote) VALUES(:ChasisID, :ChasisName, :prd_id, :ChasisNote)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_chasis SET ChasisID = :ChasisID, ChasisName = :ChasisName, prd_id = :prd_id, ChasisNote = :ChasisNote ");

$stmt->bindParam(':ChasisID', $ChasisID);
$stmt->bindParam(':ChasisName', $ChasisName);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':ChasisNote', $ChasisNote);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>