<ul class="tabs left">
  <li><a href="#tabdatasta">Data</a></li>
</ul>
<div id="tabdatasta" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewista"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editista"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delista"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshista"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter10" name="newFilter10" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change10' id='length_change10'>
                  <option value='10'>10</option>
                  <option value='20' selected>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_status");
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


  <div id="addnewsta">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddStatus">Add New Status&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddStatus" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Status</div>
            <div class="col_4"><input type="text" id="StatusName" name="StatusName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Alias</div>
            <div class="col_2"><input type="text" id="StatusAlias" name="StatusAlias" placeholder="3 Digit" tabindex="2" maxlength="3"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Category</div>
            <div class="col_4">
              <select name='StatusCategory' id='StatusCategory' tabindex="3">
                  <option value='--' selected>--</option>
                  <?php 
                  include 'config.php';
                  $stmt = $DBcon->prepare("SELECT *FROM table_stacategory ORDER BY name ASC");
                  $stmt->execute();
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['sc_id'] ?>"><?php echo $row['name']; ?></option>
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
            <div class="col_2">Note</div>
            <div class="col_5"><input type="text" id="StatusNote" name="StatusNote" tabindex="2"></div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewstabtn" class="psi_button1" tabindex="3"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <div id="editingsta">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditStatus"><span id="responsesta"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditStatus" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Status</div>
            <div class="col_5">
              <input type="hidden" name="editsta_id" id="editsta_id">
              <input type="text" name="editStatusName" id="editStatusName">
            </div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Alias</div>
            <div class="col_2">
              <input type="text" name="editStatusAlias" id="editStatusAlias" maxlength="3">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Category</div>
            <div class="col_2">
              <select name='editStatusCategory' id='editStatusCategory' tabindex="3">
                  <?php 
                  include 'config.php';
                  $stmt = $DBcon->prepare("SELECT *FROM table_stacategory ORDER BY name ASC");
                  $stmt->execute();
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['sc_id'] ?>"><?php echo $row['name']; ?></option>
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
            <div class="col_2">Note</div>
            <div class="col_5">
              <input type="text" name="editStatusNote" id="editStatusNote">
            </div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editstabtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <table id="table_sta" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <th>sta_id</th>
        <th>Status</th>
        <th>Alias</th>
        <th>Category</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
    </tbody>
  </table>
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
</div>




<script>
function StaFunction(){
  $('.clearcheckbox').val('');
  $('#table_sta').DataTable({
    "dom"         : "rtip",
    "destroy"     : true,
    "processing"  : true,
    "pageLength"  : 20,
    "scrollX"     : true,
    "scrollY"     : true,
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
      "visible" : false,
      "width"     : 5
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 150
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-center",
      "width"     : 60
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 50
    },{ 
      "targets"   : [ 5 ], 
      "className" : "dt-left",
      "width"     : 640
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupsta.php',
      type  : 'POST'
    }
  });


//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_sta').DataTable();
  var oTable = $('#table_sta').DataTable();
  $('#length_change10').val(oTable.page.len());
  $('#length_change10').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter10').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_sta tbody').off('click');
  $('#table_sta tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid9" name="addid9" value="'+data[1]+'"/>');
  } );

}




//----------------------------------------------------------------Insert STATUS
$(document).ready(function() {
  $('#addnewstabtn').on('click',function() {
    var StatusName      = $('#StatusName').val();
    var StatusAlias     = $('#StatusAlias').val();
    var StatusNote      = $('#StatusNote').val();
    var sc_id           = $('#StatusCategory').val();

    if (!StatusName) {
      swal("Fail !", "Nama Status belum terisi", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddsta.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          StatusName  : StatusName,
          StatusAlias : StatusAlias,
          StatusNote  : StatusNote,
          sc_id  : sc_id,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Status baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          StaFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit STATUS
$(document).ready(function() {
  $('#editista').on('click',function() {
    var isCheckedSta = $("#addid9").val();

    if (!isCheckedSta) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingsta').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          sta_id  : isCheckedSta
        },
        success : function(data) {
          $('#responsesta').text('Edit Status : ' + data['StatusName']);
          $('#editsta_id').val(data['sta_id']);
          $('#editStatusName').val(data['StatusName']);
          $('#editStatusAlias').val(data['StatusAlias']);
          $('#editStatusCategory').val(data['StatusCategory']);
          $('#editStatusNote').val(data['StatusNote']);
          $('#editStatusName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#editstabtn').on('click',function() {
    var sta_id       = $('#editsta_id').val();
    var StatusName   = $('#editStatusName').val();
    var StatusAlias  = $('#editStatusAlias').val();
    var sc_id        = $('#editStatusCategory').val();
    var StatusNote   = $('#editStatusNote').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditsta.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        sta_id      : sta_id,
        StatusName  : StatusName,
        StatusAlias : StatusAlias,
        sc_id : sc_id,
        StatusNote  : StatusNote
      },
      success   : function(){
        $.rtnotify({
          title     : "Berhasil",
          message   : "Data Status berhasil diubah.",
          type      : "success",
          permanent : false,
          timeout   : 4,
          fade      : true,
          width     : 300
        });
          StaFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete STATUS
$(document).ready(function(){
  $('#delista').on('click', function(e){
    var isCheckedSta = $("#addid9").val();

    if (!isCheckedSta){
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
          ajax_sta    : 1,
          sta_id2  : isCheckedSta
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Status "+data['StatusName']+" dari database?",
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
              if (data['Total_prj'] > 0 || data['Total_type'] > 0) {
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
                  url   : "_ajaxdelsta.php",
                  cache : false,
                  async : true,
                  data  : {
                    sta_id:isCheckedSta
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Status berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    StaFunction();
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
                message: "Item Status tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              StaFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshista").click(function() {
  StaFunction();
});



</script>