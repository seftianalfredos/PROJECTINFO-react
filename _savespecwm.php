<?php 
include 'config.php';

$type_id	=	'';
$color_id	=	'';
$wmMB	=	'';
$wmMD	=	'';
$wmArtSpecDesign	=	'';
$dimension_id	=	'';
$wmPrdW	=	'';
$wmPrdD	=	'';
$wmPrdH	=	'';
$wmPackW	=	'';
$wmPackD	=	'';
$wmPackH	=	'';
$wmVolN	=	'';
$wmVolG	=	'';
$wmWeightN	=	'';
$wmWeightG	=	'';
$wmWaterSelector	=	'';
$wmContainer	=	'';
$wmMecSpecDesign	=	'';
$wmTMS	=	'';
$wmPMS	=	'';
$wmSMS	=	'';
$wmTMW	=	'';
$wmPMW	=	'';
$wmSMW	=	'';
$wmCycSpecDesign	=	'';
$rv_id	=	'';
$wv_id	=	'';
$wmRF	=	'';
$wmRC	=	'';
$wmRP	=	'';
$wmElecSpecDesign	=	'';
$typeSupply		= '';
$target_dir 	= '_upload/artSpecDesign/WM/';
$target_dir2	= '_upload/mecSpecDesign/WM/';
$target_dir3	= '_upload/cycSpecDesign/WM/';
$target_dir4	= '_upload/elecSpecDesign/WM/';

$type_id	=	$_POST['type_id'];
$color_id	=	$_POST['color_id'];
$wmMB	=	$_POST['wmMB'];
$wmMD	=	$_POST['wmMD'];
$dimension_id	=	$_POST['dimension_id'];
$wmPrdW	=	$_POST['wmPrdW'];
$wmPrdD	=	$_POST['wmPrdD'];
$wmPrdH	=	$_POST['wmPrdH'];
$wmPackW	=	$_POST['wmPackW'];
$wmPackD	=	$_POST['wmPackD'];
$wmPackH	=	$_POST['wmPackH'];
$wmVolN	=	$_POST['wmVolN'];
$wmVolG	=	$_POST['wmVolG'];
$wmWeightN	=	$_POST['wmWeightN'];
$wmWeightG	=	$_POST['wmWeightG'];
$wmWaterSelector	=	$_POST['wmWaterSelector'];
$wmContainer	=	$_POST['wmContainer'];
$wmTMS	=	$_POST['wmTMS'];
$wmPMS	=	$_POST['wmPMS'];
$wmSMS	=	$_POST['wmSMS'];
$wmTMW	=	$_POST['wmTMW'];
$wmPMW	=	$_POST['wmPMW'];
$wmSMW	=	$_POST['wmSMW'];
$rv_id	=	$_POST['rv_id'];
$wv_id	=	$_POST['wv_id'];
$wmRF	=	$_POST['wmRF'];
$wmRC	=	$_POST['wmRC'];
$wmRP	=	$_POST['wmRP'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}




if (isset($_FILES['wmArtSpecDesign']['name'])) {
	$wmArtSpecDesign	= $_FILES['wmArtSpecDesign']['name'];
	$src   				= $_FILES['wmArtSpecDesign']['tmp_name'];
	$x					= explode('.', $wmArtSpecDesign);
	$ext 				= strtolower(end($x));
	$wmArtNew			= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($wmArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['wmMecSpecDesign']['name'])) {
	$wmMecSpecDesign	= $_FILES['wmMecSpecDesign']['name'];
	$src2  				= $_FILES['wmMecSpecDesign']['tmp_name'];
	$x					= explode('.', $wmMecSpecDesign);
	$ext 				= strtolower(end($x));
	$wmMecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir2.basename($wmMecNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['wmCycSpecDesign']['name'])) {
	$wmCycSpecDesign	= $_FILES['wmCycSpecDesign']['name'];
	$src3  				= $_FILES['wmCycSpecDesign']['tmp_name'];
	$x					= explode('.', $wmCycSpecDesign);
	$ext 				= strtolower(end($x));
	$wmCycNew			= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir3.basename($wmCycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['wmElecSpecDesign']['name'])) {
	$wmElecSpecDesign	= $_FILES['wmElecSpecDesign']['name'];
	$src4  				= $_FILES['wmElecSpecDesign']['tmp_name'];
	$x					= explode('.', $wmElecSpecDesign);
	$ext 				= strtolower(end($x));
	$wmElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir4.basename($wmElecNew);
	move_uploaded_file($src4, $target_file4);
}

