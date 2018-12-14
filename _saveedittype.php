<?php 
include 'config.php';
// ###################################################################################        EDIT TYPE         #####################################################################################
$type_id			=	'';
$prj_id				=	'';
$noNdpr				=	'';
$ndprName			=	'';
$plant_id			=	'';
$typeSupply			=	'';
$typeSupplyDesc		=	'';
$typeDemand			=	'';
$typeCetak			=	'';
$format_id			=	'';
$prd_id				=	'';
$cha_id				=	'';
$siz_id				=	'';
$typeNote			=	'';
$typePhoto			=	'';
$made_in			=	'';
$mandatory			=	'';
$cp_id				=	'';
$ModelFamily		=	'';
$noBukuPetunjuk		=	'';
$noPostel			=	'';
$noSni				=	'';
$noLsPro			=	'';
$noNrpNpb			=	'';
$warantyCard		=	'';
$warantyYear		=	'';
$sta_id				=	'';
$fea_id				=	'';
$target_dir			= 	'_upload/ndpr_file/';
$target_dir2		= 	'_upload/typePhoto/';



$type_id			=	$_POST['type_id'];
$prj_id				=	$_POST['prj_id'];
$noNdpr				=	$_POST['noNdpr'];
$plant_id			=	$_POST['plant_id'];
$typeSupply			=	$_POST['typeSupply'];
$typeSupplyDesc		=	$_POST['typeSupplyDesc'];
$typeDemand			=	$_POST['typeDemand'];
$typeCetak			=	$_POST['typeCetak'];
$format_id			=	$_POST['format_id'];
$prd_id				=	$_POST['prd_id'];
$cha_id				=	$_POST['cha_id'];
$siz_id				=	$_POST['siz_id'];
$typeNote			=	$_POST['typeNote'];
$made_in			=	$_POST['made_in'];
$mandatory			=	$_POST['mandatory'];
$cp_id				=	$_POST['cp_id'];
$ModelFamily		=	$_POST['ModelFamily'];
$noBukuPetunjuk		=	$_POST['noBukuPetunjuk'];
$noPostel			=	$_POST['noPostel'];
$noSni				=	$_POST['noSni'];
$noLsPro			=	$_POST['noLsPro'];
$noNrpNpb			=	$_POST['noNrpNpb'];
$warantyCard		=	$_POST['warantyCard'];
$warantyYear		=	$_POST['warantyYear'];
$sta_id				=	$_POST['sta_id'];


if (isset($_FILES['ndprName']['name'])) {
	$temp_ndpr		=	'';
	$ndprName		=	$_FILES['ndprName']['name'];
	$src 			=	$_FILES['ndprName']['tmp_name'];

	$delete 		=	$DBcon->prepare("SELECT ndprName FROM table_type WHERE type_id = :type_id");
	$delete->bindParam(':type_id', $type_id);
	$delete->execute();
	while ($row = $delete->fetch(PDO::FETCH_ASSOC)) {
		$temp_ndpr	= $row['ndprName'];

		unlink($target_dir.$temp_ndpr);
	}

	$a		= explode('_', $temp_ndpr);
	$b 		= end($a);
	$c		= explode('.', $b);
	$count 	= $c[0];
	$d 		= substr($count, 1,2);
	$e 		= $d + 1;

	if ($e < 10) {
		$rev = 'R0'.$e;
	}else{
		$rev = 'R'.$e;
	}

	$x 	 = explode('.', $ndprName);
	$ext = strtolower(end($x));
	$ndprNamenew = "NP_".str_replace(' ', '_', $typeSupply)."_".$rev.".".$ext;

	$target_file	= $target_dir.basename($ndprNamenew);
	move_uploaded_file($src, $target_file);

	$update_ndpr	=	$DBcon->prepare("UPDATE table_type SET ndprName = :ndprName WHERE type_id = :type_id ");
	$update_ndpr->bindParam(':type_id', $type_id);
	$update_ndpr->bindParam(':ndprName', $ndprNamenew);
	$update_ndpr->execute();

	$resNpdr	= array(
		'NPDR'	=> $ndprNamenew
	);

	echo json_encode($resNpdr);
}

if (isset($_FILES['typePhoto']['name'])) {
	$temp_gambar	=	'';
	$typePhoto		=	$_FILES['typePhoto']['name'];
	$src2 			=	$_FILES['typePhoto']['tmp_name'];

	$delete2 		=	$DBcon->prepare("SELECT typePhoto FROM table_type WHERE type_id = :type_id");
	$delete2->bindParam(':type_id', $type_id);
	$delete2->execute();
	while ($row = $delete2->fetch(PDO::FETCH_ASSOC)) {
		$temp_gambar = $row['typePhoto'];
		unlink($target_dir2.$temp_gambar);
	}

	$a		= explode('_', $temp_gambar);
	$b 		= end($a);
	$c		= explode('.', $b);
	$count 	= $c[0];
	$d 		= substr($count, 1,2);
	$e 		= $d + 1;

	if ($e < 10) {
		$rev = 'R0'.$e;
	}else{
		$rev = 'R'.$e;
	}

	$x 	 = explode('.', $temp_gambar);
	$ext = strtolower(end($x));
	$typePhotonew = "TP_".str_replace(' ', '_', $typeSupply)."_".$rev.".".$ext;

	$target_file2	= $target_dir2.basename($typePhotonew);
	move_uploaded_file($src2, $target_file2);

	$update_photo	=	$DBcon->prepare("UPDATE table_type SET typePhoto = :typePhoto WHERE type_id = :type_id ");
	$update_photo->bindParam(':type_id', $type_id);
	$update_photo->bindParam(':typePhoto', $typePhotonew);
	$update_photo->execute();

	$resTypePhoto	= array(
		'Type Photo'	=> $typePhotonew
	);

	echo json_encode($resTypePhoto);

}

