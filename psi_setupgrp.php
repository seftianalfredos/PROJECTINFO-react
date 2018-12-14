<ul class="tabs left">
  <li><a href="#tabdatagpr">Data</a></li>
</ul>
<div id="tabdatagpr" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewigrp"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editigrp"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="deligrp"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshigrp"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</span></div>
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter1" name="newFilter1" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change1' id='length_change1'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_group");
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

  <div id="addnewgrp">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddGroup">Add New Group&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddGroup" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_1">Name</div>
            <div class="col_4"><input type="text" id="GroupName" name="GroupName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">Note</div>
            <div class="col_10"><input type="text" id="GroupNote" name="GroupNote" tabindex="2"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">&nbsp;</div>
            <div class="col_2"><button id="addnew" class="psi_button1" tabindex="3"><i class="fa fa-save fa-sm" ></i> Save</button></div>
            <div class="col_9">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editinggrp">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditGroup"><span id="response"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditGroup" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_1">Name</div>
            <div class="col_4">
              <input type="hidden" name="editgrp_id" id="editgrp_id">
              <input type="" name="editGroupName" id="editGroupName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">Note</div>
            <div class="col_10">
              <input type="text" name="editGroupNote" id="editGroupNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">&nbsp;</div>
            <div class="col_2"><button id="editgrpbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_9">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <table id="example" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <th>id</th>
        <th>Name</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
</div>


<script>

function GroupFunction(){
  $('.clearcheckbox').val('');
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
      "width"     : 140
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 700,
    }
    ],
      "ajax"        : {
        url   : 'fetch_setupgroup.php',
        type  : 'POST'
      }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#example').DataTable();
  var oTable = $('#example').DataTable();
  $('#length_change1').val(oTable.page.len());
  $('#length_change1').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter1').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#example tbody').off('click');
  $('#example tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid1" name="addid1" value="'+data[1]+'"/>');
  } );

}

//----------------------------------------------------------------Insert GROUP
$(document).ready(function() {
  $('#addnew').on('click',function() {
    var GroupName = $('#GroupName').val();
    var GroupNote = $('#GroupNote').val();

    if (!GroupName) {
      swal("Fail !", "Nama Group belum terisi", "warning");
    } else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddgrp.php",
        cache     : false,
        async     : true,
        dataType  : "JSON",
        data      : {
          GroupName : GroupName,
          GroupNote : GroupNote,
        },
        success   : function(data){
          $.rtnotify({
            title: "Berhasil",
            message: "Group baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          GroupFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit GROUP
$(document).ready(function() {
  $('#editigrp').on('click',function() {
    var isChecked = $("#addid1").val();

    if (!isChecked) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editinggrp').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          grp_id  : isChecked
        },
        success : function(data) {
          $('#response').html('Editing : ' + data['GroupID']);
          $('#editgrp_id').val(data['grp_id']);
          $('#editGroupName').val(data['GroupName']);
          $('#editGroupNote').val(data['GroupNote']);
          $('#editGroupName').focus();
        }
      });
    }
  });
});

$(document).ready(function() {
  $('#editgrpbtn').on('click',function() {
    var grp_id    = $('#editgrp_id').val();
    var GroupName = $('#editGroupName').val();
    var GroupNote = $('#editGroupNote').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditgrp.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        grp_id    : grp_id,
        GroupName : GroupName,
        GroupNote : GroupNote
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Group berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          GroupFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete GROUP
$(document).ready(function(){
  $('#deligrp').on('click', function(e){
    var isChecked = $("#addid1").val();
    
    if (!isChecked){
      swal({   
        showConfirmButton: false,
        title     : "",
        text      : "Pilih salah satu yang akan dihapus",
        type      : "info",
        timer     : 1000,
      });
    } else {
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax2    : 1,
          grp_id2  : isChecked
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Group "+data['GroupName']+" dari database?",
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
                  url   : "_ajaxdelgrp.php",
                  cache : false,
                  async : true,
                  data  : {
                    grp_id:isChecked
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Group berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    GroupFunction();
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
                message: "Item Group tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              GroupFunction();
            }
          });
        }
      });
    }
  });
});

$("#refreshigrp").click(function() {
  GroupFunction();
});

    /*
    ,
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
      //if ( aData[0] == document.getElementById('cek').checked ) { $('td', nRow).css('background-color', '#f2dede' ); }   
      //if ( $('input[name=cek]:checked').length > 0 ) { $('td', nRow).css('background-color', '#f2dede' ); }   
      if(aData[1]== "GRP002"){
        $('td', nRow).css('background-color', '#f2dede' );
      }
    }
    */
</script>



