<?php 
include 'config.php';

$type_id	=	'';
$bodyColor	=	'';
$cfArtSpecDesign	=	'';
$dimension_id	=	'';
$cfPrdW	=	'';
$cfPrdD	=	'';
$cfPrdH	=	'';
$cfPackW	=	'';
$cfPackD	=	'';
$cfPackH	=	'';
$cfVolN	=	'';
$cfVolG	=	'';
$cfWeightN	=	'';
$cfWeightG	=	'';
$cfContainer	=	'';
$cfMecSpecDesign	=	'';
$rollbond_id	=	'';
$rollbondtype_id	=	'';
$temperature_id	=	'';
$climate_id	=	'';
$condensor_id	=	'';
$refrigerant_id	=	'';
$cfMoR	=	'';
$cfRc	=	'';
$cfRP	=	'';
$cfCompressor	=	'';
$cfCoolCap	=	'';
$cfCTD	=	'';
$cfFreezTemp	=	'';
$cfEnergyConsumption	=	'';
$cfCycSpecDesign	=	'';
$rv_id	=	'';
$wv_id	=	'';
$cfRF	=	'';
$cfRtdCur	=	'';
$cfRtdPwr	=	'';
$cfRPH	=	'';
$cfElecSpecDesign	=	'';
$typeSupply		= '';
$target_dir 	= '_upload/artSpecDesign/CF/';
$target_dir2	= '_upload/mecSpecDesign/CF/';
$target_dir3	= '_upload/cycSpecDesign/CF/';
$target_dir4	= '_upload/elecSpecDesign/CF/';


$type_id	=	$_POST['type_id'];
$bodyColor	=	$_POST['bodyColor'];
$dimension_id	=	$_POST['dimension_id'];
$cfPrdW	=	$_POST['cfPrdW'];
$cfPrdD	=	$_POST['cfPrdD'];
$cfPrdH	=	$_POST['cfPrdH'];
$cfPackW	=	$_POST['cfPackW'];
$cfPackD	=	$_POST['cfPackD'];
$cfPackH	=	$_POST['cfPackH'];
$cfVolN	=	$_POST['cfVolN'];
$cfVolG	=	$_POST['cfVolG'];
$cfWeightN	=	$_POST['cfWeightN'];
$cfWeightG	=	$_POST['cfWeightG'];
$cfContainer	=	$_POST['cfContainer'];
$rollbond_id	=	$_POST['rollbond_id'];
$rollbondtype_id	=	$_POST['rollbondtype_id'];
$temperature_id	=	$_POST['temperature_id'];
$climate_id	=	$_POST['climate_id'];
$condensor_id	=	$_POST['condensor_id'];
$refrigerant_id	=	$_POST['refrigerant_id'];
$cfMoR	=	$_POST['cfMoR'];
$cfRc	=	$_POST['cfRc'];
$cfRP	=	$_POST['cfRP'];
$cfCompressor	=	$_POST['cfCompressor'];
$cfCoolCap	=	$_POST['cfCoolCap'];
$cfCTD	=	$_POST['cfCTD'];
$cfFreezTemp	=	$_POST['cfFreezTemp'];
$cfEnergyConsumption	=	$_POST['cfEnergyConsumption'];
$rv_id	=	$_POST['rv_id'];
$wv_id	=	$_POST['wv_id'];
$cfRF	=	$_POST['cfRF'];
$cfRtdCur	=	$_POST['cfRtdCur'];
$cfRtdPwr	=	$_POST['cfRtdPwr'];
$cfRPH	=	$_POST['cfRPH'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}




if (isset($_FILES['cfArtSpecDesign']['name'])) {
	$cfArtSpecDesign	= $_FILES['cfArtSpecDesign']['name'];
	$src   				= $_FILES['cfArtSpecDesign']['tmp_name'];
	$x					= explode('.', $cfArtSpecDesign);
	$ext 				= strtolower(end($x));
	$cfArtNew			= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($cfArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['cfMecSpecDesign']['name'])) {
	$cfMecSpecDesign	= $_FILES['cfMecSpecDesign']['name'];
	$src2  				= $_FILES['cfMecSpecDesign']['tmp_name'];
	$x					= explode('.', $cfMecSpecDesign);
	$ext 				= strtolower(end($x));
	$cfMecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir.basename($cfMecNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['cfCycSpecDesign']['name'])) {
	$cfCycSpecDesign	= $_FILES['cfCycSpecDesign']['name'];
	$src3  				= $_FILES['cfCycSpecDesign']['tmp_name'];
	$x					= explode('.', $cfCycSpecDesign);
	$ext 				= strtolower(end($x));
	$cfCycNew			= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir.basename($cfCycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['cfElecSpecDesign']['name'])) {
	$cfElecSpecDesign	= $_FILES['cfElecSpecDesign']['name'];
	$src4  				= $_FILES['cfElecSpecDesign']['tmp_name'];
	$x					= explode('.', $cfElecSpecDesign);
	$ext 				= strtolower(end($x));
	$cfElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir.basename($cfElecNew);
	move_uploaded_file($src4, $target_file4);
}

