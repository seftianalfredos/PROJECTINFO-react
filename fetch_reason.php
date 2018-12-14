<?php
include 'config2.php';

$columns = array('', 'DepartementID', 'Departement_name', 'Result', '');

$sql = "SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, COUNT(tt.type_id) AS Result
FROM table_revisitype trt
LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
LEFT JOIN table_type tt ON trt.type_id = tt.type_id WHERE late != 0 ";

if (isset($_POST['is_year'])) {
	$sql.= " AND YEAR(TypeStartDate) = '".$_POST['is_year']."' ";
}

$sql.=" GROUP BY td.DepartementID ";

$sql.=" ORDER BY Result DESC ";


$number_filter_row = mysqli_num_rows(mysqli_query($koneksi, $sql));

$result = mysqli_query($koneksi, $sql);

$data 	= array();

$a = 0;
while ($row = mysqli_fetch_array($result)) {
	$subdata		= array();
	$subdata[]		= 1 + $a;
	$subdata[]		= $row['DepartementID'];
	$subdata[]		= $row['Departement_name'];
	$subdata[]		= $row['Result'];
	$subdata[]		= '';

	$data[]			= $subdata;
	$a++;
}

function get_all_data($koneksi){
	$sql = "SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, COUNT(tt.type_id) AS Result
	FROM table_revisitype trt
	LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
	LEFT JOIN table_type tt ON trt.type_id = tt.type_id WHERE late != 0 GROUP BY td.DepartementID";
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