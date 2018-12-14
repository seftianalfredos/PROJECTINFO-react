<?php 
include 'config.php';

$specWD_id			=	'';
$type_id			=	'';
$color_id			=	'';
$color_name			=	'';
$wdArtSpecDesign	=	'';
$dimension_id		=	'';
$dimension_name		=	'';
$wdPrdW				=	'';
$wdPrdD				=	'';
$wdPrdH				=	'';
$wdPackW			=	'';
$wdPackD			=	'';
$wdPackH			=	'';
$wdVolN				=	'';
$wdVolG				=	'';
$wdWeightN			=	'';
$wdWeightG			=	'';
$wdContainer		=	'';
$wdMecSpecDesign	=	'';
$rollbond_id		=	'';
$rollbond_name		=	'';
$rollbondtype_id	=	'';
$rollbondtype_name	=	'';
$climate_id			=	'';
$climate_name		=	'';
$condensor_id		=	'';
$condensor_name		=	'';
$refrigerant_id		=	'';
$refrigerant_name	=	'';
$wdMoR				=	'';
$wdRC				=	'';
$wdRP				=	'';
$wdCompressor		=	'';
$wdCoolCap			=	'';
$wdCapTube			=	'';
$wdCoolTemp			=	'';
$wdHotTemp			=	'';
$wdNetralTemp		=	'';
$wdEC				=	'';
$wdCycSpecDesign	=	'';
$rv_id				=	'';
$rv_name			=	'';
$wv_id				=	'';
$wv_name			=	'';
$wdRF				=	'';
$wdRtdCurr			=	'';
$wdRtdPwr			=	'';
$wdRPH				=	'';
$wdElecSpecDesign	=	'';


