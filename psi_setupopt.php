<ul class="tabs left">
	<li><a href="#tabdataoption">Data</a></li>
</ul>
<div id="tabdataoption" class="tab-content">
	<table class="psi_width1000" border="0">
		<tr>
			<td>
				<div class="col_4 input_fields_wrap">

					<!--_____________________________________PLANT__________________________________________-->

					<div class="col_10 label" id="sub1" >Plant</div>
					<div class="col_1 addnewicon addplant"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>
					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_plant WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editPlant" class="fEdit listitem" name="<?php echo $row['plant_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delPlant" class="fa fa-trash fa-sm fDelete" name="<?php echo $row['plant_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--___________________________________FORMAT_____________________________________________-->

					<div class="col_10 label" id="sub2" >Format</div>
					<div class="col_1 addnewicon addformat"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>
					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_format WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editFormat" class="fEdit listitem" name="<?php echo $row['format_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delFormat" class="fa fa-trash fa-sm fDelete" name="<?php echo $row['format_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_________________________________MADE IN__________________________________________________-->
					<div class="col_10 label" id="sub3" >Made In</div>
					<div class="col_1 addnewicon addmade"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_madein WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editMadein" class="mEdit listitem" name="<?php echo $row['madein_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delMadein" class="fa fa-trash fa-sm mDelete" name="<?php echo $row['madein_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>        

					<!--________________________________COLOR_________________________________________________-->

					<div class="col_10 label" id="sub4" >Color</div>
					<div class="col_1 addnewicon addcolor"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_color WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editColor" class="cEdit listitem" name="<?php echo $row['color_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delColor" class="fa fa-trash fa-sm cDelete" name="<?php echo $row['color_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--__________________________________PATTERN______________________________________________-->

					<div class="col_10 label" id="sub5" >Pattern</div>
					<div class="col_1 addnewicon addpattern"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_pattern WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editPattern" class="pEdit2 listitem" name="<?php echo $row['pattern_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delPattern" class="fa fa-trash fa-sm pDelete2" name="<?php echo $row['pattern_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--____________________________________FINISHING____________________________________________-->

					<div class="col_10 label" id="sub6" >Finishing</div>
					<div class="col_1 addnewicon addfinishing"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_finishing WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editFinishing" class="fEdit2 listitem" name="<?php echo $row['finishing_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delFinishing" class="fa fa-trash fa-sm fDelete2" name="<?php echo $row['finishing_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--________________________________HANDLE________________________________________________-->

					<div class="col_10 label" id="sub7" >Handle Type</div>
					<div class="col_1 addnewicon addhadletype"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_handle WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editHandle" class="hEdit listitem" name="<?php echo $row['handle_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delHandle" class="fa fa-trash fa-sm hDelete" name="<?php echo $row['handle_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--__________________________________RACK_______________________________________________-->

					<div class="col_10 label" id="sub8" >Rack</div>
					<div class="col_1 addnewicon addrack"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_rack WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editRack" class="rEdit listitem" name="<?php echo $row['rack_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delRack" class="fa fa-trash fa-sm rDelete" name="<?php echo $row['rack_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>



				</div>


				<div class="col_4">

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub9" >Status (Dimension)</div>
					<div class="col_1 addnewicon addstsdim"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_dimension WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editDimension" class="dEdit listitem" name="<?php echo $row['dimension_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delDimension" class="fa fa-trash fa-sm dDelete" name="<?php echo $row['dimension_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub10" >Packing Name</div>
					<div class="col_1 addnewicon addpackingname"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_packing WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editPacking" class="pEdit3 listitem" name="<?php echo $row['packing_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delPacking" class="fa fa-trash fa-sm pDelete3" name="<?php echo $row['packing_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub11" >Rollbond</div>
					<div class="col_1 addnewicon addrollbound"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_rollbond WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editRollbond" class="rEdit2 listitem" name="<?php echo $row['rollbond_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delRollbond" class="fa fa-trash fa-sm rDelete2" name="<?php echo $row['rollbond_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub12" >Rollbond Type</div>
					<div class="col_1 addnewicon addrollboundtype"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_rollbondtype WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editRollbondtype" class="rEdit3 listitem" name="<?php echo $row['rollbondtype_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delRollbondtype" class="fa fa-trash fa-sm rDelete3" name="<?php echo $row['rollbondtype_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub13" >Temperature Control</div>
					<div class="col_1 addnewicon addtempctrl"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_temperature WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editTemperature" class="tEdit listitem" name="<?php echo $row['temperature_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delTemperature" class="fa fa-trash fa-sm tDelete" name="<?php echo $row['temperature_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub14" >Climate Class</div>
					<div class="col_1 addnewicon addclimate"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_climate WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editClimate" class="cEdit listitem" name="<?php echo $row['climate_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delClimate" class="fa fa-trash fa-sm cDelete" name="<?php echo $row['climate_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub15" >Condensor</div>
					<div class="col_1 addnewicon addcondensor"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_condensor WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editCondensor" class="cEdit2 listitem" name="<?php echo $row['condensor_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delCondensor" class="fa fa-trash fa-sm cDelete2" name="<?php echo $row['condensor_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub16" >Refrigerant</div>
					<div class="col_1 addnewicon addrefrigerant"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_refrigerant WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editRefrigerant" class="rEdit4 listitem" name="<?php echo $row['refrigerant_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delRefrigerant" class="fa fa-trash fa-sm rDelete4" name="<?php echo $row['refrigerant_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub17" >Rated Voltage</div>
					<div class="col_1 addnewicon addratedv"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_rv WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editRv" class="rvEdit listitem" name="<?php echo $row['rv_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delRv" class="fa fa-trash fa-sm rvDelete" name="<?php echo $row['rv_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>

					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub18" >Wide Voltage</div>
					<div class="col_1 addnewicon addwvoltage"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_wv WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editWv" class="wvEdit listitem" name="<?php echo $row['wv_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delWv" class="fa fa-trash fa-sm wvDelete" name="<?php echo $row['wv_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>


					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub19" >Rated Frequency</div>
					<div class="col_1 addnewicon addratedf"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_rf WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['id'] ?>">
							<span id="editRf" class="rfEdit listitem" name="<?php echo $row['rf_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delRf" class="fa fa-trash fa-sm rfDelete" name="<?php echo $row['rf_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>





				</div>


				<div class="col_4">&nbsp;

					<div class="col_10 label" id="sub20" >Status Category</div>
					<div class="col_1 addnewicon addstacategory"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_stacategory");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['sc_id'] ?>">
							<span id="editSC" class="scEdit listitem" name="<?php echo $row['sc_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delSC" class="fa fa-trash fa-sm scDelete" name="<?php echo $row['sc_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>


					<!--_____________________________________________________________________________________________-->
					<div class="col_10 label" id="sub22" >Department</div>
					<div class="col_1 addnewicon adddepartement"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_department WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['sc_id'] ?>">
							<span id="editDep" class="depEdit listitem" name="<?php echo $row['DepartementID']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delDep" class="fa fa-trash fa-sm depDelete" name="<?php echo $row['DepartementID']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>



					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub21" >Class Product</div>
					<div class="col_1 addnewicon addcp"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_classproduct WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['cp_id'] ?>">
							<span id="editCP" class="cpEdit listitem" name="<?php echo $row['cp_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delCP" class="fa fa-trash fa-sm cpDelete" name="<?php echo $row['cp_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>



					<!--_____________________________________________________________________________________________-->

					<div class="col_10 label" id="sub23" >Category (Monitor)</div>
					<div class="col_1 addnewicon addcm"><i class="fa fa-plus-square fa-sm " style="color: #050;"></i></div>

					<?php
					include 'config.php';
					$query = $DBcon->prepare("SELECT * FROM table_categoryMonitor WHERE name NOT LIKE '--' ");
					$query->execute();
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
						?>
						<div class="col_9 item1" value="<?php echo $row['cm_id'] ?>">
							<span id="editCM" class="cmEdit listitem" name="<?php echo $row['cm_id']; ?>" value="<?php echo $row['name']; ?>">
								<?php echo $row['name'];?>
							</span>
						</div>
						<div class="col_1 itemicon"><i id="delCM" class="fa fa-trash fa-sm cmDelete" name="<?php echo $row['cm_id']; ?>" value="<?php echo $row['name']; ?>" style="color: #700;"></i></div>
						<div class="col_2 ">&nbsp;</div>
						<?php
					}
					?>
					<div class="col_12 ">&nbsp;</div>


				</div>

			</div>
		</td>
	</tr>
</table>

<script>
//String.prototype.toProperCase = function () {
//    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
//};
//inputPlaceholder: subitem.toProperCase()+" Code"    


$('.addplant').on('click', function(e){
	var subitem = $('#sub1').text();
	xyz(subitem);
});

$('.pEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.pDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addformat').on('click', function(e){
	var subitem = $('#sub2').text();
	xyz(subitem);
});

$('.fEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.fDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addmade').on('click', function(e){
	var subitem = $('#sub3').text();
	xyz(subitem);
});

$('.mEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.mDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addcolor').on('click', function(e){
	var subitem = $('#sub4').text();
	xyz(subitem);
});

$('.cEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.cDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addpattern').on('click', function(e){
	var subitem = $('#sub5').text();
	xyz(subitem);
});

$('.pEdit2').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.pDelete2').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addfinishing').on('click', function(e){
	var subitem = $('#sub6').text();
	xyz(subitem);
});

$('.fEdit2').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.fDelete2').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addhadletype').on('click', function(e){
	var subitem = $('#sub7').text();
	xyz(subitem);
});

$('.hEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.hDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addrack').on('click', function(e){
	var subitem = $('#sub8').text();
	xyz(subitem);
});

$('.rEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.rDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addstsdim').on('click', function(e){
	var subitem = $('#sub9').text();
	xyz(subitem);
});

$('.dEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.dDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addpackingname').on('click', function(e){
	var subitem = $('#sub10').text();
	xyz(subitem);
});

$('.pEdit3').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.pDelete3').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addrollbound').on('click', function(e){
	var subitem = $('#sub11').text();
	xyz(subitem);
});

$('.rEdit2').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.rDelete2').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});


$('.addrollboundtype').on('click', function(e){
	var subitem = $('#sub12').text();
	xyz(subitem);
});

$('.rEdit3').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.rDelete3').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addtempctrl').on('click', function(e){
	var subitem = $('#sub13').text();
	xyz(subitem);
});

$('.tEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.tDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addclimate').on('click', function(e){
	var subitem = $('#sub14').text();
	xyz(subitem);
});

$('.cEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.cDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addcondensor').on('click', function(e){
	var subitem = $('#sub15').text();
	xyz(subitem);
});

$('.cEdit2').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.cDelete2').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addrefrigerant').on('click', function(e){
	var subitem = $('#sub16').text();
	xyz(subitem);
});

$('.rEdit4').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.rDelete4').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addratedv').on('click', function(e){
	var subitem = $('#sub17').text();
	xyz(subitem);
});

$('.rvEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.rvDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addwvoltage').on('click', function(e){
	var subitem = $('#sub18').text();
	xyz(subitem);
});

$('.wvEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.wvDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addratedf').on('click', function(e){
	var subitem = $('#sub19').text();
	xyz(subitem);
});

$('.rfEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.rfDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addstacategory').on('click', function(e){
	var subitem = $('#sub20').text();
	xyz(subitem);
});

$('.scEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.scDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addcp').on('click', function(e){
	var subitem = $('#sub21').text();
	xyz(subitem);
});

$('.cpEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.cpDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.adddepartement').on('click', function(e){
	var subitem = $('#sub22').text();
	xyz(subitem);
});

$('.depEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.depDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

$('.addcm').on('click', function(e){
	var subitem = $('#sub23').text();
	xyz(subitem);
});

$('.cmEdit').on('click',function(e) {
	var $this = $(this);
	var idVal       = $this.attr("name");
	var subVal      = $this.attr("id");
	var nameVal     = $this.attr("value");
	edit(idVal,subVal,nameVal);
});

$('.cmDelete').on('click',function(e) {
	var $this = $(this);
	var idVal      = $this.attr("name");
	var subVal     = $this.attr("id");
	var nameVal    = $this.attr("value");
	del(idVal,subVal,nameVal);
});

function xyz(subitem) {
	swal({
		title: "", 
		text: "Add New Item to "+subitem+" Option List :", 
		type: "input",
		showCancelButton: true, 
		closeOnConfirm: false, 
		inputPlaceholder: subitem
	},
	function(inputValue){
		if (inputValue === false)
			return false;
		if (inputValue === ""){ 
			swal.showInputError("You need to write something!"); 
			return false 
		}

		$.ajax({
			url       : "_ajaxaddnewoption.php",
			cache     : false,
			async     : true,
			type      : "POST",
			dataType  : "text",
			data: {
				name: inputValue,
				sub: subitem
			},
			success: function () {
				swal({   
					title   : "Done!",
					text    : " "+inputValue+" was succesfully added!",
					icon    : "success",
					type    : "success"
				}, function(){
					window.location.hash = "TabOption";
					location.reload(true);
				});
			}
		});
	});
}

function edit(idVal,subVal,nameVal){
	swal({
		title             : "", 
		text              : "Edit Option List :", 
		type              : "input",
		showCancelButton  : true, 
		closeOnConfirm    : false, 
		inputValue        : nameVal
	},
	function(inputValue){
		if (inputValue === false)
			return false;
		if (inputValue === ""){ 
			swal.showInputError("You need to write something!"); 
			return false 
		}

		$.ajax({
			url       : "_ajaxeditoption.php",
			cache     : false,
			async     : true,
			type      : "POST",
			dataType  : "text",
			data: {
				name    : inputValue,
				sub     : subVal,
				id      : idVal
			},
			success: function () {
				swal({   
					title   : "Done!",
					text    : " "+nameVal+" was succesfully edited to " + inputValue,
					icon    : "success",
					type    : "success"
				}, function(){
					window.location.hash = "TabOption";
					location.reload(true);
				});
			}
		});
	});
}


function del(idVal,subVal,nameVal) {
	$.ajax({
		type 		: "POST",
		dataType	: "JSON",
		data 		: {
			idVal  : idVal,
			subVal : subVal 
		},
		success : function(data) {
			swal({
				title             : "Perhatian",
				text              : "Hapus Item  : "+nameVal+" dari database?",
				showCancelButton  : true, 
				confirmButtonColor: "#DD6B55",
				confirmButtonText : "Ya, Hapus saja!",
				cancelButtonText  : "Batalkan",
				closeOnConfirm    : false,
				closeOnCancel     : false
			},function(isConfirm) {
				if (isConfirm){
					if (data['Status'] == "NO") {
						swal({
							showConfirmButton : false,
							title : "Gagal",
							text  : "Tidak dapat dihapus karena data telah digunakan.",
							icon  : "error",
							type  : "error",
							timer : 2000
						});
					}else{
						$.ajax({
							type  : "POST",
							url   : "_ajaxdeloption.php",
							cache : false,
							async : true,
							data  : {
								name    : nameVal,
								sub     : subVal,
								id      : idVal
							},
							success: function(){
								swal({   
									title: "Berhasil",
									text : nameVal + " berhasil dihapus",
									type : "success"  
								}, function(){
									window.location.hash = "TabOption";
									location.reload(true);
								})
							},
							error: function(){
								swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
							}
						});
					}
				}else{
					swal("Dibatalkan !", "", "error");
				}	
			});
		}
	});
}

</script>