<?php 
include 'config2.php';

$columns = array('', 'prj_id', 'ProjectName', 'ManName', 'ProductCode', 'GroupName', 'ProjectStartDate', 'ProjectFinishDate', 'StatusAlias', 'ProjectNote');

$sql	= "SELECT tp.prj_id AS prj_id, tp.ProjectName AS ProjectName, tm.ManName AS ManName, tpr.ProductCode AS ProductCode, tg.GroupName AS GroupName, tp.ProjectStartDate AS ProjectStartDate, tp.ProjectFinishDate AS ProjectFinishDate, ts.StatusAlias AS StatusAlias, tp.ProjectNote AS ProjectNote FROM table_project tp 
JOIN table_manpower tm ON tp.man_id = tm.man_id 
JOIN table_product tpr ON tp.prd_id = tpr.prd_id  
JOIN table_group tg ON tp.grp_id = tg.grp_id 
JOIN table_buyer tb ON tp.buy_id = tb.buy_id 
JOIN table_status ts ON tp.sta_id = ts.sta_id ";

if (isset($_POST['is_pl'])) {
	if ($_POST['is_pl'] == "All") {
		$sql.= " ";
	}else{
		$sql.= " WHERE tp.man_id = '".$_POST['is_pl']."' ";
	}
}

if (isset($_POST['search']['value'])) {
	$sql.= " AND (tp.prj_id LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tm.ManName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tpr.ProductCode LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tg.GroupName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectStartDate LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectFinishDate LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR ts.StatusAlias LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectNote LIKE '%".$_POST['search']['value']."%' ) ";
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
	$subdata	=	array();
	$subdata[]	= '';
	$subdata[]	= $row['prj_id'];
	$subdata[]	= $row['ProjectName'];
	$subdata[]	= $row['ManName'];
	$subdata[]	= $row['ProductCode'];
	$subdata[]	= $row['GroupName'];
	$myStartDate = DateTime::createFromFormat('Y-m-d', $row['ProjectStartDate']);
	$myFinishDate = DateTime::createFromFormat('Y-m-d', $row['ProjectFinishDate']);
//$formattedweddingdate = $myDateTime->format('d-m-Y');
	$subdata[]	= $myStartDate->format('d-m-Y');
	$subdata[]	= $myFinishDate->format('d-m-Y');
	$subdata[]	= $row['StatusAlias'];
	$subdata[]	= $row['ProjectNote'];

	$data[]		= $subdata;
}

function get_all_data($koneksi){
	$sql = "SELECT tp.prj_id AS prj_id, tp.ProjectName AS ProjectName, tm.ManName AS ManName, tpr.ProductCode AS ProductCode, tg.GroupName AS GroupName, tp.ProjectStartDate AS ProjectStartDate, tp.ProjectFinishDate AS ProjectFinishDate, ts.StatusAlias AS StatusAlias, tp.ProjectNote AS ProjectNote FROM table_project tp 
	JOIN table_manpower tm ON tp.man_id = tm.man_id 
	JOIN table_product tpr ON tp.prd_id = tpr.prd_id  
	JOIN table_group tg ON tp.grp_id = tg.grp_id 
	JOIN table_buyer tb ON tp.buy_id = tb.buy_id 
	JOIN table_status ts ON tp.sta_id = ts.sta_id";
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