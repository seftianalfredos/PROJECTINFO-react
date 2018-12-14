<ul class="tabs left">
  <li><a href="#tabdatachs">Data</a></li>
</ul>
<div id="tabdatachs" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_3">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewichs"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editichs"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delichs"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshichs"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
           
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-th fa-sm"></i></td>
              <td class="center" >
                <select name='length_change3b' id='length_change3b'>
                  <option value='AUDIO'>Audio</option>
                  <option value='VIDEO'>Video</option>
                  <option value='HP'>HP</option>
                  <option value='HOMEAPP' selected>Home Appliance</option>
                  <option value='INOV'>Inovatte</option>
                </select>
              </td>
            </tr>
          </table>
        </div>    
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter3" name="newFilter3" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change3' id='length_change3'>
                  <option value='10'>10</option>
                  <option value='20' selected>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT * FROM table_chasis");
                  $stmt->execute();
                  $baris  = $stmt->rowCount();
                  echo '<option value='.$baris.'>All</option>';
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </div> 
        <div class="col_1">&nbsp;</div>
      </td>
    </tr>
  </table>

  <div id="addnewchs">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddChassis">Add New Chassis&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddChassis" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Chassis</div>
            <div class="col_4"><input type="text" id="ChasisName" name="ChasisName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <!-- <tr>
          <td>
            <div class="col_2">Group Product</div>
            <div class="col_4">
              <select name='grp_prdCha' id='grp_prdCha' tabindex="2">
                  <option value='AUDIO'>Audio</option>
                  <option value='VIDEO'>Video</option>
                  <option value='HP'>HP</option>
                  <option value='HOMEAPP' selected>Home Appliance</option>
                  <option value='INOV'>Inovatte</option>
                </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr> -->
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_4">
              <select id='prd_idCha' name='prd_idCha' tabindex="3">
                <option>Pilih Product</option>
                <?php
                include 'config.php';
                $cekProd = $DBcon->prepare("SELECT DISTINCT prd_id, ProductName FROM table_product ORDER BY ProductName ASC");
                $cekProd->execute();
                while ($row = $cekProd->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value='<?php echo $row['prd_id']; ?>'><?php echo $row['ProductName']; ?></option>
                  <?php 
                } 
                ?>
              </select>
            </div>
            <div class="col_6 ">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Description</div>
            <div class="col_9"><input type="text" id="ChasisNote" name="ChasisNote" tabindex="4"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewchabtn" class="psi_button1" tabindex="4"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingchs">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditChassis"><span id="responsecha"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditChassis" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Chassis</div>
            <div class="col_4">
              <input type="hidden" name="editcha_id" id="editcha_id">
              <input type="text" name="editChasisName" id="editChasisName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <!-- <tr>
          <td>
            <div class="col_2">Group Product</div>
            <div class="col_4">
              <select name='grpprdCha' id='grpprdCha'>
                  <option value='AUDIO'>Audio</option>
                  <option value='VIDEO'>Video</option>
                  <option value='HP'>HP</option>
                  <option value='HOMEAPP' selected>Home Appliance</option>
                  <option value='INOV'>Inovatte</option>
                </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr> -->
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_4">
              <select id="prdIDCha">
                <?php
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT DISTINCT prd_id, ProductName FROM table_product ORDER BY ProductName ASC");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value='<?php echo $row['prd_id']; ?>'><?php echo $row['ProductName']; ?></option>
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
            <div class="col_2">Description</div>
            <div class="col_9">
              <input type="text" name="editChasisNote" id="editChasisNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editchabtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <table id="table_chs" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Chassis</th>
        <th>Product</th>
        <th>Description</th>
      </tr>
    </thead>
  </table>
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
</div> 


<script>

function ChassisFunction(){
  $('.clearcheckbox').val('');
  $('#table_chs').DataTable({
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
    "scrollY"     : 550,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "orderable" : false,
      "width"     : 5, 
      "className" : "select-checkbox"    
    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-left",
      "width"     : 60
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 180
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 600
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupchs.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_chs').DataTable();
  var oTable = $('#table_chs').DataTable();
  $('#length_change3').val(oTable.page.len());
  $('#length_change3').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter3').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_chs tbody').off('click');
  $('#table_chs tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid3" name="addid3" value="'+data[4]+'"/>');
  } );

}

//----------------------------------------------------------------Insert CHASIS
$(document).ready(function() {
  $('#addnewchabtn').on('click',function() {
    var ChasisName  = $('#ChasisName').val();
    var prd_id      = $('#prd_idCha').val();
    var ChasisNote  = $('#ChasisNote').val();

    if (!ChasisName) {
      swal("Fail !", "Nama Chasis belum terisi", "warning");
    }else if(prd_id == "Pilih Product"){
      swal("Fail !", "Pilih minimal 1 product", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddcha.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          ChasisName  : ChasisName,
          prd_id      : prd_id,
          ChasisNote  : ChasisNote,
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
          ChassisFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit CHASIS
$(document).ready(function() {
  $('#editichs').on('click',function() {
    var isCheckedCha = $("#addid3").val();
    
    if (!isCheckedCha) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingchs').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          cha_id  : isCheckedCha
        },
        success : function(data) {
          $('#responsecha').text('Edit : ' + data['ChasisID']);
          $('#editcha_id').val(data['cha_id']);
          $('#editChasisName').val(data['ChasisName']);
          $('#prdIDCha').val(data['prd_id']);
          $('#editChasisNote').val(data['ChasisNote']);
          $('#editChasisName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#editchabtn').on('click',function() {
    var cha_id      = $('#editcha_id').val();
    var ChasisName  = $('#editChasisName').val();
    var prd_id      = $('#prdIDCha').val();
    var ChasisNote  = $('#editChasisNote').val();
    
    $.ajax({
      type      : "POST",
      url       : "_ajaxeditcha.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        cha_id      : cha_id,
        ChasisName  : ChasisName,
        prd_id      : prd_id,
        ChasisNote  : ChasisNote
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
          ChassisFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete CHASIS
$(document).ready(function(){
  $('#delichs').on('click', function(e){
    var isCheckedCha = $("#addid3").val();

    if (!isCheckedCha){
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
          ajax_cha    : 1,
          cha_id2  : isCheckedCha
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Chasis "+data['ChasisName']+" dari database?",
            showCancelButton  : true, 
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Ya, Hapus saja!",
            cancelButtonText  : "Batalkan",
            closeOnConfirm    : false,
            closeOnCancel     : false
          },
          function(isConfirm) {
            window.onkeydown = previousWindowKeyDown; //<-------- this code prevent tab key not working for 2nd swal
            if (isConfirm){
              if (data['Total'] > 0) {
                swal({
                  showConfirmButton : false,
                  title : "Gagal",
                  text  : "Tidak dapat dihapus karena data telah digunakan.",
                  icon  : "error",
                  type  : "error",
                  timer : 2000
                });
              }else{
                $.ajax({
                  type  : "POST",
                  url   : "_ajaxdelcha.php",
                  cache : false,
                  async : true,
                  data  : {
                    cha_id:isCheckedCha
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Chasis berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    ChassisFunction();
                  },
                  error: function(){
                    swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
                  }
                });
              }
            }else{
              swal({   
                showConfirmButton: false,
                title   : "",
                timer   : 10,
              });
              $.rtnotify({
                title: "Cancel",
                message: "Item Chasis tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              ChassisFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshichs").click(function() {
  ChassisFunction();
});


</script>









