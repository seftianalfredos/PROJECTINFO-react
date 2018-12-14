<?php
include 'config.php';
$name 	= '';
$sub	= '';

$name	=	strval($_REQUEST['name']);
$sub	=	strval($_REQUEST['sub']);


if ($sub == "Plant") {
	$stmt = $DBcon->prepare("INSERT INTO table_plant SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Plant Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Format") {
	$stmt = $DBcon->prepare("INSERT INTO table_format SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Format Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Made In") {
	$stmt = $DBcon->prepare("INSERT INTO table_madein SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Made In Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Color") {
	$stmt = $DBcon->prepare("INSERT INTO table_color SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Color Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Pattern") {
	$stmt = $DBcon->prepare("INSERT INTO table_pattern SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Pattern Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Finishing") {
	$stmt = $DBcon->prepare("INSERT INTO table_finishing SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Finishing Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Handle Type") {
	$stmt = $DBcon->prepare("INSERT INTO table_handle SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Handle Type Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Rack") {
	$stmt = $DBcon->prepare("INSERT INTO table_rack SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Rack Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Status (Dimension)") {
	$stmt = $DBcon->prepare("INSERT INTO table_dimension SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Status (Dimension) Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Packing Name") {
	$stmt = $DBcon->prepare("INSERT INTO table_packing SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Packing Name Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Rollbond") {
	$stmt = $DBcon->prepare("INSERT INTO table_rollbond SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Rollbond Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Rollbond Type") {
	$stmt = $DBcon->prepare("INSERT INTO table_rollbondtype SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Rollbond Type Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Temperature Control") {
	$stmt = $DBcon->prepare("INSERT INTO table_temperature SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Temperature Control Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Climate Class") {
	$stmt = $DBcon->prepare("INSERT INTO table_climate SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Climate Class Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Condensor") {
	$stmt = $DBcon->prepare("INSERT INTO table_condensor SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Condensor Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Refrigerant") {
	$stmt = $DBcon->prepare("INSERT INTO table_refrigerant SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Refrigerant Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Rated Voltage") {
	$stmt = $DBcon->prepare("INSERT INTO table_rv SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Rated Voltage Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Wide Voltage") {
	$stmt = $DBcon->prepare("INSERT INTO table_wv SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Wide Voltage Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Rated Frequency") {
	$stmt = $DBcon->prepare("INSERT INTO table_rf SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Rated Frequency Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Status Category") {
	$stmt = $DBcon->prepare("INSERT INTO table_stacategory SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Status Category  Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Class Product") {
	$stmt = $DBcon->prepare("INSERT INTO table_classproduct SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Class Product Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Department") {
	$stmt = $DBcon->prepare("INSERT INTO table_department SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Department Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "Category (Monitor)") {
	$stmt = $DBcon->prepare("INSERT INTO table_categoryMonitor SET name = :name");
	$stmt->bindParam(':name',$name);
	if ($stmt->execute()) {
		$res = "Insert Category Monitor Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}

?>
