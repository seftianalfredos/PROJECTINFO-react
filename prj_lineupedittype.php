<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");

// TERIMA ID TYPE DARI HALAMAN SEBELUMNYA BUAT DI EDIT
if (isset($_GET['inputIDtype'])) {
  $vId = $_GET['inputIDtype'];
}

if ($vId != '') {
  $type_id        = '';
  $prj_id         = '';
  $ProjectName    = '';
  $noNdpr         = '';
  $ndprName       = '';
  $plant_id       = '';
  $plant_name     = '';
  $typeSupply     = '';
  $typeSupplyDesc = '';
  $typeDemand     = '';
  $typeCetak      = '';
  $format_id      = '';
  $format_name    = '';
  $prd_id         = '';
  $ProductName    = '';
  $cha_id         = '';
  $ChasisName     = '';
  $siz_id         = '';
  $SizeName       = '';
  $typeNote       = '';
  $typePhoto      = '';
  $made_in        = '';
  $madein_name    = '';
  $mandatory      = '';
  $cp_id          = '';
  $cp_name        = '';
  $modelFamily    = '';
  $noBukuPetunjuk = '';
  $noPostel       = '';
  $noSni          = '';
  $noLsPro        = '';
  $noNrpNpb       = '';
  $warantyCard    = '';
  $warantyYear    = '';
  $sta_id         = '';
  $StatusName     = '';
  $TypeStartDate  = '';
  $TypeFinishDate = '';
  $assign         = '';
}


include 'config.php';

$stmt = $DBcon->prepare("
  SELECT tt.type_id AS type_id, tp.prj_id AS prj_id, tp.ProjectName AS ProjectName, tt.noNdpr AS noNdpr, tt.ndprName AS ndprName, tpl.plant_id AS plant_id, tpl.name AS plant_name, tt.typeSupply AS typeSupply, tt.typeSupplyDesc AS typeSupplyDesc, tt.typeDemand AS typeDemand, tt.typeCetak AS typeCetak, tf.format_id AS format_id, tf.name AS format_name, tpr.prd_id AS prd_id, tpr.ProductName AS ProductName, tc.cha_id AS cha_id, tc.ChasisName AS ChasisName, tca.siz_id AS siz_id, tca.SizeName AS SizeName, tt.typeNote AS typeNote, tt.typePhoto AS typePhoto, tmi.madein_id AS made_in, tmi.name AS madein_name, tt.mandatory AS mandatory, tcp.cp_id AS cp_id, tcp.name AS cp_name, tt.modelFamily AS modelFamily, tt.noBukuPetunjuk AS noBukuPetunjuk, tt.noPostel AS noPostel, tt.noSni AS noSni, tt.noLsPro AS noLsPro, tt.noNrpNpb AS noNrpNpb, tt.warantyCard AS warantyCard, tt.warantyYear AS warantyYear, ts.sta_id AS sta_id, ts.StatusName AS StatusName, tt.TypeStartDate AS TypeStartDate, tt.TypeFinishDate AS TypeFinishDate, tt.assign AS assign
  FROM table_type tt
  LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
  LEFT JOIN table_plant tpl ON tt.plant_id = tpl.plant_id
  LEFT JOIN table_format tf ON tt.format_id = tf.format_id
  LEFT JOIN table_product tpr ON tt.prd_id = tpr.prd_id
  LEFT JOIN table_chasis tc ON tt.cha_id = tc.cha_id
  LEFT JOIN table_capacity tca ON tt.siz_id = tca.siz_id
  LEFT JOIN table_classproduct tcp ON tt.cp_id = tcp.cp_id
  LEFT JOIN table_madein tmi ON tt.made_in  =  tmi.madein_id
  LEFT JOIN table_status ts ON tt.sta_id = ts.sta_id
  WHERE type_id = :type_id
  ");
$stmt->bindParam(':type_id', $vId);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $type_id        = $row['type_id'];
  $prj_id         = $row['prj_id'];
  $ProjectName    = $row['ProjectName'];
  $noNdpr         = $row['noNdpr'];
  $ndprName       = $row['ndprName'];
  $plant_id       = $row['plant_id'];
  $plant_name     = $row['plant_name'];
  $typeSupply     = $row['typeSupply'];
  $typeSupplyDesc = $row['typeSupplyDesc'];
  $typeDemand     = $row['typeDemand'];
  $typeCetak      = $row['typeCetak'];
  $format_id      = $row['format_id'];
  $format_name    = $row['format_name'];
  $prd_id         = $row['prd_id'];
  $ProductName    = $row['ProductName'];
  $cha_id         = $row['cha_id'];
  $ChasisName     = $row['ChasisName'];
  $siz_id         = $row['siz_id'];
  $SizeName       = $row['SizeName'];
  $typeNote       = $row['typeNote'];
  $typePhoto      = $row['typePhoto'];
  $made_in        = $row['made_in'];
  $madein_name    = $row['madein_name'];
  $mandatory      = $row['mandatory'];
  $cp_id          = $row['cp_id'];
  $cp_name        = $row['cp_name'];
  $modelFamily    = $row['modelFamily'];
  $noBukuPetunjuk = $row['noBukuPetunjuk'];
  $noPostel       = $row['noPostel'];
  $noSni          = $row['noSni'];
  $noLsPro        = $row['noLsPro'];
  $noNrpNpb       = $row['noNrpNpb'];
  $warantyCard    = $row['warantyCard'];
  $warantyYear    = $row['warantyYear'];
  $sta_id         = $row['sta_id'];
  $StatusName     = $row['StatusName'];
  $TypeStartDate  = $row['TypeStartDate'];
  $TypeFinishDate = $row['TypeFinishDate'];
  $assign         = $row['assign'];
}

$i = $ProductName;


// BUAT ISI CHASSIS SESUAI PRODUKNYA
if (isset($_POST['prd_id'])){
  include 'config.php';
  $data = array();
  $id = $_POST['prd_id'];

  $query2 = $DBcon->prepare("SELECT *FROM table_chasis WHERE prd_id = :prd_id ORDER BY ChasisName  ASC");
  $query2->bindParam(':prd_id', $id);
  $query2->execute();

  while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
    $subdata = array();
    $subdata[]  = $row2['cha_id'];
    $subdata[]  = $row2['ChasisName'];

    $data[] = $subdata;
  }
  echo json_encode($data);

  exit();
}

