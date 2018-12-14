<?php 
include 'config.php';
$revT_id =intval($_REQUEST['revT_id']);

$stmt = $DBcon->prepare("DELETE FROM table_revisitype WHERE revT_id = '$revT_id' ");
$stmt->execute();
 ?>