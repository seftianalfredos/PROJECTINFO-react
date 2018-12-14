<?php 
include 'config.php';

$specWM_id        = '';
$type_id          = '';
$color_id         = '';
$color_name       = '';
$wmMB             = '';
$wmMD             = '';
$wmArtSpecDesign  = '';
$dimension_id     = '';
$dimension_name   = '';
$wmPrdW           = '';
$wmPrdD           = '';
$wmPrdH           = '';
$wmPackW          = '';
$wmPackD          = '';
$wmPackH          = '';
$wmVolN           = '';
$wmVolG           = '';
$wmWeightN        = '';
$wmWeightG        = '';
$wmWaterSelector  = '';
$wmContainer      = '';
$wmMecSpecDesign  = '';
$wmTMS            = '';
$wmPMS            = '';
$wmSMS            = '';
$wmTMW            = '';
$wmPMW            = '';
$wmSMW            = '';
$wmCycSpecDesign  = '';
$rv_id            = '';
$rv_name          = '';
$wv_id            = '';
$wv_name          = '';
$wmRF             = '';
$wmRC             = '';
$wmRP             = '';
$wmElecSpecDesign = '';

$stmt = $DBcon->prepare("
  SELECT
  tsw.specWM_id AS specWM_id,
  tt.type_id AS type_id,
  tco.color_id AS color_id,
  tco.name AS color_name,
  tsw.wmMB AS wmMB,
  tsw.wmMD AS wmMD,
  tsw.wmArtSpecDesign AS wmArtSpecDesign,
  tdi.dimension_id AS dimension_id,
  tdi.name AS dimension_name,
  tsw.wmPrdW AS wmPrdW,
  tsw.wmPrdD AS wmPrdD,
  tsw.wmPrdH AS wmPrdH,
  tsw.wmPackW AS wmPackW,
  tsw.wmPackD AS wmPackD,
  tsw.wmPackH AS wmPackH,
  tsw.wmVolN AS wmVolN,
  tsw.wmVolG AS wmVolG,
  tsw.wmWeightN AS wmWeightN,
  tsw.wmWeightG AS wmWeightG,
  tsw.wmWaterSelector AS wmWaterSelector,
  tsw.wmContainer AS wmContainer,
  tsw.wmMecSpecDesign AS wmMecSpecDesign,
  tsw.wmTMS AS wmTMS,
  tsw.wmPMS AS wmPMS,
  tsw.wmSMS AS wmSMS,
  tsw.wmTMW AS wmTMW,
  tsw.wmPMW AS wmPMW,
  tsw.wmSMW AS wmSMW,
  tsw.wmCycSpecDesign AS wmCycSpecDesign,
  trv.rv_id AS rv_id,
  trv.name AS rv_name,
  twv.wv_id AS wv_id,
  twv.name AS wv_name,
  tsw.wmRF AS wmRF,
  tsw.wmRC AS wmRC,
  tsw.wmRP AS wmRP,
  tsw.wmElecSpecDesign AS wmElecSpecDesign
  FROM table_specwm tsw 
  RIGHT JOIN table_type tt ON tsw.type_id = tt.type_id
  LEFT JOIN table_color tco ON tsw.color_id = tco.color_id
  LEFT JOIN table_dimension tdi ON tsw.dimension_id = tdi.dimension_id
  LEFT JOIN table_rv trv ON tsw.rv_id = trv.rv_id
  LEFT JOIN table_wv twv ON tsw.wv_id = twv.wv_id
  WHERE tt.type_id = :type_id
  ");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $specWM_id  = $row['specWM_id'];
  $type_id  = $row['type_id'];
  $color_id = $row['color_id'];
  $color_name = $row['color_name'];
  $wmMB = $row['wmMB'];
  $wmMD = $row['wmMD'];
  $wmArtSpecDesign  = $row['wmArtSpecDesign'];
  $dimension_id = $row['dimension_id'];
  $dimension_name = $row['dimension_name'];
  $wmPrdW = $row['wmPrdW'];
  $wmPrdD = $row['wmPrdD'];
  $wmPrdH = $row['wmPrdH'];
  $wmPackW  = $row['wmPackW'];
  $wmPackD  = $row['wmPackD'];
  $wmPackH  = $row['wmPackH'];
  $wmVolN = $row['wmVolN'];
  $wmVolG = $row['wmVolG'];
  $wmWeightN  = $row['wmWeightN'];
  $wmWeightG  = $row['wmWeightG'];
  $wmWaterSelector  = $row['wmWaterSelector'];
  $wmContainer  = $row['wmContainer'];
  $wmMecSpecDesign  = $row['wmMecSpecDesign'];
  $wmTMS  = $row['wmTMS'];
  $wmPMS  = $row['wmPMS'];
  $wmSMS  = $row['wmSMS'];
  $wmTMW  = $row['wmTMW'];
  $wmPMW  = $row['wmPMW'];
  $wmSMW  = $row['wmSMW'];
  $wmCycSpecDesign  = $row['wmCycSpecDesign'];
  $rv_id  = $row['rv_id'];
  $rv_name  = $row['rv_name'];
  $wv_id  = $row['wv_id'];
  $wv_name  = $row['wv_name'];
  $wmRF = $row['wmRF'];
  $wmRC = $row['wmRC'];
  $wmRP = $row['wmRP'];
  $wmElecSpecDesign = $row['wmElecSpecDesign'];
}

