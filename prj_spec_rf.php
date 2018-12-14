<!--################################################################################### SPEC ARTWORK ###################################################################################-->

          <div id="tab_spec_art" class="tab-content">
            <table class="psi_width1000" border="0">
              <div class="col_6 area1">

                <div class="col_12"><input class="input2" type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>
                <div class="col_12"><b>Door</b></div>
                <div class="col_6 area2">Color</div>
                <div class="col_6 area3">
                  <select id="spec_color" name="spec_color" class="input1">
                    <?php
                    include 'config.php';
                    $stmt = $DBcon->prepare("SELECT *FROM table_color ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_pattern ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_finishing ORDER BY name ASC");
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
                <div class="col_6 area3"><input class="input2" type="text" id="new_linermat" /></div>
                <div class="col_6 area2">Interior Matterial</div>
                <div class="col_6 area3"><input class="input2" type="text" id="new_intmat" /></div>
                <div class="col_6 area2">Stamping</div>
                <div class="col_6 area3"><input class="input2" type="text" id="new_stamping" /></div>
                <div class="col_6 area2">Egg Pocket</div>
                <div class="col_6 area3"><input class="input1" type="number" id="new_eggpocket" /></div>
                <div class="col_6 area2">Egg Holder</div>
                <div class="col_6 area3"><input class="input1" type="number" id="new_egghold" /></div>
                <div class="col_6 area2">Utility Pocket</div>
                <div class="col_6 area3"><input class="input1" type="number" id="new_utility" /></div>
                <div class="col_6 area2">Bootle Pocket</div>
                <div class="col_6 area3"><input class="input1" type="number" id="new_bootle" /></div>
                
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
                    <option value="NO">--</option>          
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>
                <div class="col_6 area2">Handle Type</div>
                <div class="col_6 area3">
                  <select id="spec_handletype" name="spec_handletype" class="input2">
                    <?php
                    include 'config.php';

                    $stmt = $DBcon->prepare("SELECT *FROM table_handle ORDER BY name ASC");
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
                    <option value="NO">--</option>          
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>
                <div class="col_6 area2">Water Dispenser</div>
                <div class="col_6 area3">
                  <select id="spec_waterdis" name="spec_waterdis" class="input1">
                    <option value="NO">--</option>          
                    <option>YES</option>
                    <option>NO</option>
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
                <div class="col_6 area2"><i class="fa fa-upload fa-sm backicon"></i> Spec Design</div>
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
            <table class="psi_width1000" border="0">
              <div class="col_6 area1">

                <div class="col_12"><b>Dimension</b></div>
                <div class="col_6 area2">Status</div>
                <div class="col_6 area3">
                  <select id="spec_stsdim" name="spec_stsdim" class="input1">
                    <?php
                    include 'config.php';

                    $stmt = $DBcon->prepare("SELECT *FROM table_dimension ORDER BY name ASC");
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
                <div class="col_6 area4"><input type="number" id="spec_prdd" placeholder="Depth" /></div>
                <div class="col_6 area4"><input type="number" id="spec_prdh" placeholder="Height" /></div>
                <div class="col_6 area4">mm</div>

                <div class="col_6 area2">Packing - WDH</div>
                <div class="col_6 area4"><input type="number" id="spec_pacw" placeholder="Width"/></div>
                <div class="col_6 area4"><input type="number" id="spec_pacd" placeholder="Depth" /></div>
                <div class="col_6 area4"><input type="number" id="spec_pach" placeholder="Height" /></div>
                <div class="col_6 area4">mm</div>

                <div class="col_6 area2">Packing Name</div>
                <div class="col_6 area3">
                  <select id="spec_pacname" name="spec_pacname" class="input2">
                    <?php
                    include 'config.php';

                    $stmt = $DBcon->prepare("SELECT *FROM table_packing ORDER BY name ASC");
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
                <div class="col_6 area4"><input type="number" id="spec_volumegross" placeholder="Gross" /></div>
                <div class="col_6 area4">Kg</div>

                <div class="col_6 area2">Weight (Net/Gross)</div>
                <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net"/></div>
                <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross" /></div>
                <div class="col_6 area4">Kg</div>

                <div class="col_6 area2">Container (40HQ)</div>
                <div class="col_6 area3"><input class="input1" type="number" id="spec_container" placeholder="" /></div>

                <div class="col_12">&nbsp;</div>
                <div class="col_6 area2"><i class="fa fa-upload fa-sm backicon"></i> Spec Design</div>
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
            <table class="psi_width1000" border="0">
              <div class="col_6 area1">

                <div class="col_5 ">Rollbond</div>
                <div class="col_5 ">
                  <select id="spec_rollb" name="spec_rollb" >
                    <?php
                    include 'config.php';

                    $stmt = $DBcon->prepare("SELECT *FROM table_rollbond ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_rollbondtype ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_temperature ORDER BY name ASC");
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
                    <option value="NO">--</option>          
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>
                <div class="col_2 ">&nbsp;</div>


                <div class="col_5 ">Climate Class</div>
                <div class="col_5 ">
                  <select id="spec_cliclass" name="spec_cliclass">
                    <?php
                    include 'config.php';

                    $stmt = $DBcon->prepare("SELECT *FROM table_climate ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_condensor ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_refrigerant ORDER BY name ASC");
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
                <div class="col_5 "><input type="number" id="new_MoR" /></div>
                <div class="col_2 ">&nbsp;</div>

                <div class="col_5 ">Rated Current</div>
                <div class="col_5 "><input type="number" id="new_rateCur" /></div>
                <div class="col_2 ">A</div>

                <div class="col_5 ">Rated Power</div>
                <div class="col_5 "><input type="number" id="new_ratePwr" /></div>
                <div class="col_2 ">W</div>

                <div class="col_5 ">Compressor</div>
                <div class="col_5 "><input type="text" id="new_compressor" /></div>
                <div class="col_2 ">&nbsp;</div>

                <div class="col_5 ">Cooling Capacity</div>
                <div class="col_5 "><input type="text" id="new_coolingCap" /></div>
                <div class="col_2 ">&nbsp;</div>

                <div class="col_5 ">Capillary Tube Dimension</div>
                <div class="col_5 "><input type="text" id="new_CTD"  /></div>
                <div class="col_2 ">&nbsp;</div>

                <div class="col_5 ">Freezing Temp</div>
                <div class="col_5 "><input type="text" id="new_freezTemp" /></div>
                <div class="col_2 ">&#176;C</div>

                <div class="col_5 ">Energy Consumption</div>
                <div class="col_5 "><input type="text" id="new_energyCons"  /></div>
                <div class="col_2 ">W</div>


                <div class="col_12">&nbsp;</div>
                <div class="col_5 "><i class="fa fa-upload fa-sm backicon"></i> Spec Design</div>
                <div class="col_7 "><input class="input2" type="file" id="new_cycSpec" accept=".pdf" /></div>

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
            <table class="psi_width1000" border="0">
              <div class="col_6 area1">

                <div class="col_5 ">Rated Voltage</div>
                <div class="col_5 ">
                  <select id="spec_rv" name="spec_rv" >
                    <?php
                    include 'config.php';

                    $stmt = $DBcon->prepare("SELECT *FROM table_rv ORDER BY name ASC");
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

                    $stmt = $DBcon->prepare("SELECT *FROM table_wv ORDER BY name ASC");
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
                <div class="col_5 "><input type="number" id="new_rf" /></div>
                <div class="col_2 ">Hz</div>

                <div class="col_5 ">Rated Current</div>
                <div class="col_5 "><input type="number" id="new_rc" /></div>
                <div class="col_2 ">A</div>

                <div class="col_5 ">Rated Power</div>
                <div class="col_5 "><input type="number" id="new_rp" /></div>
                <div class="col_2 ">W</div>

                <div class="col_5 ">Rated Power Heater</div>
                <div class="col_5 "><input type="number" id="new_rph" /></div>
                <div class="col_2 ">W</div>

                <div class="col_5 ">Rated Max Lamp</div>
                <div class="col_5 "><input type="number" id="new_rml" /></div>
                <div class="col_2 ">W</div>

                <div class="col_12">&nbsp;</div>
                <div class="col_5 "><i class="fa fa-upload fa-sm backicon"></i> Spec Design</div>
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

          <div id="tab_spec_save" class="tab-content">
            <table class="psi_width1000" border="0">
              <div class="col_6 area1">
                <div class="col_12">&nbsp;</div>
                <div class="col_8"><button class="psi_button1" id="savespecrf"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Save All Product Specification</button></div>
                <div class="col_1"></div>
                <div class="col_1"><button class="psi_button2cancel" id="cancelback5"><i class="fa fa-remove fa-sm" style="color: #700;"></i>&nbsp;&nbsp;Cancel</button></div>
                <!--<div class="col_12">&nbsp;</div>-->

                <div class="col_12">&nbsp;</div>

              </div>
            </table>
          </div>