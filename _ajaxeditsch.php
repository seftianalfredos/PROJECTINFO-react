<?php 
include 'config.php';
$type_id		= intval($_REQUEST['type_id']);
$artStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['artStartDate'])));
$artEndDate		= date("Y-m-d", strtotime(strval($_REQUEST['artEndDate'])));
$artPIC			= strval($_REQUEST['artPIC']);
$mechStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['mechStartDate'])));
$mechEndDate	= date("Y-m-d", strtotime(strval($_REQUEST['mechEndDate'])));
$mechPIC		= strval($_REQUEST['mechPIC']);
$cycStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['cycStartDate'])));
$cycEndDate		= date("Y-m-d", strtotime(strval($_REQUEST['cycEndDate'])));
$cycPIC			= strval($_REQUEST['cycPIC']);
$elecStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['elecStartDate'])));
$elecEndDate	= date("Y-m-d", strtotime(strval($_REQUEST['elecEndDate'])));
$elecPIC		= strval($_REQUEST['elecPIC']);
$softStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['softStartDate'])));
$softEndDate	= date("Y-m-d", strtotime(strval($_REQUEST['softEndDate'])));
$softPIC		= strval($_REQUEST['softPIC']);


$stmt = $DBcon->prepare("UPDATE table_schedule SET startDate = :startDate, endDate = :endDate, PIC = :PIC WHERE type_id = :type_id AND dsgn_id = 1");
$stmt2 = $DBcon->prepare("UPDATE table_schedule SET startDate = :startDate, endDate = :endDate, PIC = :PIC WHERE type_id = :type_id AND dsgn_id = 2");
$stmt3 = $DBcon->prepare("UPDATE table_schedule SET startDate = :startDate, endDate = :endDate, PIC = :PIC WHERE type_id = :type_id AND dsgn_id = 3");
$stmt4 = $DBcon->prepare("UPDATE table_schedule SET startDate = :startDate, endDate = :endDate, PIC = :PIC WHERE type_id = :type_id AND dsgn_id = 4");
$stmt5 = $DBcon->prepare("UPDATE table_schedule SET startDate = :startDate, endDate = :endDate, PIC = :PIC WHERE type_id = :type_id AND dsgn_id = 5");


$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':startDate', $artStartDate);
$stmt->bindParam(':endDate', $artEndDate);
$stmt->bindParam(':PIC', $artPIC);

$stmt2->bindParam(':type_id', $type_id);
$stmt2->bindParam(':startDate', $mechStartDate);
$stmt2->bindParam(':endDate', $mechEndDate);
$stmt2->bindParam(':PIC', $mechPIC);

$stmt3->bindParam(':type_id', $type_id);
$stmt3->bindParam(':startDate', $cycStartDate);
$stmt3->bindParam(':endDate', $cycEndDate);
$stmt3->bindParam(':PIC', $cycPIC);

$stmt4->bindParam(':type_id', $type_id);
$stmt4->bindParam(':startDate', $elecStartDate);
$stmt4->bindParam(':endDate', $elecEndDate);
$stmt4->bindParam(':PIC', $elecPIC);

$stmt5->bindParam(':type_id', $type_id);
$stmt5->bindParam(':startDate', $softStartDate);
$stmt5->bindParam(':endDate', $softEndDate);
$stmt5->bindParam(':PIC', $softPIC);

if ($stmt->execute() && $stmt2->execute() && $stmt3->execute() && $stmt4->execute() && $stmt5->execute()) {
	$res	= "Update data Success";
	echo json_encode($res);
}else{
	$error	= "Not Updated";
	echo json_encode($error);
}
 ?>