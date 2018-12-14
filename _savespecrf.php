<?php 
include 'config.php';

$type_id	= '';
$color_id	= '';
$pattern_id	= '';
$finishing_id	= '';
$dLinerMaterial	= '';
$dInteriorMateri	= '';
$dStamping	= '';
$dEggPocket	= '';
$dEggHolder	= '';
$dUtilityPocket	= '';
$dBottlePocket	= '';
$cColor	= '';
$cSidePanelMat	= '';
$aHandle	= '';
$handle_id	= '';
$aBaseboard	= '';
$aWaterdispenser	= '';
$rack_id	= '';
$aIceTwistTray	= '';
$aIceBank	= '';
$aIceTray	= '';
$aFrezzerPocket	= '';
$aLamp	= '';
$aChiller	= '';
$aShelf	= '';
$aSheildedMoist	= '';
$aCrisper	= '';
$ArtSpecDesign	= '';
$dimension_id	= '';
$mechProdW	= '';
$mechProdL	= '';
$mechProdH	= '';
$mechPackW	= '';
$mechPackL	= '';
$mechPackH	= '';
$packing_id	= '';
$mechVolNet	= '';
$mechVolGros	= '';
$mechWeightNet	= '';
$mechWeightGros	= '';
$mechContainer	= '';
$MechSpecDesign	= '';
$rollbond_id	= '';
$rollbondtype_id	= '';
$temperature_id	= '';
$cycDripTray	= '';
$climate_id	= '';
$condensor_id	= '';
$refrigerant_id	= '';
$cycMoR	= '';
$cycRatedCurrent	= '';
$cycRatedPower	= '';
$cycCompressor	= '';
$cycCoolingCapacity	= '';
$cycCapillaryTube	= '';
$cycFreezingTemp	= '';
$cycEnergyConsumption	= '';
$CycSpecDesign	= '';
$rv_id	= '';
$wv_id	= '';
$elecRF	= '';
$elecRC	= '';
$elecRP	= '';
$elecRPH	= '';
$elecMaxLamp	= '';
$ElecSpecDesign	= '';
$typeSupply		= '';
$target_dir 	= '_upload/artSpecDesign/RF/';
$target_dir2	= '_upload/mecSpecDesign/RF/';
$target_dir3	= '_upload/cycSpecDesign/RF/';
$target_dir4	= '_upload/elecSpecDesign/RF/';


$type_id				= $_POST['type_id'];
$color_id				= $_POST['color_id'];
$pattern_id				= $_POST['pattern_id'];
$finishing_id			= $_POST['finishing_id'];
$dLinerMaterial			= $_POST['dLinerMaterial'];
$dInteriorMateri		= $_POST['dInteriorMateri'];
$dStamping				= $_POST['dStamping'];
$dEggPocket				= $_POST['dEggPocket'];
$dEggHolder				= $_POST['dEggHolder'];
$dUtilityPocket			= $_POST['dUtilityPocket'];
$dBottlePocket			= $_POST['dBottlePocket'];
$cColor					= $_POST['cColor'];
$cSidePanelMat			= $_POST['cSidePanelMat'];
$aHandle				= $_POST['aHandle'];
$handle_id				= $_POST['handle_id'];
$aBaseboard				= $_POST['aBaseboard'];
$aWaterdispenser		= $_POST['aWaterdispenser'];
$rack_id				= $_POST['rack_id'];
$aIceTwistTray			= $_POST['aIceTwistTray'];
$aIceBank				= $_POST['aIceBank'];
$aIceTray				= $_POST['aIceTray'];
$aFrezzerPocket			= $_POST['aFrezzerPocket'];
$aLamp					= $_POST['aLamp'];
$aChiller				= $_POST['aChiller'];
$aShelf					= $_POST['aShelf'];
$aSheildedMoist			= $_POST['aSheildedMoist'];
$aCrisper				= $_POST['aCrisper'];
$dimension_id			= $_POST['dimension_id'];
$mechProdW				= $_POST['mechProdW'];
$mechProdL				= $_POST['mechProdL'];
$mechProdH				= $_POST['mechProdH'];
$mechPackW				= $_POST['mechPackW'];
$mechPackL				= $_POST['mechPackL'];
$mechPackH				= $_POST['mechPackH'];
$packing_id				= $_POST['packing_id'];
$mechVolNet				= $_POST['mechVolNet'];
$mechVolGros			= $_POST['mechVolGros'];
$mechWeightNet			= $_POST['mechWeightNet'];
$mechWeightGros			= $_POST['mechWeightGros'];
$mechContainer			= $_POST['mechContainer'];
$rollbond_id			= $_POST['rollbond_id'];
$rollbondtype_id		= $_POST['rollbondtype_id'];
$temperature_id			= $_POST['temperature_id'];
$cycDripTray			= $_POST['cycDripTray'];
$climate_id				= $_POST['climate_id'];
$condensor_id			= $_POST['condensor_id'];
$refrigerant_id			= $_POST['refrigerant_id'];
$cycMoR					= $_POST['cycMoR'];
$cycRatedCurrent		= $_POST['cycRatedCurrent'];
$cycRatedPower			= $_POST['cycRatedPower'];
$cycCompressor			= $_POST['cycCompressor'];
$cycCoolingCapacity		= $_POST['cycCoolingCapacity'];
$cycCapillaryTube		= $_POST['cycCapillaryTube'];
$cycFreezingTemp		= $_POST['cycFreezingTemp'];
$cycEnergyConsumption	= $_POST['cycEnergyConsumption'];
$rv_id					= $_POST['rv_id'];
$wv_id					= $_POST['wv_id'];
$elecRF					= $_POST['elecRF'];
$elecRC					= $_POST['elecRC'];
$elecRP					= $_POST['elecRP'];
$elecRPH				= $_POST['elecRPH'];
$elecMaxLamp			= $_POST['elecMaxLamp'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}


