<?php 
include 'config.php';
$man_id = intval($_REQUEST['man_id']);

$stmt = $DBcon->prepare("DELETE FROM table_manpower WHERE man_id = '$man_id' ");
$stmt->execute();
 ?>