<?php 
include 'config.php';
$con_id = intval($_REQUEST['con_id']);

$stmt = $DBcon->prepare("DELETE FROM table_country WHERE con_id = '$con_id' ");
$stmt->execute();
 ?>