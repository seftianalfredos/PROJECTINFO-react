<?php 
include 'config.php';
$siz_id = intval($_REQUEST['siz_id']);

$stmt = $DBcon->prepare("DELETE FROM table_capacity WHERE siz_id = '$siz_id' ");
$stmt->execute();
 ?>