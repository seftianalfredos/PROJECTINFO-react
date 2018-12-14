<!--################################################################################### SPEC ARTWORK ###################################################################################-->

          <div id="tab_spec_art" class="tab-content">
            <table class="psi_width1000" border="0">
              <div class="col_6 area1">

                <div class="col_12"><input class="input2" type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>
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

                <div class="col_6 area2">Material Body</div>
                <div class="col_6 area3"><input class="input1" type="text" id="spec_matbody" placeholder="" /></div>

                <div class="col_6 area2">Material Drum</div>
                <div class="col_6 area3"><input class="input1" type="text" id="spec_matdrum" placeholder="" /></div>




                
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

                <div class="col_6 area2">Volume (Net/Gross)</div>
                <div class="col_6 area4"><input type="number" id="spec_volumenett" placeholder="Net"/></div>
                <div class="col_6 area4"><input type="number" id="spec_volumegross" placeholder="Gross" /></div>
                <div class="col_6 area4">Kg</div>

                <div class="col_6 area2">Weight (Net/Gross)</div>
                <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net"/></div>
                <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross" /></div>
                <div class="col_6 area4">Kg</div>

                <div class="col_6 area2">Water Selector</div>
                <div class="col_6 area3">
                  <select id="spec_waterselect" name="spec_waterselect" class="input1">
                    <option value="NO">--</option>          
                    <option>YES</option>
                    <option>NO</option>
                  </select>
                </div>

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
                <div class="col_8"><button class="psi_button1" id="savespecwm"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Save All Product Specification</button></div>
                <div class="col_1"></div>
                <div class="col_1"><button class="psi_button2cancel" id="cancelback5"><i class="fa fa-remove fa-sm" style="color: #700;"></i>&nbsp;&nbsp;Cancel</button></div>
                <!--<div class="col_12">&nbsp;</div>-->

                <div class="col_12">&nbsp;</div>

              </div>
            </table>
          </div>