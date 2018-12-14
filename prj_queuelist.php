<table class="psi_width1300" border="0">
  <tr>
    <td> 
      <div class="col_2">
        <ul class="button-bar">
          <?php
          if ($_SESSION['role'] == "AD" || $_SESSION['role'] == "M" || $_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" ) {
            ?> 
            <li title="Edit" id="Editique"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="Deleteique"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Assign to LineUp" id="AddNewilineup"><a><i class="fa fa-check fa-sm"></i></a></li>
            <?php 
          }
          ?>
          <li title="Refresh" id="Refreshique"><a><i class="fa fa-sync fa-sm"></i></a></li>
        </ul>
      </div>
      <div class="col_2"></div>



      <div class="col_2">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-large fa-sm"></i></td>
            <td class="center" >
              <select id="filterPL" name="filterPL" class="inputsel">
                <option value="-" selected disabled>Project Leader</option> 
                <?php
                include 'config.php';
                $stmt2  = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi = 'PL' ");
                $stmt2->execute();
                while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>  
                <option value="All">All</option>
              </select>
            </td>
          </tr>
        </table>
      </div>

      <div class="col_2">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-large fa-sm"></i></td>
            <td class="center" >
              <select id="filterSTS" name="filterSTS" class="inputsel">
                <option value="-" selected disabled>Status</option>
                <?php
                include 'config.php';
                $stmt2  = $DBcon->prepare("SELECT *FROM table_status ");
                $stmt2->execute();
                while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['StatusName']; ?>"><?php echo $row['StatusName']; ?></option>
                  <?php 
                } 
                ?>  
                <option value="All">All</option>
              </select>
            </td>
          </tr>
        </table>
      </div>

      <div class="col_3">
        <table>
          <tr>
            <td class="right"><i class="fa fa-search fa-sm"></i></td>
            <td class="center"><input class="psi_input" type="text" id="newFilter3" name="newFilter3" placeholder="Search"></td>
          </tr>
        </table>
      </div>
      <div class="col_1">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-large fa-sm"></i></td>
            <td class="center" >
              <select id='length_change3' name='length_change3' >
                <option value='10'>10</option>
                <option value='20'>20</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_type WHERE assign = 0");
                $stmt->execute();
                $baris  = $stmt->rowCount();
                echo '<option value='.$baris.'>All</option>';
                ?>
              </select>
            </td>
          </tr>
        </table>
      </div>

    </td>
  </tr>
</table>  


<table id="tbl_queue" class="display" style="width:1605px">
  <thead>
    <tr>
      <th></th>
      <th>type_id</th>
      <th>Project</th>
      <th>PL</th>
      <th>Prd</th>
      <th>Group</th>
      <th>Chassis</th>
      <th>Type</th>
      <th>Size</th>
      <th>StartDate</th>
      <th>FinishDate</th>
      <th>Rev</th>
      <th>Rev.Date</th>
      <th>Sta.Type</th>
      <th>Sta.Proj</th>
      <th>Note</th>
    </tr>
  </thead>
</table>
<table>
  <tr>
    <td></td>
  </tr>
</table>

