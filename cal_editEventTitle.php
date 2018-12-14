<?php 
include 'config.php';

$notes_id		=	'';
$tit_id			=	'';
$description	=	'';
$colors			=	'';
$attachment		=	'';
$target_dir		=	'_upload/notes/';

$notes_id		=	$_POST['notes_id'];
$tit_id			=	$_POST['tit_id'];
$description	=	$_POST['description'];
$colors			=	$_POST['colors'];

if (isset($_FILES['attachment']['name'])) {
	$temp_name	= '';
	$attachment	= $_FILES['attachment']['name'];
	$src 		= $_FILES['attachment']['tmp_name'];

	$query		= $DBcon->prepare("SELECT attachment FROM table_notes WHERE notes_id = :notes_id ");
	$query->bindParam(':notes_id', $notes_id);
	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		$temp_name	=	$row['attachment'];
		unlink($target_dir.$temp_name);
	}

	$editfile	=	$DBcon->prepare("UPDATE table_notes SET attachment = :attachment WHERE notes_id = :notes_id ");
	$editfile->bindParam(':attachment', $attachment);
	$editfile->bindParam(':notes_id', $notes_id);
	$editfile->execute();

	$target_file	= $target_dir.$attachment;
	move_uploaded_file($src, $target_file);
}

$stmt 	=	$DBcon->prepare("UPDATE table_notes SET tit_id = :tit_id, description = :description, colors = :colors WHERE notes_id = :notes_id ");

$stmt->bindParam(':notes_id', $notes_id);
$stmt->bindParam(':tit_id', $tit_id);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':colors', $colors);

if ($stmt->execute()) {
	$res	=	array(
		'notes_id'		=>	$notes_id,
		'tit_id'		=>	$tit_id,
		'description'	=>	$description,
		'colors'		=>	$colors,
		'attachment'	=>	$attachment
	);

	echo json_encode($res);

}else{
	$err = "Data Not Inserted";

	echo json_encode($err);
}

?>