if (isset($_FILES['ArtSpecDesign']['name'])) {
	$ArtSpecDesign		= $_FILES['ArtSpecDesign']['name'];
	$src   				= $_FILES['ArtSpecDesign']['tmp_name'];
	$x					= explode('.', $ArtSpecDesign);
	$ext 				= strtolower(end($x));
	$ArtNew				= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($ArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['MechSpecDesign']['name'])) {
	$MechSpecDesign		= $_FILES['MechSpecDesign']['name'];
	$src2  				= $_FILES['MechSpecDesign']['tmp_name'];
	$x					= explode('.', $MechSpecDesign);
	$ext 				= strtolower(end($x));
	$MechNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir2.basename($MechNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['CycSpecDesign']['name'])) {
	$CycSpecDesign		= $_FILES['CycSpecDesign']['name'];
	$src3  				= $_FILES['CycSpecDesign']['tmp_name'];
	$x					= explode('.', $CycSpecDesign);
	$ext 				= strtolower(end($x));
	$CycNew				= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir3.basename($CycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['ElecSpecDesign']['name'])) {
	$ElecSpecDesign		= $_FILES['ElecSpecDesign']['name'];
	$src4  				= $_FILES['ElecSpecDesign']['tmp_name'];
	$x					= explode('.', $ElecSpecDesign);
	$ext 				= strtolower(end($x));
	$ElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir4.basename($ElecNew);
	move_uploaded_file($src4, $target_file4);
}