<script>



  function QueuePrjFunc(){
    $('.clearcheckbox').val('');
    $('#tbl_queue').DataTable({
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
      "scrollY"     : 350,
      "columnDefs"  : [
      {
        "targets"   : [ 0 ], 
        "orderable" : false,
        "width"     : 5,
        "className" : "select-checkbox"    
      },{
        "targets"   : [ 1 ], 
        "visible"   : false,
        "width"     : 5    
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-left",
        "width"     : 200
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-left",
        "width"     : 150
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-left",
        "width"     : 30
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-left",
        "width"     : 80
      },{ 
        "targets"   : [ 6 ], 
        "className" : "dt-left",
        "width"     : 30
      },{ 
        "targets"   : [ 7 ], 
        "className" : "dt-left",
        "width"     : 150
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-left",
        "width"     : 30
      },{ 
        "targets"   : [ 9 ], 
        "className" : "dt-center",
        "width"     : 80
      },{ 
        "targets"   : [ 10 ], 
        "className" : "dt-center",
        "width"     : 80
      },{ 
        "targets"   : [ 11 ], 
        "className" : "dt-center",
        "width"     : 30
      },{ 
        "targets"   : [ 12 ], 
        "className" : "dt-center",
        "width"     : 80
      },{ 
        "targets"   : [ 13 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 14 ], 
        "className" : "dt-left",
        "width"     : 75
      },{ 
        "targets"   : [ 15 ], 
        "className" : "dt-left",
        "width"     : 880
      }
      ],
      "ajax"        : {
        url   : 'fetch_queue.php',
        type  : 'POST'
      }
    });


//----------------------------------------------------------------Show entries & Searching
var table = $('#tbl_queue').DataTable();
var oTable = $('#tbl_queue').DataTable();
$('#length_change3').val(oTable.page.len());
$('#length_change3').change( function() { 
  oTable.page.len( $(this).val() ).draw();
});
$('#newFilter3').on( 'keyup', function () {
  table.search( this.value ).draw();
});

$('#tbl_queue tbody').off('click');
$('#tbl_queue tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();
  $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid1" name="addid1" value="'+data[1]+'"/>');
} );

}


//----------------------------------------------------------------Insert 
$(document).ready(function() {
  $('#AddNewilineup').on('click',function() {
    var isCheckedQueue = $("#addid1").val();

    if (!isCheckedQueue){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu item yang mau di Assign",
        type    : "info",
        timer   : 1000,
      });
//window.location.href = "#";
}else{
  swal({
    title             : "Perhatian",
    type              : "warning",
    text              : "Apakah anda sudah yakin dengan data yang telah di masukan, data akan di assign dan tidak dapat di ubah lagi?",
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
        url       : "_ajaxsetassigntype.php",
        cache     : false,
        async     : true,
        data      :{
          type_id  : isCheckedQueue
        },
        success   : function() {
          swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Type Berhasil di Assign ke LineUp",
            type    : "success",  
            timer   : 1000,  
          },function() {
            window.location.hash = "tab_lineup_type";
            location.reload(true);
          })
        },
        error     : function() {
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    }else{
      swal({   
        showConfirmButton: false,
        title: "",
        text : "Assign Type ke LineUp dibatalkan",
        type : "error",  
        timer   : 1000,
      });
//window.location.hash = "tab_que";
//location.reload(true);
QueuePrjFunc();
}
});
}
});
});

$(document).ready(function(){
  QueuePrjFunc();
});

$("#Refreshique").click(function() {
  QueuePrjFunc();
});


$(document).ready(function() {
  $('#Deleteique').on('click', function() {
    var isCheckedQueue = $("#addid1").val();

    if (!isCheckedQueue){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan dihapus",
        type    : "info",
        timer   : 1000,
      });
    }else{
      swal({
        title             : "Perhatian",
        type              : "warning",
        text              : "Hapus item dari daftar queue?",
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
            url       : "_ajaxdeltype.php",
            cache     : false,
            async     : true,
            data      :{
              type_id  : isCheckedQueue
            },
            success   : function() {
              swal({   
                showConfirmButton: false,
                title: "Berhasil",
                text : "Item berhasil dihapus",
                type : "success",
                timer   : 1000,
// button : "success"

});
              QueuePrjFunc();
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
        }
      });
    }

  });
});


$(document).ready(function() {
  $('#Editique').on('click', function() {
    var isCheckedQueue = $("#addid1").val();

    if (!isCheckedQueue){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu item",
        type    : "info",
        timer   : 1500,
      });
    }else{
      window.location.href = "prj_lineupedittype.php?inputIDtype="+isCheckedQueue;
    }
  });
});


$(document).ready(function () {
  $('#tbl_queue tbody').on('click', 'tr', function () {
    var id = $('#addid1').val();

    $.ajax({
      type   : "POST",
      dataType : "JSON",
      data   : {que_id : id},
      success  : function(data) {
          $('#Editique').show();
          $('#Deleteique').show();
        if (data['Status'] != "OK") {
          $('#Editique').hide();
          $('#Deleteique').hide();
        }else{
          $('#Editique').show();
          $('#Deleteique').show();
        }
      }
    });
  });
});


</script>