<?php
session_start();
$currentmenu = "2";
if(!isset($_SESSION['role']) || (trim($_SESSION['role']) == '')) {
  header("location: http://10.10.104.251/UserManagement/admin/login.php");
  exit();

}else{

  if ($_SESSION['role'] == "GE") {
    header('location:prj_note.php');
  }

require_once('cal_bdd.php');


if (isset($_GET['inputIDnote'])) {
  $vId = $_GET['inputIDnote'];

  if ($vId != '') {

    $stmt   = $bdd->prepare("
      SELECT tn.notes_id AS notes_id, tt.tit_id AS tit_id, tt.TitleName AS TitleName, tn.description AS description, tn.colors AS colors, tn.start_date AS start_date, tn.end_date AS end_date, tp.prj_id AS prj_id, tp.ProjectName AS ProjectName, tty.type_id AS type_id, tty.typeSupply AS typeSupply, tn.attachment AS attachment
      FROM table_notes tn 
      LEFT JOIN table_title tt ON tn.tit_id = tt.tit_id
      LEFT JOIN table_project tp ON tn.prj_id = tp.prj_id
      LEFT JOIN table_type tty ON tn.type_id = tty.type_id
      WHERE notes_id = :notes_id
      ");
    $stmt->bindParam(':notes_id',$vId);
    $stmt->execute();

    $events  =  $stmt->fetchAll();

  }

}else{

  $sql = "SELECT tn.notes_id AS notes_id, tt.tit_id AS tit_id, tt.TitleName AS TitleName, tn.description AS description, tn.colors AS colors, tn.start_date AS start_date, tn.end_date AS end_date, tp.prj_id AS prj_id, tp.ProjectName AS ProjectName, tty.type_id AS type_id, tty.typeSupply AS typeSupply, tn.attachment AS attachment 
  FROM table_notes tn 
  LEFT JOIN table_title tt ON tn.tit_id = tt.tit_id 
  LEFT JOIN table_project tp ON tn.prj_id = tp.prj_id
  LEFT JOIN table_type tty ON tn.type_id = tty.type_id WHERE tn.author = '".$_SESSION['username']."' ";

  $req = $bdd->prepare($sql);
  $req->execute();

  $events = $req->fetchAll();

}


?>
<!--############################################################################## HTML ########### -->

<html>
<head>
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Project Information System 2018 - Notes</title>


  <script src="_jscript/js/jquery.min.js"></script>
  <script src="_jscript/js/kickstart.js"></script>
  <script src="_jscript/js/jquery-ui.js"></script>
  <script src="_jscript/js/sweetalert.min.js"></script>
  <script src="_chosen/chosen.jquery.js"></script>


  <link href='_jscript/calendar/css/fullcalendar.css' rel='stylesheet' />
  <link href="_jscript/calendar/css/bootstrap-mod.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="_datatables/datatable/css/jquery.dataTables.min.css">
  <script src="_datatables/datatable/js/jquery.dataTables.min.js"></script>

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
    font-family:"Segoe UI";
    color:000;
    padding: 3;
  }

  select {
    border: solid 1px #faa;
    font: normal 14px/100% "Open Sans300",  Verdana, Tahoma, sans-serif;
    outline: 0;
    width: 100%;
    border-radius:5px;
    color: #000;
  }

  .bld {
    font-weight: bold;
    background-color: #edeeed;
  }

  #calendar {
    max-width: 800px;
  }

  .col-centered{
    float: none;
    margin: 0 auto;
  }

  h2 {
    font-size: 2em; 
  }


  .area1{border:0px solid  #f00; width: 400px; padding:2px;}
  .area2{border:0px solid  #0f0; width: 120px; }
  .area3{border:0px solid  #00f; width: 260px; }
  .area4{border:0px solid  #ff0; width: 60px; }
  .area5{border:0px solid  #f00; width: 500px; padding:2px;}
  .area6{border:0px solid  #f00; width: 1000px; padding:2px;}
  .area7{border:0px solid  #f00; width: 700px; padding:2px;}



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
          <li id="tab1a"><a>Line Up</a></li>
          <li id="tab1b"><a>Queue</a></li>
          <li class="current" id="tab1c"><a href="#tab_note">Note</a></li>
          <li id="tab1d"><a>Reschedule</a></li>
          <li id="tab1e"><a>Schedule</a></li>
          <li id="tab1f"><a>Monitor</a></li>
        </ul>

        <div id="tab1c" class="tab-content">
          <ul class="tabs left">
            <li><a href="psi_project.php#tab_note"><i>Events List</i></a></li>
            <li class="current"><a href="#tab_calevent"><i>Calendar Events</i></a></li>
          </ul>


          <div id="tab_calevent" class="tab-content">
            <table class="psi_width7" border="0" align="left">
              <tr>
                <td class="left">
                  <div class="col_12">


                  </div>
                  <div class="col_12">        


                    <div class="container area7">
                      <div class="row">
                        <div class="col-lg-12 text-center">
                          <div id="calendar" class="col-left">
                          </div>
                        </div>
                      </div>

                      <!-- Modal ADD -->
                      <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                            </div>
                            <div class="modal-body">

                              <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                  <select name="title" class="form-control" id="title">
                                    <option value="">Choose</option>
                                    <?php
                                    include 'config.php';
                                    $stmt2  = $DBcon->prepare("SELECT *FROM table_title WHERE TitleCategory = 'Note' ORDER BY TitleName ASC ");
                                    $stmt2->execute();
                                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                      ?>
                                      <option value="<?php echo $row['tit_id']; ?>"><?php echo $row['TitleName']; ?></option>
                                      <?php 
                                    } 
                                    ?>  
                                  </select>
                                </div>

                                <label for="title" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                  <input type="text" name="descript" class="form-control" id="descript" placeholder="Description">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Color</label>
                                <div class="col-sm-10">
                                  <select name="color" class="form-control" id="color">
                                    <option value="">Choose</option>
                                    <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                    <option style="color:#008000;" value="#008000">&#9724; Green</option>             
                                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                    <option style="color:#000;" value="#000">&#9724; Black</option>

                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="start" class="col-sm-2 control-label">Start date</label>
                                <div class="col-sm-10">
                                  <input type="text" name="start" class="form-control" id="start" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="end" class="col-sm-2 control-label">End date</label>
                                <div class="col-sm-10">
                                  <input type="text" name="end" class="form-control" id="end" readonly>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="attach" class="col-sm-2 control-label">Attachment</label>
                                <div class="col-sm-10">
                                  <input type="file" name="attachmnt" class="form-control" id="attachmnt" placeholder="Attachment">
                                </div>

                                <label for="linkto" class="col-sm-2 control-label">Link-to</label>
                                <div class="col-sm-10">
                                  <div class="col-sm-10">
                                    <select name="Linkto" class="form-control" id="Linkto">
                                      <option value="-">Choose</option>
                                      <option value="Project">Project</option>
                                      <option value="Type">Type</option>
                                      <option value="Other">Other</option>             
                                    </select>
                                  </div>
                                </div>


                                <div class="col-sm-10" id="linktoproject">
                                  <!-- <input type="txt" name="Linkto2" class="form-control" id="Linkto2" placeholder=""> -->

                                  <select name="Linkto2" class="form-control" id="Linkto1" multiple>
                                    <option></option>
                                    <?php
                                    include 'config.php';
                                    $stmt   = $DBcon->prepare("SELECT *FROM table_project");
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                      ?>
                                      <option value="<?php echo $row['prj_id']; ?>"><?php echo $row['ProjectName']; ?></option>
                                      <?php 
                                    } 
                                    ?>   
                                  </select>
                                </div>


                                <div class="col-sm-10" id="linktotype">
                                  <!-- <input type="txt" name="Linkto2" class="form-control" id="Linkto2" placeholder=""> -->

                                  <select name="Linkto2" class="form-control" id="Linkto2" multiple>
                                    <option></option>
                                    <?php
                                    include 'config.php';
                                    $stmt   = $DBcon->prepare("SELECT *FROM table_type");
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                      ?>
                                      <option value="<?php echo $row['type_id']; ?>"><?php echo $row['typeSupply']; ?></option>
                                      <?php 
                                    } 
                                    ?>   
                                  </select>
                                </div>


                              </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" id="savebtnnote">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>



                      <!-- Modal EDIT -->
                      <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                              </div>
                              <div class="modal-body">


                                <div class="form-group">
                                  <label for="title" class="col-sm-2 control-label">Title</label>
                                  <div class="col-sm-10">
                                    <select name="title" class="form-control" id="edittitle">
                                      <option value="">Choose</option>
                                      <?php
                                      include 'config.php';
                                      $stmt3  = $DBcon->prepare("SELECT tit_id, TitleName FROM table_title WHERE TitleCategory = 'Note' ORDER BY TitleName ASC ");
                                      $stmt3->execute();
                                      while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $row['tit_id']; ?>"><?php echo $row['TitleName']; ?></option>
                                        <?php 
                                      } 
                                      ?>               
                                    </select>
                                  </div>

                                  <label for="title" class="col-sm-2 control-label">Description</label>
                                  <div class="col-sm-10">
                                    <input type="text" name="descript" class="form-control" id="editdescript" placeholder="Description">
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label for="color" class="col-sm-2 control-label">Color</label>
                                  <div class="col-sm-10">
                                    <select name="color" class="form-control" id="editcolor">
                                      <option value="">Choose</option>
                                      <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                      <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                      <option style="color:#008000;" value="#008000">&#9724; Green</option>             
                                      <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                      <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                      <option style="color:#000;" value="#000">&#9724; Black</option>

                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="attach" class="col-sm-2 control-label">Attachment</label>
                                  <div class="col-sm-10">
                                    <input type="file" name="attachmnt" class="form-control" id="editattachmnt" placeholder="Attachment">
                                  </div>
                                  <label for="linkto" class="col-sm-2 control-label">Link-to</label>
                                  <div class="col-sm-10">
                                    <div class="col-sm-10">
                                      <select name="Linkto" class="form-control" id="Linkto" disabled>
                                        <option value="-">Choose</option>
                                        <option value="Project">Project</option>
                                        <option value="Type">Type</option>
                                        <option value="Other">Other</option>             
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-sm-10">
                                    <input type="txt" name="Linkto2" class="form-control" id="Linkto2Edit" placeholder="" readonly>
                                  </div>
                                </div>

                                <input type="hidden" name="id" class="form-control" id="id">


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="editbtnnote">Save changes</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </td>
              </tr>
            </table>
          </div>

        </div>




        <div id="tab_resche" class="tab-content">Reschedule</div>
        <div id="tab_sche" class="tab-content">Schedule</div>
        <div id="tab_mon" class="tab-content">Monitor</div>

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
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }

</script>


<script src="_jscript/calendar/js/bootstrap.min.js"></script>
<!-- FullCalendar -->
<script src='_jscript/calendar/js/moment.min.js'></script>
<script src='_jscript/calendar/js/fullcalendar.min.js'></script>

<script>
  $("#Linkto1").chosen({ width: '100%' }).change(function() {
    var v = $(this).val();
  });
  $("#Linkto2").chosen({ width: '100%' }).change(function() {
    var v = $(this).val();
  });
</script>

<script type="text/javascript">
  $("#linktoproject, #linktotype").hide();

  $(document).ready(function() {
    $('#Linkto').change(function() {

      var LinkedTo = $('#Linkto').val();
      if (LinkedTo == 'Project'){
        $('#linktotype').hide();
        $('#linktoproject').toggle();
      }else if (LinkedTo == 'Type') {
        $('#linktoproject').hide();
        $('#linktotype').toggle();
      }else{
        $("#linktoproject, #linktotype").hide();
      }
    });
  });
</script>



<script type="text/javascript">
  $(document).ready(function() {
    $('#savebtnnote').on('click', function() {
      var itit_id       = $('#title').val();
      var idescription  = $('#descript').val();
      var icolors       = $('#color').val();
      var istart_date   = $('#start').val();
      var iend_date     = $('#end').val();
      var iattachment   = $('#attachmnt').prop('files')[0];
      var iLinkedTo     = $('#Linkto').val();
      var iprj_id       = $('#Linkto1').val();
      var itype_id      = $('#Linkto2').val();

      var form_data     = new FormData();

      form_data.append('tit_id', itit_id);
      form_data.append('description', idescription);
      form_data.append('colors', icolors);
      form_data.append('start_date', istart_date);
      form_data.append('end_date', iend_date);
      form_data.append('attachment', iattachment);
      form_data.append('LinkedTo', iLinkedTo);
      form_data.append('prj_id', iprj_id);
      form_data.append('type_id', itype_id);

      $.ajax({
        url         : "cal_addEvent.php",
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
            text    : "Notes baru berhasil ditambahkan.",
            icon    : "success",
            type    : "success",
            timer   : 1000,
            // button  : "success"

          }, function(){
            window.location.href = "prj_note.php#tab_note";
            location.reload(true);
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
    $('#editbtnnote').on('click', function() {
      var inotes_id     = $('#id').val();
      var itit_id       = $('#edittitle').val();
      var idescription  = $('#editdescript').val();
      var icolors       = $('#editcolor').val();
      var iattachment   = $('#editattachmnt').prop('files')[0];

      var form_data     = new FormData();

      form_data.append('notes_id', inotes_id);
      form_data.append('tit_id', itit_id);
      form_data.append('description', idescription);
      form_data.append('colors', icolors);
      form_data.append('attachment', iattachment);

      $.ajax({
        url         : "cal_editEventTitle.php",
        type        : "POST",
        cache       : false,
        async       : true,
        dataType    : "text",
        data        : form_data,
        contentType : false,
        processData : false,
        success     : function(){
          swal({   
            title   : "Berhasil",
            text    : "Notes berhasil diubah.",
            icon    : "success",
            type    : "success"
          }, function(){
            window.location.href = "prj_note.php#tab_note";
            location.reload(true);
          });
        },
        error     : function(){
          swal("Error !", "Server tidak merespon, segera hubungi administrator !", "error");
        }
      });
    });
  });
</script>



<script>
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      header        : {
        left    : 'prev,next today',
        center  : 'title',
        right   : 'month,basicWeek,basicDay'
      },
      editable      : true,
      eventLimit    : false, 
      selectable    : true,
      selectHelper  : true,
      select: function(start, end) {

        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #edittitle').val(event.titleId);
          $('#ModalEdit #editcolor').val(event.color);
          $('#ModalEdit #editdescript').val(event.description);
          $('#ModalEdit #Linkto').val(event.linkto);
          $('#ModalEdit #Linkto2Edit').val(event.type);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // PERBUHAN POSISI
        edit(event);
      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // PERUBAHAN LAMANYA WAKTU
        edit(event);
      },
      events: [
      <?php foreach($events as $event): 
        $start = explode(" ", $event['start_date']);
        $end = explode(" ", $event['end_date']);

        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }

        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
        ?>
        {
          id: '<?php echo $event['notes_id']; ?>',
          titleId: '<?php echo $event['tit_id']; ?>',
          title: '<?php echo $event['TitleName']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['colors']; ?>',
          description: '<?php echo $event['description'] ?>',
          linkto: '<?php echo $tes = ($event['prj_id'] != '' ? ($event['type_id'] == '' ? 'Project' : 'Type' ) : 'Other' ) ?>',
          typeId: '<?php echo $event['type_id'] ?>',
          type: '<?php echo $event['typeSupply'] ?>',
        },
        <?php endforeach; ?>
        ]
      });



    function edit(event){
      start = event.start.format('YYYY-MM-DD');

      if(event.end){
        end = event.end.format('YYYY-MM-DD');
      }else{
        end = start;
      }

      id =  event.id;

      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;

      $.ajax({
        url: 'cal_editEventDate.php',
        type: "POST",
        data: {Event:Event},
        success: function(rep) {
          if(rep == 'OK'){
            swal("", "Data saved", "success");
          }else{
            swal("", "Data NOT saved !", "error"); 
          }
        }
      });
    }


  });

  </script>
</body>
</html>
<?php 
}
?>