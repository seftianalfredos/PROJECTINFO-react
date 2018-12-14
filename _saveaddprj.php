<?php 
session_start();
include 'config.php';

$gp_id 		 		= intval($_REQUEST['gp_id']);
$prd_id 		 	= intval($_REQUEST['prd_id']);
$ProjectName		= strval($_REQUEST['ProjectName']);
$ProjectMarket		= strval($_REQUEST['ProjectMarket']);
$grp_id		 		= intval($_REQUEST['grp_id']);
$buy_id				= intval($_REQUEST['buy_id']);
$sta_id				= intval($_REQUEST['sta_id']);
$ProjectStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['ProjectStartDate'])));
$ProjectFinishDate	= date("Y-m-d", strtotime(strval($_REQUEST['ProjectFinishDate'])));
$man_id				= intval($_REQUEST['man_id']);
$ordered_by			= strval($_REQUEST['ordered_by']);
$ProjectNote		= strval($_REQUEST['ProjectNote']);
$author 			= $_SESSION['username'];


$stmt = $DBcon->prepare("INSERT INTO table_project(gp_id, prd_id, ProjectName, ProjectMarket, grp_id, buy_id, sta_id, ProjectStartDate, ProjectFinishDate, man_id, ordered_by, ProjectNote, author) VALUES(:gp_id, :prd_id, :ProjectName, :ProjectMarket, :grp_id, :buy_id, :sta_id, :ProjectStartDate, :ProjectFinishDate, :man_id, :ordered_by, :ProjectNote, :author) ");


$stmt->bindParam(':gp_id', $gp_id);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':ProjectName', $ProjectName);
$stmt->bindParam(':ProjectMarket', $ProjectMarket);
$stmt->bindParam(':grp_id', $grp_id);
$stmt->bindParam(':buy_id', $buy_id);
$stmt->bindParam(':sta_id', $sta_id);
$stmt->bindParam(':ProjectStartDate', $ProjectStartDate);
$stmt->bindParam(':ProjectFinishDate', $ProjectFinishDate);
$stmt->bindParam(':man_id', $man_id);
$stmt->bindParam(':ordered_by', $ordered_by);
$stmt->bindParam(':ProjectNote', $ProjectNote);
$stmt->bindParam(':author', $author);

if ($stmt->execute()) {
	$result		= "Insert Success";
	$res 		= array(
		'gp_id'				=>	$gp_id,
		'prd_id'			=>	$prd_id,
		'ProjectName'		=>	$ProjectName,
		'ProjectMarket'		=>	$ProjectMarket,
		'grp_id'			=>	$grp_id,
		'buy_id'			=>	$buy_id,
		'sta_id'			=>	$sta_id,
		'ProjectStartDate'	=>	$ProjectStartDate,
		'ProjectFinishDate'	=>	$ProjectFinishDate,
		'man_id'			=>	$man_id,
		'ordered_by'		=>	$ordered_by,
		'ProjectNote'		=>	$ProjectNote,
		'author'			=>	$author
	);
	echo json_encode($result);
	echo json_encode($res);
}
else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
?>