<?php 
include 'config.php';

$specAc_id          =   '';
$type_id            =   '';
$bodyColor          =   '';
$accColor           =   '';
$acArtSpecDesign    =   '';
$dimension_id       =   '';
$dimension_name     =   '';
$acIPrdW            =   '';
$acIPrdD            =   '';
$acIPrdH            =   '';
$acIPackW           =   '';
$acIPackD           =   '';
$acIPackH           =   '';
$acIWN              =   '';
$acIWG              =   '';
$acOPrdW            =   '';
$acOPrdD            =   '';
$acOPrdH            =   '';
$acOPackW           =   '';
$acOPackD           =   '';
$acOPackH           =   '';
$acOWN              =   '';
$acOWG              =   '';
$LPD                =   '';
$GPD                =   '';
$container          =   '';
$acMecSpecDesign    =   '';
$CCTRwatt           =   '';
$CCTRbtu            =   '';
$RCCwatt            =   '';
$RCCbtu             =   '';
$EerHasil           =   '';
$Konversi           =   '';
$EerLabel           =   '';
$refrigerant_id     =   '';
$refrigerant_name   =   '';
$refrigerant_w      =   '';
$compressorType     =   '';
$compressorModel    =   '';
$compressorBrand    =   '';
$expansion          =   '';
$AFV                =   '';
$OFM                =   '';
$FMOT               =   '';
$condensorType      =   '';
$evaporatorType     =   '';
$INL                =   '';
$ONL                =   '';
$acCycSpecDesign    =   '';
$acPwrSupply        =   '';
$testDM             =   '';
$testAm             =   '';
$standartDM         =   '';
$standartAM         =   '';
$sltDP              =   '';
$sltAP              =   '';
$silDP              =   '';
$silAP              =   '';
$acEC               =   '';
$acElecSpecDesign   =   '';