//################################################# BUAT NGECEK  ########################################################
/*$res = array(
'type_id'				=> $type_id,
'color_id'				=> $color_id,
'pattern_id'			=> $pattern_id,
'finishing_id'			=> $finishing_id,
'dLinerMaterial'		=> $dLinerMaterial,
'dInteriorMateri'		=> $dInteriorMateri,
'dStamping'				=> $dStamping,
'dEggPocket'			=> $dEggPocket,
'dEggHolder'			=> $dEggHolder,
'dUtilityPocket'		=> $dUtilityPocket,
'dBottlePocket'			=> $dBottlePocket,
'cColor'				=> $cColor,
'cSidePanelMat'			=> $cSidePanelMat,
'aHandle'				=> $aHandle,
'handle_id'				=> $handle_id,
'aBaseboard'			=> $aBaseboard,
'aWaterdispenser'		=> $aWaterdispenser,
'rack_id'				=> $rack_id,
'aIceTwistTray'			=> $aIceTwistTray,
'aIceBank'				=> $aIceBank,
'aIceTray'				=> $aIceTray,
'aFrezzerPocket'		=> $aFrezzerPocket,
'aLamp'					=> $aLamp,
'aChiller'				=> $aChiller,
'aShelf'				=> $aShelf,
'aSheildedMoist'		=> $aSheildedMoist,
'aCrisper'				=> $aCrisper,
'ArtSpecDesign'			=> $ArtSpecDesign,
'dimension_id'			=> $dimension_id,
'mechProdW'				=> $mechProdW,
'mechProdL'				=> $mechProdL,
'mechProdH'				=> $mechProdH,
'mechPackW'				=> $mechPackW,
'mechPackL'				=> $mechPackL,
'mechPackH'				=> $mechPackH,
'packing_id'			=> $packing_id,
'mechVolNet'			=> $mechVolNet,
'mechVolGros'			=> $mechVolGros,
'mechWeightNet'			=> $mechWeightNet,
'mechWeightGros'		=> $mechWeightGros,
'mechContainer'			=> $mechContainer,
'MechSpecDesign'		=> $MechSpecDesign,
'rollbond_id'			=> $rollbond_id,
'rollbondtype_id'		=> $rollbondtype_id,
'temperature_id'		=> $temperature_id,
'cycDripTray'			=> $cycDripTray,
'climate_id'			=> $climate_id,
'condensor_id'			=> $condensor_id,
'refrigerant_id'		=> $refrigerant_id,
'cycMoR'				=> $cycMoR,
'cycRatedCurrent'		=> $cycRatedCurrent,
'cycRatedPower'			=> $cycRatedPower,
'cycCompressor'			=> $cycCompressor,
'cycCoolingCapacity'	=> $cycCoolingCapacity,
'cycCapillaryTube'		=> $cycCapillaryTube,
'cycFreezingTemp'		=> $cycFreezingTemp,
'cycEnergyConsumption'	=> $cycEnergyConsumption,
'CycSpecDesign'			=> $CycSpecDesign,
'rv_id'					=> $rv_id,
'wv_id'					=> $wv_id,
'elecRF'				=> $elecRF,
'elecRC'				=> $elecRC,
'elecRP'				=> $elecRP,
'elecRPH'				=> $elecRPH,
'elecMaxLamp'			=> $elecMaxLamp,
'ElecSpecDesign'		=> $ElecSpecDesign
);

echo json_encode($res);*/
//###################################################################################################################





$stmt = $DBcon->prepare("INSERT INTO table_specrf(type_id, color_id, pattern_id, finishing_id, dLinerMaterial, dInteriorMateri, dStamping, dEggPocket, dEggHolder, dUtilityPocket, dBottlePocket, cColor, cSidePanelMat, aHandle, handle_id, aBaseboard, aWaterdispenser, rack_id, aIceTwistTray, aIceBank, aIceTray, aFrezzerPocket, aLamp, aChiller, aShelf, aSheildedMoist, aCrisper, ArtSpecDesign, dimension_id, mechProdW, mechProdL, mechProdH, mechPackW, mechPackL, mechPackH, packing_id, mechVolNet, mechVolGros, mechWeightNet, mechWeightGros, mechContainer, MechSpecDesign, rollbond_id, rollbondtype_id, temperature_id, cycDripTray, climate_id, condensor_id, refrigerant_id, cycMoR, cycRatedCurrent, cycRatedPower, cycCompressor, cycCoolingCapacity, cycCapillaryTube, cycFreezingTemp, cycEnergyConsumption, CycSpecDesign, rv_id, wv_id, elecRF, elecRC, elecRP, elecRPH, elecMaxLamp, ElecSpecDesign)VALUES(:type_id, :color_id, :pattern_id, :finishing_id, :dLinerMaterial, :dInteriorMateri, :dStamping, :dEggPocket, :dEggHolder, :dUtilityPocket, :dBottlePocket, :cColor, :cSidePanelMat, :aHandle, :handle_id, :aBaseboard, :aWaterdispenser, :rack_id, :aIceTwistTray, :aIceBank, :aIceTray, :aFrezzerPocket, :aLamp, :aChiller, :aShelf, :aSheildedMoist, :aCrisper, :ArtSpecDesign, :dimension_id, :mechProdW, :mechProdL, :mechProdH, :mechPackW, :mechPackL, :mechPackH, :packing_id, :mechVolNet, :mechVolGros, :mechWeightNet, :mechWeightGros, :mechContainer, :MechSpecDesign, :rollbond_id, :rollbondtype_id, :temperature_id, :cycDripTray, :climate_id, :condensor_id, :refrigerant_id, :cycMoR, :cycRatedCurrent, :cycRatedPower, :cycCompressor, :cycCoolingCapacity, :cycCapillaryTube, :cycFreezingTemp, :cycEnergyConsumption, :CycSpecDesign, :rv_id, :wv_id, :elecRF, :elecRC, :elecRP, :elecRPH, :elecMaxLamp, :ElecSpecDesign)");


