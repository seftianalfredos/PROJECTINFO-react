<?php
$year = date('Y');
?>
  <table class="psi_width1200" border="0">
    <tr>
      <td>
        <div class="col_12" style="background-color: #efefef; padding:3px">
          <div class="col_1"><i>Visi</i></div>
          <div class="col_11"><i>: Target On-Time 75%</i></div>
          <div class="col_1"><i>Misi</i></div>
          <div class="col_11"><i>:  Project Delay karena problem internal. Sasaran < 10%</i></div>
        </div>
        <div class="col_12" style="padding:3px"></div>
        <div class="col_10">
  
          <table border="1" style="border: 1px solid #aaa;">
            <tr>
              <th width="50">No</th>
              <th width="100">Year</th>
              <th width="75">Total</th>
              <th width="75">Canceled</th>
              <th width="75">Progress</th>
              <th width="75">MassPro</th>
              <th width="75">Delay</th>
              <th width="75">OnTime</th>
              <th width="277">Note</th>
            </tr>
            <?php
            for ($i= $year, $a = 1; $i >= $year - 4, $a <= 5  ; $i--, $a++) { 
              ?>
              <tr>
                <td class="center"><?php echo $a; ?></td> <!-- No -->
                <td class="center idyear" id="<?php echo $i ?>"><?php echo $i ?></td> <!-- Tahun -->
                <?php
                include 'config2.php';
                $stmt = mysqli_query($koneksi, "SELECT COUNT(type_id) AS Total FROM table_type WHERE TypeStartDate LIKE '%".$i."%' ");
                while ($row = mysqli_fetch_array($stmt)) {
                  ?>
                  <td class="center"><?php echo $row['Total'] ?></td> <!-- Total -->
                  <?php 
                }
                ?>
                <?php
                include 'config2.php';

                $result = mysqli_query($koneksi, "SELECT COUNT(type_id) AS Total FROM table_type WHERE TypeStartDate LIKE '%".$i."%' AND sta_id = 14 ");
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <td class="center"><?php echo $row['Total'] ?></td> <!-- Canceled -->
                  <?php 
                }
                ?> 
                <?php
                include 'config2.php';

                $result = mysqli_query($koneksi, "SELECT COUNT(type_id) AS Total FROM table_type WHERE TypeStartDate LIKE '%".$i."%' AND sta_id IN (1,2,3,4,6,7) ");
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <td class="center"><?php echo $row['Total'] ?></td> <!-- Progress -->
                  <?php 
                }
                ?>
                <?php
                include 'config2.php';

                $result = mysqli_query($koneksi, "SELECT COUNT(type_id) AS Total FROM table_type WHERE TypeStartDate LIKE '%".$i."%' AND sta_id = 8 ");
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <td class="center"><?php echo $row['Total'] ?></td> <!-- MassPro -->
                  <?php 
                }
                ?>
                <?php
                include 'config2.php';

                $result = mysqli_query($koneksi, "SELECT * FROM table_type tt JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE YEAR(TypeStartDate) = ".$i." AND sta_id = 8  GROUP BY tt.type_id HAVING MAX(late) > 0 ");
                  ?>
                  <td class="center"><?php echo mysqli_num_rows($result); ?></td> <!-- Delay -->
                <?php
                include 'config2.php';

                $result = mysqli_query($koneksi, "SELECT * FROM table_type tt JOIN table_revisitype trt ON tt.type_id = trt.type_id WHERE YEAR(TypeStartDate) = ".$i." AND sta_id = 8  GROUP BY tt.type_id HAVING MAX(late) = 0");
                  ?>
                  <td class="center"><?php echo mysqli_num_rows($result); ?></td> <!-- On Time -->
                <td class="left"></td> <!-- Note -->
              </tr>
              <?php 
            } 
            ?>
          </table>
        </div>

        <span id="ajaxOnTargetgraph"></span>
        <span id="ajaxgraph"></span>

      </td>
    </tr>
  </table>
<script type="text/javascript">

$(document).ready(function() {
  $('td .idyear').on('click', function() {
  var id = $(this).attr('id');
  if (id) {
    $.ajax({
      type : "POST",
      url  : "psi_kpidelivdelay.php",
      data : {id : id},
      cache: false,
    });
  }
  });
});



$(function showgraph() {
  $('td .idyear').on("click",function(){
  var id = $(this).attr('id');
  if(id) {
    $.ajax({
      type: "POST",
      url: "_ajaxkpidelivery.php",
      data: "idy="+ id,
      cache: false,
      success: function(html){
        $("#ajaxgraph").html(html);
      }
    });
    $.ajax({
      type: "POST",
      url: "_ajaxkpiOnTarget.php",
      data: "idy="+ id,
      cache: false,
      success: function(html){
        $("#ajaxOnTargetgraph").html(html);
      }
    });
  }
  return false;
  });
});


$(document).ready(function() {
    $.ajax({
      type: "POST",
      url: "_ajaxkpidelivery.php",
      cache: false,
      success: function(html){
        $("#ajaxgraph").html(html);
      }
    });
    $.ajax({
      type: "POST",
      url: "_ajaxkpiOnTarget.php",
      cache: false,
      success: function(html){
        $("#ajaxOnTargetgraph").html(html);
      }
    });
});

</script>




