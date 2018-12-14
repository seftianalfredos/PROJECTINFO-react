<?php 
include 'config.php';
$fea_id = intval($_REQUEST['fea_id']);

$stmt = $DBcon->prepare("DELETE FROM table_feature WHERE fea_id = '$fea_id' ");
$stmt->execute();
 ?>