// BUAT ISI CAPACITY SESUAI PRODUKNYA
if (isset($_POST['prd_id2'])){
  include 'config.php';
  $data = array();
  $id = $_POST['prd_id2'];

  $query2 = $DBcon->prepare("SELECT *FROM table_capacity WHERE prd_id = :prd_id ORDER BY SizeName  ASC");
  $query2->bindParam(':prd_id', $id);
  $query2->execute();

  while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
    $subdata = array();
    $subdata[]  = $row2['siz_id'];
    $subdata[]  = $row2['SizeName'];

    $data[] = $subdata;
  }
  echo json_encode($data);

  exit();
}


// ISI FORM EDIT TEAMNYA
if (isset($_POST['ajax'])&&isset($_POST['team_id'])) {
  include 'config.php';
  $id = $_POST['team_id'];
  $query  = $DBcon->prepare("SELECT *FROM table_team WHERE team_id = '$id' ");
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $json_data = array(
      "team_id"     => $row['team_id'],
      "engineer"    => $row['engineer'],
      "functional"  => $row['functional'],
      "design"      => $row['design'],
      "subdesign"   => $row['subdesign'],
      "jobdesc"     => $row['jobdesc']
    );

    echo json_encode($json_data);
  }
  exit();
}

/*// VALIDASI NGECEK SUDAH ADA TYPESUPPY DAN TYPE DEMAND YANG SAMA SEBELUMNYA SUDAH DI SIMPAN DI DATABASE ATAU BELUM
if (isset($_POST['ajax_typeSupply']) && $_POST['ajax_typeDemand']) {
include 'config.php';
$typeSupply = $_POST['ajax_typeSupply'];
$typeDemand = $_POST['ajax_typeDemand'];

$query = $DBcon->prepare("SELECT *FROM table_type WHERE typeSupply = '$typeSupply' ");
$query2 = $DBcon->prepare("SELECT *FROM table_type WHERE typeDemand = '$typeDemand' ");
$query->execute();
$query2->execute();
$total = $query->rowCount();
$total2 = $query2->rowCount();

if ($total > 0 || $total2 > 0) {
$res = array(
"Status" => "NO"
);

echo json_encode($res);
}else{
$res = array(
"Status" => "YES"
);

echo json_encode($res);
}

exit();
}*/

?>
<!--############################################################################## HTML ########### -->

