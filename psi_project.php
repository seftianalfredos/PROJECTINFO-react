<?php
// ########################################################  SESSION untuk Username & Role ###########################
session_start();
$currentmenu = "2";
if(!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");
  exit();

}else{


// #######################  BUAT DI PRJ_NOTE.PHP BERHUBUNGAN CALENDER.IO FETCH DATANYA ###############################
require_once('cal_bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

// ########################################## PROTEKSI DI TAB PROJECT YANG BAGIAN EDIT DAN DELETE CUMAN BISA PM ATO PUNYA DIA ############################################

if (isset($_POST['prj_id'])) {
  include 'config.php';
  $id = $_POST['prj_id'];
  $stmt = $DBcon->prepare("SELECT man_id, ProjectName, author FROM table_project WHERE prj_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($_SESSION['role'] == "M" || $_SESSION['role'] == "AD" || $row['author'] == $_SESSION['username']) {
      $res = array(
        "Status" => "OK"
      );
      echo json_encode($res);
    }else{
      $res = array(
        "Status" => "Fail"
      );
      echo json_encode($res);
    }
  }  
  exit();
}

// ################################### PROTEKSI DELETE PROJECT APABILA SUDAH ADA TYPE YANG TERHUBUNG

if (isset($_POST['prj_id2'])) {
  include 'config.php';
  $id = $_POST['prj_id2'];
  $stmt = $DBcon->prepare("SELECT *FROM table_type WHERE prj_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $baris = $stmt->rowCount();
  if ($baris == 0) {
    $res = array(
      "Status" => "OK"
    );
    echo json_encode($res);
  }else{
    $res = array(
      "Status" => "Fail"
    );
    echo json_encode($res);
  }

  exit();
}

// ########################################## PROTEKSI DI TAB TYPE YANG BAGIAN EDIT DAN DELETE CUMAN BISA PM ATO PUNYA DIA ############################################
if (isset($_POST['type_id'])) {
  include 'config.php';
  $id = $_POST['type_id'];
  $stmt = $DBcon->prepare("SELECT tt.typeSupply AS typeSupply, tt.author AS author FROM table_type tt LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id LEFT JOIN table_manpower tmp ON tp.man_id = tmp.man_id WHERE tt.type_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($_SESSION['role'] == "M" || $_SESSION['role'] == "AD" || $row['author'] == $_SESSION['username']) {
      $res = array(
        "Status" => "OK"
      );
      echo json_encode($res);
    }else{
      $res = array(
        "Status" => "Fail"
      );
      echo json_encode($res);
    }
  }  
  exit();
}

// ########################################## PROTEKSI DI TAB QUEUE YANG BAGIAN EDIT DAN DELETE CUMAN BISA PM ATO PUNYA DIA ############################################
if (isset($_POST['que_id'])) {
  include 'config.php';
  $id = $_POST['que_id'];
  $stmt = $DBcon->prepare("SELECT tt.typeSupply AS typeSupply, tt.author AS author FROM table_type tt LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id LEFT JOIN table_manpower tmp ON tp.man_id = tmp.man_id WHERE tt.type_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($_SESSION['role'] == "M" || $_SESSION['role'] == "AD" || $row['author'] == $_SESSION['username']) {
      $res = array(
        "Status" => "OK"
      );
      echo json_encode($res);
    }else{
      $res = array(
        "Status" => "Fail"
      );
      echo json_encode($res);
    }
  }  
  exit();
}


// ########################################## PROTEKSI DI TAB NOTES YANG BAGIAN EDIT DAN DELETE CUMAN BISA PM ATO PUNYA DIA ############################################
if (isset($_POST['notes_id'])) {
  include 'config.php';
  $id = $_POST['notes_id'];
  $stmt = $DBcon->prepare("SELECT author FROM table_notes WHERE notes_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($_SESSION['role'] == "M" || $_SESSION['role'] == "AD" || $row['author'] == $_SESSION['username']) {
      $res = array(
        "Status" => "OK"
      );
      echo json_encode($res);
    }else{
      $res = array(
        "Status" => "Fail"
      );
      echo json_encode($res);
    }
  }  
  exit();
}


