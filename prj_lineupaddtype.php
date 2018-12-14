<?php
session_start();
$currentmenu = "2";
// include_once ("psi_link.php");


// VALIDASI NGECEK SUDAH ADA TYPESUPPY DAN TYPE DEMAND YANG SAMA SEBELUMNYA SUDAH DI SIMPAN DI DATABASE ATAU BELUM
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
}

// VALIDASI UNTUK PEMILIHAN PRODUK, TYPE STARTDATE DAN TYPEFINISH DATE BERDASARKAN PROJECT YANG DIPILIH
if (isset($_POST['prj_id'])) {
  include 'config.php';
  $id = $_POST['prj_id'];
  $query  = $DBcon->prepare("SELECT prd_id, ProjectMarket, ProjectStartDate, ProjectFinishDate FROM table_project WHERE prj_id = '$id' ");
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

    $res  = array(
      'prd_id'            => $row['prd_id'],
      'ProjectStartDate'  => $row['ProjectStartDate'],
      'ProjectFinishDate' => $row['ProjectFinishDate'],
      'ProjectMarket'     => $row['ProjectMarket']
    );

    echo json_encode($res);

  }

  exit();
}


// VALIDASI AWAL HALAMAN DIBUKA MENENTUKA PLANT NYA
if (isset($_POST['prj2'])) {
  include 'config.php';
  $gp_name = '';
  $prj2    = $_POST['prj2'];
  $query  = $DBcon->prepare("SELECT tgp.gp_id AS gp_id, tgp.group_ProductName AS group_ProductName FROM table_project tp JOIN table_groupproduct tgp ON tp.gp_id = tgp.gp_id WHERE prj_id = :prj2 ");
  $query->bindParam(':prj2', $prj2);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $gp_name = $row['group_ProductName'];
    if ($gp_name == "Home APP") {
      $query2 = $DBcon->prepare("SELECT *FROM table_plant WHERE name = '1800' ");
      $query2->execute();
      while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
        $res = array(
          'plant_id'  => $row2['plant_id'],
          'name'      => $row2['name'],
        );

        echo json_encode($res);
      }
    }else if($gp_name == "Audio"){
      $query2 = $DBcon->prepare("SELECT *FROM table_plant WHERE name = '1300' ");
      $query2->execute();
      while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
        $res = array(
          'plant_id'  => $row2['plant_id'],
          'name'      => $row2['name'],
        );

        echo json_encode($res);
      }
    }else if ($gp_name == "Video") {
      $query2 = $DBcon->prepare("SELECT *FROM table_plant WHERE name = '1200' ");
      $query2->execute();
      while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
        $res = array(
          'plant_id'  => $row2['plant_id'],
          'name'      => $row2['name'],
        );

        echo json_encode($res);
      }
    }
  }
  exit();
}

// VALIDASI CHASSIS YANG ADA SESUAI PRODUK YANG DIPILIH
if (isset($_POST['prj3'])){
  include 'config.php';
  $data = array();
  $id = $_POST['prj3'];
  $prd_id = '';
  $query = $DBcon->prepare("SELECT prd_id FROM table_project WHERE prj_id = :prj_id ");
  $query->bindParam(':prj_id', $id);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $prd_id = $row['prd_id'];

    $query2 = $DBcon->prepare("SELECT *FROM table_chasis WHERE prd_id = :prd_id ORDER BY ChasisName  ASC");
    $query2->bindParam(':prd_id', $prd_id);
    $query2->execute();

    while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[]  = $row2['cha_id'];
      $subdata[]  = $row2['ChasisName'];

      $data[] = $subdata;
    }
    echo json_encode($data);
  }
  exit();
}

// VALIDASI CAPACITY YANG ADA SESUAI PRODUK YANG DIPILIH
if (isset($_POST['prj4'])){
  include 'config.php';
  $data = array();
  $id = $_POST['prj4'];
  $prd_id = '';
  $query = $DBcon->prepare("SELECT prd_id FROM table_project WHERE prj_id = :prj_id ");
  $query->bindParam(':prj_id', $id);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $prd_id = $row['prd_id'];

    $query2 = $DBcon->prepare("SELECT *FROM table_capacity WHERE prd_id = :prd_id ORDER BY SizeName  ASC");
    $query2->bindParam(':prd_id', $prd_id);
    $query2->execute();

    while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[]  = $row2['siz_id'];
      $subdata[]  = $row2['SizeName'];

      $data[] = $subdata;
    }
    echo json_encode($data);
  }
  exit();
}

