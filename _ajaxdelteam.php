<?php 
include 'config.php';
$team_id = intval($_REQUEST['team_id']);

$stmt = $DBcon->prepare("DELETE FROM table_team WHERE team_id = '$team_id' ");
$stmt->execute();
 ?>