$stmt = $DBcon->prepare("
	UPDATE table_type SET type_id = :type_id, prj_id = :prj_id, noNdpr = :noNdpr, plant_id = :plant_id, typeSupply = :typeSupply, typeSupplyDesc = :typeSupplyDesc, typeDemand = :typeDemand, typeCetak = :typeCetak, format_id = :format_id, prd_id = :prd_id, cha_id = :cha_id, siz_id = :siz_id, typeNote = :typeNote, made_in = :made_in, mandatory = :mandatory, cp_id = :cp_id, ModelFamily = :ModelFamily, noBukuPetunjuk = :noBukuPetunjuk, noPostel = :noPostel, noSni = :noSni, noLsPro = :noLsPro, noNrpNpb = :noNrpNpb, warantyCard = :warantyCard, warantyYear = :warantyYear, sta_id = :sta_id
	WHERE type_id = :type_id
	");

$stmt->bindParam(':type_id', $type_id);
$stmt->bindParam(':prj_id', $prj_id);
$stmt->bindParam(':noNdpr', $noNdpr);
$stmt->bindParam(':plant_id', $plant_id);
$stmt->bindParam(':typeSupply', $typeSupply);
$stmt->bindParam(':typeSupplyDesc', $typeSupplyDesc);
$stmt->bindParam(':typeDemand', $typeDemand);
$stmt->bindParam(':typeCetak', $typeCetak);
$stmt->bindParam(':format_id', $format_id);
$stmt->bindParam(':prd_id', $prd_id);
$stmt->bindParam(':cha_id', $cha_id);
$stmt->bindParam(':siz_id', $siz_id);
$stmt->bindParam(':typeNote', $typeNote);
$stmt->bindParam(':made_in', $made_in);
$stmt->bindParam(':mandatory', $mandatory);
$stmt->bindParam(':cp_id', $cp_id);
$stmt->bindParam(':ModelFamily', $ModelFamily);
$stmt->bindParam(':noBukuPetunjuk', $noBukuPetunjuk);
$stmt->bindParam(':noPostel', $noPostel);
$stmt->bindParam(':noSni', $noSni);
$stmt->bindParam(':noLsPro', $noLsPro);
$stmt->bindParam(':noNrpNpb', $noNrpNpb);
$stmt->bindParam(':warantyCard', $warantyCard);
$stmt->bindParam(':warantyYear', $warantyYear);
$stmt->bindParam(':sta_id', $sta_id);

$stmt->execute();

$resType = array(
	'type_id'				=> $type_id,
	'prj_id'				=> $prj_id,
	'noNdpr'				=> $noNdpr,
	'plant_id'				=> $plant_id,
	'typeSupply'			=> $typeSupply,
	'typeSupplyDesc'		=> $typeSupplyDesc,
	'typeDemand'			=> $typeDemand,
	'typeCetak'				=> $typeCetak,
	'format_id'				=> $format_id,
	'prd_id'				=> $prd_id,
	'cha_id'				=> $cha_id,
	'siz_id'				=> $siz_id,
	'typeNote'				=> $typeNote,
	'made_in'				=> $made_in,
	'mandatory'				=> $mandatory,
	'cp_id'					=> $cp_id,
	'ModelFamily'			=> $ModelFamily,
	'noBukuPetunjuk'		=> $noBukuPetunjuk,
	'noPostel'				=> $noPostel,
	'noSni'					=> $noSni,
	'noLsPro'				=> $noLsPro,
	'noNrpNpb'				=> $noNrpNpb,
	'warantyCard'			=> $warantyCard,
	'warantyYear'			=> $warantyYear,
	'sta_id'				=> $sta_id
);

echo json_encode($resType);

##################################################################################################################################################################################################################


//########################################################################################################  SPEC AC ###############################################################################################
if ($prd_id == 2) {
	$bodyColor			=	'';
	$accColor			=	'';
	$acArtSpecDesign 	=	'';
	$dimension_id		=	'';
	$acIPrdW			=	'';
	$acIPrdD			=	'';
	$acIPrdH			=	'';
	$acIPackW			=	'';
	$acIPackD			=	'';
	$acIPackH			=	'';
	$acIWN				=	'';
	$acIWG				=	'';
	$acOPrdW			=	'';
	$acOPrdD			=	'';
	$acOPrdH			=	'';
	$acOPackW			=	'';
	$acOPackD			=	'';
	$acOPackH			=	'';
	$acOWN				=	'';
	$acOWG				=	'';
	$LPD				=	'';
	$GPD				=	'';
	$container			=	'';
	$acMecSpecDesign	=	'';
	$CCTRwatt			=	'';
	$CCTRbtu			=	'';
	$RCCwatt			=	'';
	$RCCbtu				=	'';
	$EerHasil			=	'';
	$Konversi			=	'';
	$EerLabel			=	'';
	$refrigerant_id		=	'';
	$refrigerant_w		=	'';
	$compressorType		=	'';
	$compressorModel	=	'';
	$compressorBrand	=	'';
	$expansion			=	'';
	$AFV				=	'';
	$OFM				=	'';
	$FMOT				=	'';
	$condensorType		=	'';
	$evaporatorType		=	'';
	$INL				=	'';
	$ONL				=	'';
	$acCycSpecDesign	=	'';
	$acPwrSupply		=	'';
	$testDM				=	'';
	$testAM				=	'';
	$standartDM			=	'';
	$standartAM			=	'';
	$sltDP				=	'';
	$sltAP				=	'';
	$silDP				=	'';
	$silAP				=	'';
	$acEC				=	'';
	$acElecSpecDesign	=	'';
	$target_dir3		=	'_upload/artSpecDesign/AC/';
	$target_dir4		=	'_upload/mecSpecDesign/AC/';
	$target_dir5		=	'_upload/cycSpecDesign/AC/';
	$target_dir6		=	'_upload/elecSpecDesign/AC/';

	$bodyColor			=	$_POST['bodyColor'];
	$accColor			=	$_POST['accColor'];
	$dimension_id		=	$_POST['dimension_id'];
	$acIPrdW			=	$_POST['acIPrdW'];
	$acIPrdD			=	$_POST['acIPrdD'];
	$acIPrdH			=	$_POST['acIPrdH'];
	$acIPackW			=	$_POST['acIPackW'];
	$acIPackD			=	$_POST['acIPackD'];
	$acIPackH			=	$_POST['acIPackH'];
	$acIWN				=	$_POST['acIWN'];
	$acIWG				=	$_POST['acIWG'];
	$acOPrdW			=	$_POST['acOPrdW'];
	$acOPrdD			=	$_POST['acOPrdD'];
	$acOPrdH			=	$_POST['acOPrdH'];
	$acOPackW			=	$_POST['acOPackW'];
	$acOPackD			=	$_POST['acOPackD'];
	$acOPackH			=	$_POST['acOPackH'];
	$acOWN				=	$_POST['acOWN'];
	$acOWG				=	$_POST['acOWG'];
	$LPD				=	$_POST['LPD'];
	$GPD				=	$_POST['GPD'];
	$container			=	$_POST['container'];
	$CCTRwatt			=	$_POST['CCTRwatt'];
	$CCTRbtu			=	$_POST['CCTRbtu'];
	$RCCwatt			=	$_POST['RCCwatt'];
	$RCCbtu				=	$_POST['RCCbtu'];
	$EerHasil			=	$_POST['EerHasil'];
	$Konversi			=	$_POST['Konversi'];
	$EerLabel			=	$_POST['EerLabel'];
	$refrigerant_id		=	$_POST['refrigerant_id'];
	$refrigerant_w		=	$_POST['refrigerant_w'];
	$compressorType		=	$_POST['compressorType'];
	$compressorModel	=	$_POST['compressorModel'];
	$compressorBrand	=	$_POST['compressorBrand'];
	$expansion			=	$_POST['expansion'];
	$AFV				=	$_POST['AFV'];
	$OFM				=	$_POST['OFM'];
	$FMOT				=	$_POST['FMOT'];
	$condensorType		=	$_POST['condensorType'];
	$evaporatorType		=	$_POST['evaporatorType'];
	$INL				=	$_POST['INL'];
	$ONL				=	$_POST['ONL'];
	$acPwrSupply		=	$_POST['acPwrSupply'];
	$testDM				=	$_POST['testDM'];
	$testAM				=	$_POST['testAM'];
	$standartDM			=	$_POST['standartDM'];
	$standartAM			=	$_POST['standartAM'];
	$sltDP				=	$_POST['sltDP'];
	$sltAP				=	$_POST['sltAP'];
	$silDP				=	$_POST['silDP'];
	$silAP				=	$_POST['silAP'];
	$acEC				=	$_POST['acEC'];

	if (isset($_FILES['acArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$acArtSpecDesign	= $_FILES['acArtSpecDesign']['name'];
		$src3   			= $_FILES['acArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT acArtSpecDesign FROM table_specac WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['acArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $acArtSpecDesign);
				$ext = strtolower(end($x));
				$acArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.basename($acArtNew);
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $acArtSpecDesign);
				$ext = strtolower(end($x));
				$acArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.basename($acArtNew);
				move_uploaded_file($src3, $target_file3);
			}

		}

		$update_acArt		=	$DBcon->prepare("UPDATE table_specac SET acArtSpecDesign = :acArtSpecDesign WHERE type_id = :type_id ");
		$update_acArt->bindParam(':type_id', $type_id);
		$update_acArt->bindParam(':acArtSpecDesign', $acArtNew);
		$update_acArt->execute();

		$resAcArt	= array(
			'acArtSpecDesign'	=> $acArtNew
		);
	
		echo json_encode($resAcArt);
		}

	if (isset($_FILES['acMecSpecDesign']['name'])) {
		$temp_file			=	'';
		$acMecSpecDesign	= $_FILES['acMecSpecDesign']['name'];
		$src4  				= $_FILES['acMecSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT acMecSpecDesign FROM table_specac WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['acMecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $acMecSpecDesign);
				$ext = strtolower(end($x));
				$acMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.basename($acMecNew);
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $acMecSpecDesign);
				$ext = strtolower(end($x));
				$acMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.basename($acMecNew);
				move_uploaded_file($src4, $target_file4);
			}

		}

		$update_acMec		=	$DBcon->prepare("UPDATE table_specac SET acMecSpecDesign = :acMecSpecDesign WHERE type_id = :type_id ");
		$update_acMec->bindParam(':type_id', $type_id);
		$update_acMec->bindParam(':acMecSpecDesign', $acMecNew);
		$update_acMec->execute();

		$resAcMec	= array(
			'acMecSpecDesign'	=> $acMecNew
		);
	
		echo json_encode($resAcMec);
		
	}
	if (isset($_FILES['acCycSpecDesign']['name'])) {
		$temp_file			=	'';
		$acCycSpecDesign	= $_FILES['acCycSpecDesign']['name'];
		$src5  				= $_FILES['acCycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT acCycSpecDesign FROM table_specac WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['acCycSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $acCycSpecDesign);
				$ext = strtolower(end($x));
				$acCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.basename($acCycNew);
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $acCycSpecDesign);
				$ext = strtolower(end($x));
				$acCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.basename($acCycNew);
				move_uploaded_file($src5, $target_file5);
			}

		}


		$update_acCyc		=	$DBcon->prepare("UPDATE table_specac SET acCycSpecDesign = :acCycSpecDesign WHERE type_id = :type_id ");
		$update_acCyc->bindParam(':type_id', $type_id);
		$update_acCyc->bindParam(':acCycSpecDesign', $acCycNew);
		$update_acCyc->execute();

		$resAcCyc	= array(
			'acCycSpecDesign'	=> $acCycNew
		);
	
		echo json_encode($resAcCyc);
		
	}
	if (isset($_FILES['acElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$acElecSpecDesign	= $_FILES['acElecSpecDesign']['name'];
		$src6  				= $_FILES['acElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT acElecSpecDesign FROM table_specac WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['acElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $acElecSpecDesign);
				$ext = strtolower(end($x));
				$acElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;

				$target_file6 	 	= $target_dir6.basename($acElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $acElecSpecDesign);
				$ext = strtolower(end($x));
				$acElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($acElecNew);
				move_uploaded_file($src6, $target_file6);
			}

		}


		$update_acElec		=	$DBcon->prepare("UPDATE table_specac SET acElecSpecDesign = :acElecSpecDesign WHERE type_id = :type_id ");
		$update_acElec->bindParam(':type_id', $type_id);
		$update_acElec->bindParam(':acElecSpecDesign', $acElecNew);
		$update_acElec->execute();

		$resAcElec	= array(
			'acElecSpecDesign'	=> $acElecNew
		);
	
		echo json_encode($resAcElec);
		
	}

	$stmt2 = $DBcon->prepare("
		UPDATE table_specac SET bodyColor = :bodyColor , accColor = :accColor  , dimension_id = :dimension_id , acIPrdW = :acIPrdW , acIPrdD = :acIPrdD , acIPrdH = :acIPrdH , acIPackW = :acIPackW , acIPackD = :acIPackD , acIPackH = :acIPackH , acIWN = :acIWN , acIWG = :acIWG , acOPrdW = :acOPrdW , acOPrdD = :acOPrdD , acOPrdH = :acOPrdH , acOPackW = :acOPackW , acOPackD = :acOPackD , acOPackH = :acOPackH , acOWN = :acOWN , acOWG = :acOWG , LPD = :LPD , GPD = :GPD , container = :container  , CCTRwatt = :CCTRwatt , CCTRbtu = :CCTRbtu , RCCwatt = :RCCwatt , RCCbtu = :RCCbtu , EerHasil = :EerHasil , Konversi = :Konversi , EerLabel = :EerLabel , refrigerant_id = :refrigerant_id , refrigerant_w = :refrigerant_w , compressorType = :compressorType , compressorModel = :compressorModel , compressorBrand = :compressorBrand , expansion = :expansion , AFV = :AFV , OFM = :OFM , FMOT = :FMOT , condensorType = :condensorType , evaporatorType = :evaporatorType , INL = :INL , ONL = :ONL  , acPwrSupply = :acPwrSupply , testDM = :testDM , testAM = :testAM , standartDM = :standartDM , standartAM = :standartAM , sltDP = :sltDP , sltAP = :sltAP , silDP = :silDP , silAP = :silAP , acEC = :acEC 
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':bodyColor', $bodyColor);
	$stmt2->bindParam(':accColor', $accColor);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':acIPrdW', $acIPrdW);
	$stmt2->bindParam(':acIPrdD', $acIPrdD);
	$stmt2->bindParam(':acIPrdH', $acIPrdH);
	$stmt2->bindParam(':acIPackW', $acIPackW);
	$stmt2->bindParam(':acIPackD', $acIPackD);
	$stmt2->bindParam(':acIPackH', $acIPackH);
	$stmt2->bindParam(':acIWN', $acIWN);
	$stmt2->bindParam(':acIWG', $acIWG);
	$stmt2->bindParam(':acOPrdW', $acOPrdW);
	$stmt2->bindParam(':acOPrdD', $acOPrdD);
	$stmt2->bindParam(':acOPrdH', $acOPrdH);
	$stmt2->bindParam(':acOPackW', $acOPackW);
	$stmt2->bindParam(':acOPackD', $acOPackD);
	$stmt2->bindParam(':acOPackH', $acOPackH);
	$stmt2->bindParam(':acOWN', $acOWN);
	$stmt2->bindParam(':acOWG', $acOWG);
	$stmt2->bindParam(':LPD', $LPD);
	$stmt2->bindParam(':GPD', $GPD);
	$stmt2->bindParam(':container', $container);
	$stmt2->bindParam(':CCTRwatt', $CCTRwatt);
	$stmt2->bindParam(':CCTRbtu', $CCTRbtu);
	$stmt2->bindParam(':RCCwatt', $RCCwatt);
	$stmt2->bindParam(':RCCbtu', $RCCbtu);
	$stmt2->bindParam(':EerHasil', $EerHasil);
	$stmt2->bindParam(':Konversi', $Konversi);
	$stmt2->bindParam(':EerLabel', $EerLabel);
	$stmt2->bindParam(':refrigerant_id', $refrigerant_id);
	$stmt2->bindParam(':refrigerant_w', $refrigerant_w);
	$stmt2->bindParam(':compressorType', $compressorType);
	$stmt2->bindParam(':compressorModel', $compressorModel);
	$stmt2->bindParam(':compressorBrand', $compressorBrand);
	$stmt2->bindParam(':expansion', $expansion);
	$stmt2->bindParam(':AFV', $AFV);
	$stmt2->bindParam(':OFM', $OFM);
	$stmt2->bindParam(':FMOT', $FMOT);
	$stmt2->bindParam(':condensorType', $condensorType);
	$stmt2->bindParam(':evaporatorType', $evaporatorType);
	$stmt2->bindParam(':INL', $INL);
	$stmt2->bindParam(':ONL', $ONL);
	$stmt2->bindParam(':acPwrSupply', $acPwrSupply);
	$stmt2->bindParam(':testDM', $testDM);
	$stmt2->bindParam(':testAM', $testAM);
	$stmt2->bindParam(':standartDM', $standartDM);
	$stmt2->bindParam(':standartAM', $standartAM);
	$stmt2->bindParam(':sltDP', $sltDP);
	$stmt2->bindParam(':sltAP', $sltAP);
	$stmt2->bindParam(':silDP', $silDP);
	$stmt2->bindParam(':silAP', $silAP);
	$stmt2->bindParam(':acEC', $acEC);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}


	$res	=	array(

		'bodyColor'			=>	$bodyColor,
		'accColor'			=>	$accColor,
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
		'acPwrSupply'		=>	$acPwrSupply,
		'testDM'			=>	$testDM,
		'testAM'			=>	$testAM,
		'standartDM'		=>	$standartDM,
		'standartAM'		=>	$standartAM,
		'sltDP'				=>	$sltDP,
		'sltAP'				=>	$sltAP,
		'silDP'				=>	$silDP,
		'silAP'				=>	$silAP,
		'acEC'				=>	$acEC

	);


	echo json_encode($res);