// VALIDASI CHASSIS YANG ADA SESUAI PRODUK YANG DIPILIH DARI REFER TYPE
if (isset($_POST['type_id2'])){
  include 'config.php';
  $data = array();
  $id = $_POST['type_id2'];
  $prd_id = '';
  $query = $DBcon->prepare("SELECT prd_id FROM table_type WHERE type_id = :type_id ");
  $query->bindParam(':type_id', $id);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $prd_id = $row['prd_id'];

    $query2 = $DBcon->prepare("SELECT *FROM table_chasis WHERE prd_id = :prd_id ORDER BY ChasisName  ASC");
    $query2->bindParam(':prd_id', $prd_id);
    $query2->execute();

    while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[]  = $row2['cha_id'];
      $subdata[]  = $row2['ChasisName'];

      $data[] = $subdata;
    }
    echo json_encode($data);
  }
  exit();
}

// VALIDASI CHASSIS YANG ADA SESUAI PRODUK YANG DIPILIH DARI REFER TYPE
if (isset($_POST['type_id3'])){
  include 'config.php';
  $data = array();
  $id = $_POST['type_id3'];
  $prd_id = '';
  $query = $DBcon->prepare("SELECT prd_id FROM table_type WHERE type_id = :type_id ");
  $query->bindParam(':type_id', $id);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $prd_id = $row['prd_id'];

    $query2 = $DBcon->prepare("SELECT *FROM table_capacity WHERE prd_id = :prd_id ORDER BY SizeName  ASC");
    $query2->bindParam(':prd_id', $prd_id);
    $query2->execute();

    while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
      $subdata = array();
      $subdata[]  = $row2['siz_id'];
      $subdata[]  = $row2['SizeName'];

      $data[] = $subdata;
    }
    echo json_encode($data);
  }
  exit();
}

// VALIDASI REFER TYPE
if (isset($_POST['type_id'])) {
  include 'config.php';
  $typeId = $_POST['type_id'];
  $query  = $DBcon->prepare("SELECT 
    tt.type_id AS type_id,
    tt.noNdpr AS noNdpr,
    tp.prj_id AS prj_id,
    tp.ProjectName AS ProjectName,
    tpl.plant_id AS plant_id,
    tpl.name AS plant_name,
    tt.typeSupply AS typeSupply,
    tt.typeSupplyDesc AS typeSupplyDesc,
    tt.typeDemand AS typeDemand,
    tt.typeCetak AS typeCetak,
    tf.format_id AS format_id,
    tf.name AS format_name,
    tpr.prd_id AS prd_id,
    tpr.ProductName AS ProductName,
    tc.cha_id AS cha_id,
    tc.ChasisName AS ChasisName,
    tca.siz_id AS siz_id,
    tca.SizeName AS SizeName,
    ts.sta_id AS sta_id,
    ts.StatusName AS StatusName,
    tt.typeNote AS typeNote,
    tmi.madein_id AS madein_id,
    tmi.name AS madein_name,
    tt.mandatory AS mandatory,
    tt.cp_id AS cp_id,
    tt.modelFamily AS modelFamily,
    tt.noBukuPetunjuk AS noBukuPetunjuk,
    tt.noPostel AS noPostel,
    tt.noSni AS noSni,
    tt.noLsPro AS noLsPro,
    tt.noNrpNpb AS noNrpNpb,
    tt.warantyCard AS warantyCard,
    tt.warantyYear AS warantyYear,
    tp.ProjectStartDate AS ProjectStartDate,
    tp.ProjectFinishDate AS ProjectFinishDate
    FROM table_type tt 
    LEFT JOIN table_project tp ON tt.prj_id = tp.prj_id
    LEFT JOIN table_plant tpl ON tt.plant_id = tpl.plant_id
    LEFT JOIN table_format tf ON tt.format_id = tf.format_id
    LEFT JOIN table_product tpr ON tt.prd_id = tpr.prd_id
    LEFT JOIN table_chasis tc ON tt.cha_id = tc.cha_id
    LEFT JOIN table_capacity tca ON tt.siz_id = tca.siz_id
    LEFT JOIN table_status ts ON tt.sta_id = ts.sta_id
    LEFT JOIN table_madein tmi ON tt.made_in = tmi.madein_id
    LEFT JOIN table_classproduct tcp ON tt.cp_id = tcp.cp_id

    WHERE type_id = :type_id ");
  $query->bindParam(':type_id', $typeId);
  $query->execute();
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

    $res  = array(
      'type_id'               =>  $row['type_id'],
      'noNdpr'                =>  $row['noNdpr'],
      'prj_id'                =>  $row['prj_id'],
      'ProjectName'           =>  $row['ProjectName'],
      'plant_id'              =>  $row['plant_id'],
      'plant_name'            =>  $row['plant_name'],
      'typeSupply'            =>  $row['typeSupply'],
      'typeSupplyDesc'        =>  $row['typeSupplyDesc'],
      'typeDemand'            =>  $row['typeDemand'],
      'typeCetak'             =>  $row['typeCetak'],
      'format_id'             =>  $row['format_id'],
      'format_name'           =>  $row['format_name'],
      'prd_id'                =>  $row['prd_id'],
      'ProductName'           =>  $row['ProductName'],
      'cha_id'                =>  $row['cha_id'],
      'ChasisName'            =>  $row['ChasisName'],
      'siz_id'                =>  $row['siz_id'],
      'SizeName'              =>  $row['SizeName'],
      'sta_id'                =>  $row['sta_id'],
      'StatusName'            =>  $row['StatusName'],
      'typeNote'              =>  $row['typeNote'],
      'madein_id'             =>  $row['madein_id'],
      'madein_name'           =>  $row['madein_name'],
      'mandatory'             =>  $row['mandatory'],
      'cp_id'                 =>  $row['cp_id'],
      'modelFamily'           =>  $row['modelFamily'],
      'noBukuPetunjuk'        =>  $row['noBukuPetunjuk'],
      'noPostel'              =>  $row['noPostel'],
      'noSni'                 =>  $row['noSni'],
      'noLsPro'               =>  $row['noLsPro'],
      'noNrpNpb'              =>  $row['noNrpNpb'],
      'warantyCard'           =>  $row['warantyCard'],
      'warantyYear'           =>  $row['warantyYear'],
      'ProjectStartDate'      =>  $row['ProjectStartDate'],
      'ProjectFinishDate'     =>  $row['ProjectFinishDate']
    );

    echo json_encode($res);

  }

  exit();
}

