<?php 
include 'config.php';


$type_id	=	'';
$color_id	=	'';
$wdArtSpecDesign	=	'';
$dimension_id	=	'';
$wdPrdW	=	'';
$wdPrdD	=	'';
$wdPrdH	=	'';
$wdPackW	=	'';
$wdPackD	=	'';
$wdPackH	=	'';
$wdVolN	=	'';
$wdVolG	=	'';
$wdWeightN	=	'';
$wdWeightG	=	'';
$wdContainer	=	'';
$wdMecSpecDesign	=	'';
$rollbond_id	=	'';
$rollbondtype_id	=	'';
$climate_id	=	'';
$condensor_id	=	'';
$refrigerant_id	=	'';
$wdMoR	=	'';
$wdRC	=	'';
$wdRP	=	'';
$wdCompressor	=	'';
$wdCoolCap	=	'';
$wdCapTube	=	'';
$wdCoolTemp	=	'';
$wdHotTemp	=	'';
$wdNetralTemp	=	'';
$wdEC	=	'';
$wdCycSpecDesign	=	'';
$rv_id	=	'';
$wv_id	=	'';
$wdRF	=	'';
$wdRtdCurr	=	'';
$wdRtdPwr	=	'';
$wdRPH	=	'';
$wdElecSpecDesign	=	'';
$typeSupply		= '';
$target_dir 	= '_upload/artSpecDesign/WD/';
$target_dir2	= '_upload/mecSpecDesign/WD/';
$target_dir3	= '_upload/cycSpecDesign/WD/';
$target_dir4	= '_upload/elecSpecDesign/WD/';


$type_id	=	$_POST['type_id'];
$color_id	=	$_POST['color_id'];
$dimension_id	=	$_POST['dimension_id'];
$wdPrdW	=	$_POST['wdPrdW'];
$wdPrdD	=	$_POST['wdPrdD'];
$wdPrdH	=	$_POST['wdPrdH'];
$wdPackW	=	$_POST['wdPackW'];
$wdPackD	=	$_POST['wdPackD'];
$wdPackH	=	$_POST['wdPackH'];
$wdVolN	=	$_POST['wdVolN'];
$wdVolG	=	$_POST['wdVolG'];
$wdWeightN	=	$_POST['wdWeightN'];
$wdWeightG	=	$_POST['wdWeightG'];
$wdContainer	=	$_POST['wdContainer'];
$rollbond_id	=	$_POST['rollbond_id'];
$rollbondtype_id	=	$_POST['rollbondtype_id'];
$climate_id	=	$_POST['climate_id'];
$condensor_id	=	$_POST['condensor_id'];
$refrigerant_id	=	$_POST['refrigerant_id'];
$wdMoR	=	$_POST['wdMoR'];
$wdRC	=	$_POST['wdRC'];
$wdRP	=	$_POST['wdRP'];
$wdCompressor	=	$_POST['wdCompressor'];
$wdCoolCap	=	$_POST['wdCoolCap'];
$wdCapTube	=	$_POST['wdCapTube'];
$wdCoolTemp	=	$_POST['wdCoolTemp'];
$wdHotTemp	=	$_POST['wdHotTemp'];
$wdNetralTemp	=	$_POST['wdNetralTemp'];
$wdEC	=	$_POST['wdEC'];
$rv_id	=	$_POST['rv_id'];
$wv_id	=	$_POST['wv_id'];
$wdRF	=	$_POST['wdRF'];
$wdRtdCurr	=	$_POST['wdRtdCurr'];
$wdRtdPwr	=	$_POST['wdRtdPwr'];
$wdRPH	=	$_POST['wdRPH'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}


if (isset($_FILES['wdArtSpecDesign']['name'])) {
	$wdArtSpecDesign	= $_FILES['wdArtSpecDesign']['name'];
	$src   				= $_FILES['wdArtSpecDesign']['tmp_name'];
	$x					= explode('.', $wdArtSpecDesign);
	$ext 				= strtolower(end($x));
	$wdArtNew			= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($wdArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['wdMecSpecDesign']['name'])) {
	$wdMecSpecDesign	= $_FILES['wdMecSpecDesign']['name'];
	$src2  				= $_FILES['wdMecSpecDesign']['tmp_name'];
	$x					= explode('.', $wdMecSpecDesign);
	$ext 				= strtolower(end($x));
	$wdMecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir2.basename($wdMecNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['wdCycSpecDesign']['name'])) {
	$wdCycSpecDesign	= $_FILES['wdCycSpecDesign']['name'];
	$src3  				= $_FILES['wdCycSpecDesign']['tmp_name'];
	$x					= explode('.', $wdCycSpecDesign);
	$ext 				= strtolower(end($x));
	$wdCycNew			= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir3.basename($wdCycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['wdElecSpecDesign']['name'])) {
	$wdElecSpecDesign	= $_FILES['wdElecSpecDesign']['name'];
	$src4  				= $_FILES['wdElecSpecDesign']['tmp_name'];
	$x					= explode('.', $wdElecSpecDesign);
	$ext 				= strtolower(end($x));
	$wdElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir4.basename($wdElecNew);
	move_uploaded_file($src4, $target_file4);
}

