<table class="psi_width1300" border="0">
  <tr>
    <td>
      <div class="col_2">
        <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
          <ul class="button-bar">
            <?php
            if ($_SESSION['role'] == "AD" || $_SESSION['role'] == "M" || $_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" ) {
              ?> 
              <li title="Add New" id="AddNewiType"><a><i class="fa fa-plus fa-sm"></i></a></li>
              <li title="Edit" id="EditiType"><a><i class="fa fa-pencil fa-sm"></i></a></li>
              <li title="Move to Queue" id="movediType"><a><i class="fa fa-arrow-left fa-sm"></i></a></li>
              <?php 
            }
            ?>
            <li title="Refresh" id="RefreshiType"><a><i class="fa fa-sync fa-sm"></i></a></li>
            <li title="Advance Filter" id="FilteriType"><a><i class="fa fa-th-large fa-sm"></i></a></li>
            <li title="View Product Specification" id="ViewSpec"><a><i class="fa fa-list fa-sm"></i></a></li>
          </ul>
        </div>
      </div>
      <!--################################################################### POP UP ADVANCED FILTER ###################################################################-->

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="color: black;">
              <h4 class="modal-title" id="myModalLabel">Advanced Filter</h4>
            </div>
            <div class="modal-body" style="color: black;">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" id="modal-close" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- ############################################################################################################################################################## -->
      <div class="col_2"></div>
      <div class="col_2">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-th-large fa-sm"></i></td>
            <td class="center" >
              <select id="filterPL_type" name="filterPL_type" class="inputsel">
                <option value="-" selected disabled>Project Leader</option>
                <option value="All">All</option>
                <?php
                include 'config.php';
                $stmt2  = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi = 'PL' ORDER BY ManName ASC ");
                $stmt2->execute();
                while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['man_id']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>  
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
              <select id="filterSTS_type" name="filterSTS_type" class="inputsel">
                <option value="-" selected disabled>Status</option>
                <option value="All">All</option>
                <?php
                include 'config.php';
                $stmt2  = $DBcon->prepare("SELECT *FROM table_status WHERE sc_id = 7 ORDER BY StatusName ASC ");
                $stmt2->execute();
                while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['sta_id']; ?>"><?php echo $row['StatusName']; ?></option>
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
            <td class="center"><input class="psi_input" type="text" id="newFilter2" name="newFilter2" placeholder="Search"></td>
          </tr>
        </table>
      </div>
      <div class="col_1">
        <table>
          <tr>
            <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
            <td class="center" >
              <select id='length_change2' name='length_change2' >
                <option value='10'>10</option>
                <option value='20'>20</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_type");
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

<table id="tbl_lineup_type" class="display" style="width:1915px">
  <thead>
    <tr>
      <th style="width: 5px"></th>
      <th style="width: 5px">type_id</th>
      <th style="width: 200px">Type</th>
      <th style="width: 200px">Project</th>
      <th style="width: 125px">PL</th>
      <th style="width: 30px">Prd</th>
      <th style="width: 30px">Chasis</th>
      <th style="width: 30px">Alias</th>
      <th style="width: 90px">Start</th>
      <th style="width: 80px">Finish</th>
      <th style="width: 30px">Rev</th>
      <th style="width: 80px">Rev.Date</th>
      <th style="width: 100px">Status Prj</th>
      <th style="width: 100px">Status Type</th>
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
  function LineUpTypeFunc(is_pl, is_sts){
    $('.clearcheckbox').val('');
    $('#tbl_lineup_type').DataTable({
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
        "width"     : 5    
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-left",
        "width"     : 200
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-left",
        "width"     : 200
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-left",
        "width"     : 150
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-center",
        "width"     : 30
      },{ 
        "targets"   : [ 6 ], 
        "className" : "dt-center",
        "width"     : 30
      },{ 
        "targets"   : [ 7 ], 
        "className" : "dt-left",
        "width"     : 30
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-center",
        "width"     : 90
      },{ 
        "targets"   : [ 9 ], 
        "className" : "dt-center",
        "width"     : 80
      },{ 
        "targets"   : [ 10 ], 
        "className" : "dt-left",
        "width"     : 30
      },{ 
        "targets"   : [ 11 ], 
        "className" : "dt-center",
        "width"     : 80
      },{ 
        "targets"   : [ 12 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 13 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 14 ], 
        "className" : "dt-left",
        "width"     : 800
      }
      ],
      "ajax"        : {
        url   : 'fetch_lineuptype.php',
        type  : 'POST',
        data  : {
          is_pl : is_pl,
          is_sts : is_sts
        }
      }
    });

