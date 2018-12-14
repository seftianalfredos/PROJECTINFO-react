<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");

if (isset($_GET['idType'])) {
  $vId = $_GET['idType'];
}

// echo $vId;


if ($vId != '') {
  $type_id              = '';
  $typeSupply           = '';
  $ChasisName           = '';
  $modelFamily          = '';
  $finishing_name       = '';
  $handle_name          = '';
  $typePhoto            = '';
  $mechVolNet           = '';
  $mechVolGros          = '';
  $mechWeightNet        = '';
  $mechWeightGros       = '';
  $mechProdW            = '';
  $mechProdL            = '';
  $mechProdH            = '';
  $mechPackW            = '';
  $mechPackL            = '';
  $mechPackH            = '';
  $refrigerant_name     = '';
  $cycMoR               = '';
  $cycCompressor        = '';
  $rollbond_name        = '';
  $condensor_name       = '';
  $temperature_name     = '';
  $cycFreezingTemp      = '';
  $rv_name              = '';
  $elecRF               = '';
  $elecRC               = '';
  $elecRP               = '';
  $elecMaxLamp          = '';
  $climate_name         = '';
  $cycEnergyConsumption = '';
  $aIceTwistTray        = '';
  $aIceBank             = '';
  $aIceTray             = '';
  $aFrezzerPocket       = '';
  $aChiller             = '';
  $aShelf               = '';
  $aSheildedMoist       = '';
  $aCrisper             = '';
  $dEggPocket           = '';
  $dEggHolder           = '';
  $dUtilityPocket       = '';
  $dBottlePocket        = '';
  $mechContainer        = '';
  $featurespec_id       = '';

  include 'config.php';

  $query  = $DBcon->prepare("SELECT 
    tt.type_id AS type_id, 
    tt.typeSupply AS typeSupply, 
    tch.ChasisName AS ChasisName, 
    tt.modelFamily AS modelFamily, 
    tfi.name AS finishing_name, 
    th.name AS handle_name, 
    tt.typePhoto AS typePhoto, 
    ts.mechVolGros AS mechVolGros, 
    ts.mechVolNet AS mechVolNet, 
    ts.mechWeightGros AS mechWeightGros, 
    ts.mechWeightNet AS mechWeightNet, 
    ts.mechProdW AS mechProdW, 
    ts.mechProdL AS mechProdL, 
    ts.mechProdH AS mechProdH, 
    ts.mechPackW AS mechPackW, 
    ts.mechPackL AS mechPackL, 
    ts.mechPackH AS mechPackH, 
    tr.name AS refrigerant_name, 
    ts.cycMoR AS cycMoR, 
    ts.cycCompressor AS cycCompressor, 
    tro.name AS rollbond_name, 
    tc.name AS condensor_name, 
    tte.name AS temperature_name, 
    ts.cycFreezingTemp AS cycFreezingTemp, 
    trv.name AS rv_name, 
    ts.elecRF AS elecRF, 
    ts.elecRC AS elecRC, 
    ts.elecRP AS elecRP, 
    ts.elecMaxLamp AS elecMaxLamp, 
    tcl.name AS climate_name, 
    ts.cycEnergyConsumption AS cycEnergyConsumption, 
    ts.aIceTwistTray AS aIceTwistTray, 
    ts.aIceBank AS aIceBank, 
    ts.aIceTray AS aIceTray, 
    ts.aFrezzerPocket AS aFrezzerPocket, 
    ts.aChiller AS aChiller, 
    ts.aShelf AS aShelf, 
    ts.aSheildedMoist AS aSheildedMoist, 
    ts.aCrisper AS aCrisper, 
    ts.dEggPocket AS dEggPocket, 
    ts.dEggHolder AS dEggHolder, 
    ts.dUtilityPocket AS dUtilityPocket, 
    ts.dBottlePocket AS dBottlePocket, 
    ts.mechContainer AS mechContainer
    FROM table_type tt 
    LEFT JOIN table_specrf ts ON tt.type_id = ts.type_id
    LEFT JOIN table_featurespec tfs ON tt.type_id = tfs.type_id
    LEFT JOIN table_chasis tch ON tt.cha_id = tch.cha_id
    LEFT JOIN table_finishing tfi ON ts.finishing_id = tfi.finishing_id
    LEFT JOIN table_handle th ON ts.handle_id = th.handle_id
    LEFT JOIN table_refrigerant tr ON ts.refrigerant_id = tr.refrigerant_id
    LEFT JOIN table_rollbond tro ON ts.rollbond_id = tro.rollbond_id
    LEFT JOIN table_condensor tc ON ts.condensor_id  = tc.condensor_id
    LEFT JOIN table_temperature tte ON ts.temperature_id = tte.temperature_id
    LEFT JOIN table_climate tcl ON ts.climate_id = tcl.climate_id
    LEFT JOIN table_rv trv ON ts.rv_id = trv.rv_id
    WHERE tt.type_id = :type_id    
    GROUP BY tt.type_id");

  $query->bindParam(':type_id', $vId);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $typeSupply           = $row['typeSupply'];
    $ChasisName           = $row['ChasisName'];
    $modelFamily          = $row['modelFamily'];
    $finishing_name       = $row['finishing_name'];
    $handle_name          = $row['handle_name'];
    $typePhoto            = $row['typePhoto'];
    $mechVolNet           = $row['mechVolNet'];
    $mechVolGros          = $row['mechVolGros'];
    $mechWeightNet        = $row['mechWeightNet'];
    $mechWeightGros       = $row['mechWeightGros'];
    $mechProdW            = $row['mechProdW'];
    $mechProdL            = $row['mechProdL'];
    $mechProdH            = $row['mechProdH'];
    $mechPackW            = $row['mechPackW'];
    $mechPackL            = $row['mechPackL'];
    $mechPackH            = $row['mechPackH'];
    $refrigerant_name     = $row['refrigerant_name'];
    $cycMoR               = $row['cycMoR'];
    $cycCompressor        = $row['cycCompressor'];
    $rollbond_name        = $row['rollbond_name'];
    $condensor_name       = $row['condensor_name'];
    $temperature_name     = $row['temperature_name'];
    $cycFreezingTemp      = $row['cycFreezingTemp'];
    $rv_name              = $row['rv_name'];
    $elecRF               = $row['elecRF'];
    $elecRC               = $row['elecRC'];
    $elecRP               = $row['elecRP'];
    $elecMaxLamp          = $row['elecMaxLamp'];
    $climate_name         = $row['climate_name'];
    $cycEnergyConsumption = $row['cycEnergyConsumption'];
    $aIceTwistTray        = $row['aIceTwistTray'];
    $aIceBank             = $row['aIceBank'];
    $aIceTray             = $row['aIceTray'];
    $aFrezzerPocket       = $row['aFrezzerPocket'];
    $aChiller             = $row['aChiller'];
    $aShelf               = $row['aShelf'];
    $aSheildedMoist       = $row['aSheildedMoist'];
    $aCrisper             = $row['aCrisper'];
    $dEggPocket           = $row['dEggPocket'];
    $dEggHolder           = $row['dEggHolder'];
    $dUtilityPocket       = $row['dUtilityPocket'];
    $dBottlePocket        = $row['dBottlePocket'];
    $mechContainer        = $row['mechContainer'];
  }
}

