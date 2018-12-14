<?php 
include 'config.php';

$spec_id              = '';
$type_id              = '';
$color_id             = '';
$color_name           = '';
$pattern_id           = '';
$pattern_name         = '';
$finishing_id         = '';
$finishing_name       = '';
$dLinerMaterial       = '';
$dInteriorMateri      = '';
$dStamping            = '';
$dEggPocket           = '';
$dEggHolder           = '';
$dUtilityPocket       = '';
$dBottlePocket        = '';
$cColor               = '';
$cSidePanelMat        = '';
$aHandle              = '';
$handle_id            = '';
$handle_name          = '';
$aBaseboard           = '';
$aWaterdispenser      = '';
$rack_id              = '';
$rack_name            = '';
$aIceTwistTray        = '';
$aIceBank             = '';
$aIceTray             = '';
$aFrezzerPocket       = '';
$aLamp                = '';
$aChiller             = '';
$aShelf               = '';
$aSheildedMoist       = '';
$aCrisper             = '';
$ArtSpecDesign        = '';
$dimension_id         = '';
$dimension_name       = '';
$mechProdW            = '';
$mechProdL            = '';
$mechProdH            = '';
$mechPackW            = '';
$mechPackL            = '';
$mechPackH            = '';
$packing_id           = '';
$packing_name         = '';
$mechVolNet           = '';
$mechVolGros          = '';
$mechWeightNet        = '';
$mechWeightGros       = '';
$mechContainer        = '';
$MechSpecDesign       = '';
$rollbond_id          = '';
$rollbond_name        = '';
$rollbondtype_id      = '';
$rollbondtype_name    = '';
$temperature_id       = '';
$temperature_name     = '';
$cycDripTray          = '';
$climate_id           = '';
$climate_name         = '';
$condensor_id         = '';
$condensor_name       = '';
$refrigerant_id       = '';
$refrigerant_name     = '';
$cycMoR               = '';
$cycRatedCurrent      = '';
$cycRatedPower        = '';
$cycCompressor        = '';
$cycCoolingCapacity   = '';
$cycCapillaryTube     = '';
$cycFreezingTemp      = '';
$cycEnergyConsumption = '';
$CycSpecDesign        = '';
$rv_id                = '';
$rv_name              = '';
$wv_id                = '';
$wv_name              = '';
$elecRF               = '';
$elecRC               = '';
$elecRP               = '';
$elecRPH              = '';
$elecMaxLamp          = '';
$ElecSpecDesign       = '';

