<table class="psi_width1300" border="0">
  <tr>
    <td>
      <div class="col_2">
        <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
          <ul class="button-bar">
            <!-- PROTEKSI USER ROLE -->
            <?php
            if ($_SESSION['role'] == "AD" || $_SESSION['role'] == "M" || $_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" ) {
              ?> 
              <li title="Add New" id="AddNewiPrj"><a><i class="fa fa-plus fa-sm"></i></a></li>
              <li title="Edit" id="EditiPrj"><a><i class="fa fa-pencil fa-sm"></i></a></li>
              <li title="Delete" id="DeleteiPrj"><a><i class="fa fa-trash fa-sm"></i></a></li>
              <?php 
            }
            ?>
            <li title="Refresh" id="RefreshiPrj"><a><i class="fa fa-sync fa-sm"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col_4">&nbsp;</div>   
      <!-- ################################### FILTERING BY PL ###################################################### -->
      <div class="col_2">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-large fa-sm"></i></td>
            <td class="center" >
              <select id="filterPL_prj" name="filterPL_prj" class="inputsel">
                <option value="-" selected disabled>Project Leader</option>
                <option value="All">All</option>
                <?php
                include 'config.php';
                $cek = $DBcon->prepare("SELECT * FROM table_manpower WHERE Otorisasi = 'PL' ORDER BY ManName ASC ");
                $cek->execute();
                while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value='<?php echo $row['man_id']; ?>'><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>
              </select>
            </td>
          </tr>
        </table>
      </div>    
      <!-- ################################### SEARCHING ###################################################### -->
      <div class="col_3">
        <table>
          <tr>
            <td class="right"><i class="fa fa-search fa-sm"></i></td>
            <td class="center"><input class="psi_input" type="text" id="newFilter1" name="newFilter1" placeholder="Search"></td>
          </tr>
        </table>
      </div>
      <!-- ################################### PAGING ###################################################### -->
      <div class="col_1">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
            <td class="center" >
              <select id='length_change_prj' name='length_change_prj' >
                <option value='10'>10</option>
                <option value='20'>20</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_project");
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
<table id="tbl_lineup_proj" class="display" style="width:1450px">
  <thead>
    <tr>
      <th style="width: 5px"></th> 
      <th style="width: 5px">No</th>
      <th style="width: 200px">Project</th>
      <th style="width: 100px">PL</th>
      <th style="width: 30px">Prd</th>
      <th style="width: 120px">Group</th>
      <!-- <th style="width: 5px">Buyer</th> -->
      <th style="width: 50px">StartDate</th>
      <th style="width: 50px">FinishDate</th>
      <th style="width: 50px">Status</th>
      <th style="width: 800px">Note</th>
    </tr>
  </thead>
</table>
<table>
  <tr>
    <td></td>
  </tr>
</table>

<script>
  function LineUpPrjFunc(is_pl){
    $('.clearcheckbox').val('');
    $('#tbl_lineup_proj').DataTable({
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
        "className" : "dt-center",
        "visible"   : false,
        "width"     : 5
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-left",
        "width"     : 200
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-center",
        "width"     : 30
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-left",
        "width"     : 120
      }/*,{ 
        "targets"   : [ 6 ], 
        "className" : "dt-left",
        "visible"   : false,
        "width"     : 5
      }*/,{ 
        "targets"   : [ 6 ], 
        "className" : "dt-left",
        "width"     : 50
      },{ 
        "targets"   : [ 7 ], 
        "className" : "dt-left",
        "width"     : 50
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-center",
        "width"     : 50
      },{ 
        "targets"   : [ 9 ], 
        "className" : "dt-left",
        "width"     : 800
      }
      ],
      "ajax"        : {
        url   : 'fetch_lineupprj.php',
        type  : 'POST',
        data  : {is_pl : is_pl}
      }
    });

//----------------------------------------------------------------Show entries & Searching
var table = $('#tbl_lineup_proj').DataTable();
var oTable = $('#tbl_lineup_proj').DataTable();
$('#length_change_prj').val(oTable.page.len());
$('#length_change_prj').change( function() { 
  oTable.page.len( $(this).val() ).draw();
});
$('#newFilter1').on( 'keyup', function () {
  table.search( this.value ).draw();
} );