//############################################################################################# SPEC CF ###############################################################################################
}else if ($prd_id == 7) {

	$bodyColor				=	'';
	$dimension_id			=	'';
	$cfPrdW					=	'';
	$cfPrdD					=	'';
	$cfPrdH					=	'';
	$cfPackW				=	'';
	$cfPackD				=	'';
	$cfPackH				=	'';
	$cfVolN					=	'';
	$cfVolG					=	'';
	$cfWeightN				=	'';
	$cfWeightG				=	'';
	$cfContainer			=	'';
	$rollbond_id			=	'';
	$rollbondtype_id		=	'';
	$temperature_id			=	'';
	$climate_id				=	'';
	$condensor_id			=	'';
	$refrigerant_id			=	'';
	$cfMoR					=	'';
	$cfRc					=	'';
	$cfRP					=	'';
	$cfCompressor			=	'';
	$cfCoolCap				=	'';
	$cfCTD					=	'';
	$cfFreezTemp			=	'';
	$cfEnergyConsumption	=	'';
	$rv_id					=	'';
	$wv_id					=	'';
	$cfRF					=	'';
	$cfRtdCur				=	'';
	$cfRtdPwr				=	'';
	$cfRPH					=	'';
	$cfArtSpecDesign		=	'';
	$cfMecSpecDesign		=	'';
	$cfCycSpecDesign		=	'';
	$cfElecSpecDesign		=	'';
	$target_dir3			=	'_upload/artSpecDesign/CF/';
	$target_dir4			=	'_upload/mecSpecDesign/CF/';
	$target_dir5			=	'_upload/cycSpecDesign/CF/';
	$target_dir6			=	'_upload/elecSpecDesign/CF/';

	$bodyColor				=	$_POST['bodyColor'];
	$dimension_id			=	$_POST['dimension_id'];
	$cfPrdW					=	$_POST['cfPrdW'];
	$cfPrdD					=	$_POST['cfPrdD'];
	$cfPrdH					=	$_POST['cfPrdH'];
	$cfPackW				=	$_POST['cfPackW'];
	$cfPackD				=	$_POST['cfPackD'];
	$cfPackH				=	$_POST['cfPackH'];
	$cfVolN					=	$_POST['cfVolN'];
	$cfVolG					=	$_POST['cfVolG'];
	$cfWeightN				=	$_POST['cfWeightN'];
	$cfWeightG				=	$_POST['cfWeightG'];
	$cfContainer			=	$_POST['cfContainer'];
	$rollbond_id			=	$_POST['rollbond_id'];
	$rollbondtype_id		=	$_POST['rollbondtype_id'];
	$temperature_id			=	$_POST['temperature_id'];
	$climate_id				=	$_POST['climate_id'];
	$condensor_id			=	$_POST['condensor_id'];
	$refrigerant_id			=	$_POST['refrigerant_id'];
	$cfMoR					=	$_POST['cfMoR'];
	$cfRc					=	$_POST['cfRc'];
	$cfRP					=	$_POST['cfRP'];
	$cfCompressor			=	$_POST['cfCompressor'];
	$cfCoolCap				=	$_POST['cfCoolCap'];
	$cfCTD					=	$_POST['cfCTD'];
	$cfFreezTemp			=	$_POST['cfFreezTemp'];
	$cfEnergyConsumption	=	$_POST['cfEnergyConsumption'];
	$rv_id					=	$_POST['rv_id'];
	$wv_id					=	$_POST['wv_id'];
	$cfRF					=	$_POST['cfRF'];
	$cfRtdCur				=	$_POST['cfRtdCur'];
	$cfRtdPwr				=	$_POST['cfRtdPwr'];
	$cfRPH					=	$_POST['cfRPH'];

	if (isset($_FILES['cfArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$cfArtSpecDesign	= $_FILES['cfArtSpecDesign']['name'];
		$src3   			= $_FILES['cfArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT cfArtSpecDesign FROM table_speccf WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['cfArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $cfArtSpecDesign);
				$ext = strtolower(end($x));
				$cfArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.$cfArtNew;
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $cfArtSpecDesign);
				$ext = strtolower(end($x));
				$cfArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.$cfArtNew;
				move_uploaded_file($src3, $target_file3);
			}

		}


		$update_cfArt	=	$DBcon->prepare("UPDATE table_speccf SET cfArtSpecDesign = :cfArtSpecDesign WHERE type_id = :type_id ");
		$update_cfArt->bindParam(':type_id', $type_id);
		$update_cfArt->bindParam(':cfArtSpecDesign', basename($cfArtNew));
		$update_cfArt->execute();

		$resCfArt	= array(
			'cfArtSpecDesign'	=> $cfArtNew
		);
	
		echo json_encode($resCfArt);
		
	}
	if (isset($_FILES['cfMecSpecDesign']['name'])) {
		$temp_file			=	'';
		$cfMecSpecDesign	= $_FILES['cfMecSpecDesign']['name'];
		$src4  				= $_FILES['cfMecSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT cfMecSpecDesign FROM table_speccf WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['cfMecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $cfMecSpecDesign);
				$ext = strtolower(end($x));
				$cfMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.basename($cfMecNew);
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $cfMecSpecDesign);
				$ext = strtolower(end($x));
				$cfMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.basename($cfMecNew);
				move_uploaded_file($src4, $target_file4);
			}

		}


		$update_acMec	=	$DBcon->prepare("UPDATE table_speccf SET cfMecSpecDesign = :cfMecSpecDesign WHERE type_id = :type_id ");
		$update_acMec->bindParam(':type_id', $type_id);
		$update_acMec->bindParam(':cfMecSpecDesign', $cfMecNew);
		$update_acMec->execute();

		$resCfMec	= array(
			'cfMecSpecDesign'	=> $cfMecNew
		);
	
		echo json_encode($resCfMec);
		
	}
	if (isset($_FILES['cfCycSpecDesign']['name'])) {
		$temp_file			=	'';
		$cfCycSpecDesign	= $_FILES['cfCycSpecDesign']['name'];
		$src5  				= $_FILES['cfCycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT cfCycSpecDesign FROM table_speccf WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['cfCycSpecDesign'];

			if ($temp_file == '') {

				$x 	 = explode('.', $cfCycSpecDesign);
				$ext = strtolower(end($x));
				$cfCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.basename($cfCycNew);
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $cfCycSpecDesign);
				$ext = strtolower(end($x));
				$cfCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.basename($cfCycNew);
				move_uploaded_file($src5, $target_file5);
			}

		}


		$update_acCyc	=	$DBcon->prepare("UPDATE table_speccf SET cfCycSpecDesign = :cfCycSpecDesign WHERE type_id = :type_id ");
		$update_acCyc->bindParam(':type_id', $type_id);
		$update_acCyc->bindParam(':cfCycSpecDesign', $cfCycNew);
		$update_acCyc->execute();

		$resCfCyc	= array(
			'cfCycSpecDesign'	=> $cfCycNew
		);
	
		echo json_encode($resCfCyc);
		
	}
	if (isset($_FILES['cfElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$cfElecSpecDesign	= $_FILES['cfElecSpecDesign']['name'];
		$src6  				= $_FILES['cfElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT cfElecSpecDesign FROM table_speccf WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['cfElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $cfElecSpecDesign);
				$ext = strtolower(end($x));
				$cfElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($cfElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $cfElecSpecDesign);
				$ext = strtolower(end($x));
				$cfElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($cfElecNew);
				move_uploaded_file($src6, $target_file6);
			}

		}


		$update_acElec	=	$DBcon->prepare("UPDATE table_speccf SET cfElecSpecDesign = :cfElecSpecDesign WHERE type_id = :type_id ");
		$update_acElec->bindParam(':type_id', $type_id);
		$update_acElec->bindParam(':cfElecSpecDesign', $cfElecNew);
		$update_acElec->execute();

		$resCfElec	= array(
			'cfElecSpecDesign'	=> $cfElecNew
		);
	
		echo json_encode($resCfElec);
		
	}

	$stmt2 = $DBcon->prepare("
		UPDATE table_speccf SET bodyColor = :bodyColor , dimension_id = :dimension_id , cfPrdW = :cfPrdW , cfPrdD = :cfPrdD , cfPrdH = :cfPrdH , cfPackW = :cfPackW , cfPackD = :cfPackD , cfPackH = :cfPackH , cfVolN = :cfVolN , cfVolG = :cfVolG , cfWeightN = :cfWeightN , cfWeightG = :cfWeightG , cfContainer = :cfContainer , rollbond_id = :rollbond_id , rollbondtype_id = :rollbondtype_id , temperature_id = :temperature_id , climate_id = :climate_id , condensor_id = :condensor_id , refrigerant_id = :refrigerant_id , cfMoR = :cfMoR , cfRc = :cfRc , cfRP = :cfRP , cfCompressor = :cfCompressor , cfCoolCap = :cfCoolCap , cfCTD = :cfCTD , cfFreezTemp = :cfFreezTemp , cfEnergyConsumption = :cfEnergyConsumption , rv_id = :rv_id , wv_id = :wv_id , cfRF = :cfRF , cfRtdCur = :cfRtdCur , cfRtdPwr = :cfRtdPwr , cfRPH = :cfRPH
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':bodyColor', $bodyColor);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':cfPrdW', $cfPrdW);
	$stmt2->bindParam(':cfPrdD', $cfPrdD);
	$stmt2->bindParam(':cfPrdH', $cfPrdH);
	$stmt2->bindParam(':cfPackW', $cfPackW);
	$stmt2->bindParam(':cfPackD', $cfPackD);
	$stmt2->bindParam(':cfPackH', $cfPackH);
	$stmt2->bindParam(':cfVolN', $cfVolN);
	$stmt2->bindParam(':cfVolG', $cfVolG);
	$stmt2->bindParam(':cfWeightN', $cfWeightN);
	$stmt2->bindParam(':cfWeightG', $cfWeightG);
	$stmt2->bindParam(':cfContainer', $cfContainer);
	$stmt2->bindParam(':rollbond_id', $rollbond_id);
	$stmt2->bindParam(':rollbondtype_id', $rollbondtype_id);
	$stmt2->bindParam(':temperature_id', $temperature_id);
	$stmt2->bindParam(':climate_id', $climate_id);
	$stmt2->bindParam(':condensor_id', $condensor_id);
	$stmt2->bindParam(':refrigerant_id', $refrigerant_id);
	$stmt2->bindParam(':cfMoR', $cfMoR);
	$stmt2->bindParam(':cfRc', $cfRc);
	$stmt2->bindParam(':cfRP', $cfRP);
	$stmt2->bindParam(':cfCompressor', $cfCompressor);
	$stmt2->bindParam(':cfCoolCap', $cfCoolCap);
	$stmt2->bindParam(':cfCTD', $cfCTD);
	$stmt2->bindParam(':cfFreezTemp', $cfFreezTemp);
	$stmt2->bindParam(':cfEnergyConsumption', $cfEnergyConsumption);
	$stmt2->bindParam(':rv_id', $rv_id);
	$stmt2->bindParam(':wv_id', $wv_id);
	$stmt2->bindParam(':cfRF', $cfRF);
	$stmt2->bindParam(':cfRtdCur', $cfRtdCur);
	$stmt2->bindParam(':cfRtdPwr', $cfRtdPwr);
	$stmt2->bindParam(':cfRPH', $cfRPH);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}

	$res = array(

		'bodyColor'				=>	$bodyColor,
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
		'rv_id'					=>	$rv_id,
		'wv_id'					=>	$wv_id,
		'cfRF'					=>	$cfRF,
		'cfRtdCur'				=>	$cfRtdCur,
		'cfRtdPwr'				=>	$cfRtdPwr,
		'cfRPH'					=>	$cfRPH,

		'fea_id'				=> $fea_id
	);

	echo json_encode($res);

