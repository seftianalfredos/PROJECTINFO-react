<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'GroupID', 'GroupName', 'GroupNote' );

$sql 		= "SELECT *FROM table_group WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND(GroupID LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR GroupName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR GroupNote LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT *FROM table_group";
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
	//$subdata[]	= '<input type="radio" name="cek" class="cek" id="cek" data-id ="'.$row['grp_id'].'" value="'.$row['grp_id'].'" >';
	// $subdata[]	= $row['GroupID'];
	$subdata[]	= $row['grp_id'];
	$subdata[]	= $row['GroupName'];
	$subdata[]	= $row['GroupNote'];

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