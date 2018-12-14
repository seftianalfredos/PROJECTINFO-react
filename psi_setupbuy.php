<?php
// session_start();
// $currentmenu = "4";

// if ($_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" || $_SESSION['role'] == "EN" || $_SESSION['role'] == "GE"){
//   header('location:index.php');
// }else if(!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
//   header("location: http://10.10.104.251/UserManagement/admin/login.php");
//   exit();
// }else if ($_SESSION["role"]=="AD" || $_SESSION["role"]=="M") {  
?>
<ul class="tabs left">
  <li><a href="#tabdatabuy">Data</a></li>
</ul>
<div id="tabdatabuy" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewibuy"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editibuy"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delibuy"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshibuy"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
            
        <div class="col_3">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-flag fa-sm"></i></td>
              <td class="center" >
                <select name='length_change5b' id='length_change5b'>
                  <option value="-" selected disabled>Country</option>
                  <?php
                  include 'config.php';
                  $stmt = $DBcon->prepare("SELECT *FROM table_country ORDER BY CountryName ASC");
                  $stmt->execute();
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   ?>
                    <option value='<?php echo $row['CountryName']; ?>'><?php echo $row['CountryName']; ?></option>
                  <?php 
                   } 
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </div>    
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter5" name="newFilter5" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change5' id='length_change5'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_buyer");
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


  <div id="addnewbuy">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddBuyer">Add New Buyer&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddBuyer" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Name</div>
            <div class="col_4"><input type="text" id="BuyerName" name="BuyerName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Brand</div>
            <div class="col_4"><input type="text" id="BuyerBrand" name="BuyerBrand" tabindex="2"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Country</div>
            <div class="col_4">
              <select name='con_idBuy' id='con_idBuy' tabindex="3">
                <option>Pilih Negara</option>
                <?php
                include 'config.php';
                $cekCon = $DBcon->prepare("SELECT *FROM table_country ORDER BY CountryName ASC");
                $cekCon->execute();
                while ($row = $cekCon->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value='<?php echo $row['con_id']; ?>'><?php echo $row['CountryName']; ?></option>
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
            <div class="col_9"><input type="text" id="BuyerNote" name="BuyerNote" tabindex="4"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewbuybtn" class="psi_button1" tabindex="5"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <div id="editingbuy">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditBuyer"><span id="responsebuy"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditBuyer" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Name</div>
            <div class="col_4">
              <input type="hidden" name="buy_id" id="editbuy_id">
              <input type="text" name="buyerName" id="editBuyerName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Brand</div>
            <div class="col_4" id="buyBrand">
              <input type="text" name="brand" id="editBuyerBrand">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Country</div>
            <div class="col_4">
              <select name='conIDBuy' id='conIDBuy'>
                <?php
                include 'config.php';
                $cekCon = $DBcon->prepare("SELECT *FROM table_country ORDER BY CountryName ASC");
                $cekCon->execute();
                while ($row = $cekCon->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value='<?php echo $row['con_id']; ?>'><?php echo $row['CountryName']; ?></option>
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
            <div class="col_9" id="buyNote">
              <input type="text" name="BuyerNote" id="editBuyerNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editbuybtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <table id="table_buy" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Name</th>
        <th>Brand</th>
        <th>Country</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <table>
    <tr>
      <td ></td>
    </tr>
  </table>
</div>  






<script>
function BuyerFunction(){
  $('.clearcheckbox').val('');
  $('#table_buy').DataTable({
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
      "width"     : 160
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 150
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 150
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 490
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupbuy.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_buy').DataTable();
  var oTable = $('#table_buy').DataTable();
  $('#length_change5').val(oTable.page.len());
  $('#length_change5').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter5').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_buy tbody').off('click');
  $('#table_buy tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid6" name="addid6" value="'+data[5]+'"/>');
  } );

}

//----------------------------------------------------------------Insert BUYER
$(document).ready(function() {
  $('#addnewbuybtn').on('click',function() {
    var BuyerName  = $('#BuyerName').val();
    var BuyerBrand = $('#BuyerBrand').val();
    var BuyerNote  = $('#BuyerNote').val();
    var con_id     = $('#con_idBuy').val();

    if (!BuyerName) {
      swal("Fail !", "Nama Buyer belum terisi", "warning");
    }else if(!BuyerBrand){
      swal("Fail !", "Nama Brand belum terisi", "warning");
    }else if(con_id == "Pilih Negara"){
      swal("Fail !", "Pilih Minimal 1 Negara", "warning");    
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddbuy.php",
        cache     : false,
        async     : false,
        dataType  : "text",
        data      : {
          BuyerName   : BuyerName,
          BuyerNote   : BuyerNote,
          BuyerBrand  : BuyerBrand,
          con_id      : con_id,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Buyer baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          BuyerFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit BUYER
$(document).ready(function() {
  $('#editibuy').on('click',function() {
    var isCheckedBuy = $("#addid6").val();
    
    if (!isCheckedBuy) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingbuy').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          buy_id  : isCheckedBuy
        },
        success : function(data) {
          $('#responsebuy').text('Edit : ' + data['BuyerID']);
          $('#editbuy_id').val(data['buy_id']);
          $('#editBuyerName').val(data['BuyerName']);
          $('#editBuyerBrand').val(data['brand']);
          $('#conIDBuy').val(data['con_id']);
          $('#editBuyerNote').val(data['BuyerNote']);
          $('#editBuyerName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#editbuybtn').on('click',function() {
    var buy_id    = $('#editbuy_id').val();
    var BuyerName = $('#editBuyerName').val();
    var BuyerNote = $('#editBuyerNote').val();
    var con_id    = $('#conIDBuy').val();
    var brand     = $('#editBuyerBrand').val();
    
    $.ajax({
      type      : "POST",
      url       : "_ajaxeditbuy.php",
      cache     : false,
      async     : false,
      dataType  : "text",
      data      : {
        buy_id      : buy_id,
        BuyerName   : BuyerName,
        BuyerNote   : BuyerNote,
        brand       : brand,
        con_id      : con_id
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Buyer berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          BuyerFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete BUYER
$(document).ready(function(){
  $('#delibuy').on('click', function(e){
    var isCheckedBuy = $("#addid6").val();

    if (!isCheckedBuy){
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
          ajax_buy    : 1,
          buy_id2  : isCheckedBuy
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Buyer "+data['BuyerName']+" dari database?",
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
              if (data['Total_type'] > 0) {
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
                  url   : "_ajaxdelbuy.php",
                  cache : false,
                  async : true,
                  data  : {
                    buy_id:isCheckedBuy
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Buyer berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    BuyerFunction();
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
                message: "Item Buyer tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              BuyerFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshibuy").click(function() {
  BuyerFunction();
});


</script>
<?php 
// }else{
//   header("location: http://10.10.104.251/UserManagement/admin/login.php");
//   exit();
// }
?>