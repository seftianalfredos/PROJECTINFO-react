<?php
include 'config.php';

if(isset($_POST["idtype"])) {
  $typeSupply = '';
  $idtype = $_POST["idtype"];

  $sql = $DBcon->prepare("SELECT *FROM table_type WHERE type_id = :type_id");
  $sql->bindParam(':type_id', $idtype);
  $sql->execute();
  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    $typeSupply = $row['typeSupply'];
  }

?>
<input type="hidden" id="tempId" value="<?php echo $idtype ?>">
<div class="col_12"><?php echo $typeSupply ?></div>
<div class="col_7">
<table id="table_delay2" class="display" style="width:700px">
    <thead>
    <tr>
      <th class="kpidelay">No</th>
      <th class="kpidelay">Rev</th>
      <th class="kpidelay">RevDate</th>
      <th class="kpidelay">Delay</th>
      <th class="kpidelay">Reason</th>
      <th class="kpidelay">Note</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>  
</div>
<div class="col_5">
  <table id="table_delay3" class="display" style="width:700px">
    <thead>
    <tr>
      <th class="kpidelay">No</th>
      <th class="kpidelay">Activity</th>
      <th class="kpidelay">Date</th>
      <th class="kpidelay">Note</th>
    </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>

<script>

var id  = $('#tempId').val();;

$('#table_delay2').DataTable({
    "dom"         : "rt",
    "destroy"     : true,
    "processing"  : true,
    "paging"      : true,
    "serverSide"  : true,
    "stateSave"   : true,     
    "order"       : [[1, "desc"]],
    "ordering"    : true,
    "scrollX"     : true,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "className" : "dt-center",
      "width"     : 5
    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-center",
      "width"     : 20
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-center",
      "width"     : 70
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-center",
      "width"     : 20
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 200
    },{ 
      "targets"   : [ 5 ], 
      "className" : "dt-left",
      "width"     : 500
    }
    ],
    "ajax"        : {
      url   : 'fetch_delay2.php',
      type  : 'POST',
      data  : {
        id : id
      }
    }
  });


$('#table_delay3').DataTable({
    "dom"         : "rt",
    "destroy"     : true,
    "processing"  : true,
    "paging"      : true,
    "serverSide"  : true,
    "stateSave"   : true,     
    "order"       : [[1, "asc"]],
    "ordering"    : true,
    "scrollX"     : true,
    "columnDefs"  : [
    {
      "targets"   : [ 0 ], 
      "className" : "dt-center",
      "width"     : 5, 
    },{ 
      "targets"   : [ 1 ], 
      "className" : "dt-center",
      "width"     : 100
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-center",
      "width"     : 70
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-left",
      "width"     : 350
    }
    ],
    "ajax"        : {
      url   : 'fetch_delay3.php',
      type  : 'POST',
      data  : {
        id : id
      }
    }
  });

</script>

<?php
}
?>