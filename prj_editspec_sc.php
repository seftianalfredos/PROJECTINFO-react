<?php 
include 'config.php';
$specSC_id          = '';
$type_id            = '';
$color_id           = '';
$color_name         = '';
$scHandle           = '';
$rack_id            = '';
$rack_name          = '';
$NoR                = '';
$scArtSpecDesign    = '';
$dimension_id       = '';
$dimension_name     = '';
$scPrdW             = '';
$scPrdD             = '';
$scPrdH             = '';
$scPackW            = '';
$scPackD            = '';
$scPackH            = '';
$scVolN             = '';
$scVolG             = '';
$scWeightN          = '';
$scWeightG          = '';
$scContainer        = '';
$scMecSpecDesign    = '';
$rollbond_id        = '';
$rollbond_name      = '';
$rollbondtype_id    = '';
$rollbondtype_name  = '';
$climate_id         = '';
$climate_name       = '';
$condensor_id       = '';
$condensor_name     = '';
$refrigerant_id     = '';
$refrigerant_name   = '';
$scMoR              = '';
$scRC               = '';
$scRP               = '';
$scCompressor       = '';
$scCoolCap          = '';
$scCTD              = '';
$scFreezTemp        = '';
$scEC               = '';
$scCycSpecDesign    = '';
$rv_id              = '';
$rv_name            = '';
$wv_id              = '';
$wv_name            = '';
$scRF               = '';
$scRtdCurr          = '';
$scRtdPwr           = '';
$scRML              = '';
$scElecSpecDesign   = '';

$stmt = $DBcon->prepare("
  SELECT
  tss.specSC_id AS specSC_id,
  tt.type_id AS type_id,
  tc.color_id AS color_id,
  tc.name AS color_name,
  tss.scHandle AS scHandle,
  tr.rack_id AS rack_id,
  tr.name AS rack_name,
  tss.NoR AS NoR,
  tss.scArtSpecDesign AS scArtSpecDesign,
  td.dimension_id AS dimension_id,
  td.name AS dimension_name,
  tss.scPrdW AS scPrdW,
  tss.scPrdD AS scPrdD,
  tss.scPrdH AS scPrdH,
  tss.scPackW AS scPackW,
  tss.scPackD AS scPackD,
  tss.scPackH AS scPackH,
  tss.scVolN AS scVolN,
  tss.scVolG AS scVolG,
  tss.scWeightN AS scWeightN,
  tss.scWeightG AS scWeightG,
  tss.scContainer AS scContainer,
  tss.scMecSpecDesign AS scMecSpecDesign,
  tro.rollbond_id AS rollbond_id,
  tro.name AS rollbond_name,
  trt.rollbondtype_id AS rollbondtype_id,
  trt.name AS rollbondtype_name,
  tcl.climate_id AS climate_id,
  tcl.name AS climate_name,
  tco.condensor_id AS condensor_id,
  tco.name AS condensor_name,
  tre.refrigerant_id AS refrigerant_id,
  tre.name AS refrigerant_name,
  tss.scMoR AS scMoR,
  tss.scRC AS scRC,
  tss.scRP AS scRP,
  tss.scCompressor AS scCompressor,
  tss.scCoolCap AS scCoolCap,
  tss.scCTD AS scCTD,
  tss.scFreezTemp AS scFreezTemp,
  tss.scEC AS scEC,
  tss.scCycSpecDesign AS scCycSpecDesign,
  trv.rv_id AS rv_id,
  trv.name AS rv_name,
  twv.wv_id AS wv_id,
  twv.name AS wv_name,
  tss.scRF AS scRF,
  tss.scRtdCurr AS scRtdCurr,
  tss.scRtdPwr AS scRtdPwr,
  tss.scRML AS scRML,
  tss.scElecSpecDesign AS scElecSpecDesign
  FROM table_specsc tss
  RIGHT JOIN table_type tt ON tss.type_id = tt.type_id
  LEFT JOIN table_color tc ON tss.color_id = tc.color_id
  LEFT JOIN table_rack tr ON tss.rack_id = tr.rack_id
  LEFT JOIN table_dimension td ON tss.dimension_id = td.dimension_id
  LEFT JOIN table_rollbond tro ON tss.rollbond_id = tro.rollbond_id
  LEFT JOIN table_rollbondtype trt ON tss.rollbondtype_id = trt.rollbondtype_id
  LEFT JOIN table_climate tcl ON tss.climate_id = tcl.climate_id
  LEFT JOIN table_condensor tco ON tss.condensor_id = tco.condensor_id
  LEFT JOIN table_refrigerant tre ON tss.refrigerant_id = tre.refrigerant_id
  LEFT JOIN table_rv trv ON tss.rv_id = trv.rv_id
  LEFT JOIN table_wv twv ON tss.wv_id = twv.wv_id
  WHERE tt.type_id = :type_id
  ");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $specSC_id  = $row['specSC_id'];
  $type_id  = $row['type_id'];
  $color_id = $row['color_id'];
  $color_name = $row['color_name'];
  $scHandle = $row['scHandle'];
  $rack_id  = $row['rack_id'];
  $rack_name  = $row['rack_name'];
  $NoR  = $row['NoR'];
  $scArtSpecDesign  = $row['scArtSpecDesign'];
  $dimension_id = $row['dimension_id'];
  $dimension_name = $row['dimension_name'];
  $scPrdW = $row['scPrdW'];
  $scPrdD = $row['scPrdD'];
  $scPrdH = $row['scPrdH'];
  $scPackW  = $row['scPackW'];
  $scPackD  = $row['scPackD'];
  $scPackH  = $row['scPackH'];
  $scVolN = $row['scVolN'];
  $scVolG = $row['scVolG'];
  $scWeightN  = $row['scWeightN'];
  $scWeightG  = $row['scWeightG'];
  $scContainer  = $row['scContainer'];
  $scMecSpecDesign  = $row['scMecSpecDesign'];
  $rollbond_id  = $row['rollbond_id'];
  $rollbond_name  = $row['rollbond_name'];
  $rollbondtype_id  = $row['rollbondtype_id'];
  $rollbondtype_name  = $row['rollbondtype_name'];
  $climate_id = $row['climate_id'];
  $climate_name = $row['climate_name'];
  $condensor_id = $row['condensor_id'];
  $condensor_name = $row['condensor_name'];
  $refrigerant_id = $row['refrigerant_id'];
  $refrigerant_name = $row['refrigerant_name'];
  $scMoR  = $row['scMoR'];
  $scRC = $row['scRC'];
  $scRP = $row['scRP'];
  $scCompressor = $row['scCompressor'];
  $scCoolCap  = $row['scCoolCap'];
  $scCTD  = $row['scCTD'];
  $scFreezTemp  = $row['scFreezTemp'];
  $scEC = $row['scEC'];
  $scCycSpecDesign  = $row['scCycSpecDesign'];
  $rv_id  = $row['rv_id'];
  $rv_name  = $row['rv_name'];
  $wv_id  = $row['wv_id'];
  $wv_name  = $row['wv_name'];
  $scRF = $row['scRF'];
  $scRtdCurr  = $row['scRtdCurr'];
  $scRtdPwr = $row['scRtdPwr'];
  $scRML  = $row['scRML'];
  $scElecSpecDesign = $row['scElecSpecDesign'];
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

      <div class="col_12">&nbsp;</div>

      <div class="col_12"><b>Accessories</b></div>

      <div class="col_6 area2">Handle</div>
      <div class="col_6 area3">
        <select id="spec_handle" name="spec_handle" class="input1">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select>
      </div>

      <div class="col_6 area2">Rack</div>
      <div class="col_6 area3">
        <select id="spec_rack" name="spec_watspec_rackerdis" class="input2">
          <?php
          include 'config.php';

          $stmt = $DBcon->prepare("SELECT *FROM table_rack ORDER BY name ASC ");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $row['rack_id']; ?>"><?php echo $row['name']; ?></option>
            <?php 
          } 
          ?>   
        </select>
      </div>

      <div class="col_6 area2">No of Rack</div>
      <div class="col_6 area3"><input class="input1" type="number" id="new_qtyrack"/></div>

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
        <select id="spec_rollbtype" name="spec_rollbtype">
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
        <div class="col_6"><button class="buttonnext" id="savespecsc"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

        <div class="col_12">&nbsp;</div>

      </div>
    </table>
  </div> -->