//#############################################################################################  SPEC RF ###############################################################################################
}else if ($prd_id == 1) {
	$color_id				=	'';
	$pattern_id				=	'';
	$finishing_id			=	'';
	$dLinerMaterial			=	'';
	$dInteriorMateri		=	'';
	$dStamping				=	'';
	$dEggPocket				=	'';
	$dEggHolder				=	'';
	$dUtilityPocket			=	'';
	$dBottlePocket			=	'';
	$cColor					=	'';
	$cSidePanelMat			=	'';
	$aHandle				=	'';
	$handle_id				=	'';
	$aBaseboard				=	'';
	$aWaterdispenser		=	'';
	$rack_id				=	'';
	$aIceTwistTray			=	'';
	$aIceBank				=	'';
	$aIceTray				=	'';
	$aFrezzerPocket			=	'';
	$aLamp					=	'';
	$aChiller				=	'';
	$aShelf					=	'';
	$aSheildedMoist			=	'';
	$aCrisper				=	'';
	$dimension_id			=	'';
	$mechProdW				=	'';
	$mechProdL				=	'';
	$mechProdH				=	'';
	$mechPackW				=	'';
	$mechPackL				=	'';
	$mechPackH				=	'';
	$packing_id				=	'';
	$mechVolN				=	'';
	$mechVolG				=	'';
	$mechWeightN			=	'';
	$mechWeightG			=	'';
	$mechContainer			=	'';
	$rollbond_id			=	'';
	$rollbondtype_id		=	'';
	$temperature_id			=	'';
	$cycDripTray			=	'';
	$climate_id				=	'';
	$condensor_id			=	'';
	$refrigerant_id			=	'';
	$cycMoR					=	'';
	$cycRatedCurrent		=	'';
	$cycRatedPower			=	'';
	$cycCompressor			=	'';
	$cycCoolingCapacity		=	'';
	$cycCapillaryTube		=	'';
	$cycFreezingTemp		=	'';
	$cycEnergyConsumption	=	'';
	$rv_id					=	'';
	$wv_id					=	'';
	$elecRF					=	'';
	$elecRC					=	'';
	$elecRP					=	'';
	$elecRPH				=	'';
	$elecMaxLamp			=	'';
	$ArtSpecDesign 			=	'';
	$MechSpecDesign 		=	'';
	$CycSpecDesign 			=	'';
	$ElecSpecDesign 		=	'';
	$target_dir3			=	'_upload/artSpecDesign/RF/';
	$target_dir4			=	'_upload/mecSpecDesign/RF/';
	$target_dir5			=	'_upload/cycSpecDesign/RF/';
	$target_dir6			=	'_upload/elecSpecDesign/RF/';

	$color_id				=	$_POST['color_id'];
	$pattern_id				=	$_POST['pattern_id'];
	$finishing_id			=	$_POST['finishing_id'];
	$dLinerMaterial			=	$_POST['dLinerMaterial'];
	$dInteriorMateri		=	$_POST['dInteriorMateri'];
	$dStamping				=	$_POST['dStamping'];
	$dEggPocket				=	$_POST['dEggPocket'];
	$dEggHolder				=	$_POST['dEggHolder'];
	$dUtilityPocket			=	$_POST['dUtilityPocket'];
	$dBottlePocket			=	$_POST['dBottlePocket'];
	$cColor					=	$_POST['cColor'];
	$cSidePanelMat			=	$_POST['cSidePanelMat'];
	$aHandle				=	$_POST['aHandle'];
	$handle_id				=	$_POST['handle_id'];
	$aBaseboard				=	$_POST['aBaseboard'];
	$aWaterdispenser		=	$_POST['aWaterdispenser'];
	$rack_id				=	$_POST['rack_id'];
	$aIceTwistTray			=	$_POST['aIceTwistTray'];
	$aIceBank				=	$_POST['aIceBank'];
	$aIceTray				=	$_POST['aIceTray'];
	$aFrezzerPocket			=	$_POST['aFrezzerPocket'];
	$aLamp					=	$_POST['aLamp'];
	$aChiller				=	$_POST['aChiller'];
	$aShelf					=	$_POST['aShelf'];
	$aSheildedMoist			=	$_POST['aSheildedMoist'];
	$aCrisper				=	$_POST['aCrisper'];
	$dimension_id			=	$_POST['dimension_id'];
	$mechProdW				=	$_POST['mechProdW'];
	$mechProdL				=	$_POST['mechProdL'];
	$mechProdH				=	$_POST['mechProdH'];
	$mechPackW				=	$_POST['mechPackW'];
	$mechPackL				=	$_POST['mechPackL'];
	$mechPackH				=	$_POST['mechPackH'];
	$packing_id				=	$_POST['packing_id'];
	$mechVolNet				=	$_POST['mechVolNet'];
	$mechVolGros			=	$_POST['mechVolGros'];
	$mechWeightNet			=	$_POST['mechWeightNet'];
	$mechWeightGros			=	$_POST['mechWeightGros'];
	$mechContainer			=	$_POST['mechContainer'];
	$rollbond_id			=	$_POST['rollbond_id'];
	$rollbondtype_id		=	$_POST['rollbondtype_id'];
	$temperature_id			=	$_POST['temperature_id'];
	$cycDripTray			=	$_POST['cycDripTray'];
	$climate_id				=	$_POST['climate_id'];
	$condensor_id			=	$_POST['condensor_id'];
	$refrigerant_id			=	$_POST['refrigerant_id'];
	$cycMoR					=	$_POST['cycMoR'];
	$cycRatedCurrent		=	$_POST['cycRatedCurrent'];
	$cycRatedPower			=	$_POST['cycRatedPower'];
	$cycCompressor			=	$_POST['cycCompressor'];
	$cycCoolingCapacity		=	$_POST['cycCoolingCapacity'];
	$cycCapillaryTube		=	$_POST['cycCapillaryTube'];
	$cycFreezingTemp		=	$_POST['cycFreezingTemp'];
	$cycEnergyConsumption	=	$_POST['cycEnergyConsumption'];
	$rv_id					=	$_POST['rv_id'];
	$wv_id					=	$_POST['wv_id'];
	$elecRF					=	$_POST['elecRF'];
	$elecRC					=	$_POST['elecRC'];
	$elecRP					=	$_POST['elecRP'];
	$elecRPH				=	$_POST['elecRPH'];
	$elecMaxLamp			=	$_POST['elecMaxLamp'];

	if (isset($_FILES['ArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$ArtSpecDesign		= $_FILES['ArtSpecDesign']['name'];
		$src3   			= $_FILES['ArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT ArtSpecDesign FROM table_specrf WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['ArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $ArtSpecDesign);
				$ext = strtolower(end($x));
				$rfArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.basename($rfArtNew);
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $ArtSpecDesign);
				$ext = strtolower(end($x));
				$rfArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.basename($rfArtNew);
				move_uploaded_file($src3, $target_file3);
			}

		}

		$update_rfArt	=	$DBcon->prepare("UPDATE table_specrf SET ArtSpecDesign = :ArtSpecDesign WHERE type_id = :type_id ");
		$update_rfArt->bindParam(':type_id', $type_id);
		$update_rfArt->bindParam(':ArtSpecDesign', $rfArtNew);
		$update_rfArt->execute();

		$resRfArt	= array(
			'rfArtSpecDesign'	=> $rfArtNew
		);
	
		echo json_encode($resRfArt);
		
	}
	if (isset($_FILES['MechSpecDesign']['name'])) {
		$temp_file			=	'';
		$MechSpecDesign		= $_FILES['MechSpecDesign']['name'];
		$src4  				= $_FILES['MechSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT MechSpecDesign FROM table_specrf WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['MechSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $MechSpecDesign);
				$ext = strtolower(end($x));
				$rfMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.basename($rfMecNew);
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $MechSpecDesign);
				$ext = strtolower(end($x));
				$rfMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.basename($rfMecNew);
				move_uploaded_file($src4, $target_file4);

			}

		}

		$update_rfMec	=	$DBcon->prepare("UPDATE table_specrf SET MechSpecDesign = :MechSpecDesign WHERE type_id = :type_id ");
		$update_rfMec->bindParam(':type_id', $type_id);
		$update_rfMec->bindParam(':MechSpecDesign', $rfMecNew);
		$update_rfMec->execute();

		$resRfMec	= array(
			'rfMecSpecDesign'	=> $rfMecNew
		);
	
		echo json_encode($resRfMec);
		
	}
	if (isset($_FILES['CycSpecDesign']['name'])) {
		$temp_file			=	'';
		$CycSpecDesign		= $_FILES['CycSpecDesign']['name'];
		$src5  				= $_FILES['CycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT CycSpecDesign FROM table_specrf WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['CycSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $CycSpecDesign);
				$ext = strtolower(end($x));
				$rfCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.basename($rfCycNew);
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $CycSpecDesign);
				$ext = strtolower(end($x));
				$rfCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.basename($rfCycNew);
				move_uploaded_file($src5, $target_file5);
			}

		}

		$update_rfCyc	=	$DBcon->prepare("UPDATE table_specrf SET CycSpecDesign = :CycSpecDesign WHERE type_id = :type_id ");
		$update_rfCyc->bindParam(':type_id', $type_id);
		$update_rfCyc->bindParam(':CycSpecDesign', $rfCycNew);
		$update_rfCyc->execute();

		$resRfCyc	= array(
			'rfCycSpecDesign'	=> $rfCycNew
		);
	
		echo json_encode($resRfCyc);
		
	}
	if (isset($_FILES['ElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$ElecSpecDesign		= $_FILES['ElecSpecDesign']['name'];
		$src6  				= $_FILES['ElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT ElecSpecDesign FROM table_specrf WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['ElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $ElecSpecDesign);
				$ext = strtolower(end($x));
				$rfElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;

				$target_file6 	 	= $target_dir6.basename($rfElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $ElecSpecDesign);
				$ext = strtolower(end($x));
				$rfElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($rfElecNew);
				move_uploaded_file($src6, $target_file6);
			}

		}


		$update_rfElec	=	$DBcon->prepare("UPDATE table_specrf SET ElecSpecDesign = :ElecSpecDesign WHERE type_id = :type_id ");
		$update_rfElec->bindParam(':type_id', $type_id);
		$update_rfElec->bindParam(':ElecSpecDesign', $rfElecNew);
		$update_rfElec->execute();

		$resRfElec	= array(
			'rfElecSpecDesign'	=> $rfElecNew
		);
	
		echo json_encode($resRfElec);
		
	}

	$stmt2 = $DBcon->prepare("
		UPDATE table_specrf SET type_id = :type_id, color_id = :color_id, pattern_id = :pattern_id, finishing_id = :finishing_id, dLinerMaterial = :dLinerMaterial, dInteriorMateri = :dInteriorMateri, dStamping = :dStamping, dEggPocket = :dEggPocket, dEggHolder = :dEggHolder, dUtilityPocket = :dUtilityPocket, dBottlePocket = :dBottlePocket, cColor = :cColor, cSidePanelMat = :cSidePanelMat, aHandle = :aHandle, handle_id = :handle_id, aBaseboard = :aBaseboard, aWaterdispenser = :aWaterdispenser, rack_id = :rack_id, aIceTwistTray = :aIceTwistTray, aIceBank = :aIceBank, aIceTray = :aIceTray, aFrezzerPocket = :aFrezzerPocket, aLamp = :aLamp, aChiller = :aChiller, aShelf = :aShelf, aSheildedMoist = :aSheildedMoist, aCrisper = :aCrisper, dimension_id = :dimension_id, mechProdW = :mechProdW, mechProdL = :mechProdL, mechProdH = :mechProdH, mechPackW = :mechPackW, mechPackL = :mechPackL, mechPackH = :mechPackH, packing_id = :packing_id, mechVolNet = :mechVolNet, mechVolGros = :mechVolGros, mechWeightNet = :mechWeightNet, mechWeightGros = :mechWeightGros, mechContainer = :mechContainer, rollbond_id = :rollbond_id, rollbondtype_id = :rollbondtype_id, temperature_id = :temperature_id, cycDripTray = :cycDripTray, climate_id = :climate_id, condensor_id = :condensor_id, refrigerant_id = :refrigerant_id, cycMoR = :cycMoR, cycRatedCurrent = :cycRatedCurrent, cycRatedPower = :cycRatedPower, cycCompressor = :cycCompressor, cycCoolingCapacity = :cycCoolingCapacity, cycCapillaryTube = :cycCapillaryTube, cycFreezingTemp = :cycFreezingTemp, cycEnergyConsumption = :cycEnergyConsumption, rv_id = :rv_id, wv_id = :wv_id, elecRF = :elecRF, elecRC = :elecRC, elecRP = :elecRP, elecRPH = :elecRPH, elecMaxLamp = :elecMaxLamp
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':color_id', $color_id);
	$stmt2->bindParam(':pattern_id', $pattern_id);
	$stmt2->bindParam(':finishing_id', $finishing_id);
	$stmt2->bindParam(':dLinerMaterial', $dLinerMaterial);
	$stmt2->bindParam(':dInteriorMateri', $dInteriorMateri);
	$stmt2->bindParam(':dStamping', $dStamping);
	$stmt2->bindParam(':dEggPocket', $dEggPocket);
	$stmt2->bindParam(':dEggHolder', $dEggHolder);
	$stmt2->bindParam(':dUtilityPocket', $dUtilityPocket);
	$stmt2->bindParam(':dBottlePocket', $dBottlePocket);
	$stmt2->bindParam(':cColor', $cColor);
	$stmt2->bindParam(':cSidePanelMat', $cSidePanelMat);
	$stmt2->bindParam(':aHandle', $aHandle);
	$stmt2->bindParam(':handle_id', $handle_id);
	$stmt2->bindParam(':aBaseboard', $aBaseboard);
	$stmt2->bindParam(':aWaterdispenser', $aWaterdispenser);
	$stmt2->bindParam(':rack_id', $rack_id);
	$stmt2->bindParam(':aIceTwistTray', $aIceTwistTray);
	$stmt2->bindParam(':aIceBank', $aIceBank);
	$stmt2->bindParam(':aIceTray', $aIceTray);
	$stmt2->bindParam(':aFrezzerPocket', $aFrezzerPocket);
	$stmt2->bindParam(':aLamp', $aLamp);
	$stmt2->bindParam(':aChiller', $aChiller);
	$stmt2->bindParam(':aShelf', $aShelf);
	$stmt2->bindParam(':aSheildedMoist', $aSheildedMoist);
	$stmt2->bindParam(':aCrisper', $aCrisper);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':mechProdW', $mechProdW);
	$stmt2->bindParam(':mechProdL', $mechProdL);
	$stmt2->bindParam(':mechProdH', $mechProdH);
	$stmt2->bindParam(':mechPackW', $mechPackW);
	$stmt2->bindParam(':mechPackL', $mechPackL);
	$stmt2->bindParam(':mechPackH', $mechPackH);
	$stmt2->bindParam(':packing_id', $packing_id);
	$stmt2->bindParam(':mechVolNet', $mechVolNet);
	$stmt2->bindParam(':mechVolGros', $mechVolGros);
	$stmt2->bindParam(':mechWeightNet', $mechWeightNet);
	$stmt2->bindParam(':mechWeightGros', $mechWeightGros);
	$stmt2->bindParam(':mechContainer', $mechContainer);
	$stmt2->bindParam(':rollbond_id', $rollbond_id);
	$stmt2->bindParam(':rollbondtype_id', $rollbondtype_id);
	$stmt2->bindParam(':temperature_id', $temperature_id);
	$stmt2->bindParam(':cycDripTray', $cycDripTray);
	$stmt2->bindParam(':climate_id', $climate_id);
	$stmt2->bindParam(':condensor_id', $condensor_id);
	$stmt2->bindParam(':refrigerant_id', $refrigerant_id);
	$stmt2->bindParam(':cycMoR', $cycMoR);
	$stmt2->bindParam(':cycRatedCurrent', $cycRatedCurrent);
	$stmt2->bindParam(':cycRatedPower', $cycRatedPower);
	$stmt2->bindParam(':cycCompressor', $cycCompressor);
	$stmt2->bindParam(':cycCoolingCapacity', $cycCoolingCapacity);
	$stmt2->bindParam(':cycCapillaryTube', $cycCapillaryTube);
	$stmt2->bindParam(':cycFreezingTemp', $cycFreezingTemp);
	$stmt2->bindParam(':cycEnergyConsumption', $cycEnergyConsumption);
	$stmt2->bindParam(':rv_id', $rv_id);
	$stmt2->bindParam(':wv_id', $wv_id);
	$stmt2->bindParam(':elecRF', $elecRF);
	$stmt2->bindParam(':elecRC', $elecRC);
	$stmt2->bindParam(':elecRP', $elecRP);
	$stmt2->bindParam(':elecRPH', $elecRPH);
	$stmt2->bindParam(':elecMaxLamp', $elecMaxLamp);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}

	$res = array(
		'color_id'				=>	$color_id,
		'pattern_id'			=>	$pattern_id,
		'finishing_id'			=>	$finishing_id,
		'dLinerMaterial'		=>	$dLinerMaterial,
		'dInteriorMateri'		=>	$dInteriorMateri,
		'dStamping'				=>	$dStamping,
		'dEggPocket'			=>	$dEggPocket,
		'dEggHolder'			=>	$dEggHolder,
		'dUtilityPocket'		=>	$dUtilityPocket,
		'dBottlePocket'			=>	$dBottlePocket,
		'cColor'				=>	$cColor,
		'cSidePanelMat'			=>	$cSidePanelMat,
		'aHandle'				=>	$aHandle,
		'handle_id'				=>	$handle_id,
		'aBaseboard'			=>	$aBaseboard,
		'aWaterdispenser'		=>	$aWaterdispenser,
		'rack_id'				=>	$rack_id,
		'aIceTwistTray'			=>	$aIceTwistTray,
		'aIceBank'				=>	$aIceBank,
		'aIceTray'				=>	$aIceTray,
		'aFrezzerPocket'		=>	$aFrezzerPocket,
		'aLamp'					=>	$aLamp,
		'aChiller'				=>	$aChiller,
		'aShelf'				=>	$aShelf,
		'aSheildedMoist'		=>	$aSheildedMoist,
		'aCrisper'				=>	$aCrisper,
		'dimension_id'			=>	$dimension_id,
		'mechProdW'				=>	$mechProdW,
		'mechProdL'				=>	$mechProdL,
		'mechProdH'				=>	$mechProdH,
		'mechPackW'				=>	$mechPackW,
		'mechPackL'				=>	$mechPackL,
		'mechPackH'				=>	$mechPackH,
		'packing_id'			=>	$packing_id,
		'mechVolN'				=>	$mechVolN,
		'mechVolG'				=>	$mechVolG,
		'mechWeightN'			=>	$mechWeightN,
		'mechWeightG'			=>	$mechWeightG,
		'MechSpecDesign	'		=>	$rfMecNew,
		'rollbond_id'			=>	$rollbond_id,
		'rollbondtype_id'		=>	$rollbondtype_id,
		'temperature_id'		=>	$temperature_id,
		'cycDripTray'			=>	$cycDripTray,
		'climate_id'			=>	$climate_id,
		'condensor_id'			=>	$condensor_id,
		'refrigerant_id'		=>	$refrigerant_id,
		'cycMoR'				=>	$cycMoR,
		'cycRatedCurrent'		=>	$cycRatedCurrent,
		'cycRatedPower'			=>	$cycRatedPower,
		'cycCompressor'			=>	$cycCompressor,
		'cycCoolingCapacity'	=>	$cycCoolingCapacity,
		'cycCapillaryTube'		=>	$cycCapillaryTube,
		'cycFreezingTemp'		=>	$cycFreezingTemp,
		'cycEnergyConsumption'	=>	$cycEnergyConsumption,
		'rv_id'					=>	$rv_id,
		'wv_id'					=>	$wv_id,
		'elecRF'				=>	$elecRF,
		'elecRC'				=>	$elecRC,
		'elecRP'				=>	$elecRP,
		'elecRPH'				=>	$elecRPH,
		'elecMaxLamp'			=>	$elecMaxLamp,

		'fea_id'	=> $fea_id
	);
	echo json_encode($res);