<html>
<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Information System 2018 - Editing Type</title>


  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="_jscript/js/jquery.uploadPreview.js"></script>
  <script src="_datatables/datatable/js/dataTables.select.js"></script>
  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/select.dataTables.css">
  <script src="_jscript/js/jquery.rtnotify.js"></script>

  <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
  <link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">
  <link rel="stylesheet" href="_jscript/css/jquery.rtnotify.css" media="all" />


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
    font-family:"Segoe UI";
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
    background-color: #fafaec;
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
  .input3 { width: 120px; }

  .area1{border:0px solid  #fff; width: 400px; padding:2px;}
  .area2{border:0px solid  #f00; width: 120px; }
  .area3{border:0px solid  #f00; width: 260px; }
  .area4{border:0px solid  #f00; width: 60px; height: 25px; vertical-align: text-bottom;}

  div.dataTables_wrapper {
    width: 902px;
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
          <li class="current"><a >Line Up</a></li>
          <li><a >Queue</a></li>
          <li><a >Note</a></li>
          <li><a >Reschedule</a></li>
          <li><a >Schedule</a></li>
          <li><a >Monitor</a></li>
        </ul>



        <div id="tab_lineup_type" class="tab-content">
          <ul class="tabs left">
            <li><a href="#tab_lineup_edittype"><i>Edit Type</i></a></li>
            <li><a href="#tab_lineup_editspec"><i>Edit Specification</i></a></li>
            <li><a href="#tab_lineup_editfea"><i>Edit Features</i></a></li>
            <li><a href="#tab_lineup_addteam"><i>Edit Teamwork</i></a></li>
          </ul>

          <!--############################################### EDIT TYPE ###############################################-->

          <div id="tab_lineup_edittype" class="tab-content">
            <table class="psi_width900" border="0">
              <tr>
                <td>
                  <div class="col_6 area1">

                    <div class="col_6">
                      <ul class="button-bar" id="nav1">
                        <li id="cancelback"><a><b><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</b></a></li>
                        <li id="btnedit1"><a>&nbsp;&nbsp;<b><i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save&Finish&nbsp;&nbsp;</b></a></li>
                      </ul>
                    </div>

                    <div class="col_6">
                      <ul class="button-bar">
                        <li title="Finish" id="btnfinish1"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                      </ul>
                    </div>


                    <div class="col_12">&nbsp;</div>

                    <div class="col_12"><b>Project</b></div>

                    <div class="col_6 area2">Project</div>
                    <div class="col_6 area3">
                      <input type="hidden" name="new_typeId" id="new_typeId" value="<?php echo $type_id ?>">
                      <select id="new_prj" name="new_prj" class="input1 mandatoryinput" disabled>
                        <?php 
                        include 'config.php';
                        $query = $DBcon->prepare("SELECT *FROM table_project ORDER BY ProjectName ASC");
                        $query->execute();
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['prj_id']; ?>"><?php echo $row['ProjectName']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

                    <div class="col_6 area2">NPDR No.</div>
                    <div class="col_6 area3"><input type="text" id="new_nonpdr"  class="mandatoryinput"/></div>

                    <div class="col_6 area2">File NPDR</div>
                    <div class="col_6 area3"><input type="file" id="new_filenpdr" title=" " accept=".pdf" /></div>

                    <div class="col_12">&nbsp;</div>
                    <div class="col_12"><hr class="alt2" /></div>


                    <div class="col_12"><b>Type</b></div>

                    <div class="col_6 area2">Plant</div>
                    <div class="col_6 area3">
                      <select id="new_plant" name="new_plant" class="input1">
                        <?php 
                        include 'config.php';
                        $query = $DBcon->prepare("SELECT *FROM table_plant WHERE name != '--' ORDER BY name ASC ");
                        $query->execute();
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['plant_id']; ?>"><?php echo $row['name']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

<!-- <div class="col_6 area2">Refer to</div>
  <div class="col_6 area3"><input class="input1" type="text" id="new_reffto" /></div> -->

  <div class="col_6 area2">Type Supply</div>
  <div class="col_6 area3"><input class="input1 mandatoryinput" type="text" id="new_typesupply"/></div>

  <div class="col_6 area2">Description</div>
  <div class="col_6 area3"><input type="text" id="new_desc"  class="mandatoryinput" placeholder="Description Type Supply"/></div>

  <div class="col_6 area2">Type Demand</div>
  <div class="col_6 area3"><input class="input1 mandatoryinput" type="text" id="new_typedemand"/></div>

  <div class="col_6 area2">Type Cetak</div>
  <div class="col_6 area3"><input class="input1 mandatoryinput" type="text" id="new_typecetak"/></div>

  <div class="col_6 area2">Format</div>
  <div class="col_6 area3">
    <select id="new_format" name="new_format" class="input1">
      <?php 
      include 'config.php';
      $query = $DBcon->prepare("SELECT *FROM table_format WHERE name != '--' ORDER BY name ASC ");
      $query->execute();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $row['format_id']; ?>"><?php echo $row['name']; ?></option>
        <?php 
      }
      ?>  
    </select>
  </div>

  <div class="col_6 area2">Product</div>
  <div class="col_6 area3">
    <select id="new_prd" name="new_prd" class="input1 mandatoryinput" disabled>
      <?php 
      include 'config.php';
      $query = $DBcon->prepare("SELECT *FROM table_product ORDER BY ProductName ASC");
      $query->execute();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $row['prd_id']; ?>"><?php echo $row['ProductName']; ?></option>
        <?php 
      }
      ?>  
    </select>
  </div>

  <div class="col_6 area2">Chasis</div>
  <div class="col_6 area3">
    <select id="new_chs" name="new_chs" class="input1 mandatoryinput">
    </select>
  </div>

  <div class="col_6 area2">Capacity</div>
  <div class="col_6 area3">
    <select id="new_cap" name="new_cap" class="input1 mandatoryinput">
    </select>
  </div>

  <div class="col_6 area2">Status</div>
  <div class="col_6 area3">
    <select id="new_sta" name="new_sta" class="input1 mandatoryinput">
      <?php 
      include 'config.php';
      $stmt = $DBcon->prepare("SELECT * FROM table_status ORDER BY StatusName ASC ");
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $row['sta_id'] ?>"><?php echo $row['StatusName']; ?></option>
        <?php 
      }
      ?>  
    </select>
  </div>

  <div class="col_6 area2">Start Date</div>
  <div class="col_6 area3"><input type="text" id="datestart" readonly disabled></div>

  <div class="col_6 area2">Finish Plan Date</div>
  <div class="col_6 area3"><input type="text" id="datefinish" readonly disabled></div>

  <div class="col_6 area2">Note</div>
  <div class="col_6 area3"><textarea type="text" class="mandatoryinput" id="new_note" /></textarea></div>

  <div class="col_12">
    <div id="image-preview" >
      <label for="image-upload" id="image-label">Upload Foto</label>
      <input type="file" name="image" id="image-upload" class="mandatoryinput" src="_upload/typePhoto/<?php echo $typePhoto; ?>" accept="image/*" />
    </div>
  </div>

</div>



<div class="col_6 area1">

  <div class="col_12">&nbsp;</div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12"><b>QS Field</b></div>

  <div class="col_6 area2">Made In</div>
  <div class="col_6 area3">
    <select id="new_made" name="new_made" class="input1">
      <?php 
      include 'config.php';
      $query = $DBcon->prepare("SELECT *FROM table_madein WHERE  name != '--' ORDER BY name ASC ");
      $query->execute();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $row['madein_id']; ?>"><?php echo $row['name']; ?></option>
        <?php 
      }
      ?>  
    </select>
  </div>

  <div class="col_6 area2">Mandatory</div>
  <div class="col_6 area3">
    <select id="new_mand" name="new_mand" class="input1">         
      <option value="Mandatory">Mandatory</option>
      <option value="SNI">SNI</option>
      <option value="TISI">TISI</option>
      <option value="No One">No One</option>
    </select>
  </div>

  <div class="col_6 area2">Class Product</div>
  <div class="col_6 area3">
    <select id="new_class" name="new_class" class="input1">
      <?php 
      include 'config.php';
      $stmt = $DBcon->prepare("SELECT * FROM table_classproduct ORDER BY name ASC");
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <option value="<?php echo $row['cp_id'] ?>"><?php echo $row['name']; ?></option>
        <?php 
      }
      ?> 
    </select>
  </div>

  <div class="col_6 area2">Model Family</div>
  <div class="col_6 area3"><input type="text" id="new_family"/></div>

  <div class="col_6 area2">No. BP</div>
  <div class="col_6 area3"><input type="text" id="new_nobp" placeholder="No. Buku Petunjuk"/></div>

  <div class="col_6 area2">No. POSTEL</div>
  <div class="col_6 area3"><input type="text" id="new_nopostel"/></div>

  <div class="col_6 area2">No. SNI</div>
  <div class="col_6 area3"><input type="text" id="new_nosni"/></div>

  <div class="col_6 area2">No. LsPro</div>
  <div class="col_6 area3"><input type="text" id="new_nolspro"/></div>

  <div class="col_6 area2">No. NRP/NPB</div>
  <div class="col_6 area3"><input type="text" id="new_nonrp"/></div>


  <div class="col_12">&nbsp;</div>
  <div class="col_12"><hr class="alt2" /></div>


  <div class="col_12"><b>Other</b></div>

  <div class="col_6 area2">Warranty Card</div>
  <div class="col_6 area3">
    <select id="new_warc" name="new_warc" class="input1">        
        <option value="YES">YES</option>
        <option value="NO">NO</option>
    </select>
  </div>
  <div class="col_6 area2">Warranty Year</div>
  <div class="col_6 area3">
    <select id="new_wary" name="new_wary" class="input1">       
      <option value="2018">2018</option>
      <option value="2019">2019</option>
    </select>
  </div>

  <div class="col_12">&nbsp;</div>
  <div class="col_12"><hr class="alt2" /></div>

</div>
</td>
</tr>
</table>
</div>

<div id="tab_lineup_editspec" class="tab-content">

  <ul class="tabs left">
    <li><a href="#tab_spec_art"><i>Artwork</i></a></li>
    <li><a href="#tab_spec_mec"><i>Mechanic</i></a></li>
    <li><a href="#tab_spec_cyc"><i>Cycle Unit</i></a></li>
    <li><a href="#tab_spec_ele"><i>Electronic</i></a></li>
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
  include "prj_editspec_".$index.".php";
  ?>
</div>




