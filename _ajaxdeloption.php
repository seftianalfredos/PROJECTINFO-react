<?php 
include 'config.php';


$name 		= '';
$sub 		= '';
$id 		= '';

$name		=	strval($_REQUEST['name']);
$sub		=	strval($_REQUEST['sub']);
$id 		=	intval($_REQUEST['id']);

if ($sub == "delPlant") {
	$stmt = $DBcon->prepare("DELETE FROM table_plant WHERE plant_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delFormat") {
	$stmt = $DBcon->prepare("DELETE FROM table_format WHERE format_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delMadein") {
	$stmt = $DBcon->prepare("DELETE FROM table_madein WHERE madein_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delColor") {
	$stmt = $DBcon->prepare("DELETE FROM table_color WHERE color_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delPattern") {
	$stmt = $DBcon->prepare("DELETE FROM table_pattern WHERE pattern_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delFinishing") {
	$stmt = $DBcon->prepare("DELETE FROM table_finishing WHERE finishing_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delHandle") {
	$stmt = $DBcon->prepare("DELETE FROM table_handle WHERE handle_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delRack") {
	$stmt = $DBcon->prepare("DELETE FROM table_rack WHERE rack_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delDimension") {
	$stmt = $DBcon->prepare("DELETE FROM table_dimension WHERE dimension_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delPacking") {
	$stmt = $DBcon->prepare("DELETE FROM table_packing WHERE packing_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delRollbond") {
	$stmt = $DBcon->prepare("DELETE FROM table_rollbond WHERE rollbond_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delRollbondtype") {
	$stmt = $DBcon->prepare("DELETE FROM table_rollbondtype WHERE rollbondtype_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delTemperature") {
	$stmt = $DBcon->prepare("DELETE FROM table_temperature WHERE temperature_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delClimate") {
	$stmt = $DBcon->prepare("DELETE FROM table_climate WHERE climate_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delCondensor") {
	$stmt = $DBcon->prepare("DELETE FROM table_condensor WHERE condensor_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delRefrigerant") {
	$stmt = $DBcon->prepare("DELETE FROM table_refrigerant WHERE refrigerant_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delRv") {
	$stmt = $DBcon->prepare("DELETE FROM table_rv WHERE rv_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delWv") {
	$stmt = $DBcon->prepare("DELETE FROM table_wv WHERE wv_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delRf") {
	$stmt = $DBcon->prepare("DELETE FROM table_rf WHERE rf_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delSC") {
	$stmt = $DBcon->prepare("DELETE FROM table_stacategory WHERE sc_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delCP") {
	$stmt = $DBcon->prepare("DELETE FROM table_classproduct WHERE cp_id = '$id' ");
	$stmt->execute();
}else if ($sub == "delDep") {
	$stmt = $DBcon->prepare("DELETE FROM table_department WHERE DepartementID = '$id' ");
	$stmt->execute();
}else if ($sub == "delCM") {
	$stmt = $DBcon->prepare("DELETE FROM table_categoryMonitor WHERE cm_id = '$id' ");
	$stmt->execute();
}






 ?>