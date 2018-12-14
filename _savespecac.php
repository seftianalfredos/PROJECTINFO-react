<?php 
include 'config.php';

$type_id	=	'';
$bodyColor	=	'';
$accColor	=	'';
$acArtSpecDesign	=	'';
$dimension_id	=	'';
$acIPrdW	=	'';
$acIPrdD	=	'';
$acIPrdH	=	'';
$acIPackW	=	'';
$acIPackD	=	'';
$acIPackH	=	'';
$acIWN	=	'';
$acIWG	=	'';
$acOPrdW	=	'';
$acOPrdD	=	'';
$acOPrdH	=	'';
$acOPackW	=	'';
$acOPackD	=	'';
$acOPackH	=	'';
$acOWN	=	'';
$acOWG	=	'';
$LPD	=	'';
$GPD	=	'';
$container	=	'';
$acMecSpecDesign	=	'';
$CCTRwatt	=	'';
$CCTRbtu	=	'';
$RCCwatt	=	'';
$RCCbtu	=	'';
$EerHasil	=	'';
$Konversi	=	'';
$EerLabel	=	'';
$refrigerant_id	=	'';
$refrigerant_w	=	'';
$compressorType	=	'';
$compressorModel	=	'';
$compressorBrand	=	'';
$expansion	=	'';
$AFV	=	'';
$OFM	=	'';
$FMOT	=	'';
$condensorType	=	'';
$evaporatorType	=	'';
$INL	=	'';
$ONL	=	'';
$acCycSpecDesign	=	'';
$acPwrSupply	=	'';
$testDM	=	'';
$testAM	=	'';
$standartDM	=	'';
$standartAM	=	'';
$SltDP	=	'';
$SltAP	=	'';
$SilDP	=	'';
$SilAP	=	'';
$acEC	=	'';
$acElecSpecDesign	=	'';
$typeSupply		= '';
$target_dir 	= '_upload/artSpecDesign/AC/';
$target_dir2	= '_upload/mecSpecDesign/AC/';
$target_dir3	= '_upload/cycSpecDesign/AC/';
$target_dir4	= '_upload/elecSpecDesign/AC/';

$type_id		=	$_POST['type_id'];
$bodyColor		=	$_POST['bodyColor'];
$accColor		=	$_POST['accColor'];
$dimension_id		=	$_POST['dimension_id'];
$acIPrdW		=	$_POST['acIPrdW'];
$acIPrdD		=	$_POST['acIPrdD'];
$acIPrdH		=	$_POST['acIPrdH'];
$acIPackW		=	$_POST['acIPackW'];
$acIPackD		=	$_POST['acIPackD'];
$acIPackH		=	$_POST['acIPackH'];
$acIWN		=	$_POST['acIWN'];
$acIWG		=	$_POST['acIWG'];
$acOPrdW		=	$_POST['acOPrdW'];
$acOPrdD		=	$_POST['acOPrdD'];
$acOPrdH		=	$_POST['acOPrdH'];
$acOPackW		=	$_POST['acOPackW'];
$acOPackD		=	$_POST['acOPackD'];
$acOPackH		=	$_POST['acOPackH'];
$acOWN		=	$_POST['acOWN'];
$acOWG		=	$_POST['acOWG'];
$LPD		=	$_POST['LPD'];
$GPD		=	$_POST['GPD'];
$container		=	$_POST['container'];
$CCTRwatt		=	$_POST['CCTRwatt'];
$CCTRbtu		=	$_POST['CCTRbtu'];
$RCCwatt		=	$_POST['RCCwatt'];
$RCCbtu		=	$_POST['RCCbtu'];
$EerHasil		=	$_POST['EerHasil'];
$Konversi		=	$_POST['Konversi'];
$EerLabel		=	$_POST['EerLabel'];
$refrigerant_id		=	$_POST['refrigerant_id'];
$refrigerant_w		=	$_POST['refrigerant_w'];
$compressorType		=	$_POST['compressorType'];
$compressorModel		=	$_POST['compressorModel'];
$compressorBrand		=	$_POST['compressorBrand'];
$expansion		=	$_POST['expansion'];
$AFV		=	$_POST['AFV'];
$OFM		=	$_POST['OFM'];
$FMOT		=	$_POST['FMOT'];
$condensorType		=	$_POST['condensorType'];
$evaporatorType		=	$_POST['evaporatorType'];
$INL		=	$_POST['INL'];
$ONL		=	$_POST['ONL'];
$acPwrSupply		=	$_POST['acPwrSupply'];
$testDM		=	$_POST['testDM'];
$testAM		=	$_POST['testAM'];
$standartDM		=	$_POST['standartDM'];
$standartAM		=	$_POST['standartAM'];
$SltDP		=	$_POST['SltDP'];
$SltAP		=	$_POST['SltAP'];
$SilDP		=	$_POST['SilDP'];
$SilAP		=	$_POST['SilAP'];
$acEC		=	$_POST['acEC'];

