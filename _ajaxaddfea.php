<?php 
include 'config.php';
$FeatureName		= strval($_REQUEST['FeatureName']);
$prd_id				= intval($_REQUEST['prd_id']);
$FeatureNote		= strval($_REQUEST['FeatureNote']);


$stmt	=	$DBcon->prepare("INSERT INTO table_feature(FeatureName, prd_id, FeatureNote) VALUES(:FeatureName, :prd_id, :FeatureNote)");

$stmt->bindParam(':FeatureName', $FeatureName);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':FeatureNote', $FeatureNote);

if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}

?>