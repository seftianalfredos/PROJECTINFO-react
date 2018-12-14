<?php
session_start();
$currentmenu = "2";
// ###############################################  PROTEKSI APABILA TIDAK LOGIN #################################
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");

  exit();
}else{


// VALIDASI UNTUK EDIT PROJECT FINISH DATE KALO BELUM ADA TIPE YANG SUDAH DI ASSIGN ###############################################
if (isset($_POST['prj_id'])) {
  include 'config.php';
  $id = $_POST['prj_id'];
  $query = $DBcon->prepare("SELECT *FROM table_type WHERE prj_id = :prj_id AND assign = 1");
  $query->bindParam(':prj_id', $id);
  $query->execute();
  $jumlah = $query->rowCount();

  $res = array(
    'total' => $jumlah
  );

  echo json_encode($res);

  exit();
}

// VALIDASI UNTUK BUYER APABILA DOMENSTIC ATAU EXPORT ###########################################################################
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

// TERIMA DATA DARI HALAMAN SEBELUMNYA UNTUK DI EDIT ##############################################################################

if (isset($_GET['inputIDprj'])) {
  $vId = $_GET['inputIDprj'];
}

$man = '';
if ($vId != '') {
  $prj_id             = '';
  $ProjectName        = '';
  $man_id             = '';
  $ManName            = '';
  $prd_id             = '';
  $ProductName        = '';
  $gp_id              = '';
  $group_ProductName  = '';
  $ProjectMarket      = '';
  $grp_id             = '';
  $GroupName          = '';
  $buy_id             = '';
  $BuyerName          = '';
  $ProjectStartDate   = '';
  $ProjectFinishDate  = '';
  $sta_id             = '';
  $StatusName         = '';
  $ProjectNote        = '';
  $ordered_by         = '';

  include 'config.php';
  $query  =  $DBcon->prepare("
    SELECT tp.prj_id AS prj_id, tp.ProjectName AS ProjectName, tm.man_id AS man_id, tm.ManName AS ManName, tpr.prd_id AS prd_id, tpr.ProductName AS ProductName, tgp.gp_id AS gp_id, tgp.group_ProductName AS group_ProductName, tp.ProjectMarket AS ProjectMarket, tg.grp_id AS grp_id, tg.GroupName AS GroupName, tb.buy_id AS buy_id, tb.BuyerName AS BuyerName, tp.ProjectStartDate AS ProjectStartDate, tp.ProjectFinishDate AS ProjectFinishDate, ts.sta_id AS sta_id, ts.StatusName AS StatusName, tp.ProjectNote AS ProjectNote , tp.ordered_by AS ordered_by 
    FROM table_project tp
    JOIN table_manpower tm ON tp.man_id = tm.man_id
    JOIN table_product tpr ON tp.prd_id = tpr.prd_id
    JOIN table_groupproduct tgp ON tp.gp_id = tgp.gp_id
    JOIN table_group tg ON tp.grp_id = tg.grp_id
    JOIN table_buyer tb ON tp.buy_id = tb.buy_id
    JOIN table_status ts ON tp.sta_id = ts.sta_id
    WHERE prj_id = :prj_id
    ");
  $query->bindParam(':prj_id', $vId);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $prj_id             = $row['prj_id'];
    $ProjectName        = $row['ProjectName'];
    $man_id             = $row['man_id'];
    $ManName            = $row['ManName'];
    $prd_id             = $row['prd_id'];
    $ProductName        = $row['ProductName'];
    $gp_id              = $row['gp_id'];
    $group_ProductName  = $row['group_ProductName'];
    $ProjectMarket      = $row['ProjectMarket'];
    $grp_id             = $row['grp_id'];
    $GroupName          = $row['GroupName'];
    $buy_id             = $row['buy_id'];
    $BuyerName          = $row['BuyerName'];
    $ProjectStartDate   = date ("d F Y",strtotime($row['ProjectStartDate']));
    $ProjectFinishDate  = date ("d F Y",strtotime($row['ProjectFinishDate']));
    $sta_id             = $row['sta_id'];
    $StatusName         = $row['StatusName'];
    $ProjectNote        = $row['ProjectNote'];
    $ordered_by         = $row['ordered_by'];
  }


}
?>
<!--###########################################################################################  HTML  ###########################################################################################-->
<html>
<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Information System 2018 - Edit Item Project</title>


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
              <li><a href="#tab_lineup_editprj">Edit New Project&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
            </ul>
            <div id="tab_lineup_editprj" class="tab-content">


              <table class="psi_width600" border="0">
                <tr>
                  <td>
                    <div class="col_3">Group Product</div>
                    <div class="col_4">
                      <select id="grp_prd" name="grp_prd" class="grp_prd">
                        <?php
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_groupproduct ORDER BY group_ProductName ASC ");
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
              </tr>
              <tr>
                <td>
                  <div class="col_3">Product</div>
                  <div class="col_4">
                    <select id="prd" name="prd" class="prd">
                      <?php
                      include 'config.php';
                      $stmt = $DBcon->prepare("SELECT * FROM table_product ORDER BY ProductName ASC ");
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
                  <div class="col_4">
                    <input type="hidden" id="inputIDprj" value ='<?php echo $prj_id; ?>'/>
                    <input type="text" id="prj"/></div>
                  <div class="col_5">&nbsp;</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col_3">Market</div>
                  <div class="col_4">
                    <select id="mar" name="mar" class="mar">
                        <option value="Domestic">Domestic</option>
                        <option value="Export">Export</option>
                    </select>
                  </div>
                  <div class="col_5">&nbsp;</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col_3">Group Project</div>
                  <div class="col_4">
                    <select id="grp_prj" name="grp_prj" class="grp_prj">
                      <?php
                      include 'config.php';
                      $stmt = $DBcon->prepare("SELECT * FROM table_group ORDER BY GroupName ASC ");
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
                    <select id="buy" name="buy" class="buy">
                      <?php
                      include 'config.php';
                      $stmt = $DBcon->prepare("SELECT * FROM table_buyer ORDER BY BuyerName ASC ");
                      $stmt->execute();
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option value='<?php echo $row['buy_id']; ?>'><?php echo $row['BuyerName']; ?></option>
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
                  <div class="col_3">Status Project</div>
                  <div class="col_4">
                    <select id="sts" name="sts" class="sts">
                      <?php
                      include 'config.php';
                      $stmt = $DBcon->prepare("SELECT * FROM table_status ORDER BY StatusName ASC ");
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
                  <div class="col_4"><input type="text" id="datestart"></div>
                  <div class="col_5">&nbsp;</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col_3">Date Plan Finish</div>
                  <div class="col_4"><input type="text" id="datefinish" disabled></div>
                  <div class="col_5">&nbsp;</div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="col_3">Project Leader</div>
                  <div class="col_4">
                    <select id="pl" name="pl" class="pl">
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
                    <select id="ord" name="ord" class="ord">
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
                  <div class="col_6"><textarea type="text" id="note" class="addproject" style="margin: 0px; width: 350px; height: 64px;"/><?php echo $ProjectNote; ?></textarea></div>
                  <div class="col_3">&nbsp;</div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="col_3"></div>
                  <div class="col_4"><button id="editnewprj" class="medium buttonr psi_button1"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button></div>
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
  $('#grp_prd').focus();
  $(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  window.location.href = "psi_project.php#tab_lineup_prj";
}
});

