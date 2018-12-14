<?php 
include 'config2.php';
$type_id = '';

$type_id = intval($_REQUEST['id']);

$request = $_REQUEST;

$columns = array('' , 'revCode', 'revDate', 'late', 'reason', '');

$sql = "SELECT *FROM table_revisitype WHERE type_id = '$type_id' ";

$result	= mysqli_query($koneksi, $sql);

if (!empty($request['search']['value'])) {
	$sql.= " AND (revCode LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR revDate LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR late LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR reason LIKE '%".$request['search']['value']."%' ) ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql	= "SELECT *FROM table_revisitype WHERE type_id = '$type_id' ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " 	LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}

$data 	= array();
$a = 0;
while ($row  = mysqli_fetch_array($result)) {
	$subdata 		= array();
	$subdata[]		= 1 + $a;
	$subdata[]		= $row['revCode'];
	$revisionDate 	= DateTime::createFromFormat('Y-m-d', $row['revDate']);
	$subdata[]		= $revisionDate->format('d-m-Y');
	$subdata[]		= $row['late'].' M';
	$subdata[]		= $row['reason'];
	$subdata[]		= '';
	
	$data[]			= $subdata;
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