<?php
session_start();
$currentmenu = "2";
include 'config.php';
$type_id = '';

if (isset($_GET['idType'])) {
  $vId  = $_GET['idType'];
}

if ($vId != '') {
  $stmt = $DBcon->prepare("SELECT *FROM table_type WHERE type_id = :type_id");
  $stmt->bindParam(':type_id', $vId);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $type_id = $row['type_id'];
  }
}


if (isset($_POST['ajax'])&&isset($_POST['team_id'])) {
  include 'config.php';
  $id = $_POST['team_id'];
  $query  = $DBcon->prepare("SELECT *FROM table_team WHERE team_id = '$id' ");
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $json_data = array(
      "team_id"     => $row['team_id'],
      "engineer"    => $row['engineer'],
      "functional"  => $row['functional'],
      "design"      => $row['design'],
      "subdesign"   => $row['subdesign'],
      "jobdesc"     => $row['jobdesc']
    );
    echo json_encode($json_data);
  }
  exit();
}
?>

<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Project Assistance - Add TeamWork</title>

<script src="_jscript/js/jquery.min.js"></script>
<script src="_jscript/js/kickstart.js"></script>
<script src="_jscript/js/jquery-ui.js"></script>
<script src="_jscript/js/sweetalert.min.js"></script>
<script src="_jscript/js/jquery.rtnotify.js"></script>
<script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="_jscript/js/jquery.uploadPreview.js"></script>
<script src="_datatables/datatable/js/dataTables.select.js"></script>

<link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="_datatables/datatable/css/select.dataTables.css">
<link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
<link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
<link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
<link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">
<link rel="stylesheet" href="_jscript/css/jquery.rtnotify.css" media="all" />

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