?>
<!--########################################################## HTML ##########################################################-->

<html>
<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Information System 2018 - Add New Project</title>


  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>
  <script src="_chosen/chosen.jquery.js"></script>

  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="_jscript/js/jquery.uploadPreview.js"></script>

  <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
  <link rel="stylesheet" href="_jscript/css/jquery-ui.css" media="all" />
  <link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">
  <link rel="stylesheet" href="_chosen/chosen.css">

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

  .area1{border:0px solid  #f00; width: 400px; padding:2px;}
  .area2{border:0px solid  #f00; width: 120px; }
  .area3{border:0px solid  #f00; width: 260px; }
  .area4{border:0px solid  #f00; width: 60px; }

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



        <div id="tab_lineup_type" class="tab-content">
          <ul class="tabs left">
            <li><a href="#tab_lineup_addtype"><i>Add New Type</i></a></li>
            <li><a ><i>Specification</i></a></li>
            <li><a ><i>Features</i></a></li>
            <li><a ><i>Teamwork</i></a></li>
          </ul>


          <div id="tab_lineup_addtype" class="tab-content">
            <table class="psi_width1000" border="0">
              <tr>
                <td>
                  <div class="col_6 area1">

                    <div class="col_12">
                      <ul class="button-bar" id="nav1">
                        <li id="cancelback"><a><i class="fa fa-remove fa-sm" style="color: #a00;"></i>&nbsp;&nbsp;Cancel</a></li>
                        <li id="savefinish"><a>Save <i class="fa fa-check fa-sm"></i> Done</a></li>
                        <li id="savenext"><a>Save & Next&nbsp;&nbsp;<i class="fa fa-chevron-circle-right fa-sm"style="color: #090;"></i></a></li>
                      </ul>
                    </div>

                    <div class="col_12">&nbsp;</div>
                    <div class="col_12"><b>Project</b></div>

                    <div class="col_6 area2">Project</div>
                    <div class="col_6 area3">
                      <select id="new_prj" name="new_prj" class="form-control input2 mandatoryinput">
                        <option value="-" selected disabled>--</option>
                        <?php 
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_project ORDER BY created_date DESC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['prj_id'] ?>"><?php echo $row['ProjectName']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

                    <div class="col_6 area2">NPDR No.</div>
                    <div class="col_6 area3"><input type="text" id="new_nonpdr" class="mandatoryinput" /></div>

                    <div class="col_6 area2">File NPDR</div>
                    <div class="col_6 area3"><input type="file" id="new_filenpdr" class="mandatoryinput" title=" " accept=".pdf" /></div>

                    <div class="col_12">&nbsp;</div>
                    <div class="col_12"><hr class="alt2" /></div>


                    <div class="col_12"><b>Type</b></div>

                    <div class="col_6 area2">Plant</div>
                    <div class="col_6 area3">
                      <select id="new_plant" name="new_plant" class="input1">
                        <?php 
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_plant ORDER BY name ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['plant_id'] ?>"><?php echo $row['name']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

                    <div class="col_6 area2">Refer to</div>
                    <div class="col_6 area3">
                      <select name="new_reffto" class="form-control input2 " id="new_reffto" >
                        <option></option>
                        <?php
                        include 'config.php';
                        $stmt   = $DBcon->prepare("SELECT *FROM table_type ORDER BY typeSupply ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['type_id']; ?>"><?php echo $row['typeSupply']; ?></option>
                          <?php 
                        } 
                        ?>   
                      </select><i class="fa fa-remove" id="clearInput"></i>
                    </div>

                    <div class="col_6 area2">Type Supply</div>
                    <div class="col_6 area3"><input class="input2 mandatoryinput" type="text" id="new_typesupply" /></div>

                    <div class="col_6 area2">Description</div>
                    <div class="col_6 area3"><input type="text" id="new_desc"class="mandatoryinput" placeholder="Description Type Supply"/></div>

                    <div class="col_6 area2">Type Demand</div>
                    <div class="col_6 area3"><input class="input1 mandatoryinput" type="text" id="new_typedemand" /></div>

                    <div class="col_6 area2">Type Cetak</div>
                    <div class="col_6 area3"><input class="input1 mandatoryinput" type="text" id="new_typecetak" /></div>

                    <div class="col_6 area2">Format</div>
                    <div class="col_6 area3">
                      <select id="new_format" name="new_format" class="input1">
                        <?php 
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_format ORDER BY name ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['format_id'] ?>"><?php echo $row['name']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

                    <div class="col_6 area2">Product</div>
                    <div class="col_6 area3">
                      <select id="new_prd" name="new_prd" class="input1 mandatoryinput" disabled>
                        <option value="-" selected disabled>--</option>
                        <?php 
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_product ORDER BY ProductName ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['prd_id'] ?>"><?php echo $row['ProductName']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

                    <div class="col_6 area2">Chasis</div>
                    <div class="col_6 area3">
                      <select id="new_chs" name="new_chs" class="input1 mandatoryinput">
                        <option value="-" selected disabled>--</option>
                      </select>
                    </div>

                    <div class="col_6 area2">Capacity</div>
                    <div class="col_6 area3">
                      <select id="new_cap" name="new_cap" class="input1 mandatoryinput">
                        <option value="-" selected disabled>--</option>
                      </select>
                    </div>

                    <div class="col_6 area2">Status</div>
                    <div class="col_6 area3">
                      <select id="new_sta" name="new_sta" class="input1 mandatoryinput">
                        <?php 
                        include 'config.php';
                        $stmt = $DBcon->prepare("SELECT * FROM table_status WHERE  sc_id = 7 ORDER BY StatusName ASC");
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
                    <div class="col_6 area3"><textarea type="text" id="new_note" class="mandatoryinput" /></textarea></div>
                    <div class="col_12">
                      <div id="image-preview">
                        <label for="image-upload" id="image-label">Upload Foto</label>
                        <input type="file" name="image" id="image-upload" accept="image/*" class="mandatoryinput"/>
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
                        $stmt = $DBcon->prepare("SELECT * FROM table_madein ORDER BY name ASC");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $row['madein_id'] ?>"><?php echo $row['name']; ?></option>
                          <?php 
                        }
                        ?>  
                      </select>
                    </div>

                    <div class="col_6 area2">Mandatory</div>
                    <div class="col_6 area3">
                      <select id="new_mand" name="new_mand" class="input1">
                        <option selected>--</option>          
                        <option>Mandatory</option>
                        <option>SNI</option>
                        <option>TISI</option>
                        <option>No One</option>
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
                    <div class="col_6 area3"><input type="text" id="new_family" /></div>

                    <div class="col_6 area2">No. BP</div>
                    <div class="col_6 area3"><input type="text" id="new_nobp" placeholder="No. Buku Petunjuk"/></div>

                    <div class="col_6 area2">No. POSTEL</div>
                    <div class="col_6 area3"><input type="text" id="new_nopostel" /></div>

                    <div class="col_6 area2">No. SNI</div>
                    <div class="col_6 area3"><input type="text" id="new_nosni" /></div>

                    <div class="col_6 area2">No. LsPro</div>
                    <div class="col_6 area3"><input type="text" id="new_nolspro" /></div>

                    <div class="col_6 area2">No. NRP/NPB</div>
                    <div class="col_6 area3"><input type="text" id="new_nonrp" /></div>


                    <div class="col_12">&nbsp;</div>
                    <div class="col_12"><hr class="alt2" /></div>


                    <div class="col_12"><b>Other</b></div>

                    <div class="col_6 area2">Warranty Card</div>
                    <div class="col_6 area3">
                      <select id="new_warc" name="new_warc" class="input1">
                        <option value="NO" selected>--</option>          
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                    </div>
                    <div class="col_6 area2">Warranty Year</div>
                    <div class="col_6 area3">
                      <select id="new_wary" name="new_wary" class="input1">
                        <option selected>--</option>          
                        <option>2018</option>
                        <option>2019</option>
                      </select>
                    </div>

                    <div class="col_12">&nbsp;</div>
                    <div class="col_12"><hr class="alt2" /></div>
                    <div class="col_12"><i>Keterangan :</i></div>
                    <div class="col_1"><input type="text" class="mandatoryinput" readonly disabled/></div>
                    <div class="col_11"><i>Mandatory Input / Fiels Input-an yang harus terisi.</i></div>

                  </div>
                </td>
              </tr>
            </table>
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
  // VALIDASI AWAL HALAMAN STATUS = EXPERIMENT
  $(document).ready(function() {
    $('#new_sta').val(2);
  });

  $( function() {
    $( "#datestart" ).datepicker({ dateFormat: 'dd MM yy' });
    $( "#datefinish" ).datepicker({ dateFormat: 'dd MM yy' });
  });

  // PANGGIL CHOOSEN.JS 
  $("#new_prj").chosen().change(function() {
    var v = $(this).val();
  });
  $("#new_reffto").chosen().change(function() {
    var v = $(this).val();
  });

  $('.mandatoryinput').css('background-color', '#fafaec');

// BUAT INPUT TYPE LANJUT INPUT SPEC
  $(document).ready(function() {
    $('#savenext').on('click',function() {
      var iPrj            = $('#new_prj').val();
      var iNoNdpr         = $('#new_nonpdr').val();
      var iNdprName       = $('#new_filenpdr').prop('files')[0];
      var iPlant          = $('#new_plant').val();
      var iTypeSupply     = $('#new_typesupply').val();
      var iTypeSupplyDesc = $('#new_desc').val();
      var iTypeDemand     = $('#new_typedemand').val();
      var iTypeCetak      = $('#new_typecetak').val();
      var iFormat         = $('#new_format').val();
      var iPrd            = $('#new_prd').val();
      var iCha            = $('#new_chs').val();
      var iCap            = $('#new_cap').val();
      var iSta            = $('#new_sta').val();
      var iNote           = $('#new_note').val();
      var iMadein         = $('#new_made').val();
      var iMandatory      = $('#new_mand').val();
      var icp_id          = $('#new_class').val();
      var iModel          = $('#new_family').val();
      var iNoBP           = $('#new_nobp').val();
      var iNoPostel       = $('#new_nopostel').val();
      var iNoSni          = $('#new_nosni').val();
      var iNoLsPro        = $('#new_nolspro').val();
      var iNoNrpNpb       = $('#new_nonrp').val();
      var iWarantyCard    = $('#new_warc').val();
      var iWarantyYear    = $('#new_wary').val();
      var iTypeStartDate  = $('#datestart').val();
      var iTypeFinishDate = $('#datefinish').val(); 
      var iPhoto          = $('#image-upload').prop('files')[0];

      var form_data       = new FormData();

      form_data.append('typePhoto', iPhoto);
      form_data.append('prj_id', iPrj);
      form_data.append('noNdpr', iNoNdpr);
      form_data.append('ndprName', iNdprName);
      form_data.append('plant_id', iPlant);
      form_data.append('typeSupply', iTypeSupply);
      form_data.append('typeSupplyDesc', iTypeSupplyDesc);
      form_data.append('typeDemand', iTypeDemand);
      form_data.append('typeCetak', iTypeCetak);
      form_data.append('format_id', iFormat);
      form_data.append('prd_id', iPrd);
      form_data.append('cha_id', iCha);
      form_data.append('siz_id', iCap);
      form_data.append('sta_id', iSta);
      form_data.append('typeNote', iNote);
      form_data.append('made_in', iMadein);
      form_data.append('mandatory', iMandatory);
      form_data.append('cp_id', icp_id);
      form_data.append('modelFamily', iModel);
      form_data.append('noBukuPetunjuk', iNoBP);
      form_data.append('noPostel', iNoPostel);
      form_data.append('noSni', iNoSni);
      form_data.append('noLsPro', iNoLsPro);
      form_data.append('noNrpNpb', iNoNrpNpb);
      form_data.append('warantyCard', iWarantyCard);
      form_data.append('warantyYear', iWarantyYear);
      form_data.append('TypeStartDate', iTypeStartDate);
      form_data.append('TypeFinishDate', iTypeFinishDate);


      if (!iPrj) {
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Project belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iNoNdpr){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "No NDPR belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iNdprName){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Upload File NPDR.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iPlant){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Plant belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iTypeSupply){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Type Supply belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iTypeSupplyDesc){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Description belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iTypeDemand){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Type Demand belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iTypeCetak){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Type Cetak belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iFormat){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Format belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iPrd){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Product belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iCha){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Chasis belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iCap){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Capacity belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iSta){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Status belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }
      else if(!iMadein){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Made In belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iMandatory){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Mandatory belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!icp_id){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Class Product belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iWarantyCard){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Waranty Card belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(!iWarantyYear){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Waranty Year belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
      }else if(iNdprName.size > 5000){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Ukuran file NPDR terlalu besar. Maximal : 5MB", icon    : "success", type    : "warning", timer   : 1500 });
      }else {
        $.ajax({
          type      : "POST",
          dataType  : "JSON",
          data      : {
            ajax_typeSupply : iTypeSupply,
            ajax_typeDemand : iTypeDemand
          },
          success : function(data) {
            if (data['Status'] == "NO" ) {
              swal({
                showConfirmButton : false,
                title : "Gagal",
                text  : "Type Supply atau Type Demand yang anda masukan telah digunakan.",
                icon  : "error",
                type  : "error",
                timer : 2000
              });
            }else{
              $.ajax({
                url         : "_ajaxsaveaddtype.php",
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
                    text    : "Type baru berhasil ditambahkan.",
                    icon    : "success",
                    type    : "success",
                    timer   : 1500,
// button  : "success"
}, function(){
  window.location.href = "prj_lineupaddspec.php";
});
                },
                error     : function(){
                  swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
                }
              });
            }
          }
        });
      }

    });
});

// BUAT INPUT TYPE SAJA
$(document).ready(function() {
  $("#savefinish").click(function() {

    var iPrj            = $('#new_prj').val();
    var iNoNdpr         = $('#new_nonpdr').val();
    var iNdprName       = $('#new_filenpdr').prop('files')[0];
    var iPlant          = $('#new_plant').val();
    var iTypeSupply     = $('#new_typesupply').val();
    var iTypeSupplyDesc = $('#new_desc').val();
    var iTypeDemand     = $('#new_typedemand').val();
    var iTypeCetak      = $('#new_typecetak').val();
    var iFormat         = $('#new_format').val();
    var iPrd            = $('#new_prd').val();
    var iCha            = $('#new_chs').val();
    var iCap            = $('#new_cap').val();
    var iSta            = $('#new_sta').val();
    var iNote           = $('#new_note').val();
    var iMadein         = $('#new_made').val();
    var iMandatory      = $('#new_mand').val();
    var icp_id          = $('#new_class').val();
    var iModel          = $('#new_family').val();
    var iNoBP           = $('#new_nobp').val();
    var iNoPostel       = $('#new_nopostel').val();
    var iNoSni          = $('#new_nosni').val();
    var iNoLsPro        = $('#new_nolspro').val();
    var iNoNrpNpb       = $('#new_nonrp').val();
    var iWarantyCard    = $('#new_warc').val();
    var iWarantyYear    = $('#new_wary').val();
    var iTypeStartDate  = $('#datestart').val();
    var iTypeFinishDate = $('#datefinish').val(); 
    var iPhoto          = $('#image-upload').prop('files')[0];


    var form_data       = new FormData();


    form_data.append('typePhoto', iPhoto);
    form_data.append('prj_id', iPrj);
    form_data.append('noNdpr', iNoNdpr);
    form_data.append('ndprName', iNdprName);
    form_data.append('plant_id', iPlant);
    form_data.append('typeSupply', iTypeSupply);
    form_data.append('typeSupplyDesc', iTypeSupplyDesc);
    form_data.append('typeDemand', iTypeDemand);
    form_data.append('typeCetak', iTypeCetak);
    form_data.append('format_id', iFormat);
    form_data.append('prd_id', iPrd);
    form_data.append('cha_id', iCha);
    form_data.append('siz_id', iCap);
    form_data.append('sta_id', iSta);
    form_data.append('typeNote', iNote);
    form_data.append('made_in', iMadein);
    form_data.append('mandatory', iMandatory);
    form_data.append('cp_id', icp_id);
    form_data.append('modelFamily', iModel);
    form_data.append('noBukuPetunjuk', iNoBP);
    form_data.append('noPostel', iNoPostel);
    form_data.append('noSni', iNoSni);
    form_data.append('noLsPro', iNoLsPro);
    form_data.append('noNrpNpb', iNoNrpNpb);
    form_data.append('warantyCard', iWarantyCard);
    form_data.append('warantyYear', iWarantyYear);
    form_data.append('TypeStartDate', iTypeStartDate);
    form_data.append('TypeFinishDate', iTypeFinishDate);

    if (!iPrj) {
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Project belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iNoNdpr){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "No NDPR belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iNdprName){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Upload File NPDR.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iPlant){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Plant belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iTypeSupply){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Type Supply belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iTypeSupplyDesc){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Description belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iTypeDemand){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Type Demand belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iTypeCetak){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Type Cetak belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iFormat){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Format belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iPrd){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Product belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iCha){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Chasis belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iCap){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Capacity belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iSta){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Status belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }
    else if(!iMadein){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Made In belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iMandatory){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Mandatory belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!icp_id){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Class Product belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iWarantyCard){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Waranty Card belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(!iWarantyYear){
      swal({ showConfirmButton: false, title   : "Fail !", text    : "Waranty Year belum di isi.", icon    : "success", type    : "warning", timer   : 1500 });
    }else if(iNdprName.size > 5242880){
        swal({ showConfirmButton: false, title   : "Fail !", text    : "Ukuran file NPDR terlalu besar. Maximal : 5MB", icon    : "success", type    : "warning", timer   : 1500 });
    }else {
      $.ajax({
        type      : "POST",
        dataType  : "JSON",
        data      : {
          ajax_typeSupply : iTypeSupply,
          ajax_typeDemand : iTypeDemand
        },
        success : function(data) {
          if (data['Status'] == "NO" ) {
            swal({
              showConfirmButton : false,
              title : "Gagal",
              text  : "Type Supply atau Type Demand yang anda masukan telah digunakan.",
              icon  : "error",
              type  : "error",
              timer : 2000
            });
          }else{
            $.ajax({
              url         : "_ajaxsavefinishtype.php",
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
                  text    : "Type baru berhasil ditambahkan. Segera Lengkapi Kelengkapan Data yang Kosong",
                  icon    : "success",
                  type    : "success",
                  timer   : 1500,
// button  : "success"
}, function(){
  window.location.href = "psi_project.php#tab_que";
});
              },
              error     : function(){
                swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
              }
            });
          }
        }
      });
    }
  });
});


$("#cancelback, #cancelback2").click(function() {
  window.location.href = "psi_project.php#tab_lineup_type";
});

$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  window.location.href = "psi_project.php#tab_lineup_type";
}
});

