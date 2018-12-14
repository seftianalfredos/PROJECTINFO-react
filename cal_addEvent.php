<?php 
session_start();
include 'config.php';
$tit_id			=	'';
$description	=	'';
$colors			=	'';
$start_date		=	'';
$end_date		=	'';
$attachment		=	'';
$LinkedTo		=	'';
$prj_id			=	'';
$type_id		=	'';
$author 		= 	'';
$target_dir		=	'_upload/notes/';
$temp_typeid	=	array();
$temp_prjid		=	array();

$tit_id			=	$_POST['tit_id'];
$description	=	$_POST['description'];
$colors			=	$_POST['colors'];
$start_date		=	$_POST['start_date'];
$end_date		=	$_POST['end_date'];
$LinkedTo		=	$_POST['LinkedTo'];
$prj_id			=	$_POST['prj_id'];
$type_id		=	$_POST['type_id'];
$author			= 	$_SESSION['username'];

if (isset($_FILES['attachment']['name'])) {
	$attachment		=	$_FILES['attachment']['name'];
	$src			=	$_FILES['attachment']['tmp_name'];
	$target_file 	= 	$target_dir.$attachment;
	move_uploaded_file($src, $target_file);
}

if ($LinkedTo == 'Project') {
	$string		=	explode(',', $prj_id);
	$total		=	count($string);

	for ($i=0; $i < $total; $i++) { 
		$query	=	$DBcon->prepare("SELECT type_id FROM table_type WHERE prj_id = :prj_id");
		$query->bindParam(':prj_id', $string[$i]);
		$query->execute();

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$temp_typeid[]	=	$row['type_id'];
		}


	}
	$total2	=	count($temp_typeid);

	if ($total2 == 0) {

		$stmt	=	$DBcon->prepare("INSERT INTO table_notes SET tit_id = :tit_id, description = :description, colors = :colors, start_date = :start_date, end_date = :end_date, attachment = :attachment, prj_id = :prj_id, author = :author ");
		$stmt->bindParam(':tit_id', $tit_id);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':colors', $colors);
		$stmt->bindParam(':start_date', $start_date);
		$stmt->bindParam(':end_date', $end_date);
		$stmt->bindParam(':attachment', $attachment);
		$stmt->bindParam(':prj_id', $prj_id);
		$stmt->bindParam(':author', $author);

		$stmt->execute();

		$res = array(
			'tit_id'		=> $tit_id,
			'description'	=> $description,
			'colors'		=> $colors,
			'start_date'	=> $start_date,
			'end_date'		=> $end_date,
			'attachment'	=> $attachment,
			'LinkedTo'		=> $LinkedTo,
			'prj_id'		=> $prj_id,
			'author'		=> $author,
			'type_id'		=> $type_id,
			'Tipe' 			=> 'gak ada'
		);
		echo json_encode($res);

	}else{

		for ($i=0; $i < $total2; $i++) { 

			$stmt	=	$DBcon->prepare("INSERT INTO table_notes SET tit_id = :tit_id, description = :description, colors = :colors, start_date = :start_date, end_date = :end_date, attachment = :attachment, prj_id = :prj_id , type_id = :type_id, author = :author ");
			$stmt->bindParam(':tit_id', $tit_id);
			$stmt->bindParam(':description', $description);
			$stmt->bindParam(':colors', $colors);
			$stmt->bindParam(':start_date', $start_date);
			$stmt->bindParam(':end_date', $end_date);
			$stmt->bindParam(':attachment', $attachment);
			$stmt->bindParam(':prj_id', $prj_id);
			$stmt->bindParam(':author', $author);
			$stmt->bindParam(':type_id', $temp_typeid[$i]);

			$stmt->execute();

		}

		$res = array(
			'tit_id'		=> $tit_id,
			'description'	=> $description,
			'colors'		=> $colors,
			'start_date'	=> $start_date,
			'end_date'		=> $end_date,
			'attachment'	=> $attachment,
			'LinkedTo'		=> $LinkedTo,
			'prj_id'		=> $prj_id,
			'author'		=> $author,
			'type_id'		=> $type_id,
			'Tipe' 			=> 'ada'
		);
		echo json_encode($res);
	}

}else if ($LinkedTo == 'Type') {
	$string		=	explode(',', $type_id);
	$total 		=	count($string);
	for ($i=0; $i < $total; $i++) {

		$sql 		=	$DBcon->prepare("SELECT prj_id FROM table_type WHERE type_id = :type_id");
		$sql->bindParam(':type_id', $string[$i]);
		$sql->execute();
		while ($rows = $sql->fetch(PDO::FETCH_ASSOC)) {
			$temp_prjid[] = $rows['prj_id'];
		}

	}

	for ($i=0; $i < $total; $i++) { 

		$stmt	=	$DBcon->prepare("INSERT INTO table_notes SET tit_id = :tit_id, description = :description, colors = :colors, start_date = :start_date, end_date = :end_date, attachment = :attachment, prj_id = :prj_id, type_id = :type_id, author = :author ");
		$stmt->bindParam(':tit_id', $tit_id);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':colors', $colors);
		$stmt->bindParam(':start_date', $start_date);
		$stmt->bindParam(':end_date', $end_date);
		$stmt->bindParam(':attachment', $attachment);
		$stmt->bindParam(':author', $author);
		$stmt->bindParam(':prj_id', $temp_prjid[$i]);
		$stmt->bindParam(':type_id', $string[$i]);

		$stmt->execute();
	}

		$res = array(
			'tit_id'		=> $tit_id,
			'description'	=> $description,
			'colors'		=> $colors,
			'start_date'	=> $start_date,
			'end_date'		=> $end_date,
			'attachment'	=> $attachment,
			'LinkedTo'		=> $LinkedTo,
			'prj_id'		=> $prj_id,
			'author'		=> $author,
			'type_id'		=> $type_id
		);
		echo json_encode($res);
		
}else if ($LinkedTo == 'Other') {
	
	if (isset($_POST['prj_id']) && isset($_POST['type_id'])) {
		$stmt	=	$DBcon->prepare("INSERT INTO table_notes SET tit_id = :tit_id, description = :description, colors = :colors, start_date = :start_date, end_date = :end_date, attachment = :attachment, author = :author");
		$stmt->bindParam(':tit_id', $tit_id);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':colors', $colors);
		$stmt->bindParam(':start_date', $start_date);
		$stmt->bindParam(':end_date', $end_date);
		$stmt->bindParam(':attachment', $attachment);
		$stmt->bindParam(':author', $author);

		$stmt->execute();

		$res = array(
			'tit_id'		=> $tit_id,
			'description'	=> $description,
			'colors'		=> $colors,
			'start_date'	=> $start_date,
			'end_date'		=> $end_date,
			'attachment'	=> $attachment,
			'LinkedTo'		=> $LinkedTo,
			'prj_id'		=> $prj_id,
			'author'		=> $author,
			'type_id'		=> $type_id
		);
		echo json_encode($res);
	}
}

?>