div.dataTables_wrapper {
  width: 904px;
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
          <li><a>Line Up</a></li>
          <li class="current"><a >Queue</a></li>
          <li><a>Note</a></li>
          <li><a>Reschedule</a></li>
          <li><a>Schedule</a></li>
          <li><a>Monitor</a></li>
        </ul>
        <div id="tab_lineup_type" class="tab-content">
          <ul class="tabs left">
            <li><a><i>Add New Type</i></a></li>
            <li><a><i>Specification</i></a></li>
            <li><a><i>Features</i></a></li>
            <li class="current"><a href="#tab_lineup_addteam"><i>Teamwork</i></a></li>
          </ul>

          <div id="tab_lineup_addteam" class="tab-content">
            <table class="psi_width1000" border="0">
              <tr>
                <td>
                  <div class="col_2">
                    
                      <ul class="button-bar">
                      <li title="Add New" id="addnewiteam"><a><i class="fa fa-plus fa-sm"></i></a></li>
                      <li title="Edit" id="edititeam"><a><i class="fa fa-pencil fa-sm"></i></a></li>
                      <li title="Delete" id="deliteam"><a><i class="fa fa-trash fa-sm"></i></a></li>
                      <li title="Refresh" id="refreshiteam"><a><i class="fa fa-sync fa-sm"></i></a></li>
                      </ul>
                    
                  </div>
                  <div class="col_1">&nbsp;</div>
                  <div class="col_8">
                    <ul class="button-bar">
                      <li title="Finish" id="finish"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish & Done</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            </table>

            <div id="addnewteam">
              <ul class="tabs left">
                <li id="aaa"><a href="#TabAddTeam">Add Member&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
              </ul>
              <div id="TabAddTeam" class="tab-content">
                <table class="psi_width600" border="0">
                  <tr>
                    <td>
                      <div class="col_2">Engineer</div>
                      <div class="col_4">
                        <select id="add_team_eng" name="add_team_eng" class="input2">
                          <option value="-" selected disabled>--</option>
                          <?php
                          include 'config.php';
                          $stmt = $DBcon->prepare("SELECT * FROM table_manpower WHERE Otorisasi = 'engineer' ORDER BY ManName ASC ");
                          $stmt->execute();
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option><?php echo $row['ManName']; ?></option>
                            <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                      <div class="col_6"><input type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">Functional</div>
                      <div class="col_4">
                        <select id="add_team_func" name="add_team_func" class="input2">
                          <option value="-" selected disabled>--</option>
                          <?php
                          include 'config.php';
                          $stmt = $DBcon->prepare("SELECT * FROM table_manpower ORDER BY ManName ASC ");
                          $stmt->execute();
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option><?php echo $row['ManName']; ?></option>
                            <?php 
                          } 
                          ?> 
                        </select>
                      </div>
                      <div class="col_6">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">Design</div>
                      <div class="col_4"><input type="text" id="add_team_design" /></div>
                      <div class="col_6 ">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">SubDesign</div>
                      <div class="col_4"><input type="text" id="add_team_subdesign" /></div>
                      <div class="col_6">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">Job Description</div>
                      <div class="col_9"><textarea type="text" id="add_team_job" /></textarea></div>
                      <div class="col_1">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2"></div>
                      <div class="col_2"><button id="addteam" class="psi_button1" tabindex="6"><i class="fa fa-save fa-sm"></i> Save</button></div>
                      <div class="col_8">&nbsp;</div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div id="editingteam">
              <ul class="tabs left">
                <li id="bbb"><a href="#TabEditTeam"><span id="responseteam"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
              </ul>
              <div id="TabEditTeam" class="tab-content">
                <table class="psi_width600" border="0">
                  <tr>
                    <td>
                      <div class="col_2">Engineer</div>
                      <div class="col_4">
                        <select id="editEngineer">
                          <?php
                          include 'config.php';
                          $stmt = $DBcon->prepare("SELECT * FROM table_manpower");
                          $stmt->execute();
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option><?php echo $row['ManName']; ?></option>
                            <?php 
                          } 
                          ?>
                        </select>
                      </div>
                      <div class="col_6">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">Functional</div>
                      <div class="col_4">
                        <select id="editFunctional">
                          <?php
                          include 'config.php';
                          $stmt = $DBcon->prepare("SELECT * FROM table_manpower");
                          $stmt->execute();
                          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option><?php echo $row['ManName']; ?></option>
                            <?php 
                          } 
                          ?>
                        </select>
                      </div>
                      <div class="col_6">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">Design</div>
                      <div class="col_4"><input type="text" id="editDesign"/></div>
                      <div class="col_6">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">SubDesign</div>
                      <div class="col_4"><input type="text" id="editSubdesign"/></div>
                      <div class="col_6">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">Job Description</div>
                      <div class="col_9"><textarea type="text" id="editJobdesc" /></textarea></div>
                      <div class="col_1">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="col_2">&nbsp;</div>
                      <div class="col_2"><button id="saveteam" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
                      <div class="col_8">&nbsp;</div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <table id="example" class="display" style="width:905px">
              <thead>
                <tr>
                  <th></th>
                  <th>Engineer</th>
                  <th>Functional</th>
                  <th>Design</th>
                  <th>Sub Design</th>
                  <th>Job Description</th>
                </tr>
              </thead>
            </table>
            <table>
              <tr>
                <td></td>
              </tr>
            </table>
            <table>
              <tr>
                <td height="15" ></td>
              </tr>
              <tr>
                <td height="15" ></td>
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
$("#addnewteam, #editingteam").hide();
$("#addnewiteam").click(function() { $("#addnewteam").show(300);  });
$("#edititeam").click(function()   { $("#editingteam").show(300); });
$("#edititeam, #deliteam, #refreshiteam").click(function()   { $("#addnewteam").hide(300);  });
$("#addnewiteam, #deliteam, #refreshiteam").click(function() { $("#editingteam").hide(300); });

$(document).ready(function(){
  TeamworkFunction();
});

function TeamworkFunction(){
  $('.clearcheckbox').val('');
  var itypeid = $('#new_typeid').val();
  $('#example').DataTable({
    "dom"         : "rtip",
    "destroy"     : true,
    "processing"  : true,
    "pageLength"  : 20,
    "serverSide"  : true,
    "stateSave"   : true,
    "select"      : { style :  "single", selector: "td" },
    "bAutoWidth"  : false,     
    "order"       : [[1, "asc"]],
    "scrollX"     : true,
    "scrollY"     : 250,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "orderable" : false,
      "width"     : 5,
      "className" : "select-checkbox"    

    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-center",
      "width"     : 125
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 5 ], 
      "className" : "dt-left",
      "width"     : 400
    }
    ],
    "ajax"        : {
      url   : 'fetchteam.php',
      type  : 'POST',
      data  : {type_id : itypeid}
    }
  });

  var table = $('#example').DataTable();
  $('#example tbody').off('click');
  $('#example tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid" name="addid" value="'+data[6]+'"/>');
  } );
}

