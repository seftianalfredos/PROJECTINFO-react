<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'tit_id', 'TitleName', 'TitleCategory', 'name', 'TitleNotes');

$sql 		= "SELECT tt.tit_id AS tit_id, tt.TitleName AS TitleName , tt.TitleCategory AS TitleCategory, td.name AS name, tt.TitleNotes AS TitleNotes FROM table_title tt JOIN table_department td ON tt.DepartementID = td.DepartementID WHERE 1 = 1 ";
$result		= mysqli_query($koneksi,$sql);	

if (!empty($request['search']['value'])) {
    $sql.= " AND (tt.tit_id LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tt.TitleName LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tt.TitleCategory LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR td.name LIKE '%".$request['search']['value']."%' ";
    $sql.= " OR tt.TitleNotes LIKE '%".$request['search']['value']."%' )";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql = "SELECT tt.tit_id AS tit_id, tt.TitleName AS TitleName , tt.TitleCategory AS TitleCategory, td.name AS name, tt.TitleNotes AS TitleNotes FROM table_title tt JOIN table_department td ON tt.DepartementID = td.DepartementID";
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
	//$subdata[]	= '<input type="radio" name="cektit" id="cektit" data-id ="'.$row['tit_id'].'" value="'.$row['tit_id'].'" >';
	// $subdata[]	= $row['TitleID'];
	$subdata[]	= $row['tit_id'];
	$subdata[]	= $row['TitleName'];
	$subdata[]	= $row['TitleCategory'];
	$subdata[]	= $row['name'];
	$subdata[]	= $row['TitleNotes'];

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