//#######################################################################################################  SPEC SC ###############################################################################################
}else if ($prd_id == 3) {
	$color_id			= 	'';
	$scHandle			= 	'';
	$rack_id			= 	'';
	$NoR				= 	'';
	$dimension_id		= 	'';
	$scPrdW				= 	'';
	$scPrdD				= 	'';
	$scPrdH				= 	'';
	$scPackW			= 	'';
	$scPackD			= 	'';
	$scPackH			= 	'';
	$scVolN				= 	'';
	$scVolG				= 	'';
	$scWeightN			= 	'';
	$scWeightG			= 	'';
	$scContainer		= 	'';
	$rollbond_id		= 	'';
	$rollbondtype_id	= 	'';
	$climate_id			= 	'';
	$condensor_id		= 	'';
	$refrigerant_id		= 	'';
	$scMoR				= 	'';
	$scRC				= 	'';
	$scRP				= 	'';
	$scCompressor		= 	'';
	$scCoolCap			= 	'';
	$scCTD				= 	'';
	$scFreezTemp		= 	'';
	$scEC				= 	'';
	$rv_id				= 	'';
	$wv_id				= 	'';
	$scRF				= 	'';
	$scRtdCurr			= 	'';
	$scRtdPwr			= 	'';
	$scRML				= 	'';
	$scArtSpecDesign 	= 	'';
	$scMecSpecDesign 	= 	'';
	$scCycSpecDesign	= 	'';
	$scElecSpecDesign 	= 	'';
	$target_dir3		=	'_upload/artSpecDesign/SC/';
	$target_dir4		=	'_upload/mecSpecDesign/SC/';
	$target_dir5		=	'_upload/cycSpecDesign/SC/';
	$target_dir6		=	'_upload/elecSpecDesign/SC/';

	$color_id			=	$_POST['color_id'];
	$scHandle			=	$_POST['scHandle'];
	$rack_id			=	$_POST['rack_id'];
	$NoR				=	$_POST['NoR'];
	$dimension_id		=	$_POST['dimension_id'];
	$scPrdW				=	$_POST['scPrdW'];
	$scPrdD				=	$_POST['scPrdD'];
	$scPrdH				=	$_POST['scPrdH'];
	$scPackW			=	$_POST['scPackW'];
	$scPackD			=	$_POST['scPackD'];
	$scPackH			=	$_POST['scPackH'];
	$scVolN				=	$_POST['scVolN'];
	$scVolG				=	$_POST['scVolG'];
	$scWeightN			=	$_POST['scWeightN'];
	$scWeightG			=	$_POST['scWeightG'];
	$scContainer		=	$_POST['scContainer'];
	$rollbond_id		=	$_POST['rollbond_id'];
	$rollbondtype_id	=	$_POST['rollbondtype_id'];
	$climate_id			=	$_POST['climate_id'];
	$condensor_id		=	$_POST['condensor_id'];
	$refrigerant_id		=	$_POST['refrigerant_id'];
	$scMoR				=	$_POST['scMoR'];
	$scRC				=	$_POST['scRC'];
	$scRP				=	$_POST['scRP'];
	$scCompressor		=	$_POST['scCompressor'];
	$scCoolCap			=	$_POST['scCoolCap'];
	$scCTD				=	$_POST['scCTD'];
	$scFreezTemp		=	$_POST['scFreezTemp'];
	$scEC				=	$_POST['scEC'];
	$rv_id				=	$_POST['rv_id'];
	$wv_id				=	$_POST['wv_id'];
	$scRF				=	$_POST['scRF'];
	$scRtdCurr			=	$_POST['scRtdCurr'];
	$scRtdPwr			=	$_POST['scRtdPwr'];
	$scRML				=	$_POST['scRML'];

	if (isset($_FILES['scArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$scArtSpecDesign	= $_FILES['scArtSpecDesign']['name'];
		$src3   			= $_FILES['scArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT scArtSpecDesign FROM table_specsc WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['scArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $scArtSpecDesign);
				$ext = strtolower(end($x));
				$scArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.basename($scArtNew);
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $scArtSpecDesign);
				$ext = strtolower(end($x));
				$scArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.basename($scArtNew);
				move_uploaded_file($src3, $target_file3);

			}

		}

		$update_scArt	=	$DBcon->prepare("UPDATE table_specsc SET scArtSpecDesign = :scArtSpecDesign WHERE type_id = :type_id ");
		$update_scArt->bindParam(':type_id', $type_id);
		$update_scArt->bindParam(':scArtSpecDesign', $scArtNew);
		$update_scArt->execute();

		$resScArt	= array(
			'scArtSpecDesign'	=> $scArtNew
		);
	
		echo json_encode($resScArt);
		
	}
	if (isset($_FILES['scMecSpecDesign']['name'])) {
		$temp_file			=	'';
		$scMecSpecDesign	= $_FILES['scMecSpecDesign']['name'];
		$src4  				= $_FILES['scMecSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT scMecSpecDesign FROM table_specsc WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['scMecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $scMecSpecDesign);
				$ext = strtolower(end($x));
				$scMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.basename($scMecNew);
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $scMecSpecDesign);
				$ext = strtolower(end($x));
				$scMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.basename($scMecNew);
				move_uploaded_file($src4, $target_file4);
			}

		}


		$update_scMec	=	$DBcon->prepare("UPDATE table_specsc SET scMecSpecDesign = :scMecSpecDesign WHERE type_id = :type_id ");
		$update_scMec->bindParam(':type_id', $type_id);
		$update_scMec->bindParam(':scMecSpecDesign', $scMecNew);
		$update_scMec->execute();

		$resScMec	= array(
			'scMecSpecDesign'	=> $scMecNew
		);
	
		echo json_encode($resScMec);
		
	}
	if (isset($_FILES['scCycSpecDesign']['name'])) {
		$temp_file			=	'';
		$scCycSpecDesign	= $_FILES['scCycSpecDesign']['name'];
		$src5  				= $_FILES['scCycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT scCycSpecDesign FROM table_specsc WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['scCycSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $scCycSpecDesign);
				$ext = strtolower(end($x));
				$scCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.basename($scCycNew);
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $scCycSpecDesign);
				$ext = strtolower(end($x));
				$scCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.basename($scCycNew);
				move_uploaded_file($src5, $target_file5);
			}

		}


		$update_scCyc	=	$DBcon->prepare("UPDATE table_specsc SET scCycSpecDesign = :scCycSpecDesign WHERE type_id = :type_id ");
		$update_scCyc->bindParam(':type_id', $type_id);
		$update_scCyc->bindParam(':scCycSpecDesign', $scCycNew);
		$update_scCyc->execute();

		$resScCyc	= array(
			'scCycSpecDesign'	=> $scCycNew
		);
	
		echo json_encode($resScCyc);
		
	}
	if (isset($_FILES['scElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$scElecSpecDesign	= $_FILES['scElecSpecDesign']['name'];
		$src6  				= $_FILES['scElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT scElecSpecDesign FROM table_specsc WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['scElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $scElecSpecDesign);
				$ext = strtolower(end($x));
				$scElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;

				$target_file6 	 	= $target_dir6.basename($scElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $scElecSpecDesign);
				$ext = strtolower(end($x));
				$scElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($scElecNew);
				move_uploaded_file($src6, $target_file6);
			}

		}


		$update_scElec	=	$DBcon->prepare("UPDATE table_specsc SET scElecSpecDesign = :scElecSpecDesign WHERE type_id = :type_id ");
		$update_scElec->bindParam(':type_id', $type_id);
		$update_scElec->bindParam(':scElecSpecDesign', $scElecNew);
		$update_scElec->execute();

		$resScElec	= array(
			'scElecSpecDesign'	=> $scElecNew
		);
	
		echo json_encode($resScElec);
		
	}


	$stmt2 = $DBcon->prepare("
		UPDATE table_specsc SET color_id = :color_id, scHandle = :scHandle, rack_id = :rack_id, NoR = :NoR, dimension_id = :dimension_id, scPrdW = :scPrdW, scPrdD = :scPrdD, scPrdH = :scPrdH, scPackW = :scPackW, scPackD = :scPackD, scPackH = :scPackH, scVolN = :scVolN, scVolG = :scVolG, scWeightN = :scWeightN, scWeightG = :scWeightG, scContainer = :scContainer, rollbond_id = :rollbond_id, rollbondtype_id = :rollbondtype_id, climate_id = :climate_id, condensor_id = :condensor_id, refrigerant_id = :refrigerant_id, scMoR = :scMoR, scRC = :scRC, scRP = :scRP, scCompressor = :scCompressor, scCoolCap = :scCoolCap, scCTD = :scCTD, scFreezTemp = :scFreezTemp, scEC = :scEC, rv_id = :rv_id, wv_id = :wv_id, scRF = :scRF, scRtdCurr = :scRtdCurr, scRtdPwr = :scRtdPwr, scRML = :scRML
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':color_id', $color_id);
	$stmt2->bindParam(':scHandle', $scHandle);
	$stmt2->bindParam(':rack_id', $rack_id);
	$stmt2->bindParam(':NoR', $NoR);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':scPrdW', $scPrdW);
	$stmt2->bindParam(':scPrdD', $scPrdD);
	$stmt2->bindParam(':scPrdH', $scPrdH);
	$stmt2->bindParam(':scPackW', $scPackW);
	$stmt2->bindParam(':scPackD', $scPackD);
	$stmt2->bindParam(':scPackH', $scPackH);
	$stmt2->bindParam(':scVolN', $scVolN);
	$stmt2->bindParam(':scVolG', $scVolG);
	$stmt2->bindParam(':scWeightN', $scWeightN);
	$stmt2->bindParam(':scWeightG', $scWeightG);
	$stmt2->bindParam(':scContainer', $scContainer);
	$stmt2->bindParam(':rollbond_id', $rollbond_id);
	$stmt2->bindParam(':rollbondtype_id', $rollbondtype_id);
	$stmt2->bindParam(':climate_id', $climate_id);
	$stmt2->bindParam(':condensor_id', $condensor_id);
	$stmt2->bindParam(':refrigerant_id', $refrigerant_id);
	$stmt2->bindParam(':scMoR', $scMoR);
	$stmt2->bindParam(':scRC', $scRC);
	$stmt2->bindParam(':scRP', $scRP);
	$stmt2->bindParam(':scCompressor', $scCompressor);
	$stmt2->bindParam(':scCoolCap', $scCoolCap);
	$stmt2->bindParam(':scCTD', $scCTD);
	$stmt2->bindParam(':scFreezTemp', $scFreezTemp);
	$stmt2->bindParam(':scEC', $scEC);
	$stmt2->bindParam(':rv_id', $rv_id);
	$stmt2->bindParam(':wv_id', $wv_id);
	$stmt2->bindParam(':scRF', $scRF);
	$stmt2->bindParam(':scRtdCurr', $scRtdCurr);
	$stmt2->bindParam(':scRtdPwr', $scRtdPwr);
	$stmt2->bindParam(':scRML', $scRML);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}

	$res = array(

		'color_id'			=> $color_id,
		'scHandle'			=> $scHandle,
		'rack_id'			=> $rack_id,
		'NoR'				=> $NoR,
		'dimension_id'		=> $dimension_id,
		'scPrdW'			=> $scPrdW,
		'scPrdD'			=> $scPrdD,
		'scPrdH'			=> $scPrdH,
		'scPackW'			=> $scPackW,
		'scPackD'			=> $scPackD,
		'scPackH'			=> $scPackH,
		'scVolN'			=> $scVolN,
		'scVolG'			=> $scVolG,
		'scWeightN'			=> $scWeightN,
		'scWeightG'			=> $scWeightG,
		'scContainer'		=> $scContainer,
		'rollbond_id'		=> $rollbond_id,
		'rollbondtype_id'	=> $rollbondtype_id,
		'climate_id'		=> $climate_id,
		'condensor_id'		=> $condensor_id,
		'refrigerant_id'	=> $refrigerant_id,
		'scMoR'				=> $scMoR,
		'scRC'				=> $scRC,
		'scRP'				=> $scRP,
		'scCompressor'		=> $scCompressor,
		'scCoolCap'			=> $scCoolCap,
		'scCTD'				=> $scCTD,
		'scFreezTemp'		=> $scFreezTemp,
		'scEC'				=> $scEC,
		'rv_id'				=> $rv_id,
		'wv_id'				=> $wv_id,
		'scRF'				=> $scRF,
		'scRtdCurr'			=> $scRtdCurr,
		'scRtdPwr'			=> $scRtdPwr,
		'scRML'				=> $scRML,

		'fea_id'			=> $fea_id
	);
	echo json_encode($res);