$('#tbl_lineup_proj tbody').off('click');
$('#tbl_lineup_proj tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();

  $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid_prj" name="addid_prj" value="'+data[1]+'"/>');
} )

}

//----------------------------------------------------------------Edit 
$(document).ready(function() {
  $('#EditiPrj').on('click',function(e) {
    var isChecked = $("#addid_prj").val();

    if (!isChecked){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,
      });
    }else{
      window.location.href = "prj_lineupeditprj.php?inputIDprj="+isChecked;
    }
  });
});


//----------------------------------------------------------------Delete 
$(document).ready(function(){
  $('#DeleteiPrj').on('click', function(e){
    var isChecked = $("#addid_prj").val();

    if (!isChecked){
      console.log(isChecked);
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
        data    : {
          prj_id  : isChecked
        },
        success : function(data){
          var previousWindowKeyDown = window.onkeydown;
          swal({
            title             : "Perhatian",
            text              : "Hapus Project dari database?",
            showCancelButton  : true, 
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Ya, Hapus saja!",
            cancelButtonText  : "Batalkan",
            closeOnConfirm    : false,
            closeOnCancel     : false
          },
          function(isConfirm){
            window.onkeydown = previousWindowKeyDown;
            if (isConfirm){
              $.ajax({
                type   : "POST",
                dataType : "JSON",
                data   : {prj_id2 : isChecked},
                success : function(data) {
                  if (data['Status'] != "OK") { //----------------- PROTEKSI HAPUS PROJECT APABILA SUDAH MEMILIKI TYPE
                    swal({
                      showConfirmButton : false,
                      title : "Gagal",
                      text  : "Tidak dapat dihapus karena data telah digunakan.",
                      icon  : "error",
                      type  : "error",
                      timer : 1000
                    });
                  }else{
                    $.ajax({
                      type      : "POST",
                      url       : "_ajaxdelprj.php",
                      cache     : false,
                      async     : true,
                      data      :{
                        prj_id  : isChecked
                      },
                      success   : function() {
                        swal({   
                          showConfirmButton: false,
                          title   : "",
                          timer   : 10,
                        });
                        $.rtnotify({
                          title: "Berhasil",
                          message: "Item Project berhasil dihapus.",
                          type: "success",
                          permanent: false,
                          timeout: 4,
                          fade: true,
                          width: 300
                        });
                        LineUpPrjFunc();
                      },
                      error     : function() {
                        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
                      }
                    });
                  }
                }
              });
            }else{
              swal({   
                showConfirmButton: false,
                title   : "",
                timer   : 10,
              });
              $.rtnotify({
                title: "Cancel",
                message: "Project tidak jadi dihapus.",
                type: "default",
                permanent: false,
                timeout: 4,
                fade: true,
                width: 300
              });
              LineUpPrjFunc();
            }
          });
        }
      });
    }
  });
});


//----------------------------------------------------------------- FILTER PL

$(document).on('change', '#filterPL_prj', function() {
  var PL_prj   = $('#filterPL_prj').val();
  $('#tbl_lineup_type').DataTable().destroy();
  if (PL_prj != '-') {
    LineUpPrjFunc(PL_prj);
  }else{
    LineUpPrjFunc();
  }
});


$(document).ready(function(){
  LineUpPrjFunc();
});

$("#RefreshiPrj").click(function() {
  LineUpPrjFunc();
});

//----------------------------------------------------------------Add New 

$("#AddNewiPrj").click(function() {
  window.location.href = "prj_lineupaddprj.php";
});


//---------------------------------------------------------------- Proteksi user untuk hapus dan edit project punya dia saja (kecuali PM)
$(document).ready(function() {
  $('#tbl_lineup_proj tbody').on('click', 'tr', function() {
    var id = $('#addid_prj').val();

    $.ajax({
      type   : "POST",
      dataType : "JSON",
      data   : {prj_id : id},
      success  : function(data) {
        $('#EditiPrj').show();
        $('#DeleteiPrj').show();
        if (data['Status'] != "OK") {
          $('#EditiPrj').hide();
          $('#DeleteiPrj').hide();
        }else{
          $('#EditiPrj').show();
          $('#DeleteiPrj').show();
        }
      }
    });
  });
});

</script>