//----------------------------------------------------------------Show entries & Searching
var table = $('#tbl_lineup_type').DataTable();
var oTable = $('#tbl_lineup_type').DataTable();
$('#length_change2').val(oTable.page.len());
$('#length_change2').change( function() { 
  oTable.page.len( $(this).val() ).draw();
});
$('#newFilter2').on( 'keyup', function () {
  table.search( this.value ).draw();
});

$('#tbl_lineup_type tbody').off('click');
$('#tbl_lineup_type tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();

  $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid_type" name="addid_type" value="'+data[1]+'"/>');
} )

}

//----------------------------------------------------------------Edit 
$(document).ready(function() {
  $('#EditiType').on('click',function(e) {
    var isChecked = $("#addid_type").val();

    if (!isChecked){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,
      });
    }else{
      window.location.href = "prj_lineupedittype.php?inputIDtype="+isChecked;
    }
  });
});


//----------------------------------------------------------------- FILTER PL

$(document).on('change', '#filterPL_type, #filterSTS_type', function() {
  var PL_type   = $('#filterPL_type').val();
  var sts_type  = $('#filterSTS_type').val();

  $('#tbl_lineup_type').DataTable().destroy();
  if (PL_type != '-' || sts_type != '-') {
    LineUpTypeFunc(PL_type, sts_type);
  }else{
    LineUpTypeFunc();
  }
});




$(document).ready(function(){
  LineUpTypeFunc('All', 'All');
});

$("#RefreshiType").click(function() {
  LineUpTypeFunc();
});



//----------------------------------------------------------------Add New 
$("#AddNewiType").click(function() {
  window.location.href = "prj_lineupaddtype.php";
});


//----------------------------------------------------------------View Spec 

$(document).ready(function() {
  $("#ViewSpec").click(function() {
    var isCheckedtype = $("#addid_type").val();

    if (!isCheckedtype){
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu item",
        type    : "info",
        timer   : 1000,
      });
      window.location.href = "#";
    }else{
      window.location.href = "prj_lineupviewspec.php?idType="+isCheckedtype;
    }
  });
});


/*#########################  POP UP ADVANCED FILTER #######################################*/

$(document).ready(function() {
  $('#FilteriType').click(function() {
    $('#myModal').show();
    $.post('prj_lineupfilter.php', {
      id : $(this).attr('id')}, 
      function(html) {
        $('.modal-body').html(html);
      });
  });

  $('#modal-close').click(function() {
    $('#myModal').hide();
  });

});

// BUAT PINDAHIN KE QUEUE (UNASSIGN)
$(document).ready(function() {
	$('#movediType').click(function() {
		var isCheckedtype = $('#addid_type').val();

		if (!isCheckedtype){
      		swal({   
      		  showConfirmButton: false,
      		  title   : "",
      		  text    : "Pilih salah satu item",
      		  type    : "info",
      		  timer   : 1000,
      		});
      		window.location.href = "#";
		}else{
			$.ajax({
				url		 : "_ajaxmovedqueue.php",
				type  	 : "POST",
				cache    : false,
				async	 : true,
				dataType : "text",
				data 	 : {
					type_id : isCheckedtype
				},
				success : function() {
					swal({
						title 	: "Berhasil",
						text	: "Berhasil dipindahkan",
						icon	: "success",
						type 	: "success",
						button  : "success"
					}, function() {
						window.location.href = "psi_project.php#tab_que";
					});
				},
				error	: function() {
					swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
				}
			});
		}
	});
});


// VALIDASI PROTEKSI EDIT DAN DELETE TYPE MILIKNYA SENDIRI (KECUALI PM)
$(document).ready(function() {
	$('#tbl_lineup_type tbody').on('click', 'tr', function() {
		var id = $('#addid_type').val();

		$.ajax({
			type 	 : "POST",
			dataType : "JSON",
			data 	 : {type_id : id},
			success  : function(data) {
					$('#EditiType').show();
					$('#movediType').show();
				if (data['Status'] != "OK") {
					$('#EditiType').hide();
					$('#movediType').hide();
				}else{
					$('#EditiType').show();
					$('#movediType').show();
				}
			}
		});
	});
});

</script>