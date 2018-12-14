<?php 
include 'config.php';

$specO_id         = '';
$type_id          = '';
$color_id         = '';
$color_name       = '';
$oArtSpecDesign   = '';
$dimension_id     = '';
$dimension_name   = '';
$oPrdW            = '';
$oPrdD            = '';
$oPrdH            = '';
$oPackW           = '';
$oPackD           = '';
$oPackH           = '';
$oVolN            = '';
$oVolG            = '';
$oWeightN         = '';
$oWeightG         = '';
$oContainer       = '';
$oMecSpecDesign   = '';
$oNote1           = '';
$oNote2           = '';
$oNote3           = '';
$oEC              = '';
$oCycSpecDesign   = '';
$rv_id            = '';
$rv_name          = '';
$wv_id            = '';
$wv_name          = '';
$oRF              = '';
$oRC              = '';
$oRP              = '';
$oElecSpecDesign  = '';

$stmt = $DBcon->prepare("
  SELECT
  tso.specO_id AS specO_id,
  tt.type_id AS type_id,
  tco.color_id AS color_id,
  tco.name AS color_name,
  tso.oArtSpecDesign AS oArtSpecDesign,
  tdi.dimension_id AS dimension_id,
  tdi.name AS dimension_name,
  tso.oPrdW AS oPrdW,
  tso.oPrdD AS oPrdD,
  tso.oPrdH AS oPrdH,
  tso.oPackW AS oPackW,
  tso.oPackD AS oPackD,
  tso.oPackH AS oPackH,
  tso.oVolN AS oVolN,
  tso.oVolG AS oVolG,
  tso.oWeightN AS oWeightN,
  tso.oWeightG AS oWeightG,
  tso.oContainer AS oContainer,
  tso.oMecSpecDesign AS oMecSpecDesign,
  tso.oNote1 AS oNote1,
  tso.oNote2 AS oNote2,
  tso.oNote3 AS oNote3,
  tso.oEC AS oEC,
  tso.oCycSpecDesign AS oCycSpecDesign,
  trv.rv_id AS rv_id,
  trv.name AS rv_name,
  twv.wv_id AS wv_id,
  twv.name AS wv_name,
  tso.oRF AS oRF,
  tso.oRC AS oRC,
  tso.oRP AS oRP,
  tso.oElecSpecDesign AS oElecSpecDesign
  FROM table_specother tso 
  RIGHT JOIN table_type tt ON tso.type_id = tt.type_id
  LEFT JOIN table_color tco ON tso.color_id = tco.color_id
  LEFT JOIN table_dimension tdi ON tso.dimension_id = tdi.dimension_id
  LEFT JOIN table_rv trv ON tso.rv_id = trv.rv_id
  LEFT JOIN table_wv twv ON tso.wv_id = twv.wv_id
  WHERE tt.type_id = :type_id
  ");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $specO_id = $row['specO_id'];
  $type_id  = $row['type_id'];
  $color_id = $row['color_id'];
  $color_name = $row['color_name'];
  $oArtSpecDesign = $row['oArtSpecDesign'];
  $dimension_id = $row['dimension_id'];
  $dimension_name = $row['dimension_name'];
  $oPrdW  = $row['oPrdW'];
  $oPrdD  = $row['oPrdD'];
  $oPrdH  = $row['oPrdH'];
  $oPackW = $row['oPackW'];
  $oPackD = $row['oPackD'];
  $oPackH = $row['oPackH'];
  $oVolN  = $row['oVolN'];
  $oVolG  = $row['oVolG'];
  $oWeightN = $row['oWeightN'];
  $oWeightG = $row['oWeightG'];
  $oContainer = $row['oContainer'];
  $oMecSpecDesign = $row['oMecSpecDesign'];
  $oNote1 = $row['oNote1'];
  $oNote2 = $row['oNote2'];
  $oNote3 = $row['oNote3'];
  $oEC  = $row['oEC'];
  $oCycSpecDesign = $row['oCycSpecDesign'];
  $rv_id  = $row['rv_id'];
  $rv_name  = $row['rv_name'];
  $wv_id  = $row['wv_id'];
  $wv_name  = $row['wv_name'];
  $oRF  = $row['oRF'];
  $oRC  = $row['oRC'];
  $oRP  = $row['oRP'];
  $oElecSpecDesign  = $row['oElecSpecDesign'];
}


?>
<!--################################################################# SPEC ARTWORK #################################################################-->

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
      <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross"></div>
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

      <div class="col_5 ">Note 1</div>
      <div class="col_7 "><input type="text" id="new_note1"/></div>

      <div class="col_5 ">Note 2</div>
      <div class="col_7 "><input type="text" id="new_note2"/></div>

      <div class="col_5 ">Note 3</div>
      <div class="col_7 "><input type="text" id="new_note3"/></div>


      <div class="col_5 ">Energi Consumption</div>
      <div class="col_5 "><input type="number" id="new_energyCons"/></div>
      <div class="col_2 ">W</div>

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
<div class="col_6"><button class="buttonnext" id="savespecot"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

<div class="col_12">&nbsp;</div>

</div>
</table>
</div> -->


<!-- SCRIPT BUAT MASUKINN DATA SPEC OTHER DARI ID YANG DIKIRIM -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#spec_color').val(<?php echo $color_id ?>);
		$('#spec_stsdim').val(<?php echo $dimension_id ?>);
		$('#spec_prdw').val(<?php echo $oPrdW ?>);
		$('#spec_prdd').val(<?php echo $oPrdD ?>);
		$('#spec_prdh').val(<?php echo $oPrdH ?>);
		$('#spec_pacw').val(<?php echo $oPackW ?>);
		$('#spec_pacd').val(<?php echo $oPackD ?>);
		$('#spec_pach').val(<?php echo $oPackH ?>);
		$('#spec_volumenett').val(<?php echo $oVolN ?>);
		$('#spec_volumegross').val(<?php echo $oVolG ?>);
		$('#spec_weightnett').val(<?php echo $oWeightN ?>);
		$('#spec_weightgross').val(<?php echo $oWeightG ?>);
		$('#spec_container').val(<?php echo $oContainer ?>);
		$('#new_note1').val("<?php echo $oNote1 ?>");
		$('#new_note2').val("<?php echo $oNote2 ?>");
		$('#new_note3').val("<?php echo $oNote3 ?>");
		$('#new_energyCons').val(<?php echo $oEC ?>);
		$('#spec_rv').val(<?php echo $rv_id ?>);
		$('#spec_wv').val(<?php echo $wv_id ?>);
		$('#new_rf').val(<?php echo $oRF ?>);
		$('#new_rc').val(<?php echo $oRC ?>);
		$('#new_rp').val(<?php echo $oRP ?>);
	});
</script>