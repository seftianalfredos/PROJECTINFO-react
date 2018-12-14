<?php 
include 'config.php';

$specCF_id            = '';
$type_id              = '';
$bodyColor            = '';
$cfArtSpecDesign      = '';
$dimension_id         = '';
$dimension_name       = '';
$cfPrdW               = '';
$cfPrdD               = '';
$cfPrdH               = '';
$cfPackW              = '';
$cfPackD              = '';
$cfPackH              = '';
$cfVolN               = '';
$cfVolG               = '';
$cfWeightN            = '';
$cfWeightG            = '';
$cfContainer          = '';
$cfMecSpecDesign      = '';
$rollbond_id          = '';
$rollbond_name        = '';
$rollbondtype_id      = '';
$rollbondtype_name    = '';
$temperature_id       = '';
$temperature_name     = '';
$climate_id           = '';
$climate_name         = '';
$condensor_id         = '';
$condensor_name       = '';
$refrigerant_id       = '';
$refrigerant_name     = '';
$cfMoR                = '';
$cfRC                 = '';
$cfRP                 = '';
$cfCompressor         = '';
$cfCoolCap            = '';
$cfCTD                = '';
$cfFreezTemp          = '';
$cfEnergyConsumption  = '';
$cfCycSpecDesign      = '';
$rv_id                = '';
$rv_name              = '';
$wv_id                = '';
$wv_name              = '';
$cfRF                 = '';
$cfRtdCur             = '';
$cfRtdPwr             = '';
$cfRPH                = '';
$cfElecSpecDesign     = '';