<!-- SCRIPT BUAT MASUKIN DATA SPEC SC  -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#spec_color').val(<?php echo $color_id ?>);
    $('#spec_handle').val("<?php echo $scHandle ?>");
    $('#spec_rack').val(<?php echo $rack_id ?>);
    $('#new_qtyrack').val(<?php echo $NoR ?>);
    $('#spec_stsdim').val(<?php echo $dimension_id ?>);
    $('#spec_prdw').val(<?php echo $scPrdW ?>);
    $('#spec_prdd').val(<?php echo $scPrdD ?>);
    $('#spec_prdh').val(<?php echo $scPrdH ?>);
    $('#spec_pacw').val(<?php echo $scPackW ?>);
    $('#spec_pacd').val(<?php echo $scPackD ?>);
    $('#spec_pach').val(<?php echo $scPackH ?>);
    $('#spec_volumenett').val(<?php echo $scVolN ?>);
    $('#spec_volumegross').val(<?php echo $scVolG ?>);
    $('#spec_weightnett').val(<?php echo $scWeightN ?>);
    $('#spec_weightgross').val(<?php echo $scWeightG ?>);
    $('#spec_container').val(<?php echo $scContainer ?>);
    $('#spec_rollb').val(<?php echo $rollbond_id ?>);
    $('#spec_rollbtype').val(<?php echo $rollbondtype_id ?>);
    $('#spec_cliclass').val(<?php echo $climate_id ?>);
    $('#spec_cond').val(<?php echo $condensor_id ?>);
    $('#spec_refri').val(<?php echo $refrigerant_id ?>);
    $('#new_MoR').val(<?php echo $scMoR ?>);
    $('#new_rateCur').val(<?php echo $scRC ?>);
    $('#new_ratePwr').val(<?php echo $scRP ?>);
    $('#new_compressor').val("<?php echo $scCompressor ?>");
    $('#new_coolingCap').val("<?php echo $scCoolCap ?>");
    $('#new_CTD').val("<?php echo $scCTD ?>");
    $('#new_freezTemp').val("<?php echo $scFreezTemp ?>");
    $('#new_energyCons').val("<?php echo $scEC ?>");
    $('#spec_rv').val(<?php echo $rv_id ?>);
    $('#spec_wv').val(<?php echo $wv_id ?>);
    $('#new_rf').val(<?php echo $scRF ?>);
    $('#new_rc').val(<?php echo $scRtdCurr ?>);
    $('#new_rp').val(<?php echo $scRtdPwr ?>);
    $('#new_rml').val(<?php echo $scRML ?>);
  });
</script>