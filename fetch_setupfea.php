<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'fea_id', 'FeatureName', 'ProductName', 'FeatureNote');

$sql 		= "SELECT table_feature.fea_id AS fea_id, table_feature.FeatureName AS FeatureName, table_product.ProductName AS ProductName, table_feature.FeatureNote AS FeatureNote FROM table_feature JOIN table_product ON table_feature.prd_id = table_product.prd_id  WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (table_feature.fea_id LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_feature.FeatureName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_product.ProductName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR table_feature.FeatureNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT table_feature.fea_id AS fea_id, table_feature.FeatureName AS FeatureName, table_product.ProductName AS ProductName, table_feature.FeatureNote AS FeatureNote  FROM table_feature JOIN table_product ON table_feature.prd_id = table_product.prd_id";
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
	//$subdata[]	= '<input type="radio" name="cekfea" class="cekfea" id="cekfea" data-id ="'.$row['fea_id'].'" value="'.$row['fea_id'].'" >';
	$subdata[]	= $row['fea_id'];
	$subdata[]	= $row['FeatureName'];
	$subdata[]	= $row['ProductName'];
	$subdata[]	= $row['FeatureNote'];
	//$subdata[]	= $row['fea_id'];
	

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