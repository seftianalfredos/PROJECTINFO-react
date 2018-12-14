<?php 
session_start();
include 'config.php';


date_default_timezone_set('Asia/Bangkok');
$year 	= date("y");
$month 	= date("m");



$prj_id          	= '';
$TypeID			 	= '';
$noNdpr          	= '';
$ndprName        	= '';
$plant_id        	= '';
$typeSupply      	= '';
$typeSupplyDesc  	= '';
$typeDemand      	= '';
$typeCetak       	= '';
$format_id       	= '';
$prd_id          	= '';
$cha_id          	= '';
$siz_id          	= '';
$typeNote        	= '';
$typePhoto       	= '';
$made_in         	= '';
$mandatory       	= '';
$cp_id    			= '';
$modelFamily     	= '';
$noBukuPetunjuk  	= '';
$noPostel        	= '';
$noSni           	= '';
$noLsPro         	= '';
$noNrpNpb        	= '';
$warantyCard     	= '';
$warantyYear     	= '';
$sta_id			 	= '';
$revCode		 	= 'R00';
$tit_id		 		= 42;
$revDate		 	= '';
$DepartementID 		= 1;
$TypeStartDate		= '';
$TypeFinishDate		= '';
$target_file		= '';
$target_file2		= '';
$target_dir 		= '_upload/typePhoto/';
$target_dir2 		= '_upload/ndpr_file/';
$author 			= $_SESSION['username'];

$cekid = $DBcon->prepare("SELECT *FROM table_type");
$cekid->execute();
$baris = $cekid->rowCount();
echo $baris.'<br>';
if ($baris == 0) {
	$TypeID = "TYP".$year.$month."0001";
}else{
	$cekid = $DBcon->prepare("SELECT *FROM table_type ORDER BY type_id DESC LIMIT 1 ");
	$cekid->execute();
	while($row = $cekid->fetch(PDO::FETCH_ASSOC)){
		$tempId = $row['TypeID'];
		$id = substr($tempId, 7, 4);
		echo $id.'<br>';
		$id++;
		echo $id.'<br>';
		if ($id < 10) {
			$TypeID = "TYP".$year.$month."000".$id;
		}else if($id < 100){
			$TypeID = "TYP".$year.$month."00".$id;
		}else if($id < 1000){
			$TypeID = "TYP".$year.$month."0".$id;
		}else{
			$TypeID = "TYP".$year.$month.$id;
		}
	}
}



$prj_id          = $_POST['prj_id'];
$noNdpr          = $_POST['noNdpr'];
$plant_id        = $_POST['plant_id'];
$typeSupply      = $_POST['typeSupply'];
$typeSupplyDesc  = $_POST['typeSupplyDesc'];
$typeDemand      = $_POST['typeDemand'];
$typeCetak       = $_POST['typeCetak'];
$format_id       = $_POST['format_id'];
$prd_id          = $_POST['prd_id'];
$cha_id          = $_POST['cha_id'];
$siz_id          = $_POST['siz_id'];
$typeNote        = $_POST['typeNote'];
$made_in         = $_POST['made_in'];
$mandatory       = $_POST['mandatory'];
$cp_id    		 = $_POST['cp_id'];
$modelFamily     = $_POST['modelFamily'];
$noBukuPetunjuk  = $_POST['noBukuPetunjuk'];
$noPostel        = $_POST['noPostel'];
$noSni           = $_POST['noSni'];
$noLsPro         = $_POST['noLsPro'];
$noNrpNpb        = $_POST['noNrpNpb'];
$warantyCard     = $_POST['warantyCard'];
$warantyYear     = $_POST['warantyYear'];
$sta_id     	 = $_POST['sta_id'];
$TypeStartDate   = $_POST['TypeStartDate'];
$TypeFinishDate  = $_POST['TypeFinishDate'];


if (isset($_FILES['typePhoto']['name'])) {
	$typePhoto      = $_FILES['typePhoto']['name'];
	$src       		= $_FILES['typePhoto']['tmp_name'];
	$y 				= explode('.', $typePhoto);
	$ext 			= strtolower(end($y));
	$typePhotonew 	= "TP_".str_replace(' ', '_', $typeSupply)."_R00.".$ext;
	$target_file 	= $target_dir.basename($typePhotonew);
	move_uploaded_file($src, $target_file);
}

if (isset($_FILES['ndprName']['name'])) {
	$ndprName       = $_FILES['ndprName']['name'];
	$src2       	= $_FILES['ndprName']['tmp_name'];
	$x 				= explode('.', $ndprName);
	$ext 			= strtolower(end($x));
	$ndprnew	 	= "NP_".str_replace(' ', '_', $typeSupply)."_R00.".$ext;
	$target_file2	= $target_dir2.basename($ndprnew);
	move_uploaded_file($src2, $target_file2);
}


//################################################# BUAT NGECEK  #######################################################