$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':color_id', $color_id);
$stmt->bindParam(':pattern_id', $pattern_id);
$stmt->bindParam(':finishing_id', $finishing_id);
$stmt->bindParam(':dLinerMaterial', $dLinerMaterial);
$stmt->bindParam(':dInteriorMateri', $dInteriorMateri);
$stmt->bindParam(':dStamping', $dStamping);
$stmt->bindParam(':dEggPocket', $dEggPocket);
$stmt->bindParam(':dEggHolder', $dEggHolder);
$stmt->bindParam(':dUtilityPocket', $dUtilityPocket);
$stmt->bindParam(':dBottlePocket', $dBottlePocket);
$stmt->bindParam(':cColor', $cColor);
$stmt->bindParam(':cSidePanelMat', $cSidePanelMat);
$stmt->bindParam(':aHandle', $aHandle);
$stmt->bindParam(':handle_id', $handle_id);
$stmt->bindParam(':aBaseboard', $aBaseboard);
$stmt->bindParam(':aWaterdispenser', $aWaterdispenser);
$stmt->bindParam(':rack_id', $rack_id);
$stmt->bindParam(':aIceTwistTray', $aIceTwistTray);
$stmt->bindParam(':aIceBank', $aIceBank);
$stmt->bindParam(':aIceTray', $aIceTray);
$stmt->bindParam(':aFrezzerPocket', $aFrezzerPocket);
$stmt->bindParam(':aLamp', $aLamp);
$stmt->bindParam(':aChiller', $aChiller);
$stmt->bindParam(':aShelf', $aShelf);
$stmt->bindParam(':aSheildedMoist', $aSheildedMoist);
$stmt->bindParam(':aCrisper', $aCrisper);
$stmt->bindParam(':ArtSpecDesign', $ArtNew);
$stmt->bindParam(':dimension_id', $dimension_id);
$stmt->bindParam(':mechProdW', $mechProdW);
$stmt->bindParam(':mechProdL', $mechProdL);
$stmt->bindParam(':mechProdH', $mechProdH);
$stmt->bindParam(':mechPackW', $mechPackW);
$stmt->bindParam(':mechPackL', $mechPackL);
$stmt->bindParam(':mechPackH', $mechPackH);
$stmt->bindParam(':packing_id', $packing_id);
$stmt->bindParam(':mechVolNet', $mechVolNet);
$stmt->bindParam(':mechVolGros', $mechVolGros);
$stmt->bindParam(':mechWeightNet', $mechWeightNet);
$stmt->bindParam(':mechWeightGros', $mechWeightGros);
$stmt->bindParam(':mechContainer', $mechContainer);
$stmt->bindParam(':MechSpecDesign', $MechNew);
$stmt->bindParam(':rollbond_id', $rollbond_id);
$stmt->bindParam(':rollbondtype_id', $rollbondtype_id);
$stmt->bindParam(':temperature_id', $temperature_id);
$stmt->bindParam(':cycDripTray', $cycDripTray);
$stmt->bindParam(':climate_id', $climate_id);
$stmt->bindParam(':condensor_id', $condensor_id);
$stmt->bindParam(':refrigerant_id', $refrigerant_id);
$stmt->bindParam(':cycMoR', $cycMoR);
$stmt->bindParam(':cycRatedCurrent', $cycRatedCurrent);
$stmt->bindParam(':cycRatedPower', $cycRatedPower);
$stmt->bindParam(':cycCompressor', $cycCompressor);
$stmt->bindParam(':cycCoolingCapacity', $cycCoolingCapacity);
$stmt->bindParam(':cycCapillaryTube', $cycCapillaryTube);
$stmt->bindParam(':cycFreezingTemp', $cycFreezingTemp);
$stmt->bindParam(':cycEnergyConsumption', $cycEnergyConsumption);
$stmt->bindParam(':CycSpecDesign', $CycNew);
$stmt->bindParam(':rv_id', $rv_id);
$stmt->bindParam(':wv_id', $wv_id);
$stmt->bindParam(':elecRF', $elecRF);
$stmt->bindParam(':elecRC', $elecRC);
$stmt->bindParam(':elecRP', $elecRP);
$stmt->bindParam(':elecRPH', $elecRPH);
$stmt->bindParam(':elecMaxLamp', $elecMaxLamp);
$stmt->bindParam(':ElecSpecDesign', $ElecNew);




