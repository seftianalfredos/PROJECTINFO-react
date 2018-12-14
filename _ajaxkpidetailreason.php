<?php
include 'config.php';

$detail_name    = array();
$detail_number  = array();

if (isset($_POST['iddept']) ) {
  $id_dept  = $_POST['iddept'];
}

if (isset($_POST['year'])) {
  $year = $_POST['year'];
}

$sql1 = $DBcon->prepare("
  SELECT ttl.TitleName AS TitleName
  FROM table_revisitype trt
  LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id
  LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
  LEFT JOIN table_type tt ON trt.type_id = tt.type_id
  WHERE td.DepartementID = '$id_dept' AND YEAR(tt.TypeStartDate) = '$year'
  GROUP BY trt.tit_id
  ");

$sql1->execute();
while ($row = $sql1->fetch(PDO::FETCH_ASSOC)) {
  $detail_name[] = $row['TitleName'];
}

$sql2 = $DBcon->prepare("
  SELECT COUNT(trt.tit_id) AS Result
  FROM table_revisitype trt
  LEFT JOIN table_title ttl ON trt.tit_id = ttl.tit_id
  LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
  LEFT JOIN table_type tt ON trt.type_id = tt.type_id
  WHERE td.DepartementID = '$id_dept' AND YEAR(tt.TypeStartDate) = '$year'
  GROUP BY trt.tit_id
  ");

$sql2->execute();
while ($row = $sql2->fetch(PDO::FETCH_ASSOC)) {
  $detail_number[] = $row['Result'];
}

?>
</div><div class="col_12">&nbsp;</div>
<div class="col_7">
  <table id="table_detailreason" class="display" style="width:670px">
    <thead>
      <tr>
        <th class="kpidelay">No</th>
        <th class="kpidelay">Reason</th>
        <th class="kpidelay">Delay(M)</th>
        <th class="kpidelay">Type</th>
        <th class="kpidelay">PL</th>
        <th class="kpidelay">Group</th>
        <th class="kpidelay">Product</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>  
</div>

<div class="col_5" style="height:330px; border:1px solid  #aaa;">
  <div id="graph-detailreason" style="height: 325px"></div>  
</div>

<script>

  var dept_id         = <?php echo $id_dept ?>;
  var year_reas       = <?php echo $year ?>;
  var detail_name2    = new Array();

  <?php foreach ($detail_name as $key => $val) { ?>
    detail_name2.push('<?php echo $val; ?>');
  <?php } ?>  
  

  $(document).ready(function() {
    $('#table_detailreason').DataTable({
      "dom"         : "rt",
      "destroy"     : true,
      "processing"  : true,
      "paging"      : true,
      "serverSide"  : true,
      "stateSave"   : true,
      "order"       : [[2, "desc"]],
      "ordering"    : true,
      "scrollY"     : "300px",
      "columnDefs"  : [
      {
        "targets"   : [ 0 ], 
        "className" : "dt-center",
        "orderable" : false,
        "width"     : 5
      },{ 
        "targets"   : [ 1 ], 
        "className" : "dt-left",
        "width"     : 400
      },{ 
        "targets"   : [ 2 ], 
        "className" : "dt-center",
        "width"     : 20
      },{ 
        "targets"   : [ 3 ], 
        "className" : "dt-center",
        "width"     : 150
      },{ 
        "targets"   : [ 4 ], 
        "className" : "dt-left",
        "width"     : 50
      },{ 
        "targets"   : [ 5 ], 
        "className" : "dt-left",
        "width"     : 50
      },{ 
        "targets"   : [ 6 ], 
        "className" : "dt-center",
        "width"     : 20
      }
      ],
      "ajax"        : {
        url   : 'fetch_detailreason.php',
        type  : 'POST',
        data  : {
          id   : dept_id,
          year : year_reas
        }
      }
    });




    Highcharts.chart('graph-detailreason', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'DETAIL'
      },
      xAxis: {
        categories: detail_name2,
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: ''
        }
      },
      exporting: { enabled: false },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0,
          dataLabels: {
            enabled: true
          }
        }
      },

      series: [{
        name: 'Type',
        showInLegend: false,
        color:'rgba(247,150,70,10)',
        data: [<?php echo join($detail_number, ',') ?>]

      }]
    });

  });


</script>