$stmt = $DBcon->prepare("
  SELECT
  tsc.specCF_id AS specCF_id,
  tt.type_id AS type_id,
  tsc.bodyColor AS bodyColor,
  tsc.cfArtSpecDesign AS cfArtSpecDesign,
  td.dimension_id AS dimension_id,
  td.name AS dimension_name,
  tsc.cfPrdW AS cfPrdW,
  tsc.cfPrdD AS cfPrdD,
  tsc.cfPrdH AS cfPrdH,
  tsc.cfPackW AS cfPackW,
  tsc.cfPackD AS cfPackD,
  tsc.cfPackH AS cfPackH,
  tsc.cfVolN AS cfVolN,
  tsc.cfVolG AS cfVolG,
  tsc.cfWeightN AS cfWeightN,
  tsc.cfWeightG AS cfWeightG,
  tsc.cfContainer AS cfContainer,
  tsc.cfMecSpecDesign AS cfMecSpecDesign,
  tr.rollbond_id AS rollbond_id,
  tr.name AS rollbond_name,
  trt.rollbondtype_id AS rollbondtype_id,
  trt.name AS rollbondtype_name,
  tte.temperature_id AS temperature_id,
  tte.name AS temperature_name,
  tc.climate_id AS climate_id,
  tc.name AS climate_name,
  tco.condensor_id AS condensor_id,
  tco.name AS condensor_name,
  tre.refrigerant_id AS refrigerant_id,
  tre.name AS refrigerant_name,
  tsc.cfMoR AS cfMoR,
  tsc.cfRC AS cfRC,
  tsc.cfRP AS cfRP,
  tsc.cfCompressor AS cfCompressor,
  tsc.cfCoolCap AS cfCoolCap,
  tsc.cfCTD AS cfCTD,
  tsc.cfFreezTemp AS cfFreezTemp,
  tsc.cfEnergyConsumption AS cfEnergyConsumption,
  tsc.cfCycSpecDesign AS cfCycSpecDesign,
  trv.rv_id AS rv_id,
  trv.name AS rv_name,
  twv.wv_id AS wv_id,
  twv.name AS wv_name,
  tsc.cfRF AS cfRF,
  tsc.cfRtdCur AS cfRtdCur,
  tsc.cfRtdPwr AS cfRtdPwr,
  tsc.cfRPH AS cfRPH,
  tsc.cfElecSpecDesign AS cfElecSpecDesign
  FROM table_speccf tsc 
  RIGHT JOIN table_type tt ON tsc.type_id = tt.type_id
  LEFT JOIN table_dimension td ON tsc.dimension_id = td.dimension_id
  LEFT JOIN table_rollbond tr ON tsc.rollbond_id = tr.rollbond_id
  LEFT JOIN table_rollbondtype trt ON tsc.rollbondtype_id = trt.rollbondtype_id
  LEFT JOIN table_temperature tte ON tsc.temperature_id = tte.temperature_id
  LEFT JOIN table_climate tc ON tsc.climate_id = tc.climate_id
  LEFT JOIN table_condensor tco ON tsc.condensor_id = tco.condensor_id
  LEFT JOIN table_refrigerant tre ON tsc.refrigerant_id = tre.refrigerant_id
  LEFT JOIN table_rv trv ON tsc.rv_id = trv.rv_id
  LEFT JOIN table_wv twv ON tsc.wv_id = twv.wv_id
  WHERE tt.type_id = :type_id
  ");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $specCF_id  = $row['specCF_id'];
  $type_id  = $row['type_id'];
  $bodyColor  = $row['bodyColor'];
  $cfArtSpecDesign  = $row['cfArtSpecDesign'];
  $dimension_id = $row['dimension_id'];
  $dimension_name = $row['dimension_name'];
  $cfPrdW = $row['cfPrdW'];
  $cfPrdD = $row['cfPrdD'];
  $cfPrdH = $row['cfPrdH'];
  $cfPackW  = $row['cfPackW'];
  $cfPackD  = $row['cfPackD'];
  $cfPackH  = $row['cfPackH'];
  $cfVolN = $row['cfVolN'];
  $cfVolG = $row['cfVolG'];
  $cfWeightN  = $row['cfWeightN'];
  $cfWeightG  = $row['cfWeightG'];
  $cfContainer  = $row['cfContainer'];
  $cfMecSpecDesign  = $row['cfMecSpecDesign'];
  $rollbond_id  = $row['rollbond_id'];
  $rollbond_name  = $row['rollbond_name'];
  $rollbondtype_id  = $row['rollbondtype_id'];
  $rollbondtype_name  = $row['rollbondtype_name'];
  $temperature_id = $row['temperature_id'];
  $temperature_name = $row['temperature_name'];
  $climate_id = $row['climate_id'];
  $climate_name = $row['climate_name'];
  $condensor_id = $row['condensor_id'];
  $condensor_name = $row['condensor_name'];
  $refrigerant_id = $row['refrigerant_id'];
  $refrigerant_name = $row['refrigerant_name'];
  $cfMoR  = $row['cfMoR'];
  $cfRC = $row['cfRC'];
  $cfRP = $row['cfRP'];
  $cfCompressor = $row['cfCompressor'];
  $cfCoolCap  = $row['cfCoolCap'];
  $cfCTD  = $row['cfCTD'];
  $cfFreezTemp  = $row['cfFreezTemp'];
  $cfEnergyConsumption  = $row['cfEnergyConsumption'];
  $cfCycSpecDesign  = $row['cfCycSpecDesign'];
  $rv_id  = $row['rv_id'];
  $rv_name  = $row['rv_name'];
  $wv_id  = $row['wv_id'];
  $wv_name  = $row['wv_name'];
  $cfRF = $row['cfRF'];
  $cfRtdCur = $row['cfRtdCur'];
  $cfRtdPwr = $row['cfRtdPwr'];
  $cfRPH  = $row['cfRPH'];
  $cfElecSpecDesign = $row['cfElecSpecDesign'];
}

?>