$stmt	=	$DBcon->prepare("
	SELECT
	tsd.specWD_id AS specWD_id,
	tt.type_id AS type_id,
	tco.color_id AS color_id,
	tco.name AS color_name,
	tsd.wdArtSpecDesign AS wdArtSpecDesign,
	tdi.dimension_id AS dimension_id,
	tdi.name AS dimension_name,
	tsd.wdPrdW AS wdPrdW,
	tsd.wdPrdD AS wdPrdD,
	tsd.wdPrdH AS wdPrdH,
	tsd.wdPackW AS wdPackW,
	tsd.wdPackD AS wdPackD,
	tsd.wdPackH AS wdPackH,
	tsd.wdVolN AS wdVolN,
	tsd.wdVolG AS wdVolG,
	tsd.wdWeightN AS wdWeightN,
	tsd.wdWeightG AS wdWeightG,
	tsd.wdContainer AS wdContainer,
	tsd.wdMecSpecDesign AS wdMecSpecDesign,
	tro.rollbond_id AS rollbond_id,
	tro.name AS rollbond_name,
	trt.rollbondtype_id AS rollbondtype_id,
	trt.name AS rollbondtype_name,
	tcl.climate_id AS climate_id,
	tcl.name AS climate_name,
	tcn.condensor_id AS condensor_id,
	tcn.name AS condensor_name,
	tre.refrigerant_id AS refrigerant_id,
	tre.name AS refrigerant_name,
	tsd.wdMoR AS wdMoR,
	tsd.wdRC AS wdRC,
	tsd.wdRP AS wdRP,
	tsd.wdCompressor AS wdCompressor,
	tsd.wdCoolCap AS wdCoolCap,
	tsd.wdCapTube AS wdCapTube,
	tsd.wdCoolTemp AS wdCoolTemp,
	tsd.wdHotTemp AS wdHotTemp,
	tsd.wdNetralTemp AS wdNetralTemp,
	tsd.wdEC AS wdEC,
	tsd.wdCycSpecDesign AS wdCycSpecDesign,
	trv.rv_id AS rv_id,
	trv.name AS rv_name,
	twv.wv_id AS wv_id,
	twv.name AS wv_name,
	tsd.wdRF AS wdRF,
	tsd.wdRtdCurr AS wdRtdCurr,
	tsd.wdRtdPwr AS wdRtdPwr,
	tsd.wdRPH AS wdRPH,
	tsd.wdElecSpecDesign AS wdElecSpecDesign
	FROM table_specwd tsd
	RIGHT JOIN table_type tt ON tsd.type_id = tt.type_id
	LEFT JOIN table_color tco ON tsd.color_id = tco.color_id
	LEFT JOIN table_dimension tdi ON tsd.dimension_id = tdi.dimension_id
	LEFT JOIN table_rollbond tro ON tsd.rollbond_id = tro.rollbond_id
	LEFT JOIN table_rollbondtype trt ON tsd.rollbondtype_id = trt.rollbondtype_id
	LEFT JOIN table_climate tcl ON tsd.climate_id = tcl.climate_id
	LEFT JOIN table_condensor tcn ON tsd.condensor_id = tcn.condensor_id
	LEFT JOIN table_refrigerant tre ON tsd.refrigerant_id = tre.refrigerant_id
	LEFT JOIN table_rv trv ON tsd.rv_id = trv.rv_id
	LEFT JOIN table_wv twv ON tsd.wv_id = twv.wv_id
	WHERE tt.type_id = :type_id
	");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$specWD_id	=	$row['specWD_id'];
	$type_id	=	$row['type_id'];
	$color_id	=	$row['color_id'];
	$color_name	=	$row['color_name'];
	$wdArtSpecDesign	=	$row['wdArtSpecDesign'];
	$dimension_id	=	$row['dimension_id'];
	$dimension_name	=	$row['dimension_name'];
	$wdPrdW	=	$row['wdPrdW'];
	$wdPrdD	=	$row['wdPrdD'];
	$wdPrdH	=	$row['wdPrdH'];
	$wdPackW	=	$row['wdPackW'];
	$wdPackD	=	$row['wdPackD'];
	$wdPackH	=	$row['wdPackH'];
	$wdVolN	=	$row['wdVolN'];
	$wdVolG	=	$row['wdVolG'];
	$wdWeightN	=	$row['wdWeightN'];
	$wdWeightG	=	$row['wdWeightG'];
	$wdContainer	=	$row['wdContainer'];
	$wdMecSpecDesign	=	$row['wdMecSpecDesign'];
	$rollbond_id	=	$row['rollbond_id'];
	$rollbond_name	=	$row['rollbond_name'];
	$rollbondtype_id	=	$row['rollbondtype_id'];
	$rollbondtype_name	=	$row['rollbondtype_name'];
	$climate_id	=	$row['climate_id'];
	$climate_name	=	$row['climate_name'];
	$condensor_id	=	$row['condensor_id'];
	$condensor_name	=	$row['condensor_name'];
	$refrigerant_id	=	$row['refrigerant_id'];
	$refrigerant_name	=	$row['refrigerant_name'];
	$wdMoR	=	$row['wdMoR'];
	$wdRC	=	$row['wdRC'];
	$wdRP	=	$row['wdRP'];
	$wdCompressor	=	$row['wdCompressor'];
	$wdCoolCap	=	$row['wdCoolCap'];
	$wdCapTube	=	$row['wdCapTube'];
	$wdCoolTemp	=	$row['wdCoolTemp'];
	$wdHotTemp	=	$row['wdHotTemp'];
	$wdNetralTemp	=	$row['wdNetralTemp'];
	$wdEC	=	$row['wdEC'];
	$wdCycSpecDesign	=	$row['wdCycSpecDesign'];
	$rv_id	=	$row['rv_id'];
	$rv_name	=	$row['rv_name'];
	$wv_id	=	$row['wv_id'];
	$wv_name	=	$row['wv_name'];
	$wdRF	=	$row['wdRF'];
	$wdRtdCurr	=	$row['wdRtdCurr'];
	$wdRtdPwr	=	$row['wdRtdPwr'];
	$wdRPH	=	$row['wdRPH'];
	$wdElecSpecDesign	=	$row['wdElecSpecDesign'];
}


?>