/*$res = array(
	'type_id'	=>	$type_id,
	'bodyColor'	=>	$bodyColor,
	'cfArtSpecDesign'	=>	$cfArtSpecDesign,
	'dimension_id'	=>	$dimension_id,
	'cfPrdW'	=>	$cfPrdW,
	'cfPrdD'	=>	$cfPrdD,
	'cfPrdH'	=>	$cfPrdH,
	'cfPackW'	=>	$cfPackW,
	'cfPackD'	=>	$cfPackD,
	'cfPackH'	=>	$cfPackH,
	'cfVolN'	=>	$cfVolN,
	'cfVolG'	=>	$cfVolG,
	'cfWeightN'	=>	$cfWeightN,
	'cfWeightG'	=>	$cfWeightG,
	'cfContainer'	=>	$cfContainer,
	'cfMecSpecDesign'	=>	$cfMecSpecDesign,
	'rollbond_id'	=>	$rollbond_id,
	'rollbondtype_id'	=>	$rollbondtype_id,
	'temperature_id'	=>	$temperature_id,
	'climate_id'	=>	$climate_id,
	'condensor_id'	=>	$condensor_id,
	'refrigerant_id'	=>	$refrigerant_id,
	'cfMoR'	=>	$cfMoR,
	'cfRc'	=>	$cfRc,
	'cfRP'	=>	$cfRP,
	'cfCompressor'	=>	$cfCompressor,
	'cfCoolCap'	=>	$cfCoolCap,
	'cfCTD'	=>	$cfCTD,
	'cfFreezTemp'	=>	$cfFreezTemp,
	'cfEnergyConsumption'	=>	$cfEnergyConsumption,
	'cfCycSpecDesign'	=>	$cfCycSpecDesign,
	'rv_id'	=>	$rv_id,
	'wv_id'	=>	$wv_id,
	'cfRF'	=>	$cfRF,
	'cfRtdCur'	=>	$cfRtdCur,
	'cfRtdPwr'	=>	$cfRtdPwr,
	'cfRPH'	=>	$cfRPH,
	'cfElecSpecDesign'	=>	$cfElecSpecDesign
);

echo json_encode($res);*/

$stmt = $DBcon->prepare("INSERT INTO table_speccf(type_id, bodyColor, cfArtSpecDesign, dimension_id, cfPrdW, cfPrdD, cfPrdH, cfPackW, cfPackD, cfPackH, cfVolN, cfVolG, cfWeightN, cfWeightG, cfContainer, cfMecSpecDesign, rollbond_id, rollbondtype_id, temperature_id, climate_id, condensor_id, refrigerant_id, cfMoR, cfRc, cfRP, cfCompressor, cfCoolCap, cfCTD, cfFreezTemp, cfEnergyConsumption, cfCycSpecDesign, rv_id, wv_id, cfRF, cfRtdCur, cfRtdPwr, cfRPH, cfElecSpecDesign
)VALUES(:type_id, :bodyColor, :cfArtSpecDesign, :dimension_id, :cfPrdW, :cfPrdD, :cfPrdH, :cfPackW, :cfPackD, :cfPackH, :cfVolN, :cfVolG, :cfWeightN, :cfWeightG, :cfContainer, :cfMecSpecDesign, :rollbond_id, :rollbondtype_id, :temperature_id, :climate_id, :condensor_id, :refrigerant_id, :cfMoR, :cfRc, :cfRP, :cfCompressor, :cfCoolCap, :cfCTD, :cfFreezTemp, :cfEnergyConsumption, :cfCycSpecDesign, :rv_id, :wv_id, :cfRF, :cfRtdCur, :cfRtdPwr, :cfRPH, :cfElecSpecDesign
)");


