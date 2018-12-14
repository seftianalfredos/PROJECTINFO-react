<?php 
include 'config.php';

$fea_id			= intval($_REQUEST['fea_id']);
$FeatureName	= strval($_REQUEST['FeatureName']);
$prd_id			= intval($_REQUEST['prd_id']);
$FeatureNote	= strval($_REQUEST['FeatureNote']);



$stmt	=	$DBcon->prepare("UPDATE table_feature SET FeatureName = :FeatureName, prd_id = :prd_id, FeatureNote = :FeatureNote WHERE fea_id =  '$fea_id' ");


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