<?php 
include 'config.php';

$type_id	=	'';
$color_id	=	'';
$scHandle	=	'';
$rack_id	=	'';
$NoR	=	'';
$scArtSpecDesign	=	'';
$dimension_id	=	'';
$scPrdW	=	'';
$scPrdD	=	'';
$scPrdH	=	'';
$scPackW	=	'';
$scPackD	=	'';
$scPackH	=	'';
$scVolN	=	'';
$scVolG	=	'';
$scWeightN	=	'';
$scWeightG	=	'';
$scContainer	=	'';
$scMecSpecDesign	=	'';
$rollbond_id	=	'';
$rollbondtype_id	=	'';
$climate_id	=	'';
$condensor_id	=	'';
$refrigerant_id	=	'';
$scMoR	=	'';
$scRC	=	'';
$scRP	=	'';
$scCompressor	=	'';
$scCoolCap	=	'';
$scCTD	=	'';
$scFreezTemp	=	'';
$scEC	=	'';
$scCycSpecDesign	=	'';
$rv_id	=	'';
$wv_id	=	'';
$scRF	=	'';
$scRtdCurr	=	'';
$scRtdPwr	=	'';
$scRML	=	'';
$scElecSpecDesign	=	'';
$typeSupply		= '';
$target_dir 	= '_upload/artSpecDesign/SC/';
$target_dir2	= '_upload/mecSpecDesign/SC/';
$target_dir3	= '_upload/cycSpecDesign/SC/';
$target_dir4	= '_upload/elecSpecDesign/SC/';

$type_id	=	$_POST['type_id'];
$color_id	=	$_POST['color_id'];
$scHandle	=	$_POST['scHandle'];
$rack_id	=	$_POST['rack_id'];
$NoR	=	$_POST['NoR'];
$dimension_id	=	$_POST['dimension_id'];
$scPrdW	=	$_POST['scPrdW'];
$scPrdD	=	$_POST['scPrdD'];
$scPrdH	=	$_POST['scPrdH'];
$scPackW	=	$_POST['scPackW'];
$scPackD	=	$_POST['scPackD'];
$scPackH	=	$_POST['scPackH'];
$scVolN	=	$_POST['scVolN'];
$scVolG	=	$_POST['scVolG'];
$scWeightN	=	$_POST['scWeightN'];
$scWeightG	=	$_POST['scWeightG'];
$scContainer	=	$_POST['scContainer'];
$rollbond_id	=	$_POST['rollbond_id'];
$rollbondtype_id	=	$_POST['rollbondtype_id'];
$climate_id	=	$_POST['climate_id'];
$condensor_id	=	$_POST['condensor_id'];
$refrigerant_id	=	$_POST['refrigerant_id'];
$scMoR	=	$_POST['scMoR'];
$scRC	=	$_POST['scRC'];
$scRP	=	$_POST['scRP'];
$scCompressor	=	$_POST['scCompressor'];
$scCoolCap	=	$_POST['scCoolCap'];
$scCTD	=	$_POST['scCTD'];
$scFreezTemp	=	$_POST['scFreezTemp'];
$scEC	=	$_POST['scEC'];
$rv_id	=	$_POST['rv_id'];
$wv_id	=	$_POST['wv_id'];
$scRF	=	$_POST['scRF'];
$scRtdCurr	=	$_POST['scRtdCurr'];
$scRtdPwr	=	$_POST['scRtdPwr'];
$scRML	=	$_POST['scRML'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}





if (isset($_FILES['scArtSpecDesign']['name'])) {
	$scArtSpecDesign	= $_FILES['scArtSpecDesign']['name'];
	$src   				= $_FILES['scArtSpecDesign']['tmp_name'];
	$x					= explode('.', $scArtSpecDesign);
	$ext 				= strtolower(end($x));
	$scArtNew			= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($scArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['scMecSpecDesign']['name'])) {
	$scMecSpecDesign	= $_FILES['scMecSpecDesign']['name'];
	$src2  				= $_FILES['scMecSpecDesign']['tmp_name'];
	$x					= explode('.', $scMecSpecDesign);
	$ext 				= strtolower(end($x));
	$scMecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir2.basename($scMecNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['scCycSpecDesign']['name'])) {
	$scCycSpecDesign	= $_FILES['scCycSpecDesign']['name'];
	$src3  				= $_FILES['scCycSpecDesign']['tmp_name'];
	$x					= explode('.', $scCycSpecDesign);
	$ext 				= strtolower(end($x));
	$scCycNew			= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir3.basename($scCycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['scElecSpecDesign']['name'])) {
	$scElecSpecDesign	= $_FILES['scElecSpecDesign']['name'];
	$src4  				= $_FILES['scElecSpecDesign']['tmp_name'];
	$x					= explode('.', $scElecSpecDesign);
	$ext 				= strtolower(end($x));
	$scElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir4.basename($scElecNew);
	move_uploaded_file($src4, $target_file4);
}