//  PENGATURAN INPUT CALENDER ############
$( function() {

  $( "#datestart" ).datepicker({ 
    dateFormat: 'dd MM yy',
    changeMonth:true,
    changeYear: true,
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
    dateFormat: 'dd MM yy',
    changeMonth:true,
    changeYear: true 
  });
});

// #######################################
$(document).ready(function(){
  $('#backicon').on('click', function(e){
    window.location.href = "psi_project.php#tab_lineup_prj";
  });
});

$("#reseticon").click(function() {
  $('#grp_prd, #mar, #grp_prj, #buy, #sts').prop('selectedIndex',0);
  $("#prj, #datestart, #datefinish, #ord, #note").val("");
});

// BUAT SEVE EDIT DATA ################################
$(document).ready(function() {
  $('#editnewprj').on('click',function() {
    var prj_id            = $('#inputIDprj').val();
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

    $.ajax({
      type      : "POST",
      url       : "_saveeditprj.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        prj_id            : prj_id,
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
          text    : "Project berhasil diubah.",
          icon    : "success",
          type    : "success",
          timer   : 1000,
// button  : "success"
}, function(){
  window.location.href = "psi_project.php#tab_lineup_prj";
});
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

// PROTEKSI EDIT PROJECT FINISH DATE NYA YANG TADI DIATAS DIKIRIM DARI SINI DAN DITERIMA DISINI
$(document).ready(function() {
  var prj_id = $('#inputIDprj').val();

  $.ajax({
    type : "POST",
    dataType : "JSON",
    data : {
      prj_id : prj_id
    },
    success : function(data) {
      if (data['total'] == 0) {
        $('#datefinish').removeAttr('disabled');
      }else{
        $('#datefinish').prop('disabled', true);
      }
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

</script>


<!-- BUAT ISI DATA AWAL BUKA HALAMAN -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#grp_prd').val(<?php echo $gp_id ?>);
    $('#prd').val(<?php echo $prd_id ?>);
    $('#prj').val("<?php echo $ProjectName ?>");
    $('#mar').val("<?php echo $ProjectMarket ?>");
    $('#grp_prj').val(<?php echo $grp_id ?>);
    $('#sts').val(<?php echo $sta_id ?>);
    $('#datestart').val("<?php echo $ProjectStartDate ?>");
    $('#datefinish').val("<?php echo $ProjectFinishDate ?>");
    $('#pl').val(<?php echo $man_id ?>);
    $('#ord').val("<?php echo $ordered_by ?>");
  });



//AWAL HALAMAN TERBUKA
$(document).ready(function() {
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
      $('#buy').val(<?php echo $buy_id ?>);
    }
  });
});


//SAAT DIUBAH
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

<script src="_jscript/js/stickmenu.js"></script>

</body>
</html>
<?php 
}
?>