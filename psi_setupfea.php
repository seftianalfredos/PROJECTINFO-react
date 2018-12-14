<ul class="tabs left">
  <li><a href="#tabdatafeature">Data</a></li>
</ul>
<div id="tabdatafeature" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewifea"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editifea"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delifea"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshifea"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter12" name="newFilter12" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change12' id='length_change12'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_feature");
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

<div id="addnewfea">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddFeatures">Add New Features&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddFeatures" class="tab-content">
      
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Feature</div>
            <div class="col_5"><input type="text" id="FeatureName" name="FeatureName" tabindex="1"></div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_5">
              <select id='prd_idFea' name='prd_idFea' tabindex="2">
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
            <div class="col_2">Note</div>
            <div class="col_9"><input type="text" id="FeatureNote" name="FeatureNote" tabindex="3"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewfeabtn" class="psi_button1"  tabindex="4"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingfea">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditfeatures"><span id="responsefea"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditfeatures" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Feature</div>
            <div class="col_5">
              <input type="hidden" name="editfea_id" id="editfea_id">
              <input type="text" name="editFeatureName" id="editFeatureName">
            </div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Product</div>
            <div class="col_5">
              <select id='prdIDFea'>
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
            <div class="col_2">Note</div>
            <div class="col_9"><input type="text" id="editFeatureNote" name="editFeatureNote"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editfeabtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <table id="table_fea" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <th>ID</th>
        <th>Feature</th>
        <th>Product</th>
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
function FeatureFunction(){
  $('.clearcheckbox').val('');
  $('#table_fea').DataTable({
    "dom"         : "rtip",
    "destroy"     : true,
    "processing"  : true,
    "serverSide"  : true,
    "pageLength"  : 20,
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
      "visible"   : false,
      "width"     : 10
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 200
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 120
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 650
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupfea.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_fea').DataTable();
  var oTable = $('#table_fea').DataTable();
  $('#length_change12').val(oTable.page.len());
  $('#length_change12').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter12').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_fea tbody').off('click');
  $('#table_fea tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid11" name="addid11" value="'+data[1]+'"/>');
  } );

}

//----------------------------------------------------------------Insert FEATURE
$(document).ready(function() {
  $('#addnewfeabtn').on('click',function() {
    var FeatureName  = $('#FeatureName').val();
    var prd_id       = $('#prd_idFea').val();
    var FeatureNote  = $('#FeatureNote').val();


    if (!FeatureName) {
      swal("Fail !", "Nama Feature belum terisi", "warning");
    }else if(prd_id == "Pilih Product"){
      swal("Fail !", "Pilih minimal 1 product", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddfea.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          FeatureName  : FeatureName,
          prd_id       : prd_id,
          FeatureNote  : FeatureNote
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Feature baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          FeatureFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit FEATURE
$(document).ready(function() {
  $('#editifea').on('click',function() {
    var isCheckedFea = $("#addid11").val();

    if (!isCheckedFea) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingfea').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          fea_id  : isCheckedFea
        },
        success : function(data) {
          $('#responsefea').text('Edit : ' + data['fea_id']);
          $('#editfea_id').val(data['fea_id']);
          $('#editFeatureName').val(data['FeatureName']);
          $('#prdIDFea').val(data['prd_id']);
          $('#editFeatureNote').val(data['FeatureNote']);
          $('#editFeatureName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#editfeabtn').on('click',function() {
    var fea_id      = $('#editfea_id').val();
    var FeatureName = $('#editFeatureName').val();
    var prd_id      = $('#prdIDFea').val();
    var FeatureNote = $('#editFeatureNote').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditfea.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        fea_id      : fea_id,
        FeatureName : FeatureName,
        prd_id      : prd_id,
        FeatureNote : FeatureNote
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Feature berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          FeatureFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//---------------------------------------------------------------- DELETE FEATURE
$(document).ready(function(){
  $('#delifea').on('click', function(e){
    var isCheckedFea = $("#addid11").val();

    if (!isCheckedFea){
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
          ajax_fea    : 1,
          fea_id2  : isCheckedFea
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Feature "+data['FeatureName']+" dari database?",
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
                  url   : "_ajaxdelfea.php",
                  cache : false,
                  async : true,
                  data  : {
                    fea_id:isCheckedFea
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Feature berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    FeatureFunction();
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
                message: "Item Feature tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              FeatureFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshifea").click(function() {
  FeatureFunction();
});


</script>
