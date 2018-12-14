<ul class="tabs left">
  <li><a href="#tabdatasch">Data</a></li>
  <li><a ><i>Gantt</i></a></li>
</ul>

<div id="tabdatasch" class="tab-content">
  <table class="psi_width1000" border="0">
    <tr>
      <td>
        <div class="col_2">
          <div class="fixed" data-mfx-fix-at="136" data-mfx-top-position="45">
            <ul class="button-bar">
              <li title="Add New" id="addnewisch"><a><i class="fa fa-plus fa-sm"></i></a></li>
              <li title="Edit" id="editisch"><a><i class="fa fa-pencil fa-sm"></i></a></li>
              <li title="Delete" id="delisch"><a><i class="fa fa-trash fa-sm"></i></a></li>
              <li title="Refresh" id="refreshisch"><a><i class="fa fa-sync fa-sm"></i></a></li>
              <li title="View Schedule" id="viewisch"><a><i class="fa fa-check fa-sm"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col_3">&nbsp;</span></div>
        <div class="col_4">
          <table>
            <tr>
              <td class="right"><i class="fa fa-search fa-sm"></i></td>
              <td class="center"><input class="psi_input" type="text" id="newFilterSchedule" name="newFilterSchedule" placeholder="Search"></td>
            </tr>
          </table>
        </div>
        <div class="col_2">
          <table>
            <tr>
              <td class="right" ><i class="fa fa-bars fa-sm"></i></td>
              <td class="center" >
                <select name='length_change_schedule' id='length_change_schedule'>
                  <option value='10'>10</option>
                  <option value='20'>20</option>
                  <option value='50'>50</option>
                  <option value='100'>100</option>
                </select>
              </td>
            </tr>
          </table>
        </div>        

        <div class="col_1">&nbsp;</div>
      </td>
    </tr>
  </table>

  <div id="addnewsch">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabSchedule">Add New Schedule&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabSchedule" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Type</div>
            <div class="col_4">
              <select name="sche_type" id="sche_type" tabindex="3">
                <option value="-" selected disabled>Pilih Type</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_type");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['type_id']; ?>"><?php echo $row['typeSupply']; ?></option>
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
            <div class="col_2">Designer</div>
            <div class="col_4">
              <select name="sche_desg" id="sche_desg" tabindex="3">
                <option value="-" selected disabled>Pilih Designer</option>
                <?php 
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT *FROM table_design");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $row['dsgn_id'] ?>"><?php echo $row['DesignName']; ?></option>
                <?php 
                }
                ?>
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr id="artwork_desg">
          <td>
            <div class="col_2">Artwork</div>
            <div class="col_4">
              <input type="text" id="artStartDate" name="artStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="artEndDate" name="artEndDate" tabindex="2" placeholder="End Date">
              <select id="artPIC">
                <option value="-" selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi LIKE 'SH' ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr id="mech_desg">
          <td>
            <div class="col_2">Mechanic</div>
            <div class="col_4">
              <input type="text" id="mechStartDate" name="mechStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="mechEndDate" name="mechEndDate" tabindex="2" placeholder="End Date">
              <select id="mechPIC">
                <option value="-" selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi LIKE 'SH' ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr id="cyc_desg">
          <td>
            <div class="col_2">Cycle Unit</div>
            <div class="col_4">
              <input type="text" id="cycStartDate" name="cycStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="cycEndDate" name="cycEndDate" tabindex="2" placeholder="End Date">
              <select id="cycPIC">
                <option value="-" selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi LIKE 'SH' ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr id="elec_desg">
          <td>
            <div class="col_2">Electronic</div>
            <div class="col_4">
              <input type="text" id="elecStartDate" name="elecStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="elecEndDate" name="elecEndDate" tabindex="2" placeholder="End Date">
              <select id="elecPIC">
                <option value="-" selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi LIKE 'SH' ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr id="soft_desg">
          <td>
            <div class="col_2">Software</div>
            <div class="col_4">
              <input type="text" id="softStartDate" name="softStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="softEndDate" name="softEndDate" tabindex="2" placeholder="End Date">
              <select id="softPIC">
                <option value="-" selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower WHERE otorisasi LIKE 'SH' ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
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
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="addnewschbtn" class="psi_button1" tabindex="4"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div id="editingsch">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditSchedule"><span id="response_sch"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditSchedule" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
          	<input type="hidden" name="editType_id" id="editType_id">
            <div class="col_2">Designer</div>
            <div class="col_4">
              <select name="editSche_desg" id="editSche_desg" tabindex="3">
                <option value="-" selected disabled>Pilih Designer</option>
                <?php 
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT *FROM table_design");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <option value="<?php echo $row['dsgn_id'] ?>"><?php echo $row['DesignName']; ?></option>
                <?php 
                }
                ?>
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr id="editArt_desg">
          <td>
            <div class="col_2">Artwork</div>
            <div class="col_4">
              <input type="hidden" name="editsch_id" id="editsch_id">
              <input type="text" id="editArtStartDate" name="editArtStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="editArtEndDate" name="editArtEndDate" tabindex="2" placeholder="End Date">
              <select id="editArtPIC">
                <option selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr id="editMech_desg">
          <td>
            <div class="col_2">Mechanic</div>
            <div class="col_4">
              <input type="text" id="editMechStartDate" name="editMechStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="editMechEndDate" name="editMechEndDate" tabindex="2" placeholder="End Date">
              <select id="editMechPIC">
                <option selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr id="editCyc_desg">
          <td>
            <div class="col_2">Cycle Unit</div>
            <div class="col_4">
              <input type="text" id="editCycStartDate" name="editCycStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="editCycEndDate" name="editCycEndDate" tabindex="2" placeholder="End Date">
              <select id="editCycPIC">
                <option selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr id="editElec_desg">
          <td>
            <div class="col_2">Electronic</div>
            <div class="col_4">
              <input type="text" id="editElecStartDate" name="editElecStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="editElecEndDate" name="editElecEndDate" tabindex="2" placeholder="End Date">
              <select id="editElecPIC">
                <option selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr id="editSoft_desg">
          <td>
            <div class="col_2">Software</div>
            <div class="col_4">
              <input type="text" id="editSoftStartDate" name="editSoftStartDate" tabindex="2" placeholder="Start Date">
              <input type="text" id="editSoftEndDate" name="editSoftEndDate" tabindex="2" placeholder="End Date">
              <select id="editSoftPIC">
                <option selected disabled>PIC</option>
                <?php
                include 'config.php';
                $stmt   = $DBcon->prepare("SELECT *FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['ManName']; ?>"><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>   
              </select>
            </div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_1">&nbsp;</div>
            <div class="col_2"><button id="editschbtn" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_9">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <table id="tbl_schedule" class="display" style="width:310px;">
    <thead>
      <tr>
        <th></th>
        <th>id</th>
        <th>Type</th>
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

<span id="detailSchedule"></span>


<script>
  function hideDesign() {
    $('#artwork_desg, #mech_desg, #cyc_desg, #elec_desg, #soft_desg, #editArt_desg, #editMech_desg, #editCyc_desg, #editElec_desg, #editSoft_desg').hide();
  }

  $(document).ready(function() {
    hideDesign();
  });

  $(document).ready(function() {
    $('#sche_desg').change(function() {
      var dsgn = $(this).val();

      switch(dsgn){
        case "1":
        hideDesign();
        $('#artwork_desg').show(300);
        break;
        case "2":
        hideDesign();
        $('#mech_desg').show(300);
        break;
        case "3":
        hideDesign();
        $('#cyc_desg').show(300);
        break;
        case "4":
        hideDesign();
        $('#elec_desg').show(300);
        break;
        case "5":
        hideDesign();
        $('#soft_desg').show(300);
        break;

      }

    });
  });

  $(document).ready(function() {
    $('#editSche_desg').change(function() {
      var dsgn = $(this).val();

      switch(dsgn){
        case "1":
        hideDesign();
        $('#editArt_desg').show(300);
        break;
        case "2":
        hideDesign();
        $('#editMech_desg').show(300);
        break;
        case "3":
        hideDesign();
        $('#editCyc_desg').show(300);
        break;
        case "4":
        hideDesign();
        $('#editElec_desg').show(300);
        break;
        case "5":
        hideDesign();
        $('#editSoft_desg').show(300);
        break;

      }

    });
  });

  $(document).ready(function() {
    $('#artStartDate, #artEndDate, #mechStartDate, #mechEndDate, #cycStartDate, #cycEndDate, #elecStartDate, #elecEndDate, #softStartDate, #softEndDate, #editArtStartDate, #editArtEndDate, #editMechStartDate, #editMechEndDate, #editCycStartDate, #editCycEndDate, #editElecStartDate, #editElecEndDate, #editSoftStartDate, #editSoftEndDate').datepicker({ 
      dateFormat  : 'dd MM yy',
      changeMonth : true,
      changeYear  : true
    });
  });

    $('#sche_type').chosen().change(function() {
      var v = $(this).val();
    });


  function ScheduleFunction(){
    $('.clearcheckbox').val('');
    $('#tbl_schedule').DataTable({
      "dom"         : "rtip",
      "destroy"     : true,
      "processing"  : true,
      "pageLength"  : 20,
      "serverSide"  : true,
      "stateSave"   : true,
      "select"      : { style :  "single", selector: "td" },
      "bAutoWidth"  : false,
      "order"       : [[1, "asc"]],
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
        "width"     : 300
      }],
      "ajax"        : {
        url   : 'fetch_schedule.php',
        type  : 'POST'
      }
    });

