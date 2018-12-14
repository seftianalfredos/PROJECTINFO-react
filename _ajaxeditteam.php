<?php 
include 'config.php';

$team_id	= intval($_REQUEST['team_id']);
$engineer	= strval($_REQUEST['engineer']);
$functional	= strval($_REQUEST['functional']);
$design		= strval($_REQUEST['design']);
$subdesign	= strval($_REQUEST['subdesign']);
$jobdesc	= strval($_REQUEST['jobdesc']);


/*$res = array(
	'team_id' => $team_id,
	'engineer' => $engineer,
	'functional' => $functional,
	'design' => $design,
	'subdesign' => $subdesign,
	'jobdesc' => $jobdesc
);

echo json_encode($res);*/

$stmt	=	$DBcon->prepare("UPDATE table_team SET engineer = :engineer, functional = :functional, design = :design, subdesign = :subdesign, jobdesc = :jobdesc  WHERE team_id =  :team_id ");


$stmt->bindParam(':team_id', $team_id);
$stmt->bindParam(':engineer', $engineer);
$stmt->bindParam(':functional', $functional);
$stmt->bindParam(':design', $design);
$stmt->bindParam(':subdesign', $subdesign);
$stmt->bindParam(':jobdesc', $jobdesc);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>