<?php 
include 'config.php';
$type_id = intval($_REQUEST['type_id']);

$stmt = $DBcon->prepare("DELETE FROM table_schedule WHERE type_id = '$type_id' ");
$stmt->execute();
 ?>