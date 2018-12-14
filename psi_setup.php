<?php
session_start();
$currentmenu = "4";
// PROTEKSI SESSION ROLE
if(!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");
  exit();

} else {

  /*###################     GROUP     ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['grp_id'])) {
    include 'config.php';
    $id = $_POST['grp_id'];
    $query  = $DBcon->prepare("SELECT *FROM table_group WHERE grp_id = '$id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data = array(
        "grp_id"    => $row['grp_id'],
        "GroupID"   => $row['GroupID'],
        "GroupName" => $row['GroupName'],
        "GroupNote" => $row['GroupNote']
      );

      echo json_encode($json_data);
    }
    exit();
  }


  /*###################  DELETE GROUP  ###################*/
  if (isset($_POST['ajax2'])&&isset($_POST['grp_id2'])) {
    include 'config.php';
    $id         = $_POST['grp_id2'];
    $GroupName  = '';
    $query      = $DBcon->prepare("SELECT *FROM table_project WHERE grp_id = '$id' ");
    $query2     = $DBcon->prepare("SELECT *FROM table_group WHERE grp_id = '$id' ");
    $query->execute();
    $query2->execute();
    $total      = $query->rowCount();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $GroupName = $row['GroupName'];
    }

    $json_del = array(
      "Total"     =>  $total,
      "GroupName" =>  $GroupName
    );

    echo json_encode($json_del);

    exit();
  }


  /*###################  PRODUCT  ########################*/
  if (isset($_POST['ajax'])&&isset($_POST['prd_id'])) {
    include 'config.php';
    $prd_id = $_POST['prd_id'];
    $query  = $DBcon->prepare("SELECT *FROM table_product WHERE prd_id = '$prd_id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data2 = array(
        "prd_id"      => $row['prd_id'],
        "ProductID"   => $row['ProductID'],
        "ProductName" => $row['ProductName'],
        "ProductCode" => $row['ProductCode'],
        "ProductNote" => $row['ProductNote']
      );

      echo json_encode($json_data2);
    }
    exit();
  }


  /*###################  DELETE PRODUCT  ###################*/
  if (isset($_POST['ajax_prd'])&&isset($_POST['prd_id2'])) {
    include 'config.php';
    $id           = $_POST['prd_id2'];
    $ProductName  = '';
    $query        = $DBcon->prepare("SELECT *FROM table_project WHERE prd_id = '$id' ");
    $query2       = $DBcon->prepare("SELECT *FROM table_type WHERE prd_id = '$id' ");
    $query3       = $DBcon->prepare("SELECT *FROM table_chasis WHERE prd_id = '$id' ");
    $query4       = $DBcon->prepare("SELECT *FROM table_capacity WHERE prd_id = '$id' ");
    $query5       = $DBcon->prepare("SELECT *FROM table_product WHERE prd_id = '$id' ");
    $query6       = $DBcon->prepare("SELECT *FROM table_model WHERE prd_id = '$id' ");
    $query7       = $DBcon->prepare("SELECT *FROM table_feature WHERE prd_id = '$id' ");
    $query->execute();
    $query2->execute();
    $query3->execute();
    $query4->execute();
    $query5->execute();
    $query6->execute();
    $query7->execute();
    $total        = $query->rowCount();
    $total2      = $query2->rowCount();
    $total3      = $query3->rowCount();
    $total4      = $query4->rowCount();
    $total5      = $query5->rowCount();
    $total6      = $query6->rowCount();
    while ($row = $query5->fetch(PDO::FETCH_ASSOC)) {
      $ProductName = $row['ProductName'];
    }

    $json_del2 = array(
      "Total_prj"   =>  $total,
      "Total_type"  =>  $total2,
      "Total_cha"  =>  $total3,
      "Total_cap"  =>  $total4,
      "Total_mdl"  =>  $total5,
      "Total_fea"  =>  $total6,
      "ProductName" =>  $ProductName
    );

    echo json_encode($json_del2);

    exit();
  }

  /*###################  CHASIS  ##########################*/
  if (isset($_POST['ajax'])&&isset($_POST['cha_id'])) {
    include 'config.php';
    $cha_id = $_POST['cha_id'];
    $query  = $DBcon->prepare("SELECT table_chasis.cha_id AS cha_id, table_chasis.ChasisID AS ChasisID, table_chasis.ChasisName AS ChasisName, table_product.prd_id AS prd_id, table_product.ProductName AS ProductName, table_chasis.ChasisNote AS ChasisNote FROM table_chasis JOIN table_product ON table_chasis.prd_id = table_product.prd_id WHERE cha_id = '$cha_id'");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data3 = array(
        "cha_id"      => $row['cha_id'],
        "ChasisID"    => $row['ChasisID'],
        "ChasisName"  => $row['ChasisName'],
        "prd_id"      => $row['prd_id'],
        "ProductName" => $row['ProductName'],
        "ChasisNote"  => $row['ChasisNote']
      );

      echo json_encode($json_data3);
    }
    exit();
  }


  /*###################  DELETE CHASSIS  ###################*/
  if (isset($_POST['ajax_cha'])&&isset($_POST['cha_id2'])) {
    include 'config.php';
    $id         = $_POST['cha_id2'];
    $ChasisName  = '';
    $query      = $DBcon->prepare("SELECT *FROM table_type WHERE cha_id = '$id' ");
    $query2     = $DBcon->prepare("SELECT *FROM table_chasis WHERE cha_id = '$id' ");
    $query->execute();
    $query2->execute();
    $total      = $query->rowCount();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $ChasisName = $row['ChasisName'];
    }

    $json_del3 = array(
      "Total"     =>  $total,
      "ChasisName" =>  $ChasisName
    );

    echo json_encode($json_del3);

    exit();
  }

  /*###################  CAPACITY  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['siz_id'])) {
    include 'config.php';
    $siz_id = $_POST['siz_id'];
    $query  = $DBcon->prepare("SELECT table_capacity.siz_id AS siz_id, table_capacity.SizeID AS SizeID, table_capacity.SizeName AS SizeName, table_capacity.SizeAlias AS SizeAlias, table_product.prd_id AS prd_id, table_product.ProductName AS ProductName, table_capacity.SizeNote AS SizeNote FROM table_capacity JOIN table_product ON table_capacity.prd_id = table_product.prd_id WHERE siz_id = '$siz_id'");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data4 = array(
        "siz_id"      => $row['siz_id'],
        "SizeID"      => $row['SizeID'],
        "SizeName"    => $row['SizeName'],
        "SizeAlias"   => $row['SizeAlias'],
        "prd_id"      => $row['prd_id'],
        "ProductName" => $row['ProductName'],
        "SizeNote"    => $row['SizeNote']
      );

      echo json_encode($json_data4);
    }
    exit();
  }


  /*###################  DELETE CAPACITY  ###################*/
  if (isset($_POST['ajax_cap'])&&isset($_POST['siz_id2'])) {
    include 'config.php';
    $id         = $_POST['siz_id2'];
    $SizeName   = '';
    $query      = $DBcon->prepare("SELECT *FROM table_type WHERE siz_id = '$id' ");
    $query2     = $DBcon->prepare("SELECT *FROM table_capacity WHERE siz_id = '$id' ");
    $query->execute();
    $query2->execute();
    $total      = $query->rowCount();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $SizeName = $row['SizeName'];
    }

    $json_del4 = array(
      "Total"     =>  $total,
      "SizeName" =>  $SizeName
    );

    echo json_encode($json_del4);

    exit();
  }

  /*###################  BUYER  #####################*/
  if (isset($_POST['ajax'])&&isset($_POST['buy_id'])) {
    include 'config.php';
    $buy_id = $_POST['buy_id'];
    $query  = $DBcon->prepare("SELECT tb.buy_id AS buy_id, tb.BuyerID AS BuyerID, tb.BuyerName AS BuyerName, tb.BuyerNote AS BuyerNote, tb.brand AS brand, tc.con_id AS con_id, tc.CountryName AS CountryName FROM table_buyer tb JOIN table_country tc ON tb.con_id = tc.con_id WHERE tb.buy_id = '$buy_id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data5 = array(
        "buy_id"      =>  $row['buy_id'],
        "BuyerID"     =>  $row['BuyerID'],
        "BuyerName"   =>  $row['BuyerName'],
        "BuyerNote"   =>  $row['BuyerNote'],
        "brand"       =>  $row['brand'],
        "con_id"      =>  $row['con_id'],
        "CountryName" =>  $row['CountryName']
      );
      echo json_encode($json_data5);
    }
    exit();
  }


  /*###################  DELETE BUYER  ###################*/
  if (isset($_POST['ajax_buy'])&&isset($_POST['buy_id2'])) {
    include 'config.php';
    $id         = $_POST['buy_id2'];
    $BuyerName  = '';
    $query      = $DBcon->prepare("SELECT *FROM table_project WHERE buy_id = '$id' ");
    $query3     = $DBcon->prepare("SELECT *FROM table_buyer WHERE buy_id = '$id' ");
    $query->execute();
    $query3->execute();
    $total        = $query->rowCount();
    while ($row = $query3->fetch(PDO::FETCH_ASSOC)) {
      $BuyerName = $row['BuyerName'];
    }

    $json_del5 = array(
      "Total_type"  =>  $total,
      "BuyerName"   =>  $BuyerName
    );

    echo json_encode($json_del5);

    exit();
  }


  /*###################  COUNTRY  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['con_id'])) {
    include 'config.php';
    $con_id = $_POST['con_id'];
    $query  = $DBcon->prepare("SELECT *FROM table_country WHERE con_id = '$con_id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data6 = array(
        "con_id"      => $row['con_id'],
        "CountryID"   => $row['CountryID'],
        "CountryName" => $row['CountryName'],
        "Lot"         => $row['Lot'],
        "CountryNote" => $row['CountryNote']
      );

      echo json_encode($json_data6);
    }
    exit();
  }


  /*###################  DELETE COUNTRY  ###################*/
  if (isset($_POST['ajax_con'])&&isset($_POST['con_id2'])) {
    include 'config.php';
    $id         = $_POST['con_id2'];
    $CountryName  = '';
    $query      = $DBcon->prepare("SELECT *FROM table_buyer WHERE con_id = '$id' ");
    $query2     = $DBcon->prepare("SELECT *FROM table_country WHERE con_id = '$id' ");
    $query->execute();
    $query2->execute();
    $total      = $query->rowCount();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $CountryName = $row['CountryName'];
    }

    $json_del6 = array(
      "Total"     =>  $total,
      "CountryName" =>  $CountryName
    );

    echo json_encode($json_del6);

    exit();
  }


  /*###################  MAN POWER  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['man_id'])) {
    include 'config.php';
    $man_id = $_POST['man_id'];
    $query  = $DBcon->prepare("SELECT *FROM table_manpower WHERE man_id = '$man_id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data7 = array(
        "man_id"      => $row['man_id'],
        "ManID"       => $row['ManID'],
        "ManName"     => $row['ManName'],
        "Otorisasi"   => $row['Otorisasi'],
        "Design"      => $row['Design'],
        "ManEmail"    => $row['ManEmail']
      );

      echo json_encode($json_data7);
    }
    exit();
  }


  /*###################  DELETE MAN POWER  ###################*/
  if (isset($_POST['ajax_man'])&&isset($_POST['man_id2'])) {
    include 'config.php';
    $id         = $_POST['man_id2'];
    $ManName    = '';
    $query      = $DBcon->prepare("SELECT *FROM table_project WHERE man_id = '$id' ");
    $query2     = $DBcon->prepare("SELECT *FROM table_manpower WHERE man_id = '$id' ");
    $query->execute();
    $query2->execute();
    $total      = $query->rowCount();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $ManName = $row['ManName'];
    }

    $json_del8 = array(
      "Total"     =>  $total,
      "ManName" =>  $ManName
    );

    echo json_encode($json_del8);

    exit();
  }


  /*###################  TITLE  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['tit_id'])) {
    include 'config.php';
    $tit_id = $_POST['tit_id'];
    $query  = $DBcon->prepare("SELECT *FROM table_title WHERE tit_id = '$tit_id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data8 = array(
        "tit_id"        => $row['tit_id'],
        "TitleID"       => $row['TitleID'],
        "TitleName"     => $row['TitleName'],
        "DepartementID" => $row['DepartementID'],
        "TitleCategory" => $row['TitleCategory'],
        "TitleNotes" 	  => $row['TitleNotes']
      );

      echo json_encode($json_data8);
    }
    exit();
  }


  /*###################  DELETE TITLE  ###################*/
  if (isset($_POST['ajax_tit'])&&isset($_POST['tit_id2'])) {
    include 'config.php';
    $id         = $_POST['tit_id2'];
    $TitleName  = '';
    $query      = $DBcon->prepare("SELECT *FROM table_notes WHERE tit_id = '$id' ");
    $query2      = $DBcon->prepare("SELECT *FROM table_revisitype WHERE tit_id = '$id' ");
    $query3     = $DBcon->prepare("SELECT *FROM table_title WHERE tit_id = '$id' ");
    $query->execute();
    $query2->execute();
    $query3->execute();
    $total      = $query->rowCount();
    $total2      = $query2->rowCount();
    while ($row = $query3->fetch(PDO::FETCH_ASSOC)) {
      $TitleName = $row['TitleName'];
    }

    $json_del8 = array(
      "Total_prj"   =>  $total,
      "Total_type"  =>  $total2,
      "TitleName"   =>  $TitleName
    );

    echo json_encode($json_del8);

    exit();
  }


  /*###################  STATUS  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['sta_id'])) {
    include 'config.php';
    $sta_id = $_POST['sta_id'];
    $query  = $DBcon->prepare("SELECT *FROM table_status WHERE sta_id = :sta_id ");
    $query->bindParam(':sta_id', $sta_id);
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data10 = array(
        "sta_id"         => $row['sta_id'],
        "StatusName"     => $row['StatusName'],
        "StatusAlias"    => $row['StatusAlias'],
        "StatusNote"     => $row['StatusNote'],
        "sc_id"          => $row['sc_id']
      );

      echo json_encode($json_data10);
    }
    exit();
  }


  /*###################  DELETE STATUS  ###################*/
  if (isset($_POST['ajax_sta'])&&isset($_POST['sta_id2'])) {
    include 'config.php';
    $id         = $_POST['sta_id2'];
    $StatusName  = '';
    $query      = $DBcon->prepare("SELECT *FROM table_project WHERE sta_id = '$id' ");
    $query2      = $DBcon->prepare("SELECT *FROM table_type WHERE sta_id = '$id' ");
    $query3     = $DBcon->prepare("SELECT *FROM table_status WHERE sta_id = '$id' ");
    $query->execute();
    $query2->execute();
    $query3->execute();
    $total      = $query->rowCount();
    $total2      = $query2->rowCount();
    while ($row = $query3->fetch(PDO::FETCH_ASSOC)) {
      $StatusName = $row['StatusName'];
    }

    $json_del10 = array(
      "Total_prj"     =>  $total,
      "Total_type"     =>  $total2,
      "StatusName" =>  $StatusName
    );

    echo json_encode($json_del10);

    exit();
  }


  /*###################  MODEL  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['mdl_id'])) {
    include 'config.php';
    $mdl_id = $_POST['mdl_id'];
    $query  = $DBcon->prepare("SELECT table_model.mdl_id AS mdl_id, table_model.ModelID AS ModelID, table_model.ModelName AS ModelName, table_product.prd_id AS prd_id , table_product.ProductName AS ProductName FROM table_model JOIN table_product ON table_model.prd_id = table_product.prd_id WHERE mdl_id = '$mdl_id'");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data11 = array(
        "mdl_id"     => $row['mdl_id'],
        "ModelID"    => $row['ModelID'],
        "ModelName"  => $row['ModelName'],
        "prd_id"     => $row['prd_id'],
        "ProductName"=> $row['ProductName']
      );

      echo json_encode($json_data11);
    }
    exit();
  }


  /*###################  DELETE MODEL  ###################*/
  if (isset($_POST['ajax_mdl'])&&isset($_POST['mdl_id2'])) {
    include 'config.php';
    $id         = $_POST['mdl_id2'];
    $ModelName  = '';
    $query2     = $DBcon->prepare("SELECT *FROM table_model WHERE mdl_id = '$id' ");
    $query2->execute();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $ModelName = $row['ModelName'];
    }

    $json_del11 = array(
      "ModelName" =>  $ModelName
    );

    echo json_encode($json_del11);

    exit();
  }

  /*###################  FEATURE  ###################*/
  if (isset($_POST['ajax'])&&isset($_POST['fea_id'])) {
    include 'config.php';
    $fea_id = $_POST['fea_id'];
    $query  = $DBcon->prepare("SELECT tf.fea_id AS fea_id, tf.FeatureName AS FeatureName, tp.prd_id AS prd_id, tp.ProductName AS ProductName, tf.FeatureNote AS FeatureNote FROM table_feature tf JOIN table_product tp ON tf.prd_id = tp.prd_id WHERE tf.fea_id = '$fea_id' ");
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $json_data12 = array(
        "fea_id"        => $row['fea_id'],
        "FeatureName"   => $row['FeatureName'],
        "prd_id"        => $row['prd_id'],
        "ProductName"   => $row['ProductName'],
        "FeatureNote"   => $row['FeatureNote']
      );

      echo json_encode($json_data12);
    }
    exit();
  }


  /*###################  DELETE FEATURE  ###################*/
  if (isset($_POST['ajax_fea'])&&isset($_POST['fea_id2'])) {
    include 'config.php';
    $id           = $_POST['fea_id2'];
    $FeatureName  = '';
    $query        = $DBcon->prepare("SELECT *FROM table_featurespec WHERE fea_id = '$id' ");
    $query2       = $DBcon->prepare("SELECT *FROM table_feature WHERE fea_id = '$id' ");
    $query->execute();
    $query2->execute();
    $total      = $query->rowCount();
    while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
      $FeatureName = $row['FeatureName'];
    }

    $json_del12 = array(
      "Total"     =>  $total,
      "FeatureName" =>  $FeatureName
    );

    echo json_encode($json_del12);

    exit();
  }



  /*###################################    DELETE OPTION    ###################################*/
  if (isset($_POST['idVal']) && isset($_POST['subVal'])) {
    include 'config.php';
    $sub    = $_POST['subVal'];
    $id     = $_POST['idVal'];

    if ($sub == "delPlant") {
      $query = $DBcon->prepare("SELECT *FROM table_type WHERE plant_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_plant = array(
          "Status" => "NO"
        );

        echo json_encode($json_plant);
      }else{
        $json_plant = array(
          "Status" => "YES"
        );

        echo json_encode($json_plant);
      }

    }else if ($sub == "delFormat") {
      $query = $DBcon->prepare("SELECT *FROM table_type WHERE format_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_format = array(
          "Status" => "NO"
        );

        echo json_encode($json_format);
      }else{
        $json_format = array(
          "Status" => "YES"
        );

        echo json_encode($json_format);
      }

    }else if ($sub == "delMadein") {
      $query = $DBcon->prepare("SELECT *FROM table_type WHERE made_in = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_madein = array(
          "Status" => "NO"
        );

        echo json_encode($json_madein);
      }else{
        $json_madein = array(
          "Status" => "YES"
        );

        echo json_encode($json_madein);
      }

    }else if ($sub == "delColor") {

      $query  = $DBcon->prepare("SELECT *FROM table_specother WHERE color_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specrf WHERE color_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specsc WHERE color_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specwd WHERE color_id = '$id' ");
      $query5 = $DBcon->prepare("SELECT *FROM table_specwm WHERE color_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();
      $query5->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();
      $total5 = $query5->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 || $total5 > 0) {
        $json_color = array(
          "Status" => "NO"
        );

        echo json_encode($json_color);
      }else{
        $json_color = array(
          "Status" => "YES"
        );

        echo json_encode($json_color);
      }

    }else if ($sub == "delPattern") {

      $query = $DBcon->prepare("SELECT *FROM table_specrf WHERE pattern_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_pattern = array(
          "Status" => "NO"
        );

        echo json_encode($json_pattern);
      }else{
        $json_pattern = array(
          "Status" => "YES"
        );

        echo json_encode($json_pattern);
      }

    }else if ($sub == "delFinishing") {

      $query = $DBcon->prepare("SELECT *FROM table_specrf WHERE finishing_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_finishing = array(
          "Status" => "NO"
        );

        echo json_encode($json_finishing);
      }else{
        $json_finishing = array(
          "Status" => "YES"
        );

        echo json_encode($json_finishing);
      }

    }else if ($sub == "delHandle") {

      $query = $DBcon->prepare("SELECT *FROM table_specrf WHERE handle_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_handle = array(
          "Status" => "NO"
        );

        echo json_encode($json_handle);
      }else{
        $json_handle = array(
          "Status" => "YES"
        );

        echo json_encode($json_handle);
      }

    }else if ($sub == "delRack") {

      $query  = $DBcon->prepare("SELECT *FROM table_specrf WHERE rack_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specsc WHERE rack_id = '$id' ");

      $query->execute();
      $query2->execute();

      $total = $query->rowCount();
      $total2 = $query2->rowCount();

      if ($total > 0 || $total2 > 0) {
        $json_rack = array(
          "Status" => "NO"
        );

        echo json_encode($json_rack);
      }else{
        $json_rack = array(
          "Status" => "YES"
        );

        echo json_encode($json_rack);
      }

    }else if ($sub == "delDimension") {

      $query  = $DBcon->prepare("SELECT *FROM table_specac WHERE dimension_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_speccf WHERE dimension_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specother WHERE dimension_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specrf WHERE dimension_id = '$id' ");
      $query5 = $DBcon->prepare("SELECT *FROM table_specsc WHERE dimension_id = '$id' ");
      $query6 = $DBcon->prepare("SELECT *FROM table_specwd WHERE dimension_id = '$id' ");
      $query7 = $DBcon->prepare("SELECT *FROM table_specwm WHERE dimension_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();
      $query5->execute();
      $query6->execute();
      $query7->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();
      $total5 = $query5->rowCount();
      $total6 = $query6->rowCount();
      $total7 = $query7->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 || $total5 > 0 || $total6 > 0 || $total7 > 0) {
        $json_dimension = array(
          "Status" => "NO"
        );

        echo json_encode($json_dimension);
      }else{
        $json_dimension = array(
          "Status" => "YES"
        );

        echo json_encode($json_dimension);
      }

    }else if ($sub == "delPacking") {

      $query = $DBcon->prepare("SELECT *FROM table_specrf WHERE packing_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_packing = array(
          "Status" => "NO"
        );

        echo json_encode($json_packing);
      }else{
        $json_packing = array(
          "Status" => "YES"
        );

        echo json_encode($json_packing);
      }

    }else if ($sub == "delRollbond") {

      $query  = $DBcon->prepare("SELECT *FROM table_speccf WHERE rollbond_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specrf WHERE rollbond_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specsc WHERE rollbond_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specwd WHERE rollbond_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 ) {
        $json_rollbond = array(
          "Status" => "NO"
        );

        echo json_encode($json_rollbond);
      }else{
        $json_rollbond = array(
          "Status" => "YES"
        );

        echo json_encode($json_rollbond);
      }

    }else if ($sub == "delRollbondtype") {

      $query  = $DBcon->prepare("SELECT *FROM table_speccf WHERE rollbondtype_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specrf WHERE rollbondtype_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specsc WHERE rollbondtype_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specwd WHERE rollbondtype_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 ) {
        $json_rollbondtype = array(
          "Status" => "NO"
        );

        echo json_encode($json_rollbondtype);
      }else{
        $json_rollbondtype = array(
          "Status" => "YES"
        );

        echo json_encode($json_rollbondtype);
      }

    }else if ($sub == "delTemperature") {

      $query  = $DBcon->prepare("SELECT *FROM table_speccf WHERE rollbondtype_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specrf WHERE rollbondtype_id = '$id' ");

      $query->execute();
      $query2->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();

      if ($total > 0 || $total2 > 0 ) {
        $json_temperature = array(
          "Status" => "NO"
        );

        echo json_encode($json_temperature);
      }else{
        $json_temperature = array(
          "Status" => "YES"
        );

        echo json_encode($json_temperature);
      }

    }else if ($sub == "delClimate") {

      $query  = $DBcon->prepare("SELECT *FROM table_speccf WHERE climate_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specrf WHERE climate_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specsc WHERE climate_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specwd WHERE climate_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 ) {
        $json_climate = array(
          "Status" => "NO"
        );

        echo json_encode($json_climate);
      }else{
        $json_climate = array(
          "Status" => "YES"
        );

        echo json_encode($json_climate);
      }

    }else if ($sub == "delCondensor") {

      $query  = $DBcon->prepare("SELECT *FROM table_speccf WHERE climate_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specrf WHERE climate_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specsc WHERE climate_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specwd WHERE climate_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 ) {
        $json_condensor = array(
          "Status" => "NO"
        );

        echo json_encode($json_condensor);
      }else{
        $json_condensor = array(
          "Status" => "YES"
        );

        echo json_encode($json_condensor);
      }

    }else if ($sub == "delRefrigerant") {

      $query  = $DBcon->prepare("SELECT *FROM table_specac WHERE refrigerant_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_speccf WHERE refrigerant_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specrf WHERE refrigerant_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specsc WHERE refrigerant_id = '$id' ");
      $query5 = $DBcon->prepare("SELECT *FROM table_specwd WHERE refrigerant_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();
      $query5->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();
      $total5 = $query5->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 || $total5 > 0 ) {
        $json_refrigerant = array(
          "Status" => "NO"
        );

        echo json_encode($json_refrigerant);
      }else{
        $json_refrigerant = array(
          "Status" => "YES"
        );

        echo json_encode($json_refrigerant);
      }

    }else if ($sub == "delRv") {

      $query = $DBcon->prepare("SELECT *FROM table_speccf WHERE rv_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specother WHERE rv_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specrf WHERE rv_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specsc WHERE rv_id = '$id' ");
      $query5 = $DBcon->prepare("SELECT *FROM table_specwd WHERE rv_id = '$id' ");
      $query6 = $DBcon->prepare("SELECT *FROM table_specwm WHERE rv_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();
      $query5->execute();
      $query6->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();
      $total5 = $query5->rowCount();
      $total6 = $query6->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 || $total5 > 0 || $total6 > 0 ) {
        $json_rv = array(
          "Status" => "NO"
        );

        echo json_encode($json_rv);
      }else{
        $json_rv = array(
          "Status" => "YES"
        );

        echo json_encode($json_rv);
      }

    }else if ($sub == "delWv") {

      $query = $DBcon->prepare("SELECT *FROM table_speccf WHERE wv_id = '$id' ");
      $query2 = $DBcon->prepare("SELECT *FROM table_specother WHERE wv_id = '$id' ");
      $query3 = $DBcon->prepare("SELECT *FROM table_specrf WHERE wv_id = '$id' ");
      $query4 = $DBcon->prepare("SELECT *FROM table_specsc WHERE wv_id = '$id' ");
      $query5 = $DBcon->prepare("SELECT *FROM table_specwd WHERE wv_id = '$id' ");
      $query6 = $DBcon->prepare("SELECT *FROM table_specwm WHERE wv_id = '$id' ");

      $query->execute();
      $query2->execute();
      $query3->execute();
      $query4->execute();
      $query5->execute();
      $query6->execute();

      $total  = $query->rowCount();
      $total2 = $query2->rowCount();
      $total3 = $query3->rowCount();
      $total4 = $query4->rowCount();
      $total5 = $query5->rowCount();
      $total6 = $query6->rowCount();

      if ($total > 0 || $total2 > 0 || $total3 > 0 || $total4 > 0 || $total5 > 0 || $total6 > 0 ) {
        $json_wv = array(
          "Status" => "NO"
        );

        echo json_encode($json_wv);
      }else{
        $json_wv = array(
          "Status" => "YES"
        );

        echo json_encode($json_wv);
      }

    }else if ($sub == "delRf") {
      $json_rf = array(
        "Status" => "YES"
      );

      echo json_encode($json_rf);

    }else if ($sub == "delSC") {
      $query = $DBcon->prepare("SELECT *FROM table_status WHERE sc_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_sc = array(
          "Status" => "NO"
        );

        echo json_encode($json_sc);
      }else{
        $json_sc = array(
          "Status" => "YES"
        );

        echo json_encode($json_sc);
      }

    }else if ($sub == "delCP") {
      $query = $DBcon->prepare("SELECT *FROM table_type WHERE cp_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_cp = array(
          "Status" => "NO"
        );

        echo json_encode($json_cp);
      }else{
        $json_cp = array(
          "Status" => "YES"
        );

        echo json_encode($json_cp);
      }

    }else if ($sub == "delDep") {
      $query = $DBcon->prepare("SELECT *FROM table_revisitype WHERE DepartementID = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_department = array(
          "Status" => "NO"
        );

        echo json_encode($json_department);
      }else{
        $json_department = array(
          "Status" => "YES"
        );

        echo json_encode($json_department);
      }

    }else if ($sub == "delCM") {
      /*$query = $DBcon->prepare("SELECT *FROM table_categoryMonitor WHERE cm_id = '$id' ");
      $query->execute();
      $total = $query->rowCount();

      if ($total > 0) {
        $json_cm = array(
          "Status" => "NO"
        );

        echo json_encode($json_cm);
      }else{
        $json_cm = array(
          "Status" => "YES"
        );

        echo json_encode($json_cm);
      }*/

      $json_cm = array(
          "Status" => "YES"
        );

        echo json_encode($json_cm);

    }
    exit();
  }




  ?>

  <html>
  <head>
    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Information System 2018 - SET UP</title>


    <script src="_jscript/js/jquery.min.js"></script>
    <script src="_jscript/js/kickstart.js"></script>
    <script src="_jscript/js/jquery-ui.js"></script>
    <script src="_jscript/js/sweetalert.min.js"></script>
    <script src="_jscript/js/jquery.rtnotify.js"></script>
    <script src="_jscript/js/makefixed.js"></script>



    <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/select.dataTables.css">
    <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>
    <script src="_datatables/datatable/js/dataTables.select.js"></script>

    <link rel="stylesheet" href="_jscript/css/v5.1.0-all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="_jscript/css/kickstart.css" media="all" />
    <link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
    <link rel="stylesheet" href="_jscript/css/jquery.rtnotify.css" media="all" />

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
      font-family:"Segoe UI";
      color:000;
      padding: 3;
    }

    li {
      padding: 1px 0;
    }

    ul, ol {
      padding: 0;
      margin: 0 0 0px 25px;
    }

    .label {
      background-color:#f5eedc;
      padding-left:10px;
      padding-top:4px;
      height:25px; 
      font-weight: bold;
      border-radius: 5px;
    }

    .item1 {
      padding-left:20px;
      border-bottom-color: #ddd;
      border-bottom-style: solid;
      border-bottom-width: 1px;
    }

    .itemicon {
      padding:3px;
      cursor: pointer;
    }

    .listitem{
      cursor: pointer;
    }

    .addnewicon{
      position: relative;
      left: -24px;
      top:  6px;
      width: 30px;
      cursor: pointer;
    }

    .area1{
      border:1px solid  #fff;
      width: 180px;
      padding:2px;
    }

    table.dataTable{
      width:800px;
      margin:0;
    }

    div.dataTables_wrapper {
      width: 904px;
    }