// VALIDASI UNTUK PEMILIHAN PRODUK, TYPE STARTDATE DAN TYPEFINISH DATE BERDASARKAN PROJECT YANG DIPILIH
$(document).ready(function() {
  $('#new_prj').change(function() {
    var prj = $('#new_prj').val();

    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        prj_id  : prj
      },
      success :  function(data) {
        $('#datestart').val(data['ProjectStartDate']);
        $('#datefinish').val(data['ProjectFinishDate']);
        $('#new_prd').val(data['prd_id']);
        if (data['ProjectMarket'] == 'Export') {
          $('#new_made').val(2);
        }
      }
    });
  });
});


// BUAT CLEAR REFER TYPE
$(document).ready(function() {
  $('#clearInput').on('click', function() {
    $('#new_prj').val('-');
    $('#new_nonpdr').val('');
    $('#new_reffto').val('').trigger('chosen:updated')
    $('#new_plant').val('');
    $('#new_typesupply').val('');
    $('#new_desc').val('');
    $('#new_typedemand').val('');
    $('#new_typecetak').val('');
    $('#new_format').val('');
    $('#new_prd').val('-');
    $('#new_chs').val('-');
    $('#new_cap').val('-');
    $('#new_sta').val('2');
    $('#new_note').val('');
    $('#new_made').val('');
    $('#new_mand').val('');
    $('#new_class').val('');
    $('#new_family').val('');
    $('#new_nobp').val('');
    $('#new_nopostel').val('');
    $('#new_nosni').val('');
    $('#new_nolspro').val('');
    $('#new_nonrp').val('');
    $('#new_warc').val('');
    $('#new_wary').val('');
    $('#datestart').val('');
    $('#datefinish').val('');
  });
});


