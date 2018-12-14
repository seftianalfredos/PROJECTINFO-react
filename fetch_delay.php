<?php 
include 'config2.php';

$columns = array('' , 'late', 'type_id', 'typeSupply', 'TypeFinishDate', 'revDate', 'revCode', 'GroupName', 'ProjectName', 'ManName');

$sql = "SELECT DISTINCT MAX(trt.late) AS late, tt.type_id AS type_id, tt.typeSupply AS typeSupply, MIN(trt.revDate) AS TypeFinishDate, MAX(trt.revDate) AS revDate, MAX(trt.revCode) AS revCode, tg.GroupName AS GroupName, tp.ProjectName AS ProjectName, tmp.ManName AS ManName
FROM table_type tt
LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_group tg ON tp.grp_id = tg.grp_id
LEFT JOIN table_manpower tmp ON tp.man_id = tmp.man_id WHERE late != 0 ";

if (isset($_POST['is_year'])) {
	$sql.= "AND YEAR(TypeStartDate) = '".$_POST['is_year']."' ";
}


if (isset($_POST['is_pl'])) {
	if ($_POST['is_pl'] == "All") {
		$sql.= "";
	}else{
		$sql.= "AND tp.man_id = '".$_POST['is_pl']."' ";
	}
}


if (isset($_POST['is_grp'])) {
	if ($_POST['is_grp'] == "All") {
		$sql.= "";
	}else{
		$sql.= "AND tg.grp_id = '".$_POST['is_grp']."' ";
	}
}

/*if (isset($_POST['search']['value'])) {
	$sql.= "(trt.late LIKE '%".$_POST['search']['value']."%' 
	OR tt.type_id LIKE '%".$_POST['search']['value']."%' 
	OR tt.typeSupply LIKE '%".$_POST['search']['value']."%' 
	OR trt.revDate LIKE '%".$_POST['search']['value']."%' 
	OR trt.revDate LIKE '%".$_POST['search']['value']."%' 
	OR trt.revCode LIKE '%".$_POST['search']['value']."%' 
	OR tg.GroupName LIKE '%".$_POST['search']['value']."%' 
	OR tp.ProjectName LIKE '%".$_POST['search']['value']."%' 
	OR tmp.ManName LIKE '%".$_POST['search']['value']."%' ) GROUP BY typeSupply";
}*/

/*if (isset($_POST['order'])) {
	$sql .= " ORDER BY ".$columns[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']. " ";
}else{
	$sql .= " ORDER BY late DESC ";
}*/

$sql .= " GROUP BY typeSupply ";

$sql .= " ORDER BY late DESC ";

// $sql1 = " LIMIT 0, 10";

/*if ($_POST['length'] != -1) {
	$sql1 = " LIMIT ".$_POST['start'].", ".$_POST['length']." ";;
}*/


$number_filter_row = mysqli_num_rows(mysqli_query($koneksi, $sql));

// $result = mysqli_query($koneksi, $sql.$sql1);
$result = mysqli_query($koneksi, $sql);

$data = array();

$a = 0;
while ($row  = mysqli_fetch_array($result)) {
	$subdata 	= array();
	$subdata[]	= 1 + $a;
	$subdata[]	= $row['late'].' M';
	$subdata[]	= $row['type_id'];
	$subdata[]	= $row['typeSupply'];
	$FinishDate = DateTime::createFromFormat('Y-m-d', $row['TypeFinishDate']);
	$RevisiDate = DateTime::createFromFormat('Y-m-d', $row['revDate']);
	$subdata[]	= $FinishDate->format('d-m-Y');
	$subdata[]	= $RevisiDate->format('d-m-Y');
	$subdata[]	= $row['revCode'];
	$subdata[]	= $row['GroupName'];
	$subdata[]	= $row['ProjectName'];
	$subdata[]	= $row['ManName'];

	$data[]		= $subdata;
	$a++;
}

function get_all_data($koneksi){
	$sql = "SELECT DISTINCT MAX(trt.late) AS late, tt.type_id AS type_id, tt.typeSupply AS typeSupply, MIN(trt.revDate) AS TypeFinishDate, MAX(trt.revDate) AS revDate, MAX(trt.revCode) AS revCode, tg.GroupName AS GroupName, tp.ProjectName AS ProjectName, tmp.ManName AS ManName
FROM table_type tt
LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_group tg ON tp.grp_id = tg.grp_id
LEFT JOIN table_manpower tmp ON tp.man_id = tmp.man_id WHERE late != 0 GROUP BY typeSupply";
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