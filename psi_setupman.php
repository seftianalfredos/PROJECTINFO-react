<ul class="tabs left">
  <li><a href="#tabdatamanp">Data</a></li>
</ul>
<div id="tabdatamanp" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewimanp"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editimanp"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delimanp"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshimanp"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>    
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter7" name="newFilter7" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change7' id='length_change7'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_manpower");
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

  <div id="addnewmanp">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddManP">Add New Man_Power&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddManP" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Name</div>
            <div class="col_4"><input type="text" id="ManName" name="ManName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Authorization</div>
            <div class="col_4"><input type="text" id="Otorisasi" name="Otorisasi" tabindex="2"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Section</div>
            <div class="col_4"><input type="text" id="Design" name="Design" tabindex="3"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Email</div>
            <div class="col_8"><input type="text" id="ManEmail" name="ManEmail" tabindex="4"></div>
            <div class="col_2">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewmanpbtn" class="psi_button1" tabindex="5"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingmanp">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditManP"><span id="responsemanp"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditManP" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Name</div>
            <div class="col_4">
              <input type="hidden" name="editman_id" id="editman_id">
              <input type="text" name="editManName" id="editManName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Authorization</div>
            <div class="col_4">
              <input type="text" name="editOtorisasi" id="editOtorisasi">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Section</div>
            <div class="col_4">
              <input type="text" name="editDesign" id="editDesign">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Email</div>
            <div class="col_9">
              <input type="text" name="editManEmail" id="editManEmail">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editmanpbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <table id="table_manp" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Name</th>
        <th>Authorization</th>
        <th>Section</th>
        <th>Email</th>
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
function ManpowerFunction(){
  $('.clearcheckbox').val('');
  $('#table_manp').DataTable({
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
      "width"     : 220
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 80
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 220
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 320
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupmanp.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_manp').DataTable();
  var oTable = $('#table_manp').DataTable();
  $('#length_change7').val(oTable.page.len());
  $('#length_change7').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter7').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_manp tbody').off('click');
  $('#table_manp tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid7" name="addid7" value="'+data[5]+'"/>');
  } );

}

//----------------------------------------------------------------Insert GROUP
$(document).ready(function() {
  $('#addnewmanpbtn').on('click',function() {
    var ManName   = $('#ManName').val();
    var Otorisasi = $('#Otorisasi').val();
    var Design    = $('#Design').val();
    var ManEmail  = $('#ManEmail').val();

    if (!ManName){
      swal("Fail !", "Nama belum terisi", "warning");
    }else if(!Otorisasi){
      swal("Fail !", "Authorization belum terisi", "warning");
    }else if(!Design){
      swal("Fail !", "Section belum terisi", "warning");
    }else if(!ManEmail){
      swal("Fail !", "Email belum terisi", "warning");
    }else{
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddman.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          ManName   : ManName,
          Otorisasi : Otorisasi,
          Design    : Design,
          ManEmail  : ManEmail,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Member baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          ManpowerFunction();
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
  $('#editimanp').on('click',function() {
    var isCheckedMan = $("#addid7").val();

    if (!isCheckedMan) {
      swal({  
        showConfirmButton: false,       
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingmanp').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          man_id  : isCheckedMan
        },
        success : function(data) {
          $('#responsemanp').text('Edit : ' + data['ManID']);
          $('#editman_id').val(data['man_id']);
          $('#editManName').val(data['ManName']);
          $('#editOtorisasi').val(data['Otorisasi']);
          $('#editDesign').val(data['Design']);
          $('#editManEmail').val(data['ManEmail']);
          $('#editManName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#editmanpbtn').on('click',function() {
    var man_id      = $('#editman_id').val();
    var ManName     = $('#editManName').val();
    var Otorisasi   = $('#editOtorisasi').val();
    var Design      = $('#editDesign').val();
    var ManEmail    = $('#editManEmail').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditman.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        man_id    : man_id,
        ManName   : ManName,
        Otorisasi : Otorisasi,
        Design    : Design,
        ManEmail  : ManEmail
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Member berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          ManpowerFunction();
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
  $('#delimanp').on('click', function(e){
    var isCheckedMan = $("#addid7").val();

    if (!isCheckedMan){
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
          ajax_man : 1,
          man_id2  : isCheckedMan
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Manpower "+data['ManName']+" dari database?",
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
                  url   : "_ajaxdelman.php",
                  cache : false,
                  async : true,
                  data  : {
                    man_id:isCheckedMan
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Manpower berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    ManpowerFunction();
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
                message: "Item Manpower tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              ManpowerFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshimanp").click(function() {
  ManpowerFunction();
});

</script>




