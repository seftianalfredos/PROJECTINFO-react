<?php 
include 'config.php';
$cha_id = intval($_REQUEST['cha_id']);

$stmt = $DBcon->prepare("DELETE FROM table_chasis WHERE cha_id = '$cha_id' ");
$stmt->execute();
 ?>