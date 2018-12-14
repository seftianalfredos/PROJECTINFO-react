<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'ChasisID', 'ChasisName', 'ProductName', 'ChasisNote' );

$sql 		= "SELECT table_chasis.cha_id AS cha_id, table_chasis.ChasisID AS ChasisID, table_chasis.ChasisName AS ChasisName, table_product.ProductName AS ProductName, table_chasis.ChasisNote AS ChasisNote FROM table_chasis JOIN table_product ON table_chasis.prd_id = table_product.prd_id  WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (table_chasis.ChasisID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_chasis.ChasisName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_product.ProductName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_chasis.ChasisNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT table_chasis.cha_id AS cha_id, table_chasis.ChasisID AS ChasisID, table_chasis.ChasisName AS ChasisName, table_product.ProductName AS ProductName, table_chasis.ChasisNote AS ChasisNote FROM table_chasis JOIN table_product ON table_chasis.prd_id = table_product.prd_id";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."  ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}

$data = array();
while ($row = mysqli_fetch_array($result)) {
	$subdata	= array();
	$subdata[]	= '';
	//$subdata[]	= '<input type="radio" name="cekcha" class="cekcha" id="cekcha" data-id ="'.$row['cha_id'].'" value="'.$row['cha_id'].'" >';
	// $subdata[]	= $row['ChasisID'];
	$subdata[]	= $row['ChasisName'];
	$subdata[]	= $row['ProductName'];
	$subdata[]	= $row['ChasisNote'];
	$subdata[]	= $row['cha_id'];

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