<!--######################################################################## SPEC ARTWORK ########################################################################-->

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
      <div class="col_6 area2">Body Color</div>
      <div class="col_6 area3">
        <select id="spec_color" name="spec_color" class="input1">
          <?php
          include 'config.php';
          $stmt = $DBcon->prepare("SELECT *FROM table_color ORDER BY name ASC ");
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['name'] ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>

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
      <div class="col_6 area4"><input type="number" id="spec_prdw" placeholder="Width"  /></div>
      <div class="col_6 area4"><input type="number" id="spec_prdd" placeholder="Depth"  /></div>
      <div class="col_6 area4"><input type="number" id="spec_prdh" placeholder="Height"  /></div>
      <div class="col_6 area4">mm</div>

      <div class="col_6 area2">Packing - WDH</div>
      <div class="col_6 area4"><input type="number" id="spec_pacw" placeholder="Width"  /></div>
      <div class="col_6 area4"><input type="number" id="spec_pacd" placeholder="Depth"  /></div>
      <div class="col_6 area4"><input type="number" id="spec_pach" placeholder="Height"  /></div>
      <div class="col_6 area4">mm</div>

      <div class="col_6 area2">Volume (Net/Gross)</div>
      <div class="col_6 area4"><input type="number" id="spec_volumenett" placeholder="Net"  /></div>
      <div class="col_6 area4"><input type="number" id="spec_volumegross" placeholder="Gross"  /></div>
      <div class="col_6 area4">Kg</div>

      <div class="col_6 area2">Weight (Net/Gross)</div>
      <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net"/></div>
      <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross"/></div>
      <div class="col_6 area4">Kg</div>

      <div class="col_6 area2">Container (40HQ)</div>
      <div class="col_6 area3"><input class="input1" type="number" id="spec_container" placeholder=""/></div>

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
      <div class="col_5 "><input type="text" id="new_energyCons" /></div>
      <div class="col_2 ">W</div>


      <div class="col_5 "><b>Cyc Spec Design</b></div>
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

        <div class="col_5 "><b>Electronic Spec Design</b></div>
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
        <div class="col_6"><button class="buttonnext" id="savespeccf"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

        <div class="col_12">&nbsp;</div>

      </div>
    </table>
  </div> -->

<!-- SCRIPT BUAT MASUKIN DATA SPEC CF DARI SEBELUMNYA -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('#spec_color').val("<?php echo $bodyColor ?>");
      $('#spec_stsdim').val(<?php echo $dimension_id ?>);
      $('#spec_prdw').val(<?php echo $cfPrdW ?>);
      $('#spec_prdd').val(<?php echo $cfPrdD ?>);
      $('#spec_prdh').val(<?php echo $cfPrdH ?>);
      $('#spec_pacw').val(<?php echo $cfPackW ?>);
      $('#spec_pacd').val(<?php echo $cfPackD ?>);
      $('#spec_pach').val(<?php echo $cfPackH ?>);
      $('#spec_volumenett').val(<?php echo $cfVolN ?>);
      $('#spec_volumegross').val(<?php echo $cfVolG ?>);
      $('#spec_weightnett').val(<?php echo $cfWeightN ?>);
      $('#spec_weightgross').val(<?php echo $cfWeightG ?>);
      $('#spec_container').val(<?php echo $cfContainer ?>);
      $('#spec_rollb').val(<?php echo $rollbond_id ?>);
      $('#spec_rollbtype').val(<?php echo $rollbondtype_id ?>);
      $('#spec_tcontrol').val(<?php echo $temperature_id ?>);
      $('#spec_cliclass').val(<?php echo $climate_id ?>);
      $('#spec_cond').val(<?php echo $condensor_id ?>);
      $('#spec_refri').val(<?php echo $refrigerant_id ?>);
      $('#new_MoR').val(<?php echo $cfMoR ?>);
      $('#new_rateCur').val(<?php echo $cfRtdCur ?>);
      $('#new_ratePwr').val(<?php echo $cfRtdPwr ?>);
      $('#new_compressor').val("<?php echo $cfCompressor ?>");
      $('#new_coolingCap').val("<?php echo $cfCoolCap ?>");
      $('#new_CTD').val("<?php echo $cfCTD ?>");
      $('#new_freezTemp').val(<?php echo $cfFreezTemp ?>);
      $('#new_energyCons').val(<?php echo $cfEnergyConsumption ?>);
      $('#spec_rv').val(<?php echo $rv_id ?>);
      $('#spec_wv').val(<?php echo $wv_id ?>);
      $('#new_rf').val(<?php echo $cfRF ?>);
      $('#new_rc').val(<?php echo $cfRC ?>);
      $('#new_rp').val(<?php echo $cfRP ?>);
      $('#new_rph').val(<?php echo $cfRPH ?>);
    });
  </script>