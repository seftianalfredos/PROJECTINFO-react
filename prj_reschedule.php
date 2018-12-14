<table class="psi_width1300" border="0">
  <tr>
    <td>
      <div class="col_2">
        <ul class="button-bar">
          <?php
          if ($_SESSION['role'] == "AD" || $_SESSION['role'] == "M" || $_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" ) {
            ?> 
            <li title="Add New" id="AddiResch"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="EditiResch"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="DeleteiResch"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <?php 
          }
          ?>
          <li title="Refresh" id="RefreshiResch"><a><i class="fa fa-sync fa-sm"></i></a></li>
        </ul>
      </div>
      <div class="col_4"></div>

      <div class="col_2">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-list fa-sm"></i></td>
            <td class="center" >
              <select id="filterPrj" name="filterPrj" class="inputsel">
                <option value="-" selected disabled>Project</option>
                <option value="All">All</option>
                <?php
                include 'config.php';
                $sql = $DBcon->prepare("SELECT *FROM table_project ORDER BY ProjectName ASC");
                $sql->execute();
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>  
                  <option value="<?php echo $row['prj_id'] ?>"><?php echo $row['ProjectName'] ?></option>
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
            <td class="center"><input class="psi_input" type="text" id="newFilterrev" name="newFilterrev" placeholder="Search"></td>
          </tr>
        </table>
      </div>

      <div class="col_1">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-list fa-sm"></i></td>
            <td class="center" >
              <select id='length_changerev' name='length_changerev' >
                <option value='10'>10</option>
                <option value='20'>20</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_revisitype");
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

<table id="tbl_reschedule" class="display" style="width:1400px">
  <thead>
    <tr>
      <th style="width: 5px"></th>
      <th style="width: 5px">id</th>
      <th style="width: 200px">Project</th>
      <th style="width: 125px">Type</th>
      <th style="width: 50px">Rev. No.</th>
      <th style="width: 75px">Rev. Date</th>
      <th style="width: 75px">Department</th>
      <th style="width: 250px">Reason</th>
      <th style="width: 600px">Note</th>
    </tr>
  </thead>
</table>

<table>
  <tr>
    <td height="15" ></td>
  </tr>
</table>
<script>

  $("#filterPrj").chosen().change(function() {
    var v = $(this).val();
  });


  function RescheduleFunc(is_prj){
    $('#tbl_reschedule').DataTable({
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
        "visible"   : false,
        "width"     : 5,
        "className" : "select-checkbox"    
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-left",
        "width"     : 200
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-left",
        "width"     : 125
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-center",
        "width"     : 50
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-center",
        "width"     : 75
      },{ 
        "targets"   : [ 6 ], 
        "className" : "dt-center",
        "width"     : 75
      },{ 
        "targets"   : [ 7 ], 
        "className" : "dt-left",
        "width"     : 250
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-left",
        "width"     : 600
      }
      ],
      "ajax"        : {
        url   : 'fetch_reschedule.php',
        type  : 'POST',
        data  : {is_prj : is_prj}
      }
    });


//Show entries & Searching
var table = $('#tbl_reschedule').DataTable();
var oTable = $('#tbl_reschedule').DataTable();
$('#length_changerev').val(oTable.page.len());
$('#length_changerev').change( function() { 
  oTable.page.len( $(this).val() ).draw();
});
$('#newFilterrev').on( 'keyup', function () {
  table.search( this.value ).draw();
});

$('#tbl_reschedule tbody').off('click');
$('#tbl_reschedule tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();
  $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid" name="addid" value="'+data[1]+'"/>');
} );

}

$(document).on('change', '#filterPrj', function() {
  var prj_resc = $('#filterPrj').val();

  $('#tbl_reschedule').DataTable().destroy();
  if (prj_resc != '-') {
    RescheduleFunc(prj_resc);
  }else{
    RescheduleFunc();
  }
});


$(document).ready(function(){
  RescheduleFunc('All');
});

$("#RefreshiResch").click(function() {
  RescheduleFunc();
});


$("#AddiResch").click(function() {
  window.location.href = "prj_rescheduleadd.php";
});


$("#EditiResch").click(function() {
//var isCheckedRev   = $("input[name=cekrevT]:checked").val();
var isCheckedRev = $("#addid").val();

if (!isCheckedRev){
  swal({   
    showConfirmButton: false,
    title   : "",
    text    : "Pilih salah satu yang akan diedit",
    type    : "info",
    timer   : 1000
  });
//window.location.href = "#";
}else{
  window.location.href = "prj_rescheduleedit.php?inputIDrev="+isCheckedRev;
}
});

$(document).ready(function() {
  $('#DeleteiResch').on('click', function() {
    var isCheckedRev = $("#addid").val();
//var isCheckedRev   = $("input[name=cekrevT]:checked").val();

if (!isCheckedRev){
  swal({   
    showConfirmButton: false,
    title   : "",
    text    : "Pilih salah satu yang akan dihapus",
    type    : "info",
    timer   : 1000
  });
//window.location.href = "#";
}else{
  swal({
    title             : "Perhatian",
    text              : "Hapus Item ini dari database?",
    showCancelButton  : true, 
    confirmButtonColor: "#DD6B55",
    confirmButtonText : "Ya, Hapus saja!",
    cancelButtonText  : "Batalkan",
    closeOnConfirm    : false,
    closeOnCancel     : false
  },
  function(isConfirm){
    if (isConfirm){
      $.ajax({
        type      : "POST",
        url       : "_ajaxdelresche.php",
        cache     : false,
        async     : true,
        data      :{
          revT_id  : isCheckedRev
        },
        success   : function() {
          swal({   
            showConfirmButton: false,
            title: "Berhasil",
            text : "Reschedule berhasil dihapus",
            type : "success",
            timer   : 1000,
          });
          RescheduleFunc();

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
      RescheduleFunc();
    }
  });
}
});
});


$(document).ready(function() {
  $('#tbl_reschedule tbody').on('click', 'tr', function() {
    var id = $('#addid').val();

    $.ajax({
      type   : "POST",
      dataType : "JSON",
      data   : {revT_id : id},
      success  : function(data) {
          $('#EditiResch').show();
          $('#DeleteiResch').show();
        if (data['Status'] != "OK") {
          $('#EditiResch').hide();
          $('#DeleteiResch').hide();
        }else{
          $('#EditiResch').show();
          $('#DeleteiResch').show();
        }
      }
    });
  });
});




</script>