/* 
.col_1 {border:1px solid  #ff0000;}
.col_2 {border:1px solid  #0ff000;}
.col_3 {border:1px solid  #00ff00;}
.col_4 {border:1px solid  #000ff0;}
.col_5 {border:1px solid  #0000ff;}
.col_6 {border:1px solid  #f0f000;}
.col_7 {border:1px solid  #f00f00;}
.col_8 {border:1px solid  #f000f0;}
.col_9 {border:1px solid  #f0000f;}
.col_10 {border:1px solid  #ff00ff;}
.col_11 {border:1px solid  #ff0ff0;}
.col_12 {border:1px solid  #ffff00;}
*/


</style>
</head>
<?php
if ($_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" || $_SESSION['role'] == "EN" || $_SESSION['role'] == "GE"){
  header('location:index.php');
}else if ($_SESSION["role"]=="AD" || $_SESSION["role"]=="M") {
  ?>
  <body>
    <center/>
    <table border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td class="psi_width7" width="1800" height="200" valign="top">
          <?php
          include_once 'psi_menu.php'; 
          ?>
          <ul class="tabs left">
            <li id="tab1ID"><a href="#TabGroup">Group</a></li>
            <li id="tab2ID"><a href="#TabProduct">Product</a></li>
            <li id="tab11ID"><a href="#TabModel">Model</a></li>
            <li id="tab3ID"><a href="#TabChassis">Chassis</a></li>
            <li id="tab4ID"><a href="#TabCapacity">Capacity</a></li>
            <li id="tab6ID"><a href="#TabCountry">Country</a></li>
            <li id="tab5ID"><a href="#TabBuyer">Buyer</a></li>
            <li id="tab7ID"><a href="#TabManPower">Man Power</a></li>
            <li id="tab8ID"><a href="#TabTitle">Title</a></li>
            <li id="tab10ID"><a href="#TabStatus">Project Status</a></li>
            <li id="tab12ID"><a href="#TabFeature">Features</a></li>
            <li id="tab13ID"><a href="#TabOption">OptionList</a></li>
          </ul>
          <!--######################################################################################    GROUP    #########################################################################################-->
          <div id="TabGroup" class="tab-content">
            <?php
            include "psi_setupgrp.php";
            ?>            
          </div>
          <!--######################################################################################   PRODUCT   #################################################################################################-->
          <div id="TabProduct" class="tab-content">
            <?php
            include "psi_setupprd.php";
            ?>            
          </div>
          <!--######################################################################################   CHASIS   ######################################################################################-->
          <div id="TabChassis" class="tab-content">
            <?php
            include "psi_setupchs.php";
            ?>        
          </div>
          <!--######################################################################################  CAPACITY  ######################################################################################-->
          <div id="TabCapacity" class="tab-content">
            <?php
            include "psi_setupcap.php";
            ?>
          </div>
          <!--######################################################################################  BUYER  ######################################################################################################-->
          <div id="TabBuyer" class="tab-content">
            <?php
            include "psi_setupbuy.php";
            ?>
          </div>
          <!--######################################################################################   COUNTRY   ######################################################################################-->
          <div id="TabCountry" class="tab-content">
            <?php
            include "psi_setupcountry.php";
            ?>
          </div>
          <!--######################################################################################   MAN POWER   ######################################################################################-->
          <div id="TabManPower" class="tab-content">
            <?php
            include "psi_setupman.php";
            ?>
          </div>

          <!--######################################################################################   TITLE   ######################################################################################-->
          <div id="TabTitle" class="tab-content">
            <?php
            include "psi_setuptit.php";
            ?>
          </div>
          <!--######################################################################################  STATUS  ######################################################################################################-->
          <div id="TabStatus" class="tab-content">
            <?php
            include "psi_setupsta.php";
            ?>
          </div> 
          <!--######################################################################################   MODEL   ######################################################################################-->
          <div id="TabModel" class="tab-content">
            <?php
            include "psi_setupmod.php";
            ?>
          </div>
          <!--######################################################################################   FEATURE   ######################################################################################-->
          <div id="TabFeature" class="tab-content">
            <?php
            include "psi_setupfea.php";
            ?>       
          </div>
          <!--######################################################################################   OPTION LIST   ######################################################################################-->
          <div id="TabOption" class="tab-content">
            <?php
            include ("psi_setupopt.php");
            ?>
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





    <script>
//$("#addnewgrp, #editinggrp, #addnewprd, #editingprd, #addnewchs, #editingchs, #addnewcap, #editingcap, #addnewbuy, #editingbuy").hide();
//$("#addnewctr, #editingctr,#addnewmanp, #editingmanp,#addnewtit, #editingtit,#addnewprj, #editingprj,#addnewsta, #editingsta, #addnewmod, #editingmod, #addnewfea, #editingfea").hide();

$("#addnewigrp").click(function() { $("#addnewgrp").show(300); $('#GroupName').focus(); });
$("#editigrp").click(function()   { $("#editinggrp").show(300);  });

$("#addnewiprd").click(function() { $("#addnewprd").show(300); $('#ProductName').focus(); });
$("#editiprd").click(function()   { $("#editingprd").show(300); });

$("#addnewichs").click(function() { $("#addnewchs").show(300); $('#ChasisName').focus(); });
$("#editichs").click(function()   { $("#editingchs").show(300); });

$("#addnewicap").click(function() { $("#addnewcap").show(300); $('#SizeName').focus(); });
$("#editicap").click(function()   { $("#editingcap").show(300); });

$("#addnewibuy").click(function() { $("#addnewbuy").show(300); $('#BuyerName').focus(); });
$("#editibuy").click(function()   { $("#editingbuy").show(300); });

$("#addnewictr").click(function() { $("#addnewctr").show(300); $('#CountryName').focus(); });
$("#editictr").click(function()   { $("#editingctr").show(300); });

$("#addnewimanp").click(function() { $("#addnewmanp").show(300); $('#ManName').focus(); });
$("#editimanp").click(function()   { $("#editingmanp").show(300); });

$("#addnewitit").click(function() { $("#addnewtit").show(300); $('#TitleName').focus(); });
$("#edititit").click(function()   { $("#editingtit").show(300); });

$("#addnewista").click(function() { $("#addnewsta").show(300); $('#StatusName').focus(); });
$("#editista").click(function()   { $("#editingsta").show(300); });

$("#addnewimod").click(function() { $("#addnewmod").show(300); $('#ModelName').focus(); });
$("#editimod").click(function()   { $("#editingmod").show(300); });

$("#addnewifea").click(function() { $("#addnewfea").show(300); $('#FeatureName').focus(); });
$("#editifea").click(function()   { $("#editingfea").show(300); });

$("#editigrp, #deligrp, #refreshigrp, #tab1ID").click(function()   { $("#addnewgrp").hide(300);  });
$("#addnewigrp, #deligrp, #refreshigrp, #tab1ID").click(function() { $("#editinggrp").hide(300); });

$("#editiprd, #deliprd, #refreshiprd, #tab2ID").click(function()   { $("#addnewprd").hide(300);  });
$("#addnewiprd, #deliprd, #refreshiprd, #tab2ID").click(function() { $("#editingprd").hide(300); });

$("#editichs, #delichs, #refreshichs, #tab3ID").click(function()   { $("#addnewchs").hide(300);  });
$("#addnewichs, #delichs, #refreshichs, #tab3ID").click(function() { $("#editingchs").hide(300); });

$("#editicap, #delicap, #refreshicap, #tab4ID").click(function()   { $("#addnewcap").hide(300);  });
$("#addnewicap, #delicap, #refreshicap, #tab4ID").click(function() { $("#editingcap").hide(300); });

$("#editibuy, #delibuy, #refreshibuy, #tab5ID").click(function()   { $("#addnewbuy").hide(300);  });
$("#addnewibuy, #delibuy, #refreshibuy, #tab5ID").click(function() { $("#editingbuy").hide(300); });

$("#editictr, #delictr, #refreshictr, #tab6ID").click(function()   { $("#addnewctr").hide(300);  });
$("#addnewictr, #delictr, #refreshictr, #tab6ID").click(function() { $("#editingctr").hide(300); });

$("#editimanp, #delimanp, #refreshimanp, #tab7ID").click(function()   { $("#addnewmanp").hide(300);  });
$("#addnewimanp, #delimanp, #refreshimanp, #tab7ID").click(function() { $("#editingmanp").hide(300); });

$("#edititit, #delitit, #refreshitit, #tab8ID").click(function()   { $("#addnewtit").hide(300);  });
$("#addnewitit, #delitit, #refreshitit, #tab8ID").click(function() { $("#editingtit").hide(300); });

$("#editista, #delista, #refreshista, #tab10ID").click(function()   { $("#addnewsta").hide(300);  });
$("#addnewista, #delista, #refreshista, #tab10ID").click(function() { $("#editingsta").hide(300); });

$("#editimod, #delimod, #refreshimod, #tab11ID").click(function()   { $("#addnewmod").hide(300);  });
$("#addnewimod, #delimod, #refreshimod, #tab11ID").click(function() { $("#editingmod").hide(300); });

$("#editifea, #delifea, #refreshifea, #tab12ID").click(function()   { $("#addnewfea").hide(300);  });
$("#addnewifea, #delifea, #refreshifea, #tab12ID").click(function() { $("#editingfea").hide(300); });

$(".backicon").click(function() { 
  HideAll();
});

$(document).keyup(function(e) {
if (e.key === "Escape") { // escape key maps to keycode `27`
  HideAll();
}
});


function HideAll(){
  $(" #addnewgrp, #editinggrp, #addnewprd, #editingprd, #addnewchs, #editingchs, #addnewcap, #editingcap, #addnewbuy, #editingbuy, #addnewctr, #editingctr, #addnewmanp, #editingmanp, #addnewtit, #editingtit, #addnewsta, #editingsta, #addnewmod, #editingmod, #addnewfea, #editingfea").hide(200);  
}

function ClearAllinput(){
  $('#GroupName').val('');
  $('#GroupNote').val('');

  $('#ProductName').val('');
  $('#ProductCode').val('');
  $('#ProductNote').val('');

  $('#ChasisName').val('');
  $('#ProductName').val('');
  $('#ChasisNote').val('');

  $('#SizeName').val('');
  $('#SizeAlias').val('');
  $('#ProductName').val('');
  $('#SizeNote').val('');

  $('#BuyerName').val('');
  $('#CountryName').val('');
  $('#BuyerBrand').val('');
  $('#BuyerNote').val('');

  $('#CountryName').val('');
  $('#CountryLot').val('');
  $('#CountryNote').val('');

  $('#ManName').val('');
  $('#Otorisasi').val('');
  $('#Design').val('');
  $('#ManEmail').val('');

  $('#TitleName').val('');
  $('#TitleCategory').val('');

  $('#StatusName').val('');
  $('#StausCategory').val('');
  $('#StatusAlias').val('');
  $('#StatusNote').val('');

  $('#ModelName').val('');
  $('#ProductName').val('');

  $('#FeatureName').val('');
  $('#ProductName').val('');

  HideAll();
}

$(document).ready(function(){
  GroupFunction();
  ProductFunction();
  ChassisFunction();
  CapacityFunction();
  BuyerFunction();
  CountryFunction();
  ManpowerFunction();
  TitleFunction();
  StaFunction();
  ModelFunction();
  FeatureFunction();
  HideAll();
});

$("#tab1ID").click(function() {
  GroupFunction();
});
$("#tab2ID").click(function() {
  ProductFunction();
});
$("#tab3ID").click(function() {
  ChassisFunction();
});
$("#tab4ID").click(function() {
  CapacityFunction();
});
$("#tab5ID").click(function() {
  BuyerFunction();
});
$("#tab6ID").click(function() {
  CountryFunction();
});
$("#tab7ID").click(function() {
  ManpowerFunction();
});
$("#tab8ID").click(function() {
  TitleFunction();
});
//$("#tab9ID").click(function() {
//  ProjectFunction();
//});
$("#tab10ID").click(function() {
  StaFunction();
});
$("#tab11ID").click(function() {
  ModelFunction();
});
$("#tab12ID").click(function() {
  FeatureFunction();
});

$('.psi_button1').on('keydown', function(e) { 
  if (e.keyCode == 9 && event.shiftKey){

  } else if(e.keyCode == 9 ){
    e.preventDefault()
  }; 
});


$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
  e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<span class="col_8 center"><input type="text" name="mytext[]"/></span><span><a href="#" class="remove_field">x</a></span>'); //add input box
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
  e.preventDefault(); $(this).parent('span').remove();$(this).parent('span').remove(); x--;
})
});



//sticky
window.onscroll = function(){
  myFunction()};
  var navbar = document.getElementById("navbar");
  var xnavbar = document.getElementById("xt");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky");
      xnavbar.classList.add("xsticky");

    } else {
      navbar.classList.remove("sticky");
      xnavbar.classList.remove("xsticky");
    }
  }


//act-button-fixed / flying button
$(document).ready(function(){
  $('.fixed').makeFixed();
});



</script>


</body>
</html>
<?php 
} else{
  header('location:index.php');
// include_once 'psi_verify.php';
}
}
?>   