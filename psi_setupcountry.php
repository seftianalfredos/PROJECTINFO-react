<ul class="tabs left">
  <li><a href="#tabdatacountry">Data</a></li>
</ul>
<div id="tabdatacountry" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewictr"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="editictr"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delictr"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshictr"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>    
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter6" name="newFilter6" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change6' id='length_change6'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_country");
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


  <div id="addnewctr">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddCountry">Add New Buyer&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddCountry" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Country</div>
            <div class="col_4"><input type="text" id="CountryName" name="CountryName" tabindex="1"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Lot Inv</div>
            <div class="col_4"><input type="text" id="CountryLot" name="CountryLot" tabindex="2"></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Note</div>
            <div class="col_9"><input type="text" id="CountryNote" name="CountryNote" tabindex="3"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewctrbtn" class="psi_button1" tabindex="4"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingctr">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditCountry"><span id="responsectr"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditCountry" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Country</div>
            <div class="col_4">
              <input type="hidden" name="editcon_id" id="editcon_id">
              <input type="text" name="editCountryName" id="editCountryName">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Lot Inv</div>
            <div class="col_4">
              <input type="text" name="editCountryLot" id="editCountryLot">
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Note</div>
            <div class="col_9">
              <input type="text" name="editCountryNote" id="editCountryNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="editctrbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <table id="table_ctr" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <!-- <th>ID</th> -->
        <th>Name</th>
        <th>Lot Inv.</th>
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

function CountryFunction(){
  $('.clearcheckbox').val('');
  $('#table_ctr').DataTable({
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
      "width"     : 200
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 440
    }
    ],
    "ajax"        : {
      url   : 'fetch_setupcountry.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_ctr').DataTable();
  var oTable = $('#table_ctr').DataTable();
  $('#length_change6').val(oTable.page.len());
  $('#length_change6').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter6').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_ctr tbody').off('click');
  $('#table_ctr tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid5" name="addid5" value="'+data[4]+'"/>');
  } );

}

//----------------------------------------------------------------Insert COUNTRY
$(document).ready(function() {
  $('#addnewctrbtn').on('click',function() {
    var CountryName = $('#CountryName').val();
    var CountryLot  = $('#CountryLot').val();
    var CountryNote = $('#CountryNote').val();

    if (!CountryName ) {
      swal("Fail !", "Nama Country belum terisi", "warning");
    }else if(!CountryLot){
      swal("Fail !", "Lot Inv belum terisi", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddcon.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          CountryName : CountryName,
          Lot         : CountryLot,
          CountryNote : CountryNote,
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Country baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          CountryFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit COUNTRY
$(document).ready(function() {
  $('#editictr').on('click',function() {
    var isCheckedCon = $("#addid5").val();
    
    if (!isCheckedCon) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingctr').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          con_id  : isCheckedCon
        },
        success : function(data) {
          $('#responsectr').text('Edit : ' + data['CountryID']);
          $('#editcon_id').val(data['con_id']);
          $('#editCountryName').val(data['CountryName']);
          $('#editCountryLot').val(data['CountryLot']);
          $('#editCountryNote').val(data['CountryNote']);
          $('#editCountryName').focus();
        }
      });
    }
  });
});

$(document).ready(function() {
  $('#editctrbtn').on('click',function() {
    var con_id      = $('#editcon_id').val();
    var CountryName = $('#editCountryName').val();
    var Lot         = $('#editCountryLot').val();
    var CountryNote = $('#editCountryNote').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditcon.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        con_id      : con_id,
        CountryName : CountryName,
        Lot         : Lot,
        CountryNote : CountryNote
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Country berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          CountryFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete COUNTRY
$(document).ready(function(){
  $('#delictr').on('click', function(e){
    var isCheckedCon = $("#addid5").val();

    if (!isCheckedCon){
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
          ajax_con    : 1,
          con_id2  : isCheckedCon
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Country "+data['CountryName']+" dari database?",
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
                  url   : "_ajaxdelcon.php",
                  cache : false,
                  async : true,
                  data  : {
                    con_id:isCheckedCon
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Country berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    CountryFunction();
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
                message: "Item Country tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              CountryFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshictr").click(function() {
  CountryFunction();
});
</script>