//########################################################################################################  SPEC WM ###############################################################################################
}else if ($prd_id == 4) {

	$color_id			=	'';
	$wmMB				=	'';
	$wmMD				=	'';
	$dimension_id		=	'';
	$wmPrdW				=	'';
	$wmPrdD				=	'';
	$wmPrdH				=	'';
	$wmPackW			=	'';
	$wmPackD			=	'';
	$wmPackH			=	'';
	$wmVolN				=	'';
	$wmVolG				=	'';
	$wmWeightN			=	'';
	$wmWeightG			=	'';
	$wmWaterSelector	=	'';
	$wmContainer		=	'';
	$wmTMS				=	'';
	$wmPMS				=	'';
	$wmSMS				=	'';
	$wmTMW				=	'';
	$wmPMW				=	'';
	$wmSMW				=	'';
	$rv_id				=	'';
	$wv_id				=	'';
	$wmRF				=	'';
	$wmRC				=	'';
	$wmRP				=	'';
	$wmArtSpecDesign 	=	'';
	$wmMecSpecDesign 	=	'';
	$wmCycSpecDesign	=	'';
	$wmElecSpecDesign 	=	'';
	$target_dir3		=	'_upload/artSpecDesign/WM/';
	$target_dir4		=	'_upload/mecSpecDesign/WM/';
	$target_dir5		=	'_upload/cycSpecDesign/WM/';
	$target_dir6		=	'_upload/elecSpecDesign/WM/';

	$color_id			=	$_POST['color_id'];
	$wmMB				=	$_POST['wmMB'];
	$wmMD				=	$_POST['wmMD'];
	$dimension_id		=	$_POST['dimension_id'];
	$wmPrdW				=	$_POST['wmPrdW'];
	$wmPrdD				=	$_POST['wmPrdD'];
	$wmPrdH				=	$_POST['wmPrdH'];
	$wmPackW			=	$_POST['wmPackW'];
	$wmPackD			=	$_POST['wmPackD'];
	$wmPackH			=	$_POST['wmPackH'];
	$wmVolN				=	$_POST['wmVolN'];
	$wmVolG				=	$_POST['wmVolG'];
	$wmWeightN			=	$_POST['wmWeightN'];
	$wmWeightG			=	$_POST['wmWeightG'];
	$wmWaterSelector	=	$_POST['wmWaterSelector'];
	$wmContainer		=	$_POST['wmContainer'];
	$wmTMS				=	$_POST['wmTMS'];
	$wmPMS				=	$_POST['wmPMS'];
	$wmSMS				=	$_POST['wmSMS'];
	$wmTMW				=	$_POST['wmTMW'];
	$wmPMW				=	$_POST['wmPMW'];
	$wmSMW				=	$_POST['wmSMW'];
	$rv_id				=	$_POST['rv_id'];
	$wv_id				=	$_POST['wv_id'];
	$wmRF				=	$_POST['wmRF'];
	$wmRC				=	$_POST['wmRC'];
	$wmRP				=	$_POST['wmRP'];

	if (isset($_FILES['wmArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$wmArtSpecDesign	= $_FILES['wmArtSpecDesign']['name'];
		$src3   			= $_FILES['wmArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT wmArtSpecDesign FROM table_specwm WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wmArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wmArtSpecDesign);
				$ext = strtolower(end($x));
				$wmArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.basename($wmArtNew);
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wmArtSpecDesign);
				$ext = strtolower(end($x));
				$wmArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.basename($wmArtNew);
				move_uploaded_file($src3, $target_file3);
			}

		}


		$update_wmArt	=	$DBcon->prepare("UPDATE table_specwm SET wmArtSpecDesign = :wmArtSpecDesign WHERE type_id = :type_id ");
		$update_wmArt->bindParam(':type_id', $type_id);
		$update_wmArt->bindParam(':wmArtSpecDesign', $wmArtNew);
		$update_wmArt->execute();

		$resWmArt	= array(
			'wmArtSpecDesign'	=> $wmArtNew
		);
	
		echo json_encode($resWmArt);
		
	}
	if (isset($_FILES['wmMecSpecDesign']['name'])) {
		$temp_file			=	'';
		$wmMecSpecDesign	= $_FILES['wmMecSpecDesign']['name'];
		$src4  				= $_FILES['wmMecSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT wmMecSpecDesign FROM table_specwm WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wmMecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wmMecSpecDesign);
				$ext = strtolower(end($x));
				$wmMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.basename($wmMecNew);
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wmMecSpecDesign);
				$ext = strtolower(end($x));
				$wmMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.basename($wmMecNew);
				move_uploaded_file($src4, $target_file4);
			}

		}


		$update_wmMec	=	$DBcon->prepare("UPDATE table_specwm SET wmMecSpecDesign = :wmMecSpecDesign WHERE type_id = :type_id ");
		$update_wmMec->bindParam(':type_id', $type_id);
		$update_wmMec->bindParam(':wmMecSpecDesign', $wmMecNew);
		$update_wmMec->execute();

		$resWmMec	= array(
			'wmMecSpecDesign'	=> $wmMecNew
		);
	
		echo json_encode($resWmMec);
		
	}
	if (isset($_FILES['wmCycSpecDesign']['name'])) {
		$temp_file			=	'';
		$wmCycSpecDesign	= $_FILES['wmCycSpecDesign']['name'];
		$src5  				= $_FILES['wmCycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT wmCycSpecDesign FROM table_specwm WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wmCycSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wmCycSpecDesign);
				$ext = strtolower(end($x));
				$wmCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.basename($wmCycNew);
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wmCycSpecDesign);
				$ext = strtolower(end($x));
				$wmCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.basename($wmCycNew);
				move_uploaded_file($src5, $target_file5);
			}

		}


		$update_wmCyc	=	$DBcon->prepare("UPDATE table_specwm SET wmCycSpecDesign = :wmCycSpecDesign WHERE type_id = :type_id ");
		$update_wmCyc->bindParam(':type_id', $type_id);
		$update_wmCyc->bindParam(':wmCycSpecDesign', $wmCycNew);
		$update_wmCyc->execute();

		$resWmCyc	= array(
			'wmCycSpecDesign'	=> $wmCycNew
		);
	
		echo json_encode($resWmCyc);
		
	}
	if (isset($_FILES['wmElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$wmElecSpecDesign	= $_FILES['wmElecSpecDesign']['name'];
		$src6  				= $_FILES['wmElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT wmElecSpecDesign FROM table_specwm WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wmElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wmElecSpecDesign);
				$ext = strtolower(end($x));
				$wmElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;

				$target_file6 	 	= $target_dir6.basename($wmElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wmElecSpecDesign);
				$ext = strtolower(end($x));
				$wmElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($wmElecNew);
				move_uploaded_file($src6, $target_file6);
			}

		}


		$update_wmElec	=	$DBcon->prepare("UPDATE table_specwm SET wmElecSpecDesign = :wmElecSpecDesign WHERE type_id = :type_id ");
		$update_wmElec->bindParam(':type_id', $type_id);
		$update_wmElec->bindParam(':wmElecSpecDesign', $wmElecNew);
		$update_wmElec->execute();

		$resWmElec	= array(
			'wmElecSpecDesign'	=> $wmElecNew
		);
	
		echo json_encode($resWmElec);
		
	}

	$stmt2 = $DBcon->prepare("
		UPDATE table_specwm SET color_id = :color_id, wmMB = :wmMB, wmMD = :wmMD, dimension_id = :dimension_id, wmPrdW = :wmPrdW, wmPrdD = :wmPrdD, wmPrdH = :wmPrdH, wmPackW = :wmPackW, wmPackD = :wmPackD, wmPackH = :wmPackH, wmVolN = :wmVolN, wmVolG = :wmVolG, wmWeightN = :wmWeightN, wmWeightG = :wmWeightG, wmWaterSelector = :wmWaterSelector, wmContainer = :wmContainer, wmTMS = :wmTMS, wmPMS = :wmPMS, wmSMS = :wmSMS, wmTMW = :wmTMW, wmPMW = :wmPMW, wmSMW = :wmSMW, rv_id = :rv_id, wv_id = :wv_id, wmRF = :wmRF, wmRC = :wmRC, wmRP = :wmRP
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':color_id', $color_id);
	$stmt2->bindParam(':wmMB', $wmMB);
	$stmt2->bindParam(':wmMD', $wmMD);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':wmPrdW', $wmPrdW);
	$stmt2->bindParam(':wmPrdD', $wmPrdD);
	$stmt2->bindParam(':wmPrdH', $wmPrdH);
	$stmt2->bindParam(':wmPackW', $wmPackW);
	$stmt2->bindParam(':wmPackD', $wmPackD);
	$stmt2->bindParam(':wmPackH', $wmPackH);
	$stmt2->bindParam(':wmVolN', $wmVolN);
	$stmt2->bindParam(':wmVolG', $wmVolG);
	$stmt2->bindParam(':wmWeightN', $wmWeightN);
	$stmt2->bindParam(':wmWeightG', $wmWeightG);
	$stmt2->bindParam(':wmWaterSelector', $wmWaterSelector);
	$stmt2->bindParam(':wmContainer', $wmContainer);
	$stmt2->bindParam(':wmTMS', $wmTMS);
	$stmt2->bindParam(':wmPMS', $wmPMS);
	$stmt2->bindParam(':wmSMS', $wmSMS);
	$stmt2->bindParam(':wmTMW', $wmTMW);
	$stmt2->bindParam(':wmPMW', $wmPMW);
	$stmt2->bindParam(':wmSMW', $wmSMW);
	$stmt2->bindParam(':rv_id', $rv_id);
	$stmt2->bindParam(':wv_id', $wv_id);
	$stmt2->bindParam(':wmRF', $wmRF);
	$stmt2->bindParam(':wmRC', $wmRC);
	$stmt2->bindParam(':wmRP', $wmRP);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}

	$res	=	array(

		'color_id'			=>	$color_id,
		'wmMB'				=>	$wmMB,
		'wmMD'				=>	$wmMD,
		'dimension_id'		=>	$dimension_id,
		'wmPrdW'			=>	$wmPrdW,
		'wmPrdD'			=>	$wmPrdD,
		'wmPrdH'			=>	$wmPrdH,
		'wmPackW'			=>	$wmPackW,
		'wmPackD'			=>	$wmPackD,
		'wmPackH'			=>	$wmPackH,
		'wmVolN'			=>	$wmVolN,
		'wmVolG'			=>	$wmVolG,
		'wmWeightN'			=>	$wmWeightN,
		'wmWeightG'			=>	$wmWeightG,
		'wmWaterSelector'	=>	$wmWaterSelector,
		'wmContainer'		=>	$wmContainer,
		'wmTMS'				=>	$wmTMS,
		'wmPMS'				=>	$wmPMS,
		'wmSMS'				=>	$wmSMS,
		'wmTMW'				=>	$wmTMW,
		'wmPMW'				=>	$wmPMW,
		'wmSMW'				=>	$wmSMW,
		'rv_id'				=>	$rv_id,
		'wv_id'				=>	$wv_id,
		'wmRF'				=>	$wmRF,
		'wmRC'				=>	$wmRC,
		'wmRP'				=>	$wmRP,

		'fea_id'			=> $fea_id

	);

	echo json_encode($res);

