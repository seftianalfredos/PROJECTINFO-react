<div id="tab_lineup">
  <ul class="tabs left">
    <li class="current"><a href="#tab_listevent"><i>Events List</i></a></li>
    <li><a ><i>Calendar Events</i></a></li>
  </ul>
</div>
<div id="tab_listevent" class="tab-content">
  <table class="psi_width1300" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
            <?php
            if ($_SESSION['role'] == "AD" || $_SESSION['role'] == "M" || $_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" || $_SESSION['role'] == "EN") {
            ?> 
            <li title="Add New" id="Addinote"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="Editinote"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="Deleteinote"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <?php 
            }
            ?>
            <li title="Refresh" id="Refreshinote"><a><i class="fa fa-sync fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_4"></div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-th-large fa-sm"></i></td>
              <td class="center" >
                <select id="filterTtl" name="filterTtl" class="inputsel">
                  <option value="-" selected disabled>Title</option>
                  <option value="All">All</option>
                  <?php 
                  include 'config.php';
                  $sql = $DBcon->prepare("SELECT *FROM table_title WHERE TitleCategory = 'Note' ORDER BY TitleName ASC ");
                  $sql->execute();
                  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  	<option value="<?php echo $row['tit_id'] ?>"><?php echo $row['TitleName'] ?></option>
                  <?php 
                  }
                  ?>	
                </select>
              </td>
            </tr>
          </table>
        </div>        
        <div class="col_3">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilternote" name="newFilternote" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_1">
        <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_changenote' id='length_changenote'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                  <?php
                  /*
                  include 'config.php';
                  $stmt   = $DBcon->prepare("SELECT *FROM table_group");
                  $stmt->execute();
                  $baris  = $stmt->rowCount();
                  echo '<option value='.$baris.'>All</option>';
                  */
                  ?>
                </select>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
  <table id="tbl_event" class="display" style="width:1300px">
    <thead>
      <tr>
        <th style="width: 5px"></th>
        <th style="width: 5px">id</th>
        <th style="width: 150px">Title</th>
        <th style="width: 500px">Description</th>
        <th style="width: 75px">Start</th>
        <th style="width: 75px">End</th>
        <th style="width: 200px">Project</th>
        <th style="width: 150px">Type</th>
        <th style="width: 100px">Author</th>
        <th style="width: 5px">Att</th>
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

  $("#filterTtl").chosen().change(function() {
    var v = $(this).val();
  });

  function NoteEvent(is_ttl){
    $('#tbl_event').DataTable({
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
      "scrollY"     : 350,
      "columnDefs"  : [
      {
        "targets"   : [ 0 ], 
        "orderable" : false,
        "width"     : 5,
        "className" : "select-checkbox"  
      },{
        "targets"   : [ 1 ], 
        "visible"	: false,
        "width"     : 5,
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-left",
        "width"     : 150
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-left",
        "width"     : 500
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-center",
        "width"     : 75
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-center",
        "width"     : 75
      },{ 
        "targets"   : [ 6 ], 
        "className" : "dt-left",
        "width"     : 200
      },{ 
        "targets"   : [ 7 ], 
        "className" : "dt-left",
        "width"     : 150
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-left",
        "width"     : 5
      }         
      ],
      "ajax"        : {
        url   : 'fetch_event.php',
        type  : 'POST',
        data  : {is_ttl : is_ttl}
      }
    });


//Show entries & Searching
  var table = $('#tbl_event').DataTable();
  var oTable = $('#tbl_event').DataTable();
  $('#length_changenote').val(oTable.page.len());
  $('#length_changenote').change( function() { 
    oTable.page.len( $(this).val() ).draw();
  });
  $('#newFilternote').on( 'keyup', function () {
    table.search( this.value ).draw();
  } );

  $('#tbl_event tbody').off('click');
  $('#tbl_event tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid" name="addid" value="'+data[1]+'"/>');
  } );


}  


$(document).on('change', '#filterTtl', function() {
  var title_note = $('#filterTtl').val();

  $('#tbl_event').DataTable().destroy();
  if (title_note != '-') {
    NoteEvent(title_note);
  }else{
    NoteEvent();
  }
});


$(document).ready(function(){
  NoteEvent('All');
});

$("#Refreshinote").click(function() {
  NoteEvent();
});

$("#Addinote").click(function() {
  window.location.href = "prj_calendar.php#tab_note";
});


$(document).ready(function() {
  $('#Editinote').on('click',function(e) {
    var isCheckednote = $("#addid").val();
    //var isCheckednote   = $("input[name=ceknote]:checked").val();
    if (!isCheckednote){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,
      });
      window.location.href = "#";
    }else{
      // alert(isCheckednote);
      window.location.href = "prj_calendar.php?inputIDnote="+isCheckednote;
    }
  });
});

$(document).ready(function() {
  $('#Deleteinote').on('click', function(e) {
    var isCheckednote = $("#addid").val();
    //var isCheckednote   = $("input[name=ceknote]:checked").val();

    if (!isCheckednote){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu item yang akan dihapus",
        type    : "info",
        timer   : 1000,
      });
      window.location.href = "#";
    }else{
      swal({
        title             : "Perhatian",
        type              : "warning",
        text              : "Hapus item dari daftar Note?",
        showCancelButton  : true, 
        confirmButtonColor: "#DD6B55",
        confirmButtonText : "Ya",
        cancelButtonText  : "Batalkan",
        closeOnConfirm    : false,
        closeOnCancel     : false
      },
      function(isConfirm){
        if (isConfirm){
          $.ajax({
            type      : "POST",
            url       : "_ajaxdelnotes.php",
            cache     : false,
            async     : true,
            data      :{
              notes_id  : isCheckednote
            },
            success   : function() {
              swal({   
                showConfirmButton: false,
                title: "",
                text : "Item Event berhasil dihapus",
                type : "success",
                timer   : 1000,

              });
                NoteEvent();
              
            },
            error     : function() {
              swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
            }
          });
        }else{
          swal({   
            showConfirmButton: false,
            title: "",
            text : "Dibatalkan",
            type : "error",  
            timer   : 1000,
          });
          NoteEvent();
        }
      });
    }
  })
});

$(document).ready(function() {
  $('#tbl_event tbody').on('click', 'tr', function() {
    var id = $('#addid').val();

    $.ajax({
      type   : "POST",
      dataType : "JSON",
      data   : {notes_id : id},
      success  : function(data) {
          $('#Editinote').show();
          $('#Deleteinote').show();
        if (data['Status'] != "OK") {
          $('#Editinote').hide();
          $('#Deleteinote').hide();
        }else{
          $('#Editinote').show();
          $('#Deleteinote').show();
        }
      }
    });
  });
});


</script>


