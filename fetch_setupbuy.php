<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'BuyerID', 'BuyerName', 'brand', 'CountryName', 'BuyerNote' );

$sql 		= "SELECT tb.buy_id AS buy_id, tb.BuyerID AS BuyerID, tb.BuyerName AS BuyerName, tb.brand AS brand, tc.CountryName AS CountryName, tb.BuyerNote AS BuyerNote FROM table_buyer AS tb JOIN table_country AS tc ON tb.con_id = tc.con_id WHERE 1 = 1";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (tb.BuyerID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tb.BuyerName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tb.brand LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tc.CountryName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tb.BuyerNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT tb.buy_id AS buy_id, tb.BuyerID AS BuyerID, tb.BuyerName AS BuyerName, tb.brand AS brand, tc.CountryName AS CountryName, tb.BuyerNote AS BuyerNote FROM table_buyer AS tb JOIN table_country AS tc ON tb.con_id = tc.con_id";
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
	//$subdata[]	= '<input type="radio" name="cekbuy" class="cekbuy" id="cekbuy" data-id="'.$row['buy_id'].'" value="'.$row['buy_id'].'" >';
	// $subdata[]	= $row['BuyerID'];
	$subdata[]	= $row['BuyerName'];
	$subdata[]	= $row['brand'];
	$subdata[]	= $row['CountryName'];
	$subdata[]	= $row['BuyerNote'];
	$subdata[]	= $row['buy_id'];

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