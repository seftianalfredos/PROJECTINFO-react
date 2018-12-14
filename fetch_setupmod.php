<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'ModelID', 'ModelName', 'ProductName');

$sql 		= "SELECT table_model.mdl_id AS mdl_id, table_model.ModelID AS ModelID, table_model.ModelName AS ModelName, table_product.ProductName AS ProductName FROM table_model JOIN table_product ON table_model.prd_id = table_product.prd_id  WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (table_model.ModelID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_model.ModelName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_product.ProductName LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT table_model.mdl_id AS mdl_id, table_model.ModelID AS ModelID, table_model.ModelName AS ModelName, table_product.ProductName AS ProductName FROM table_model JOIN table_product ON table_model.prd_id = table_product.prd_id";
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
	//$subdata[]	= '<input type="radio" name="cekmod" class="cekmod" id="cekmod" data-id ="'.$row['mdl_id'].'" value="'.$row['mdl_id'].'" >';
	// $subdata[]	= $row['ModelID'];
	$subdata[]	= $row['ModelName'];
	$subdata[]	= $row['ProductName'];
	$subdata[]	= $row['mdl_id'];

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