$stmt = $DBcon->prepare("INSERT INTO table_specwm(type_id, color_id, wmMB, wmMD, wmArtSpecDesign, dimension_id, wmPrdW, wmPrdD, wmPrdH, wmPackW, wmPackD, wmPackH, wmVolN, wmVolG, wmWeightN, wmWeightG, wmWaterSelector, wmContainer, wmMecSpecDesign, wmTMS, wmPMS, wmSMS, wmTMW, wmPMW, wmSMW, wmCycSpecDesign, rv_id, wv_id, wmRF, wmRC, wmRP, wmElecSpecDesign
)VALUES(:type_id, :color_id, :wmMB, :wmMD, :wmArtSpecDesign, :dimension_id, :wmPrdW, :wmPrdD, :wmPrdH, :wmPackW, :wmPackD, :wmPackH, :wmVolN, :wmVolG, :wmWeightN, :wmWeightG, :wmWaterSelector, :wmContainer, :wmMecSpecDesign, :wmTMS, :wmPMS, :wmSMS, :wmTMW, :wmPMW, :wmSMW, :wmCycSpecDesign, :rv_id, :wv_id, :wmRF, :wmRC, :wmRP, :wmElecSpecDesign
)");


$stmt->bindParam(':type_id' ,$type_id);
$stmt->bindParam(':color_id' ,$color_id);
$stmt->bindParam(':wmMB' ,$wmMB);
$stmt->bindParam(':wmMD' ,$wmMD);
$stmt->bindParam(':wmArtSpecDesign' ,$wmArtNew);
$stmt->bindParam(':dimension_id' ,$dimension_id);
$stmt->bindParam(':wmPrdW' ,$wmPrdW);
$stmt->bindParam(':wmPrdD' ,$wmPrdD);
$stmt->bindParam(':wmPrdH' ,$wmPrdH);
$stmt->bindParam(':wmPackW' ,$wmPackW);
$stmt->bindParam(':wmPackD' ,$wmPackD);
$stmt->bindParam(':wmPackH' ,$wmPackH);
$stmt->bindParam(':wmVolN' ,$wmVolN);
$stmt->bindParam(':wmVolG' ,$wmVolG);
$stmt->bindParam(':wmWeightN' ,$wmWeightN);
$stmt->bindParam(':wmWeightG' ,$wmWeightG);
$stmt->bindParam(':wmWaterSelector' ,$wmWaterSelector);
$stmt->bindParam(':wmContainer' ,$wmContainer);
$stmt->bindParam(':wmMecSpecDesign' ,$wmMecNew);
$stmt->bindParam(':wmTMS' ,$wmTMS);
$stmt->bindParam(':wmPMS' ,$wmPMS);
$stmt->bindParam(':wmSMS' ,$wmSMS);
$stmt->bindParam(':wmTMW' ,$wmTMW);
$stmt->bindParam(':wmPMW' ,$wmPMW);
$stmt->bindParam(':wmSMW' ,$wmSMW);
$stmt->bindParam(':wmCycSpecDesign' ,$wmCycNew);
$stmt->bindParam(':rv_id' ,$rv_id);
$stmt->bindParam(':wv_id' ,$wv_id);
$stmt->bindParam(':wmRF' ,$wmRF);
$stmt->bindParam(':wmRC' ,$wmRC);
$stmt->bindParam(':wmRP' ,$wmRP);
$stmt->bindParam(':wmElecSpecDesign' ,$wmElecNew);

if ($stmt->execute()) {
	$res = array(
		'type_id' 			=> $type_id,
		'color_id' 			=> $color_id,
		'wmMB' 				=> $wmMB,
		'wmMD' 				=> $wmMD,
		'wmArtSpecDesign' 	=> $wmArtNew,
		'dimension_id' 		=> $dimension_id,
		'wmPrdW' 			=> $wmPrdW,
		'wmPrdD' 			=> $wmPrdD,
		'wmPrdH' 			=> $wmPrdH,
		'wmPackW' 			=> $wmPackW,
		'wmPackD' 			=> $wmPackD,
		'wmPackH' 			=> $wmPackH,
		'wmVolN' 			=> $wmVolN,
		'wmVolG' 			=> $wmVolG,
		'wmWeightN' 		=> $wmWeightN,
		'wmWeightG' 		=> $wmWeightG,
		'wmWaterSelector' 	=> $wmWaterSelector,
		'wmContainer' 		=> $wmContainer,
		'wmMecSpecDesign' 	=> $wmMecNew,
		'wmTMS' 			=> $wmTMS,
		'wmPMS' 			=> $wmPMS,
		'wmSMS' 			=> $wmSMS,
		'wmTMW' 			=> $wmTMW,
		'wmPMW' 			=> $wmPMW,
		'wmSMW' 			=> $wmSMW,
		'wmCycSpecDesign' 	=> $wmCycNew,
		'rv_id' 			=> $rv_id,
		'wv_id' 			=> $wv_id,
		'wmRF' 				=> $wmRF,
		'wmRC' 				=> $wmRC,
		'wmRP' 				=> $wmRP,
		'wmElecSpecDesign' 	=> $wmElecNew
	);

	echo json_encode($res);
}
else{
	$err = "Insert Error";

	echo json_encode($err);
}

?>