/*$result = array(
'TypeID'			=>	$TypeID,
'prj_id' 			=>	$prj_id,
'noNdpr'			=>	$noNdpr,
'ndprName'			=>	$ndprName,
'plant_id'			=>	$plant_id,
'typeSupply'		=>	$typeSupply,
'typeSupplyDesc'	=>	$typeSupplyDesc,
'typeDemand'		=>	$typeDemand,
'typeCetak'			=>	$typeCetak,
'format_id'			=>	$format_id,
'prd_id'			=>	$prd_id,
'cha_id'			=>	$cha_id,
'siz_id'			=>	$siz_id,
'typeNote'			=>	$typeNote,
'typePhoto'			=>	$typePhoto,
'made_in'			=>	$made_in,
'mandatory'			=>	$mandatory,
'cp_id'		=>	$cp_id,
'modelFamily'		=>	$modelFamily,
'noBukuPetunjuk'	=>	$noBukuPetunjuk,
'noPostel'			=>	$noPostel,
'noSni'				=>	$noSni,
'noLsPro'			=>	$noLsPro,
'noNrpNpb'			=>	$noNrpNpb,
'warantyCard'		=>	$warantyCard,
'warantyYear'		=>	$warantyYear,
'sta_id'			=>	$sta_id
);

echo json_encode($result);*/

###########################################################################################################################

	$stmt = $DBcon->prepare("INSERT INTO table_type(TypeID, prj_id, noNdpr, ndprName, plant_id, typeSupply, typeSupplyDesc, typeDemand, typeCetak, format_id, prd_id, cha_id, siz_id, typeNote, typePhoto, made_in, mandatory, cp_id, modelFamily, noBukuPetunjuk, noPostel, noSni, noLsPro, noNrpNpb, warantyCard, warantyYear, sta_id, TypeStartDate, TypeFinishDate, author)VALUES(:TypeID, :prj_id, :noNdpr, :ndprName, :plant_id, :typeSupply, :typeSupplyDesc, :typeDemand, :typeCetak, :format_id, :prd_id, :cha_id, :siz_id, :typeNote, :typePhoto, :made_in, :mandatory, :cp_id, :modelFamily, :noBukuPetunjuk, :noPostel, :noSni, :noLsPro, :noNrpNpb, :warantyCard, :warantyYear, :sta_id, :TypeStartDate, :TypeFinishDate, :author) ");

	$stmt->bindParam(':TypeID', $TypeID);
	$stmt->bindParam(':prj_id', $prj_id);
	$stmt->bindParam(':noNdpr', $noNdpr);
	$stmt->bindParam(':ndprName', $ndprnew);
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
	$stmt->bindParam(':typePhoto', $typePhotonew);
	$stmt->bindParam(':made_in', $made_in);
	$stmt->bindParam(':mandatory', $mandatory);
	$stmt->bindParam(':cp_id', $cp_id);
	$stmt->bindParam(':modelFamily', $modelFamily);
	$stmt->bindParam(':noBukuPetunjuk', $noBukuPetunjuk);
	$stmt->bindParam(':noPostel', $noPostel);
	$stmt->bindParam(':noSni', $noSni);
	$stmt->bindParam(':noLsPro', $noLsPro);
	$stmt->bindParam(':noNrpNpb', $noNrpNpb);
	$stmt->bindParam(':warantyCard', $warantyCard);
	$stmt->bindParam(':warantyYear', $warantyYear);
	$stmt->bindParam(':sta_id', $sta_id);
	$stmt->bindParam(':TypeStartDate', $TypeStartDate);
	$stmt->bindParam(':TypeFinishDate', $TypeFinishDate);
	$stmt->bindParam(':author', $author);


	if ($stmt->execute()) {

		$result = array(
			'TypeID'			=>	$TypeID,
			'prj_id' 			=>	$prj_id,
			'noNdpr'			=>	$noNdpr,
			'ndprName'			=>	$ndprnew,
			'plant_id'			=>	$plant_id,
			'typeSupply'		=>	$typeSupply,
			'typeSupplyDesc'	=>	$typeSupplyDesc,
			'typeDemand'		=>	$typeDemand,
			'typeCetak'			=>	$typeCetak,
			'format_id'			=>	$format_id,
			'prd_id'			=>	$prd_id,
			'cha_id'			=>	$cha_id,
			'siz_id'			=>	$siz_id,
			'typeNote'			=>	$typeNote,
			'typePhoto'			=>	$typePhotonew,
			'made_in'			=>	$made_in,
			'mandatory'			=>	$mandatory,
			'cp_id'				=>	$cp_id,
			'modelFamily'		=>	$modelFamily,
			'noBukuPetunjuk'	=>	$noBukuPetunjuk,
			'noPostel'			=>	$noPostel,
			'noSni'				=>	$noSni,
			'noLsPro'			=>	$noLsPro,
			'noNrpNpb'			=>	$noNrpNpb,
			'warantyCard'		=>	$warantyCard,
			'warantyYear'		=>	$warantyYear,
			'TypeStartDate'		=>	$TypeStartDate,
			'TypeFinishDate'	=>	$TypeFinishDate,
			'sta_id'			=>	$sta_id,
			'author'			=>	$author
		);

		echo json_encode($result);

	}else{
		$err = "Error, Data Not Inserted";
		echo json_encode($err);
	}

$query2 = $DBcon->prepare("SELECT *FROM table_type ORDER BY type_id DESC LIMIT 1");
$query2->execute();
while ($rows = $query2->fetch(PDO::FETCH_ASSOC)) {
	$type_id = $rows['type_id'];

	$query3 = $DBcon->prepare("INSERT INTO table_revisitype SET type_id = :type_id, tit_id = :tit_id, DepartementID = :DepartementID, revCode = :revCode, revDate = :revDate ");

	$query3->bindParam(':type_id', $type_id);
	$query3->bindParam(':tit_id', $tit_id);
	$query3->bindParam(':DepartementID', $DepartementID);
	$query3->bindParam(':revCode', $revCode);
	$query3->bindParam(':revDate', $TypeFinishDate);

	$query3->execute();
}
?>