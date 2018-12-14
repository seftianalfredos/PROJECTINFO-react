<table class="psi_width6" valign="top">
  <div class="col_3 area1 input_fields_wrap">
    <div class="col_12" id="sub1"><b>Plant</b></div>
    <div class="col_12">
      <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_plant WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editPlant" class="fa fa-pencil fa-sm fEdit" name="<?php echo $row['plant_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delPlant" class="fa fa-remove fa-lg fDelete" name="<?php echo $row['plant_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addplant addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>



  <div class="col_12" id="sub2"><b>Format</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_format WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editFormat" class="fa fa-pencil fa-sm fEdit" name="<?php echo $row['format_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delFormat" class="fa fa-remove fa-lg fDelete" name="<?php echo $row['format_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addformat addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>



  <div class="col_12" id="sub3"><b>Made In</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_madein WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editMadein" class="fa fa-pencil fa-sm mEdit" name="<?php echo $row['madein_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delMadein" class="fa fa-remove fa-lg mDelete" name="<?php echo $row['madein_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addmade addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>
</div>



<div class="col_3 area1">
  <div class="col_12" id="sub4"><b>Color</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_color WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editColor" class="fa fa-pencil fa-sm cEdit" name="<?php echo $row['color_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delColor" class="fa fa-remove fa-lg cDelete" name="<?php echo $row['color_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addcolor addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub5"><b>Pattern</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_pattern WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editPattern" class="fa fa-pencil fa-sm pEdit2" name="<?php echo $row['pattern_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delPattern" class="fa fa-remove fa-lg pDelete2" name="<?php echo $row['pattern_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addpattern addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub6"><b>Finishing</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_finishing WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editFinishing" class="fa fa-pencil fa-sm fEdit2" name="<?php echo $row['finishing_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delFinishing" class="fa fa-remove fa-lg fDelete2" name="<?php echo $row['finishing_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addfinishing addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub7"><b>Handle Type</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_handle WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editHandle" class="fa fa-pencil fa-sm hEdit" name="<?php echo $row['handle_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delHandle" class="fa fa-remove fa-lg hDelete" name="<?php echo $row['handle_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addhadletype addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub8"><b>Rack</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_rack WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRack" class="fa fa-pencil fa-sm rEdit" name="<?php echo $row['rack_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRack" class="fa fa-remove fa-lg rDelete" name="<?php echo $row['rack_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addrack addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub8"><b>Raczdfgzdfgk</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_rack WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRack" class="fa fa-pencil fa-sm rEdit" name="<?php echo $row['rack_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRack" class="fa fa-remove fa-lg rDelete" name="<?php echo $row['rack_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addrack addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>
</div>



<div class="col_3 area1">
  <div class="col_12" id="sub9"><b>Status (Dimension)</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_dimension WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editDimension" class="fa fa-pencil fa-sm dEdit" name="<?php echo $row['dimension_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delDimension" class="fa fa-remove fa-lg dDelete" name="<?php echo $row['dimension_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addstsdim addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub10"><b>Packing Name</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_packing WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editPacking" class="fa fa-pencil fa-sm pEdit3" name="<?php echo $row['packing_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delPacking" class="fa fa-remove fa-lg pDelete3" name="<?php echo $row['packing_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addpackingname addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub11"><b>Rollbond</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_rollbond WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRollbond" class="fa fa-pencil fa-sm rEdit2" name="<?php echo $row['rollbond_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRollbond" class="fa fa-remove fa-lg rDelete2" name="<?php echo $row['rollbond_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addrollbound addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub12"><b>Rollbond Type</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_rollbondtype WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRollbondtype" class="fa fa-pencil fa-sm rEdit3" name="<?php echo $row['rollbondtype_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRollbondtype" class="fa fa-remove fa-lg rDelete3" name="<?php echo $row['rollbondtype_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addrollboundtype addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub13"><b>Temperature Control</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_temperature WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editTemperature" class="fa fa-pencil fa-sm tEdit" name="<?php echo $row['temperature_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delTemperature" class="fa fa-remove fa-lg tDelete" name="<?php echo $row['temperature_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addtempctrl addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub14"><b>Climate Class</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_climate WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editClimate" class="fa fa-pencil fa-sm cEdit" name="<?php echo $row['climate_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delClimate" class="fa fa-remove fa-lg cDelete" name="<?php echo $row['climate_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addclimate addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub15"><b>Condensor</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_condensor WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editCondensor" class="fa fa-pencil fa-sm cEdit2" name="<?php echo $row['condensor_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delCondensor" class="fa fa-remove fa-lg cDelete2" name="<?php echo $row['condensor_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addcondensor addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub16"><b>Refrigerant</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_refrigerant WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRefrigerant" class="fa fa-pencil fa-sm rEdit4" name="<?php echo $row['refrigerant_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRefrigerant" class="fa fa-remove fa-lg rDelete4" name="<?php echo $row['refrigerant_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addrefrigerant addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>
</div>




<div class="col_3 area1">
  <div class="col_12" id="sub17"><b>Rated Voltage</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_rv WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRv" class="fa fa-pencil fa-sm rvEdit" name="<?php echo $row['rv_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRv" class="fa fa-remove fa-lg rvDelete" name="<?php echo $row['rv_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addratedv addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>

  <div class="col_12" id="sub18"><b>Wide Voltage</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_wv WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editWv" class="fa fa-pencil fa-sm wvEdit" name="<?php echo $row['wv_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delWv" class="fa fa-remove fa-lg wvDelete" name="<?php echo $row['wv_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addwvoltage addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>


  <div class="col_12" id="sub19"><b>Rated Frequency</b></div>
  <div class="col_12">
    <ul>
        <?php
        include 'config.php';
        $query = $DBcon->prepare("SELECT * FROM table_rf WHERE name NOT LIKE '--' ");
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <li value="<?php echo $row['id'] ?>"><?php echo $row['name'];?>
          <i id="editRf" class="fa fa-pencil fa-sm rfEdit" name="<?php echo $row['rf_id']; ?>" value="<?php echo $row['name']; ?>"></i>&nbsp;
          <i id="delRf" class="fa fa-remove fa-lg rfDelete" name="<?php echo $row['rf_id']; ?>" value="<?php echo $row['name']; ?>"></i>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="col_12"><button class="addratedf addoption">Add New</button></div>
  <div class="col_12">&nbsp;</div>
</div>

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
  swal({
    title             : "Perhatian",
    text              : "Hapus Item  : "+nameVal+" dari database?",
    showCancelButton  : true, 
    confirmButtonColor: "#DD6B55",
    confirmButtonText : "Ya, Hapus saja!",
    cancelButtonText  : "Batalkan",
    closeOnConfirm    : false,
    closeOnCancel     : false
  },
  function(isConfirm) {
      if (isConfirm) {
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
      } else {
        swal("Dibatalkan !", "", "error");
        window.location.hash = "TabOption";
        location.reload(true);
      }
  });
}

</script>