// ########################################## PROTEKSI DI TAB RESCHEDULE YANG BAGIAN EDIT DAN DELETE CUMAN BISA PM ATO PUNYA DIA ############################################
if (isset($_POST['revT_id'])) {
  include 'config.php';
  $id = $_POST['revT_id'];
  $stmt = $DBcon->prepare("SELECT author FROM table_revisitype WHERE revT_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($_SESSION['role'] == "M" || $_SESSION['role'] == "AD" || $row['author'] == $_SESSION['username']) {
      $res = array(
        "Status" => "OK"
      );
      echo json_encode($res);
    }else{
      $res = array(
        "Status" => "Fail"
      );
      echo json_encode($res);
    }
  }  
  exit();
}

if (isset($_POST['type_idSch'])) {
	include 'config.php';
  $data = array();
	$id = $_POST['type_idSch'];
	$stmt = $DBcon->prepare("SELECT tt.type_id AS type_id, tt.typeSupply AS typeSupply, ts.dsgn_id AS dsgn_id, ts.startDate AS startDate, ts.endDate AS endDate, ts.PIC AS PIC FROM table_schedule ts LEFT JOIN table_type tt ON ts.type_id = tt.type_id WHERE tt.type_id = '$id' ");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $subdata = array();
    $subdata[] = $row['type_id'];
    $subdata[] = $row['typeSupply'];
    $subdata[] = $row['dsgn_id'];
    $subdata[] = date("d F Y ",strtotime($row['startDate']));
    $subdata[] = date("d F Y ",strtotime($row['endDate']));
    $subdata[] = $row['PIC'];

    $data[] = $subdata;
	}
  echo json_encode($data);

	exit();
}

if (isset($_POST['typeSch'])) {
  include 'config.php';
  $id = $_POST['typeSch'];
  $stmt = $DBcon->prepare("SELECT * FROM table_schedule WHERE type_id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $baris = $stmt->rowCount();
  if ($baris == 0) {
    $res = array(
      "Status" => "OK"
    );
    echo json_encode($res);
  }else{
    $res = array(
      "Status" => "Fail"
    );
    echo json_encode($res);
  }

  exit();
}

?>
<!--############################################################################## HTML ########### -->

<html>
<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Project Information System 2018 - Notes</title>


  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>
  <script src="_jscript/js/jquery.rtnotify.js"></script>
  <script src="_jscript/js/makefixed.js"></script>
  <script src="_chosen/chosen.jquery.js"></script>


  <link href='_jscript/calendar/css/fullcalendar.css' rel='stylesheet' />
  <link href="_jscript/calendar/css/bootstrap-mod.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/select.dataTables.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
  <script src="_datatables/datatable/js/dataTables.select.js"></script>

  <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/jquery.rtnotify.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
  <link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">
  <link rel="stylesheet" href="_chosen/chosen.css">

  <style type="text/css">

  body {
    margin-top: 0px;
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    background-color:#fff; 
    align: center;
  }

  td {
    font-size:13px;
    font-family:"Segoe UI";
    color:000;
    padding: 3;
  }

  select {
    border: solid 1px #a9b5ea;
    font: normal 14px/100% "Open Sans300",  Verdana, Tahoma, sans-serif;
    outline: 0;
    width: 100%;
    border-radius:5px;
    color: #000;
  }

  .bld {
    font-weight: bold;
    background-color: #edeeed;
  }

  #calendar {
    max-width: 800px;
  }

  .col-centered{
    float: none;
    margin: 0 auto;
  }

  h2 {
    font-size: 2em; 
  }

  div.dataTables_wrapper {
    width: 1282px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }

  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
  }

  @keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }

  /* The Close Button */
  .close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    padding: 2px 16px;
    color: white;
  }

  .modal-body {
    padding: 60px 16px;
  }

  .modal-footer {
    padding: 2px 16px;
    color: white;
  }

</style>