//----------------------------------------------------------------Show entries & Searching
var table = $('#tbl_schedule').DataTable();
var oTable = $('#tbl_schedule').DataTable();
$('#length_change_schedule').val(oTable.page.len());
$('#length_change_schedule').change( function() { 
  oTable.page.len( $(this).val() ).draw();
});
$('#newFilterSchedule').on( 'keyup', function () {
  table.search( this.value ).draw();
} );

$('#tbl_schedule tbody').off('click');
$('#tbl_schedule tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();
  $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addidsche" name="addidsche" value="'+data[1]+'"/>');
});

$('#tbl_schedule tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();
  var id = data[1];
  if(id) {
    $.ajax({
      type: "POST",
      url: "_ajaxkpidetailschedule.php",
      data: "idtype="+ id,
      cache: false,
      success: function(html){
        $("#detailSchedule").html(html);
      }
    });
  }
});


$('#tbl_schedule tbody').off('click', function() {
	$('#detailSchedule').hide();
});

}

$(document).ready(function() {
  ScheduleFunction();
});

$(document).ready(function() {
  $('#refreshisch').click(function() {
    ScheduleFunction();
  });
});

$(document).ready(function() {
  $('#addnewschbtn').click(function() {
    var type_id       = $('#sche_type').val();
    var artStartDate  = $('#artStartDate').val();
    var artEndDate    = $('#artEndDate').val();
    var artPIC        = $('#artPIC').val();
    var mechStartDate = $('#mechStartDate').val();
    var mechEndDate   = $('#mechEndDate').val();
    var mechPIC       = $('#mechPIC').val();
    var cycStartDate  = $('#cycStartDate').val();
    var cycEndDate    = $('#cycEndDate').val();
    var cycPIC        = $('#cycPIC').val();
    var elecStartDate = $('#elecStartDate').val();
    var elecEndDate   = $('#elecEndDate').val();
    var elecPIC       = $('#elecPIC').val();
    var softStartDate = $('#softStartDate').val();
    var softEndDate   = $('#softEndDate').val();
    var softPIC       = $('#softPIC').val();

    if (type_id == "-") {
      swal("Fail !", "Pilih Type", "warning");
    }else if (!artStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (!artEndDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (artPIC == "-") {
      swal("Fail !", "Pilih PIC", "warning");
    }else if (!mechStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (!mechStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (mechPIC == "-") {
      swal("Fail !", "Pilih PIC", "warning");
    }else if (!cycStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (!cycStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (cycPIC == "-") {
      swal("Fail !", "Pilih PIC", "warning");
    }else if (!elecStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (!elecStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (elecPIC == "-") {
      swal("Fail !", "Pilih PIC", "warning");
    }else if (!softStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (!softStartDate) {
      swal("Fail !", "Tanggal belum diisi", "warning");
    }else if (softPIC == "-") {
      swal("Fail !", "Pilih PIC", "warning");
    }else{
    	$.ajax({
          type      : "POST",
          dataType  : "JSON",
          data      : {
          	typeSch : type_id
          },
          success	: function(data) {
          	if (data['Status'] == "OK") {
      			$.ajax({
      			  type      : "POST",
      			  url       : "_ajaxaddsch.php",
      			  cache     : false,
      			  async     : true,
      			  dataType  : "text",
      			  data      : {
      			    type_id         : type_id,
      			    artStartDate    : artStartDate,
      			    artEndDate      : artEndDate,
      			    artPIC          : artPIC,
      			    mechStartDate   : mechStartDate,
      			    mechEndDate     : mechEndDate,
      			    mechPIC         : mechPIC,
      			    cycStartDate    : cycStartDate,
      			    cycEndDate      : cycEndDate,
      			    cycPIC          : cycPIC,
      			    elecStartDate   : elecStartDate,
      			    elecEndDate     : elecEndDate,
      			    elecPIC         : elecPIC,
      			    softStartDate   : softStartDate,
      			    softEndDate     : softEndDate,
      			    softPIC         : softPIC
      			  },
      			  success : function() {
      			    swal({   
      			      showConfirmButton: false,
      			      title   : "Berhasil",
      			      text    : "Schedule baru berhasil ditambahkan.",
      			      icon    : "success",
      			      type    : "success",
      			      timer   : 1500
      			      // button  : "success"
      			    });
      			    hide_sche();
      			    ScheduleFunction();
      			    clearInput_sche();
      			  },
      			  error     : function(){
      			    swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      			  }
      			});
          	}else{
              swal({
                showConfirmButton : false,
                title : "Gagal",
                text  : "Schedule untuk Type tersebut telah ada.",
                icon  : "error",
                type  : "error",
                timer : 2000
              });
          	}
          }
    	});
    }

  });
});

$(document).ready(function() {
  $('#editisch').click(function () {
    var isCheckedSche = $('#addidsche').val();

    if (!isCheckedSche) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingsch').hide();
    }else{
      $.ajax({
        type  : "POST",
        dataType : "JSON",
        data : {
          type_idSch : isCheckedSche
        },
        success : function(data) {
          $('#response_sch').html("Editing : " + data[0][1]);
          $('#editType_id').val(data[0][0]);
          $('#editArtStartDate').val(data[0][3]);
          $('#editArtEndDate').val(data[0][4]);
          $('#editArtPIC').val(data[0][5]);
          $('#editMechStartDate').val(data[1][3]);
          $('#editMechEndDate').val(data[1][4]);
          $('#editMechPIC').val(data[1][5]);
          $('#editCycStartDate').val(data[2][3]);
          $('#editCycEndDate').val(data[2][4]);
          $('#editCycPIC').val(data[2][5]);
          $('#editElecStartDate').val(data[3][3]);
          $('#editElecEndDate').val(data[3][4]);
          $('#editElecPIC').val(data[3][5]);
          $('#editSoftStartDate').val(data[4][3]);
          $('#editSoftEndDate').val(data[4][4]);
          $('#editSoftPIC').val(data[4][5]);
          $('#editingsch').show(300);
        }
      });
    }
  });

  $('#editschbtn').click(function() {
    var type_id       = $('#editType_id').val();
    var artStartDate  = $('#editArtStartDate').val();
    var artEndDate    = $('#editArtEndDate').val();
    var artPIC        = $('#editArtPIC').val();
    var mechStartDate = $('#editMechStartDate').val();
    var mechEndDate   = $('#editMechEndDate').val();
    var mechPIC       = $('#editMechPIC').val();
    var cycStartDate  = $('#editCycStartDate').val();
    var cycEndDate    = $('#editCycEndDate').val();
    var cycPIC        = $('#editCycPIC').val();
    var elecStartDate = $('#editElecStartDate').val();
    var elecEndDate   = $('#editElecEndDate').val();
    var elecPIC       = $('#editElecPIC').val();
    var softStartDate = $('#editSoftStartDate').val();
    var softEndDate   = $('#editSoftEndDate').val();
    var softPIC       = $('#editSoftPIC').val();


    $.ajax({
      type      : "POST",
      url       : "_ajaxeditsch.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        type_id         : type_id,
        artStartDate    : artStartDate,
        artEndDate      : artEndDate,
        artPIC          : artPIC,
        mechStartDate   : mechStartDate,
        mechEndDate     : mechEndDate,
        mechPIC         : mechPIC,
        cycStartDate    : cycStartDate,
        cycEndDate      : cycEndDate,
        cycPIC          : cycPIC,
        elecStartDate   : elecStartDate,
        elecEndDate     : elecEndDate,
        elecPIC         : elecPIC,
        softStartDate   : softStartDate,
        softEndDate     : softEndDate,
        softPIC         : softPIC
      },
      success : function() {
        swal({   
          showConfirmButton: false,
          title   : "Berhasil",
          text    : "Schedule berhasil diubah.",
          icon    : "success",
          type    : "success",
          timer   : 1500
          /*button  : "success"*/
        });
        hide_sche();
        ScheduleFunction();
        clearInput_sche();
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});

$(document).ready(function() {
  $('#delisch').click(function() {
    var isCheckedSche = $('#addidsche').val();

    if (!isCheckedSche) {
      swal({   
        showConfirmButton: false,
        title     : "",
        text      : "Pilih salah satu yang akan dihapus",
        type      : "info",
        timer     : 1000,
      });
    }else{
      $.ajax({
        type  : "POST",
        dataType : "JSON",
        data : {
          type_idSch : isCheckedSche
        },
        success : function(data) {
          swal({
            title             : "Perhatian",
            text              : "Hapus Schedule untuk Type "+data[0][1]+" dari database?",
            showCancelButton  : true, 
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Ya, Hapus saja!",
            cancelButtonText  : "Batalkan",
            closeOnConfirm    : false,
            closeOnCancel     : false
          },
          function(isConfirm) {
            if (isConfirm){
              $.ajax({
                type  : "POST",
                url   : "_ajaxdelsch.php",
                cache : false,
                async : true,
                data  : {
                  type_id : isCheckedSche
                },
                success: function(){
                  swal({   
                    showConfirmButton: false,
                    title   : "",
                    timer   : 10,
                  });
                  $.rtnotify({
                    title: "Berhasil",
                    message: "Item Schedule berhasil dihapus.",
                    type: "success",
                    permanent: false,
                    timeout: 4,
                    fade: true,
                    width: 300
                  });
                  ScheduleFunction();
                },
                error: function(){
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
          }
          );
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#viewisch').click(function() {
    var isCheckedSche = $('#addidsche').val();

    if (!isCheckedSche) {
      swal({   
        showConfirmButton: false,
        title     : "",
        text      : "Pilih salah satu",
        type      : "info",
        timer     : 1000,
      });
    }else{
      window.location.href = "prj_chartSchedule.php?inputTypeID="+isCheckedSche;
    }
  });
});
</script>