<div id="tab_lineup_editfea" class="tab-content">
  <table class="psi_width900" border="0">
    <tr>
      <td>
        <div class="col_4">
          <ul class="button-bar" id="nav1">
            <li id="cancelback"><a><b><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</b></a></li>
            <li id="btnedit2"><a><b>&nbsp;&nbsp;<i class="fa fa-save fa-sm"></i>&nbsp;&nbsp;Save&nbsp;&nbsp;</b></a></li>
          </ul>
        </div> 
        <div class="col_8">
          <ul class="button-bar">
            <li title="Finish" id="btnfinish2"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
          </ul>
        </div> 
      </td>
    </tr>
  </table>                 


  <table id="table_fea" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <th>Feature</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>

      <?php
      include 'config.php';

      $stmt = $DBcon->prepare("SELECT * FROM table_featurespec tfs JOIN table_feature tf ON tfs.fea_id = tf.fea_id WHERE type_id = :type_id");
      $stmt->bindParam(':type_id', $vId);
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr >
          <td><input type="checkbox" id="cekFea" name="cekFea[]" checked value="<?php echo $row['fea_id']; ?>"></td>
          <td><?php echo  $row['FeatureName']; ?></td>
          <td></td>
        </tr>
        <?php 
      }
      ?> 

      <?php
      include 'config.php'; 

      $stmt2 = $DBcon->prepare("SELECT fea_id, FeatureName FROM table_feature WHERE prd_id = :prd_id AND fea_id NOT IN(SELECT fea_id FROM table_featurespec WHERE type_id = :type_id)");
      $stmt2->bindParam(':prd_id', $prd_id);
      $stmt2->bindParam(':type_id', $vId);
      $stmt2->execute();
      while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr >
          <td><input type="checkbox" id="cekFea" name="cekFea[]" value="<?php echo $row2['fea_id']; ?>"></td>
          <td><?php echo  $row2['FeatureName']; ?></td>
          <td></td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>




</div> 

<!-- ####################################### ADD AND REMOVE ######################################################################-->

<div id="tab_lineup_addteam" class="tab-content">
  <table class="psi_width900" border="0">
    <tr>
      <td>
        <div class="col_2">
          <ul class="button-bar">
            <li title="Add New" id="addnewiteam"><a><i class="fa fa-plus fa-sm"></i></a></li>
            <li title="Edit" id="edititeam"><a><i class="fa fa-pencil fa-sm"></i></a></li>
            <li title="Delete" id="deliteam"><a><i class="fa fa-trash fa-sm"></i></a></li>
            <li title="Refresh" id="refreshiteam"><a><i class="fa fa-sync fa-sm"></i></a></li>
          </ul>
        </div>
        <div class="col_10">
          <ul class="button-bar">
            <li title="Finish" id="btnfinish4"><a>&nbsp;&nbsp;&nbsp;<b><i class="fa fa-flag-checkered fa-sm"></i>&nbsp;&nbsp;&nbsp;Finish Editing</b>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
          </ul>
        </div>
      </td>
    </tr>
  </table>


  <div id="addnewteam">
    <ul class="tabs left">
      <li id="aaa"><a href="#TabAddTeam">Add Member&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabAddTeam" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Engineer</div>
            <div class="col_4">
              <select id="add_team_eng" name="add_team_eng" class="input2">
                <option value="-" selected disabled>--</option>
                <?php
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT * FROM table_manpower WHERE Otorisasi = 'engineer' ORDER BY ManName ASC ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?> 
              </select>
            </div>
            <div class="col_6"><input type="hidden" id="new_typeid" value="<?php echo $type_id; ?>" /></div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Functional</div>
            <div class="col_4">
              <select id="add_team_func" name="add_team_func" class="input2">
                <option value="-" selected disabled>--</option>
                <?php
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT * FROM table_manpower ORDER BY ManName ASC ");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?> 
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Design</div>
            <div class="col_4"><input type="text" id="add_team_design" /></div>
            <div class="col_6 ">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">SubDesign</div>
            <div class="col_4"><input type="text" id="add_team_subdesign" /></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Job Description</div>
            <div class="col_9"><textarea type="text" id="add_team_job" /></textarea></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2"></div>
            <div class="col_2"><button id="addteam" class="psi_button1" tabindex="6"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>


  <div id="editingteam">
    <ul class="tabs left">
      <li id="bbb"><a href="#TabEditTeam"><span id="responseteam"></span>&nbsp;&nbsp;&nbsp;&nbsp;<i id="backicon" title="close" class="fa fa-remove fa-sm backicon" style="color: #700;"></i></a></li>
    </ul>
    <div id="TabEditTeam" class="tab-content">
      <table class="psi_width600" border="0">
        <tr>
          <td>
            <div class="col_2">Engineer</div>
            <div class="col_4">
              <select id="editEngineer">
                <?php
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT * FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Functional</div>
            <div class="col_4">
              <select id="editFunctional">
                <?php
                include 'config.php';
                $stmt = $DBcon->prepare("SELECT * FROM table_manpower");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option><?php echo $row['ManName']; ?></option>
                  <?php 
                } 
                ?>
              </select>
            </div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Design</div>
            <div class="col_4"><input type="text" id="editDesign"/></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">SubDesign</div>
            <div class="col_4"><input type="text" id="editSubdesign"/></div>
            <div class="col_6">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">Job Description</div>
            <div class="col_9"><textarea type="text" id="editJobdesc" /></textarea></div>
            <div class="col_1">&nbsp;</div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="col_2">&nbsp;</div>
            <div class="col_2"><button id="saveteam" class="psi_button1"><i class="fa fa-save fa-sm"></i> Save</button></div>
            <div class="col_8">&nbsp;</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <table id="example" class="display" style="width:905px">
    <thead>
      <tr>
        <th></th>
        <th>Engineer</th>
        <th>Functional</th>
        <th>Design</th>
        <th>Sub Design</th>
        <th>Job Description</th>
      </tr>
    </thead>
  </table>
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
  <table>
    <tr>
      <td height="15" ></td>
    </tr>
    <tr>
      <td height="15" ></td>
    </tr>

  </table>

</div>

</div>