//--------------------------------------------------------------------Insert Team
$(document).ready(function() {
  $('#addteam').on('click',function() {
    var itypeid       = $('#new_typeid').val();
    var iEngineer     = $('#add_team_eng').val();
    var iFunctional   = $('#add_team_func').val();
    var iDesign       = $('#add_team_design').val();
    var iSubDesign    = $('#add_team_subdesign').val();
    var iJobDesc      = $('#add_team_job').val();

    if (!iEngineer) {
      swal("Fail !", "Silakan isi field yang masih kosong", "warning");
    } else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxsaveaddteam.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          type_id     : itypeid,
          engineer    : iEngineer,
          functional  : iFunctional,
          design      : iDesign,
          subdesign   : iSubDesign,
          jobdesc     : iJobDesc
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Chassis baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
            TeamworkFunction();
            ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

////--------------------------------------------------------------------Edit Teamwork
$(document).ready(function() {
  $('#edititeam').on('click',function() {
    var isChecked = $("#addid").val();

    if (!isChecked) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingteam').hide(200);
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          team_id  : isChecked
        },
        success : function(data) {
          //$('#responseteam').text('Edit : ' + data['team_id']);
          $('#responseteam').text('Edit');
          $('#editEngineer').prepend('<input type="hidden" id="editID" value="'+data['team_id']+'"><option selected="selected">'+data['engineer']+'</option>');
          $('#editFunctional').prepend('<option selected="selected">'+data['functional']+'</option>');
          $('#editDesign').val(data['design']);
          $('#editSubdesign').val(data['subdesign']);
          $('#editJobdesc').text(data['jobdesc']);
        }
      });
    }
  });
});

$(document).ready(function() {
  $('#saveteam').on('click',function() {
    var iteamid      = $('#editID').val();
    var iEngineer    = $('#editEngineer').val();
    var iFunctional  = $('#editFunctional').val();
    var iDesign      = $('#editDesign').val();
    var iSubDesign   = $('#editSubdesign').val();
    var iJobDesc     = $('#editJobdesc').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditteam.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        team_id     : iteamid,
        engineer    : iEngineer,
        functional  : iFunctional,
        design      : iDesign,
        subdesign   : iSubDesign,
        jobdesc     : iJobDesc
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Chassis berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          TeamworkFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

////--------------------------------------------------------------------Delete Teamwork
$(document).ready(function(){
  $('#deliteam').on('click', function(e){
    var isChecked = $("#addid").val();

    if (!isChecked){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan dihapus",
        type    : "info",
        timer   : 1000,
      });
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          team_id  : isChecked
        },
        success : function(data){
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Chassis : "+data['ChasisName']+" dari database?",
            showCancelButton  : true, 
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Ya, Hapus saja!",
            cancelButtonText  : "Batalkan",
            closeOnConfirm    : false,
            closeOnCancel     : false
          },
          function(isConfirm){
            window.onkeydown = previousWindowKeyDown; //<-------- this code prevent tab key not working for 2nd swal
            if (isConfirm) {
              $.ajax({
                type  : "POST",
                url   : "_ajaxdelteam.php",
                cache : false,
                async : true,
                data  : {
                team_id:isChecked
                },
                success: function(){
                  swal({   
                    showConfirmButton: false,
                    title   : "",
                    timer   : 10,
                  });
                  $.rtnotify({
                    title: "Berhasil",
                    message: "Item Teamwork berhasil dihapus.",
                    type: "success",
                    permanent: false,
                    timeout: 4,
                    fade: true,
                    width: 300
                  });
                  TeamworkFunction();
                },
                error: function(){
                  swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
                }
              });
            } else {
              swal({   
                showConfirmButton: false,
                title   : "",
                timer   : 10,
              });
              $.rtnotify({
                title: "Cancel",
                message: "Item Teamwork tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              TeamworkFunction();
            }
          });
        }
      });
    }
  });
});

$("#refreshiteam").click(function() {
  TeamworkFunction();
});

function ClearAllinput(){
  $('#editEngineer').val('');
  $('#editFunctional').val('');
  $('#editDesign').val('');
  $('#editSubdesign').val('');
  $('#editJobdesc').val('');
  $("#addnewteam, #editingteam").hide(200);
}

$('#finish').on('click',function() {
  window.location.href = "psi_project.php#tab_que";
});

$(".backicon").click(function() { 
  $(" #addnewteam, #editingteam").hide(200);  
});

$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  $(" #addnewteam, #editingteam").hide(200);  
}
});


</script>
<script src="_jscript/js/stickmenu.js"></script>
</body>
</html>