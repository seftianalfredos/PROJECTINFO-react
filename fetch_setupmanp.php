<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'ManID', 'ManName', 'Otorisasi', 'Design', 'ManEmail' );

$sql 		= "SELECT *FROM table_manpower WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (ManID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ManName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR Otorisasi LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR Design LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ManEmail LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT *FROM table_manpower";
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
	//$subdata[]	= '<input type="radio" name="cekman" id="cekman" data-id ="'.$row['man_id'].'" value="'.$row['man_id'].'" >';
	// $subdata[]	= $row['ManID'];
	$subdata[]	= $row['ManName'];
	$subdata[]	= $row['Otorisasi'];
	$subdata[]	= $row['Design'];
	$subdata[]	= $row['ManEmail'];
	$subdata[]	= $row['man_id'];

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