</div>
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#new_prj').val(<?php echo $prj_id ?>);
    $('#new_nonpdr').val("<?php echo $noNdpr ?>");
    $('#new_plant').val(<?php echo $plant_id ?>);
    $('#new_typesupply').val("<?php echo $typeSupply ?>");
    $('#new_desc').val("<?php echo $typeSupplyDesc ?>");
    $('#new_typedemand').val("<?php echo $typeDemand ?>");
    $('#new_typecetak').val("<?php echo $typeDemand ?>");
    $('#new_format').val(<?php echo $format_id ?>);
    $('#new_prd').val(<?php echo $prd_id ?>);
    $('#new_chs').val(<?php echo $cha_id ?>);
    $('#new_cap').val(<?php echo $siz_id ?>);
    $('#new_note').val("<?php echo $typeNote ?>");
    $('#new_made').val(<?php echo $made_in ?>);
    $('#new_mand').val("<?php echo $mandatory ?>");
    $('#new_class').val(<?php echo $cp_id ?>);
    $('#new_family').val("<?php echo $modelFamily ?>");
    $('#new_nobp').val("<?php echo $noBukuPetunjuk ?>");
    $('#new_nopostel').val("<?php echo $noPostel ?>");
    $('#new_nosni').val("<?php echo $noSni ?>");
    $('#new_nolspro').val("<?php echo $noLsPro ?>");
    $('#new_nonrp').val("<?php echo $noNrpNpb ?>");
    $('#new_warc').val("<?php echo $warantyCard ?>");
    $('#new_wary').val("<?php echo $warantyYear ?>");
    $('#new_sta').val(<?php echo $sta_id ?>);
    $('#datestart').val("<?php echo $TypeStartDate ?>");
    $('#datefinish').val("<?php echo $TypeFinishDate ?>");
  });
</script>



