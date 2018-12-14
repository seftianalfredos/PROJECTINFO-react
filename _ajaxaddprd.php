<?php 
include 'config.php';
$ProductName	= strval($_REQUEST['ProductName']);
$ProductCode	= strtoupper(strval($_REQUEST['ProductCode']));
$ProductNote	= strval($_REQUEST['ProductNote']);
//$prdUrut		= strval($_REQUEST['prdUrut']);

$stmt   = $DBcon->prepare("SELECT * FROM table_product ORDER BY prd_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $id = $row['ProductID'];
  $a  = substr($id, 3,3);
  if ($baris == 0) {
    $prdUrut = 1;
  }else{
    $a++;
    $prdUrut = $a; 
  }
}


if ($prdUrut < 10) {
	$ProductID = "PRD00".$prdUrut;
}else if ($prdUrut < 100) {
	$ProductID = "PRD0".$prdUrut;
}else{
	$ProductID = "PRD".$prdUrut;
}


$stmt	=	$DBcon->prepare("INSERT INTO table_product(ProductID,ProductName,ProductCode,ProductNote) VALUES(:ProductID,:ProductName,:ProductCode,:ProductNote)");
// $stmt	=	$DBcon->prepare("INSERT INTO table_group SET GroupID = '$GroupID', GroupName = '$GroupName', GroupNote = '$GroupNote' ");


$stmt->bindParam(':ProductID', $ProductID);
$stmt->bindParam(':ProductName', $ProductName);
$stmt->bindParam(':ProductCode', $ProductCode);
$stmt->bindParam(':ProductNote', $ProductNote);
// $stmt->execute();


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>