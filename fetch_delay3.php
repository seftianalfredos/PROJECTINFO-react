<?php 
include 'config2.php';
$type_id = '';

$type_id = intval($_REQUEST['id']);

$request = $_REQUEST;

$columns = array('' , 'TitleName', 'start_date', '');

$sql = "SELECT DISTINCT ttl.TitleName AS TitleName, SUBSTRING(tn.start_date, 1, 10) AS start_date
FROM table_notes tn
LEFT JOIN table_title ttl ON tn.tit_id = ttl.tit_id
LEFT JOIN table_type tt ON tn.type_id = tt.type_id
LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE TitleName LIKE 'Problem%' AND tt.type_id = '$type_id' ";

$result	= mysqli_query($koneksi, $sql);

if (!empty($request['search']['value'])) {
	$sql.= " AND (ttl.TitleName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tn.start_date LIKE '%".$request['search']['value']."%' ) ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT DISTINCT ttl.TitleName AS TitleName, SUBSTRING(tn.start_date, 1, 10) AS start_date
	FROM table_notes tn
	LEFT JOIN table_title ttl ON tn.tit_id = ttl.tit_id
	LEFT JOIN table_type tt ON tn.type_id = tt.type_id
	LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE TitleName LIKE 'Problem%' AND tt.type_id = '$type_id' ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " 	LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}

$data 	= array();
$a = 0;
while ($row  = mysqli_fetch_array($result)) {
	$subdata 	= array();
	$subdata[]	= 1 + $a;
	$subdata[]	= $row['TitleName'];
	$noteDate	= DateTime::createFromFormat('Y-m-d', $row['start_date']);
	$subdata[]	= $noteDate->format('d-m-Y');
	$subdata[]	= '';

	$data[]		= $subdata;
	$a++;
}

$json_data = array(
	"draw"				=>	intval($request['draw']),
	"recordsTotal"		=> 	intval($totalData),
	"recordsFiltered"	=> 	intval($totalFilter),
	"data"				=> 	$data
);

echo json_encode($json_data);
?>