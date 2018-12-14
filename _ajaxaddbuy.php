<?php 
include 'config.php';
$BuyerName		= strval($_REQUEST['BuyerName']);
$BuyerNote		= strval($_REQUEST['BuyerNote']);
$BuyerBrand		= strval($_REQUEST['BuyerBrand']);
$con_id			= intval($_REQUEST['con_id']);


$stmt   = $DBcon->prepare("SELECT *FROM table_buyer ORDER BY buy_id DESC LIMIT 1 ");
$stmt->execute();
$baris  = $stmt->rowCount();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$id = $row['BuyerID'];
	$a  = substr($id, 3,3);
	if ($baris == 0) {
		$buyUrut = 1;
	}else{
	  $a++;
	  $buyUrut = $a;
	}
}


if ($buyUrut < 10) {
	$BuyerID = "BUY00".$buyUrut;
}else if ($buyUrut < 100) {
	$BuyerID = "BUY0".$buyUrut;
}else{
	$BuyerID = "BUY".$buyUrut;
}

$stmt	=	$DBcon->prepare("INSERT INTO table_buyer(BuyerID, BuyerName, BuyerNote, brand, con_id) VALUES(:BuyerID, :BuyerName, :BuyerNote, :brand, :con_id)");

$stmt->bindParam(':BuyerID', $BuyerID);
$stmt->bindParam(':BuyerName', $BuyerName);
$stmt->bindParam(':BuyerNote', $BuyerNote);
$stmt->bindParam(':brand', $BuyerBrand);
$stmt->bindParam(':con_id', $con_id);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>