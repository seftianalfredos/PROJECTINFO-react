<?php 
include 'config.php';
$prj_id = intval($_REQUEST['prj_id']);

$stmt = $DBcon->prepare("DELETE FROM table_project WHERE prj_id = '$prj_id' ");
$stmt->execute();
 ?>