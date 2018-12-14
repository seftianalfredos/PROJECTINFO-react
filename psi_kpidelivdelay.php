<?php
$year = date('Y');

if (isset($_POST['id'])) {
  $tahun = $_POST['id'];
  exit();
}
?>

<div class="col_7">
  <table >
    <tr>
      <td>

        <div class="col_2">
          <table>
            <tr>
              <td class="right" >Year</td>
              <td class="center" >
                <select name='filteryear' id='filteryear'>
                  <?php
                  for ($i= $year; $i >= $year - 4; $i--) { 
                    ?>
                    <option value='<?php echo $i ?>'><?php echo $i ?></option>
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
              <td class="right">PL</td>
              <td class="center">
                <select id="filterPL" name="filterPL" class="inputsel">
                  <option value="-" disabled>Project Leader</option>
                  <option value="All" selected>All</option>
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

        <div class="col_3">
          <table>
            <tr>
              <td class="right" >Category</td>
              <td class="center" >
                <select name='filtercategory' id='filtercategory'>
                  <option value="-" disabled>Group</option>
                  <option value='All'>All</option>
                  <?php
                  include 'config.php';
                  $cek = $DBcon->prepare("SELECT *FROM table_group ORDER BY GroupName ASC");
                  $cek->execute();
                  while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['grp_id'] ?>"><?php echo $row['GroupName'] ?></option>
                  <?php 
                  }
                  ?>  
                </select>
              </td>
            </tr>
          </table>
        </div>

        <div class="col_2">&nbsp;</div>
      </td>
    </tr>
  </table>

  <table id="table_delay" class="display" style="width:850px;">
    <thead>
      <tr>
        <th class="kpidelay">No</th>
        <th class="kpidelay">Delay</th>
        <th class="kpidelay">id</th>
        <th class="kpidelay">Type</th>
        <th class="kpidelay">Plan</th>
        <th class="kpidelay">Real</th>
        <th class="kpidelay">Rev</th>
        <th class="kpidelay">Category</th>
        <th class="kpidelay">Project</th>
        <th class="kpidelay">PL</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>


</div>

<span id="ajaxgraphdelay"></span>
<span id="ajaxtabledelay"></span>


<script>

  function TableDelay(is_year, is_pl, is_grp){

    $('#table_delay').DataTable({
      "dom"         : "rt",
      "destroy"     : true,
      "processing"  : true,
      "serverSide"  : true,
      "stateSave"   : true,
      "select"      : { style :  "single", selector: "td" },
      "bAutoWidth"  : false,     
      "scrollX"     : true,
      "scrollY"     : "275px",
      "columnDefs"  : [
      {
        "targets"   : [ 0 ], 
        "className" : "dt-center",
        "width"     : 5,
      },{ 
        "targets"   : [ 1 ], 
        "className" : "dt-center",
        "width"     : 50
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-center",
        "visible"   : false,
        "width"     : 5
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-center",
        "width"     : 150
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 6 ], 
        "className" : "dt-center",
        "width"     : 50
      },{ 
        "targets"   : [ 7 ], 
        "className" : "dt-left",
        "width"     : 50
      },{ 
        "targets"   : [ 8 ], 
        "className" : "dt-left",
        "width"     : 140
      },{ 
        "targets"   : [ 9 ], 
        "className" : "dt-left",
        "width"     : 200
      }
      ],
      "ajax"        : {
        url   : 'fetch_delay.php',
        type  : 'POST',
        data  : {
          is_year : is_year,
          is_pl   : is_pl,
          is_grp 	: is_grp
        }
      }
    });



//----------------------------------------------------------------Show entries & Searching
var table = $('#table_delay').DataTable();
var oTable = $('#table_delay').DataTable();

$('#filtercategory').on( 'keyup', function () {
  table.search( this.value ).draw();
});

$('#table_delay tbody').off('click');

$('#table_delay tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();
  var id = data[2];
  if(id) {
    $.ajax({
      type: "POST",
      url: "_ajaxkpidetaildelay.php",
      data: "idtype="+ id,
      cache: false,
      success: function(html){
        $("#ajaxtabledelay").html(html);
      }
    });
  }
});
}


$(document).on('change', '#filteryear, #filterPL, #filtercategory', function() {
  var year = $('#filteryear').val();
  var PL   = $('#filterPL').val();
  var GRP  = $('#filtercategory').val();
  $('#table_delay').DataTable().destroy();
  if (year != '' || PL != '-' || PL != '-') {
    TableDelay(year, PL, GRP);
  }else{
    TableDelay();
  }
});


function GraphDelay(){
  $.ajax({
    type: "POST",
    url: "_ajaxkpigraphdelay.php",
    cache: false,
    success: function(html){
      $("#ajaxgraphdelay").html(html);
    }
  });
}

$('#filteryear').on('change', function () {
var graphYear = $('#filteryear').val();

  $.ajax({
    type: "POST",
    url: "_ajaxkpigraphdelay.php",
    data : "year="+graphYear,
    cache: false,
    success: function(html){
      $("#ajaxgraphdelay").html(html);
    }
  });
});


$(document).ready(function(){
  GraphDelay();
  TableDelay(<?php echo $year ?>, 'All', 'All');
});


</script>