$cek = $DBcon->prepare("SELECT typeSupply FROM table_type WHERE type_id = :type_id ");
$cek->bindParam(':type_id', $type_id);
$cek->execute();
while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
	$typeSupply = $row['typeSupply'];
}




if (isset($_FILES['acArtSpecDesign']['name'])) {
	$acArtSpecDesign	= $_FILES['acArtSpecDesign']['name'];
	$src   				= $_FILES['acArtSpecDesign']['tmp_name'];
	$x					= explode('.', $acArtSpecDesign);
	$ext 				= strtolower(end($x));
	$acArtNew			= "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;
	$target_file 		= $target_dir.basename($acArtNew);
	move_uploaded_file($src, $target_file);
}
if (isset($_FILES['acMecSpecDesign']['name'])) {
	$acMecSpecDesign	= $_FILES['acMecSpecDesign']['name'];
	$src2  				= $_FILES['acMecSpecDesign']['tmp_name'];
	$x					= explode('.', $acMecSpecDesign);
	$ext 				= strtolower(end($x));
	$acMecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;
	$target_file2 		= $target_dir2.basename($acMecNew);
	move_uploaded_file($src2, $target_file2);
}
if (isset($_FILES['acCycSpecDesign']['name'])) {
	$acCycSpecDesign	= $_FILES['acCycSpecDesign']['name'];
	$src3  				= $_FILES['acCycSpecDesign']['tmp_name'];
	$x					= explode('.', $acArtSpecDesign);
	$ext 				= strtolower(end($x));
	$acCycNew			= "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;
	$target_file3 		= $target_dir3.basename($acCycNew);
	move_uploaded_file($src3, $target_file3);
}
if (isset($_FILES['acElecSpecDesign']['name'])) {
	$acElecSpecDesign	= $_FILES['acElecSpecDesign']['name'];
	$src4  				= $_FILES['acElecSpecDesign']['tmp_name'];
	$x					= explode('.', $acArtSpecDesign);
	$ext 				= strtolower(end($x));
	$acElecNew			= "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;
	$target_file4 		= $target_dir4.basename($acElecNew);
	move_uploaded_file($src4, $target_file4);
}

/*$res = array(
	'type_id'	=>	$type_id,
	'bodyColor'	=>	$bodyColor,
	'accColor'	=>	$accColor,
	'acArtSpecDesign'	=>	$acArtSpecDesign,
	'dimension_id'	=>	$dimension_id,
	'acIPrdW'	=>	$acIPrdW,
	'acIPrdD'	=>	$acIPrdD,
	'acIPrdH'	=>	$acIPrdH,
	'acIPackW'	=>	$acIPackW,
	'acIPackD'	=>	$acIPackD,
	'acIPackH'	=>	$acIPackH,
	'acIWN'	=>	$acIWN,
	'acIWG'	=>	$acIWG,
	'acOPrdW'	=>	$acOPrdW,
	'acOPrdD'	=>	$acOPrdD,
	'acOPrdH'	=>	$acOPrdH,
	'acOPackW'	=>	$acOPackW,
	'acOPackD'	=>	$acOPackD,
	'acOPackH'	=>	$acOPackH,
	'acOWN'	=>	$acOWN,
	'acOWG'	=>	$acOWG,
	'LPD'	=>	$LPD,
	'GPD'	=>	$GPD,
	'container'	=>	$container,
	'acMecSpecDesign'	=>	$acMecSpecDesign,
	'CCTRwatt'	=>	$CCTRwatt,
	'CCTRbtu'	=>	$CCTRbtu,
	'RCCwatt'	=>	$RCCwatt,
	'RCCbtu'	=>	$RCCbtu,
	'EerHasil'	=>	$EerHasil,
	'Konversi'	=>	$Konversi,
	'EerLabel'	=>	$EerLabel,
	'refrigerant_id'	=>	$refrigerant_id,
	'refrigerant_w'	=>	$refrigerant_w,
	'compressorType'	=>	$compressorType,
	'compressorModel'	=>	$compressorModel,
	'compressorBrand'	=>	$compressorBrand,
	'expansion'	=>	$expansion,
	'AFV'	=>	$AFV,
	'OFM'	=>	$OFM,
	'FMOT'	=>	$FMOT,
	'condensorType'	=>	$condensorType,
	'evaporatorType'	=>	$evaporatorType,
	'INL'	=>	$INL,
	'ONL'	=>	$ONL,
	'acCycSpecDesign'	=>	$acCycSpecDesign,
	'acPwrSupply'	=>	$acPwrSupply,
	'testDM'	=>	$testDM,
	'testAM'	=>	$testAM,
	'standartDM'	=>	$standartDM,
	'standartAM'	=>	$standartAM,
	'SltDP'	=>	$SltDP,
	'SltAP'	=>	$SltAP,
	'SilDP'	=>	$SilDP,
	'SilAP'	=>	$SilAP,
	'acEC'	=>	$acEC,
	'acElecSpecDesign'	=>	$acElecSpecDesign
);

echo json_encode($res);*/

