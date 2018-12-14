<?php
include 'config.php';

$name 		= '';
$sub 		= '';
$id 	 	= '';

$name		=	strval($_REQUEST['name']);
$sub		=	strval($_REQUEST['sub']);
$id 		=	intval($_REQUEST['id']);

if ($sub == "editPlant") {
	$stmt = $DBcon->prepare("UPDATE table_plant SET name = :name where plant_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Plant Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}
}else if ($sub == "editFormat") {
	$stmt = $DBcon->prepare("UPDATE table_format SET name = :name where format_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Format Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editMadein") {
	$stmt = $DBcon->prepare("UPDATE table_madein SET name = :name where madein_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Made In Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editColor") {
	$stmt = $DBcon->prepare("UPDATE table_color SET name = :name where color_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Color Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editPattern") {
	$stmt = $DBcon->prepare("UPDATE table_pattern SET name = :name where pattern_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Pattern Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editFinishing") {
	$stmt = $DBcon->prepare("UPDATE table_finishing SET name = :name where finishing_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Finishing Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editHandle") {
	$stmt = $DBcon->prepare("UPDATE table_handle SET name = :name where handle_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Handle Type Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editRack") {
	$stmt = $DBcon->prepare("UPDATE table_rack SET name = :name where rack_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Rack Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editDimension") {
	$stmt = $DBcon->prepare("UPDATE table_dimension SET name = :name where dimension_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Status (Dimension) Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editPacking") {
	$stmt = $DBcon->prepare("UPDATE table_packing SET name = :name where packing_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Packing Name Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editRollbond") {
	$stmt = $DBcon->prepare("UPDATE table_rollbond SET name = :name where rollbond_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Rollbond Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editRollbondtype") {
	$stmt = $DBcon->prepare("UPDATE table_rollbondtype SET name = :name where rollbondtype_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Rollbond Type Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editTemperature") {
	$stmt = $DBcon->prepare("UPDATE table_temperature SET name = :name where temperature_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Temperature Control Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editClimate") {
	$stmt = $DBcon->prepare("UPDATE table_climate SET name = :name where climate_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Climate Class Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editCondensor") {
	$stmt = $DBcon->prepare("UPDATE table_condensor SET name = :name where condensor_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Condensor Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editRefrigerant") {
	$stmt = $DBcon->prepare("UPDATE table_refrigerant SET name = :name where refrigerant_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Refrigerant Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editRv") {
	$stmt = $DBcon->prepare("UPDATE table_rv SET name = :name where rv_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Rated Voltage Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editWv") {
	$stmt = $DBcon->prepare("UPDATE table_wv SET name = :name where wv_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Wide Voltage Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editRf") {
	$stmt = $DBcon->prepare("UPDATE table_rf SET name = :name where rf_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Rated Frequency Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editSC") {
	$stmt = $DBcon->prepare("UPDATE table_stacategory SET name = :name where sc_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Status Category Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editCP") {
	$stmt = $DBcon->prepare("UPDATE table_classproduct SET name = :name where cp_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Class Product Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editDep") {
	$stmt = $DBcon->prepare("UPDATE table_department SET name = :name where DepartementID = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Department Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}else if ($sub == "editCM") {
	$stmt = $DBcon->prepare("UPDATE table_categoryMonitor SET name = :name where cm_id = :id");
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':id',$id);
	if ($stmt->execute()) {
		$res = "Edit Category Monitor Success";
		echo json_encode($res);
	}else{
		$error	= "Not Inserted";
		echo json_encode($error);
	}

}



?>