//################################################################################################# SPEC WD ###############################################################################################
}else if ($prd_id == 6) {

	$color_id			=	'';
	$dimension_id		=	'';
	$wdPrdW				=	'';
	$wdPrdD				=	'';
	$wdPrdH				=	'';
	$wdPackW			=	'';
	$wdPackD			=	'';
	$wdPackH			=	'';
	$wdVolN				=	'';
	$wdVolG				=	'';
	$wdWeightN			=	'';
	$wdWeightG			=	'';
	$wdContainer		=	'';
	$rollbond_id		=	'';
	$rollbondtype_id	=	'';
	$climate_id			=	'';
	$condensor_id		=	'';
	$refrigerant_id		=	'';
	$wdMoR				=	'';
	$wdRC				=	'';
	$wdRP				=	'';
	$wdCompressor		=	'';
	$wdCoolCap			=	'';
	$wdCapTube			=	'';
	$wdCoolTemp			=	'';
	$wdHotTemp			=	'';
	$wdNetralTemp		=	'';
	$wdEC				=	'';
	$rv_id				=	'';
	$wv_id				=	'';
	$wdRF				=	'';
	$wdRtdCurr			=	'';
	$wdRtdPwr			=	'';
	$wdRPH				=	'';
	$wdArtSpecDesign 	=	'';
	$wdMecSpecDesign 	=	'';
	$wdCycSpecDesign 	=	'';
	$wdElecSpecDesign 	=	'';
	$target_dir3		=	'_upload/artSpecDesign/WD/';
	$target_dir4		=	'_upload/mecSpecDesign/WD/';
	$target_dir5		=	'_upload/cycSpecDesign/WD/';
	$target_dir6		=	'_upload/elecSpecDesign/WD/';

	$color_id			=	$_POST['color_id'];
	$dimension_id		=	$_POST['dimension_id'];
	$wdPrdW				=	$_POST['wdPrdW'];
	$wdPrdD				=	$_POST['wdPrdD'];
	$wdPrdH				=	$_POST['wdPrdH'];
	$wdPackW			=	$_POST['wdPackW'];
	$wdPackD			=	$_POST['wdPackD'];
	$wdPackH			=	$_POST['wdPackH'];
	$wdVolN				=	$_POST['wdVolN'];
	$wdVolG				=	$_POST['wdVolG'];
	$wdWeightN			=	$_POST['wdWeightN'];
	$wdWeightG			=	$_POST['wdWeightG'];
	$wdContainer		=	$_POST['wdContainer'];
	$rollbond_id		=	$_POST['rollbond_id'];
	$rollbondtype_id	=	$_POST['rollbondtype_id'];
	$climate_id			=	$_POST['climate_id'];
	$condensor_id		=	$_POST['condensor_id'];
	$refrigerant_id		=	$_POST['refrigerant_id'];
	$wdMoR				=	$_POST['wdMoR'];
	$wdRC				=	$_POST['wdRC'];
	$wdRP				=	$_POST['wdRP'];
	$wdCompressor		=	$_POST['wdCompressor'];
	$wdCoolCap			=	$_POST['wdCoolCap'];
	$wdCapTube			=	$_POST['wdCapTube'];
	$wdCoolTemp			=	$_POST['wdCoolTemp'];
	$wdHotTemp			=	$_POST['wdHotTemp'];
	$wdNetralTemp		=	$_POST['wdNetralTemp'];
	$wdEC				=	$_POST['wdEC'];
	$rv_id				=	$_POST['rv_id'];
	$wv_id				=	$_POST['wv_id'];
	$wdRF				=	$_POST['wdRF'];
	$wdRtdCurr			=	$_POST['wdRtdCurr'];
	$wdRtdPwr			=	$_POST['wdRtdPwr'];
	$wdRPH				=	$_POST['wdRPH'];


	if (isset($_FILES['wdArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$wdArtSpecDesign	= $_FILES['wdArtSpecDesign']['name'];
		$src3   			= $_FILES['wdArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT wdArtSpecDesign FROM table_specwd WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wdArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wdArtSpecDesign);
				$ext = strtolower(end($x));
				$wdArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.basename($wdArtNew);
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wdArtSpecDesign);
				$ext = strtolower(end($x));
				$wdArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.basename($wdArtNew);
				move_uploaded_file($src3, $target_file3);
			}

		}


		$update_wdArt	=	$DBcon->prepare("UPDATE table_specwd SET wdArtSpecDesign = :wdArtSpecDesign WHERE type_id = :type_id ");
		$update_wdArt->bindParam(':type_id', $type_id);
		$update_wdArt->bindParam(':wdArtSpecDesign', $wdArtNew);
		$update_wdArt->execute();

		$resWdArt	= array(
			'wdArtSpecDesign'	=> $wdArtNew
		);
	
		echo json_encode($resWdArt);
		
	}
	if (isset($_FILES['wdMecSpecDesign']['name'])) {
		$temp_file			=	'';
		$wdMecSpecDesign	= $_FILES['wdMecSpecDesign']['name'];
		$src4  				= $_FILES['wdMecSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT wdMecSpecDesign FROM table_specwd WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wdMecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wdMecSpecDesign);
				$ext = strtolower(end($x));
				$wdMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.$wdMecNew;
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wdMecSpecDesign);
				$ext = strtolower(end($x));
				$wdMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.$wdMecNew;
				move_uploaded_file($src4, $target_file4);
			}

		}

		$update_wdMec	=	$DBcon->prepare("UPDATE table_specwd SET wdMecSpecDesign = :wdMecSpecDesign WHERE type_id = :type_id ");
		$update_wdMec->bindParam(':type_id', $type_id);
		$update_wdMec->bindParam(':wdMecSpecDesign', $wdMecNew);
		$update_wdMec->execute();

		$resWdMec	= array(
			'wdMecSpecDesign'	=> $wdMecNew
		);
	
		echo json_encode($resWdMec);
		
	}
	if (isset($_FILES['wdCycSpecDesign']['name'])) {
		$temp_file			=	'';
		$wdCycSpecDesign	= $_FILES['wdCycSpecDesign']['name'];
		$src5  				= $_FILES['wdCycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT wdCycSpecDesign FROM table_specwd WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wdCycSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wdCycSpecDesign);
				$ext = strtolower(end($x));
				$wdCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.$wdCycNew;
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wdCycSpecDesign);
				$ext = strtolower(end($x));
				$wdCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.$wdCycNew;
				move_uploaded_file($src5, $target_file5);
			}

		}

		$update_wdCyc	=	$DBcon->prepare("UPDATE table_specwd SET wdCycSpecDesign = :wdCycSpecDesign WHERE type_id = :type_id ");
		$update_wdCyc->bindParam(':type_id', $type_id);
		$update_wdCyc->bindParam(':wdCycSpecDesign', $wdCycNew);
		$update_wdCyc->execute();

		$resWdCyc	= array(
			'wdCycSpecDesign'	=> $wdCycNew
		);
	
		echo json_encode($resWdCyc);
		
	}
	if (isset($_FILES['wdElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$wdElecSpecDesign	= $_FILES['wdElecSpecDesign']['name'];
		$src6  				= $_FILES['wdElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT wdElecSpecDesign FROM table_specwd WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['wdElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $wdElecSpecDesign);
				$ext = strtolower(end($x));
				$wdElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;

				$target_file6 	 	= $target_dir6.basename($wdElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $wdElecSpecDesign);
				$ext = strtolower(end($x));
				$wdElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($wdElecNew);
				move_uploaded_file($src6, $target_file6);
			}

		}


		$update_wdElec	=	$DBcon->prepare("UPDATE table_specwd SET wdElecSpecDesign = :wdElecSpecDesign WHERE type_id = :type_id ");
		$update_wdElec->bindParam(':type_id', $type_id);
		$update_wdElec->bindParam(':wdElecSpecDesign', $wdElecNew);
		$update_wdElec->execute();

		$resWdElec	= array(
			'wdElecSpecDesign'	=> $wdElecNew
		);
	
		echo json_encode($resWdElec);
		
	}

	$stmt2 = $DBcon->prepare("
		UPDATE table_specwd SET color_id = :color_id, dimension_id = :dimension_id, wdPrdW = :wdPrdW, wdPrdD = :wdPrdD, wdPrdH = :wdPrdH, wdPackW = :wdPackW, wdPackD = :wdPackD, wdPackH = :wdPackH, wdVolN = :wdVolN, wdVolG = :wdVolG, wdWeightN = :wdWeightN, wdWeightG = :wdWeightG, wdContainer = :wdContainer, rollbond_id = :rollbond_id, rollbondtype_id = :rollbondtype_id, climate_id = :climate_id, condensor_id = :condensor_id, refrigerant_id = :refrigerant_id, wdMoR = :wdMoR, wdRC = :wdRC, wdRP = :wdRP, wdCompressor = :wdCompressor, wdCoolCap = :wdCoolCap, wdCapTube = :wdCapTube, wdCoolTemp = :wdCoolTemp, wdHotTemp = :wdHotTemp, wdNetralTemp = :wdNetralTemp, wdEC = :wdEC, rv_id = :rv_id, wv_id = :wv_id, wdRF = :wdRF, wdRtdCurr = :wdRtdCurr, wdRtdPwr = :wdRtdPwr, wdRPH = :wdRPH
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':color_id', $color_id);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':wdPrdW', $wdPrdW);
	$stmt2->bindParam(':wdPrdD', $wdPrdD);
	$stmt2->bindParam(':wdPrdH', $wdPrdH);
	$stmt2->bindParam(':wdPackW', $wdPackW);
	$stmt2->bindParam(':wdPackD', $wdPackD);
	$stmt2->bindParam(':wdPackH', $wdPackH);
	$stmt2->bindParam(':wdVolN', $wdVolN);
	$stmt2->bindParam(':wdVolG', $wdVolG);
	$stmt2->bindParam(':wdWeightN', $wdWeightN);
	$stmt2->bindParam(':wdWeightG', $wdWeightG);
	$stmt2->bindParam(':wdContainer', $wdContainer);
	$stmt2->bindParam(':rollbond_id', $rollbond_id);
	$stmt2->bindParam(':rollbondtype_id', $rollbondtype_id);
	$stmt2->bindParam(':climate_id', $climate_id);
	$stmt2->bindParam(':condensor_id', $condensor_id);
	$stmt2->bindParam(':refrigerant_id', $refrigerant_id);
	$stmt2->bindParam(':wdMoR', $wdMoR);
	$stmt2->bindParam(':wdRC', $wdRC);
	$stmt2->bindParam(':wdRP', $wdRP);
	$stmt2->bindParam(':wdCompressor', $wdCompressor);
	$stmt2->bindParam(':wdCoolCap', $wdCoolCap);
	$stmt2->bindParam(':wdCapTube', $wdCapTube);
	$stmt2->bindParam(':wdCoolTemp', $wdCoolTemp);
	$stmt2->bindParam(':wdHotTemp', $wdHotTemp);
	$stmt2->bindParam(':wdNetralTemp', $wdNetralTemp);
	$stmt2->bindParam(':wdEC', $wdEC);
	$stmt2->bindParam(':rv_id', $rv_id);
	$stmt2->bindParam(':wv_id', $wv_id);
	$stmt2->bindParam(':wdRF', $wdRF);
	$stmt2->bindParam(':wdRtdCurr', $wdRtdCurr);
	$stmt2->bindParam(':wdRtdPwr', $wdRtdPwr);
	$stmt2->bindParam(':wdRPH', $wdRPH);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}

	$res = array(

		'color_id'			=>	$color_id,
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
		'rv_id'				=>	$rv_id,
		'wv_id'				=>	$wv_id,
		'wdRF'				=>	$wdRF,
		'wdRtdCurr'			=>	$wdRtdCurr,
		'wdRtdPwr'			=>	$wdRtdPwr,
		'wdRPH'				=>	$wdRPH,

		'fea_id'			=> $fea_id
	);
	echo json_encode($res);


