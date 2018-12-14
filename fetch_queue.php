<?php 
include 'config2.php';

$request = $_REQUEST;

$columns = array('', 'type_id', 'ProjectName', 'ManName', 'ProductCode', 'GroupName', 'ChasisName', 'typeSupply', 'SizeAlias', 'TypeStartDate', 'TypeFinishDate', 'revCode', 'revDate', 'StatusType', 'StatusProject','typeNote');

$sql	= "SELECT DISTINCT tt.type_id AS type_id, tp.ProjectName AS ProjectName, tm.ManName AS ManName, tpr.ProductCode AS ProductCode, tg.GroupName AS GroupName, tc.ChasisName AS ChasisName, tt.typeSupply AS typeSupply, tca.SizeAlias AS SizeAlias, tt.TypeStartDate AS TypeStartDate, tt.TypeFinishDate AS TypeFinishDate, MAX(trt.revCode) AS revCode, MAX(trt.revDate) AS revDate, tst.StatusAlias AS StatusType, tsp.StatusAlias AS StatusProject, tt.typeNote AS typeNote
FROM table_type tt
LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
LEFT JOIN table_manpower tm ON tp.man_id = tm.man_id
LEFT JOIN table_product tpr ON tt.prd_id = tpr.prd_id
LEFT JOIN table_group tg ON tp.grp_id = tg.grp_id
LEFT JOIN table_chasis tc ON tt.cha_id = tc.cha_id
LEFT JOIN table_capacity tca ON tt.siz_id = tca.siz_id
LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id
LEFT JOIN table_status tst ON tt.sta_id = tst.sta_id
LEFT JOIN table_status tsp ON tp.sta_id = tsp.sta_id
WHERE tt.assign = 0 ";

$result	= mysqli_query($koneksi, $sql);

if (!empty($request['search']['value'])) {
	$sql.= " AND (tt.type_id LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tp.ProjectName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tm.ManName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tpr.ProductCode LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tg.GroupName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tc.ChasisName LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tt.typeSupply LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tca.SizeAlias LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tt.TypeStartDate LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tt.TypeFinishDate LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tst.StatusAlias LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tsp.StatusAlias LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR trt.revCode LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR trt.revDate LIKE '%".$request['search']['value']."%' ";
	$sql.= " OR tt.typeNote LIKE '%".$request['search']['value']."%' ) GROUP BY tt.type_id";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);
}else{
	$sql	= "SELECT DISTINCT tt.type_id AS type_id, tp.ProjectName AS ProjectName, tm.ManName AS ManName, tpr.ProductCode AS ProductCode, tg.GroupName AS GroupName, tc.ChasisName AS ChasisName, tt.typeSupply AS typeSupply, tca.SizeAlias AS SizeAlias, tt.TypeStartDate AS TypeStartDate, tt.TypeFinishDate AS TypeFinishDate, MAX(trt.revCode) AS revCode, MAX(trt.revDate) AS revDate, tst.StatusAlias AS StatusType, tsp.StatusAlias AS StatusProject, tt.typeNote AS typeNote
	FROM table_type tt
	LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
	LEFT JOIN table_manpower tm ON tp.man_id = tm.man_id
	LEFT JOIN table_product tpr ON tt.prd_id = tpr.prd_id
	LEFT JOIN table_group tg ON tp.grp_id = tg.grp_id
	LEFT JOIN table_chasis tc ON tt.cha_id = tc.cha_id
	LEFT JOIN table_capacity tca ON tt.siz_id = tca.siz_id
	LEFT JOIN table_revisitype trt ON tt.type_id = trt.type_id
	LEFT JOIN table_status tst ON tt.sta_id = tst.sta_id
	LEFT JOIN table_status tsp ON tp.sta_id = tsp.sta_id
	WHERE tt.assign = 0 GROUP BY tt.type_id";
	$result = mysqli_query($koneksi, $sql);
	$totalData = mysqli_num_rows($result);
	$totalFilter = $totalData;
	$sql.=" ORDER BY ".$columns[$request['order'][0]['column']]."   ".$request['order'][0]['dir']. " 	LIMIT ".$request['start']." ,".$request['length']." ";
	$result = mysqli_query($koneksi,$sql);		
}


$data 	= array();
while ($row = mysqli_fetch_array($result)) {
	$subdata	=	array();
	$subdata[]	= '';
	$subdata[]	= $row['type_id'];
	$subdata[]	= $row['ProjectName'];
	$subdata[]	= $row['ManName'];
	$subdata[]	= $row['ProductCode'];
	$subdata[]	= $row['GroupName'];
	$subdata[]	= $row['ChasisName'];
	$subdata[]	= $row['typeSupply'];
	$subdata[]	= $row['SizeAlias'];
	$myStartDate = DateTime::createFromFormat('Y-m-d', $row['TypeStartDate']);
	$myFinishDate = DateTime::createFromFormat('Y-m-d', $row['TypeFinishDate']);
	$myRevDate = DateTime::createFromFormat('Y-m-d', $row['revDate']);
	if ($myRevDate === false) {
    print_r(DateTime::getLastErrors());
}
	// $myRevDate = DateTime::createFromFormat('Y-m-d', $row['revDate'];);
//$formattedweddingdate = $myDateTime->format('d-m-Y');
	$subdata[]	= $myStartDate->format('d-m-Y');
	$subdata[]	= $myFinishDate->format('d-m-Y');
	$subdata[]	= $row['revCode'];
	// $subdata[]	= $row['revDate'];
	$subdata[]	= $myRevDate->format('d-m-Y');
	$subdata[]	= $row['StatusType'];
	$subdata[]	= $row['StatusProject'];
	$subdata[]	= $row['typeNote'];

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