<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'ProductID', 'ProductName', 'ProductCode', 'ProductNote' );

$sql 		= "SELECT *FROM table_product WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (ProductID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ProductName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ProductCode LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR ProductNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT *FROM table_product";
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
	//$subdata[]	= '<input type="radio" name="cekprd" id="cekprd" data-id ="'.$row['prd_id'].'" value="'.$row['prd_id'].'" >';
	// $subdata[]	= $row['ProductID'];
	$subdata[]	= $row['ProductName'];
	$subdata[]	= $row['ProductCode'];
	$subdata[]	= $row['ProductNote'];
	$subdata[]	= $row['prd_id'];


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