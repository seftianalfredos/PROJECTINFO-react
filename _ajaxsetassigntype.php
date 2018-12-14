<?php 
include 'config.php';
$type_id	= intval($_REQUEST['type_id']);
$assign = 1;

/*$res = array(
	"type_id" => $type_id
);

echo json_encode($res);*/

$stmt	=	$DBcon->prepare("UPDATE table_type SET assign = :assign WHERE type_id = :type_id ");
$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':assign', $assign);


if ($stmt->execute()) {
	$res	= "Insert data Success";
	echo json_encode($res);
}else{
	$error	= "Not Inserted";
	echo json_encode($error);
}
 ?>
