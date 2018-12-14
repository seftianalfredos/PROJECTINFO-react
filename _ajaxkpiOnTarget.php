<?php
include 'config.php';

$yearNow = date('Y');


if(isset($_POST["idy"])) {
  $year = $_POST["idy"];
} else {
  $year = date('Y');
}

if ($year != $yearNow) {
$query_d1 = $DBcon->prepare("SELECT * FROM table_type tt JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8  GROUP BY tt.type_id HAVING MAX(late) > 0"); 
$query_d1->execute();
$delay = $query_d1->rowCount();

$query_o1 = $DBcon->prepare("SELECT * FROM table_type tt JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8  GROUP BY tt.type_id HAVING MAX(late) = 0"); 
$query_o1->execute();
$ontime = $query_o1->rowCount();
}else{
$query_d1 = $DBcon->prepare("SELECT * FROM table_type tt JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8  GROUP BY tt.type_id HAVING MAX(late) > 0"); 
$query_d1->execute();
$delay = $query_d1->rowCount();

$query_o1 = $DBcon->prepare("SELECT * FROM table_type tt JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8  GROUP BY tt.type_id HAVING MAX(late) = 0"); 
$query_o1->execute();
$ontime = $query_o1->rowCount();
}

?>

<div class="col_2" style="height:141px; border:1px solid  #aaa;">
  <div id="graph-ontarget" style="height: 139px"></div>
</div>

<script type="text/javascript">

Highcharts.chart('graph-ontarget', {
    chart: {
      type: 'pie',
      margin: [25, 0, 0, 0]
    },
    title: {
      text: '<?php echo $year ?> On Target',
      style: {
        fontWeight: 'bold',
        fontSize: '13px'
      }  
    },
    plotOptions: {
      pie: {
        innerSize: '50%',
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          distance: -10,
          formatter: function() {
            return Math.round(this.percentage*100)/100 + ' %';
          },
        }
      }
    },
    series: [{
      name: 'Type',
      data: [
        {name:'OnTime', y: <?php echo $ontime ?>, color:'rgba(133,185,245,10)'},
        {name:'Delay',y: <?php echo $delay ?>, color:'rgba(180,180,180,10)'}]
    }],
    exporting: { enabled: false }
});

</script>
