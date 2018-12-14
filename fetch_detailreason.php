<?php 
include 'config2.php';
$DepartementID = '';

$DepartementID = intval($_REQUEST['id']);
$year 		   = strval($_REQUEST['year']);

$request = $_REQUEST;

$columns = array('', 'TitleName', 'late', 'typeSupply', 'ManName', 'GroupName', 'ProductCode');

$sql = "SELECT ttl.TitleName AS TitleName, trt.late AS late, tt.typeSupply AS typeSupply, tm.ManName AS ManName, tg.GroupName AS GroupName, tpr.ProductCode AS ProductCode
FROM table_revisitype trt 
LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id
LEFT JOIN table_type tt ON trt.type_id = tt.type_id
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_group tg ON tp.grp_id = tg.grp_id
LEFT JOIN table_manpower tm ON tp.man_id = tm.man_id
LEFT JOIN table_product tpr ON tt.prd_id = tpr.prd_id
WHERE trt.DepartementID = '$DepartementID' AND YEAR(TypeStartDate) = '$year' ";

$result	= mysqli_query($koneksi, $sql);

if (!empty($request['search']['value'])) {
	$sql.= " AND (ttl.TitleName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR trt.late LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tt.typeSupply LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tm.ManName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tg.GroupName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tpr.ProductCode LIKE '%".$request['search']['value']."%' ) ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']." "
	/*. " LIMIT ".$request['start']." ,".$request['length']." "*/;
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql	= "SELECT ttl.TitleName AS TitleName, trt.late AS late, tt.typeSupply AS typeSupply, tm.ManName AS ManName, tg.GroupName AS GroupName, tpr.ProductCode AS ProductCode
FROM table_revisitype trt 
LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id
LEFT JOIN table_type tt ON trt.type_id = tt.type_id
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_group tg ON tp.grp_id = tg.grp_id
LEFT JOIN table_manpower tm ON tp.man_id = tm.man_id
LEFT JOIN table_product tpr ON tt.prd_id = tpr.prd_id
WHERE trt.DepartementID = '$DepartementID' AND YEAR(TypeStartDate) = '$year' ";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']." "
	/*. " 	LIMIT ".$request['start']." ,".$request['length']." "*/;
	$result = mysqli_query($koneksi,$sql);		
}

$data 	= array();
$a = 0;
while ($row  = mysqli_fetch_array($result)) {
	$subdata 	= array();
	$subdata[]	= 1 + $a;
	$subdata[]	= $row['TitleName'];
	$subdata[]	= $row['late'].' M';
	$subdata[]	= $row['typeSupply'];
	$subdata[]	= $row['ManName'];
	$subdata[]	= $row['GroupName'];
	$subdata[]	= $row['ProductCode'];
	$subdata[]	= '';

	$data[]		= $subdata;
	$a++;
}



$json_data = array(
	"draw"				=>	intval($request['draw']),
	"recordsTotal"		=> 	intval($totalData),
	"recordsFiltered"	=> 	intval($totalFilter),
	"data"				=> 	$data
);

echo json_encode($json_data);
?>