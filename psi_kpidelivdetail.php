<?php
 
$year = date('Y');

?>

<table class="psi_width1200" border="0">
  <tr>
    <td>
      <div class="col_12" style="background-color: #efefef; padding:3px">
        <div class="col_1"><i>Delay</i></div>
        <div class="col_11"><i>: Mengetahui keterlambatan terpanjang</i></div>
        <div class="col_1"><i>Reason</i></div>
        <div class="col_11"><i>:  Mengetahui penyebab keterlambatan terbanyak</i></div>
      </div>
      <ul class="tabs left">
        <li class="current"><a href="#tabdelay">Delay</a></li>
        <li><a href="#tabreason">Reason</a></li>
      </ul>
      <div id="tabdelay" class="tab-content">
      <?php
        include "psi_kpidelivdelay.php";
      ?>            
      </div>
      <div id="tabreason" class="tab-content">
      <?php
        include "psi_kpidelivreason.php";
      ?>            
      </div>    
    </td>
  </tr>
</table>
