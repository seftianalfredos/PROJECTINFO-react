<?php 
include 'config.php';
$prd_id = intval($_REQUEST['prd_id']);

$stmt = $DBcon->prepare("DELETE FROM table_product WHERE prd_id = '$prd_id' ");
$stmt->execute();
 ?>