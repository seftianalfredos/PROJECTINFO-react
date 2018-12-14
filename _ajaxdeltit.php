<?php 
include 'config.php';
$tit_id =intval($_REQUEST['tit_id']);

$stmt = $DBcon->prepare("DELETE FROM table_title WHERE tit_id = '$tit_id' ");
$stmt->execute();
 ?>