$stmt->bindParam(':type_id',$type_id);
$stmt->bindParam(':bodyColor',$bodyColor);
$stmt->bindParam(':cfArtSpecDesign',$cfArtNew);
$stmt->bindParam(':dimension_id',$dimension_id);
$stmt->bindParam(':cfPrdW',$cfPrdW);
$stmt->bindParam(':cfPrdD',$cfPrdD);
$stmt->bindParam(':cfPrdH',$cfPrdH);
$stmt->bindParam(':cfPackW',$cfPackW);
$stmt->bindParam(':cfPackD',$cfPackD);
$stmt->bindParam(':cfPackH',$cfPackH);
$stmt->bindParam(':cfVolN',$cfVolN);
$stmt->bindParam(':cfVolG',$cfVolG);
$stmt->bindParam(':cfWeightN',$cfWeightN);
$stmt->bindParam(':cfWeightG',$cfWeightG);
$stmt->bindParam(':cfContainer',$cfContainer);
$stmt->bindParam(':cfMecSpecDesign',$cfMecNew);
$stmt->bindParam(':rollbond_id',$rollbond_id);
$stmt->bindParam(':rollbondtype_id',$rollbondtype_id);
$stmt->bindParam(':temperature_id',$temperature_id);
$stmt->bindParam(':climate_id',$climate_id);
$stmt->bindParam(':condensor_id',$condensor_id);
$stmt->bindParam(':refrigerant_id',$refrigerant_id);
$stmt->bindParam(':cfMoR',$cfMoR);
$stmt->bindParam(':cfRc',$cfRc);
$stmt->bindParam(':cfRP',$cfRP);
$stmt->bindParam(':cfCompressor',$cfCompressor);
$stmt->bindParam(':cfCoolCap',$cfCoolCap);
$stmt->bindParam(':cfCTD',$cfCTD);
$stmt->bindParam(':cfFreezTemp',$cfFreezTemp);
$stmt->bindParam(':cfEnergyConsumption',$cfEnergyConsumption);
$stmt->bindParam(':cfCycSpecDesign',$cfCycNew);
$stmt->bindParam(':rv_id',$rv_id);
$stmt->bindParam(':wv_id',$wv_id);
$stmt->bindParam(':cfRF',$cfRF);
$stmt->bindParam(':cfRtdCur',$cfRtdCur);
$stmt->bindParam(':cfRtdPwr',$cfRtdPwr);
$stmt->bindParam(':cfRPH',$cfRPH);
$stmt->bindParam(':cfElecSpecDesign',$cfElecNew);

if ($stmt->execute()) {


	$res = array(
		'type_id'				=>	$type_id,
		'bodyColor'				=>	$bodyColor,
		'cfArtSpecDesign'		=>	$cfArtNew,
		'dimension_id'			=>	$dimension_id,
		'cfPrdW'				=>	$cfPrdW,
		'cfPrdD'				=>	$cfPrdD,
		'cfPrdH'				=>	$cfPrdH,
		'cfPackW'				=>	$cfPackW,
		'cfPackD'				=>	$cfPackD,
		'cfPackH'				=>	$cfPackH,
		'cfVolN'				=>	$cfVolN,
		'cfVolG'				=>	$cfVolG,
		'cfWeightN'				=>	$cfWeightN,
		'cfWeightG'				=>	$cfWeightG,
		'cfContainer'			=>	$cfContainer,
		'cfMecSpecDesign'		=>	$cfMecNew,
		'rollbond_id'			=>	$rollbond_id,
		'rollbondtype_id'		=>	$rollbondtype_id,
		'temperature_id'		=>	$temperature_id,
		'climate_id'			=>	$climate_id,
		'condensor_id'			=>	$condensor_id,
		'refrigerant_id'		=>	$refrigerant_id,
		'cfMoR'					=>	$cfMoR,
		'cfRc'					=>	$cfRc,
		'cfRP'					=>	$cfRP,
		'cfCompressor'			=>	$cfCompressor,
		'cfCoolCap'				=>	$cfCoolCap,
		'cfCTD'					=>	$cfCTD,
		'cfFreezTemp'			=>	$cfFreezTemp,
		'cfEnergyConsumption'	=>	$cfEnergyConsumption,
		'cfCycSpecDesign'		=>	$cfCycNew,
		'rv_id'					=>	$rv_id,
		'wv_id'					=>	$wv_id,
		'cfRF'					=>	$cfRF,
		'cfRtdCur'				=>	$cfRtdCur,
		'cfRtdPwr'				=>	$cfRtdPwr,
		'cfRPH'					=>	$cfRPH,
		'cfElecSpecDesign'		=>	$cfElecNew
	);

	echo json_encode($res);
}else{
	$err = "Insert Error";

	echo json_encode($err);
}


?>