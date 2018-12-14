<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'CountryID', 'CountryName', 'Lot', 'CountryNote' );

$sql 		= "SELECT *FROM table_country WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (CountryID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR CountryName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR Lot LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR CountryNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT *FROM table_country";
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
	//$subdata[]	= '<input type="radio" name="cekcon" id="cekcon" data-id ="'.$row['con_id'].'" value="'.$row['con_id'].'" >';
	// $subdata[]	= $row['CountryID'];
	$subdata[]	= $row['CountryName'];
	$subdata[]	= $row['Lot'];
	$subdata[]	= $row['CountryNote'];
	$subdata[]	= $row['con_id'];

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