$stmt = $DBcon->prepare("INSERT INTO table_specwd(type_id, color_id, wdArtSpecDesign, dimension_id, wdPrdW, wdPrdD, wdPrdH, wdPackW, wdPackD, wdPackH, wdVolN, wdVolG, wdWeightN, wdWeightG, wdContainer, wdMecSpecDesign, rollbond_id, rollbondtype_id, climate_id, condensor_id, refrigerant_id, wdMoR, wdRC, wdRP, wdCompressor, wdCoolCap, wdCapTube, wdCoolTemp, wdHotTemp, wdNetralTemp, wdEC, wdCycSpecDesign, rv_id, wv_id, wdRF, wdRtdCurr, wdRtdPwr, wdRPH, wdElecSpecDesign
)VALUES(:type_id, :color_id, :wdArtSpecDesign, :dimension_id, :wdPrdW, :wdPrdD, :wdPrdH, :wdPackW, :wdPackD, :wdPackH, :wdVolN, :wdVolG, :wdWeightN, :wdWeightG, :wdContainer, :wdMecSpecDesign, :rollbond_id, :rollbondtype_id, :climate_id, :condensor_id, :refrigerant_id, :wdMoR, :wdRC, :wdRP, :wdCompressor, :wdCoolCap, :wdCapTube, :wdCoolTemp, :wdHotTemp, :wdNetralTemp, :wdEC, :wdCycSpecDesign, :rv_id, :wv_id, :wdRF, :wdRtdCurr, :wdRtdPwr, :wdRPH, :wdElecSpecDesign
)");


$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':color_id', $color_id);
$stmt->bindParam(':wdArtSpecDesign', $wdArtNew);
$stmt->bindParam(':dimension_id', $dimension_id);
$stmt->bindParam(':wdPrdW', $wdPrdW);
$stmt->bindParam(':wdPrdD', $wdPrdD);
$stmt->bindParam(':wdPrdH', $wdPrdH);
$stmt->bindParam(':wdPackW', $wdPackW);
$stmt->bindParam(':wdPackD', $wdPackD);
$stmt->bindParam(':wdPackH', $wdPackH);
$stmt->bindParam(':wdVolN', $wdVolN);
$stmt->bindParam(':wdVolG', $wdVolG);
$stmt->bindParam(':wdWeightN', $wdWeightN);
$stmt->bindParam(':wdWeightG', $wdWeightG);
$stmt->bindParam(':wdContainer', $wdContainer);
$stmt->bindParam(':wdMecSpecDesign', $wdMecNew);
$stmt->bindParam(':rollbond_id', $rollbond_id);
$stmt->bindParam(':rollbondtype_id', $rollbondtype_id);
$stmt->bindParam(':climate_id', $climate_id);
$stmt->bindParam(':condensor_id', $condensor_id);
$stmt->bindParam(':refrigerant_id', $refrigerant_id);
$stmt->bindParam(':wdMoR', $wdMoR);
$stmt->bindParam(':wdRC', $wdRC);
$stmt->bindParam(':wdRP', $wdRP);
$stmt->bindParam(':wdCompressor', $wdCompressor);
$stmt->bindParam(':wdCoolCap', $wdCoolCap);
$stmt->bindParam(':wdCapTube', $wdCapTube);
$stmt->bindParam(':wdCoolTemp', $wdCoolTemp);
$stmt->bindParam(':wdHotTemp', $wdHotTemp);
$stmt->bindParam(':wdNetralTemp', $wdNetralTemp);
$stmt->bindParam(':wdEC', $wdEC);
$stmt->bindParam(':wdCycSpecDesign', $wdCycNew);
$stmt->bindParam(':rv_id', $rv_id);
$stmt->bindParam(':wv_id', $wv_id);
$stmt->bindParam(':wdRF', $wdRF);
$stmt->bindParam(':wdRtdCurr', $wdRtdCurr);
$stmt->bindParam(':wdRtdPwr', $wdRtdPwr);
$stmt->bindParam(':wdRPH', $wdRPH);
$stmt->bindParam(':wdElecSpecDesign', $wdElecNew);

if ($stmt->execute()) {
	$res = array(
		'type_id'			=>	$type_id,
		'color_id'			=>	$color_id,
		'wdArtSpecDesign'	=>	$wdArtNew,
		'dimension_id'		=>	$dimension_id,
		'wdPrdW'			=>	$wdPrdW,
		'wdPrdD'			=>	$wdPrdD,
		'wdPrdH'			=>	$wdPrdH,
		'wdPackW'			=>	$wdPackW,
		'wdPackD'			=>	$wdPackD,
		'wdPackH'			=>	$wdPackH,
		'wdVolN'			=>	$wdVolN,
		'wdVolG'			=>	$wdVolG,
		'wdWeightN'			=>	$wdWeightN,
		'wdWeightG'			=>	$wdWeightG,
		'wdContainer'		=>	$wdContainer,
		'wdMecSpecDesign'	=>	$wdMecNew,
		'rollbond_id'		=>	$rollbond_id,
		'rollbondtype_id'	=>	$rollbondtype_id,
		'climate_id'		=>	$climate_id,
		'condensor_id'		=>	$condensor_id,
		'refrigerant_id'	=>	$refrigerant_id,
		'wdMoR'				=>	$wdMoR,
		'wdRC'				=>	$wdRC,
		'wdRP'				=>	$wdRP,
		'wdCompressor'		=>	$wdCompressor,
		'wdCoolCap'			=>	$wdCoolCap,
		'wdCapTube'			=>	$wdCapTube,
		'wdCoolTemp'		=>	$wdCoolTemp,
		'wdHotTemp'			=>	$wdHotTemp,
		'wdNetralTemp'		=>	$wdNetralTemp,
		'wdEC'				=>	$wdEC,
		'wdCycSpecDesign'	=>	$wdCycNew,
		'rv_id'				=>	$rv_id,
		'wv_id'				=>	$wv_id,
		'wdRF'				=>	$wdRF,
		'wdRtdCurr'			=>	$wdRtdCurr,
		'wdRtdPwr'			=>	$wdRtdPwr,
		'wdRPH'				=>	$wdRPH,
		'wdElecSpecDesign'	=>	$wdElecNew
	);

	echo json_encode($res);
}else{
	$err = "Insert Error";

	echo json_encode($err);
}


?>