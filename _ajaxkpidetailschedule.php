<?php 
include 'config.php';
if (isset($_POST['idtype'])) {
  $type_id = $_POST['idtype'];

  $stmt = $DBcon->prepare("SELECT *FROM table_type WHERE type_id = :type_id");
  $stmt->bindParam(':type_id', $type_id);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $typeSupply = $row['typeSupply'];
  }
}
?>
<div class="col_12"><?php echo $typeSupply; ?></div>
<input type="hidden" id="type_idSch" value="<?php echo $type_id ?>">
<div class="col_7">
  <table id="table_detailSche" class="display" style="width:300px">
    <thead>
      <tr>
        <th>No</th>
        <th>Design</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>PIC</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>  
</div>

<script type="text/javascript">

  var id = $('#type_idSch').val();

$('#table_detailSche').DataTable({
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
      "width"     : 75
    },{ 
      "targets"   : [ 2 ], 
      "className" : "dt-center",
      "width"     : 70
    },{ 
      "targets"   : [ 3 ], 
      "className" : "dt-center",
      "width"     : 70
    },{ 
      "targets"   : [ 4 ], 
      "className" : "dt-left",
      "width"     : 70
    }],
    "ajax"        : {
      url   : 'fetch_detailSchedule.php',
      type  : 'POST',
      data  : {
        id : id
      }
    }
  });
</script>