// BUAT REFER TYPE
$(document).ready(function() {
  $('#new_reffto').change(function() {
    var iref_typeId = $('#new_reffto').val();

    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        type_id  : iref_typeId
      },
      success : function(data) {
        $('#new_nonpdr').val(data['noNdpr']);
        $('#new_prj').val(data['prj_id']).trigger('chosen:updated');
        $('#new_plant').val(data['plant_id']);
        $('#new_typesupply').val(data['typeSupply']);
        $('#new_desc').val(data['typeSupplyDesc']);
        $('#new_typedemand').val(data['typeDemand']);
        $('#new_typecetak').val(data['typeCetak']);
        $('#new_format').val(data['format_id']);
        $('#new_prd').val(data['prd_id']);
        $('#new_chs').val(data['cha_id']);
        $('#new_cap').val(data['siz_id']);
        $('#new_sta').val(data['sta_id']);
        $('#new_note').val(data['typeNote']);
        $('#new_made').val(data['madein_id']);
        $('#new_mand').val(data['mandatory']);
        $('#new_class').val(data['cp_id']);
        $('#new_family').val(data['modelFamily']);
        $('#new_nobp').val(data['noBukuPetunjuk']);
        $('#new_nopostel').val(data['noPostel']);
        $('#new_nosni').val(data['noSni']);
        $('#new_nolspro').val(data['noLsPro']);
        $('#new_nonrp').val(data['noNrpNpb']);
        $('#new_warc').val(data['warantyCard']);
        $('#new_wary').val(data['warantyYear']);
        $('#datestart').val(data['ProjectStartDate']);
        $('#datefinish').val(data['ProjectFinishDate']);
      }
    });
  });
});