//############################################################################################ SPEC OTHER ############################################################################################
}else if ($prd_id == 5) {
	$color_id			=	'';
	$dimension_id		=	'';
	$oPrdW				=	'';
	$oPrdD				=	'';
	$oPrdH				=	'';
	$oPackW				=	'';
	$oPackD				=	'';
	$oPackH				=	'';
	$oVolN				=	'';
	$oVolG				=	'';
	$oWeightN			=	'';
	$oWeightG			=	'';
	$oContainer			=	'';
	$oNote1				=	'';
	$oNote2				=	'';
	$oNote3				=	'';
	$oEC				=	'';
	$rv_id				=	'';
	$wv_id				=	'';
	$oRF				=	'';
	$oRC				=	'';
	$oRP				=	'';
	$oArtSpecDesign 	=	'';
	$oMecSpecDesign		=	'';
	$oCycSpecDesign		=	'';
	$oElecSpecDesign	=	'';
	$target_dir3		=	'_upload/artSpecDesign/Other/';
	$target_dir4		=	'_upload/mecSpecDesign/Other/';
	$target_dir5		=	'_upload/cycSpecDesign/Other/';
	$target_dir6		=	'_upload/elecSpecDesign/Other/';

	$color_id		=	$_POST['color_id'];
	$dimension_id	=	$_POST['dimension_id'];
	$oPrdW			=	$_POST['oPrdW'];
	$oPrdD			=	$_POST['oPrdD'];
	$oPrdH			=	$_POST['oPrdH'];
	$oPackW			=	$_POST['oPackW'];
	$oPackD			=	$_POST['oPackD'];
	$oPackH			=	$_POST['oPackH'];
	$oVolN			=	$_POST['oVolN'];
	$oVolG			=	$_POST['oVolG'];
	$oWeightN		=	$_POST['oWeightN'];
	$oWeightG		=	$_POST['oWeightG'];
	$oContainer		=	$_POST['oContainer'];
	$oNote1			=	$_POST['oNote1'];
	$oNote2			=	$_POST['oNote2'];
	$oNote3			=	$_POST['oNote3'];
	$oEC			=	$_POST['oEC'];
	$rv_id			=	$_POST['rv_id'];
	$wv_id			=	$_POST['wv_id'];
	$oRF			=	$_POST['oRF'];
	$oRC			=	$_POST['oRC'];
	$oRP			=	$_POST['oRP'];

	if (isset($_FILES['oArtSpecDesign']['name'])) {
		$temp_file			=	'';
		$oArtSpecDesign		= $_FILES['oArtSpecDesign']['name'];
		$src3   			= $_FILES['oArtSpecDesign']['tmp_name'];

		$delete3 			=	$DBcon->prepare("SELECT oArtSpecDesign FROM table_specother WHERE type_id = :type_id");
		$delete3->bindParam(':type_id', $type_id);
		$delete3->execute();
		while ($row = $delete3->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['oArtSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $oArtSpecDesign);
				$ext = strtolower(end($x));
				$oArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_R00.".$ext;

				$target_file3 	 	= $target_dir3.basename($oArtNew);
				move_uploaded_file($src3, $target_file3);
			}else{
				unlink($target_dir3.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $oArtSpecDesign);
				$ext = strtolower(end($x));
				$oArtNew = "PS_".str_replace(' ', '_', $typeSupply)."_AW_".$rev.".".$ext;

				$target_file3 	 	= $target_dir3.basename($oArtNew);
				move_uploaded_file($src3, $target_file3);

			}

		}

		$update_oArt	=	$DBcon->prepare("UPDATE table_specother SET oArtSpecDesign = :oArtSpecDesign WHERE type_id = :type_id ");
		$update_oArt->bindParam(':type_id', $type_id);
		$update_oArt->bindParam(':oArtSpecDesign', $oArtNew);
		$update_oArt->execute();

		$resOArt	= array(
			'oArtSpecDesign'	=> $oArtNew
		);
	
		echo json_encode($resOArt);
		
	}
	if (isset($_FILES['oMecSpecDesign']['name'])) {
		$temp_file			=	'';
		$oMecSpecDesign		= $_FILES['oMecSpecDesign']['name'];
		$src4  				= $_FILES['oMecSpecDesign']['tmp_name'];

		$delete4 			=	$DBcon->prepare("SELECT oMecSpecDesign FROM table_specother WHERE type_id = :type_id");
		$delete4->bindParam(':type_id', $type_id);
		$delete4->execute();
		while ($row = $delete4->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['oMecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $oMecSpecDesign);
				$ext = strtolower(end($x));
				$oMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_R00.".$ext;

				$target_file4 	 	= $target_dir4.basename($oMecNew);
				move_uploaded_file($src4, $target_file4);
			}else{
				unlink($target_dir4.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $oMecSpecDesign);
				$ext = strtolower(end($x));
				$oMecNew = "PS_".str_replace(' ', '_', $typeSupply)."_MC_".$rev.".".$ext;

				$target_file4 	 	= $target_dir4.basename($oMecNew);
				move_uploaded_file($src4, $target_file4);

			}

		}

		$update_oMec	=	$DBcon->prepare("UPDATE table_specother SET oMecSpecDesign = :oMecSpecDesign WHERE type_id = :type_id ");
		$update_oMec->bindParam(':type_id', $type_id);
		$update_oMec->bindParam(':oMecSpecDesign', $oMecNew);
		$update_oMec->execute();

		$resOMec	= array(
			'oMecSpecDesign'	=> $oMecNew
		);
	
		echo json_encode($resOMec);
		
	}
	if (isset($_FILES['oCycSpecDesign']['name'])) {
		$temp_file			=	'';
		$oCycSpecDesign		= $_FILES['oCycSpecDesign']['name'];
		$src5  				= $_FILES['oCycSpecDesign']['tmp_name'];

		$delete5 			=	$DBcon->prepare("SELECT oCycSpecDesign FROM table_specother WHERE type_id = :type_id");
		$delete5->bindParam(':type_id', $type_id);
		$delete5->execute();
		while ($row = $delete5->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['oCycSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $oCycSpecDesign);
				$ext = strtolower(end($x));
				$oCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_R00.".$ext;

				$target_file5 	 	= $target_dir5.basename($oCycNew);
				move_uploaded_file($src5, $target_file5);
			}else{
				unlink($target_dir5.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $oCycSpecDesign);
				$ext = strtolower(end($x));
				$oCycNew = "PS_".str_replace(' ', '_', $typeSupply)."_CU_".$rev.".".$ext;

				$target_file5 	 	= $target_dir5.basename($oCycNew);
				move_uploaded_file($src5, $target_file5);

			}

		}

		$update_oCyc	=	$DBcon->prepare("UPDATE table_specother SET oCycSpecDesign = :oCycSpecDesign WHERE type_id = :type_id ");
		$update_oCyc->bindParam(':type_id', $type_id);
		$update_oCyc->bindParam(':oCycSpecDesign', $oCycNew);
		$update_oCyc->execute();

		$resOCyc	= array(
			'oCycSpecDesign'	=> $oCycNew
		);
	
		echo json_encode($resOCyc);
		
	}
	if (isset($_FILES['oElecSpecDesign']['name'])) {
		$temp_file			=	'';
		$oElecSpecDesign	= $_FILES['oElecSpecDesign']['name'];
		$src6  				= $_FILES['oElecSpecDesign']['tmp_name'];

		$delete6 			=	$DBcon->prepare("SELECT oElecSpecDesign FROM table_specother WHERE type_id = :type_id");
		$delete6->bindParam(':type_id', $type_id);
		$delete6->execute();
		while ($row = $delete6->fetch(PDO::FETCH_ASSOC)) {
			$temp_file = $row['oElecSpecDesign'];

			if ($temp_file == '') {
				$x 	 = explode('.', $oElecSpecDesign);
				$ext = strtolower(end($x));
				$oElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_R00.".$ext;

				$target_file6 	 	= $target_dir6.basename($oElecNew);
				move_uploaded_file($src6, $target_file6);
			}else{
				unlink($target_dir6.$temp_file);

				$a		= explode('_', $temp_file);
				$b 		= end($a);
				$c		= explode('.', $b);
				$count 	= $c[0];
				$d 		= substr($count, 1,2);
				$e 		= $d + 1;

				if ($e < 10) {
					$rev = 'R0'.$e;
				}else{
					$rev = 'R'.$e;
				}

				$x 	 = explode('.', $oElecSpecDesign);
				$ext = strtolower(end($x));
				$oElecNew = "PS_".str_replace(' ', '_', $typeSupply)."_EL_".$rev.".".$ext;

				$target_file6 	 	= $target_dir6.basename($oElecNew);
				move_uploaded_file($src6, $target_file6);

			}

		}

		$update_oElec	=	$DBcon->prepare("UPDATE table_specother SET oElecSpecDesign = :oElecSpecDesign WHERE type_id = :type_id ");
		$update_oElec->bindParam(':type_id', $type_id);
		$update_oElec->bindParam(':oElecSpecDesign', $oElecNew);
		$update_oElec->execute();

		$resOElec	= array(
			'oElecSpecDesign'	=> $oElecNew
		);
	
		echo json_encode($resOElec);
		
	}

	$stmt2 = $DBcon->prepare("
		UPDATE table_specother SET color_id = :color_id, dimension_id = :dimension_id, oPrdW = :oPrdW, oPrdD = :oPrdD, oPrdH = :oPrdH, oPackW = :oPackW, oPackD = :oPackD, oPackH = :oPackH, oVolN = :oVolN, oVolG = :oVolG, oWeightN = :oWeightN, oWeightG = :oWeightG, oContainer = :oContainer, oNote1 = :oNote1, oNote2 = :oNote2, oNote3 = :oNote3, oEC = :oEC, rv_id = :rv_id, wv_id = :wv_id, oRF = :oRF, oRC = :oRC, oRP = :oRP
		WHERE type_id = :type_id
		");

	$stmt2->bindParam(':type_id', $type_id);
	$stmt2->bindParam(':color_id', $color_id);
	$stmt2->bindParam(':dimension_id', $dimension_id);
	$stmt2->bindParam(':oPrdW', $oPrdW);
	$stmt2->bindParam(':oPrdD', $oPrdD);
	$stmt2->bindParam(':oPrdH', $oPrdH);
	$stmt2->bindParam(':oPackW', $oPackW);
	$stmt2->bindParam(':oPackD', $oPackD);
	$stmt2->bindParam(':oPackH', $oPackH);
	$stmt2->bindParam(':oVolN', $oVolN);
	$stmt2->bindParam(':oVolG', $oVolG);
	$stmt2->bindParam(':oWeightN', $oWeightN);
	$stmt2->bindParam(':oWeightG', $oWeightG);
	$stmt2->bindParam(':oContainer', $oContainer);
	$stmt2->bindParam(':oNote1', $oNote1);
	$stmt2->bindParam(':oNote2', $oNote2);
	$stmt2->bindParam(':oNote3', $oNote3);
	$stmt2->bindParam(':oEC', $oEC);
	$stmt2->bindParam(':rv_id', $rv_id);
	$stmt2->bindParam(':wv_id', $wv_id);
	$stmt2->bindParam(':oRF', $oRF);
	$stmt2->bindParam(':oRC', $oRC);
	$stmt2->bindParam(':oRP', $oRP);

	$stmt2->execute();

	if (isset($_POST['fea_id'])) {
		$fea_id				=	$_POST['fea_id'];
		$string	=	explode(',', $fea_id);
		$total 	=	count($string);

		$reset 	= $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = :type_id");
		$reset->bindParam(':type_id', $type_id);
		$reset->execute();

		for ($i=0; $i < $total; $i++) { 
			$stmt = $DBcon->prepare("INSERT INTO table_featurespec SET type_id = :type_id, fea_id = :fea_id ");
			$stmt->bindParam(':type_id', $type_id);
			$stmt->bindParam(':fea_id', $string[$i]);
			$stmt->execute();
		}	
	}

	$res = array(

		'color_id'			=>	$color_id,
		'dimension_id'		=>	$dimension_id,
		'oPrdW'				=>	$oPrdW,
		'oPrdD'				=>	$oPrdD,
		'oPrdH'				=>	$oPrdH,
		'oPackW'			=>	$oPackW,
		'oPackD'			=>	$oPackD,
		'oPackH'			=>	$oPackH,
		'oVolN'				=>	$oVolN,
		'oVolG'				=>	$oVolG,
		'oWeightN'			=>	$oWeightN,
		'oWeightG'			=>	$oWeightG,
		'oContainer'		=>	$oContainer,
		'oNote1'			=>	$oNote1,
		'oNote2'			=>	$oNote2,
		'oNote3'			=>	$oNote3,
		'oEC'				=>	$oEC,
		'rv_id'				=>	$rv_id,
		'wv_id'				=>	$wv_id,
		'oRF'				=>	$oRF,
		'oRC'				=>	$oRC,
		'oRP'				=>	$oRP,

		'fea_id'			=> $fea_id

	);
	echo json_encode($res);
}


?>