?>
<!--###############################################################################################  HTML  ###############################################################################################-->

<html>
<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Information System 2018 - Add New Project</title>

  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
  <link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">

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

  .area1{border:0px solid  #f00; width: 410px; padding:0px;}
  .area2{border:0px solid  #f00; width: 120px; }
  .area3{border:0px solid  #f00; width: 260px; }
  .area4{border:0px solid  #f00; width: 60px; }

  .subtitle{border:1px solid  #eee; background: #eee; width: 400px; padding:4px;margin-top: 0em; margin-bottom: 0em; }
  .content{border:1px solid  #eee; width: 400px; padding:4px;margin-top: 0em; margin-bottom: 0em; }


</style>

</head>
<body>
  <center/>

  <table border="0" cellpadding="0" cellspacing="0" width="1800" height="200" bordercolor="#FF0000" bgcolor="#FFFFFF" style="border-collapse: collapse">

    <tr>
      <td width="1800" height="200" valign="top" >

        <?php
        include_once ("psi_menu.php");
        ?>

        <ul class="tabs left">
          <li class="current"><a>Line Up</a></li>
          <li><a>Queue</a></li>
          <li><a>Note</a></li>
          <li><a>Reschedule</a></li>
          <li><a>Scedule</a></li>
          <li><a>Monitor</a></li>
        </ul>

        <div id="tab_lineup" class="tab-content">
          <ul class="tabs left">
            <li><a href="#tab_viewspec"><i>Product Specification</i></a></li>
          </ul>
          <div id="tab_viewspec" class="tab-content">
            <table class="psi_width7" border="0" align="left">
              <tr>
                <td class="center" width ="25" title="Back" id="backicon">   <i class="fa fa-chevron-left fa-sm"></i></td>
                <td class="center" width ="50" title="Print Spec" id="printspec">    <i class="fa fa-print fa-lg"></i></td>
                <td class="right" width ="1000">&nbsp;</td>
              </tr>          
            </table>
            <table>
              <tr>
                <td class="left">
                  <div class="col_6 area1">         
                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;General</div>
                    <div class="col_12 content">
                      <div class="col_4">Type</div><div class="col_8"><?php echo $typeSupply; ?></div>
                      <div class="col_4">Chassis</div><div class="col_8"><?php echo $ChasisName; ?></div>
                      <div class="col_4">Model</div><div class="col_8"><?php echo $modelFamily; ?>test</div>
                      <div class="col_4">Generation</div><div class="col_8">1st Generation</div>
                      <div class="col_4">Door Type</div><div class="col_8"><?php echo $finishing_name; ?></div>
                      <div class="col_4">Handle</div><div class="col_8"><?php echo $handle_name; ?></div>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Photo</div>
                    <div class="col_12 content">
                      <div class="col_12"><img src="_upload/typePhoto/<?php echo $typePhoto; ?>" width="350px"></img></div>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Dimension</div>
                    <div class="col_12 content">
                      <div class="col_4">Volume [Gross]</div><div class="col_3"><?php echo $mechVolGros; ?></div><div class="col_5">mm</div>
                      <div class="col_4">Volume [Nett]</div><div class="col_3"><?php echo $mechVolNet; ?></div><div class="col_5">mm</div>
                      <div class="col_4">Weight [Gross]</div><div class="col_3"><?php echo $mechWeightGros; ?></div><div class="col_5">Kg</div>
                      <div class="col_4">Weight [Nett]</div><div class="col_3"><?php echo $mechWeightNet; ?></div><div class="col_5">Kg</div>
                      <div class="col_4">Dimension Product</div><div class="col_4"><?php echo $mechProdW."x".$mechProdL."x".$mechProdH; ?></div><div class="col_4">mm (WxDxH)</div>
                      <div class="col_4">Dimension Packing</div><div class="col_4"><?php echo $mechPackW."x".$mechPackL."x".$mechPackH; ?></div><div class="col_4">mm (WxDxH)</div>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Cooling System</div>
                    <div class="col_12 content">
                      <div class="col_4">Refrigerant</div><div class="col_8"><?php echo $handle_name; ?></div>
                      <div class="col_4">Mass</div><div class="col_2"><?php echo $cycMoR; ?></div><div class="col_6">gr</div>
                      <div class="col_4">Compressor</div><div class="col_8"><?php echo $cycCompressor; ?></div>
                      <div class="col_4">Evaporator Type</div><div class="col_8"><?php echo $rollbond_name; ?></div>
                      <div class="col_4">Condenser Type</div><div class="col_8"><?php echo $condensor_name; ?></div>
                      <div class="col_4">Temp Control</div><div class="col_8"><?php echo $temperature_name; ?></div>
                      <div class="col_4">Freezing Temp</div><div class="col_2"><?php echo $cycFreezingTemp; ?></div><div class="col_6">&deg;C</div>
                    </div>
                  </div>


                  <div class="col_6 area1">
                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Technical</div>
                    <div class="col_12 content">
                      <div class="col_4">Rated Voltage</div><div class="col_3"><?php echo $rv_name; ?></div><div class="col_3">V</div>
                      <div class="col_4">Rated Frequency</div><div class="col_3"><?php echo $elecRF; ?></div><div class="col_3">Hz</div>
                      <div class="col_4">Rated Current</div><div class="col_3"><?php echo $elecRC; ?></div><div class="col_3">A</div>
                      <div class="col_4">Rated Power</div><div class="col_3"><?php echo $elecRP; ?></div><div class="col_3">W</div>
                      <div class="col_4">Rated Max Lamp</div><div class="col_3"><?php echo $elecMaxLamp; ?></div><div class="col_3">W</div>
                      <div class="col_4">Protection Class</div><div class="col_7">Class 1</div><div class="col_1">&nbsp;</div>
                      <div class="col_4">Climate class</div><div class="col_3"><?php echo $climate_name; ?></div><div class="col_3">&nbsp;</div>
                      <div class="col_4">Energy Cons.</div><div class="col_3"><?php echo $cycEnergyConsumption; ?>&nbsp;</div><div class="col_3">&nbsp;</div>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Accessories</div>
                    <div class="col_12 content">
                      <div class="col_6">Ice Twist Tray</div><div class="col_4"><?php echo $aIceTwistTray; ?></div>
                      <div class="col_6">Ice Bank</div><div class="col_4"><?php echo $aIceBank; ?></div>
                      <div class="col_6">Ice Tray</div><div class="col_4"><?php echo $aIceTray; ?></div>
                      <div class="col_6">Freezer pocket</div><div class="col_4"><?php echo $aFrezzerPocket; ?></div>
                      <div class="col_6">Chiller</div><div class="col_4"><?php echo $aChiller; ?></div>
                      <div class="col_6">Shelf</div><div class="col_4"><?php echo $aShelf; ?></div>
                      <div class="col_6">Sheilded Moisture Comp.</div><div class="col_4"><?php echo $aSheildedMoist; ?></div>
                      <div class="col_6">Crisper</div><div class="col_4"><?php echo $aCrisper; ?></div>
                      <div class="col_6">Egg Pocket</div><div class="col_4"><?php echo $dEggPocket; ?></div>
                      <div class="col_6">Egg Holder</div><div class="col_4"><?php echo $dEggHolder; ?></div>
                      <div class="col_6">Utility Pocket</div><div class="col_4"><?php echo $dUtilityPocket; ?></div>
                      <div class="col_6">Bottle Pocket</div><div class="col_4"><?php echo $dBottlePocket; ?></div>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Load Capacity</div>
                    <div class="col_12 content">
                      <div class="col_6">40HQ</div><div class="col_4"><?php echo $mechContainer; ?></div>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_12 subtitle"><i class="fa fa-caret-right fa-lg"></i>&nbsp;Features</div>
                    <div class="col_12 content">
                      <?php
                      include 'config.php';

                      $query2 = $DBcon->prepare("SELECT *FROM table_featurespec tfs JOIN table_feature tf ON tfs.fea_id = tf.fea_id WHERE type_id = :type_id");
                      $query2->bindParam(':type_id', $vId);
                      $query2->execute();
                      while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col_1"><i class="fa fa-check fa-sm"></i></div><div class="col_11"><?php echo $row['FeatureName']; ?></div>
                        <?php 
                      } 
                      ?>
                    </div>

                    <div class="col_12">&nbsp;</div>

                  </div>
                </td>
              </tr>
            </table>
          </div>
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
</td>
</tr>
</table>



<script>

  $('#backicon').on('click', function(e){
    window.location.href = "psi_project.php#tab_lineup_type";
  });
</script>
<script src="_jscript/js/stickmenu.js"></script>
</body>
</html>