$stmt2 = $DBcon->prepare("
    SELECT
    tsa.specAc_id AS specAc_id,
    tt.type_id AS type_id,
    tsa.bodyColor AS bodyColor,
    tsa.accColor AS accColor,
    tsa.acArtSpecDesign AS acArtSpecDesign,
    td.dimension_id AS dimension_id,
    td.name AS dimension_name,
    tsa.acIPrdW AS acIPrdW,
    tsa.acIPrdD AS acIPrdD,
    tsa.acIPrdH AS acIPrdH,
    tsa.acIPackW AS acIPackW,
    tsa.acIPackD AS acIPackD,
    tsa.acIPackH AS acIPackH,
    tsa.acIWN AS acIWN,
    tsa.acIWG AS acIWG,
    tsa.acOPrdW AS acOPrdW,
    tsa.acOPrdD AS acOPrdD,
    tsa.acOPrdH AS acOPrdH,
    tsa.acOPackW AS acOPackW,
    tsa.acOPackD AS acOPackD,
    tsa.acOPackH AS acOPackH,
    tsa.acOWN AS acOWN,
    tsa.acOWG AS acOWG,
    tsa.LPD AS LPD,
    tsa.GPD AS GPD,
    tsa.container AS container,
    tsa.acMecSpecDesign AS acMecSpecDesign,
    tsa.CCTRwatt AS CCTRwatt,
    tsa.CCTRbtu AS CCTRbtu,
    tsa.RCCwatt AS RCCwatt,
    tsa.RCCbtu AS RCCbtu,
    tsa.EerHasil AS EerHasil,
    tsa.Konversi AS Konversi,
    tsa.EerLabel AS EerLabel,
    tr.refrigerant_id AS refrigerant_id,
    tr.name AS refrigerant_name,
    tsa.refrigerant_w AS refrigerant_w,
    tsa.compressorType AS compressorType,
    tsa.compressorModel AS compressorModel,
    tsa.compressorBrand AS compressorBrand,
    tsa.expansion AS expansion,
    tsa.AFV AS AFV,
    tsa.OFM AS OFM,
    tsa.FMOT AS FMOT,
    tsa.condensorType AS condensorType,
    tsa.evaporatorType AS evaporatorType,
    tsa.INL AS INL,
    tsa.ONL AS ONL,
    tsa.acCycSpecDesign AS acCycSpecDesign,
    tsa.acPwrSupply AS acPwrSupply,
    tsa.testDM AS testDM,
    tsa.testAm AS testAm,
    tsa.standartDM AS standartDM,
    tsa.standartAM AS standartAM,
    tsa.sltDP AS sltDP,
    tsa.sltAP AS sltAP,
    tsa.silDP AS silDP,
    tsa.silAP AS silAP,
    tsa.acEC AS acEC,
    tsa.acElecSpecDesign AS acElecSpecDesign
    FROM table_specac tsa JOIN table_type tt ON tsa.type_id = tt.type_id
    JOIN table_dimension td ON tsa.dimension_id = td.dimension_id
    JOIN table_refrigerant tr ON tsa.refrigerant_id = tr.refrigerant_id
    WHERE tt.type_id = :type_id
    ");
$stmt2->bindParam(':type_id', $vId);
$stmt2->execute();

while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $specAc_id          =   $row['specAc_id'];
    $type_id            =   $row['type_id'];
    $bodyColor          =   $row['bodyColor'];
    $accColor           =   $row['accColor'];
    $acArtSpecDesign    =   $row['acArtSpecDesign'];
    $dimension_id       =   $row['dimension_id'];
    $dimension_name     =   $row['dimension_name'];
    $acIPrdW            =   $row['acIPrdW'];
    $acIPrdD            =   $row['acIPrdD'];
    $acIPrdH            =   $row['acIPrdH'];
    $acIPackW           =   $row['acIPackW'];
    $acIPackD           =   $row['acIPackD'];
    $acIPackH           =   $row['acIPackH'];
    $acIWN              =   $row['acIWN'];
    $acIWG              =   $row['acIWG'];
    $acOPrdW            =   $row['acOPrdW'];
    $acOPrdD            =   $row['acOPrdD'];
    $acOPrdH            =   $row['acOPrdH'];
    $acOPackW           =   $row['acOPackW'];
    $acOPackD           =   $row['acOPackD'];
    $acOPackH           =   $row['acOPackH'];
    $acOWN              =   $row['acOWN'];
    $acOWG              =   $row['acOWG'];
    $LPD                =   $row['LPD'];
    $GPD                =   $row['GPD'];
    $container          =   $row['container'];
    $acMecSpecDesign    =   $row['acMecSpecDesign'];
    $CCTRwatt           =   $row['CCTRwatt'];
    $CCTRbtu            =   $row['CCTRbtu'];
    $RCCwatt            =   $row['RCCwatt'];
    $RCCbtu             =   $row['RCCbtu'];
    $EerHasil           =   $row['EerHasil'];
    $Konversi           =   $row['Konversi'];
    $EerLabel           =   $row['EerLabel'];
    $refrigerant_id     =   $row['refrigerant_id'];
    $refrigerant_name   =   $row['refrigerant_name'];
    $refrigerant_w      =   $row['refrigerant_w'];
    $compressorType     =   $row['compressorType'];
    $compressorModel    =   $row['compressorModel'];
    $compressorBrand    =   $row['compressorBrand'];
    $expansion          =   $row['expansion'];
    $AFV                =   $row['AFV'];
    $OFM                =   $row['OFM'];
    $FMOT               =   $row['FMOT'];
    $condensorType      =   $row['condensorType'];
    $evaporatorType     =   $row['evaporatorType'];
    $INL                =   $row['INL'];
    $ONL                =   $row['ONL'];
    $acCycSpecDesign    =   $row['acCycSpecDesign'];
    $acPwrSupply        =   $row['acPwrSupply'];
    $testDM             =   $row['testDM'];
    $testAm             =   $row['testAm'];
    $standartDM         =   $row['standartDM'];
    $standartAM         =   $row['standartAM'];
    $sltDP              =   $row['sltDP'];
    $sltAP              =   $row['sltAP'];
    $silDP              =   $row['silDP'];
    $silAP              =   $row['silAP'];
    $acEC               =   $row['acEC'];
    $acElecSpecDesign   =   $row['acElecSpecDesign'];
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
                <li title="Finish" id="btnfinish3c"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
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
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
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
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
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
                <li title="Finish" id="btnfinish3d"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
              </ul>
            </div>
            <!-- <div class="col_3"><button class="buttonnext" id="nexttab2">Next&nbsp;&nbsp;<i class="fa fa-chevron-circle-right fa-sm"></i></button></div> -->

            <div class="col_12">&nbsp;</div>
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
            <div class="col_12"><b>Dimension</b></div>

            <div class="col_12"><b>Indoor</b></div>
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

            <div class="col_6 area2">Weight (Net/Gross)</div>
            <div class="col_6 area4"><input type="number" id="spec_weightnett" placeholder="Net" /></div>
            <div class="col_6 area4"><input type="number" id="spec_weightgross" placeholder="Gross" /></div>
            <div class="col_6 area4">Kg</div>

            <div class="col_12"><b>Outdoor</b></div>
            <div class="col_6 area2">Product - WDH</div>
            <div class="col_6 area4"><input type="number" id="spec_prdwo" placeholder="Width" /></div>
            <div class="col_6 area4"><input type="number" id="spec_prddo" placeholder="Depth" /></div>
            <div class="col_6 area4"><input type="number" id="spec_prdho" placeholder="Height" /></div>
            <div class="col_6 area4">mm</div>

            <div class="col_6 area2">Packing - WDH</div>
            <div class="col_6 area4"><input type="number" id="spec_pacwo" placeholder="Width" /></div>
            <div class="col_6 area4"><input type="number" id="spec_pacdo" placeholder="Depth"  /></div>
            <div class="col_6 area4"><input type="number" id="spec_pacho" placeholder="Height"  /></div>
            <div class="col_6 area4">mm</div>

            <div class="col_6 area2">Weight (Net/Gross)</div>
            <div class="col_6 area4"><input type="number" id="spec_weightnetto" placeholder="Net" /></div>
            <div class="col_6 area4"><input type="number" id="spec_weightgrosso" placeholder="Gross" /></div>
            <div class="col_6 area4">Kg</div>

            <div class="col_6 area2">Liquid Pipe Diameter</div>
            <div class="col_6 area4"><input type="text" id="spec_LPD" placeholder="" /></div>
            <div class="col_6 area4">inch</div>
            <div class="col_6 area4">&nbsp;</div>

            <div class="col_6 area2">Gas Pipe Diameter</div>
            <div class="col_6 area4"><input type="text" id="spec_GPD" placeholder="" /></div>
            <div class="col_6 area4">inch</div>
            <div class="col_6 area4">&nbsp;</div>

            <div class="col_6 area2">Container (40HQ)</div>
            <div class="col_6 area3"><input class="input1" type="number" id="spec_container" placeholder="" /></div>

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

            <div class="col_6 ">Cooling Capacity Test Result</div>
            <div class="col_5 "><input type="number" id="new_CCTRwatt"/></div>
            <div class="col_1 ">Watt</div>

            <div class="col_6 ">Cooling Capacity Test Result</div>
            <div class="col_5 "><input type="number" id="new_CCTRbtu"/></div>
            <div class="col_1 ">Btu/Hour</div>

            <div class="col_6 ">Rated Cooling Capacity</div>
            <div class="col_5 "><input type="number" id="new_RCCwatt"/></div>
            <div class="col_1 ">Watt</div>

            <div class="col_6 ">Rated Cooling Capacity</div>
            <div class="col_5 "><input type="number" id="new_RCCbtu"/></div>
            <div class="col_1 ">Btu/Hour</div>

            <div class="col_6 ">Eer Hasil Pengujian</div>
            <div class="col_5 "><input type="number" id="new_EerHasil"/></div>
            <div class="col_1 ">Btu/H/Watt</div>

            <div class="col_6 ">Konversi Ke Cop Hasil Pengujian</div>
            <div class="col_5 "><input type="number" id="new_Konversi"/></div>
            <div class="col_1 ">W/W</div>

            <div class="col_6 ">Eer Label</div>
            <div class="col_5 "><input type="number" id="new_EerLabel"/></div>
            <div class="col_1 ">&nbsp;</div>

            <div class="col_6 ">Refrigerant</div>
            <div class="col_5 ">
                <select id="spec_refrigerant" name="spec_refrigerant" class="input1">
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
                </select></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Refrigerant Weight</div>
                <div class="col_5 "><input type="number" id="new_refrigerant_w"/></div>
                <div class="col_1 ">gr</div>

                <div class="col_6 ">Compressor Type</div>
                <div class="col_5 "><input type="text" id="new_compressorType"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Compressor Model</div>
                <div class="col_5 "><input type="text" id="new_compressorModel"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Compressor Brand</div>
                <div class="col_5 "><input type="text" id="new_compressorBrand"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Expansion</div>
                <div class="col_5 "><input type="text" id="new_expansion"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Air Flow Volume</div>
                <div class="col_5 "><input type="number" id="new_AFV"/></div>
                <div class="col_1 ">M<sup>3</sup>/Hour</div>

                <div class="col_6 ">Outdoor Fan Motor</div>
                <div class="col_6 "><input type="text" id="new_OFM"/></div>


                <div class="col_6 ">Fan Motor Outdoor Type</div>
                <div class="col_5 "><input type="text" id="new_FMOT"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Condenser Type</div>
                <div class="col_5 "><input type="text" id="new_condensorType"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Evaporator Type</div>
                <div class="col_5 "><input type="text" id="new_evaporatorType"/></div>
                <div class="col_1 ">&nbsp;</div>

                <div class="col_6 ">Indoor Noise Level</div>
                <div class="col_5 "><input type="text" id="new_INL"/></div>
                <div class="col_1 ">dB</div>

                <div class="col_6 ">Outdoor Noise Level</div>
                <div class="col_5 "><input type="text" id="new_ONL"/></div>
                <div class="col_1 ">dB</div>

                <div class="col_6 ">Cyc Spec Design</div>
                <div class="col_6 "><input class="input2" type="file" id="new_cycSpec" accept=".pdf" /></div>

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
                        <li title="Finish" id="btnfinish3b"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                      </ul>
                    </div>

                    <div class="col_12">&nbsp;</div>

                    <div class="col_6 ">Power Supply (Volt/Phase/Freq)</div>
                    <div class="col_5 "><input type="text" id="new_acPwrSupply"/></div>
                    <div class="col_1 "></div>

                    <div class="col_6 ">Daya Masukan - Test</div>
                    <div class="col_5 "><input type="number" id="new_testDM"/></div>
                    <div class="col_1 ">W</div>

                    <div class="col_6 ">Arus Masukan - Test</div>
                    <div class="col_5 "><input type="number" id="new_testAM"/></div>
                    <div class="col_1 ">A</div>

                    <div class="col_6 ">Daya Masukan - Standard</div>
                    <div class="col_5 "><input type="number" id="new_standartDM"/></div>
                    <div class="col_1 ">W</div>

                    <div class="col_6 ">Arus Masukan - Standard</div>
                    <div class="col_5 "><input type="number" id="new_standartAM"/></div>
                    <div class="col_1 ">A</div>

                    <div class="col_6 ">Daya Pengenal - SNI IEC Test</div>
                    <div class="col_5 "><input type="number" id="new_sltDP"/></div>
                    <div class="col_1 ">W</div>

                    <div class="col_6 ">Arus Pengenal - SNI IEC Test</div>
                    <div class="col_5 "><input type="number" id="new_sltAP"/></div>
                    <div class="col_1 ">A</div>

                    <div class="col_6 ">Daya Pengenal - SNI IEC Label</div>
                    <div class="col_5 "><input type="number" id="new_silDP"/></div>
                    <div class="col_1 ">W</div>

                    <div class="col_6 ">Arus Pengenal - SNI IEC Label</div>
                    <div class="col_5 "><input type="number" id="new_silAP"/></div>
                    <div class="col_1 ">A</div>

                    <div class="col_6 ">Energy Consumption</div>
                    <div class="col_5 "><input type="number" id="new_acEC"/></div>
                    <div class="col_1 ">Kwh/8h</div>

                    <div class="col_6 ">Electronic Spec Design</div>
                    <div class="col_6 "><input type="file" id="new_elecspec" accept=".pdf" /></div>

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

<!--         <div id="tab_spec_save" class="tab-content">
            <table class="psi_width7" border="0" align="left">
                <div class="col_6 area1">
                    <div class="col_12">&nbsp;</div>
                    <div class="col_1 ">&nbsp;</div>
                    <div class="col_11 "><b>Save All your Product Specification ?</b></div>
                    <div class="col_12">&nbsp;</div>


                    <div class="col_6"><button class="buttoncancel" id="cancelback5"><i class="fa fa-remove fa-lg"></i>&nbsp;&nbsp;Cancel</button></div>
                    <div class="col_6"><button class="buttonnext" id="savespecac"><i class="fa fa-save fa-lg"></i>&nbsp;&nbsp;Yes , Save</button></div>

                    <div class="col_12">&nbsp;</div>

                </div>
            </table>
        </div> -->


<!-- SCRIPT BUAT MASUKIN DATA YANG DIAMBIL DARI DATABASE -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#spec_color').val("<?php echo $bodyColor ?>");
        $('#acc_color').val("<?php echo $accColor ?>");
        $('#spec_stsdim').val(<?php echo $dimension_id ?>);
        $('#spec_prdw').val(<?php echo $acIPrdW ?>);
        $('#spec_prdd').val(<?php echo $acIPrdD ?>);
        $('#spec_prdh').val(<?php echo $acIPrdH ?>);
        $('#spec_pacw').val(<?php echo $acIPackW ?>);
        $('#spec_pacd').val(<?php echo $acIPackD ?>);
        $('#spec_pach').val(<?php echo $acIPackH ?>);
        $('#spec_weightnett').val(<?php echo $acIWN ?>);
        $('#spec_weightgross').val(<?php echo $acIWG ?>);
        $('#spec_prdwo').val(<?php echo $acOPrdW ?>);
        $('#spec_prddo').val(<?php echo $acOPrdD ?>);
        $('#spec_prdho').val(<?php echo $acOPrdH ?>);
        $('#spec_pacwo').val(<?php echo $acOPackW ?>);
        $('#spec_pacdo').val(<?php echo $acOPackD ?>);
        $('#spec_pacho').val(<?php echo $acOPackH ?>);
        $('#spec_weightnetto').val(<?php echo $acOWN ?>);
        $('#spec_weightgrosso').val(<?php echo $acOWG ?>);
        $('#spec_LPD').val(<?php echo $LPD ?>);
        $('#spec_GPD').val(<?php echo $GPD ?>);
        $('#spec_container').val(<?php echo $container ?>);
        $('#new_CCTRwatt').val(<?php echo $CCTRwatt ?>);
        $('#new_CCTRbtu').val(<?php echo $CCTRbtu ?>);
        $('#new_RCCwatt').val(<?php echo $RCCwatt ?>);
        $('#new_RCCbtu').val(<?php echo $RCCbtu ?>);
        $('#new_EerHasil').val(<?php echo $EerHasil ?>);
        $('#new_Konversi').val(<?php echo $Konversi ?>);
        $('#new_EerLabel').val(<?php echo $EerLabel ?>);
        $('#spec_refrigerant').val(<?php echo $refrigerant_id ?>);
        $('#new_refrigerant_w').val(<?php echo $refrigerant_w ?>);
        $('#new_compressorType').val("<?php echo $compressorType ?>");
        $('#new_compressorModel').val("<?php echo $compressorModel ?>");
        $('#new_compressorBrand').val("<?php echo $compressorBrand ?>");
        $('#new_expansion').val("<?php echo $expansion ?>");
        $('#new_AFV').val(<?php echo $AFV ?>);
        $('#new_OFM').val("<?php echo $OFM ?>");
        $('#new_FMOT').val("<?php echo $FMOT ?>");
        $('#new_condensorType').val("<?php echo $condensorType ?>");
        $('#new_evaporatorType').val("<?php echo $evaporatorType ?>");
        $('#new_INL').val("<?php echo $INL ?>");
        $('#new_ONL').val("<?php echo $ONL ?>");
        $('#new_acPwrSupply').val("<?php echo $acPwrSupply ?>");
        $('#new_testDM').val(<?php echo $testDM ?>);
        $('#new_testAM').val(<?php echo $testAm ?>);
        $('#new_standartDM').val(<?php echo $standartDM ?>);
        $('#new_standartAM').val(<?php echo $standartAM ?>);
        $('#new_sltDP').val(<?php echo $sltDP ?>);
        $('#new_sltAP').val(<?php echo $sltAP ?>);
        $('#new_silDP').val(<?php echo $silDP ?>);
        $('#new_silAP').val(<?php echo $silAP ?>);
        $('#new_acEC').val(<?php echo $acEC ?>);
    });
</script>