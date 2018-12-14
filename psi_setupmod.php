<ul class="tabs left">
  <li><a href="#tabdatamodel">Data</a></li>
</ul>
<div id="tabdatamodel" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewimod"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editimod"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delimod"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshimod"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>
                
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter11" name="newFilter11" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change11' id='length_change11'>
                  <option value='10'>10</option>
                  <option value='20' selected>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_model");
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

  <div id="addnewmod">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddModel">Add New Model&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddModel" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Model</div>
            <div class="col_4"><input type="text" id="ModelName" name="ModelName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_5">
              <select id='prd_idMod' name='prd_idMod' tabindex="2">
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
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewmodbtn" class="psi_button1" tabindex="3"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingmod">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditModel"><span id="responsemod"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditModel" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Model</div>
            <div class="col_5" id="modName">
              <input type="hidden" name="editmdl_id" id="editmdl_id">
              <input type="text" name="editModelName" id="editModelName">
            </div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_5">
              <select id='prdIDMod'>
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
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editmodbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <table id="table_mod" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Model Name</th>
        <th>Product</th>
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
function ModelFunction(){
  $('.clearcheckbox').val('');
  $('#table_mod').DataTable({
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
      "width"     : 200
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 640
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupmod.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_mod').DataTable();
  var oTable = $('#table_mod').DataTable();
  $('#length_change11').val(oTable.page.len());
  $('#length_change11').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter11').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_mod tbody').off('click');
  $('#table_mod tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid10" name="addid10" value="'+data[3]+'"/>');
  } );

}

//----------------------------------------------------------------Insert MODEL
$(document).ready(function() {
  $('#addnewmodbtn').on('click',function() {
    var ModelName  = $('#ModelName').val();
    var prd_id     = $('#prd_idMod').val();

    if (!ModelName) {
      swal("Fail !", "Nama Model belum terisi", "warning");
    }else if(prd_id == "Pilih Product"){
      swal("Fail !", "Pilih minimal 1 product", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddmod.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          ModelName  : ModelName,
          prd_id      : prd_id,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Model baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          ModelFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit MODEL
$(document).ready(function() {
  $('#editimod').on('click',function() {
    var isCheckedMod = $("#addid10").val();

    if (!isCheckedMod) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingmod').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          mdl_id  : isCheckedMod
        },
        success : function(data) {
          $('#responsemod').text('Edit Model : ' + data['ModelID']);
          $('#editmdl_id').val(data['mdl_id']);
          $('#editModelName').val(data['ModelName']);
          $('#prdIDMod').val(data['prd_id']);
          $('#editModelName').focus();
        }
      });
    }
  });
});

$(document).ready(function() {
  $('#editmodbtn').on('click',function() {
    var mdl_id      = $('#editmdl_id').val();
    var ModelName  = $('#editModelName').val();
    var prd_id      = $('#prdIDMod').val();
    $.ajax({
      type      : "POST",
      url       : "_ajaxeditmod.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        mdl_id      : mdl_id,
        ModelName   : ModelName,
        prd_id      : prd_id
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Model berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          ModelFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete MODEL
$(document).ready(function(){
  $('#delimod').on('click', function(e){
    var isCheckedMod = $("#addid10").val();

    if (!isCheckedMod){
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
          ajax_mdl    : 1,
          mdl_id2  : isCheckedMod
        },
        success : function(data){
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Model "+data['ModelName']+" dari database?",
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
                url   : "_ajaxdelmod.php",
                cache : false,
                async : true,
                data  : {
                  mdl_id:isCheckedMod
                },
                success: function(){
                  swal({   
                    showConfirmButton: false,
                    title   : "",
                    timer   : 10,
                  });
                  $.rtnotify({
                    title: "Berhasil",
                    message: "Item Model berhasil dihapus.",
                    type: "success",
                    permanent: false,
                    timeout: 4,
                    fade: true,
                    width: 300
                  });
                  ModelFunction();
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
                message: "Item Model tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              ModelFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshimod").click(function() {
  ModelFunction();
});




</script>
