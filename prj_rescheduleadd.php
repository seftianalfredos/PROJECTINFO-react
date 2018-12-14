<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");

if (isset($_POST['type_id'])) {
  include 'config.php';
  $revCode  = '';
  $id = $_POST['type_id'];
  $query  = $DBcon->prepare("SELECT revCode, revDate FROM table_revisitype WHERE type_id = '$id' ORDER BY revCode DESC LIMIT 1");
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $revCode  = $row['revCode'];

    $tempcode = substr($revCode, 1,2);
    $tempcode++;

    if ($tempcode < 10) {
      $tempcode = 'R0'.$tempcode;
    }else{
      $tempcode = 'R'.$tempcode;
    }

    $res = array(
      'revCode' => $tempcode,
      'revDate' => date("d F Y", strtotime($row['revDate']))
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
  <title>Project Information System 2018 - Add Reschedule</title>


  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>
  <script src="_chosen/chosen.jquery.js"></script>

  <link href='_jscript/calendar/css/fullcalendar.css' rel='stylesheet' />
  <link href="_jscript/calendar/css/bootstrap-mod.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
  <link href="_chosen/chosen.css" rel="stylesheet">

  <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
  <link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">



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
    font: normal 13px/100%;
    color:000;
    padding: 3;
  }

  select {
    font: normal 13px/100% ;
    outline: 0;
    width: 100%;
    border-radius:5px;
    color: #000;
  }

  textarea{
    margin: 0px;
    width: 258px;
    height: 80px;
  }

    th {
    background-color: #fff;
  }

  .input1 { width: 130px; }
  .input2 { width: 206px; }

  .area1{border:1px solid  #fff; width: 400px; padding:2px;}
  .area2{border:0px solid  #f00; width: 120px; }
  .area3{border:0px solid  #f00; width: 260px; }
  .area4{border:0px solid  #f00; width: 60px; }


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
          <li><a >Line Up</a></li>
          <li><a >Queue</a></li>
          <li><a >Note</a></li>
          <li class="current"><a >Reschedule</a></li>
          <li><a >Schedule</a></li>
          <li><a >Monitor</a></li>
        </ul>




        <div id="tab_reschedule_type" class="tab-content">
          <ul class="tabs left">
            <li><a href="#tab_lineup_addprj">Rescheduling &nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm" style="color: #aa0000;"></i></a></li>
          </ul>
          <div id="tab_lineup_addprj" class="tab-content">
            <table class="psi_width7" border="0" align="left">
              <div class="col_6 area1">



                <div class="col_4 ">Type</div>
                <div class="col_8 ">

                  <select name="resche_type" class="form-control" id="resche_type" >
                    <option></option>
                    <?php
                    include 'config.php';
                    $stmt   = $DBcon->prepare("SELECT *FROM table_type");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <option value="<?php echo $row['type_id']; ?>"><?php echo $row['typeSupply']; ?></option>
                      <?php 
                    } 
                    ?>   
                  </select>

                </div>

                <div class="col_4 ">Revision</div>
                <div class="col_8 "><input type="text" id="resche_rev" disabled /></div>

                <div class="col_4 ">Revision Date</div>
                <div class="col_8 "><input type="text" id="resche_rdate" readonly /></div>

                <div class="col_4 ">Departement</div>
                <div class="col_8 ">
                  <select name="title" id="resche_departement">
                    <option value="-" selected disabled>--</option>
                    <?php
                    include 'config.php';
                    $stmt2  = $DBcon->prepare("SELECT *FROM table_department WHERE name != '--' ORDER BY name ASC  ");
                    $stmt2->execute();
                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <option value="<?php echo $row['DepartementID']; ?>"><?php echo $row['name']; ?></option>
                      <?php 
                    } 
                    ?>  
                  </select>
                </div>

                <div class="col_4 ">Reason</div>
                <div class="col_8 ">
                  <select name="title" id="resche_reason">
                    <option value="-" selected disabled>--</option>
                    <?php
                    include 'config.php';
                    $stmt2  = $DBcon->prepare("SELECT tit_id, TitleName FROM table_title WHERE TitleCategory LIKE 'Revisi%' AND tit_id != '$tit_id' ");
                    $stmt2->execute();
                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <option value="<?php echo $row['tit_id']; ?>"><?php echo $row['TitleName']; ?></option>
                      <?php 
                    } 
                    ?>  
                  </select>
                </div>

                <div class="col_4 ">Note</div>
                <div class="col_8 "><textarea id="resche_note" /></textarea></div>

                <div class="col_12"><button id="addreschedule" class="medium buttonr psi_button1"><i class="fa fa-save"></i>&nbsp;&nbsp;Add New</button></div>




                <div class="col_6 area1">
                  <div class="col_12">&nbsp;</div>
                  <div class="col_12">&nbsp;</div>
                  <div class="col_12">&nbsp;</div>
                  <div class="col_12">&nbsp;</div>
                </div>
              </table>
            </div>
          </div>
        </td>
      </tr>
    </table>


    <script>
      // $(function(){
      //         $('#resche_rdate').datepicker({
      //           dateFormat  : 'dd MM yy',
      //           changeMonth : true,
      //           changeYear  : true,
      //           onSelect    : function(date) {
      //             var rd  = $('#resche_rdate');
      //             var minDate = $(this).datepicker('getDate');
      //             rd.datepicker('setDate', minDate);
      //             rd.datepicker('option', 'minDate', minDate);
      //             $(this).datepicker('option', 'minDate', minDate);

      //           }
      //         });
      // });


      $("#resche_type").chosen().change(function() {
        var v = $(this).val();
      });

      $(document).ready(function() {
        $('#resche_type').change(function() {
          var vId   = $(this).val();

          $.ajax({
            type    : "POST",
            dataType: "JSON",
            data    : {
              type_id  : vId
            },
            success : function(data) {
              $('#resche_rev').val(data['revCode']);
              $('#resche_rdate').val(data['revDate']);
              $('#resche_rdate').datepicker({
                dateFormat  : 'dd MM yy',
                changeMonth : true,
                changeYear  : true,
                onSelect    : function(date) {
                  var rd  = $('#resche_rdate');
                  var minDate = data['revDate'];
                  rd.datepicker('setDate', minDate);
                  rd.datepicker('option', 'minDate', minDate);
                  $(this).datepicker('option', 'minDate', minDate);

                }
              });
            }
          });

        });
      });

      $(document).ready(function(){
        $('#backicon').on('click', function(e){
          window.location.href = "psi_project.php#tab_resche";
        });
      });

// Insert
      $(document).ready(function() {
        $('#addreschedule').on('click',function() {
          var type_id       = $('#resche_type').val();
          var revCode       = $('#resche_rev').val();
          var revDate       = $('#resche_rdate').val();
          var DepartementID = $('#resche_departement').val();
          var tit_id        = $('#resche_reason').val();
          var reason        = $('#resche_note').val();

          // alert(revDate);

          $.ajax({
            type      : "POST",
            url       : "_saveresceduletype.php",
            cache     : false,
            async     : true,
            dataType  : "text",
            data      : {
              type_id       : type_id,
              revCode       : revCode,
              revDate       : revDate,
              tit_id        : tit_id,
              DepartementID : DepartementID,
              reason        : reason,
            },
            success   : function(){
              swal({   
                // showConfirmButton: false,
                title   : "",
                text    : "Revisi baru berhasil ditambahkan.",
                icon    : "success",
                type    : "success",
                // timer   : 1000,
                button  : "success"
              }, function(){
                window.location.href = "psi_project.php#tab_resche";
              });
            },
            error     : function(){
              swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
            }
          });



        });
      });


$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  window.location.href = "psi_project.php#tab_resche";  
}
});

    </script>
    <script src="_jscript/js/stickmenu.js"></script>
  </body>
  </html>