<script>
  $( function() {
    $( "#datestart" ).datepicker({ dateFormat: 'dd MM yy' });
    $( "#datefinish" ).datepicker({ dateFormat: 'dd MM yy' });
  });


  $(document).ready(function() {
    $('#btnedit1, #btnedit2').on('click', function() {

      var form_data = new FormData();


      var itype_id          = $('#new_typeId').val();
      var iprj_id           = $('#new_prj').val();
      var inoNdpr           = $('#new_nonpdr').val();
      var indprName         = $('#new_filenpdr').prop('files')[0];
      var iplant_id         = $('#new_plant').val();
      var itypeSupply       = $('#new_typesupply').val();
      var itypeSupplyDesc   = $('#new_desc').val();
      var itypeDemand       = $('#new_typedemand').val();
      var itypeCetak        = $('#new_typecetak').val();
      var iformat_id        = $('#new_format').val();
      var iprd_id           = $('#new_prd').val();
      var icha_id           = $('#new_chs').val();
      var isiz_id           = $('#new_cap').val();
      var itypeNote         = $('#new_note').val();
      var itypePhoto        = $('#image-upload').prop('files')[0];
      var imade_in          = $('#new_made').val();
      var imandatory        = $('#new_mand').val();
      var icp_id            = $('#new_class').val();
      var iModelFamily      = $('#new_family').val();
      var inoBukuPetunjuk   = $('#new_nobp').val();
      var inoPostel         = $('#new_nopostel').val();
      var inoSni            = $('#new_nosni').val();
      var inoLsPro          = $('#new_nolspro').val();
      var inoNrpNpb         = $('#new_nonrp').val();
      var iwarantyCard      = $('#new_warc').val();
      var iwarantyYear      = $('#new_wary').val();
      var ista_id           = $('#new_sta').val();
      var iTypeStartDate    = $('#datestart').val();
      var iTypeFinishDate   = $('#datefinish').val();

// SPEC PRODUCT AC
if (iprd_id == 2){

  var ibodyColor        = $('#spec_color').val();
  var iaccColor         = $('#acc_color').val();
  var iacArtSpecDesign  = $("#new_artspec").prop('files')[0];
  var idimension_id     = $('#spec_stsdim').val();
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
  var icontainer        = $('#spec_container').val();
  var iacMecSpecDesign  = $('#new_mecspec').prop('files')[0];
  var iCCTRwatt         = $('#new_CCTRwatt').val();
  var iCCTRbtu          = $('#new_CCTRbtu').val();
  var iRCCwatt          = $('#new_RCCwatt').val();
  var iRCCbtu           = $('#new_RCCbtu').val();
  var iEerHasil         = $('#new_EerHasil').val();
  var iKonversi         = $('#new_Konversi').val();
  var iEerLabel         = $('#new_EerLabel').val();
  var irefrigerant_id   = $('#spec_refrigerant').val();
  var irefrigerant_w    = $('#new_refrigerant_w').val();
  var icompressorType   = $('#new_compressorType').val();
  var icompressorModel  = $('#new_compressorModel').val();
  var icompressorBrand  = $('#new_compressorBrand').val();
  var iexpansion        = $('#new_expansion').val();
  var iAFV              = $('#new_AFV').val();
  var iOFM              = $('#new_OFM').val();
  var iFMOT             = $('#new_FMOT').val();
  var icondensorType    = $('#new_condensorType').val();
  var ievaporatorType   = $('#new_evaporatorType').val();
  var iINL              = $('#new_INL').val();
  var iONL              = $('#new_ONL').val();
  var iacCycSpecDesign  = $('#new_cycSpec').prop('files')[0];
  var iacPwrSupply      = $('#new_acPwrSupply').val();
  var itestDM           = $('#new_testDM').val();
  var itestAM           = $('#new_testAM').val();
  var istandartDM       = $('#new_standartDM').val();
  var istandartAM       = $('#new_standartAM').val();
  var isltDP            = $('#new_sltDP').val();
  var isltAP            = $('#new_sltAP').val();
  var isilDP            = $('#new_silDP').val();
  var isilAP            = $('#new_silAP').val();
  var iacEC             = $('#new_acEC').val();
  var iacElecSpecDesign = $('#new_elecspec').prop('files')[0];

  form_data.append('bodyColor', ibodyColor);
  form_data.append('accColor', iaccColor);
  form_data.append('acArtSpecDesign', iacArtSpecDesign);
  form_data.append('dimension_id', idimension_id);
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
  form_data.append('container', icontainer);
  form_data.append('acMecSpecDesign', iacMecSpecDesign);
  form_data.append('CCTRwatt', iCCTRwatt);
  form_data.append('CCTRbtu', iCCTRbtu);
  form_data.append('RCCwatt', iRCCwatt);
  form_data.append('RCCbtu', iRCCbtu);
  form_data.append('EerHasil', iEerHasil);
  form_data.append('Konversi', iKonversi);
  form_data.append('EerLabel', iEerLabel);
  form_data.append('refrigerant_id', irefrigerant_id);
  form_data.append('refrigerant_w', irefrigerant_w);
  form_data.append('compressorType', icompressorType);
  form_data.append('compressorModel', icompressorModel);
  form_data.append('compressorBrand', icompressorBrand);
  form_data.append('expansion', iexpansion);
  form_data.append('AFV', iAFV);
  form_data.append('OFM', iOFM);
  form_data.append('FMOT', iFMOT);
  form_data.append('condensorType', icondensorType);
  form_data.append('evaporatorType', ievaporatorType);
  form_data.append('INL', iINL);
  form_data.append('ONL', iONL);
  form_data.append('acCycSpecDesign', iacCycSpecDesign);
  form_data.append('acPwrSupply', iacPwrSupply);
  form_data.append('testDM', itestDM);
  form_data.append('testAM', itestAM);
  form_data.append('standartDM', istandartDM);
  form_data.append('standartAM', istandartAM);
  form_data.append('sltDP', isltDP);
  form_data.append('sltAP', isltAP);
  form_data.append('silDP', isilDP);
  form_data.append('silAP', isilAP);
  form_data.append('acEC', iacEC);
  form_data.append('acElecSpecDesign', iacElecSpecDesign);

// SPEC PRODUCT CHEST FREEZER
}else if (iprd_id == 7){

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

// SPEC PRODUCT RF
}else if (iprd_id == 1){

  var icolor_id             = $('#spec_color').val();
  var ipattern_id           = $('#spec_pattern').val();
  var ifinishing_id         = $('#spec_fin').val();
  var idLinerMaterial       = $('#new_linermat').val();
  var idInteriorMateri      = $('#new_intmat').val();
  var idStamping            = $('#new_stamping').val();
  var idEggPocket           = $('#new_eggpocket').val();
  var idEggHolder           = $('#new_egghold').val();
  var idUtilityPocket       = $('#new_utility').val();
  var idBottlePocket        = $('#new_bootle').val();
  var icColor               = $('#new_cabcolor').val();
  var icSidePanelMat        = $('#new_spanelmat').val();
  var iaHandle              = $('#spec_handle').val();
  var ihandle_id            = $('#spec_handletype').val();
  var iaBaseboard           = $('#spec_basebrd').val();
  var iaWaterdispenser      = $('#spec_waterdis').val();
  var irack_id              = $('#spec_rack').val();
  var iaIceTwistTray        = $('#new_ittray').val();
  var iaIceBank             = $('#new_icebank').val();
  var iaIceTray             = $('#new_icetray').val();
  var iaFrezzerPocket       = $('#new_freezer').val();
  var iaLamp                = $('#new_lamp').val();
  var iaChiller             = $('#new_chiller').val();
  var iaShelf               = $('#new_shelf').val();
  var iaSheildedMoist       = $('#new_smoisture').val();
  var iaCrisper             = $('#new_chrisper').val();
  var ArtSpecDesign         = $('#new_artspec').prop('files')[0];
  var idimension_id         = $('#spec_stsdim').val();
  var imechProdW            = $('#spec_prdw').val();
  var imechProdL            = $('#spec_prdd').val();
  var imechProdH            = $('#spec_prdh').val();
  var imechPackW            = $('#spec_pacw').val();
  var imechPackL            = $('#spec_pacd').val();
  var imechPackH            = $('#spec_pach').val();
  var ipacking_id           = $('#spec_pacname').val();
  var imechVolNet           = $('#spec_volumenett').val();
  var imechVolGros          = $('#spec_volumegross').val();
  var imechWeightNet        = $('#spec_weightnett').val();
  var imechWeightGros       = $('#spec_weightgross').val();
  var imechContainer        = $('#spec_container').val();
  var MechSpecDesign        = $('#new_mecspec').prop('files')[0];
  var irollbond_id          = $('#spec_rollb').val();
  var irollbondtype_id      = $('#spec_rollbtype').val();
  var itemperature_id       = $('#spec_tcontrol').val();
  var icycDripTray          = $('#spec_driptray').val();
  var iclimate_id           = $('#spec_cliclass').val();
  var icondensor_id         = $('#spec_cond').val();
  var irefrigerant_id       = $('#spec_refri').val();
  var icycMoR               = $('#new_MoR').val();
  var icycRatedCurrent      = $('#new_rateCur').val();
  var icycRatedPower        = $('#new_ratePwr').val();
  var icycCompressor        = $('#new_compressor').val();
  var icycCoolingCapacity   = $('#new_coolingCap').val();
  var icycCapillaryTube     = $('#new_CTD').val();
  var icycFreezingTemp      = $('#new_freezTemp').val();
  var icycEnergyConsumption = $('#new_energyCons').val();
  var CycSpecDesign         = $('#new_cycSpec').prop('files')[0];
  var irv_id                = $('#spec_rv').val();
  var iwv_id                = $('#spec_wv').val();
  var ielecRF               = $('#new_rf').val();
  var ielecRC               = $('#new_rc').val();
  var ielecRP               = $('#new_rp').val();
  var ielecRPH              = $('#new_rph').val();
  var ielecMaxLamp          = $('#new_rml').val();
  var ElecSpecDesign        = $('#new_elecspec').prop('files')[0];

  form_data.append('color_id', icolor_id);
  form_data.append('pattern_id', ipattern_id);
  form_data.append('finishing_id', ifinishing_id);
  form_data.append('dLinerMaterial', idLinerMaterial);
  form_data.append('dInteriorMateri', idInteriorMateri);
  form_data.append('dStamping', idStamping);
  form_data.append('dEggPocket', idEggPocket);
  form_data.append('dEggHolder', idEggHolder);
  form_data.append('dUtilityPocket', idUtilityPocket);
  form_data.append('dBottlePocket', idBottlePocket);
  form_data.append('cColor', icColor);
  form_data.append('cSidePanelMat', icSidePanelMat);
  form_data.append('aHandle', iaHandle);
  form_data.append('handle_id', ihandle_id);
  form_data.append('aBaseboard', iaBaseboard);
  form_data.append('aWaterdispenser', iaWaterdispenser);
  form_data.append('rack_id', irack_id);
  form_data.append('aIceTwistTray', iaIceTwistTray);
  form_data.append('aIceBank', iaIceBank);
  form_data.append('aIceTray', iaIceTray);
  form_data.append('aFrezzerPocket', iaFrezzerPocket);
  form_data.append('aLamp', iaLamp);
  form_data.append('aChiller', iaChiller);
  form_data.append('aShelf', iaShelf);
  form_data.append('aSheildedMoist', iaSheildedMoist);
  form_data.append('aCrisper', iaCrisper);
  form_data.append('ArtSpecDesign', ArtSpecDesign);
  form_data.append('dimension_id', idimension_id);
  form_data.append('mechProdW', imechProdW);
  form_data.append('mechProdL', imechProdL);
  form_data.append('mechProdH', imechProdH);
  form_data.append('mechPackW', imechPackW);
  form_data.append('mechPackL', imechPackL);
  form_data.append('mechPackH', imechPackH);
  form_data.append('packing_id', ipacking_id);
  form_data.append('mechVolNet', imechVolNet);
  form_data.append('mechVolGros', imechVolGros);
  form_data.append('mechWeightNet', imechWeightNet);
  form_data.append('mechWeightGros', imechWeightGros);
  form_data.append('mechContainer', imechContainer);
  form_data.append('MechSpecDesign', MechSpecDesign);
  form_data.append('rollbond_id', irollbond_id);
  form_data.append('rollbondtype_id', irollbondtype_id);
  form_data.append('temperature_id', itemperature_id);
  form_data.append('cycDripTray', icycDripTray);
  form_data.append('climate_id', iclimate_id);
  form_data.append('condensor_id', icondensor_id);
  form_data.append('refrigerant_id', irefrigerant_id);
  form_data.append('cycMoR', icycMoR);
  form_data.append('cycRatedCurrent', icycRatedCurrent);
  form_data.append('cycRatedPower', icycRatedPower);
  form_data.append('cycCompressor', icycCompressor);
  form_data.append('cycCoolingCapacity', icycCoolingCapacity);
  form_data.append('cycCapillaryTube', icycCapillaryTube);
  form_data.append('cycFreezingTemp', icycFreezingTemp);
  form_data.append('cycEnergyConsumption', icycEnergyConsumption);
  form_data.append('CycSpecDesign', CycSpecDesign);
  form_data.append('rv_id', irv_id);
  form_data.append('wv_id', iwv_id);
  form_data.append('elecRF', ielecRF);
  form_data.append('elecRC', ielecRC);
  form_data.append('elecRP', ielecRP);
  form_data.append('elecRPH', ielecRPH);
  form_data.append('elecMaxLamp', ielecMaxLamp);
  form_data.append('ElecSpecDesign', ElecSpecDesign);

// SPEC PRODUCT SC
}else if (iprd_id == 3){

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

// SPEC PRODUCT WM
}else if (iprd_id == 4){

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

// SPEC PRODUCT WD
}else if (iprd_id == 6){
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

  form_data.append('color_id', icolor_id);
  form_data.append('wmArtSpecDesign', iwdArtSpecDesign);
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

// SPEC PRODUCT RICE COOKER
}else if (iprd_id == 5){

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

}

var iFea  = new Array();
$('#cekFea:checked').each(function() {
  iFea.push($(this).val());
});

form_data.append('type_id', itype_id);
form_data.append('prj_id', iprj_id);
form_data.append('noNdpr', inoNdpr);
form_data.append('ndprName', indprName);
form_data.append('plant_id', iplant_id);
form_data.append('typeSupply', itypeSupply);
form_data.append('typeSupplyDesc', itypeSupplyDesc);
form_data.append('typeDemand', itypeDemand);
form_data.append('typeCetak', itypeCetak);
form_data.append('format_id', iformat_id);
form_data.append('prd_id', iprd_id);
form_data.append('cha_id', icha_id);
form_data.append('siz_id', isiz_id);
form_data.append('typeNote', itypeNote);
form_data.append('typePhoto', itypePhoto);
form_data.append('made_in', imade_in);
form_data.append('mandatory', imandatory);
form_data.append('cp_id', icp_id);
form_data.append('ModelFamily', iModelFamily);
form_data.append('noBukuPetunjuk', inoBukuPetunjuk);
form_data.append('noPostel', inoPostel);
form_data.append('noSni', inoSni);
form_data.append('noLsPro', inoLsPro);
form_data.append('noNrpNpb', inoNrpNpb);
form_data.append('warantyCard', iwarantyCard);
form_data.append('warantyYear', iwarantyYear);
form_data.append('sta_id', ista_id);
form_data.append('TypeStartDate', iTypeStartDate);
form_data.append('TypeFinishDate', iTypeFinishDate);

form_data.append('fea_id', iFea);


$.ajax({
  url         : "_saveedittype.php",
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
      title   : "",
      text    : "Perubahan berhasil disimpan di database.",
      icon    : "success",
      type    : "success",
      timer   : 1000, 
    }, function(){
      window.location.href = "#";
      location.reload(true);
    });
  },
  error     : function(){
    swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
  }
});
});
});