?>


<!--############################################################ SPEC ARTWORK ############################################################-->

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
          <option value="<?php echo $color_id ?>"><?php echo $color_name ?></option>
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

      <div class="col_6 area2">Material Body</div>
      <div class="col_6 area3"><input class="input1" type="text" id="spec_matbody" placeholder=""/></div>

      <div class="col_6 area2">Material Drum</div>
      <div class="col_6 area3"><input class="input1" type="text" id="spec_matdrum" placeholder=""/></div>





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
      <div class="col_6 area4"><input type="number" id="spec_prdw" placeholder="Width" /></div>
      <div class="col_6 area4"><input type="number" id="spec_prdd" placeholder="Depth" /></div>
      <div class="col_6 area4"><input type="number" id="spec_prdh" placeholder="Height" /></div>
      <div class="col_6 area4">mm</div>

      <div class="col_6 area2">Packing - WDH</div>
      <div class="col_6 area4"><input type="number" id="spec_pacw" placeholder="Width" /></div>
      <div class="col_6 area4"><input type="number" id="spec_pacd" placeholder="Depth" /></div>
      <div class="col_6 area4"><input type="number" id="spec_pach" placeholder="Height" /></div>
      <div class="col_6 area4">mm</div>

      <div class="col_6 area2">Volume (Net/Gross)</div>
      <div class="col_6 area4"><input type="number" id="spec_volumenett" placeholder="Net" /></div>
      <div class="col_6 area4"><input type="number" id="spec_volumegross" placeholder="Gross" /></div>
      <div class="col_6 area4">Kg</div>

      <div class="col_6 area2">Weight (Net/Gross)</div>
      <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net" /></div>
      <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross" /></div>
      <div class="col_6 area4">Kg</div>

      <div class="col_6 area2">Water Selector</div>
      <div class="col_6 area3">
        <select id="spec_waterselect" name="spec_waterselect" class="input1">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select>
      </div>

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

      <div class="col_12"><b>Motor Spin</b></div>
      <div class="col_5 ">Type</div>
      <div class="col_7 "><input type="text" id="new_spintype" /></div>


      <div class="col_5 ">Power</div>
      <div class="col_5 "><input type="number" id="new_spinpower" /></div>
      <div class="col_2 ">W</div>

      <div class="col_5 ">Speed</div>
      <div class="col_5 "><input type="number" id="new_spinspeed" /></div>
      <div class="col_2 ">rpm</div>

      <div class="col_12"><b>Motor Wash</b></div>
      <div class="col_5 ">Type</div>
      <div class="col_7 "><input type="text" id="new_washtype" /></div>


      <div class="col_5 ">Power</div>
      <div class="col_5 "><input type="number" id="new_washpower" /></div>
      <div class="col_2 ">W</div>

      <div class="col_5 ">Speed</div>
      <div class="col_5 "><input type="number" id="new_washspeed" /></div>
      <div class="col_2 ">rpm</div>

      <div class="col_12">&nbsp;</div>


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

        <div class="col_12">&nbsp;</div>

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
        <div class="col_6"><button class="buttonnext" id="savespecwm"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

        <div class="col_12">&nbsp;</div>

      </div>
    </table>
  </div> -->


<!-- SCRIPT BUAT MASUKIN DATA SPEC WM  -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#spec_color').val(<?php echo $color_id ?>);
    $('#spec_matbody').val("<?php echo $wmMB ?>");
    $('#spec_matdrum').val("<?php echo $wmMD ?>");
    $('#spec_stsdim').val(<?php echo $dimension_id ?>);
    $('#spec_prdw').val(<?php echo $wmPrdW ?>);
    $('#spec_prdd').val(<?php echo $wmPrdD ?>);
    $('#spec_prdh').val(<?php echo $wmPrdH ?>);
    $('#spec_pacw').val(<?php echo $wmPackW ?>);
    $('#spec_pacd').val(<?php echo $wmPackD ?>);
    $('#spec_pach').val(<?php echo $wmPackH ?>);
    $('#spec_volumenett').val(<?php echo $wmVolN ?>);
    $('#spec_volumegross').val(<?php echo $wmVolG ?>);
    $('#spec_weightnett').val(<?php echo $wmWeightN ?>);
    $('#spec_weightgross').val(<?php echo $wmWeightG ?>);
    $('#spec_waterselect').val("<?php echo $wmWaterSelector ?>");
    $('#spec_container').val(<?php echo $wmContainer ?>);
    $('#new_spintype').val("<?php echo $wmTMS ?>");
    $('#new_spinpower').val(<?php echo $wmPMS ?>);
    $('#new_spinspeed').val(<?php echo $wmSMS ?>);
    $('#new_washtype').val("<?php echo $wmTMW ?>");
    $('#new_washpower').val(<?php echo $wmPMW ?>);
    $('#new_washspeed').val(<?php echo $wmSMW ?>);
    $('#spec_rv').val(<?php echo $rv_id ?>);
    $('#spec_wv').val(<?php echo $wv_id ?>);
    $('#new_rf').val(<?php echo $wmRF; ?>);
    $('#new_rc').val(<?php echo $wmRC ?>);
    $('#new_rp').val(<?php echo $wmRP ?>);
  });
</script>