<?php 
include 'config.php';
$sta_id =intval($_REQUEST['sta_id']);

$stmt = $DBcon->prepare("DELETE FROM table_status WHERE sta_id = '$sta_id' ");
$stmt->execute();
 ?>