<!--################################################################################### SPEC ARTWORK ###################################################################################-->

<div id="tab_spec_art" class="tab-content">
    <table class="psi_width1000" border="0">
        <div class="col_6 area1">

            <div class="col_12"><input class="input2" type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>
            <div class="col_6 area2">Body Color</div>
            <div class="col_6 area3">
                <select id="spec_color" name="spec_color" class="input1">
                    <?php
                    include 'config.php';
                    $stmt = $DBcon->prepare("SELECT *FROM table_color ORDER BY name ASC");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option><?php echo $row['name']; ?></option>
                        <?php 
                    } 
                    ?>   
                </select>
            </div>
            <div class="col_6 area2">Accessories Color</div>
            <div class="col_6 area3">
                <select id="acc_color" name="acc_color" class="input1">
                    <?php
                    include 'config.php';
                    $stmt = $DBcon->prepare("SELECT *FROM table_color ORDER BY name ASC");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option><?php echo $row['name']; ?></option>
                        <?php 
                    } 
                    ?>   
                </select>
            </div> 
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
            <!--<div class="col_3"><button class="buttoncancel" id="cancelback2"><i class="fa fa-remove fa-sm"></i>&nbsp;&nbsp;Cancel</button></div>-->
            <!--<div class="col_6">&nbsp;</div>-->
            <!-- <div class="col_3"><button class="buttonnext" id="nexttab2">Next&nbsp;&nbsp;<i class="fa fa-chevron-circle-right fa-sm"></i></button></div> -->

            <!--<div class="col_12">&nbsp;</div>-->
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
            <div class="col_12"><b>Dimension</b></div>

            <div class="col_12"><b>Indoor</b></div>
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

            <div class="col_6 area2">Weight (Net/Gross)</div>
            <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net"/></div>
            <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross" /></div>
            <div class="col_6 area4">Kg</div>

            <div class="col_12"><b>Outdoor</b></div>
            <div class="col_6 area2">Product - WDH</div>
            <div class="col_6 area4"><input type="number" id="spec_prdwo" placeholder="Width"/></div>
            <div class="col_6 area4"><input type="number" id="spec_prddo" placeholder="Depth" /></div>
            <div class="col_6 area4"><input type="number" id="spec_prdho" placeholder="Height" /></div>
            <div class="col_6 area4">mm</div>

            <div class="col_6 area2">Packing - WDH</div>
            <div class="col_6 area4"><input type="number" id="spec_pacwo" placeholder="Width"/></div>
            <div class="col_6 area4"><input type="number" id="spec_pacdo" placeholder="Depth" /></div>
            <div class="col_6 area4"><input type="number" id="spec_pacho" placeholder="Height" /></div>
            <div class="col_6 area4">mm</div>

            <div class="col_6 area2">Weight (Net/Gross)</div>
            <div class="col_6 area4"><input type="number" id="spec_weightnetto" placeholder="Net"/></div>
            <div class="col_6 area4"><input type="number" id="spec_weightgrosso" placeholder="Gross" /></div>
            <div class="col_6 area4">Kg</div>

            <div class="col_6 area2">Liquid Pipe Dia.</div>
            <div class="col_6 area4"><input type="text" id="spec_LPD" placeholder=""/></div>
            <div class="col_6 area4">inch</div>
            <div class="col_6 area4">&nbsp;</div>

            <div class="col_6 area2">Gas Pipe Dia.</div>
            <div class="col_6 area4"><input type="text" id="spec_GPD" placeholder=""/></div>
            <div class="col_6 area4">inch</div>
            <div class="col_6 area4">&nbsp;</div>

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
            <!--<div class="col_3"><button class="buttoncancel" id="cancelback3"><i class="fa fa-remove fa-sm"></i>&nbsp;&nbsp;Cancel</button></div>-->
            <!--<div class="col_6">&nbsp;</div>-->

            <!--<div class="col_12">&nbsp;</div>-->

            <div class="col_6 ">Cooling Capacity Test Result</div>
            <div class="col_5 "><input type="text" id="new_CCTRwatt" /></div>
            <div class="col_1 ">Watt</div>

            <div class="col_6 ">Cooling Capacity Test Result</div>
            <div class="col_5 "><input type="text" id="new_CCTRbtu" /></div>
            <div class="col_1 ">Btu/Hour</div>

            <div class="col_6 ">Rated Cooling Capacity</div>
            <div class="col_5 "><input type="text" id="new_RCCwatt" /></div>
            <div class="col_1 ">Watt</div>

            <div class="col_6 ">Rated Cooling Capacity</div>
            <div class="col_5 "><input type="text" id="new_RCCbtu" /></div>
            <div class="col_1 ">Btu/Hour</div>

            <div class="col_6 ">Eer Hasil Pengujian</div>
            <div class="col_5 "><input type="text" id="new_EerHasil" /></div>
            <div class="col_1 ">Btu/H/Watt</div>

            <div class="col_6 ">Konversi Ke Cop Hasil Pengujian</div>
            <div class="col_5 "><input type="text" id="new_Konversi" /></div>
            <div class="col_1 ">W/W</div>

            <div class="col_6 ">Eer Label</div>
            <div class="col_5 "><input type="text" id="new_EerLabel" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Refrigerant</div>
            <div class="col_5 ">
                <select id="spec_refrigerant" name="spec_refrigerant" class="input1">
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
                </select></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Refrigerant Weight</div>
            <div class="col_5 "><input type="text" id="new_refrigerant_w" /></div>
            <div class="col_1 ">gr</div>

            <div class="col_6 ">Compressor Type</div>
            <div class="col_5 "><input type="text" id="new_compressorType" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Compressor Model</div>
            <div class="col_5 "><input type="text" id="new_compressorModel" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Compressor Brand</div>
            <div class="col_5 "><input type="text" id="new_compressorBrand" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Expansion</div>
            <div class="col_5 "><input type="text" id="new_expansion" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Air Flow Volume</div>
            <div class="col_5 "><input type="text" id="new_AFV" /></div>
            <div class="col_1 ">M<sup>3</sup>/Hour</div>

            <div class="col_6 ">Outdoor Fan Motor</div>
            <div class="col_6 "><input type="text" id="new_OFM" /></div>


            <div class="col_6 ">Fan Motor Outdoor Type</div>
            <div class="col_5 "><input type="text" id="new_FMOT" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Condenser Type</div>
            <div class="col_5 "><input type="text" id="new_condensorType" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Evaporator Type</div>
            <div class="col_5 "><input type="text" id="new_evaporatorType" /></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Indoor Noise Level</div>
            <div class="col_5 "><input type="text" id="new_INL" /></div>
            <div class="col_1 ">dB</div>

            <div class="col_6 ">Outdoor Noise Level</div>
            <div class="col_5 "><input type="text" id="new_ONL" /></div>
            <div class="col_1 ">dB</div>

            <div class="col_12">&nbsp;</div>
            <div class="col_5 "><i class="fa fa-upload fa-sm backicon"></i> Spec Design</div>
            <div class="col_7 "><input class="input2" type="file" id="new_cycSpec" accept=".pdf" ></div>

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
                <!--<div class="col_3"><button class="buttoncancel" id="cancelback4"><i class="fa fa-remove fa-sm"></i>&nbsp;&nbsp;Cancel</button></div>-->
                <!--<div class="col_6">&nbsp;</div>-->

                <!--<div class="col_12">&nbsp;</div>-->

                <div class="col_6 ">Power Supply (Volt/Phase/Freq)</div>
                <div class="col_5 "><input type="text" id="new_acPwrSupply" /></div>
                <div class="col_1 "></div>

                <div class="col_6 ">Daya Masukan - Test</div>
                <div class="col_5 "><input type="text" id="new_testDM" /></div>
                <div class="col_1 ">W</div>

                <div class="col_6 ">Arus Masukan - Test</div>
                <div class="col_5 "><input type="text" id="new_testAM" /></div>
                <div class="col_1 ">A</div>

                <div class="col_6 ">Daya Masukan - Standard</div>
                <div class="col_5 "><input type="text" id="new_standartDM" /></div>
                <div class="col_1 ">W</div>

                <div class="col_6 ">Arus Masukan - Standard</div>
                <div class="col_5 "><input type="text" id="new_standartAM" /></div>
                <div class="col_1 ">A</div>

                <div class="col_6 ">Daya Pengenal - SNI IEC Test</div>
                <div class="col_5 "><input type="text" id="new_sltDP" /></div>
                <div class="col_1 ">W</div>

                <div class="col_6 ">Arus Pengenal - SNI IEC Test</div>
                <div class="col_5 "><input type="text" id="new_sltAP" /></div>
                <div class="col_1 ">A</div>

                <div class="col_6 ">Daya Pengenal - SNI IEC Label</div>
                <div class="col_5 "><input type="text" id="new_silDP" /></div>
                <div class="col_1 ">W</div>

                <div class="col_6 ">Arus Pengenal - SNI IEC Label</div>
                <div class="col_5 "><input type="text" id="new_silAP" /></div>
                <div class="col_1 ">A</div>

                <div class="col_6 ">Energy Consumption</div>
                <div class="col_5 "><input type="text" id="new_acEC" /></div>
                <div class="col_1 ">Kwh/8h</div>

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
                <div class="col_8"><button class="psi_button1" id="savespecac"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Save All Product Specification</button></div>
                <div class="col_1"></div>
                <div class="col_1"><button class="psi_button2cancel" id="cancelback5"><i class="fa fa-remove fa-sm" style="color: #700;"></i>&nbsp;&nbsp;Cancel</button></div>
                <!--<div class="col_12">&nbsp;</div>-->
                <!--<div class="col_6"><button class="buttoncancel" id="cancelback5"><i class="fa fa-remove fa-lg"></i>&nbsp;&nbsp;Cancel</button></div>-->
                <!--<div class="col_6"><button class="buttonnext" id="savespecac"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>-->


                <div class="col_12">&nbsp;</div>

            </div>
        </table>
    </div>