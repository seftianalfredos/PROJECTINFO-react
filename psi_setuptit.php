<ul class="tabs left">
  <li><a href="#tabdatatitle">Data</a></li>
</ul>
<div id="tabdatatitle" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <li title="Add New" id="addnewitit"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="edititit"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="delitit"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshitit"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</div>
             
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilter8" name="newFilter8" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change8' id='length_change8'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_title");
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


  <div id="addnewtit">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddTitle">Add New Title&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddTitle" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Title Name</div>
            <div class="col_5"><input type="text" id="TitleName" name="TitleName" tabindex="1"></div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Category</div>
            <div class="col_5"><input type="text" id="TitleCategory" name="TitleCategory" tabindex="2"></div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Departement</div>
            <div class="col_5">
              <select id="DepartementID">
                <?php 
                  include 'config.php'; 
                  $sql = $DBcon->prepare("SELECT * FROM table_department ORDER BY name ASC");
                  $sql->execute();
                  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $row['DepartementID'] ?>"><?php echo $row['name']; ?></option>
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
            <div class="col_9"><input type="text" id="TitleNote" name="TitleNote" tabindex="3"></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewtitbtn" class="psi_button1" tabindex="4"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingtit">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditTitle"><span id="responsetit"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditTitle" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Title Name</div>
            <div class="col_5">
              <input type="hidden" name="edittit_id" id="edittit_id">
              <input type="text" name="editTitleName" id="editTitleName">
            </div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Category</div>
            <div class="col_5">
              <input type="text" name="editTitleCategory" id="editTitleCategory">
            </div>
            <div class="col_5">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Departement</div>
            <div class="col_5">
              <select id="editDepartementID">
                <option selected disabled>Pilih Departement</option>
                <?php 
                  include 'config.php'; 
                  $sql = $DBcon->prepare("SELECT * FROM table_department ORDER BY name ASC");
                  $sql->execute();
                  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $row['DepartementID'] ?>"><?php echo $row['name']; ?></option>
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
            <div class="col_9">
              <input type="text" name="editTitleNote" id="editTitleNote">
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="edittitbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <table id="table_tit" class="display" style="width:950px">
    <thead>
      <tr>
        <th></th>
        <th>ID</th>
        <th>Title Name</th>
        <th>Category</th>
        <th>Departement</th>
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


function TitleFunction(){
  $('.clearcheckbox').val('');
  $('#table_tit').DataTable({
    "dom"         : "rtip",
    "destroy"     : true,
    "processing"  : true,
    "pageLength"  : 20,
    "serverSide"  : true,
    "stateSave"   : true,
    "select"      : { style :  "single", selector: "td" },
    "bAutoWidth"  : false,     
    "order"       : [[1, "desc"]],
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
      "width"     : 5, 
      "className" : "select-checkbox"    
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 270
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 100
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 140
    },{ 
      "targets"   : [ 5 ], 
      "className" : "dt-left",
      "width"     : 430
    }
    ],
    "ajax"        : {
      url   : 'fetch_setuptit.php',
      type  : 'POST'
    }
  });

//----------------------------------------------------------------Show entries & Searching
  var table = $('#table_tit').DataTable();
  var oTable = $('#table_tit').DataTable();
  $('#length_change8').val(oTable.page.len());
  $('#length_change8').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilter8').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#table_tit tbody').off('click');
  $('#table_tit tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid8" name="addid8" value="'+data[1]+'"/>');
  } );

}


//----------------------------------------------------------------Insert TITLE
$(document).ready(function() {
  $('#addnewtitbtn').on('click',function() {
    var TitleName     	= $('#TitleName').val();
    var TitleCategory 	= $('#TitleCategory').val();
    var TitleNotes		  = $('#TitleNote').val();
    var DepartementID   = $('#DepartementID').val();

    if (!TitleName) {
      swal("Fail !", "Nama title belum terisi", "warning");
    }else if (!TitleCategory){
      swal("Fail !", "Category belum terisi", "warning");
    }else {
      $.ajax({
        type      : "POST",
        url       : "_ajaxaddtit.php",
        cache     : false,
        async     : true,
        dataType  : "text",
        data      : {
          TitleName     : TitleName,
          TitleCategory : TitleCategory,
          TitleNotes 	  : TitleNotes,
          DepartementID : DepartementID
        },
        success   : function(){
          $.rtnotify({
            title: "Berhasil",
            message: "Title baru berhasil ditambahkan.",
            type: "success",
            permanent: false,
            timeout: 4,
            fade: true,
            width: 300
          });
          TitleFunction();
          ClearAllinput();
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }
  });
});

//----------------------------------------------------------------Edit TITLE
$(document).ready(function() {
  $('#edititit').on('click',function() {
    var isCheckedTit = $("#addid8").val();

    if (!isCheckedTit) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingtit').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          tit_id  : isCheckedTit
        },
        success : function(data) {
          $('#responsetit').text('Edit : ' + data['TitleID']);
          $('#edittit_id').val(data['tit_id']);
          $('#editTitleName').val(data['TitleName']);
          $('#editTitleCategory').val(data['TitleCategory']);
          $('#editDepartementID').val(data['DepartementID']);
          $('#editTitleNote').val(data['TitleNotes']);
          $('#editTitleName').focus();
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#edittitbtn').on('click',function() {
    var tit_id           = $('#edittit_id').val();
    var TitleName        = $('#editTitleName').val();
    var TitleCategory    = $('#editTitleCategory').val();
    var DepartementID    = $('#editDepartementID').val();
    var TitleNotes 		   = $('#editTitleNote').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxedittit.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        tit_id         : tit_id,
        TitleName      : TitleName,
        TitleCategory  : TitleCategory,
        TitleNotes     : TitleNotes,
        DepartementID  : DepartementID
      },
      success   : function(){
        $.rtnotify({
          title: "Berhasil",
          message: "Data Title berhasil diubah.",
          type: "success",
          permanent: false,
          timeout: 4,
          fade: true,
          width: 300
        });
          TitleFunction();
          ClearAllinput();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

//----------------------------------------------------------------Delete TITLE
$(document).ready(function(){
  $('#delitit').on('click', function(e){
    var isCheckedTit = $("#addid8").val();

    if (!isCheckedTit){
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
          ajax_tit    : 1,
          tit_id2  : isCheckedTit
        },
        success :function(data) {
          var previousWindowKeyDown = window.onkeydown; //<-------- this code prevent tab key not working for 2nd swal
          swal({
            title             : "Perhatian",
            text              : "Hapus Item Title "+data['TitleName']+" dari database?",
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
                  url   : "_ajaxdeltit.php",
                  cache : false,
                  async : true,
                  data  : {
                    tit_id:isCheckedTit
                  },
                  success: function(){
                    swal({   
                      showConfirmButton: false,
                      title   : "",
                      timer   : 10,
                    });
                    $.rtnotify({
                      title: "Berhasil",
                      message: "Item Title berhasil dihapus.",
                      type: "success",
                      permanent: false,
                      timeout: 4,
                      fade: true,
                      width: 300
                    });
                    TitleFunction();
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
                message: "Item Title tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              TitleFunction();
            }
          });
        }
      });
    }
  });
});


$("#refreshitit").click(function() {
  TitleFunction();
});



</script>
