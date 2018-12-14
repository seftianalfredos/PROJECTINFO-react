<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");

include 'config.php';

$type_id = '';

$stmt = $DBcon->prepare("SELECT tt.type_id, tp.ProductName FROM table_type tt JOIN table_product tp ON tt.prd_id = tp.prd_id ORDER BY type_id DESC LIMIT 1");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $type_id      = $row['type_id'];
  $ProductName  = $row['ProductName'];
}

$i = $ProductName;

// untuk testing ###################################

//$i = "Air Conditioner";
//$i = "Chest Freezer";
//$i = "Showcase";
//$i =  "Refrigerator";
//$i =  "Washing Machine";
//$i = "Water Dispenser";

//#################################################


?>
<!--############################################################################################# HTML #############################################################################################-->

<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Project Information System 2018 - Add Spec</title>


<script src="_jscript/js/jquery.min.js"></script>
<script src="_jscript/js/kickstart.js"></script>
<script src="_jscript/js/jquery-ui.js"></script>
<script src="_jscript/js/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
<script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="_jscript/js/jquery.uploadPreview.js"></script>

<link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
<link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
<link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
<link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">

<style type="text/css">
  body {
    margin-top: 0px;
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    background-color:#fff; 
    align: center;
  }

  td {
    font-size:13px;
     font: normal 13px/100%;
    color:000;
    padding: 3;
  }

  select {
    font: normal 13px/100% ;
    outline: 0;
    width: 100%;
    border-radius:5px;
    color: #000;
  }

  textarea{
    margin: 0px;
    width: 258px;
    height: 80px;
  }


  #image-preview {
    width: 385px;
    height: 285px;
    position: relative;
    overflow: hidden;
    background-color: #efefef;
    color: #ecf0f1;
    border-radius:10px;
  }
  #image-preview input {
    line-height: 150px;
    font-size: 150px;
    position: absolute;
    opacity: 0;
    z-index: 10;
    border-radius:5px;
  }
  #image-preview label {
    //  position: absolute;
    z-index: 5;
    opacity: 0.8;
    cursor: pointer;
    background-color: #bdc3c7;
    width: 100px;
    height: 30px;
    font-size: 13px;
    color: #000;
    line-height: 30px;
    text-transform: uppercase;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    text-align: center;
    border-radius:10px;

  }

  .input1 { width: 130px; }
  .input2 { width: 206px; }

  .area1{border:0px solid  #f00; width: 400px; padding:2px;}
  .area2{border:0px solid  #f00; width: 120px; height: 25px;}
  .area3{border:0px solid  #f00; width: 260px; height: 25px;}
  .area4{border:0px solid  #f00; width: 60px; height: 25px;}

  .psi_button1 {
  width: 240px;
  }

</style>

</head>
<body>
  <center/>

  <table border="0" cellpadding="0" cellspacing="0" width="1800" height="200" bordercolor="#FF0000" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr>
      <td width="1800" height="200" valign="top" >

        <?php
        include_once ("psi_menu.php");
        ?>

        <ul class="tabs left">
          <li><a >Line Up</a></li>
          <li class="current"><a >Queue</a></li>
          <li><a >Note</a></li>
          <li><a >Reschedule</a></li>
          <li><a >Schedule</a></li>
          <li><a >Monitor</a></li>
        </ul>

        <div id="tab_lineup_add" class="tab-content">
        <ul class="tabs left" >
          <li><a ><i>Add New Type</i></a></li>
          <li class="current"><a href="#tab_lineup_addspec"><i>Specification</i></a></li>
          <li><a ><i>Features</i></a></li>
          <li><a ><i>Teamwork</i></a></li>
        </ul>

        <div id="tab_lineup_addspec" class="tab-content">
        <span><i class="fa fa-caret-right fa-lg backicon" style="color: #007;"></i> <b>Type Product - Chasis</b> [ <?php echo $i; ?> ]</span>
          <ul class="tabs left">
            <li class="current" id="idtabart"><a href="#tab_spec_art"><i>Artwork</i>&nbsp;&nbsp;&nbsp;&nbsp;<i id="cancelback" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
            <li id="idtabmec"><a href="#tab_spec_mec"><i>Mechanic</i>&nbsp;&nbsp;&nbsp;&nbsp;<i id="cancelback2" class="fa fa-remove fa-sm backicon" style="color: #eaeaea;"></i></a></li>
            <li id="idtabcyc"><a href="#tab_spec_cyc"><i>Cycle Unit</i>&nbsp;&nbsp;&nbsp;&nbsp;<i id="cancelback3" class="fa fa-remove fa-sm backicon" style="color: #eaeaea;"></i></a></li>
            <li id="idtabele"><a href="#tab_spec_ele"><i>Electronic</i>&nbsp;&nbsp;&nbsp;&nbsp;<i id="cancelback4" class="fa fa-remove fa-sm backicon" style="color: #eaeaea;"></i></a></li>
            <li id="idtabsav"><a href="#tab_spec_save">&nbsp;&nbsp;&nbsp;&nbsp;<i>Save</i><i id="xx" class="fa fa-remove fa-sm backicon" style="color: #f5f5f5;"></i></a></li>
          </ul>

          <?php
          switch ($i) {
            case "Air Conditioner":
            $index = "ac";
            break;            
            case "Chest Freezer":
            $index = "cf";
            break;
            case "Showcase":
            $index = "sc";
            break;
            case "Refrigerator":
            $index = "rf";
            break;
            case "Washing Machine":
            $index = "wm";
            break;
            case "Water Dispenser":
            $index = "wd";
            break;
            default:
            $index = "ot";
            break;
          }
          include "prj_spec_".$index.".php";
          ?>

        </div>

        </div>
      </td>
    </tr>

    <tr>
      <td width="100%" height="36" class="left">R&D - Project Information System 2018</td>
    </tr>
    <tr>
      <td width="100%" height="100" class="left"></td>
    </tr>
  </table>
</td>
</tr>
</table>



<script>
  $( function() {
    $( "#datestart" ).datepicker({ dateFormat: 'dd MM yy' });
    $( "#datefinish" ).datepicker({ dateFormat: 'dd MM yy' });
  });


  $("#cancelback, #cancelback2, #cancelback3, #cancelback4, #cancelback5").click(function() {
    window.location.href = "psi_project.php#tab_lineup_type";
  });


$("#idtabart").click(function() {
    $('#cancelback').css('color', '#700');
    $('#cancelback2, #cancelback3, #cancelback4').css('color', '#eaeaea');
});

$("#idtabmec").click(function() {
    $('#cancelback2').css('color', '#700');
    $('#cancelback, #cancelback3, #cancelback4').css('color', '#eaeaea');
});

$("#idtabcyc").click(function() {
    $('#cancelback3').css('color', '#700');
    $('#cancelback, #cancelback2, #cancelback4').css('color', '#eaeaea');
});

$("#idtabele").click(function() {
    $('#cancelback4').css('color', '#700');
    $('#cancelback, #cancelback2, #cancelback3').css('color', '#eaeaea');
});

$("#idtabsav").click(function() {
    $('#xx').css('color', '#fff');
    $('#cancelback, #cancelback2, #cancelback3, #cancelback4').css('color', '#eaeaea');
});


/*
  $("#nexttab").click(function() {
    window.location.href = "tab_spec_mec";
    window.location.reload(true);
  });


  $("#nexttab2").click(function() {
    window.location.hash = "tab_spec_cyc";
    location.reload(true);
  });

  $("#nexttab3").click(function() {
    window.location.hash = "tab_spec_ele";
    location.reload(true);    
  });

  $("#nexttab4").click(function() {
    window.location.hash = "tab_spec_save";
    location.reload(true);
  });
*/

  $(document).ready(function() {
    $('#savespecac').on('click',function() {
      var iType             = $('#new_typeid').val();
      var iBodyColor        = $('#spec_color').val();
      var iaccColor         = $('#acc_color').val();
      var iArtSpecDes       = $("#new_artspec").prop('files')[0];
      var iDimension        = $('#spec_stsdim').val();
      var iacIPrdW          = $('#spec_prdw').val();
      var iacIPrdD          = $('#spec_prdd').val();
      var iacIPrdH          = $('#spec_prdh').val();
      var iacIPackW         = $('#spec_pacw').val();
      var iacIPackD         = $('#spec_pacd').val();
      var iacIPackH         = $('#spec_pach').val();
      var iacIWN            = $('#spec_weightnett').val();
      var iacIWG            = $('#spec_weightgross').val();
      var iacOPrdW          = $('#spec_prdwo').val();
      var iacOPrdD          = $('#spec_prddo').val();
      var iacOPrdH          = $('#spec_prdho').val();
      var iacOPackW         = $('#spec_pacwo').val();
      var iacOPackD         = $('#spec_pacdo').val();
      var iacOPackH         = $('#spec_pacho').val();
      var iacOWN            = $('#spec_weightnetto').val();
      var iacOWG            = $('#spec_weightgrosso').val();
      var iLPD              = $('#spec_LPD').val();
      var iGPD              = $('#spec_GPD').val();
      var iContainer        = $('#spec_container').val();
      var iMecSpec          = $('#new_mecspec').prop('files')[0];
      var iCCTRwatt         = $('#new_CCTRwatt').val();
      var iCCTRbtu          = $('#new_CCTRbtu').val();
      var iRCCwatt          = $('#new_RCCwatt').val();
      var iRCCbtu           = $('#new_RCCbtu').val();
      var iEerHasil         = $('#new_EerHasil').val();
      var iKonversi         = $('#new_Konversi').val();
      var iEerLabel         = $('#new_EerLabel').val();
      var iRefrigerant      = $('#spec_refrigerant').val();
      var iRefrigerantW     = $('#new_refrigerant_w').val();
      var iCompressorType   = $('#new_compressorType').val();
      var iCompressorModel  = $('#new_compressorModel').val();
      var iCompressorBrand  = $('#new_compressorBrand').val();
      var iExpansion        = $('#new_expansion').val();
      var iAFV              = $('#new_AFV').val();
      var iOFM              = $('#new_OFM').val();
      var iFMOT             = $('#new_FMOT').val();
      var iCondensorType    = $('#new_condensorType').val();
      var iEvaporatorType   = $('#new_evaporatorType').val();
      var iINL              = $('#new_INL').val();
      var iONL              = $('#new_ONL').val();
      var iCycSpecDes       = $('#new_cycSpec').prop('files')[0];
      var iacPwrSupply      = $('#new_acPwrSupply').val();
      var itestDM           = $('#new_testDM').val();
      var itestAM           = $('#new_testAM').val();
      var istandartDM       = $('#new_standartDM').val();
      var istandartAM       = $('#new_standartAM').val();
      var iSltDP            = $('#new_sltDP').val();
      var iSltAP            = $('#new_sltAP').val();
      var iSilDP            = $('#new_silDP').val();
      var iSilAP            = $('#new_silAP').val();
      var iacEC             = $('#new_acEC').val();
      var iElecSpecDes      = $('#new_elecspec').prop('files')[0];

      var form_data   = new FormData();

      form_data.append('type_id', iType)
      form_data.append('bodyColor', iBodyColor);
      form_data.append('accColor', iaccColor);
      form_data.append('acArtSpecDesign', iArtSpecDes);
      form_data.append('dimension_id', iDimension);
      form_data.append('acIPrdW', iacIPrdW);
      form_data.append('acIPrdD', iacIPrdD);
      form_data.append('acIPrdH', iacIPrdH);
      form_data.append('acIPackW', iacIPackW);
      form_data.append('acIPackD', iacIPackD);
      form_data.append('acIPackH', iacIPackH);
      form_data.append('acIWN', iacIWN);
      form_data.append('acIWG', iacIWG);
      form_data.append('acOPrdW', iacOPrdW);
      form_data.append('acOPrdD', iacOPrdD);
      form_data.append('acOPrdH', iacOPrdH);
      form_data.append('acOPackW', iacOPackW);
      form_data.append('acOPackD', iacOPackD);
      form_data.append('acOPackH', iacOPackH);
      form_data.append('acOWN', iacOWN);
      form_data.append('acOWG', iacOWG);
      form_data.append('LPD', iLPD);
      form_data.append('GPD', iGPD);
      form_data.append('container', iContainer);
      form_data.append('acMecSpecDesign', iMecSpec);
      form_data.append('CCTRwatt', iCCTRwatt);
      form_data.append('CCTRbtu', iCCTRbtu);
      form_data.append('RCCwatt', iRCCwatt);
      form_data.append('RCCbtu', iRCCbtu);
      form_data.append('EerHasil', iEerHasil);
      form_data.append('Konversi', iKonversi);
      form_data.append('EerLabel', iEerLabel);
      form_data.append('refrigerant_id', iRefrigerant);
      form_data.append('refrigerant_w', iRefrigerantW);
      form_data.append('compressorType', iCompressorType);
      form_data.append('compressorModel', iCompressorModel);
      form_data.append('compressorBrand', iCompressorBrand);
      form_data.append('expansion', iExpansion);
      form_data.append('AFV', iAFV);
      form_data.append('OFM', iOFM);
      form_data.append('FMOT', iFMOT);
      form_data.append('condensorType', iCondensorType);
      form_data.append('evaporatorType', iEvaporatorType);
      form_data.append('INL', iINL);
      form_data.append('ONL', iONL);
      form_data.append('acCycSpecDesign', iCycSpecDes);
      form_data.append('acPwrSupply', iacPwrSupply);
      form_data.append('testDM', itestDM);
      form_data.append('testAM', itestAM);
      form_data.append('standartDM', istandartDM);
      form_data.append('standartAM', istandartAM);
      form_data.append('SltDP', iSltDP);
      form_data.append('SltAP', iSltAP);
      form_data.append('SilDP', iSilDP);
      form_data.append('SilAP', iSilAP);
      form_data.append('acEC', iacEC);
      form_data.append('acElecSpecDesign', iElecSpecDes);

      $.ajax({
        url         : "_savespecac.php",
        type        : "POST",
        cache       : false,
        async       : true,
        dataType    : "text",
        data        : form_data,
        contentType : false,
        processData : false,
        success     : function(){
          swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
          }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;
          });
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    });
});


$(document).ready(function() {
  $('#savespeccf').on('click',function() {
    var iType                 = $('#new_typeid').val();
    var ibodyColor            = $('#spec_color').val();
    var icfArtSpecDesign      = $('#new_artspec').prop('files')[0];
    var idimension_id         = $('#spec_stsdim').val();
    var icfPrdW               = $('#spec_prdw').val();
    var icfPrdD               = $('#spec_prdd').val();
    var icfPrdH               = $('#spec_prdh').val();
    var icfPackW              = $('#spec_pacw').val();
    var icfPackD              = $('#spec_pacd').val();
    var icfPackH              = $('#spec_pach').val();
    var icfVolN               = $('#spec_volumenett').val();
    var icfVolG               = $('#spec_volumegross').val();
    var icfWeightN            = $('#spec_weightnett').val();
    var icfWeightG            = $('#spec_weightgross').val();
    var icfContainer          = $('#spec_container').val();
    var icfMecSpecDesign      = $('#new_mecspec').prop('files')[0];
    var irollbond_id          = $('#spec_rollb').val();
    var irollbondtype_id      = $('#spec_rollbtype').val();
    var itemperature_id       = $('#spec_tcontrol').val();
    var iclimate_id           = $('#spec_cliclass').val();
    var icondensor_id         = $('#spec_cond').val();
    var irefrigerant_id       = $('#spec_refri').val();
    var icfMoR                = $('#new_MoR').val();
    var icfRc                 = $('#new_rateCur').val();
    var icfRP                 = $('#new_ratePwr').val();
    var icfCompressor         = $('#new_compressor').val();
    var icfCoolCap            = $('#new_coolingCap').val();
    var icfCTD                = $('#new_CTD').val();
    var icfFreezTemp          = $('#new_freezTemp').val();
    var icfEnergyConsumption  = $('#new_energyCons').val();
    var icfCycSpecDesign      = $('#new_cycSpec').prop('files')[0];
    var irv_id                = $('#spec_rv').val();
    var iwv_id                = $('#spec_wv').val();
    var icfRF                 = $('#new_rf').val();
    var icfRtdCur             = $('#new_rc').val();
    var icfRtdPwr             = $('#new_rp').val();
    var icfRPH                = $('#new_rph').val();
    var icfElecSpecDesign     = $('#new_elecspec').prop('files')[0];

    var form_data = new FormData();

    form_data.append('type_id', iType);
    form_data.append('bodyColor', ibodyColor);
    form_data.append('cfArtSpecDesign', icfArtSpecDesign);
    form_data.append('dimension_id', idimension_id);
    form_data.append('cfPrdW', icfPrdW);
    form_data.append('cfPrdD', icfPrdD);
    form_data.append('cfPrdH', icfPrdH);
    form_data.append('cfPackW', icfPackW);
    form_data.append('cfPackD', icfPackD);
    form_data.append('cfPackH', icfPackH);
    form_data.append('cfVolN', icfVolN);
    form_data.append('cfVolG', icfVolG);
    form_data.append('cfWeightN', icfWeightN);
    form_data.append('cfWeightG', icfWeightG);
    form_data.append('cfContainer', icfContainer);
    form_data.append('cfMecSpecDesign', icfMecSpecDesign);
    form_data.append('rollbond_id', irollbond_id);
    form_data.append('rollbondtype_id', irollbondtype_id);
    form_data.append('temperature_id', itemperature_id);
    form_data.append('climate_id', iclimate_id);
    form_data.append('condensor_id', icondensor_id);
    form_data.append('refrigerant_id', irefrigerant_id);
    form_data.append('cfMoR', icfMoR);
    form_data.append('cfRc', icfRc);
    form_data.append('cfRP', icfRP);
    form_data.append('cfCompressor', icfCompressor);
    form_data.append('cfCoolCap', icfCoolCap);
    form_data.append('cfCTD', icfCTD);
    form_data.append('cfFreezTemp', icfFreezTemp);
    form_data.append('cfEnergyConsumption', icfEnergyConsumption);
    form_data.append('cfCycSpecDesign', icfCycSpecDesign);
    form_data.append('rv_id', irv_id);
    form_data.append('wv_id', iwv_id);
    form_data.append('cfRF', icfRF);
    form_data.append('cfRtdCur', icfRtdCur);
    form_data.append('cfRtdPwr', icfRtdPwr);
    form_data.append('cfRPH', icfRPH);
    form_data.append('cfElecSpecDesign', icfElecSpecDesign);

    $.ajax({
      url         : "_savespeccf.php",
      type        : "POST",
      cache       : false,
      async       : true,
      dataType    : "text",
      data        : form_data,
      contentType : false,
      processData : false,
      success     : function(){
        swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
        }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;
        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });

  });
});


$(document).ready(function() {
  $('#savespecsc').on('click', function() {
    var iType             = $('#new_typeid').val();
    var icolor_id         = $('#spec_color').val();
    var iscHandle         = $('#spec_handle').val();
    var irack_id          = $('#spec_rack').val();
    var iNoR              = $('#new_qtyrack').val();
    var iscArtSpecDesign  = $('#new_artspec').prop('files')[0];
    var idimension_id     = $('#spec_stsdim').val();
    var iscPrdW           = $('#spec_prdw').val();
    var iscPrdD           = $('#spec_prdd').val();
    var iscPrdH           = $('#spec_prdh').val();
    var iscPackW          = $('#spec_pacw').val();
    var iscPackD          = $('#spec_pacd').val();
    var iscPackH          = $('#spec_pach').val();
    var iscVolN           = $('#spec_volumenett').val();
    var iscVolG           = $('#spec_volumegross').val();
    var iscWeightN        = $('#spec_weightnett').val();
    var iscWeightG        = $('#spec_weightgross').val();
    var iscContainer      = $('#spec_container').val();
    var iscMecSpecDesign  = $('#new_mecspec').prop('files')[0];
    var irollbond_id      = $('#spec_rollb').val();
    var irollbondtype_id  = $('#spec_rollbtype').val();
    var iclimate_id       = $('#spec_cliclass').val();
    var icondensor_id     = $('#spec_cond').val();
    var irefrigerant_id   = $('#spec_refri').val();
    var iscMoR            = $('#new_MoR').val();
    var iscRC             = $('#new_rateCur').val();
    var iscRP             = $('#new_ratePwr').val();
    var iscCompressor     = $('#new_compressor').val();
    var iscCoolCap        = $('#new_coolingCap').val();
    var iscCTD            = $('#new_CTD').val();
    var iscFreezTemp      = $('#new_freezTemp').val();
    var iscEC             = $('#new_energyCons').val();
    var iscCycSpecDesign  = $('#new_cycSpec').prop('files')[0];
    var irv_id            = $('#spec_rv').val();
    var iwv_id            = $('#spec_wv').val();
    var iscRF             = $('#new_rf').val();
    var iscRtdCurr        = $('#new_rc').val();
    var iscRtdPwr         = $('#new_rp').val();
    var iscRML            = $('#new_rml').val();
    var iscElecSpecDesign = $('#new_elecspec').prop('files')[0];

    var form_data = new FormData();

    form_data.append('type_id', iType);
    form_data.append('color_id', icolor_id);
    form_data.append('scHandle', iscHandle);
    form_data.append('rack_id', irack_id);
    form_data.append('NoR', iNoR);
    form_data.append('scArtSpecDesign', iscArtSpecDesign);
    form_data.append('dimension_id', idimension_id);
    form_data.append('scPrdW', iscPrdW);
    form_data.append('scPrdD', iscPrdD);
    form_data.append('scPrdH', iscPrdH);
    form_data.append('scPackW', iscPackW);
    form_data.append('scPackD', iscPackD);
    form_data.append('scPackH', iscPackH);
    form_data.append('scVolN', iscVolN);
    form_data.append('scVolG', iscVolG);
    form_data.append('scWeightN', iscWeightN);
    form_data.append('scWeightG', iscWeightG);
    form_data.append('scContainer', iscContainer);
    form_data.append('scMecSpecDesign', iscMecSpecDesign);
    form_data.append('rollbond_id', irollbond_id);
    form_data.append('rollbondtype_id', irollbondtype_id);
    form_data.append('climate_id', iclimate_id);
    form_data.append('condensor_id', icondensor_id);
    form_data.append('refrigerant_id', irefrigerant_id);
    form_data.append('scMoR', iscMoR);
    form_data.append('scRC', iscRC);
    form_data.append('scRP', iscRP);
    form_data.append('scCompressor', iscCompressor);
    form_data.append('scCoolCap', iscCoolCap);
    form_data.append('scCTD', iscCTD);
    form_data.append('scFreezTemp', iscFreezTemp);
    form_data.append('scEC', iscEC);
    form_data.append('scCycSpecDesign', iscCycSpecDesign);
    form_data.append('rv_id', irv_id);
    form_data.append('wv_id', iwv_id);
    form_data.append('scRF', iscRF);
    form_data.append('scRtdCurr', iscRtdCurr);
    form_data.append('scRtdPwr', iscRtdPwr);
    form_data.append('scRML', iscRML);
    form_data.append('scElecSpecDesign', iscElecSpecDesign);

    $.ajax({
      url         : "_savespecsc.php",
      type        : "POST",
      cache       : false,
      async       : true,
      dataType    : "text",
      data        : form_data,
      contentType : false,
      processData : false,
      success     : function(){
        swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
        }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;
        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });


  });
});


$(document).ready(function() {
  $('#savespecrf').on('click', function() {
    var iType         = $('#new_typeid').val();
    var iColorId      = $('#spec_color').val();
    var iPattern      = $('#spec_pattern').val();
    var iFinishing    = $('#spec_fin').val();
    var iLiner        = $('#new_linermat').val();
    var iIntMat       = $('#new_intmat').val();
    var iStamp        = $('#new_stamping').val();
    var iEggP         = $('#new_eggpocket').val();
    var iEggH         = $('#new_egghold').val();
    var iUtiP         = $('#new_utility').val();
    var iBottleP      = $('#new_bootle').val();
    var iColor        = $('#new_cabcolor').val();
    var iSidePan      = $('#new_spanelmat').val();
    var iHandle       = $('#spec_handle').val();
    var iHandleType   = $('#spec_handletype').val();
    var iBaseboard    = $('#spec_basebrd').val();
    var iWaterD       = $('#spec_waterdis').val();
    var iRack         = $('#spec_rack').val();
    var iTwistT       = $('#new_ittray').val();
    var iIceB         = $('#new_icebank').val();
    var iIceT         = $('#new_icetray').val();
    var iFreezerP     = $('#new_freezer').val();
    var iLamp         = $('#new_lamp').val();
    var iChiller      = $('#new_chiller').val();
    var iShelf        = $('#new_shelf').val();
    var iSheilded     = $('#new_smoisture').val();
    var iCrisper      = $('#new_chrisper').val();
    var iArtSpecDesg  = $('#new_artspec').prop('files')[0];
    var iStatus       = $('#spec_stsdim').val();
    var iPrdW         = $('#spec_prdw').val();
    var iPrdL         = $('#spec_prdd').val();
    var iPrdH         = $('#spec_prdh').val();
    var iPackW        = $('#spec_pacw').val();
    var iPackL        = $('#spec_pacd').val();
    var iPackH        = $('#spec_pach').val();
    var iPackName     = $('#spec_pacname').val();
    var iVolN         = $('#spec_volumenett').val();
    var iVolG         = $('#spec_volumegross').val();
    var iWeightN      = $('#spec_weightnett').val();
    var iWeightG      = $('#spec_weightgross').val();
    var iContainer    = $('#spec_container').val();
    var iMecSpecDesg  = $('#new_mecspec').prop('files')[0];
    var iRollbond     = $('#spec_rollb').val();
    var iRollbondType = $('#spec_rollbtype').val();
    var iTempCtrl     = $('#spec_tcontrol').val();
    var iDripTray     = $('#spec_driptray').val();
    var iClimate      = $('#spec_cliclass').val();
    var iCondensor    = $('#spec_cond').val();
    var iRefrigerant  = $('#spec_refri').val();
    var iMoR          = $('#new_MoR').val();
    var iRateCurr     = $('#new_rateCur').val();
    var iRatePwr      = $('#new_ratePwr').val();
    var iCompressor   = $('#new_compressor').val();
    var iCoolingCap   = $('#new_coolingCap').val();
    var iCTD          = $('#new_CTD').val();
    var iFreezTemp    = $('#new_freezTemp').val();
    var iEnergy       = $('#new_energyCons').val();
    var iCycSpecDesg  = $('#new_cycSpec').prop('files')[0];
    var iRv           = $('#spec_rv').val();
    var iWv           = $('#spec_wv').val();
    var iRf           = $('#new_rf').val();
    var iRc           = $('#new_rc').val();
    var iRp           = $('#new_rp').val();
    var iRph          = $('#new_rph').val();
    var iRml          = $('#new_rml').val();
    var iElecSpecDesg = $('#new_elecspec').prop('files')[0];


    var form_data     = new FormData();


    form_data.append('type_id', iType);
    form_data.append('color_id', iColorId);
    form_data.append('pattern_id', iPattern);
    form_data.append('finishing_id', iFinishing);
    form_data.append('dLinerMaterial', iLiner);
    form_data.append('dInteriorMateri', iIntMat);
    form_data.append('dStamping', iStamp);
    form_data.append('dEggPocket', iEggP);
    form_data.append('dEggHolder', iEggH);
    form_data.append('dUtilityPocket', iUtiP);
    form_data.append('dBottlePocket', iBottleP);
    form_data.append('cColor', iColor);
    form_data.append('cSidePanelMat', iSidePan);
    form_data.append('aHandle', iHandle);
    form_data.append('handle_id', iHandleType);
    form_data.append('aBaseboard', iBaseboard);
    form_data.append('aWaterdispenser', iWaterD);
    form_data.append('rack_id', iRack);
    form_data.append('aIceTwistTray', iTwistT);
    form_data.append('aIceBank', iIceB);
    form_data.append('aIceTray', iIceT);
    form_data.append('aFrezzerPocket', iFreezerP);
    form_data.append('aLamp', iLamp);
    form_data.append('aChiller', iChiller);
    form_data.append('aShelf', iShelf);
    form_data.append('aSheildedMoist', iSheilded);
    form_data.append('aCrisper', iCrisper);
    form_data.append('ArtSpecDesign', iArtSpecDesg);
    form_data.append('dimension_id', iStatus);
    form_data.append('mechProdW', iPrdW);
    form_data.append('mechProdL', iPrdL);
    form_data.append('mechProdH', iPrdH);
    form_data.append('mechPackW', iPackW);
    form_data.append('mechPackL', iPackL);
    form_data.append('mechPackH', iPackH);
    form_data.append('packing_id', iPackName);
    form_data.append('mechVolNet', iVolN);
    form_data.append('mechVolGros', iVolG);
    form_data.append('mechWeightNet', iWeightN);
    form_data.append('mechWeightGros', iWeightG);
    form_data.append('mechContainer', iContainer);
    form_data.append('MechSpecDesign', iMecSpecDesg);
    form_data.append('rollbond_id', iRollbond);
    form_data.append('rollbondtype_id', iRollbondType);
    form_data.append('temperature_id', iTempCtrl);
    form_data.append('cycDripTray', iDripTray);
    form_data.append('climate_id', iClimate);
    form_data.append('condensor_id', iCondensor);
    form_data.append('refrigerant_id', iRefrigerant);
    form_data.append('cycMoR', iMoR);
    form_data.append('cycRatedCurrent', iRateCurr);
    form_data.append('cycRatedPower', iRatePwr);
    form_data.append('cycCompressor', iCompressor);
    form_data.append('cycCoolingCapacity', iCoolingCap);
    form_data.append('cycCapillaryTube', iCTD);
    form_data.append('cycFreezingTemp', iFreezTemp);
    form_data.append('cycEnergyConsumption', iEnergy);
    form_data.append('CycSpecDesign',iCycSpecDesg);
    form_data.append('rv_id', iRv);
    form_data.append('wv_id', iWv);
    form_data.append('elecRF', iRf);
    form_data.append('elecRC', iRc);
    form_data.append('elecRP', iRp);
    form_data.append('elecRPH', iRph);
    form_data.append('elecMaxLamp', iRml);
    form_data.append('ElecSpecDesign', iElecSpecDesg);

    $.ajax({
      url         : "_savespecrf.php",
      type        : "POST",
      cache       : false,
      async       : true,
      dataType    : "text",
      data        : form_data,
      contentType : false,
      processData : false,
      success   : function(){
        swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
        }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;

        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});


$(document).ready(function() {
  $('#savespecwm').on('click', function() {
    var iType             = $('#new_typeid').val();
    var icolor_id         = $('#spec_color').val();
    var iwmMB             = $('#spec_matbody').val();
    var iwmMD             = $('#spec_matdrum').val();
    var iwmArtSpecDesign  = $('#new_artspec').prop('files')[0];
    var idimension_id     = $('#spec_stsdim').val();
    var iwmPrdW           = $('#spec_prdw').val();
    var iwmPrdD           = $('#spec_prdd').val();
    var iwmPrdH           = $('#spec_prdh').val();
    var iwmPackW          = $('#spec_pacw').val();
    var iwmPackD          = $('#spec_pacd').val();
    var iwmPackH          = $('#spec_pach').val();
    var iwmVolN           = $('#spec_volumenett').val();
    var iwmVolG           = $('#spec_volumegross').val();
    var iwmWeightN        = $('#spec_weightnett').val();
    var iwmWeightG        = $('#spec_weightgross').val();
    var iwmWaterSelector  = $('#spec_waterselect').val();
    var iwmContainer      = $('#spec_container').val();
    var iwmMecSpecDesign  = $('#new_mecspec').prop('files')[0];
    var iwmTMS            = $('#new_spintype').val();
    var iwmPMS            = $('#new_spinpower').val();
    var iwmSMS            = $('#new_spinspeed').val();
    var iwmTMW            = $('#new_washtype').val();
    var iwmPMW            = $('#new_washpower').val();
    var iwmSMW            = $('#new_washspeed').val();
    var iwmCycSpecDesign  = $('#new_cycSpec').prop('files')[0];
    var irv_id            = $('#spec_rv').val();
    var iwv_id            = $('#spec_wv').val();
    var iwmRF             = $('#new_rf').val();
    var iwmRC             = $('#new_rc').val();
    var iwmRP             = $('#new_rp').val();
    var iwmElecSpecDesign = $('#new_elecspec').prop('files')[0];

    var form_data = new FormData();

    form_data.append('type_id', iType);
    form_data.append('color_id', icolor_id);
    form_data.append('wmMB', iwmMB);
    form_data.append('wmMD', iwmMD);
    form_data.append('wmArtSpecDesign', iwmArtSpecDesign);
    form_data.append('dimension_id', idimension_id);
    form_data.append('wmPrdW', iwmPrdW);
    form_data.append('wmPrdD', iwmPrdD);
    form_data.append('wmPrdH', iwmPrdH);
    form_data.append('wmPackW', iwmPackW);
    form_data.append('wmPackD', iwmPackD);
    form_data.append('wmPackH', iwmPackH);
    form_data.append('wmVolN', iwmVolN);
    form_data.append('wmVolG', iwmVolG);
    form_data.append('wmWeightN', iwmWeightN);
    form_data.append('wmWeightG', iwmWeightG);
    form_data.append('wmWaterSelector', iwmWaterSelector);
    form_data.append('wmContainer', iwmContainer);
    form_data.append('wmMecSpecDesign', iwmMecSpecDesign);
    form_data.append('wmTMS', iwmTMS);
    form_data.append('wmPMS', iwmPMS);
    form_data.append('wmSMS', iwmSMS);
    form_data.append('wmTMW', iwmTMW);
    form_data.append('wmPMW', iwmPMW);
    form_data.append('wmSMW', iwmSMW);
    form_data.append('wmCycSpecDesign', iwmCycSpecDesign);
    form_data.append('rv_id', irv_id);
    form_data.append('wv_id', iwv_id);
    form_data.append('wmRF', iwmRF);
    form_data.append('wmRC', iwmRC);
    form_data.append('wmRP', iwmRP);
    form_data.append('wmElecSpecDesign', iwmElecSpecDesign);

    $.ajax({
      url         : "_savespecwm.php",
      type        : "POST",
      cache       : false,
      async       : true,
      dataType    : "text",
      data        : form_data,
      contentType : false,
      processData : false,
      success   : function(){
        swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
        }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;

        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });

  });
});


$(document).ready(function() {
  $('#savespecwd').on('click', function() {
    var iType             = $('#new_typeid').val();
    var icolor_id         = $('#spec_color').val();
    var iwdArtSpecDesign  = $('#new_artspec').prop('files')[0];
    var idimension_id     = $('#spec_stsdim').val();
    var iwdPrdW           = $('#spec_prdw').val();
    var iwdPrdD           = $('#spec_prdd').val();
    var iwdPrdH           = $('#spec_prdh').val();
    var iwdPackW          = $('#spec_pacw').val();
    var iwdPackD          = $('#spec_pacd').val();
    var iwdPackH          = $('#spec_pach').val();
    var iwdVolN           = $('#spec_volumenett').val();
    var iwdVolG           = $('#spec_volumegross').val();
    var iwdWeightN        = $('#spec_weightnett').val();
    var iwdWeightG        = $('#spec_weightgross').val();
    var iwdContainer      = $('#spec_container').val();
    var iwdMecSpecDesign  = $('#new_mecspec').prop('files')[0];
    var irollbond_id      = $('#spec_rollb').val();
    var irollbondtype_id  = $('#spec_rollbtype').val();
    var iclimate_id       = $('#spec_cliclass').val();
    var icondensor_id     = $('#spec_cond').val();
    var irefrigerant_id   = $('#spec_refri').val();
    var iwdMoR            = $('#new_MoR').val();
    var iwdRC             = $('#new_rateCur').val();
    var iwdRP             = $('#new_ratePwr').val();
    var iwdCompressor     = $('#new_compressor').val();
    var iwdCoolCap        = $('#new_coolingCap').val();
    var iwdCapTube        = $('#new_CTD').val();
    var iwdCoolTemp       = $('#new_coolingTemp').val();
    var iwdHotTemp        = $('#new_hotTemp').val();
    var iwdNetralTemp     = $('#new_netralTemp').val();
    var iwdEC             = $('#new_energyCons').val();
    var iwdCycSpecDesign  = $('#new_cycSpec').prop('files')[0];
    var irv_id            = $('#spec_rv').val();
    var iwv_id            = $('#spec_wv').val();
    var iwdRF             = $('#new_rf').val();
    var iwdRtdCurr        = $('#new_rc').val();
    var iwdRtdPwr         = $('#new_rp').val();
    var iwdRPH            = $('#new_rph').val();
    var iwdElecSpecDesign = $('#new_elecspec').prop('files')[0];

    var form_data = new FormData();

    form_data.append('type_id', iType);
    form_data.append('color_id', icolor_id);
    form_data.append('wdArtSpecDesign', iwdArtSpecDesign);
    form_data.append('dimension_id', idimension_id);
    form_data.append('wdPrdW', iwdPrdW);
    form_data.append('wdPrdD', iwdPrdD);
    form_data.append('wdPrdH', iwdPrdH);
    form_data.append('wdPackW', iwdPackW);
    form_data.append('wdPackD', iwdPackD);
    form_data.append('wdPackH', iwdPackH);
    form_data.append('wdVolN', iwdVolN);
    form_data.append('wdVolG', iwdVolG);
    form_data.append('wdWeightN', iwdWeightN);
    form_data.append('wdWeightG', iwdWeightG);
    form_data.append('wdContainer', iwdContainer);
    form_data.append('wdMecSpecDesign', iwdMecSpecDesign);
    form_data.append('rollbond_id', irollbond_id);
    form_data.append('rollbondtype_id', irollbondtype_id);
    form_data.append('climate_id', iclimate_id);
    form_data.append('condensor_id', icondensor_id);
    form_data.append('refrigerant_id', irefrigerant_id);
    form_data.append('wdMoR', iwdMoR);
    form_data.append('wdRC', iwdRC);
    form_data.append('wdRP', iwdRP);
    form_data.append('wdCompressor', iwdCompressor);
    form_data.append('wdCoolCap', iwdCoolCap);
    form_data.append('wdCapTube', iwdCapTube);
    form_data.append('wdCoolTemp', iwdCoolTemp);
    form_data.append('wdHotTemp', iwdHotTemp);
    form_data.append('wdNetralTemp', iwdNetralTemp);
    form_data.append('wdEC', iwdEC);
    form_data.append('wdCycSpecDesign', iwdCycSpecDesign);
    form_data.append('rv_id', irv_id);
    form_data.append('wv_id', iwv_id);
    form_data.append('wdRF', iwdRF);
    form_data.append('wdRtdCurr', iwdRtdCurr);
    form_data.append('wdRtdPwr', iwdRtdPwr);
    form_data.append('wdRPH', iwdRPH);
    form_data.append('wdElecSpecDesign', iwdElecSpecDesign);

    $.ajax({
      url         : "_savespecwd.php",
      type        : "POST",
      cache       : false,
      async       : true,
      dataType    : "text",
      data        : form_data,
      contentType : false,
      processData : false,
      success   : function(){
        swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
        }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;

        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });

  });
});


$(document).ready(function() {
  $('#savespecot').on('click', function() {
    var iType             = $('#new_typeid').val();
    var icolor_id         = $('#spec_color').val();
    var ioArtSpecDesign   = $('#new_artspec').prop('files')[0];
    var idimension_id     = $('#spec_stsdim').val();
    var ioPrdW            = $('#spec_prdw').val();
    var ioPrdD            = $('#spec_prdd').val();
    var ioPrdH            = $('#spec_prdh').val();
    var ioPackW           = $('#spec_pacw').val();
    var ioPackD           = $('#spec_pacd').val();
    var ioPackH           = $('#spec_pach').val();
    var ioVolN            = $('#spec_volumenett').val();
    var ioVolG            = $('#spec_volumegross').val();
    var ioWeightN         = $('#spec_weightnett').val();
    var ioWeightG         = $('#spec_weightgross').val();
    var ioContainer       = $('#spec_container').val();
    var ioMecSpecDesign   = $('#new_mecspec').prop('files')[0];
    var ioNote1           = $('#new_note1').val();
    var ioNote2           = $('#new_note2').val();
    var ioNote3           = $('#new_note3').val();
    var ioEC              = $('#new_energyCons').val();
    var ioCycSpecDesign   = $('#new_cycSpec').prop('files')[0];
    var irv_id            = $('#spec_rv').val();
    var iwv_id            = $('#spec_wv').val();
    var ioRF              = $('#new_rf').val();
    var ioRC              = $('#new_rc').val();
    var ioRP              = $('#new_rp').val();
    var ioElecSpecDesign  = $('#new_elecspec').prop('files')[0];

    var form_data = new FormData();

    form_data.append('type_id', iType);
    form_data.append('color_id', icolor_id);
    form_data.append('oArtSpecDesign', ioArtSpecDesign);
    form_data.append('dimension_id', idimension_id);
    form_data.append('oPrdW', ioPrdW);
    form_data.append('oPrdD', ioPrdD);
    form_data.append('oPrdH', ioPrdH);
    form_data.append('oPackW', ioPackW);
    form_data.append('oPackD', ioPackD);
    form_data.append('oPackH', ioPackH);
    form_data.append('oVolN', ioVolN);
    form_data.append('oVolG', ioVolG);
    form_data.append('oWeightN', ioWeightN);
    form_data.append('oWeightG', ioWeightG);
    form_data.append('oContainer', ioContainer);
    form_data.append('oMecSpecDesign', ioMecSpecDesign);
    form_data.append('oNote1', ioNote1);
    form_data.append('oNote2', ioNote2);
    form_data.append('oNote3', ioNote3);
    form_data.append('oEC', ioEC);
    form_data.append('oCycSpecDesign', ioCycSpecDesign);
    form_data.append('rv_id', irv_id);
    form_data.append('wv_id', iwv_id);
    form_data.append('oRF', ioRF);
    form_data.append('oRC', ioRC);
    form_data.append('oRP', ioRP);
    form_data.append('oElecSpecDesign', ioElecSpecDesign);

    $.ajax({
      url         : "_savespecot.php",
      type        : "POST",
      cache       : false,
      async       : true,
      dataType    : "text",
      data        : form_data,
      contentType : false,
      processData : false,
      success   : function(){
        swal({   
            showConfirmButton: false,
            title   : "Berhasil",
            text    : "Spesifikasi Produk berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1500,
            // button  : "success"
        }, function(){
            window.location.href = "prj_lineupaddfea.php?idType="+iType;

        });
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });


  });
});


</script>


<script type="text/javascript">
  $(document).ready(function() {
    $.uploadPreview({
      input_field: "#image-upload",   // Default: .image-upload
      preview_box: "#image-preview",  // Default: .image-preview
      label_field: "#image-label",    // Default: .image-label
      label_default: "Upload Foto",   // Default: Choose File
      label_selected: "Change File",  // Default: Change File
      no_label: false                 // Default: false
    });
  });
</script>

<script type="text/javascript">
function disableF5(e) { if ((e.which || e.keyCode) == 116 ) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>

<script src="_jscript/js/stickmenu.js"></script>
</body>
</html>
