<?php 
include 'config.php';
$notes_id = '';
$notes_id = intval($_REQUEST['notes_id']);

$query	= $DBcon->prepare("SELECT attachment FROM table_notes WHERE notes_id = :notes_id ");
$query->bindParam(':notes_id', $notes_id);
$query->execute();
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		$temp = $row['attachment'];

		unlink('_upload/notes/'.$temp);
	}

$stmt	=	$DBcon->prepare("DELETE FROM table_notes WHERE notes_id = :notes_id ");
$stmt->bindParam(':notes_id', $notes_id);

if ($stmt->execute()) {
	$res = "Delete Success";
	echo json_encode($res);
}else{
	$err = "Error Delete";
	echo json_encode($err);
}

?>