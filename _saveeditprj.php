<?php 
include 'config.php';
$prj_id 		 	= '';
$gp_id 		 		= '';
$prd_id		 		= '';
$ProjectName		= '';
$ProjectMarket		= '';
$grp_id		 		= '';
$buy_id				= '';
$sta_id				= '';
$ProjectStartDate	= '';
$ProjectFinishDate	= '';
$man_id				= '';
$ordered_by			= '';
$ProjectNote		= '';


$prj_id 		 	= intval($_REQUEST['prj_id']);
$gp_id 		 		= intval($_REQUEST['gp_id']);
$prd_id 			= intval($_REQUEST['prd_id']);
$ProjectName		= strval($_REQUEST['ProjectName']);
$ProjectMarket		= strval($_REQUEST['ProjectMarket']);
$grp_id		 		= intval($_REQUEST['grp_id']);
$buy_id				= intval($_REQUEST['buy_id']);
$sta_id				= intval($_REQUEST['sta_id']);
$ProjectStartDate	= date("Y-m-d", strtotime(strval($_REQUEST['ProjectStartDate'])));
$man_id				= intval($_REQUEST['man_id']);
$ordered_by			= strval($_REQUEST['ordered_by']);
$ProjectNote		= strval($_REQUEST['ProjectNote']);

if (isset($ProjectFinishDate)) {
	$ProjectFinishDate = date("Y-m-d", strtotime(strval($_REQUEST['ProjectFinishDate'])));
	$query = $DBcon->prepare("UPDATE table_project SET ProjectFinishDate = :ProjectFinishDate WHERE prj_id = :prj_id ");
	$query->bindParam(':ProjectFinishDate', $ProjectFinishDate);
	$query->bindParam(':prj_id', $prj_id);
	$query->execute();
}

$stmt = $DBcon->prepare("UPDATE table_project SET gp_id = :gp_id, prd_id = :prd_id, ProjectName = :ProjectName, ProjectMarket = :ProjectMarket, grp_id = :grp_id, buy_id = :buy_id, sta_id = :sta_id, ProjectStartDate = :ProjectStartDate, man_id = :man_id, ProjectNote = :ProjectNote, ordered_by = :ordered_by WHERE prj_id = :prj_id ");

$stmt->bindParam(':prj_id', $prj_id);
$stmt->bindParam(':gp_id', $gp_id);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':ProjectName', $ProjectName);
$stmt->bindParam(':ProjectMarket', $ProjectMarket);
$stmt->bindParam(':grp_id', $grp_id);
$stmt->bindParam(':buy_id', $buy_id);
$stmt->bindParam(':sta_id', $sta_id);
$stmt->bindParam(':ProjectStartDate', $ProjectStartDate);
$stmt->bindParam(':man_id', $man_id);
$stmt->bindParam(':ordered_by', $ordered_by);
$stmt->bindParam(':ProjectNote', $ProjectNote);

if ($stmt->execute()) {
	$result		= array(
		"prj_id"			=> $prj_id,
		"gp_id" 		 	=> $gp_id,
		"prd_id" 		 	=> $prd_id,
		"ProjectName"		=> $ProjectName,
		"ProjectMarket"		=> $ProjectMarket,
		"grp_id"		 	=> $grp_id,
		"buy_id"			=> $buy_id,
		"sta_id"			=> $sta_id,
		"ProjectStartDate"	=> $ProjectStartDate,
		"man_id"			=> $man_id,		
		"ordered_by"		=> $ordered_by,		
		"ProjectNote"		=> $ProjectNote
	);
	echo json_encode($result);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
?>