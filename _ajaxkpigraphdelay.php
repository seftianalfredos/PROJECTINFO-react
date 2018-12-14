<?php
include 'config.php';


$yearNow = date('Y');

if (isset($_POST['year'])) {
    $year = $_POST['year'];
}else{
    $year = date('Y');
}


if ($year != $yearNow) {
    $query_d1 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 0");
    $query_d1->execute();
    $topdelay_a = $query_d1->rowCount();

    $query_d2 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 1 ");
    $query_d2->execute();
    $topdelay_b = $query_d2->rowCount();

    $query_d3 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 2 ");
    $query_d3->execute();
    $topdelay_c = $query_d3->rowCount();

    $query_d4 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 3 ");
    $query_d4->execute();
    $topdelay_d = $query_d4->rowCount();

    $query_d5 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 4 ");
    $query_d5->execute();
    $topdelay_e = $query_d5->rowCount();

    $query_d6 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) >= 5 ");
    $query_d6->execute();
    $topdelay_f = $query_d6->rowCount();
}else{
    $query_d1 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 0 ");
    $query_d1->execute();
    $topdelay_a = $query_d1->rowCount();

    $query_d2 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 1 ");
    $query_d2->execute();
    $topdelay_b = $query_d2->rowCount();

    $query_d3 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 2");
    $query_d3->execute();
    $topdelay_c = $query_d3->rowCount();

    $query_d4 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 3 ");
    $query_d4->execute();
    $topdelay_d = $query_d4->rowCount();

    $query_d5 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 4 ");
    $query_d5->execute();
    $topdelay_e = $query_d5->rowCount();

    $query_d6 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) >= 5 ");
    $query_d6->execute();
    $topdelay_f = $query_d6->rowCount();
}

?>

<div class="col_5" style="height:330px; border:1px solid  #aaa;">
    <div id="graph-topdelay" style="height: 325px"></div>
</div>


<script>

    Highcharts.chart('graph-topdelay', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'TOP DELAY'
        },
        xAxis: {
            categories: [
            'OnTime',
            '1 Month',
            '2 Month',
            '3 Month',
            '4 Month',
            '>5 Month'
            ],
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
            data: [
            {y: <?php echo $topdelay_a ?>, color:'rgba(0,176,80,10)'},
            {y: <?php echo $topdelay_b ?>, color:'rgba(195,214,155,10)'},
            {y: <?php echo $topdelay_c ?>, color:'rgba(195,214,155,10)'},
            {y: <?php echo $topdelay_d ?>, color:'rgba(252,213,181,10)'},
            {y: <?php echo $topdelay_e ?>, color:'rgba(250,192,144,10)'},
            {y: <?php echo $topdelay_f ?>, color:'rgba(228,108,10,10)'}]

        }]
    });
</script>