// ISI CHASSIS BERDASARKAN PRODUK YANG DIPILIH DARI REFER TYPE
$(document).ready(function() {
  $('#new_reffto').change(function() {
    var iref_typeId = $('#new_reffto').val();

    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        type_id2  : iref_typeId
      },
      success : function(data) {
        $('#new_chs').html('<option value="-" selected disabled>--</option>');
        for (var i = 0; i < data.length; i++) {
          $('#new_chs').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
        }
      }
    });
  });
});

// ISI CAPACITY BERDASARKAN PRODUK YANG DIPILIH DARI REFER TYPE
$(document).ready(function() {
  $('#new_reffto').change(function() {
    var iref_typeId = $('#new_reffto').val();

    $.ajax({
      type    : "POST",
      dataType: "JSON",
      data    : {
        type_id3  : iref_typeId
      },
      success : function(data) {
        $('#new_cap').html('<option value="-" selected disabled>--</option>');
        for (var i = 0; i < data.length; i++) {
          $('#new_cap').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
        }
      }
    });
  });
});





$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  window.location.href = "psi_project.php#tab_lineup_type";
}
});



</script>

<!-- PENENTUAN PLANT DI AWAL HALAMAN -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#new_prj').change(function() {
      var prj2 = $('#new_prj').val();

      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          prj2  : prj2
        },
        success : function(data) {
          $('#new_plant').val(data['plant_id']);
        }
      });
    });
  });
