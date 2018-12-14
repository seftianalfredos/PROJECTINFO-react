<?php 
include 'config.php';
$ModelName		= strval($_REQUEST['ModelName']);
$prd_id			= intval($_REQUEST['prd_id']);
//$modUrut		= strval($_REQUEST['modUrut']);

$stmt   = $DBcon->prepare("SELECT *FROM table_model ORDER BY mdl_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $id = $row['ModelID'];
  $a  = substr($id, 3,3);
  if ($baris == 0) {
		$modUrut = 1;
  }else{
    $a++; 
		$modUrut = $a;
  }
}

if ($modUrut < 10) {
	$ModelID = "MDL00".$modUrut;
}else if ($modUrut < 100) {
	$ModelID = "MDL0".$modUrut;
}else{
	$ModelID = "MDL".$modUrut;
}

$stmt	=	$DBcon->prepare("INSERT INTO table_model(ModelID, ModelName, prd_id) VALUES(:ModelID, :ModelName, :prd_id)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_model SET ModelID = :ModelID, ModelName = :ModelName, prd_id = :prd_id, ChasisNote = :ChasisNote ");

$stmt->bindParam(':ModelID', $ModelID);
$stmt->bindParam(':ModelName', $ModelName);
$stmt->bindParam(':prd_id', $prd_id);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>