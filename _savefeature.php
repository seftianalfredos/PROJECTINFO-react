<?php

include 'config.php';

$type_id	= $_POST['type_id'];
$fea_id 	= $_POST['cekFea'];

echo json_encode($type_id);
echo json_encode($fea_id);

$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
$reset->bindParam(':type_id', $type_id);
$reset->execute();


$total 	= count($fea_id);
for ($i=0; $i < $total; $i++) { 
	$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
	$stmt->bindParam(':type_id', $type_id);
	$stmt->bindParam(':fea_id', $fea_id[$i]);
	$stmt->execute();
}	
?>