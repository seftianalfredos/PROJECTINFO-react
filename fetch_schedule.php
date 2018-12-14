<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'type_id', 'typeSupply');

$sql	= "SELECT  tt.type_id AS type_id, tt.typeSupply AS typeSupply FROM table_schedule ts LEFT JOIN table_type tt ON ts.type_id = tt.type_id WHERE 1 = 1 ";

$result	= mysqli_query($koneksi, $sql);

if (!empty($request['search']['value'])) {
	$sql.= " AND (tt.type_id LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tt.typeSupply LIKE '%".$request['search']['value']."%' ) GROUP BY tt.type_id";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql	= "SELECT  tt.type_id AS type_id, tt.typeSupply AS typeSupply FROM table_schedule ts LEFT JOIN table_type tt ON ts.type_id = tt.type_id GROUP BY tt.type_id ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " 	LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}


$data 	= array();
while ($row = mysqli_fetch_array($result)) {
	$subdata		=	array();
	$subdata[]		= 	'';
	$subdata[]		= 	$row['type_id'];
	$subdata[]		= 	$row['typeSupply'];

	$data[]			= 	$subdata;
}

$json_data = array(
	"draw"				=>	intval($request['draw']),
	"recordsTotal"		=> 	intval($totalData),
	"recordsFiltered"	=> 	intval($totalFilter),
	"data"				=> 	$data
);

echo json_encode($json_data);
?>