if ($stmt->execute()) {
	$res = array(
		'type_id'				=> $type_id,
		'color_id'				=> $color_id,
		'pattern_id'			=> $pattern_id,
		'finishing_id'			=> $finishing_id,
		'dLinerMaterial'		=> $dLinerMaterial,
		'dInteriorMateri'		=> $dInteriorMateri,
		'dStamping'				=> $dStamping,
		'dEggPocket'			=> $dEggPocket,
		'dEggHolder'			=> $dEggHolder,
		'dUtilityPocket'		=> $dUtilityPocket,
		'dBottlePocket'			=> $dBottlePocket,
		'cColor'				=> $cColor,
		'cSidePanelMat'			=> $cSidePanelMat,
		'aHandle'				=> $aHandle,
		'handle_id'				=> $handle_id,
		'aBaseboard'			=> $aBaseboard,
		'aWaterdispenser'		=> $aWaterdispenser,
		'rack_id'				=> $rack_id,
		'aIceTwistTray'			=> $aIceTwistTray,
		'aIceBank'				=> $aIceBank,
		'aIceTray'				=> $aIceTray,
		'aFrezzerPocket'		=> $aFrezzerPocket,
		'aLamp'					=> $aLamp,
		'aChiller'				=> $aChiller,
		'aShelf'				=> $aShelf,
		'aSheildedMoist'		=> $aSheildedMoist,
		'aCrisper'				=> $aCrisper,
		'ArtSpecDesign'			=> $ArtNew,
		'dimension_id'			=> $dimension_id,
		'mechProdW'				=> $mechProdW,
		'mechProdL'				=> $mechProdL,
		'mechProdH'				=> $mechProdH,
		'mechPackW'				=> $mechPackW,
		'mechPackL'				=> $mechPackL,
		'mechPackH'				=> $mechPackH,
		'packing_id'			=> $packing_id,
		'mechVolNet'			=> $mechVolNet,
		'mechVolGros'			=> $mechVolGros,
		'mechWeightNet'			=> $mechWeightNet,
		'mechWeightGros'		=> $mechWeightGros,
		'mechContainer'			=> $mechContainer,
		'MechSpecDesign'		=> $MechNew,
		'rollbond_id'			=> $rollbond_id,
		'rollbondtype_id'		=> $rollbondtype_id,
		'temperature_id'		=> $temperature_id,
		'cycDripTray'			=> $cycDripTray,
		'climate_id'			=> $climate_id,
		'condensor_id'			=> $condensor_id,
		'refrigerant_id'		=> $refrigerant_id,
		'cycMoR'				=> $cycMoR,
		'cycRatedCurrent'		=> $cycRatedCurrent,
		'cycRatedPower'			=> $cycRatedPower,
		'cycCompressor'			=> $cycCompressor,
		'cycCoolingCapacity'	=> $cycCoolingCapacity,
		'cycCapillaryTube'		=> $cycCapillaryTube,
		'cycFreezingTemp'		=> $cycFreezingTemp,
		'cycEnergyConsumption'	=> $cycEnergyConsumption,
		'CycSpecDesign'			=> $CycNew,
		'rv_id'					=> $rv_id,
		'wv_id'					=> $wv_id,
		'elecRF'				=> $elecRF,
		'elecRC'				=> $elecRC,
		'elecRP'				=> $elecRP,
		'elecRPH'				=> $elecRPH,
		'elecMaxLamp'			=> $elecMaxLamp,
		'ElecSpecDesign'		=> $ElecNew
	);

	echo json_encode($res);

}else{
	$err = "Error Inserting Data";

	echo json_encode($err);
}
?>