</script>

<!-- ISI CHASSIS BERDASARKAN PRODUK YANG DIPILIH DARI PILIH PROJECT -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#new_prj').change(function() {
      var prj3 = $('#new_prj').val();

      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          prj3  : prj3
        },
        success : function(data) {
          $('#new_chs').html('<option value="-" selected disabled>--</option>');
          for (var i = 0; i < data.length; i++) {
            $('#new_chs').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
          }
        }
      });
    });
  });
</script>


<!-- ISI CAPACITY BERDASARKAN PRODUK YANG DIPILIH DARI PILIH PROJECT -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#new_prj').change(function() {
      var prj4 = $('#new_prj').val();

      $.ajax({
        type    : "POST",
        dataType: "JSON",
        data    : {
          prj4  : prj4
        },
        success : function(data) {
          $('#new_cap').html('<option value="-" selected disabled>--</option>');
          for (var i = 0; i < data.length; i++) {
            $('#new_cap').append('<option value="'+data[i][0]+'">'+data[i][1]+'</option>');
          }
        }
      });
    });
  });
</script>

<!-- VALIDASI WARANTY CARD -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#new_warc').change(function() {
      var warantyCard = $('#new_warc').val();

      if (warantyCard == 'NO'){
        $('#new_wary').prop('disabled', true);
      }else{
        $('#new_wary').prop('disabled', false);
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