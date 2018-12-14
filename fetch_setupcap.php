<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'SizeID', 'SizeName', 'SizeAlias', 'ProductName', 'SizeNote' );

$sql 		= "SELECT table_capacity.siz_id AS siz_id, table_capacity.SizeID AS SizeID, table_capacity.SizeName AS SizeName, table_capacity.SizeAlias AS SizeAlias, table_product.ProductName AS ProductName, table_capacity.SizeNote AS SizeNote FROM table_capacity JOIN table_product ON table_capacity.prd_id = table_product.prd_id WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (table_capacity.SizeID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_capacity.SizeName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_capacity.SizeAlias LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_product.ProductName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_capacity.SizeNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT table_capacity.siz_id AS siz_id, table_capacity.SizeID AS SizeID, table_capacity.SizeName AS SizeName, table_capacity.SizeAlias AS SizeAlias, table_product.ProductName AS ProductName, table_capacity.SizeNote AS SizeNote FROM table_capacity JOIN table_product ON table_capacity.prd_id = table_product.prd_id";
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
	//$subdata[]	= '<input type="radio" name="cekcap" class="cekcap" id="cekcap" data-id="'.$row['siz_id'].'" value="'.$row['siz_id'].'" >';
	// $subdata[]	= $row['SizeID'];
	$subdata[]	= $row['SizeName'];
	$subdata[]	= $row['SizeAlias'];
	$subdata[]	= $row['ProductName'];
	$subdata[]	= $row['SizeNote'];
	$subdata[]	= $row['siz_id'];

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