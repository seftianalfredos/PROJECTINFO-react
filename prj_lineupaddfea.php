<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");
include 'config.php';
$type_id =  '';
$prd_id  =  '';


if (isset($_GET['idType'])) {
  $vId  = $_GET['idType'];
}

if ($vId != '') {
  $stmt = $DBcon->prepare("SELECT *FROM table_type WHERE type_id = :type_id");
  $stmt->bindParam(':type_id', $vId);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $type_id  = $row['type_id'];
    $prd_id   = $row['prd_id'];
  }
}

?>
<!--###############################################################################################  HTML  ###############################################################################################-->

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
  <script type="text/javascript" src="_jscript/js/jquery.uploadPreview.js"></script>

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
    font-family:"Segoe UI";
    color:000;
    padding: 3;

  }

  th.headfea {
    font-size: 0.8em;
    background-color: #efefef;
    font-style: normal;
    padding: 2;
    border: solid 1px #eee;
    border-radius:0px;
  }

  select {
    border: solid 1px #faa;
    font: normal 14px/100% "Open Sans300",  Verdana, Tahoma, sans-serif;
    outline: 0;
    width: 100%;
    border-radius:5px;
    color: #000;
  }

  textarea{
    margin: 0px;
    width: 258px;
    height: 80px;
    border: solid 1px #faa;
  }


  .input1 { width: 130px; }
  .input2 { width: 206px; }

  .area1{border:1px solid  #fff; width: 400px; padding:2px;}
  .area2{border:0px solid  #f00; width: 120px; }
  .area3{border:0px solid  #f00; width: 260px; }
  .area4{border:0px solid  #f00; width: 60px; }

  .psi_button1 {
  width: 240px;
  }

  div.dataTables_wrapper {
  width: 902px;
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
          <li class="current"><a >Queue</a></li>
          <li><a >Note</a></li>
          <li><a >Reschedule</a></li>
          <li><a >Schedule</a></li>
          <li><a >Monitor</a></li>
        </ul>



        <div id="tab_lineup_type" class="tab-content">
          <ul class="tabs left">
            <li><a ><i>Add New Type</i></a></li>
            <li><a ><i>Specification</i></a></li>
            <li class="current"><a href="#tab_lineup_addfea"><i>Features</i></a></li>
            <li><a ><i>Teamwork</i></a></li>
          </ul>

          <!--############################################################################################  LIST  ############################################################################################-->

          <div id="tab_lineup_addfea" class="tab-content">

            <ul class="tabs left">
              <li><a href="#tab_spec_fealist"><i>Feature List</i></a></li>
              <li><a href="#tab_spec_addfea"><i>Add/Remove Feature List</i></a></li>
            </ul>
            <div id="tab_spec_fealist" class="tab-content">

              <table id="tab_fealist" class="display" style="width:903px">
                <thead>
                  <tr>
                    <th class="headfea" width="20"></th>
                    <th class="headfea" width="200">Feature</th>
                    <th class="headfea" width="600">Note</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'config.php';

                  $stmt = $DBcon->prepare("SELECT *FROM table_featurespec tfs JOIN table_feature tf ON tfs.fea_id = tf.fea_id WHERE type_id = :type_id");
                  $stmt->bindParam(':type_id', $type_id);
                  $stmt->execute();
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr >
                      <td><i class="fa fa-check fa-sm"></i></td>
                      <td><?php echo  $row['FeatureName']; ?></td>
                      <td></td>
                    </tr>
                    <?php 
                  } 
                  ?>
                </tbody>
              </table>
              <div class="col_6 area2">
                <button class="buttonnext" id="addfeature"><i class="fa fa-plus fa-sm"></i>&nbsp;&nbsp;Add/Remove</button>
              </div>  
              <div class="col_6 area2">
                <button class="buttonnext" id="next">Next&nbsp;&nbsp;<i class="fa fa-chevron-circle-right fa-sm"></i></button>
              </div>   
            </div>

            <!-- ####################################### ADD AND REMOVE ######################################################################-->

            <div id="tab_spec_addfea" class="tab-content">

              <table id="tab_addremove" class="display" style="width:903px">
                <thead>
                  <tr>
                    <th class="headfea" width="20"></th>
                    <th class="headfea" width="200">Feature</th>
                    <th class="headfea" width="600">Note</th>
                  </tr>
                </thead>
                <tbody>
                      <div class="col_6 area3"><input class="input2" type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>
                  <?php
                  include 'config.php';

                  $stmt = $DBcon->prepare("SELECT * FROM table_featurespec tfs JOIN table_feature tf ON tfs.fea_id = tf.fea_id WHERE type_id = :type_id");
                  $stmt->bindParam(':type_id', $type_id);
                  $stmt->execute();

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr >
                      <td><input type="checkbox" id="cekFea" name="cekFea[]" value="<?php echo $row['fea_id'] ?>" checked></td>
                      <td><?php echo $row['FeatureName']; ?></td>
                      <td></td>
                    </tr>    
                    <?php 
                  }

                  $stmt2 = $DBcon->prepare("SELECT fea_id, FeatureName FROM table_feature WHERE prd_id = :prd_id AND fea_id NOT IN(SELECT fea_id FROM table_featurespec WHERE type_id = :type_id) ");
                  $stmt2->bindParam(':type_id', $type_id);
                  $stmt2->bindParam(':prd_id', $prd_id);
                  $stmt2->execute();

                  while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr >
                      <td><input type="checkbox" id="cekFea" name="cekFea[]" value="<?php echo $row2['fea_id'] ?>"></td>
                      <td><?php echo $row2['FeatureName']; ?></td>
                      <td></td>
                    </tr>      
                    <?php 
                  }
                  ?>  
                </tbody>
              </table>

              <div class="col_6 area2">
                <button class="buttonnext" id="savefea"><i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save</button>
              </div>

              <div class="col_6 area2">
                <button class="buttonnext" id="finish">Finish-Next&nbsp;&nbsp;<i class="fa fa-chevron-circle-right fa-sm"></i></button>
              </div>

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
</td>
</tr>
</table>



<script>
  $( function() {
    $( "#datestart" ).datepicker({ dateFormat: 'dd MM yy' });
    $( "#datefinish" ).datepicker({ dateFormat: 'dd MM yy' });
  });

  $("#next").click(function() {
    var itypeid = $('#new_typeid').val();
    window.location.href = "prj_lineupaddteam.php?idType="+itypeid;
  });

  $("#addfeature").click(function() {
    window.location.hash = "tab_spec_addfea";
    window.location.reload(true);
  });


  $(document).ready(function() {
    $('#savefea').on('click',function() {
      var itypeid = $('#new_typeid').val();

      var iFea  = new Array();
      $('#cekFea:checked').each(function() {
        iFea.push($(this).val());
      });


      $.ajax({
        type      : "POST",
        url       : "_savefeature.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          type_id : itypeid,
          cekFea  : iFea
        },
        success   : function(){
          swal({
          	showConfimButton : false,
          	title   : "Berhasil",
            text    : "Daftar feature berhasil diperbarui.",
            icon    : "success",
            type    : "success",
            timer   : 1000,
          }, function(){
            window.location.hash = "tab_spec_fealist";
            window.location.reload(true);
          });
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    });
  });


  $('#finish').on('click',function() {
    var itypeid = $('#new_typeid').val();

    var iFea  = new Array();
    $('#cekFea:checked').each(function() {
    	iFea.push($(this).val());
    });

    $.ajax({
      type      : "POST",
      url       : "_savefeature.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        type_id : itypeid,
        cekFea  : iFea
      },
      success   : function(){
        swal({
          showConfimButton : false,
          title   : "Berhasil",
          text    : "Daftar feature berhasil diperbarui.",
          icon    : "success",
          type    : "success",
          timer   : 1000,
        }, function(){
          window.location.href = "prj_lineupaddteam.php?idType="+itypeid;
        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });


function FeatureListFunc(){
  $('#tab_fealist').DataTable({
    "dom"         : "rtip",
    "bAutoWidth"  : false,     
    "order"       : [[0, "asc"]],
    "bPaginate"   : false,
    "scrollX"     : true,
    "scrollY"     : 350,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "className" : "dt-left",
      "width"     : 300    
    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-left",
      "orderable" : false,
      "width"     : 600
    }
    ]
  });
}

function AddFeaFunc(){
  $('#tab_addremove').DataTable({
    "dom"         : "rtip",
    "bAutoWidth"  : false,     
    "order"       : [[0, "asc"]],
    "bPaginate"   : false,
    "binfo"       : false,
    "scrollX"     : true,
    "scrollY"     : 350,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "className" : "dt-left",
      "orderable" : false,
      "width"     : 5,
   
    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-left",
      "orderable" : false,
      "width"     : 300
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "orderable" : false,
      "width"     : 600
    }
    ]
  });
}




$(document).ready(function(){
  FeatureListFunc();
  AddFeaFunc();
});

$(document).ready(function() {
    $('#tab_addremove tr').click(function(event) {
        if (event.target.type !== 'checkbox') {
            $(':checkbox', this).trigger('click');
        }
    });
});




</script>


<script src="_jscript/js/stickmenu.js"></script>
</body>
</html>
