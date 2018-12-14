<?php
$year2 = date('Y');
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
                <select name='filteryearreason' id='filteryearreason'>
                  <?php
                  for ($i= $year2; $i >= $year2 - 4; $i--) { 
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

        <div class="col_10">&nbsp;</div>
      </td>
    </tr>
  </table>


  <table id="table_reason" class="display" style="width:670px">
    <thead>
      <tr>
        <th class="kpidelay">No</th>
        <th class="kpidelay">id</th>
        <th class="kpidelay">Department</th>
        <th class="kpidelay">Result</th>
        <th class="kpidelay">Note</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>


</div>

<span id="ajaxgraphreason"></span>
<span id="ajaxtablereason"></span>


<script>
  function TableReason(is_year){

    $('#table_reason').DataTable({
      "dom"         : "rt",
      "destroy"     : true,
      "processing"  : true,
      "serverSide"  : true,
      "stateSave"   : true,
      "select"      : { style :  "single", selector: "td" },
      "bAutoWidth"  : false,
      "columnDefs"  : [
      {
        "targets"   : [ 0 ], 
        "className" : "dt-center",
        "width"     : 5,
      },{
        "targets"   : [ 1 ], 
        "className" : "dt-center",
        "visible"   : false,
        "width"     : 5,
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-left",
        "width"     : 100
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-center",
        "width"     : 50
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-left",
        "width"     : 400
      }
      ],
      "ajax"        : {
        url   : 'fetch_reason.php',
        type  : 'POST',
        data  : {
          is_year : is_year
        }
      }
    });



//----------------------------------------------------------------Show entries & Searching


var table = $('#table_reason').DataTable();
var oTable = $('#table_reason').DataTable();


$('#table_reason tbody').off('click');

$('#table_reason tbody').on( 'click', 'tr', function () {
  var data = table.row( this ).data();
  var yearR2 = $('#filteryearreason').val();
  console.log(data[1]);
  var iddept = data[1];
    $.ajax({
      type: "POST",
      url: "_ajaxkpidetailreason.php",
      data: {
        iddept : iddept,
        year   : yearR2
      },
      cache: false,
      success: function(html){
        $("#ajaxtablereason").html(html);
      }
    });
});

}

$(document).on('change', '#filteryearreason', function() {
  var yearR = $(this).val();
  $('#table_reason').DataTable().destroy();
  if (yearR != '') {
    TableReason(yearR);
  }else{
    TableReason();
  }
});

function GraphReason(){
  $.ajax({
    type: "POST",
    url: "_ajaxkpigraphreason.php",
    cache: false,
    success: function(html){
      $("#ajaxgraphreason").html(html);
    }
  });
}


$('#filteryearreason').on('change', function () {
  var graphYear = $('#filteryearreason').val();

  $.ajax({
    type: "POST",
    url: "_ajaxkpigraphreason.php",
    data : "year="+graphYear,
    cache: false,
    success: function(html){
      $("#ajaxgraphreason").html(html);
    }
  });
});

$(document).ready(function(){
  GraphReason();
  TableReason(<?php echo $year2 ?>);
});


</script>