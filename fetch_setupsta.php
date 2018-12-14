<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'StatusID', 'StatusName', 'StatusAlias', 'name', 'StatusNote');

$sql 		= "SELECT ts.sta_id AS sta_id, ts.StatusID AS StatusID, ts.StatusName AS StatusName, ts.StatusAlias AS StatusAlias, tsc.name AS name, ts.StatusNote AS StatusNote FROM table_status ts JOIN table_stacategory tsc ON ts.sc_id = tsc.sc_id WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (ts.StatusID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ts.StatusName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ts.StatusAlias LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tsc.name LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ts.StatusNote LIKE '%".$request['search']['value']."%' ) ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT ts.sta_id AS sta_id, ts.StatusID AS StatusID, ts.StatusName AS StatusName, ts.StatusAlias AS StatusAlias, tsc.name AS name, ts.StatusNote AS StatusNote FROM table_status ts JOIN table_stacategory tsc ON ts.sc_id = tsc.sc_id";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}

$data = array();
while ($row = mysqli_fetch_array($result)) {
	$subdata	= array();
	$subdata[]	= '';
	//$subdata[]	= '<input type="radio" name="ceksta" id="ceksta" data-id ="'.$row['sta_id'].'" value="'.$row['sta_id'].'" >';
	
	$subdata[]	= $row['sta_id'];
	$subdata[]	= $row['StatusName'];
	$subdata[]	= $row['StatusAlias'];
	$subdata[]	= $row['name'];
	$subdata[]	= $row['StatusNote'];

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