$stmt = $DBcon->prepare("INSERT INTO table_specac(type_id, bodyColor, accColor, acArtSpecDesign, dimension_id, acIPrdW, acIPrdD, acIPrdH, acIPackW, acIPackD, acIPackH, acIWN, acIWG, acOPrdW, acOPrdD, acOPrdH, acOPackW, acOPackD, acOPackH, acOWN, acOWG, LPD, GPD, container, acMecSpecDesign, CCTRwatt, CCTRbtu, RCCwatt, RCCbtu, EerHasil, Konversi, EerLabel, refrigerant_id, refrigerant_w, compressorType, compressorModel, compressorBrand, expansion, AFV, OFM, FMOT, condensorType, evaporatorType, INL, ONL, acCycSpecDesign, acPwrSupply, testDM, testAM, standartDM, standartAM, SltDP, SltAP, SilDP, SilAP, acEC, acElecSpecDesign
)VALUES(:type_id, :bodyColor, :accColor, :acArtSpecDesign, :dimension_id, :acIPrdW, :acIPrdD, :acIPrdH, :acIPackW, :acIPackD, :acIPackH, :acIWN, :acIWG, :acOPrdW, :acOPrdD, :acOPrdH, :acOPackW, :acOPackD, :acOPackH, :acOWN, :acOWG, :LPD, :GPD, :container, :acMecSpecDesign, :CCTRwatt, :CCTRbtu, :RCCwatt, :RCCbtu, :EerHasil, :Konversi, :EerLabel, :refrigerant_id, :refrigerant_w, :compressorType, :compressorModel, :compressorBrand, :expansion, :AFV, :OFM, :FMOT, :condensorType, :evaporatorType, :INL, :ONL, :acCycSpecDesign, :acPwrSupply, :testDM, :testAM, :standartDM, :standartAM, :SltDP, :SltAP, :SilDP, :SilAP, :acEC, :acElecSpecDesign
)");


$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':bodyColor', $bodyColor);
$stmt->bindParam(':accColor', $accColor);
$stmt->bindParam(':acArtSpecDesign', $acArtNew);
$stmt->bindParam(':dimension_id', $dimension_id);
$stmt->bindParam(':acIPrdW', $acIPrdW);
$stmt->bindParam(':acIPrdD', $acIPrdD);
$stmt->bindParam(':acIPrdH', $acIPrdH);
$stmt->bindParam(':acIPackW', $acIPackW);
$stmt->bindParam(':acIPackD', $acIPackD);
$stmt->bindParam(':acIPackH', $acIPackH);
$stmt->bindParam(':acIWN', $acIWN);
$stmt->bindParam(':acIWG', $acIWG);
$stmt->bindParam(':acOPrdW', $acOPrdW);
$stmt->bindParam(':acOPrdD', $acOPrdD);
$stmt->bindParam(':acOPrdH', $acOPrdH);
$stmt->bindParam(':acOPackW', $acOPackW);
$stmt->bindParam(':acOPackD', $acOPackD);
$stmt->bindParam(':acOPackH', $acOPackH);
$stmt->bindParam(':acOWN', $acOWN);
$stmt->bindParam(':acOWG', $acOWG);
$stmt->bindParam(':LPD', $LPD);
$stmt->bindParam(':GPD', $GPD);
$stmt->bindParam(':container', $container);
$stmt->bindParam(':acMecSpecDesign', $acMecNew);
$stmt->bindParam(':CCTRwatt', $CCTRwatt);
$stmt->bindParam(':CCTRbtu', $CCTRbtu);
$stmt->bindParam(':RCCwatt', $RCCwatt);
$stmt->bindParam(':RCCbtu', $RCCbtu);
$stmt->bindParam(':EerHasil', $EerHasil);
$stmt->bindParam(':Konversi', $Konversi);
$stmt->bindParam(':EerLabel', $EerLabel);
$stmt->bindParam(':refrigerant_id', $refrigerant_id);
$stmt->bindParam(':refrigerant_w', $refrigerant_w);
$stmt->bindParam(':compressorType', $compressorType);
$stmt->bindParam(':compressorModel', $compressorModel);
$stmt->bindParam(':compressorBrand', $compressorBrand);
$stmt->bindParam(':expansion', $expansion);
$stmt->bindParam(':AFV', $AFV);
$stmt->bindParam(':OFM', $OFM);
$stmt->bindParam(':FMOT', $FMOT);
$stmt->bindParam(':condensorType', $condensorType);
$stmt->bindParam(':evaporatorType', $evaporatorType);
$stmt->bindParam(':INL', $INL);
$stmt->bindParam(':ONL', $ONL);
$stmt->bindParam(':acCycSpecDesign', $acCycNew);
$stmt->bindParam(':acPwrSupply', $acPwrSupply);
$stmt->bindParam(':testDM', $testDM);
$stmt->bindParam(':testAM', $testAM);
$stmt->bindParam(':standartDM', $standartDM);
$stmt->bindParam(':standartAM', $standartAM);
$stmt->bindParam(':SltDP', $SltDP);
$stmt->bindParam(':SltAP', $SltAP);
$stmt->bindParam(':SilDP', $SilDP);
$stmt->bindParam(':SilAP', $SilAP);
$stmt->bindParam(':acEC', $acEC);
$stmt->bindParam(':acElecSpecDesign', $acElecNew);

