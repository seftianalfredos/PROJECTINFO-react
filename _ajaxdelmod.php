_ajaxdelmod.php<?php 
include 'config.php';
$mdl_id = intval($_REQUEST['mdl_id']);

$stmt = $DBcon->prepare("DELETE FROM table_model WHERE mdl_id = '$mdl_id' ");
$stmt->execute();
 ?>