$(document).ready(function() {
  $('#btnfinish1, #btnfinish2, #btnfinish3a, #btnfinish3b, #btnfinish3c, #btnfinish3d, #btnfinish4').on('click', function() {

    var assign            = <?php echo $assign ?>;

    if (assign == 1) {
      window.location.href = "psi_project.php#tab_lineup";
    }else{
      window.location.href = "psi_project.php#tab_que";
    }

  });
});


$("#cancelback, #cancelback1, #cancelback2, #cancelback3, #cancelback4, #cancelback5").click( function() {
  window.location.href = "psi_project.php#tab_que";
});


$('#table_fea').DataTable({
  "dom"         : "rtip",
  "bAutoWidth"  : false,     
  "order"       : [[0, "asc"]],
  "bPaginate"   : false,
  "binfo"       : false,
  "scrollX"     : true,
  "scrollY"     : 350,
  "columnDefs"  : [
  {
    "targets"   : [ 0 ], 
    "className" : "dt-left",
    "orderable" : false,
    "width"     : 5,

  },{ 
    "targets"   : [ 1 ], 
    "className" : "dt-left",
    "orderable" : false,
    "width"     : 300
  },{ 
    "targets"   : [ 1 ], 
    "className" : "dt-left",
    "orderable" : false,
    "width"     : 600
  }
  ]
});


$("#addnewteam, #editingteam").hide();
$("#addnewiteam").click(function() { $("#addnewteam").show(300);  });
$("#edititeam").click(function()   { $("#editingteam").show(300); });
$("#edititeam, #deliteam, #refreshiteam").click(function()   { $("#addnewteam").hide(300);  });
$("#addnewiteam, #deliteam, #refreshiteam").click(function() { $("#editingteam").hide(300); });


$(document).ready(function(){
  TeamworkFunction();
});

function TeamworkFunction(){
  $('.clearcheckbox').val('');
  var iType_id = $('#new_typeId').val();
  $('#example').DataTable({
    "dom"         : "rtip",
    "destroy"     : true,
    "processing"  : true,
    "pageLength"  : 20,
    "serverSide"  : true,
    "stateSave"   : true,
    "select"      : { style :  "single", selector: "td" },
    "bAutoWidth"  : false,     
    "order"       : [[1, "asc"]],
    "scrollX"     : true,
    "scrollY"     : 350,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "orderable" : false,
      "width"     : 5,
      "className" : "select-checkbox"    

    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 125
    },{ 
      "targets"   : [ 5 ], 
      "className" : "dt-left",
      "width"     : 400
    }
    ],
    "ajax"        : {
      url   : 'fetchteam.php',
      type  : 'POST',
      data  : {type_id : iType_id}
    }
  });

  var table = $('#example').DataTable();
  $('#example tbody').off('click');
  $('#example tbody').on( 'click', 'tr', function () {
    var data = table.row( this ).data();
    $('.select-checkbox').html('<input type="hidden" class="clearcheckbox" id="addid" name="addid" value="'+data[6]+'"/>');
  } );
}


