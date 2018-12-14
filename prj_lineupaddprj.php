<?php
session_start();
$currentmenu = "2";
// ###############################################  PROTEKSI APABILA TIDAK LOGIN #################################
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");

  exit();
}else{
// ##################################################################################### VALIDASI MARKET DOMENSTIC ATAU EXPORT ###########################################################
if (isset($_POST['market'])) {
  include 'config.php';
  $market = $_POST['market'];
  $data   = array();

  if ($market == 'Domestic') {
    $query = $DBcon->prepare("SELECT buy_id, BuyerName FROM table_buyer WHERE BuyerName = 'Domestic' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[]  = $row['buy_id'];
      $subdata[]  = $row['BuyerName'];

      $data[]   = $subdata;

    }
    echo json_encode($data);
  }else{
    $query = $DBcon->prepare("SELECT buy_id, BuyerName FROM table_buyer WHERE BuyerName != 'Domestic' ORDER BY BuyerName ASC");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[]  = $row['buy_id'];
      $subdata[]  = $row['BuyerName'];

      $data[]   = $subdata;

    }
    echo json_encode($data);
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
  <title>Project Information System 2018 - Add New Project</title>


  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>

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
    font-size:14px;
    color:000;
    padding: 3;
  }
  th {
    background-color: #fff;
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
          <li><a >Line Up</a></li>
          <li><a >Queue</a></li>
          <li><a >Note</a></li>
          <li><a >Reschedule</a></li>
          <li><a >Schedule</a></li>
          <li><a >Monitor</a></li>
        </ul>

        <div id="tab_lineup" class="tab-content">
          <ul class="tabs left">
            <li><a href="#tab_lineup_prj">Project</a></li>
            <li><a >Type</a></li>
          </ul>



          <div id="tab_lineup_prj" class="tab-content">
            <ul class="tabs left">
              <li><a href="#tab_lineup_addprj">Add New Project&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
            </ul>
            <div id="tab_lineup_addprj" class="tab-content">


              <table class="psi_width600" border="0">
                <tr>
                  <td>
                    <div class="col_3">Group Product</div>
                    <div class="col_4">
                      <select id="grp_prd" name="grp_prd" class="grp_prd" readonly>
                        <option value="-" selected disabled>--</option>
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_groupproduct ORDER BY group_ProductName ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value='<?php echo $row['gp_id']; ?>'><?php echo $row['group_ProductName']; ?></option>
                          <?php 
                        } 
                        ?>  
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Product</div>
                    <div class="col_4">
                      <select id="prd" name="prd" class="prd" readonly>
                        <option value="-" selected disabled>--</option>
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_product ORDER BY ProductName ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value='<?php echo $row['prd_id']; ?>'><?php echo $row['ProductName']; ?></option>
                          <?php 
                        } 
                        ?>  
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Project Name</div>
                    <div class="col_4"><input type="text" id="prj"/></div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="col_3">Market</div>
                    <div class="col_4">
                      <select id="mar" name="mar" class="mar">
                        <option value="-" selected disabled>--</option> 
                        <option>Domestic</option>         
                        <option>Export</option>
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Group Project</div>
                    <div class="col_4">
                      <select id="grp_prj" name="grp_prj" class="grp_prj" readonly>
                        <option value="-" selected disabled>--</option>
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_group ORDER BY GroupName ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value='<?php echo $row['grp_id']; ?>'><?php echo $row['GroupName']; ?></option>
                          <?php 
                        } 
                        ?> 
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Buyer</div>
                    <div class="col_4">
                      <select id="buy" name="buy" class="buy" readonly>
                        <option value="-" selected disabled>--</option>
                      </select>

                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Status Project</div>
                    <div class="col_4">
                      <select id="sts" name="sts" class="sts" readonly>
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_status where sc_id = 6 ORDER BY StatusName ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value='<?php echo $row['sta_id']; ?>'><?php echo $row['StatusName']; ?></option>
                          <?php 
                        } 
                        ?> 
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Date Start</div>
                    <div class="col_4"><input type="text" id="datestart" readonly></div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Date Plan Finish</div>
                    <div class="col_4"><input type="text" id="datefinish" readonly></div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Project Leader</div>
                    <div class="col_4">
                      <select id="pl" name="pl" class="pl" readonly>
                        <option value="-" selected disabled>--</option>
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_manpower WHERE Otorisasi = 'PL' ORDER BY ManName ASC ");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value='<?php echo $row['man_id']; ?>'><?php echo $row['ManName']; ?></option>
                          <?php 
                        } 
                        ?> 
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Ordered by</div>
                    <div class="col_4">
                      <select id="ord" name="ord" class="ord" readonly>
                        <option value="-" selected disabled>--</option>
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_manpower WHERE Otorisasi IN ('PM', 'MKT', 'CEO') ORDER BY ManName ASC ");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value='<?php echo $row['ManName']; ?>'><?php echo $row['ManName']; ?></option>
                          <?php 
                        } 
                        ?> 
                      </select>
                    </div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="col_3">Note</div>
                    <div class="col_6"><textarea type="text" id="note" class="addproject" style="margin: 0px; width: 350px; height: 64px;" /></textarea></div>
                    <div class="col_3">&nbsp;</div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="col_3">
                      <ul class="button-bar">
                        <li title="Reset value" id="reseticon" ><a><i class="fa fa-sync fa-sm"></i> Reset Value</a></li>
                      </ul>
                    </div>
                    <div class="col_4"><button id="addnewprj" class="medium buttonr psi_button1"><i class="fa fa-save"></i>&nbsp;&nbsp;Add New</button></div>
                    <div class="col_5">&nbsp;</div>
                  </td>
                </tr>
              </table>
            </div>
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



  <script>
