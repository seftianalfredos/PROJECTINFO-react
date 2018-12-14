<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");

include 'config.php';

if (isset($_GET['inputIDrev'])) {
  $vId = $_GET['inputIDrev'];

  if ($vId != '') {
    $tit_id         = '';
    $TitleName      = '';
    $type_id        = '';
    $typeSupply     = '';
    $revCode        = '';
    $revDate        = '';
    $DepartementID  = '';
    $reason         = '';

    $stmt   = $DBcon->prepare("SELECT ttl.tit_id AS tit_id, ttl.TitleName AS TitleName, td.DepartementID AS DepartementID, tt.type_id AS type_id, tt.typeSupply AS typeSupply, trt.revCode AS revCode, trt.revDate AS revDate, trt.reason AS reason FROM table_revisitype trt LEFT JOIN table_type tt ON trt.type_id = tt.type_id LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID WHERE revT_id = :revT_id");
    $stmt->bindParam(':revT_id', $vId);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $tit_id         = $row['tit_id'];
      $TitleName      = $row['TitleName'];
      $type_id        = $row['type_id'];
      $typeSupply     = $row['typeSupply'];
      $DepartementID  = $row['DepartementID'];
      $revCode        = $row['revCode'];
      $revDate        = $row['revDate'];
      $reason         = $row['reason'];
    }

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
            <li><a href="#tab_lineup_addprj">Rescheduling (Type) &nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm" style="color: #aa0000;"></i></a></li>
          </ul>
          <div id="tab_lineup_addprj" class="tab-content">
            <table class="psi_width7" border="0" align="left">
              <div class="col_6 area1">



                <div class="col_4 ">Type</div>
                <div class="col_8 ">
                  <input type="hidden" name="resche_revT_id" id="resche_revT_id" value="<?php echo $vId; ?>">
                  <select name="resche_type" class="form-control" id="resche_type" disabled>
                    <?php
                    include 'config.php';
                    $stmt   = $DBcon->prepare("SELECT *FROM table_type");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <option value="<?php echo $row['type_id']; ?>" selected><?php echo $row['typeSupply']; ?></option>
                      <?php 
                    } 
                    ?>
                  </select>

                </div>

                <div class="col_4 ">Revision</div>
                <div class="col_8 "><input type="text" id="resche_rev" disabled value="<?php echo $revCode; ?>" /></div>

                <div class="col_4 ">Revision Date</div>
                <div class="col_8 "><input type="text" id="resche_rdate" readonly value="<?php echo $revDate; ?>" /></div>

                <div class="col_4 ">Departement</div>
                <div class="col_8 ">
                  <select name="title" id="resche_departement">
                    <?php
                    include 'config.php';
                    $stmt2  = $DBcon->prepare("SELECT * FROM table_department ORDER BY name ASC ");
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
                    <?php
                    include 'config.php';
                    $stmt2  = $DBcon->prepare("SELECT tit_id, TitleName FROM table_title WHERE TitleCategory LIKE 'Revisi%' ");
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
                <div class="col_8 "><textarea id="resche_note" /><?php echo $reason; ?></textarea></div>

                <div class="col_12"><button id="editreschedule" class="medium buttonr psi_button1"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button></div>



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
      $(document).ready(function() {
        $('#resche_type').val(<?php echo $type_id ?>).trigger('chosen:updated');
        $('#resche_departement').val(<?php echo $DepartementID ?>);
        $('#resche_reason').val(<?php echo $tit_id ?>);
      });
    </script>


    <script>
      $( function() {
        $( "#resche_rdate" ).datepicker({ 
          dateFormat: 'dd MM yy',
          changeMonth:true,
          changeYear:true 
        });

      });


      $("#resche_type").chosen().change(function() {
        var v = $(this).val();
      });


      $(document).ready(function(){
        $('#backicon').on('click', function(e){
          window.location.href = "psi_project.php#tab_resche";
        });
      });

// EDIT 
$(document).ready(function() {
  $('#editreschedule').on('click', function() {
    var revT_id       = $('#resche_revT_id').val();
    var tit_id        = $('#resche_reason').val();
    var type_id       = $('#resche_type').val();
    var revCode       = $('#resche_rev').val();
    var revDate       = $('#resche_rdate').val();
    var reason        = $('#resche_note').val();
    var DepartementID = $('#resche_departement').val();

    $.ajax({
      type      : "POST",
      url       : "_editresche.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        revT_id       : revT_id,
        tit_id        : tit_id,
        DepartementID : DepartementID,
        type_id       : type_id,
        revCode       : revCode,
        revDate       : revDate,
        reason        : reason
      },
      success   : function(){
        swal({   
          // showConfirmButton: false,
          title   : "",
          text    : "Reschedule berhasil diubah.",
          icon    : "success",
          type    : "success",
          // timer   : 1000
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


</script>
<script src="_jscript/js/stickmenu.js"></script>
</body>
</html>