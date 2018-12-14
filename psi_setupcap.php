<ul class="tabs left">
  <li><a href="#tabdatacap">Data</a></li>
</ul>
<div id="tabdatacap" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_3">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewicap"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editicap"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delicap"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshicap"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
            
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-th fa-sm"></i></td>
              <td class="center" >
                <select name='length_change4b' id='length_change4b'>
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
              <td class="center"><input class="psi_input" type="text" id="newFilter4" name="newFilter4" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change4' id='length_change4'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_capacity");
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

  <div id="addnewcap">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddCapacity">Add New Capacity&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddCapacity" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Capacity</div>
            <div class="col_4"><input type="text" id="SizeName" name="SizeName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Alias</div>
            <div class="col_4"><input type="text" id="SizeAlias" name="SizeAlias" tabindex="2"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_4">
              <select name='prd_idSiz' id='prd_idSiz' tabindex="3">
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
              </select>
            </div>
            <div class="col_6 ">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Description</div>
            <div class="col_9"><input type="text" id="SizeNote" name="SizeNote" tabindex="4"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewcapbtn" class="psi_button1"  tabindex="5"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <div id="editingcap">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditCap"><span id="responsecap"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditCap" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Capacity</div>
            <div class="col_4">
              <input type="hidden" name="editsiz_id" id="editsiz_id">
              <input type="text" name="editSizeName" id="editSizeName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Alias</div>
            <div class="col_4">
              <input type="text" name="editSizeAlias" id="editSizeAlias">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_4">
              <select name='prdIDSiz' id='prdIDSiz'>
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
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Description</div>
            <div class="col_9">
              <input type="text" name="editSizeNote" id="editSizeNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editcapbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <table id="table_cap" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Size</th>
        <th>Alias</th>
        <th>Product</th>
        <th>Description</th>
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
function CapacityFunction(){
  $('.clearcheckbox').val('');
  $('#table_cap').DataTable({
    "dom"         : "rtip",
    "destroy"     : true,
    "processing"  : true,
    "pageLength"  : 20,
    "serverSide"  : true,
    "scrollX"     : true,
    "scrollY"     : true,
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
      "width"     : 60
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 120
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 600
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupcap.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_cap').DataTable();
  var oTable = $('#table_cap').DataTable();
  $('#length_change4').val(oTable.page.len());
  $('#length_change4').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter4').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_cap tbody').off('click');
  $('#table_cap tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid4" name="addid4" value="'+data[5]+'"/>');
  } );

}

//----------------------------------------------------------------Insert CAPACITY
$(document).ready(function() {
  $('#addnewcapbtn').on('click',function() {
    var SizeName  = $('#SizeName').val();
    var SizeAlias = $('#SizeAlias').val();
    var prd_id    = $('#prd_idSiz').val();
    var SizeNote  = $('#SizeNote').val();

    if (!SizeName) {
      swal("Fail !", "Nama Capacity belum terisi", "warning");
    }else if(!SizeAlias){
      swal("Fail !", "Alias Capacity belum terisi", "warning");
    }else if(prd_id == "Pilih Product"){
      swal("Fail !", "Pilih minimal 1 product", "warning");
    }else{
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddcap.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          SizeName  : SizeName,
          SizeAlias : SizeAlias,
          prd_id    : prd_id,
          SizeNote  : SizeNote,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Capacity baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          CapacityFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit CAPACITY
$(document).ready(function() {
  $('#editicap').on('click',function() {
    var isCheckedCap = $("#addid4").val();

    if (!isCheckedCap) {
      swal({   
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingcap').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          siz_id  : isCheckedCap
        },
        success : function(data) {
          $('#responsecap').text('Edit : ' + data['SizeID']);
          $('#editsiz_id').val(data['siz_id']);
          $('#editSizeName').val(data['SizeName']);
          $('#editSizeAlias').val(data['SizeAlias']);
          $('#editSizeNote').val(data['SizeNote']);
          $('#prdIDSiz').val(data['prd_id']);
          $('#editSizeName').focus();
        }
      });
    }
  });
});

$(document).ready(function() {
  $('#editcapbtn').on('click',function() {
    var siz_id    = $('#editsiz_id').val();
    var SizeName  = $('#editSizeName').val();
    var SizeAlias = $('#editSizeAlias').val();
    var prd_id    = $('#prdIDSiz').val();
    var SizeNote  = $('#editSizeNote').val();
    
    $.ajax({
      type      : "POST",
      url       : "_ajaxeditcap.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        siz_id    : siz_id,
        SizeName  : SizeName,
        SizeAlias : SizeAlias,
        prd_id    : prd_id,
        SizeNote  : SizeNote
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Capacity berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          CapacityFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete CAPACITY
$(document).ready(function(){
  $('#delicap').on('click', function(e){
    var isCheckedCap = $("#addid4").val();

    if (!isCheckedCap){
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
          ajax_cap    : 1,
          siz_id2  : isCheckedCap
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Capacity "+data['SizeName']+" dari database?",
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
                  url   : "_ajaxdelcap.php",
                  cache : false,
                  async : true,
                  data  : {
                    siz_id:isCheckedCap
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Capacity berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    CapacityFunction();
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
                message: "Item Capacity tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              CapacityFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshicap").click(function() {
  CapacityFunction();
});


</script>                