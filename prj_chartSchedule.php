<?php
session_start();
$currentmenu = "2";
if(!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");
  exit();

}else{

  if (isset($_GET['inputTypeID'])) {
    $vId = $_GET['inputTypeID'];
  }

  if ($vId != '') {
    include 'config.php';
    $data = array();
    $stmt = $DBcon->prepare("SELECT *FROM table_schedule ts JOIN table_design td ON ts.dsgn_id = td.dsgn_id WHERE type_id = :id");
    $stmt->bindParam(':id', $vId);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[] = $row['DesignName'];
      $subdata[] = date("d m Y", strtotime($row['startDate']));
      $subdata[] = date("d m Y", strtotime($row['endDate']));
      $subdata[] = $row['PIC'];

      $data[] = $subdata;
    }
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
    <script src="_chosen/chosen.jquery.js"></script>
    <script src="_jscript/calendar/js/bootstrap.min.js"></script>

    <script src="gantt/codebase/dhtmlxgantt.js"></script>
    <link rel="stylesheet" type="text/css" href="gantt/codebase/dhtmlxgantt.css">
    <script src="gantt/samples/common/testdata.js"></script>

    <link href='_jscript/calendar/css/fullcalendar.css' rel='stylesheet' />
    <link href="_jscript/calendar/css/bootstrap-mod.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
    <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
    <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
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
      border: solid 1px #faa;
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


    .area1{border:0px solid  #f00; width: 400px; padding:2px;}
    .area2{border:0px solid  #0f0; width: 120px; }
    .area3{border:0px solid  #00f; width: 260px; }
    .area4{border:0px solid  #ff0; width: 60px; }
    .area5{border:0px solid  #f00; width: 500px; padding:2px;}
    .area6{border:0px solid  #f00; width: 1000px; padding:2px;}
    .area7{border:0px solid  #f00; width: 700px; padding:2px;}



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
          <li id="tab1a"><a>Line Up</a></li>
          <li id="tab1b"><a>Queue</a></li>
          <li id="tab1c"><a>Note</a></li>
          <li id="tab1d"><a>Reschedule</a></li>
          <li class="current" id="tab1e"><a href="#tab_sche">Schedule</a></li>
          <li id="tab1f"><a>Monitor</a></li>
        </ul>

        <div id="tab1d" class="tab-content">
          <ul class="tabs left">
            <li><a href="psi_project.php#tab_sche"><i>Data</i></a></li>
            <li class="current"><a href="#tab_schgantt"><i>Gantt</i></a></li>
          </ul>


          <div id="tab_schgantt" class="tab-content">
            <table class="psi_width7" border="0" align="left">
              <tr>
                <td class="left">
                  <div class="col_12"></div>
                  <div class="col_12">        


                    <div class="container area7">

                        <div id="gantt_here" style='width:1600px; height:400px;'></div>

                    </div>

                  </div>
                </td>
              </tr>
            </table>
          </div>

        </div>

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



<script>
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }

</script>

<script>

  var tasks = {
    data: [
      {
        id: 1,
        text: "<?php echo $data[0][0] ?>",
        start_date: "<?php echo $data[0][1] ?>", 
        end_date: "<?php echo $data[0][2] ?>"
      },
      {
        id: 2, 
        text: "<?php echo $data[1][0] ?>", 
        start_date: "<?php echo $data[1][1] ?>", 
        end_date: "<?php echo $data[1][2] ?>"
      },
      {
        id: 3, 
        text: "<?php echo $data[2][0] ?>", 
        start_date: "<?php echo $data[2][1] ?>", 
        end_date: "<?php echo $data[2][2] ?>"
      },
      {
        id: 4, 
        text: "<?php echo $data[3][0] ?>", 
        start_date: "<?php echo $data[3][1] ?>", 
        end_date: "<?php echo $data[3][2] ?>"
      },
      {
        id: 5, 
        text: "<?php echo $data[4][0] ?>", 
        start_date: "<?php echo $data[4][1] ?>", 
        end_date: "<?php echo $data[4][2] ?>"
      }
    ]
  };

  gantt.config.drag_move = false;
  gantt.config.drag_progress = false;
  gantt.config.drag_resize = false;
  gantt.config.show_links = false;
  gantt.config.readonly = true;
  gantt.init("gantt_here");


  gantt.parse(tasks);

</script>



</body>
</html>
<?php 
}
?>