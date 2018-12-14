<?php 
include 'config2.php';

$columns = array('', 'type_id', 'ProjectName', 'typeSupply', 'ManName', 'ProductCode', 'ChasisName', 'SizeAlias', 'TypeStartDate', 'TypeFinishDate', 'revCode', 'revDate', 'StatusProject', 'StatusType','typeNote');

$sql	= "SELECT tt.type_id AS type_id, tp.ProjectName AS ProjectName, tt.typeSupply AS typeSupply, tm.ManName AS ManName, tp2.ProductCode AS ProductCode, tc.ChasisName AS ChasisName, tc2.SizeAlias AS SizeAlias, tt.TypeStartDate AS TypeStartDate, tt.TypeFinishDate AS TypeFinishDate, MAX(trt.revCode) AS revCode, MAX(trt.revDate) AS revDate, ts2.StatusAlias AS StatusProject, ts.StatusAlias AS StatusType, tt.typeNote AS typeNote FROM table_type tt 
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_product tp2 ON tt.prd_id = tp2.prd_id
LEFT JOIN table_chasis tc ON tt.cha_id = tc.cha_id
LEFT JOIN table_capacity tc2 ON tt.siz_id = tc2.siz_id
LEFT JOIN table_manpower tm ON tp.man_id = tm.man_id 
LEFT JOIN table_status ts ON tt.sta_id = ts.sta_id 
LEFT JOIN table_status ts2 ON tp.sta_id = ts2.sta_id 
LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id
WHERE assign = 1";

if (isset($_POST['is_pl'])) {
	if ($_POST['is_pl'] == "All" || $_POST['is_pl'] == null) {
		$sql.= " ";
	}else{
		$sql.= " AND tp.man_id = '".$_POST['is_pl']."' ";
	}
}

if (isset($_POST['is_sts'])) {
	if ($_POST['is_sts'] == "All" || $_POST['is_sts'] == null) {
		$sql.= " ";
	}else{
		$sql.= " AND ts.sta_id = '".$_POST['is_sts']."' ";
	}
}

if (isset($_POST['search']['value'])) {
	$sql.= " AND (tt.type_id LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tt.typeSupply LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tm.ManName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp2.ProductCode LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tc.ChasisName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tc2.SizeAlias LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tt.TypeStartDate LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tt.TypeFinishDate LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR ts2.StatusAlias LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR ts.StatusAlias LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR trt.revCode LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR trt.revDate LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tt.typeNote LIKE '%".$_POST['search']['value']."%' ) GROUP BY tt.type_id";
}

if (isset($_POST['order'])) {
	$sql .= " ORDER BY ".$columns[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']. " ";
}else{
	$sql .= " ORDER BY tt.type_id DESC ";
}

$sql1 = "";

if ($_POST['length'] != -1) {
	$sql1 = " LIMIT ".$_POST['start']." ,".$_POST['length']." ";
}

$number_filter_row = mysqli_num_rows(mysqli_query($koneksi, $sql));

$result = mysqli_query($koneksi, $sql.$sql1);

$data 	= array();
while ($row = mysqli_fetch_array($result)) {
	$subdata		=	array();
	$subdata[]		= '';
	$subdata[]		= $row['type_id'];
	$subdata[]		= $row['typeSupply'];
	$subdata[]		= $row['ProjectName'];
	$subdata[]		= $row['ManName'];
	$subdata[]		= $row['ProductCode'];
	$subdata[]		= $row['ChasisName'];
	$subdata[]		= $row['SizeAlias'];
	$myStartDate 	= DateTime::createFromFormat('Y-m-d', $row['TypeStartDate']);
	$myFinishDate 	= DateTime::createFromFormat('Y-m-d', $row['TypeFinishDate']);
	$myRevDate 		= DateTime::createFromFormat('Y-m-d', $row['revDate']);
//$formattedweddingdate = $myDateTime->format('d-m-Y');
	$subdata[]		= $myStartDate->format('d-m-Y');
	$subdata[]		= $myFinishDate->format('d-m-Y');
	$subdata[]		= $row['revCode'];
	$subdata[]		= $myRevDate->format('d-m-Y');
	$subdata[]		= $row['StatusProject'];
	$subdata[]		= $row['StatusType'];
	$subdata[]		= $row['typeNote'];

	$data[]			= $subdata;
}

function get_all_data($koneksi){
	$sql = "SELECT tt.type_id AS type_id, tp.ProjectName AS ProjectName, tt.typeSupply AS typeSupply, tm.ManName AS ManName, tp2.ProductCode AS ProductCode, tc.ChasisName AS ChasisName, tc2.SizeAlias AS SizeAlias, tt.TypeStartDate AS TypeStartDate, tt.TypeFinishDate AS TypeFinishDate, MAX(trt.revCode) AS revCode, MAX(trt.revDate) AS revDate, ts2.StatusAlias AS StatusProject, ts.StatusAlias AS StatusType, tt.typeNote AS typeNote FROM table_type tt 
	LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
	LEFT JOIN table_product tp2 ON tt.prd_id = tp2.prd_id
	LEFT JOIN table_chasis tc ON tt.cha_id = tc.cha_id
	LEFT JOIN table_capacity tc2 ON tt.siz_id = tc2.siz_id
	LEFT JOIN table_manpower tm ON tp.man_id = tm.man_id 
	LEFT JOIN table_status ts ON tt.sta_id = ts.sta_id 
	LEFT JOIN table_status ts2 ON tp.sta_id = ts2.sta_id 
	LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id
	WHERE assign = 1  GROUP BY tt.type_id";
	$result = mysqli_query($koneksi, $sql);
	return mysqli_num_rows($result);
}

$json_data = array(
	"draw"				=>	intval($_POST['draw']),
	"recordsTotal"		=> 	get_all_data($koneksi),
	"recordsFiltered"	=> 	$number_filter_row,
	"data"				=> 	$data
);

echo json_encode($json_data);
?>