$stmt = $DBcon->prepare("
  SELECT
  tsp.spec_id AS spec_id,
  tt.type_id AS type_id,
  tco.color_id AS color_id,
  tco.name AS color_name,
  tpa.pattern_id AS pattern_id,
  tpa.name AS pattern_name,
  tfi.finishing_id AS finishing_id,
  tfi.name AS finishing_name,
  tsp.dLinerMaterial AS dLinerMaterial,
  tsp.dInteriorMateri AS dInteriorMateri,
  tsp.dStamping AS dStamping,
  tsp.dEggPocket AS dEggPocket,
  tsp.dEggHolder AS dEggHolder,
  tsp.dUtilityPocket AS dUtilityPocket,
  tsp.dBottlePocket AS dBottlePocket,
  tsp.cColor AS cColor,
  tsp.cSidePanelMat AS cSidePanelMat,
  tsp.aHandle AS aHandle,
  tha.handle_id AS handle_id,
  tha.name AS handle_name,
  tsp.aBaseboard AS aBaseboard,
  tsp.aWaterdispenser AS aWaterdispenser,
  tra.rack_id AS rack_id,
  tra.name AS rack_name,
  tsp.aIceTwistTray AS aIceTwistTray,
  tsp.aIceBank AS aIceBank,
  tsp.aIceTray AS aIceTray,
  tsp.aFrezzerPocket AS aFrezzerPocket,
  tsp.aLamp AS aLamp,
  tsp.aChiller AS aChiller,
  tsp.aShelf AS aShelf,
  tsp.aSheildedMoist AS aSheildedMoist,
  tsp.aCrisper AS aCrisper,
  tsp.ArtSpecDesign AS ArtSpecDesign,
  tdi.dimension_id AS dimension_id,
  tdi.name AS dimension_name,
  tsp.mechProdW AS mechProdW,
  tsp.mechProdL AS mechProdL,
  tsp.mechProdH AS mechProdH,
  tsp.mechPackW AS mechPackW,
  tsp.mechPackL AS mechPackL,
  tsp.mechPackH AS mechPackH,
  tpc.packing_id AS packing_id,
  tpc.name AS packing_name,
  tsp.mechVolNet AS mechVolNet,
  tsp.mechVolGros AS mechVolGros,
  tsp.mechWeightNet AS mechWeightNet,
  tsp.mechWeightGros AS mechWeightGros,
  tsp.mechContainer AS mechContainer,
  tsp.MechSpecDesign AS MechSpecDesign,
  tro.rollbond_id AS rollbond_id,
  tro.name AS rollbond_name,
  trt.rollbondtype_id AS rollbondtype_id,
  trt.name AS rollbondtype_name,
  tte.temperature_id AS temperature_id,
  tte.name AS temperature_name,
  tsp.cycDripTray AS cycDripTray,
  tcl.climate_id AS climate_id,
  tcl.name AS climate_name,
  tcn.condensor_id AS condensor_id,
  tcn.name AS condensor_name,
  tre.refrigerant_id AS refrigerant_id,
  tre.name AS refrigerant_name,
  tsp.cycMoR AS cycMoR,
  tsp.cycRatedCurrent AS cycRatedCurrent,
  tsp.cycRatedPower AS cycRatedPower,
  tsp.cycCompressor AS cycCompressor,
  tsp.cycCoolingCapacity AS cycCoolingCapacity,
  tsp.cycCapillaryTube AS cycCapillaryTube,
  tsp.cycFreezingTemp AS cycFreezingTemp,
  tsp.cycEnergyConsumption AS cycEnergyConsumption,
  tsp.CycSpecDesign AS CycSpecDesign,
  trv.rv_id AS rv_id,
  trv.name AS rv_name,
  twv.wv_id AS wv_id,
  twv.name AS wv_name,
  tsp.elecRF AS elecRF,
  tsp.elecRC AS elecRC,
  tsp.elecRP AS elecRP,
  tsp.elecRPH AS elecRPH,
  tsp.elecMaxLamp AS elecMaxLamp,
  tsp.ElecSpecDesign AS ElecSpecDesign
  FROM table_specrf tsp 
  RIGHT JOIN table_type tt ON tsp.type_id = tt.type_id
  LEFT JOIN table_color tco ON tsp.color_id = tco.color_id
  LEFT JOIN table_pattern tpa ON tsp.pattern_id = tpa.pattern_id
  LEFT JOIN table_finishing tfi ON tsp.finishing_id = tfi.finishing_id
  LEFT JOIN table_handle tha ON tsp.handle_id = tha.handle_id
  LEFT JOIN table_rack tra ON tsp.rack_id = tra.rack_id
  LEFT JOIN table_dimension tdi ON tsp.dimension_id = tdi.dimension_id
  LEFT JOIN table_packing tpc ON tsp.packing_id = tpc.packing_id
  LEFT JOIN table_rollbond tro ON tsp.rollbond_id = tro.rollbond_id
  LEFT JOIN table_rollbondtype trt ON tsp.rollbondtype_id = trt.rollbondtype_id
  LEFT JOIN table_temperature tte ON tsp.temperature_id = tte.temperature_id
  LEFT JOIN table_climate tcl ON tsp.climate_id = tcl.climate_id
  LEFT JOIN table_condensor tcn ON tsp.condensor_id = tcn.condensor_id
  LEFT JOIN table_refrigerant tre ON tsp.refrigerant_id = tre.refrigerant_id
  LEFT JOIN table_rv trv ON tsp.rv_id = trv.rv_id
  LEFT JOIN table_wv twv ON tsp.wv_id = twv.wv_id
  WHERE tt.type_id = :type_id
  ");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $spec_id  = $row['spec_id'];
  $type_id  = $row['type_id'];
  $color_id = $row['color_id'];
  $color_name = $row['color_name'];
  $pattern_id = $row['pattern_id'];
  $pattern_name = $row['pattern_name'];
  $finishing_id = $row['finishing_id'];
  $finishing_name = $row['finishing_name'];
  $dLinerMaterial = $row['dLinerMaterial'];
  $dInteriorMateri  = $row['dInteriorMateri'];
  $dStamping  = $row['dStamping'];
  $dEggPocket = $row['dEggPocket'];
  $dEggHolder = $row['dEggHolder'];
  $dUtilityPocket = $row['dUtilityPocket'];
  $dBottlePocket  = $row['dBottlePocket'];
  $cColor = $row['cColor'];
  $cSidePanelMat  = $row['cSidePanelMat'];
  $aHandle  = $row['aHandle'];
  $handle_id  = $row['handle_id'];
  $handle_name  = $row['handle_name'];
  $aBaseboard = $row['aBaseboard'];
  $aWaterdispenser  = $row['aWaterdispenser'];
  $rack_id  = $row['rack_id'];
  $rack_name  = $row['rack_name'];
  $aIceTwistTray  = $row['aIceTwistTray'];
  $aIceBank = $row['aIceBank'];
  $aIceTray = $row['aIceTray'];
  $aFrezzerPocket = $row['aFrezzerPocket'];
  $aLamp  = $row['aLamp'];
  $aChiller = $row['aChiller'];
  $aShelf = $row['aShelf'];
  $aSheildedMoist = $row['aSheildedMoist'];
  $aCrisper = $row['aCrisper'];
  $ArtSpecDesign  = $row['ArtSpecDesign'];
  $dimension_id = $row['dimension_id'];
  $dimension_name = $row['dimension_name'];
  $mechProdW  = $row['mechProdW'];
  $mechProdL  = $row['mechProdL'];
  $mechProdH  = $row['mechProdH'];
  $mechPackW  = $row['mechPackW'];
  $mechPackL  = $row['mechPackL'];
  $mechPackH  = $row['mechPackH'];
  $packing_id = $row['packing_id'];
  $packing_name = $row['packing_name'];
  $mechVolNet = $row['mechVolNet'];
  $mechVolGros  = $row['mechVolGros'];
  $mechWeightNet  = $row['mechWeightNet'];
  $mechWeightGros = $row['mechWeightGros'];
  $mechContainer  = $row['mechContainer'];
  $MechSpecDesign = $row['MechSpecDesign'];
  $rollbond_id  = $row['rollbond_id'];
  $rollbond_name  = $row['rollbond_name'];
  $rollbondtype_id  = $row['rollbondtype_id'];
  $rollbondtype_name  = $row['rollbondtype_name'];
  $temperature_id = $row['temperature_id'];
  $temperature_name = $row['temperature_name'];
  $cycDripTray  = $row['cycDripTray'];
  $climate_id = $row['climate_id'];
  $climate_name = $row['climate_name'];
  $condensor_id = $row['condensor_id'];
  $condensor_name = $row['condensor_name'];
  $refrigerant_id = $row['refrigerant_id'];
  $refrigerant_name = $row['refrigerant_name'];
  $cycMoR = $row['cycMoR'];
  $cycRatedCurrent  = $row['cycRatedCurrent'];
  $cycRatedPower  = $row['cycRatedPower'];
  $cycCompressor  = $row['cycCompressor'];
  $cycCoolingCapacity = $row['cycCoolingCapacity'];
  $cycCapillaryTube = $row['cycCapillaryTube'];
  $cycFreezingTemp  = $row['cycFreezingTemp'];
  $cycEnergyConsumption = $row['cycEnergyConsumption'];
  $CycSpecDesign  = $row['CycSpecDesign'];
  $rv_id  = $row['rv_id'];
  $rv_name  = $row['rv_name'];
  $wv_id  = $row['wv_id'];
  $wv_name  = $row['wv_name'];
  $elecRF = $row['elecRF'];
  $elecRC = $row['elecRC'];
  $elecRP = $row['elecRP'];
  $elecRPH  = $row['elecRPH'];
  $elecMaxLamp  = $row['elecMaxLamp'];
  $ElecSpecDesign = $row['ElecSpecDesign'];
}

