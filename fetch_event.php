<?php 
include 'config2.php';


$columns = array('', 'notes_id', 'TitleName', 'description', 'start_date', 'end_date', 'ProjectName' , 'typeSupply', 'author', 'attachment' );

$sql 		= "SELECT tn.notes_id AS notes_id, tt.TitleName AS TitleName, tn.description AS description, tn.start_date AS start_date, tn.end_date AS end_date, tp.ProjectName AS ProjectName, tty.typeSupply AS typeSupply, tn.author AS author, tn.attachment AS attachment FROM table_notes tn 
LEFT JOIN table_title tt ON tn.tit_id = tt.tit_id 
LEFT JOIN table_project tp ON tn.prj_id = tp.prj_id
LEFT JOIN table_type tty ON tn.type_id = tty.type_id WHERE 1=1  ";


if (isset($_POST['is_ttl'])) {
	if ($_POST['is_ttl'] == "All") {
		$sql.= " ";
	}else{
		$sql.= " AND tt.tit_id = '".$_POST['is_ttl']."' ";
	}
}
if (isset($_POST['search']['value'])) {
	$sql.= " AND (tn.notes_id LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tt.TitleName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tn.description LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tn.start_date LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tn.end_date LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tp.ProjectName LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tty.typeSupply LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tn.author LIKE '%".$_POST['search']['value']."%' ";
	$sql.= " OR tn.attachment LIKE '%".$_POST['search']['value']."%' )";
}

if (isset($_POST['order'])) {
	$sql .= " ORDER BY ".$columns[$_POST['order'][0]['column']]."   ".$_POST['order'][0]['dir']. " ";
}else{
	$sql .= " ORDER BY tt.tit_id DESC ";
}

$sql1 = "";

if ($_POST['length'] != -1) {
	$sql1 = " LIMIT ".$_POST['start']." ,".$_POST['length']." ";
}

$number_filter_row = mysqli_num_rows(mysqli_query($koneksi, $sql));

$result = mysqli_query($koneksi, $sql.$sql1);

$data = array();
while ($row = mysqli_fetch_array($result)) {
	$subdata	= array();
	$subdata[]	= '';
	$subdata[]	= $row['notes_id'];
	$subdata[]	= $row['TitleName'];
	$subdata[]	= $row['description'];
	$myStartDate = DateTime::createFromFormat('Y-m-d', substr($row['start_date'], 0, 10));
	$myFinishDate = DateTime::createFromFormat('Y-m-d', substr($row['end_date'], 0, 10));
	$subdata[]	= $myStartDate->format('d-m-Y');
	$subdata[]	= $myFinishDate->format('d-m-Y');
	$subdata[]	= $row['ProjectName'];
	$subdata[]	= $row['typeSupply'];
	$subdata[]	= $row['author'];
	if ($row['attachment'] == '') {
		$subdata[]	=	'';
	}else{
		$subdata[]	= '<a href="_upload/notes/'.$row['attachment'].'" style="color:blue;" target=black><i class="fa fa-download"></i></a>';
	}
	$data[]		= $subdata;
}

function get_all_data($koneksi){
	$sql = "SELECT tn.notes_id AS notes_id, tt.TitleName AS TitleName, tn.description AS description, tn.start_date AS start_date, tn.end_date AS end_date, tp.ProjectName AS ProjectName, tty.typeSupply AS typeSupply, tn.author AS author, tn.attachment AS attachment FROM table_notes tn 
	LEFT JOIN table_title tt ON tn.tit_id = tt.tit_id 
	LEFT JOIN table_project tp ON tn.prj_id = tp.prj_id
	LEFT JOIN table_type tty ON tn.type_id = tty.type_id";
	$result = mysqli_query($koneksi, $sql);
	return mysqli_num_rows($result);
}

$json_data = array(
	"draw"				=>	intval($_POST['draw']),
	"recordsTotal"		=> 	get_all_data($koneksi),
	"recordsFiltered"	=> 	$number_filter_row,
	"data"				=> 	$data
);

echo json_encode($json_data);
?>