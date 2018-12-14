<?php 
include 'config.php';
$grp_id =intval($_REQUEST['grp_id']);

$stmt = $DBcon->prepare("DELETE FROM table_group WHERE grp_id = '$grp_id' ");
$stmt->execute();
 ?>