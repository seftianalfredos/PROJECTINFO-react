<?php 
include 'config.php';
$type_id = intval($_REQUEST['type_id']);

$stmt = $DBcon->prepare("UPDATE table_type SET assign = 0 WHERE type_id = :type_id");
$stmt->bindParam(':type_id', $type_id);

$stmt->execute();
?>