?>

<!--################################################################## SPEC ARTWORK ##################################################################-->

<div id="tab_spec_art" class="tab-content">
  <table class="psi_width7" border="0" align="left">
    <div class="col_6 area1">
      
      <div class="col_6">
        <ul class="button-bar" id="nav1">
          <li id="cancelback"><a><b><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</b></a></li>
          <li id="btnedit1"><a><b>&nbsp;&nbsp;<i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;</b></a></li>
        </ul>
      </div>
      <div class="col_6">
        <ul class="button-bar">
          <li title="Finish" id="btnfinish3a"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        </ul>
      </div>

      <div class="col_12">&nbsp;</div>
      <div class="col_12"><input class="input2" type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>

      <div class="col_12"><b>Door</b></div>
      <div class="col_6 area2">Color</div>
      <div class="col_6 area3">
        <select id="spec_color" name="spec_color" class="input1">
          <?php
          include 'config.php';
          $stmt = $DBcon->prepare("SELECT *FROM table_color ORDER BY name ASC ");
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['color_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_6 area2">Pattern</div>
      <div class="col_6 area3">
        <select id="spec_pattern" name="spec_pattern" class="input1">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_pattern ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['pattern_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>        
      <div class="col_6 area2">Door Finishing</div>
      <div class="col_6 area3">
        <select id="spec_fin" name="spec_fin" class="input1">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_finishing ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['finishing_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_6 area2">Liner Matterial</div>
      <div class="col_6 area3"><input class="input2" type="text" id="new_linermat"/></div>
      <div class="col_6 area2">Interior Matterial</div>
      <div class="col_6 area3"><input class="input2" type="text" id="new_intmat"/></div>
      <div class="col_6 area2">Stamping</div>
      <div class="col_6 area3"><input class="input2" type="text" id="new_stamping"/></div>
      <div class="col_6 area2">Egg Pocket</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_eggpocket"/></div>
      <div class="col_6 area2">Egg Holder</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_egghold"/></div>
      <div class="col_6 area2">Utility Pocket</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_utility"/></div>
      <div class="col_6 area2">Bootle Pocket</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_bootle"/></div>

      <div class="col_12">&nbsp;</div>


      <div class="col_12"><b>Cabinet</b></div>
      <div class="col_6 area2">Color</div>
      <div class="col_6 area3"><input class="input1" type="text" id="new_cabcolor" /></div>
      <div class="col_6 area2">Side Panel Material</div>
      <div class="col_6 area3"><input class="input1" type="text" id="new_spanelmat" /></div>

      <div class="col_12">&nbsp;</div>

      <div class="col_12"><b>Accessories</b></div>

      <div class="col_6 area2">Handle</div>
      <div class="col_6 area3">
        <select id="spec_handle" name="spec_handle" class="input1">
          <option value="YES">YES</option>
          <option value="NO">NO</option>
        </select>
      </div>
      <div class="col_6 area2">Handle Type</div>
      <div class="col_6 area3">
        <select id="spec_handletype" name="spec_handletype" class="input2">
          <?php
          include 'config.php';
          $stmt = $DBcon->prepare("SELECT *FROM table_handle ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['handle_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_6 area2">Baseboard</div>
      <div class="col_6 area3">
        <select id="spec_basebrd" name="spec_basebrd" class="input1">
          <option value="YES">YES</option>
          <option value="NO">NO</option>
        </select>
      </div>
      <div class="col_6 area2">Water Dispenser</div>
      <div class="col_6 area3">
        <select id="spec_waterdis" name="spec_waterdis" class="input1">
          <option value="YES">YES</option>
          <option value="NO">NO</option>
        </select>
      </div>
      <div class="col_6 area2">Rack</div>
      <div class="col_6 area3">
        <select id="spec_rack" name="spec_watspec_rackerdis" class="input2">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_rack ORDER BY name ASC  ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['rack_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>

      <div class="col_6 area2">Ice twist Tray</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_ittray" /></div>
      <div class="col_6 area2">Ice Bank</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_icebank" /></div>
      <div class="col_6 area2">Ice Tray</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_icetray" /></div>
      <div class="col_6 area2">Freezer Pocket</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_freezer" /></div>
      <div class="col_6 area2">Lamp</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_lamp" /></div>
      <div class="col_6 area2">Chiller</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_chiller" /></div>
      <div class="col_6 area2">Shelf</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_shelf" /></div>
      <div class="col_6 area2">Sheilded Moisture</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_smoisture" /></div>
      <div class="col_6 area2">Crisper</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_chrisper" /></div>







      <div class="col_12">&nbsp;</div>
      <div class="col_6 area2"><b>Art Spec Design</b></div>
      <div class="col_6 area3"><input class="input2" type="file" id="new_artspec" accept=".pdf" /></div>       
    </div>
    <div class="col_6 area1">
      <div class="col_12">&nbsp;</div>
      <div class="col_12">&nbsp;</div>
      <div class="col_12">&nbsp;</div>
      <div class="col_12">&nbsp;</div>
    </div>
  </table>
</div>


<!--############################################### SPEC MECHANIC ###############################################-->

<div id="tab_spec_mec" class="tab-content">
  <table class="psi_width7" border="0" align="left">
    <div class="col_6 area1">
      
      <div class="col_6">
        <ul class="button-bar" id="nav1">
          <li id="cancelback"><a><b><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</b></a></li>
          <li id="btnedit1"><a><b>&nbsp;&nbsp;<i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;</b></a></li>
        </ul>
      </div>
      <div class="col_6">
        <ul class="button-bar">
          <li title="Finish" id="btnfinish3b"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        </ul>
      </div>

      <div class="col_12">&nbsp;</div>

      <div class="col_12"><b>Dimension</b></div>
      <div class="col_6 area2">Status</div>
      <div class="col_6 area3">
        <select id="spec_stsdim" name="spec_stsdim" class="input1">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_dimension ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['dimension_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>

      <div class="col_6 area2">Product - WDH</div>
      <div class="col_6 area4"><input type="number" id="spec_prdw" placeholder="Width"/></div>
      <div class="col_6 area4"><input type="number" id="spec_prdd" placeholder="Depth"/></div>
      <div class="col_6 area4"><input type="number" id="spec_prdh" placeholder="Height"/></div>
      <div class="col_6 area4">mm</div>

      <div class="col_6 area2">Packing - WDH</div>
      <div class="col_6 area4"><input type="number" id="spec_pacw" placeholder="Width"/></div>
      <div class="col_6 area4"><input type="number" id="spec_pacd" placeholder="Depth"/></div>
      <div class="col_6 area4"><input type="number" id="spec_pach" placeholder="Height"/></div>
      <div class="col_6 area4">mm</div>

      <div class="col_6 area2">Packing Name</div>
      <div class="col_6 area3">
        <select id="spec_pacname" name="spec_pacname" class="input2">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_packing ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['packing_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>

      <div class="col_6 area2">Volume (Net/Gross)</div>
      <div class="col_6 area4"><input type="number" id="spec_volumenett" placeholder="Net"/></div>
      <div class="col_6 area4"><input type="number" id="spec_volumegross" placeholder="Gross"/></div>
      <div class="col_6 area4">Kg</div>

      <div class="col_6 area2">Weight (Net/Gross)</div>
      <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net"/></div>
      <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross"/></div>
      <div class="col_6 area4">Kg</div>

      <div class="col_6 area2">Container (40HQ)</div>
      <div class="col_6 area3"><input class="input1" type="number" id="spec_container" placeholder=""/></div>

      <div class="col_12">&nbsp;</div>
      <div class="col_6 area2"><b>Mech Spec Design</b></div>
      <div class="col_6 area3"><input class="input2" type="file" id="new_mecspec" accept=".pdf" /></div>
    </div>
    <div class="col_6 area1">

      <div class="col_12">&nbsp;</div>
      <div class="col_12">&nbsp;</div>
      <div class="col_12">&nbsp;</div>
      <div class="col_12">&nbsp;</div>

    </div>
  </table>
</div>


<!--############################################### SPEC CYCLE UNIT ###############################################-->

<div id="tab_spec_cyc" class="tab-content">
  <table class="psi_width7" border="0" align="left">
    <div class="col_6 area1">
      <div class="col_6">
        <ul class="button-bar" id="nav1">
          <li id="cancelback"><a><b><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</a></b></li>
          <li id="btnedit1"><a><b>&nbsp;&nbsp;<i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;</a></b></li>
        </ul>
      </div>
      <div class="col_6">
        <ul class="button-bar">
          <li title="Finish" id="btnfinish3c"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        </ul>
      </div>

      <div class="col_12">&nbsp;</div>

      <div class="col_5 ">Rollbond</div>
      <div class="col_5 ">
        <select id="spec_rollb" name="spec_rollb" >
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_rollbond ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['rollbond_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Rollbond Type</div>
      <div class="col_5 ">
        <select id="spec_rollbtype" name="spec_rollbtype" >
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_rollbondtype ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['rollbondtype_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Temp. Control</div>
      <div class="col_5 ">
        <select id="spec_tcontrol" name="spec_tcontrol" >
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_temperature ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['temperature_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Drip Tray</div>
      <div class="col_5 ">
        <select id="spec_driptray" name="spec_driptray" >
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>


      <div class="col_5 ">Climate Class</div>
      <div class="col_5 ">
        <select id="spec_cliclass" name="spec_cliclass">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_climate ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['climate_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Condensor</div>
      <div class="col_5 ">
        <select id="spec_cond" name="spec_cond" >
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_condensor ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['condensor_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Refrigerant</div>
      <div class="col_5 ">
        <select id="spec_refri" name="spec_refri" >
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_refrigerant ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['refrigerant_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Mass of Refrigrant</div>
      <div class="col_5 "><input type="number" id="new_MoR"/></div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Rated Current</div>
      <div class="col_5 "><input type="number" id="new_rateCur"/></div>
      <div class="col_2 ">A</div>

      <div class="col_5 ">Rated Power</div>
      <div class="col_5 "><input type="number" id="new_ratePwr"/></div>
      <div class="col_2 ">W</div>

      <div class="col_5 ">Compressor</div>
      <div class="col_5 "><input type="text" id="new_compressor"/></div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Cooling Capacity</div>
      <div class="col_5 "><input type="text" id="new_coolingCap"/></div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Capillary Tube Dimension</div>
      <div class="col_5 "><input type="text" id="new_CTD"/></div>
      <div class="col_2 ">&nbsp;</div>

      <div class="col_5 ">Freezing Temp</div>
      <div class="col_5 "><input type="text" id="new_freezTemp"/></div>
      <div class="col_2 ">&#176;C</div>

      <div class="col_5 ">Energy Consumption</div>
      <div class="col_5 "><input type="text" id="new_energyCons"/></div>
      <div class="col_2 ">W</div>


      <div class="col_5 ">Cyc Spec Design</div>
      <div class="col_5 "><input class="input2" type="file" id="new_cycSpec" accept=".pdf" /></div>

      <div class="col_6 area1">
        <div class="col_12">&nbsp;</div>
        <div class="col_12">&nbsp;</div>
        <div class="col_12">&nbsp;</div>
        <div class="col_12">&nbsp;</div>

      </div>
    </table>
  </div>



  <!--############################################### SPEC ELECTRONIC ###############################################-->

  <div id="tab_spec_ele" class="tab-content">
    <table class="psi_width7" border="0" align="left">
      <div class="col_6 area1">
        <div class="col_6">
          <ul class="button-bar" id="nav1">
            <li id="cancelback"><a><b><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</b></a></li>
            <li id="btnedit1"><a><b>&nbsp;&nbsp;<i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;</b></a></li>
          </ul>
        </div>
        <div class="col_6">
          <ul class="button-bar">
            <li title="Finish" id="btnfinish3d"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
          </ul>
        </div>

        <div class="col_12">&nbsp;</div>

        <div class="col_5 ">Rated Voltage</div>
        <div class="col_5 ">
          <select id="spec_rv" name="spec_rv" >
            <?php
            include 'config.php';

            $stmt = $DBcon->prepare("SELECT *FROM table_rv ORDER BY name ASC ");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              ?>
              <option value="<?php echo $row['rv_id']; ?>"><?php echo $row['name']; ?></option>
              <?php 
            } 
            ?>   
          </select>
        </div>
        <div class="col_2 ">&nbsp;</div>

        <div class="col_5 ">Wide Voltage</div>
        <div class="col_5 ">
          <select id="spec_wv" name="spec_wv" >
            <?php
            include 'config.php';

            $stmt = $DBcon->prepare("SELECT *FROM table_wv ORDER BY name ASC ");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              ?>
              <option value="<?php echo $row['wv_id']; ?>"><?php echo $row['name']; ?></option>
              <?php 
            } 
            ?>   
          </select>
        </div>
        <div class="col_2 ">&nbsp;</div>

        <div class="col_5 ">Rated Frequency</div>
        <div class="col_5 "><input type="number" id="new_rf"/></div>
        <div class="col_2 ">Hz</div>

        <div class="col_5 ">Rated Current</div>
        <div class="col_5 "><input type="number" id="new_rc"/></div>
        <div class="col_2 ">A</div>

        <div class="col_5 ">Rated Power</div>
        <div class="col_5 "><input type="number" id="new_rp"/></div>
        <div class="col_2 ">W</div>

        <div class="col_5 ">Rated Power Heater</div>
        <div class="col_5 "><input type="number" id="new_rph"/></div>
        <div class="col_2 ">W</div>

        <div class="col_5 ">Rated Max Lamp</div>
        <div class="col_5 "><input type="number" id="new_rml"/></div>
        <div class="col_2 ">W</div>

        <div class="col_5 ">Electronic Spec Design</div>
        <div class="col_7 "><input type="file" id="new_elecspec" accept=".pdf" /></div>


      </div>
      <div class="col_6 area1">
        <div class="col_12">&nbsp;</div>
        <div class="col_12">&nbsp;</div>
        <div class="col_12">&nbsp;</div>
        <div class="col_12">&nbsp;</div>

      </div>
    </table>
  </div>


  <!--############################################### SAVE ###############################################-->

<!--   <div id="tab_spec_save" class="tab-content">
<table class="psi_width7" border="0" align="left">
<div class="col_6 area1">
<div class="col_12">&nbsp;</div>
<div class="col_1 ">&nbsp;</div>
<div class="col_11 "><b>Save All your Product Specification ?</b></div>
<div class="col_12">&nbsp;</div>


<div class="col_6"><button class="buttoncancel" id="cancelback5"><i class="fa fa-remove fa-lg"></i>&nbsp;&nbsp;Cancel</button></div>
<div class="col_6"><button class="buttonnext" id="savespecrf"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

<div class="col_12">&nbsp;</div>

</div>
</table>
</div> -->

<!-- SCRIPT BUAT MASUKIN DATA YANG DIAMBIL DARI DATABASE -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#spec_color').val(<?php echo $color_id ?>);
    $('#spec_pattern').val(<?php echo $pattern_id ?>);
    $('#spec_fin').val(<?php echo $finishing_id ?>);
    $('#new_linermat').val("<?php echo $dLinerMaterial ?>");
    $('#new_intmat').val("<?php echo $dInteriorMateri ?>");
    $('#new_stamping').val("<?php echo $dStamping ?>");
    $('#new_eggpocket').val(<?php echo $dEggPocket ?>);
    $('#new_egghold').val(<?php echo $dEggHolder ?>);
    $('#new_utility').val(<?php echo $dUtilityPocket ?>);
    $('#new_bootle').val(<?php echo $dBottlePocket ?>);
    $('#new_cabcolor').val("<?php echo $cColor ?>");
    $('#new_spanelmat').val("<?php echo $cSidePanelMat ?>");
    $('#spec_handle').val("<?php echo $aHandle ?>");
    $('#spec_handletype').val(<?php echo $handle_id ?>);
    $('#spec_basebrd').val("<?php echo $aBaseboard ?>");
    $('#spec_waterdis').val("<?php echo $aWaterdispenser ?>");
    $('#spec_rack').val(<?php echo $rack_id ?>);
    $('#new_ittray').val(<?php echo $aIceTwistTray ?>);
    $('#new_icebank').val(<?php echo $aIceBank ?>);
    $("#new_icetray").val(<?php echo $aIceTray ?>);
    $('#new_freezer').val(<?php echo $aFrezzerPocket ?>);
    $('#new_lamp').val(<?php echo $aLamp ?>);
    $('#new_chiller').val(<?php echo $aChiller ?>);
    $('#new_shelf').val(<?php echo $aShelf ?>);
    $('#new_smoisture').val(<?php echo $aSheildedMoist ?>);
    $('#new_chrisper').val(<?php echo $aCrisper ?>);
    $('#spec_stsdim').val(<?php echo $dimension_id ?>);
    $('#spec_prdw').val(<?php echo $mechProdW ?>);
    $('#spec_prdd').val(<?php echo $mechProdL ?>);
    $('#spec_prdh').val(<?php echo $mechProdH ?>);
    $('#spec_pacw').val(<?php echo $mechPackW ?>);
    $('#spec_pacd').val(<?php echo $mechPackL ?>);
    $('#spec_pach').val(<?php echo $mechPackH ?>);
    $('#spec_pacname').val(<?php echo $packing_id ?>);
    $('#spec_volumenett').val(<?php echo $mechVolNet; ?>);
    $('#spec_volumegross').val(<?php echo $mechVolGros ?>);
    $('#spec_weightnett').val(<?php echo $mechWeightNet ?>);
    $('#spec_weightgross').val(<?php echo $mechWeightGros ?>);
    $('#spec_container').val(<?php echo $mechContainer ?>);
    $('#spec_rollb').val(<?php echo $rollbond_id ?>);
    $('#spec_rollbtype').val(<?php echo $rollbondtype_id ?>);
    $('#spec_tcontrol').val(<?php echo $temperature_id ?>);
    $('#spec_driptray').val("<?php echo $cycDripTray ?>");
    $('#spec_cliclass').val(<?php echo $climate_id ?>);
    $('#spec_cond').val(<?php echo $condensor_id ?>);
    $('#spec_refri').val(<?php echo $refrigerant_id ?>);
    $('#new_MoR').val(<?php echo $cycMoR ?>);
    $('#new_rateCur').val(<?php echo $cycRatedCurrent ?>);
    $('#new_ratePwr').val(<?php echo $cycRatedPower ?>);
    $('#new_compressor').val("<?php echo $cycCompressor ?>");
    $('#new_coolingCap').val("<?php echo $cycCoolingCapacity ?>");
    $('#new_CTD').val("<?php echo $cycCapillaryTube ?>");
    $('#new_freezTemp').val("<?php echo $cycFreezingTemp ?>");
    $('#new_energyCons').val("<?php echo $cycEnergyConsumption ?>");
    $('#spec_rv').val(<?php echo $rv_id ?>);
    $('#spec_wv').val(<?php echo $wv_id ?>);
    $('#new_rf').val(<?php echo $elecRF ?>);
    $('#new_rc').val(<?php echo $elecRC ?>);
    $('#new_rp').val(<?php echo $elecRP ?>);
    $('#new_rph').val(<?php echo $elecRPH ?>);
    $('#new_rml').val(<?php echo $elecMaxLamp ?>);


  });
</script>