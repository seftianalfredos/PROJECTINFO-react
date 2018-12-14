<?php 
include 'config.php';

$type_id	=	'';
$color_id	=	'';
$oArtSpecDesign	=	'';
$dimension_id	=	'';
$oPrdW	=	'';
$oPrdD	=	'';
$oPrdH	=	'';
$oPackW	=	'';
$oPackD	=	'';
$oPackH	=	'';
$oVolN	=	'';
$oVolG	=	'';
$oWeightN	=	'';
$oWeightG	=	'';
$oContainer	=	'';
$oMecSpecDesign	=	'';
$oNote1	=	'';
$oNote2	=	'';
$oNote3	=	'';
$oEC	=	'';
$oCycSpecDesign	=	'';
$rv_id	=	'';
$wv_id	=	'';
$oRF	=	'';
$oRC	=	'';
$oRP	=	'';
$oElecSpecDesign	=	'';
$typeSupply 	= '';
$target_dir 	= '_upload/artSpecDesign/Other/';
$target_dir2	= '_upload/mecSpecDesign/Other/';
$target_dir3	= '_upload/cycSpecDesign/Other/';
$target_dir4	= '_upload/elecSpecDesign/Other/';

$type_id	=	$_POST['type_id'];
$color_id	=	$_POST['color_id'];
$dimension_id	=	$_POST['dimension_id'];
$oPrdW	=	$_POST['oPrdW'];
$oPrdD	=	$_POST['oPrdD'];
$oPrdH	=	$_POST['oPrdH'];
$oPackW	=	$_POST['oPackW'];
$oPackD	=	$_POST['oPackD'];
$oPackH	=	$_POST['oPackH'];
$oVolN	=	$_POST['oVolN'];
$oVolG	=	$_POST['oVolG'];
$oWeightN	=	$_POST['oWeightN'];
$oWeightG	=	$_POST['oWeightG'];
$oContainer	=	$_POST['oContainer'];
$oNote1	=	$_POST['oNote1'];
$oNote2	=	$_POST['oNote2'];
$oNote3	=	$_POST['oNote3'];
$oEC	=	$_POST['oEC'];
$rv_id	=	$_POST['rv_id'];
$wv_id	=	$_POST['wv_id'];
$oRF	=	$_POST['oRF'];
$oRC	=	$_POST['oRC'];
$oRP	=	$_POST['oRP'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}




if (isset($_FILES['oArtSpecDesign']['name'])) {
	$oArtSpecDesign		= $_FILES['oArtSpecDesign']['name'];
	$src   				= $_FILES['oArtSpecDesign']['tmp_name'];
	$x					= explode('.', $oArtSpecDesign);
	$ext 				= strtolower(end($x));
	$oArtNew			= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($oArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['oMecSpecDesign']['name'])) {
	$oMecSpecDesign		= $_FILES['oMecSpecDesign']['name'];
	$src2  				= $_FILES['oMecSpecDesign']['tmp_name'];
	$x					= explode('.', $oMecSpecDesign);
	$ext 				= strtolower(end($x));
	$oMecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir2.basename($oMecNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['oCycSpecDesign']['name'])) {
	$oCycSpecDesign		= $_FILES['oCycSpecDesign']['name'];
	$src3  				= $_FILES['oCycSpecDesign']['tmp_name'];
	$x					= explode('.', $oCycSpecDesign);
	$ext 				= strtolower(end($x));
	$oCycNew			= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir3.basename($oCycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['oElecSpecDesign']['name'])) {
	$oElecSpecDesign	= $_FILES['oElecSpecDesign']['name'];
	$src4 				= $_FILES['oElecSpecDesign']['tmp_name'];
	$x					= explode('.', $oElecSpecDesign);
	$ext 				= strtolower(end($x));
	$oElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir4.basename($oElecNew);
	move_uploaded_file($src4, $target_file4);
}


$stmt = $DBcon->prepare("INSERT INTO table_specother(type_id, color_id, oArtSpecDesign, dimension_id, oPrdW, oPrdD, oPrdH, oPackW, oPackD, oPackH, oVolN, oVolG, oWeightN, oWeightG, oContainer, oMecSpecDesign, oNote1, oNote2, oNote3, oEC, oCycSpecDesign, rv_id, wv_id, oRF, oRC, oRP, oElecSpecDesign
)VALUES(:type_id, :color_id, :oArtSpecDesign, :dimension_id, :oPrdW, :oPrdD, :oPrdH, :oPackW, :oPackD, :oPackH, :oVolN, :oVolG, :oWeightN, :oWeightG, :oContainer, :oMecSpecDesign, :oNote1, :oNote2, :oNote3, :oEC, :oCycSpecDesign, :rv_id, :wv_id, :oRF, :oRC, :oRP, :oElecSpecDesign
)");

$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':color_id', $color_id);
$stmt->bindParam(':oArtSpecDesign', $oArtNew);
$stmt->bindParam(':dimension_id', $dimension_id);
$stmt->bindParam(':oPrdW', $oPrdW);
$stmt->bindParam(':oPrdD', $oPrdD);
$stmt->bindParam(':oPrdH', $oPrdH);
$stmt->bindParam(':oPackW', $oPackW);
$stmt->bindParam(':oPackD', $oPackD);
$stmt->bindParam(':oPackH', $oPackH);
$stmt->bindParam(':oVolN', $oVolN);
$stmt->bindParam(':oVolG', $oVolG);
$stmt->bindParam(':oWeightN', $oWeightN);
$stmt->bindParam(':oWeightG', $oWeightG);
$stmt->bindParam(':oContainer', $oContainer);
$stmt->bindParam(':oMecSpecDesign', $oMecNew);
$stmt->bindParam(':oNote1', $oNote1);
$stmt->bindParam(':oNote2', $oNote2);
$stmt->bindParam(':oNote3', $oNote3);
$stmt->bindParam(':oEC', $oEC);
$stmt->bindParam(':oCycSpecDesign', $oCycNew);
$stmt->bindParam(':rv_id', $rv_id);
$stmt->bindParam(':wv_id', $wv_id);
$stmt->bindParam(':oRF', $oRF);
$stmt->bindParam(':oRC', $oRC);
$stmt->bindParam(':oRP', $oRP);
$stmt->bindParam(':oElecSpecDesign', $oElecNew);

if ($stmt->execute()) {
	$res = array(
		'type_id' => $type_id,
		'color_id' => $color_id,
		'oArtSpecDesign' => $oArtNew,
		'dimension_id' => $dimension_id,
		'oPrdW' => $oPrdW,
		'oPrdD' => $oPrdD,
		'oPrdH' => $oPrdH,
		'oPackW' => $oPackW,
		'oPackD' => $oPackD,
		'oPackH' => $oPackH,
		'oVolN' => $oVolN,
		'oVolG' => $oVolG,
		'oWeightN' => $oWeightN,
		'oWeightG' => $oWeightG,
		'oContainer' => $oContainer,
		'oMecSpecDesign' => $oMecNew,
		'oNote1' => $oNote1,
		'oNote2' => $oNote2,
		'oNote3' => $oNote3,
		'oEC' => $oEC,
		'oCycSpecDesign' => $oCycNew,
		'rv_id' => $rv_id,
		'wv_id' => $wv_id,
		'oRF' => $oRF,
		'oRC' => $oRC,
		'oRP' => $oRP,
		'oElecSpecDesign' => $oElecNew
	);

	echo json_encode($res);
}else{
	$err = "Insert Error";

	echo json_encode($err);
}


?>