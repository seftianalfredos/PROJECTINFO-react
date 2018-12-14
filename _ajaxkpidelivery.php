<?php
include 'config.php';

$yearNow = date('Y');

if(isset($_POST["idy"])) {
    $year = $_POST["idy"];
} else {
    $year = date('Y');
}

$month = date('m');
$date = date('d');


// KALO TAHUN YANG DIPILIH BUKAN TAHUN SEKARANG 
if($year != $yearNow){
    /*#####################################   DELAY  #####################################################################*/
    $query_d1 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 0 ");
    $query_d1->execute();
    $delay_a = $query_d1->rowCount();

    $query_d2 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 1 ");
    $query_d2->execute();
    $delay_b = $query_d2->rowCount();

    $query_d3 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 2 ");
    $query_d3->execute();
    $delay_c = $query_d3->rowCount();

    $query_d4 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 3 ");
    $query_d4->execute();
    $delay_d = $query_d4->rowCount();

    $query_d5 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 4 ");
    $query_d5->execute();
    $delay_e = $query_d5->rowCount();

    $query_d6 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$year' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) >= 5 ");
    $query_d6->execute();
    $delay_f = $query_d6->rowCount();

    /*##################################################################################################################*/



    /*############################################    GROUP DESIGN    #################################################*/

    $query_g1 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9)  
        AND grp_id = 1");
    $query_g1->execute();
    $grpdes_a = $query_g1->rowCount();

    $query_g2 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9)  
        AND grp_id = 2");
    $query_g2->execute();
    $grpdes_b = $query_g2->rowCount();

    $query_g3 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9)  
        AND grp_id IN (6,7)");
    $query_g3->execute();
    $grpdes_c = $query_g3->rowCount();

    $query_g4 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9)  
        AND grp_id = 3");
    $query_g4->execute();
    $grpdes_d = $query_g4->rowCount();

    $query_g5 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9)  
        AND grp_id = 4");
    $query_g5->execute();
    $grpdes_e = $query_g5->rowCount();

    /*##################################################################################################################*/


    /*##################################################   REASON   #####################################################*/


    $query_r1 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9) AND td.DepartementID = 2 ");
    $query_r1->execute();
    $topfive_a = $query_r1->rowCount();

    $query_r2 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9) AND td.DepartementID = 4 ");
    $query_r2->execute();
    $topfive_b = $query_r2->rowCount();

    $query_r3 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9) AND td.DepartementID = 3 ");
    $query_r3->execute();
    $topfive_c = $query_r3->rowCount();

    $query_r4 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9) AND td.DepartementID = 5 ");
    $query_r4->execute();
    $topfive_d = $query_r4->rowCount();

    $query_r5 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND tt.sta_id IN (8,9) AND td.DepartementID = 7 ");
    $query_r5->execute();
    $topfive_e = $query_r5->rowCount();


    /*################################################    PRODUCT    ###################################################*/

    $query_p1 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND sta_id IN (8,9)  AND prd_id = 1");
    $query_p1->execute();
    $prd_a = $query_p1->rowCount();

    $query_p2 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND sta_id IN (8,9)  AND prd_id = 2");
    $query_p2->execute();
    $prd_b = $query_p2->rowCount();

    $query_p3 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND sta_id IN (8,9)  AND prd_id = 3");
    $query_p3->execute();
    $prd_c = $query_p3->rowCount();

    $query_p4 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND sta_id IN (8,9)  AND prd_id = 6");
    $query_p4->execute();
    $prd_d = $query_p4->rowCount();

    $query_p5 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$year' AND sta_id IN (8,9)  AND prd_id = 4");
    $query_p5->execute();
    $prd_e = $query_p5->rowCount();

    /*####################################################################################################################*/
}else{
    /*#####################################   DELAY  #####################################################################*/

    $query_d1 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 0 ");
    $query_d1->execute();
    $delay_a = $query_d1->rowCount();

    $query_d2 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 1 ");
    $query_d2->execute();
    $delay_b = $query_d2->rowCount();

    $query_d3 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 2 ");
    $query_d3->execute();
    $delay_c = $query_d3->rowCount();

    $query_d4 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 3 ");
    $query_d4->execute();
    $delay_d = $query_d4->rowCount();

    $query_d5 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) = 4 ");
    $query_d5->execute();
    $delay_e = $query_d5->rowCount();

    $query_d6 = $DBcon->prepare("SELECT * FROM table_type tt
    JOIN table_revisitype trt ON tt.type_id = trt.type_id
    WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id = 8 
    GROUP BY tt.type_id HAVING MAX(late) >= 5 ");
    $query_d6->execute();
    $delay_f = $query_d6->rowCount();

    /*##################################################################################################################*/



    /*############################################    GROUP DESIGN    #################################################*/

    $query_g1 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9) 
        AND grp_id = 1");
    $query_g1->execute();
    $grpdes_a = $query_g1->rowCount();

    $query_g2 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9)  
        AND grp_id = 2");
    $query_g2->execute();
    $grpdes_b = $query_g2->rowCount();

    $query_g3 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9)  
        AND grp_id IN (6,7)");
    $query_g3->execute();
    $grpdes_c = $query_g3->rowCount();

    $query_g4 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9)  
        AND grp_id = 3");
    $query_g4->execute();
    $grpdes_d = $query_g4->rowCount();

    $query_g5 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        JOIN table_project tp ON tt.prj_id = tp.prj_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9)  
        AND grp_id = 4");
    $query_g5->execute();
    $grpdes_e = $query_g5->rowCount();

    /*##################################################################################################################*/

    /*##################################################   REASON   #####################################################*/


    $query_r1 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9) AND td.DepartementID = 2 ");
    $query_r1->execute();
    $topfive_a = $query_r1->rowCount();

    $query_r2 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9) AND td.DepartementID = 4 ");
    $query_r2->execute();
    $topfive_b = $query_r2->rowCount();

    $query_r3 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9) AND td.DepartementID = 3 ");
    $query_r3->execute();
    $topfive_c = $query_r3->rowCount();

    $query_r4 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9) AND td.DepartementID = 5 ");
    $query_r4->execute();
    $topfive_d = $query_r4->rowCount();

    $query_r5 = $DBcon->prepare("SELECT td.DepartementID AS DepartementID, td.name AS Departement_name, tt.type_id AS type_id
        FROM table_revisitype trt
        LEFT JOIN table_department td ON trt.DepartementID = td.DepartementID
        LEFT JOIN table_type tt ON trt.type_id = tt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND tt.sta_id IN (8,9) AND td.DepartementID = 7 ");
    $query_r5->execute();
    $topfive_e = $query_r5->rowCount();


    /*################################################    PRODUCT    ##################################################*/

    $query_p1 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id IN (8,9)  AND prd_id = 1");
    $query_p1->execute();
    $prd_a = $query_p1->rowCount();

    $query_p2 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id IN (8,9)  AND prd_id = 2");
    $query_p2->execute();
    $prd_b = $query_p2->rowCount();

    $query_p3 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id IN (8,9)  AND prd_id = 3");
    $query_p3->execute();
    $prd_c = $query_p3->rowCount();

    $query_p4 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id IN (8,9)  AND prd_id = 6");
    $query_p4->execute();
    $prd_d = $query_p4->rowCount();

    $query_p5 = $DBcon->prepare("SELECT *FROM table_type tt
        JOIN table_revisitype trt ON tt.type_id = trt.type_id
        WHERE YEAR(TypeStartDate) = '$yearNow' AND sta_id IN (8,9)  AND prd_id = 4");
    $query_p5->execute();
    $prd_e = $query_p5->rowCount();

    /*##################################################################################################################*/
}

?>
<div class="col_12 center title">KPI <?php echo $year ?></div>
<div class="col_12" style="border:1px solid  #aaa;">
    <table border="0">
        <tr>
            <td>&nbsp;&nbsp;<i class="fa fa-check"></i> <span class="title4">Progess</span></td>
        </tr>
        <tr>
            <td>
                <div class="col_12" style="border:1px solid  #aaa;">
                    <div id="graph-progress" style="width:1135px; height: 120px"></div>
                </div>
            </td>
        </tr>

        <tr>
            <td></td>
        </tr>

        <tr>
            <td>&nbsp;&nbsp;<i class="fa fa-check"></i> <span class="title4">Statistic</span></td>
        </tr>

        <tr>
            <td></td>
        </tr>

        <tr>
            <td>
                <div class="col_6 " style=" border:1px solid  #aaa;">
                    <div id="graph-delay" style="width:550px; height: 300px"></div>
                </div>

                <div class="col_6 center" style="border:1px solid  #aaa;">
                    <div id="graph-gdesign" style="width:550px; height: 300px"></div>
                </div>

                <div class="col_12" style="padding:3px"></div>

                <div class="col_6 center" style="border:1px solid  #aaa;">
                    <div id="graph-topfive" style="width:550px; height: 300px"></div>
                </div>
                <div class="col_6 center" style="border:1px solid  #aaa;">
                    <div id="graph-product" style="width:550px; height: 300px"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

<script type="text/javascript">


    Highcharts.chart('graph-progress', {
        chart: { type: 'bar', inverted: true },
        xAxis: { categories: [''] },
        title:{ text:'' },
        subtitle:{ text:'' },
        pointInterval: 24 * 60 * 60,
        colors: ['#649b4b'],
        tooltip: { enabled: false },
        yAxis      : { 
            min:Date.UTC(<?php echo $year ?>, 0, 1),
            max:Date.UTC(<?php echo $year ?>, 11,31),
            allowDecimals: false,
            type   : 'datetime',
            title  : { text: '' }
        },
        exporting: { enabled: false },

        series: [{
            name: 'Progres date',
            <?php
            if ($year < date('Y')){
                ?> data:  [Date.UTC(<?php echo $year ?>, 12, 1)],
            <?php } else {
                ?> data:  [Date.UTC(<?php echo $year ?>, <?php echo $month-1 ?>, <?php echo $date ?>)],
            <?php }
            ?>
            showInLegend: false,

        }]
    });





    Highcharts.chart('graph-delay', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'DELAY'
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
                text: 'Total Project  in  <?php echo $year ?>'
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
            {y: <?php echo $delay_a ?>, color:'rgba(0,176,80,10)'},
            {y: <?php echo $delay_b ?>, color:'rgba(195,214,155,10)'},
            {y: <?php echo $delay_c ?>, color:'rgba(195,214,155,10)'},
            {y: <?php echo $delay_d ?>, color:'rgba(252,213,181,10)'},
            {y: <?php echo $delay_e ?>, color:'rgba(250,192,144,10)'},
            {y: <?php echo $delay_f ?>, color:'rgba(228,108,10,10)'}]

        }]
    });







    Highcharts.chart('graph-gdesign', {
        chart: {
            type: 'pie',
            margin: [35, 10, 15, 10]
        },
        title: {
            text: 'GROUP DESIGN'
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    distance: 0,
                    enabled: true,
                    formatter: function() {
                        return this.point.name +': '+ this.point.y ;
                    },
                }
            }
        },
        series: [{
            name: 'Project',
            showInLegend: false,
            data: [
            ['DOM-New', <?php echo $grpdes_a ?>],
            ['DOM-Der', <?php echo $grpdes_b ?>],
            ['OEM', <?php echo $grpdes_c ?>],
            ['EXP-New', <?php echo $grpdes_d ?>],
            ['EXP-Der', <?php echo $grpdes_e ?>]
            ],
            colors: ['rgba(146,208,80,10)','rgba(0,176,80,10)','rgba(137,137,137,10)','rgba(0,112,192,10)','rgba(0,176,240,10)']
        }],
        exporting: { enabled: false }
    });







    Highcharts.chart('graph-topfive', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'TOP 5 REASON'
        },

        xAxis: {
            categories: [
            'Marketing',
            'Produksi',
            'RnD',
            'Supplier',
            'Pihak ke 3'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
            },
            labels: {
                overflow: 'justify'
            }
        },

        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        exporting: { enabled: false },
        series: [{
            showInLegend: false,
            data: [
            <?php echo $topfive_a ?>,
            <?php echo $topfive_b ?>,
            <?php echo $topfive_c ?>,
            <?php echo $topfive_d ?>,
            <?php echo $topfive_e ?>
            ],
//data: [<?php echo $topfive_a ?>]
}],
colors: ['rgba(192,0,0,10)'],
});





    Highcharts.chart('graph-product', {
        chart: {
            type: 'pie',
            margin: [35, 10, 15, 10]
        },
        title: {
            text: 'PRODUCT'
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    distance: 0,
                    formatter: function() {
                        return this.point.name +': '+Math.round(this.percentage*100)/100 + ' %';
                    },
                }
            }
        },
        series: [{
            name: 'Project',
            showInLegend: false,
            data: [
            ['Refrigerator', <?php echo $prd_a ?>],
            ['Air Conditioner', <?php echo $prd_b ?>],
            ['Show Case', <?php echo $prd_c ?>],
            ['Water Dispanser', <?php echo $prd_d ?>],
            ['Washing Machine', <?php echo $prd_e ?>]
            ],
            colors: ['rgba(247,150,70,10)','rgba(75,172,198,10)','rgba(128,100,162,10)','rgba(182,87,8,10)','rgba(39,106,124,10)']
        }],
        exporting: { enabled: false }
    });

</script>