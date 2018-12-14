<?php
include 'config.php';

$detail_dept = array();
$detail_deptNum = array();

$yearNow = date('Y');

if (isset($_POST['year'])) {
    $year = $_POST['year'];
}else{
    $year = date('Y');
}


if ($year != $yearNow) {
    $sql1 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, COUNT(tt.type_id) AS Result
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id WHERE late != 0
        AND YEAR(TypeStartDate) = '$year'
        GROUP BY td.DepartementID
        ORDER BY result DESC");
    $sql1->execute();
    while ($row = $sql1->fetch(PDO::FETCH_ASSOC)) {
        $detail_dept[] = $row['Departement_name'];
        $detail_deptNum[] = $row['Result'];
    }
}else{
    $sql1 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, COUNT(tt.type_id) AS Result
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id WHERE late != 0
        AND YEAR(TypeStartDate) = '$yearNow'
        GROUP BY td.DepartementID
        ORDER BY result DESC");
    $sql1->execute();
    while ($row = $sql1->fetch(PDO::FETCH_ASSOC)) {
        $detail_dept[] = $row['Departement_name'];
        $detail_deptNum[] = $row['Result'];
    }
}

?>

<div class="col_5" style="height:330px; border:1px solid  #aaa;">
    <div id="graph-reason" style="height: 325px"></div>
</div>


<script>

    var detail_dept2 = new Array();

    <?php foreach ($detail_dept as $key => $val) { ?>
        detail_dept2.push('<?php echo $val ?>');
    <?php } ?>    

    Highcharts.chart('graph-reason', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'REASON'
        },
        xAxis: {
            categories: detail_dept2,
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
            data: [<?php echo join($detail_deptNum, ',') ?>]
        }]
    });
</script>