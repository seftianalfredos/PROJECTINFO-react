<?php 
include 'config.php';
$buy_id = intval($_REQUEST['buy_id']);

$stmt = $DBcon->prepare("DELETE FROM table_buyer WHERE buy_id = '$buy_id' ");
$stmt->execute();
 ?>