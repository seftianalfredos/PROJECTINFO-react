<?php 
include 'config2.php';

$columns = array('', 'revT_id', 'ProjectName', 'typeSupply', 'revCode', 'revDate', 'name', 'TitleName', 'reason' );

$sql	= "SELECT
trt.revT_id AS revT_id, tp.ProjectName AS ProjectName, tt.typeSupply AS typeSupply, trt.revCode AS revCode, trt.revDate AS revDate, td.name AS name, ttl.TitleName AS TitleName, trt.reason AS reason
FROM table_revisitype trt
LEFT JOIN table_type tt ON trt.type_id = tt.type_id
LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID WHERE 1=1 ";

if (isset($_POST['is_prj'])) {
	if ($_POST['is_prj'] == "All") {
		$sql.= " ";
	}else{
		$sql.= " AND tp.prj_id = '".$_POST['is_prj']."' ";
	}
}

if (isset($_POST['search']['value'])) {
	$sql.= " AND (trt.revT_id LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tt.typeSupply LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR trt.revCode LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR trt.revDate LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR td.name LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR ttl.TitleName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR trt.reason LIKE '%".$_POST['search']['value']."%' )";
}

if (isset($_POST['order'])) {
	$sql .= " ORDER BY ".$columns[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']. " ";
}else{
	$sql .= " ORDER BY tt.revT_id DESC ";
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
	$subdata[]	= $row['revT_id'];
	$subdata[]	= $row['ProjectName'];
	$subdata[]	= $row['typeSupply'];
	$subdata[]	= $row['revCode'];
	$myRevDate = DateTime::createFromFormat('Y-m-d', $row['revDate']);
	$subdata[]	= $myRevDate->format('d-m-Y');
	$subdata[]	= $row['name'];
	$subdata[]	= $row['TitleName'];
	$subdata[]	= $row['reason'];

	$data[]		= $subdata;
}

function get_all_data($koneksi){
	$sql = "SELECT
trt.revT_id AS revT_id, tp.ProjectName AS ProjectName, tt.typeSupply AS typeSupply, trt.revCode AS revCode, trt.revDate AS revDate, td.name AS name, ttl.TitleName AS TitleName, trt.reason AS reason
FROM table_revisitype trt
LEFT JOIN table_type tt ON trt.type_id = tt.type_id
LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID";
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