$("#refreshiteam").click(function() {
  TeamworkFunction();
});


function clearForm() {
  $('#add_team_eng').val('-');
  $('#add_team_func').val('-');
  $('#add_team_design').val('');
  $('#add_team_subdesign').val('');
  $('#add_team_job').val('');
}


//--------------------------------------------------------------------Insert Team

$(document).ready(function() {
  $('#addteam').on('click', function() {
    var iType_id      = $('#new_typeId').val();
    var iEngineer     = $('#add_team_eng').val();
    var iFunctional   = $('#add_team_func').val();
    var iDesign       = $('#add_team_design').val();
    var iSubDesign    = $('#add_team_subdesign').val();
    var iJobDesc      = $('#add_team_job').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxsaveaddteam.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        type_id     : iType_id,
        engineer    : iEngineer,
        functional  : iFunctional,
        design      : iDesign,
        subdesign   : iSubDesign,
        jobdesc     : iJobDesc
      },
      success   : function(){
        swal({   
          showConfirmButton: false,
          title   : "",
          text    : "Teamwork baru berhasil ditambahkan.",
          icon    : "success",
          type    : "success",
          timer   : 1000,  
        });
        TeamworkFunction();
        clearForm();
      }
    });

  });
});
////--------------------------------------------------------------------Edit Teamwork
$(document).ready(function() {
  $('#edititeam').on('click',function() {
    var isChecked = $("#addid").val();
    if (!isChecked) {
      swal({   
        showConfirmButton: false,
        title   : "",
        text    : "Pilih salah satu yang akan diedit",
        type    : "info",
        timer   : 1000,  
      });
      $('#editingteam').hide();
    }else{
      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          ajax    : 1,
          team_id  : isChecked
        },
        success : function(data) {
          $('#responseteam').text('Edit');
          $('#editEngineer').prepend('<input type="hidden" id="editID" value="'+data['team_id']+'"><option selected="selected">'+data['engineer']+'</option>');
          $('#editFunctional').prepend('<option selected="selected">'+data['functional']+'</option>');
          $('#editDesign').val(data['design']);
          $('#editSubdesign').val(data['subdesign']);
          $('#editJobdesc').text(data['jobdesc']);
        }
      });
    }
  });
});


$(document).ready(function() {
  $('#saveteam').on('click',function() {
    var iteamid      = $('#editID').val();
    var iEngineer    = $('#editEngineer').val();
    var iFunctional  = $('#editFunctional').val();
    var iDesign      = $('#editDesign').val();
    var iSubDesign   = $('#editSubdesign').val();
    var iJobDesc     = $('#editJobdesc').val();

    $.ajax({
      type      : "POST",
      url       : "_ajaxeditteam.php",
      cache     : false,
      async     : true,
      dataType  : "text",
      data      : {
        team_id     : iteamid,
        engineer    : iEngineer,
        functional  : iFunctional,
        design      : iDesign,
        subdesign   : iSubDesign,
        jobdesc     : iJobDesc
      },
      success   : function(){
        swal({   
          showConfirmButton: false,
          title   : "Berhasil",
          text    : "Teamwork berhasil diperbarui.",
          icon    : "success",
          type    : "success",
          timer   : 1000,  
        });
        TeamworkFunction();
        $('#editingteam').hide(300);
      },
      error     : function(){
        swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
      }
    });
  });
});


////--------------------------------------------------------------------Delete Teamwork
$(document).ready(function(){
  $('#deliteam').on('click', function(e){
//var isChecked = $("input[name=cekteam]:checked").val();
var isChecked = $("#addid").val();
if (!isChecked){
  swal({   
    showConfirmButton: false,
    title   : "",
    text    : "Pilih salah satu yang akan dihapus",
    type    : "info",
    timer   : 1000,

  });
}else{
  swal({
    title   : "Perhatian",
    text    : "Hapus Item Teamwork No: "+isChecked+" dari database?",
    showCancelButton: true, 
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus saja!",
    cancelButtonText: "Batalkan",
    closeOnConfirm: false,
    closeOnCancel: false
  },

  function(isConfirm){
    if (isConfirm) {
      $.ajax({
        type  : "POST",
        url   : "_ajaxdelteam.php",
        cache : false,
        async : true,
        data  : {
          team_id:isChecked
        },
        success: function(){
          swal({   
            showConfirmButton: false,
            title: "",
            text : "Teamwork berhasil dihapus",
            type : "success",  
            timer   : 1000,
          });
          TeamworkFunction();

        },
        error: function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    } else {
      swal({   
        showConfirmButton: false,
        title: "",
        text : "Teamwork batal dihapus",
        type : "error",  
        timer   : 1000,
      });
      TeamworkFunction();
    }
  });
}
});
});


$('#finish').on('click',function() {
  window.location.href = "psi_project.php#tab_que";
});


$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  window.location.href = "psi_project.php#tab_que";  
}
});



$('.mandatoryinput').css('background-color', '#fafaec');

</script>


<!-- VALIDASI CHASSIS YANG DIGUNAKAN SESUAI PRODUK -->
<script type="text/javascript">
  $(document).ready(function() {
    var prd_id = $('#new_prd').val();


    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        prd_id  : prd_id
      },
      success : function(data) {
        $('#new_chs').html('<option value="-" selected disabled>--</option>');
        for (var i = 0; i < data.length; i++) {
          $('#new_chs').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
        }
        $('#new_chs').val(<?php echo $cha_id ?>);
      }
    });
  });


// VALIDASI CAPACITY YANG DIGUNAKAN SESUAI PRODUK
  $(document).ready(function() {
    var prd_id = $('#new_prd').val();


    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        prd_id2  : prd_id
      },
      success : function(data) {
        $('#new_cap').html('<option value="-" selected disabled>--</option>');
        for (var i = 0; i < data.length; i++) {
          $('#new_cap').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
        }
        $('#new_cap').val(<?php echo $siz_id ?>);
      }
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



<script src="_jscript/js/stickmenu.js"></script>
</body>
</html>