</head>
<body>
  <center/>

  <table border="0" cellpadding="0" cellspacing="0" width="1800" height="200" bordercolor="#FF0000" bgcolor="#FFFFFF" style="border-collapse: collapse">

    <tr>
      <td width="1800" height="200" valign="top" >

        <?php
        include_once ("psi_menu.php");
        ?>

        <ul class="tabs left">
          <li id="tab1a"><a href="#tab_lineup">Line Up</a></li>
          <li id="tab1b"><a href="#tab_que">Queue</a></li>
          <li id="tab1c"><a href="#tab_note">Note</a></li>
          <li id="tab1d"><a href="#tab_resche">Reschedule</a></li>
          <li id="tab1e"><a href="#tab_sche">Schedule</a></li>
          <li id="tab1f"><a href="#tab_mon">Monitor</a></li>
        </ul>

        <!-- LINEUP PROJECT ############################################################################################# -->
        <div id="tab_lineup" class="tab-content">
          <ul class="tabs left">
            <li id="tab1a1"><a href="#tab_lineup_prj">Project</a></li>
            <li class="current" id="tab1a2"><a href="#tab_lineup_type">Type</a></li>
          </ul>
          <div id="tab_lineup_prj" class="tab-content">
            <?php
            include ("prj_lineupproject.php");
            ?>
          </div>
          <div id="tab_lineup_type" class="tab-content">
            <?php
            include ("prj_lineuptype.php");
            ?>
          </div>

        </div>

        <!-- QUEUE ############################################################################################# -->
        <div id="tab_que" class="tab-content">
          <?php
          include ("prj_queuelist.php");
          ?>
        </div>


        <!-- NOTE ############################################################################################# -->
        <div id="tab_note" class="tab-content">
          <?php
          include ("prj_note.php");
          ?>
        </div>

        <!-- RESCHEDULE ############################################################################################# -->
        <div id="tab_resche" class="tab-content">
          <?php
          include ("prj_reschedule.php");
          ?>
        </div>

        <!-- SCHEDULE ############################################################################################# -->
        <div id="tab_sche" class="tab-content">
          <?php
          include ("prj_schedule.php");
          ?>
        </div>

        <div id="tab_mon" class="tab-content">Monitor</div>

      </td>
    </tr>

    <tr>
      <td width="100%" height="36" class="left">R&D - Project Information System 2018</td>
    </tr>
    <tr>
      <td width="100%" height="100" class="left"></td>
    </tr>
  </table>
</td>
</tr>
</table>

<script type="text/javascript">

  function hide_sche() {
    $('#addnewsch, #editingsch').hide();
  }

  function clearInput_sche() {
    $('#sche_type').val('-').trigger('chosen:updated');
    $('#sche_desg').val('-');
    $('#artStartDate').val('');
    $('#artEndDate').val('');
    $('#artPIC').val('-');
    $('#mechStartDate').val('');
    $('#mechEndDate').val('');
    $('#mechPIC').val('-');
    $('#cycStartDate').val('');
    $('#cycEndDate').val('');
    $('#cycPIC').val('-');
    $('#elecStartDate').val('');
    $('#elecEndDate').val('');
    $('#elecPIC').val('-');
    $('#softStartDate').val('');
    $('#softEndDate').val('');
    $('#softPIC').val('-');
  }

  $(document).ready(function() {
    hide_sche();
  });

	$(document).ready(function() {
    $('#addnewisch').click(function() {
      hide_sche();
      $('#addnewsch').show(300);
    });
	});
</script>

<script>
//sticky
window.onscroll = function(){
  myFunction()};
  var navbar = document.getElementById("navbar");
  var xnavbar = document.getElementById("xt");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky");
      xnavbar.classList.add("xsticky");

    } else {
      navbar.classList.remove("sticky");
      xnavbar.classList.remove("xsticky");
    }
  }


//act-button-fixed / flying button
$(document).ready(function(){
  $('.fixed').makeFixed();
});

</script>





</body>
</html>
<?php 
}
?>