$stmt = $DBcon->prepare("INSERT INTO table_specsc(type_id, color_id, scHandle, rack_id, NoR, scArtSpecDesign, dimension_id, scPrdW, scPrdD, scPrdH, scPackW, scPackD, scPackH, scVolN, scVolG, scWeightN, scWeightG, scContainer, scMecSpecDesign, rollbond_id, rollbondtype_id, climate_id, condensor_id, refrigerant_id, scMoR, scRC, scRP, scCompressor, scCoolCap, scCTD, scFreezTemp, scEC, scCycSpecDesign, rv_id, wv_id, scRF, scRtdCurr, scRtdPwr, scRML, scElecSpecDesign
)VALUES(:type_id, :color_id, :scHandle, :rack_id, :NoR, :scArtSpecDesign, :dimension_id, :scPrdW, :scPrdD, :scPrdH, :scPackW, :scPackD, :scPackH, :scVolN, :scVolG, :scWeightN, :scWeightG, :scContainer, :scMecSpecDesign, :rollbond_id, :rollbondtype_id, :climate_id, :condensor_id, :refrigerant_id, :scMoR, :scRC, :scRP, :scCompressor, :scCoolCap, :scCTD, :scFreezTemp, :scEC, :scCycSpecDesign, :rv_id, :wv_id, :scRF, :scRtdCurr, :scRtdPwr, :scRML, :scElecSpecDesign
)");

$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':color_id', $color_id);
$stmt->bindParam(':scHandle', $scHandle);
$stmt->bindParam(':rack_id', $rack_id);
$stmt->bindParam(':NoR', $NoR);
$stmt->bindParam(':scArtSpecDesign', $scArtNew);
$stmt->bindParam(':dimension_id', $dimension_id);
$stmt->bindParam(':scPrdW', $scPrdW);
$stmt->bindParam(':scPrdD', $scPrdD);
$stmt->bindParam(':scPrdH', $scPrdH);
$stmt->bindParam(':scPackW', $scPackW);
$stmt->bindParam(':scPackD', $scPackD);
$stmt->bindParam(':scPackH', $scPackH);
$stmt->bindParam(':scVolN', $scVolN);
$stmt->bindParam(':scVolG', $scVolG);
$stmt->bindParam(':scWeightN', $scWeightN);
$stmt->bindParam(':scWeightG', $scWeightG);
$stmt->bindParam(':scContainer', $scContainer);
$stmt->bindParam(':scMecSpecDesign', $scMecNew);
$stmt->bindParam(':rollbond_id', $rollbond_id);
$stmt->bindParam(':rollbondtype_id', $rollbondtype_id);
$stmt->bindParam(':climate_id', $climate_id);
$stmt->bindParam(':condensor_id', $condensor_id);
$stmt->bindParam(':refrigerant_id', $refrigerant_id);
$stmt->bindParam(':scMoR', $scMoR);
$stmt->bindParam(':scRC', $scRC);
$stmt->bindParam(':scRP', $scRP);
$stmt->bindParam(':scCompressor', $scCompressor);
$stmt->bindParam(':scCoolCap', $scCoolCap);
$stmt->bindParam(':scCTD', $scCTD);
$stmt->bindParam(':scFreezTemp', $scFreezTemp);
$stmt->bindParam(':scEC', $scEC);
$stmt->bindParam(':scCycSpecDesign', $scCycNew);
$stmt->bindParam(':rv_id', $rv_id);
$stmt->bindParam(':wv_id', $wv_id);
$stmt->bindParam(':scRF', $scRF);
$stmt->bindParam(':scRtdCurr', $scRtdCurr);
$stmt->bindParam(':scRtdPwr', $scRtdPwr);
$stmt->bindParam(':scRML', $scRML);
$stmt->bindParam(':scElecSpecDesign', $scElecNew);

if ($stmt->execute()) {
	$res = array(
		'type_id'			=>	$type_id,
		'color_id'			=>	$color_id,
		'scHandle'			=>	$scHandle,
		'rack_id'			=>	$rack_id,
		'NoR'				=>	$NoR,
		'scArtSpecDesign'	=>	$scArtNew,
		'dimension_id'		=>	$dimension_id,
		'scPrdW'			=>	$scPrdW,
		'scPrdD'			=>	$scPrdD,
		'scPrdH'			=>	$scPrdH,
		'scPackW'			=>	$scPackW,
		'scPackD'			=>	$scPackD,
		'scPackH'			=>	$scPackH,
		'scVolN'			=>	$scVolN,
		'scVolG'			=>	$scVolG,
		'scWeightN'			=>	$scWeightN,
		'scWeightG'			=>	$scWeightG,
		'scContainer'		=>	$scContainer,
		'scMecSpecDesign'	=>	$scMecNew,
		'rollbond_id'		=>	$rollbond_id,
		'rollbondtype_id'	=>	$rollbondtype_id,
		'climate_id'		=>	$climate_id,
		'condensor_id'		=>	$condensor_id,
		'refrigerant_id'	=>	$refrigerant_id,
		'scMoR'				=>	$scMoR,
		'scRC'				=>	$scRC,
		'scRP'				=>	$scRP,
		'scCompressor'		=>	$scCompressor,
		'scCoolCap'			=>	$scCoolCap,
		'scCTD'				=>	$scCTD,
		'scFreezTemp'		=>	$scFreezTemp,
		'scEC'				=>	$scEC,
		'scCycSpecDesign'	=>	$scCycNew,
		'rv_id'				=>	$rv_id,
		'wv_id'				=>	$wv_id,
		'scRF'				=>	$scRF,
		'scRtdCurr'			=>	$scRtdCurr,
		'scRtdPwr'			=>	$scRtdPwr,
		'scRML'				=>	$scRML,
		'scElecSpecDesign'	=>	$scElecNew
	);

	echo json_encode($res);
}else{
	$err = "Insert Error";

	echo json_encode($err);
}
?>