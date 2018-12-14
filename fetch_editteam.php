<?php 
include 'config2.php';
$type_id='';
$temptype_id='';

$temptype_id = intval($_REQUEST['type_id']);

$query = "SELECT type_id FROM table_type WHERE type_id = '$temptype_id' ";
$res = mysqli_query($koneksi, $query);
while ($rows = mysqli_fetch_array($res)) {
	$type_id = $rows['type_id'];
}

$request = $_REQUEST;

$columns = array('', 'engineer', 'functional', 'design', 'subdesign', 'jobdesc' );

$sql 		= "SELECT *FROM table_team WHERE type_id = '$type_id' ";
//$sql 		= "SELECT *FROM table_team WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND(engineer LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR functional LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR design LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR subdesign LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR jobdesc LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	// $sql = "SELECT *FROM table_team";
	$sql = "SELECT *FROM table_team  WHERE type_id = '$type_id' ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}

$data = array();
while ($row = mysqli_fetch_array($result)) {
	$subdata	= array();
	$subdata[]	= '<input type="radio" name="cekteam" class="cekteam" id="cekteam" data-id ="'.$row['team_id'].'" value="'.$row['team_id'].'" >';
	$subdata[]	= $row['engineer'];
	$subdata[]	= $row['functional'];
	$subdata[]	= $row['design'];
	$subdata[]	= $row['subdesign'];
	$subdata[]	= $row['jobdesc'];

	$data[]		= $subdata;
}

$json_data = array(
	"draw"				=>	intval($request['draw']),
	"recordsTotal"		=> 	intval($totalData),
	"recordsFiltered"	=> 	intval($totalFilter),
	"data"				=> 	$data
);

echo json_encode($json_data);
?>