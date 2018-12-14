<?php 
include 'config2.php';
$type_id = '';

$type_id = intval($_REQUEST['id']);

$request = $_REQUEST;

$columns = array('' , 'DesignName', 'startDate', 'endDate', 'PIC');

$sql = "SELECT td.DesignName AS DesignName, ts.startDate AS startDate, ts.endDate AS endDate, ts.PIC AS PIC
FROM table_schedule ts JOIN table_design td ON ts.dsgn_id = td.dsgn_id WHERE type_id = '$type_id' ";

$result	= mysqli_query($koneksi, $sql);

if (!empty($request['search']['value'])) {
	$sql.= " AND (td.DesignName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR ts.startDate LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR ts.endDate LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR ts.PIC LIKE '%".$request['search']['value']."%' ) ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql	= "SELECT td.DesignName AS DesignName, ts.startDate AS startDate, ts.endDate AS endDate, ts.PIC AS PIC
FROM table_schedule ts JOIN table_design td ON ts.dsgn_id = td.dsgn_id WHERE type_id = '$type_id'";
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
	$subdata[]		= $row['DesignName'];
	$startDate 		= DateTime::createFromFormat('Y-m-d', $row['startDate']);
	$subdata[]		= $startDate->format('d M Y');
	$endDate 		= DateTime::createFromFormat('Y-m-d', $row['endDate']);
	$subdata[]		= $endDate->format('d M Y');
	$subdata[]		= $row['PIC'];
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