<ul class="tabs left">
  <li><a href="#tabdataprd">Data</a></li>
</ul>
<div id="tabdataprd" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewiprd"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editiprd"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="deliprd"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshiprd"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter2" name="newFilter2" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change2' id='length_change2'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_product");
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

  <div id="addnewprd">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddProduct">Add New Product&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddProduct" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_1">Name</div>
            <div class="col_4"><input type="text" id="ProductName" name="ProductName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">Code</div>
            <div class="col_2"><input type="text" id="ProductCode" name="ProductCode" placeholder="2 Digit" tabindex="2" maxlength="2"></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">Note</div>
            <div class="col_10"><input type="text" id="ProductNote" name="ProductNote" tabindex="3"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">&nbsp;</div>
            <div class="col_2"><button id="addnewprdbtn" class="psi_button1" tabindex="4"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_9">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <div id="editingprd">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditProduct"><span id="responseprd"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditProduct" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_1">Name</div>
            <div class="col_4">
              <input type="hidden" name="editprd_id" id="editprd_id">
              <input type="text" name="editProductName" id="editProductName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">Note</div>
            <div class="col_2">
              <input type="text" name="editProductCode" id="editProductCode" maxlength="2">
            </div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">Note</div>
            <div class="col_10">
              <input type="text" name="editProductNote" id="editProductNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">&nbsp;</div>
            <div class="col_2"><button id="editprdbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_9">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <table id="table_prd" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Name</th>
        <th>Code</th>
        <th>Note</th>
      </tr>
    </thead>
  </table>
  <table>
    <tr>
      <td ></td></tr>
    </table>
</div>



<script>
function ProductFunction(){
  $('.clearcheckbox').val('');
  $('#table_prd').DataTable({
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
      "className" : "dt-left",
      "width"     : 200
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 30
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 610
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupprd.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_prd').DataTable();
  var oTable = $('#table_prd').DataTable();
  $('#length_change2').val(oTable.page.len());
  $('#length_change2').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter2').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_prd tbody').off('click');
  $('#table_prd tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid2" name="addid2" value="'+data[4]+'"/>');
  } );

}

//----------------------------------------------------------------Insert PRODUCT
$(document).ready(function() {
  $('#addnewprdbtn').on('click',function() {
    var ProductName = $('#ProductName').val();
    var ProductCode = $('#ProductCode').val();
    var ProductNote = $('#ProductNote').val();

    if (!ProductName){
      swal("Fail !", "Nama Product belum terisi", "warning");
    }else if(!ProductCode){
      swal("Fail !", "Code Product belum terisi", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddprd.php",
        cache     : false,
        async     : true,
        dataType  : "JSON",
        data      : {
          ProductName : ProductName,
          ProductCode : ProductCode,
          ProductNote : ProductNote,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Product baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          ProductFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit PRODUCT
$(document).ready(function() {
  $('#editiprd').on('click',function() {
    var isCheckedPrd = $("#addid2").val();

    if (!isCheckedPrd) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingprd').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          prd_id  : isCheckedPrd
        },
        success : function(data) {
          $('#responseprd').text('Edit : ' + data['ProductID']);
          $('#editprd_id').val(data['prd_id']);
          $('#editProductName').val(data['ProductName']);
          $('#editProductCode').val(data['ProductCode']);
          $('#editProductNote').val(data['ProductNote']);
          $('#editProductName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#editprdbtn').on('click',function() {
    var prd_id      = $('#editprd_id').val();
    var ProductName = $('#editProductName').val();
    var ProductCode = $('#editProductCode').val();
    var ProductNote = $('#editProductNote').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditprd.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        prd_id      : prd_id,
        ProductName : ProductName,
        ProductCode : ProductCode,
        ProductNote : ProductNote
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Product berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          ProductFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete PRODUCT
$(document).ready(function(){
  $('#deliprd').on('click', function(e){
    var isCheckedPrd = $("#addid2").val();
    if (!isCheckedPrd){
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
          ajax_prd    : 1,
          prd_id2     : isCheckedPrd
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Product "+data['ProductName']+" dari database?",
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
              if (data['Total_prj'] > 0 || data['Total_type'] > 0 || data['Total_cha'] > 0 || data['Total_cap'] > 0 || data['Total_mdl'] > 0 || data['Total_fea'] > 0) {
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
                  url   : "_ajaxdelprd.php",
                  cache : false,
                  async : true,
                  data  : {
                    prd_id:isCheckedPrd
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Product berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    ProductFunction();
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
                message: "Item Product tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              ProductFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshiprd").click(function() {
  ProductFunction();
});

</script>