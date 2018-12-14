<?php
session_start();
$currentmenu = "3";
if(!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");
  exit();

}else{

?>

<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project Information System 2018 - KPI</title>


<script src="_jscript/js/jquery.min.js"></script>
<script src="_jscript/js/kickstart.js"></script>
<script src="_jscript/js/jquery-ui.js"></script>
<script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
<script src="_datatables/datatable/js/dataTables.select.js"></script>

<link rel="stylesheet" type="text/css" href="_datatables/datatable/css/select.dataTables.css">
<link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.css">
<link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
<link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
<link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />

<script src="_jscript/Highcharts-6.2.0/highcharts.js"></script>
<script src="_jscript/Highcharts-6.2.0/modules/exporting.js"></script>
<script src="_jscript/Highcharts-6.2.0/modules/series-label.js"></script>
<script src="_jscript/Highcharts-6.2.0/modules/export-data.js"></script>

<style type="text/css">
body {
  margin-top: 0px;
  margin-bottom: 10px;
  margin-left: 10px;
  margin-right: 10px;
  background-color:#fff; 
  align: center;
}
td {
  font-size:13px;
  font-family:"Segoe UI";
  color:000;
  padding: 3;

}

th {
  font-size: 11px;
  background-color: #CECEF6;
  font-style: italic;
  border: 1px solid #aaa;
  border-radius: 0px;
  font-family:"Segoe UI";
  text-align: center;
}

th.kpidelay {
  border: 1px solid #fff;
  border-radius: 5px;
}

table.display tbody td {
  cursor: pointer;
}


.title {
  text-align: center;
  }

.idyear {
  cursor: pointer;
}



</style>

</head>



  <body>
    <center/>
    <table border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td class="psi_width7" width="1800" height="200" valign="top">
          <?php
          include_once 'psi_menu.php'; 
          ?>
          <ul class="tabs left">
            <li id="tab1"><a href="#TabDelivery">Delivery</a></li>
            <li id="tab2"><a href="#TabQuality">Quality</a></li>
            <li id="tab3"><a href="#TabCost">Cost</a></li>
          </ul>

          <div id="TabDelivery" class="tab-content">
            <ul class="tabs left">
              <li class="current"><a href="#tabdatagrp">Summary</a></li>
              <li ><a href="#tabdetail">Detail</a></li>
            </ul>
            <div id="tabdatagrp" class="tab-content">
            <?php
              include "psi_kpidelivery.php";
            ?>            
            </div>
            <div id="tabdetail" class="tab-content">
            <?php
              include "psi_kpidelivdetail.php";
            ?>            
            </div>
          </div>


          <div id="TabQuality" class="tab-content">
          <?php
            // include "psi_kpiquality.php";
          ?>            
          </div>

          <div id="TabCost" class="tab-content">
          <?php
            // include "psi_kpicost.php";
          ?>        
          </div>

        </td>
      </tr>
      <tr>
        <td width="100%" height="36" class="left">R&D - Project Information System 2018</td>
      </tr>
      <tr>
        <td width="100%" height="100" class="left"></td>
      </tr>
    </table>
</body>
</html>
<?php 
}
?>