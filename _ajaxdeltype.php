<?php 
include 'config.php';
$type_id = '';
$ProductName = '';

$type_id = intval($_REQUEST['type_id']);

$query = $DBcon->prepare("SELECT tt.ndprName AS ndprName, tt.typePhoto AS typePhoto, tp.ProductName AS ProductName FROM table_type tt JOIN table_product tp ON tt.prd_id = tp.prd_id WHERE type_id = :type_id");
$query->bindParam(':type_id', $type_id);
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	$ProductName = $row['ProductName'];
	$temp_ndpr	 = $row['ndprName'];
	$temp_photo	 = $row['typePhoto'];

	if ($temp_photo != NULL) {
		unlink('_upload/typePhoto/'.$temp_photo);
	}

	unlink('_upload/ndpr_file/'.$temp_ndpr);
}

$res = array(
	'type_id' 		=> 	$type_id,
	'ProductName'	=>	$ProductName
);

echo json_encode($res);

$del1 = $DBcon->prepare("DELETE FROM table_type WHERE type_id = '$type_id' ");
$del1->execute();

switch ($ProductName) {
	case "Air Conditioner":
	$delfile = $DBcon->prepare("SELECT acArtSpecDesign, acMecSpecDesign, acCycSpecDesign, acElecSpecDesign FROM table_specac WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempAcArt	=	$row['acArtSpecDesign'];
		$tempAcMech	=	$row['acMecSpecDesign'];
		$tempAcCyc	=	$row['acCycSpecDesign'];
		$tempAcElec	=	$row['acElecSpecDesign'];

		if ($tempAcArt != NULL) {
			unlink('_upload/artSpecDesign/AC/'.$tempAcArt);
		}
		if ($tempAcMech != NULL) {			
			unlink('_upload/mecSpecDesign/AC/'.$tempAcMech);
		}
		if ($tempAcCyc != NULL) {			
			unlink('_upload/cycSpecDesign/AC/'.$tempAcCyc);
		}
		if ($tempAcElec != NULL) {			
			unlink('_upload/elecSpecDesign/AC/'.$tempAcElec);
		}
	}

	$del2 = $DBcon->prepare("DELETE FROM table_specac WHERE type_id = '$type_id' ");
	$del2->execute();
	break;            
	case "Chest Freezer":
	$delfile = $DBcon->prepare("SELECT cfArtSpecDesign, cfMecSpecDesign, cfCycSpecDesign, cfElecSpecDesign FROM table_speccf WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempCfArt	=	$row['cfArtSpecDesign'];
		$tempCfMech	=	$row['cfMecSpecDesign'];
		$tempCfCyc	=	$row['cfCycSpecDesign'];
		$tempCfElec	=	$row['cfElecSpecDesign'];

		if ($tempCfArt != NULL) {
			unlink('_upload/artSpecDesign/CF/'.$tempCfArt);
		}
		if ($tempCfMech != NULL) {
			unlink('_upload/mecSpecDesign/CF/'.$tempCfMech);
		}
		if ($tempCfCyc != NULL) {
			unlink('_upload/cycSpecDesign/CF/'.$tempCfCyc);
		}
		if ($tempCfElec != NULL) {
			unlink('_upload/elecSpecDesign/CF/'.$tempCfElec);
		}

	}

	$del2 = $DBcon->prepare("DELETE FROM table_speccf WHERE type_id = '$type_id' ");
	$del2->execute();
	break;
	case "Showcase":
	$delfile = $DBcon->prepare("SELECT scArtSpecDesign, scMecSpecDesign, scCycSpecDesign, scElecSpecDesign FROM table_specsc WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempScArt	=	$row['scArtSpecDesign'];
		$tempScMech	=	$row['scMecSpecDesign'];
		$tempScCyc	=	$row['scCycSpecDesign'];
		$tempScElec	=	$row['scElecSpecDesign'];

		if ($tempScArt != NULL) {
			unlink('_upload/artSpecDesign/SC/'.$tempScArt);
		}
		if ($tempScMech != NULL) {
			unlink('_upload/mecSpecDesign/SC/'.$tempScMech);
		}
		if ($tempScCyc != NULL) {
			unlink('_upload/cycSpecDesign/SC/'.$tempScCyc);
		}
		if ($tempScElec != NULL) {
			unlink('_upload/elecSpecDesign/SC/'.$tempScElec);
		}

	}

	$del2 = $DBcon->prepare("DELETE FROM table_specsc WHERE type_id = '$type_id' ");
	$del2->execute();
	break;
	case "Refrigerator":
	$delfile = $DBcon->prepare("SELECT ArtSpecDesign, MechSpecDesign, CycSpecDesign, ElecSpecDesign FROM table_specrf WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempRfArt	=	$row['ArtSpecDesign'];
		$tempRfMech	=	$row['MechSpecDesign'];
		$tempRfCyc	=	$row['CycSpecDesign'];
		$tempRfElec	=	$row['ElecSpecDesign'];

		if ($tempRfArt != NULL) {
			unlink('_upload/artSpecDesign/RF/'.$tempRfArt);
		}
		if ($tempRfMech != NULL) {
			unlink('_upload/mecSpecDesign/RF/'.$tempRfMech);
		}
		if ($tempRfCyc != NULL) {
			unlink('_upload/cycSpecDesign/RF/'.$tempRfCyc);
		}
		if ($tempRfElec != NULL) {
			unlink('_upload/elecSpecDesign/RF/'.$tempRfElec);
		}

	}

	$del2 = $DBcon->prepare("DELETE FROM table_specrf WHERE type_id = '$type_id' ");
	$del2->execute();
	break;
	case "Washing Machine":
	$delfile = $DBcon->prepare("SELECT wmArtSpecDesign, wmMecSpecDesign, wmCycSpecDesign, wmElecSpecDesign FROM table_specwm WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempWmArt	=	$row['wmArtSpecDesign'];
		$tempWmMech	=	$row['wmMecSpecDesign'];
		$tempWmCyc	=	$row['wmCycSpecDesign'];
		$tempWmElec	=	$row['wmElecSpecDesign'];

		if ($tempWmArt != NULL) {
			unlink('_upload/artSpecDesign/WM/'.$tempWmArt);
		}
		if ($tempWmMech != NULL) {
			unlink('_upload/mecSpecDesign/WM/'.$tempWmMech);
		}
		if ($tempWmCyc != NULL) {
			unlink('_upload/cycSpecDesign/WM/'.$tempWmCyc);
		}
		if ($tempWmElec != NULL) {
			unlink('_upload/elecSpecDesign/WM/'.$tempWmElec);
		}

	}

	$del2 = $DBcon->prepare("DELETE FROM table_specwm WHERE type_id = '$type_id' ");
	$del2->execute();
	break;
	case "Water Dispenser":
	$delfile = $DBcon->prepare("SELECT wdArtSpecDesign, wdMecSpecDesign, wdCycSpecDesign, wdElecSpecDesign FROM table_specwd WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempWdArt	=	$row['wdArtSpecDesign'];
		$tempWdMech	=	$row['wdMecSpecDesign'];
		$tempWdCyc	=	$row['wdCycSpecDesign'];
		$tempWdElec	=	$row['wdElecSpecDesign'];

		if ($tempWdArt != NULL) {
			unlink('_upload/artSpecDesign/WD/'.$tempWdArt);
		}
		if ($tempWdMech != NULL) {
			unlink('_upload/mecSpecDesign/WD/'.$tempWdMech);
		}
		if ($tempWdCyc != NULL) {
			unlink('_upload/cycSpecDesign/WD/'.$tempWdCyc);
		}
		if ($tempWdElec != NULL) {
			unlink('_upload/elecSpecDesign/WD/'.$tempWdElec);
		}

	}

	$del2 = $DBcon->prepare("DELETE FROM table_specwd WHERE type_id = '$type_id' ");
	$del2->execute();
	break;
	default:
	$delfile = $DBcon->prepare("SELECT oArtSpecDesign, oMecSpecDesign, oCycSpecDesign, oElecSpecDesign FROM table_specsc WHERE type_id = :type_id ");
	$delfile->bindParam(':type_id', $type_id);
	$delfile->execute();
	while ($row = $delfile->fetch(PDO::FETCH_ASSOC)) {
		$tempOArt	=	$row['oArtSpecDesign'];
		$tempOMech	=	$row['oMecSpecDesign'];
		$tempOCyc	=	$row['oCycSpecDesign'];
		$tempOElec	=	$row['oElecSpecDesign'];

		if ($tempOArt != NULL) {
			unlink('_upload/artSpecDesign/Other/'.$tempOArt);
		}
		if ($tempOMech != NULL) {
			unlink('_upload/mecSpecDesign/Other/'.$tempOMech);
		}
		if ($tempOCyc != NULL) {
			unlink('_upload/cycSpecDesign/Other/'.$tempOCyc);
		}
		if ($tempOElec != NULL) {
			unlink('_upload/elecSpecDesign/Other/'.$tempOElec);
		}

	}

	$del2 = $DBcon->prepare("DELETE FROM table_specother WHERE type_id = '$type_id' ");
	$del2->execute();
	break;
}


$del3 = $DBcon->prepare("DELETE FROM table_featurespec WHERE type_id = '$type_id' ");
$del3->execute();


$del4 = $DBcon->prepare("DELETE FROM table_team WHERE type_id = '$type_id' ");
$del4->execute();

$delresc = $DBcon->prepare("DELETE FROM table_revisitype WHERE type_id = '$type_id' ");
$delresc->execute();

?>