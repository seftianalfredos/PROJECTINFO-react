<?php 
include 'config.php';
$engineer		= strval($_REQUEST['engineer']);
$functional		= strval($_REQUEST['functional']);
$design			= strval($_REQUEST['design']);
$subdesign		= strval($_REQUEST['subdesign']);
$jobdesc		= strval($_REQUEST['jobdesc']);
$type_id		= intval($_REQUEST['type_id']);


/*$res	= array(
	"type_id" 		=> $type_id,
	"engineer" 		=> $engineer,
	"functional" 	=> $functional,
	"design" 		=> $design,
	"subdesign" 	=> $subdesign,
	"jobdesc" 		=> $jobdesc
);
echo json_encode($res);*/

$stmt	=	$DBcon->prepare("INSERT INTO table_team(engineer, functional, design, subdesign, jobdesc, type_id) VALUES(:engineer, :functional, :design, :subdesign, :jobdesc, :type_id)");


$stmt->bindParam(':engineer', $engineer);
$stmt->bindParam(':functional', $functional);
$stmt->bindParam(':design', $design);
$stmt->bindParam(':subdesign', $subdesign);
$stmt->bindParam(':jobdesc', $jobdesc);
$stmt->bindParam(':type_id', $type_id);


if ($stmt->execute()) {
	$res	= array(
		"engineer" 		=> $engineer,
		"functional" 	=> $functional,
		"design" 		=> $design,
		"subdesign" 	=> $subdesign,
		"jobdesc" 		=> $jobdesc,
		"type_id" 		=> $type_id
	);
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
?>