// VALIDASI KALENDER TANGGAL FINISH !< DARI TANGGAL START ##########
$(document).ready(function() {

  $( "#datestart" ).datepicker({ 
    dateFormat  : 'dd MM yy',
    changeMonth : true,
    changeYear  : true,
    onSelect    : function(date) {
      var df        = $('#datefinish');
      var startDate = $(this).datepicker('getDate');
      var minDate = $(this).datepicker('getDate');  
      df.datepicker('setDate', minDate);
      df.datepicker('option', 'minDate', minDate);
      $(this).datepicker('option', 'minDate', minDate);
    } 
  });

  $( "#datefinish" ).datepicker({ 
    dateFormat  : 'dd MM yy',
    changeMonth : true,
    changeYear  : true
  });
});
// #################################################################

$(document).ready(function(){
  $('#grp_prd').focus();
  $('#backicon').on('click', function(e){
    window.location.href = "psi_project.php#tab_lineup_prj";
  });
});

$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  window.location.href = "psi_project.php#tab_lineup_prj";
}
});

$("#reseticon").click(function() {
  $('#grp_prd, #prd, #mar, #grp_prj, #buy, #pl, #ord, #sts').prop('selectedIndex',0);
  $("#prj, #datestart, #datefinish, #note").val("");
});


// BUAT SAVE
$(document).ready(function() {
  $('#addnewprj').on('click',function() {
    var gp_id             = $('#grp_prd').val();
    var prd_id            = $('#prd').val();
    var ProjectName       = $('#prj').val();
    var ProjectMarket     = $('#mar').val();
    var grp_id            = $('#grp_prj').val();
    var buy_id            = $('#buy').val();
    var sta_id            = $('#sts').val();
    var ProjectStartDate  = $('#datestart').val();
    var ProjectFinishDate = $('#datefinish').val();   
    var man_id            = $('#pl').val();
    var ordered_by        = $('#ord').val();
    var ProjectNote       = $('#note').val();    


    if (!gp_id) {
      swal({   
        showConfirmButton: false,
        title   : "Fail !",
        text    : "Kolom Group Product belum di isi.",
        icon    : "success",
        type    : "warning",
        timer   : 1500,
      });
    }else if(!prd_id){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Product belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!ProjectName){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Project belum di Upload", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!ProjectMarket){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Project Market belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!grp_id){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Group Project belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!buy_id){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Buyer belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!sta_id){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Status belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!ProjectStartDate){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Project Start Date belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!ProjectFinishDate){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Project End Date belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!man_id){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Project Leader by belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!ordered_by){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Ordered by belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!ProjectNote){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Kolom Note belum di isi", icon    : "success", type    : "warning", timer   : 1500 });
    } else {
      $.ajax({
        type      : "POST",
        url       : "_saveaddprj.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          gp_id             : gp_id,
          prd_id            : prd_id,
          ProjectName       : ProjectName,
          ProjectMarket     : ProjectMarket,
          grp_id            : grp_id,
          buy_id            : buy_id,
          sta_id            : sta_id, 
          ProjectStartDate  : ProjectStartDate,
          ProjectFinishDate : ProjectFinishDate,
          man_id            : man_id,  
          ordered_by        : ordered_by,  
          ProjectNote       : ProjectNote   
        },
        success   : function(){
          swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Project baru berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500
            /*button  : "success"*/
          }, function(){
            window.location.href = "psi_project.php#tab_lineup_prj";
          });
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

$('.psi_button1').on('keydown', function(e) { 
  if (e.keyCode == 9 && event.shiftKey){
//
} else if(e.keyCode == 9 ){
  e.preventDefault()
}; 
});

//#######################################  VALIDASI AWAL BUKA HALAMAN STATUS = ACTIVE #####################
$(document).ready(function() {
  $('#sts').val(11);
});


//#######################################  VALIDASE MARKET BUAT NENTUIN BUYER #############################
$(document).ready(function() {
  $('#mar').change(function() {
    var market = $('#mar').val();

    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        market  : market
      },
      success : function(data) {
        $('#buy').html('<option value="-" selected disabled>--</option>');
        for (var i = 0; i < data.length; i++) {
          $('#buy').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
        }
      }
    });
  });
});

</script>

<!-- <script>
var formSubmitting = false;
var setFormSubmitting = function(){ 
formSubmitting = true; 
};

window.onload = function() {
window.addEventListener("beforeunload", function (e) {
if (formSubmitting) {
return undefined;
}

var confirmationMessage = 'It looks like you have been editing something. '
+ 'If you leave before saving, your changes will be lost.';
(e || window.event).returnValue = confirmationMessage; //Gecko + IE
return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
});
};
</script> -->

<script src="_jscript/js/stickmenu.js"></script>

</body>
</html>
<?php 
}
?>