if ($stmt->execute()) {
	$res = array(
		'type_id'			=>	$type_id,
		'bodyColor'			=>	$bodyColor,
		'accColor'			=>	$accColor,
		'acArtSpecDesign'	=>	$acArtNew,
		'dimension_id'		=>	$dimension_id,
		'acIPrdW'			=>	$acIPrdW,
		'acIPrdD'			=>	$acIPrdD,
		'acIPrdH'			=>	$acIPrdH,
		'acIPackW'			=>	$acIPackW,
		'acIPackD'			=>	$acIPackD,
		'acIPackH'			=>	$acIPackH,
		'acIWN'				=>	$acIWN,
		'acIWG'				=>	$acIWG,
		'acOPrdW'			=>	$acOPrdW,
		'acOPrdD'			=>	$acOPrdD,
		'acOPrdH'			=>	$acOPrdH,
		'acOPackW'			=>	$acOPackW,
		'acOPackD'			=>	$acOPackD,
		'acOPackH'			=>	$acOPackH,
		'acOWN'				=>	$acOWN,
		'acOWG'				=>	$acOWG,
		'LPD'				=>	$LPD,
		'GPD'				=>	$GPD,
		'container'			=>	$container,
		'acMecSpecDesign'	=>	$acMecNew,
		'CCTRwatt'			=>	$CCTRwatt,
		'CCTRbtu'			=>	$CCTRbtu,
		'RCCwatt'			=>	$RCCwatt,
		'RCCbtu'			=>	$RCCbtu,
		'EerHasil'			=>	$EerHasil,
		'Konversi'			=>	$Konversi,
		'EerLabel'			=>	$EerLabel,
		'refrigerant_id'	=>	$refrigerant_id,
		'refrigerant_w'		=>	$refrigerant_w,
		'compressorType'	=>	$compressorType,
		'compressorModel'	=>	$compressorModel,
		'compressorBrand'	=>	$compressorBrand,
		'expansion'			=>	$expansion,
		'AFV'				=>	$AFV,
		'OFM'				=>	$OFM,
		'FMOT'				=>	$FMOT,
		'condensorType'		=>	$condensorType,
		'evaporatorType'	=>	$evaporatorType,
		'INL'				=>	$INL,
		'ONL'				=>	$ONL,
		'acCycSpecDesign'	=>	$acCycNew,
		'acPwrSupply'		=>	$acPwrSupply,
		'testDM'			=>	$testDM,
		'testAM'			=>	$testAM,
		'standartDM'		=>	$standartDM,
		'standartAM'		=>	$standartAM,
		'SltDP'				=>	$SltDP,
		'SltAP'				=>	$SltAP,
		'SilDP'				=>	$SilDP,
		'SilAP'				=>	$SilAP,
		'acEC'				=>	$acEC,
		'acElecSpecDesign'	=>	$acElecNew
	);

	echo json_encode($res);
}else{
	$err = "Insert Error";

	echo json_encode($err);
}

?>