<!--####################################################### SPEC ARTWORK #######################################################-->

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
					<option value="<?php echo $refrigerant_id ?>"><?php echo $refrigerant_name ?></option>
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
			<div class="col_5 "><input type="text" id="new_CTD" /></div>
			<div class="col_2 ">&nbsp;</div>

			<div class="col_5 ">Cooling Temp</div>
			<div class="col_5 "><input type="text" id="new_coolingTemp" /></div>
			<div class="col_2 ">&#176;C</div>

			<div class="col_5 ">Hot Temp</div>
			<div class="col_5 "><input type="text" id="new_hotTemp" /></div>
			<div class="col_2 ">&#176;C</div>

			<div class="col_5 ">Netral Temp</div>
			<div class="col_5 "><input type="text" id="new_netralTemp"/></div>
			<div class="col_2 ">&#176;C</div>

			<div class="col_5 ">Energy Consumption</div>
			<div class="col_5 "><input type="text" id="new_energyCons" /></div>
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

				<div class="col_5 ">Rated Power Heater</div>
				<div class="col_5 "><input type="number" id="new_rph"/></div>
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

<!--           <div id="tab_spec_save" class="tab-content">
<table class="psi_width7" border="0" align="left">
<div class="col_6 area1">
<div class="col_12">&nbsp;</div>
<div class="col_1 ">&nbsp;</div>
<div class="col_11 "><b>Save All your Product Specification ?</b></div>
<div class="col_12">&nbsp;</div>


<div class="col_6"><button class="buttoncancel" id="cancelback5"><i class="fa fa-remove fa-lg"></i>&nbsp;&nbsp;Cancel</button></div>
<div class="col_6"><button class="buttonnext" id="savespecwd"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

<div class="col_12">&nbsp;</div>

</div>
</table>
</div> -->


<!-- SCRIPT BUAT MASUKIN DATA SPEC WD BERDASARKAN TYPE ID YANG DILEMPAR -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#spec_color').val(<?php echo $color_id ?>);
		$('#spec_stsdim').val(<?php echo $dimension_id ?>);
		$('#spec_prdw').val(<?php echo $wdPrdW ?>);
		$('#spec_prdd').val(<?php echo $wdPrdD ?>);
		$('#spec_prdh').val(<?php echo $wdPrdH ?>);
		$('#spec_pacw').val(<?php echo $wdPackW ?>);
		$('#spec_pacd').val(<?php echo $wdPackD ?>);
		$('#spec_pach').val(<?php echo $wdPackH ?>);
		$('#spec_volumenett').val(<?php echo $wdVolN ?>);
		$('#spec_volumegross').val(<?php echo $wdVolG ?>);
		$('#spec_weightnett').val(<?php echo $wdWeightN ?>);
		$('#spec_weightgross').val(<?php echo $wdWeightG ?>);
		$('#spec_container').val(<?php echo $wdContainer ?>);
		$('#spec_rollb').val(<?php echo $rollbond_id ?>);
		$('#spec_rollbtype').val(<?php echo $rollbondtype_id ?>);
		$('#spec_cliclass').val(<?php echo $climate_id ?>);
		$('#spec_cond').val(<?php echo $condensor_id ?>);
		$('#spec_refri').val(<?php echo $refrigerant_id ?>);
		$('#new_MoR').val(<?php echo $wdMoR ?>);
		$('#new_rateCur').val(<?php echo $wdRtdCurr ?>);
		$('#new_ratePwr').val(<?php echo $wdRtdPwr ?>);
		$('#new_compressor').val("<?php echo $wdCompressor ?>");
		$('#new_coolingCap').val("<?php echo $wdCoolCap ?>");
		$('#new_CTD').val("<?php echo $wdCapTube ?>");
		$('#new_coolingTemp').val("<?php echo $wdCoolTemp ?>");
		$('#new_hotTemp').val("<?php echo $wdHotTemp ?>");
		$('#new_netralTemp').val("<?php echo $wdNetralTemp ?>");
		$('#new_energyCons').val("<?php echo $wdEC ?>");
		$('#spec_rv').val(<?php echo $rv_id ?>);
		$('#spec_wv').val(<?php echo $wv_id ?>);
		$('#new_rf').val(<?php echo $wdRF ?>);
		$('#new_rc').val(<?php echo $wdRC ?>);
		$('#new_rp').val(<?php echo $wdRP ?>);
		$('#new_rph').val(<?php echo $wdRPH ?>);
	});
</script>