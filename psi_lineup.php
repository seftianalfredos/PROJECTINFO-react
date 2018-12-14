<?php
session_start();
include_once ("psi_link.php");



//--------------------------------------------------------------------------html  
echo'
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Project Information System 2018 - Line Up Project</title>


<script src="_jscript/js/jquery.min.js"></script>
<script src="_jscript/js/kickstart.js"></script>
<script src="_jscript/js/jquery-ui.js"></script>
<script src="_jscript/js/sweetalert.min.js"></script>

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
    font-size:14px;
    font-family:"Segoe UI";
    color:000;
    padding: 3;
    }
  }


</style>

</head>



';
if($_SESSION["account_psi"] == "terdaftar") {
echo'

<body>
<center/>

<table border="0" cellpadding="0" cellspacing="0" width="1800" height="200" bordercolor="#FF0000" bgcolor="#FFFFFF" style="border-collapse: collapse">

  <tr>
    <td width="1800" height="200" valign="top" >
    ';
    include_once ("psi_menu.php");
    echo'

    <ul class="tabs left">
    <li><a href="#tabr1">Line Up</a></li>
    <li><a href="#tabr2">Queue</a></li>
    <li><a href="#tabr3">Note</a></li>
    <li><a href="#tabr4">Reschedule</a></li>
    <li><a href="#tabr5">Scedule</a></li>
    <li><a href="#tabr6">Monitor</a></li>
    </ul>

    

    <div id="tabr1" class="tab-content">
    <table class="psi_width2" border="0">
      <tr>
        <td width="5%" height="15" class="right">PL</td>
        <td width="2%" height="15" class="left"></td>
        <td width="20%" height="15" class="left">
        <select class="inputsel">
          <option value="All">All</option>          
          <option value="Nama-01">Nama Project Leader 01</option>
          <option value="Nama-02">Nama Project Leader 02</option>
          <option value="Nama-03">Nama Project Leader 03</option>
        </select>
        </td>
        <td width="10%" height="15" class="right">Search</td>
        <td width="2%" height="15" class="left"></td>
        <td width="25%" height="15" class="left"><input placeholder="( Project Name, Type, Size )"></td>
        <td width="36%" height="15" class="left"></td>
      </tr>
      <tr>
        <td width="5%" height="15" class="right">Status</td>
        <td width="2%" height="15" class="left"></td>
        <td width="20%" height="15" class="left">
        <select class="inputsel">
          <option value="All">All</option>
          <option value="Status-01">Status 1</option>
          <option value="Status-02">Status 2</option>
          <option value="Status-03">Status 3</option>
        </select>
        </td>
        <td width="10%" height="15" class="right">Show</td>
        <td width="2%" height="15" class="left"></td>
        <td width="25%" height="15" class="left">
        <select class="inputsel">
          <option value="All">All</option>
          <option value="Hidden1">Hidden 1</option>
          <option value="Hidden2">Hidden 2</option>
        </select>
        </td>
        <td width="36%" height="15" class="left"></td>
      </tr>
    </table>

    <ul class="tabs left">
      <li><a href="#tabr1a">Type</a></li>
      <li><a href="#tabr1b">Project</a></li>
    </ul> 

    <div id="tabr1a" class="tab-content">
    <table class="psi_width5" border="0">
      <tr>
        <td><a href="#" title="Add"><i class="fa fa-plus fa-sm"></i></a></td>
        <td><a href="#" title="Reffer"><i class="fa fa-plus-square fa-sm"></i></a></td>
        <td><a href="#" title="Edit"><i class="fa fa-pencil fa-sm"></i></a></td>
        <td><a href="#" title="Delete"><i class="fa fa-trash fa-sm"></i></a></td>
        <td><a href="#" title="Checklist"><i class="fa fa-eye fa-sm"></i></a></td>
        <td><a href="#" title="Prod. Spec"><i class="fa fa-th-list fa-sm"></i></a></td>
        <td><a href="#" title="Schedule"><i class="fa fa-calendar-alt fa-sm"></i></a></td>
      </tr>
    </table>

    <table class="psi_width3" border="0">
      <tr>
        <th class="center">no</th>
        <th class="center">Project Name</th>
        <th class="center">Type</th>
        <th class="center">PL</th>
        <th class="center">Prod</th>
        <th class="center">Chs</th>
        <th class="center">Alias</th>
        <th class="center">Start Date</th>
        <th class="center">Finish Date</th>
        <th class="center">Rev</th>
        <th class="center">Rev Date</th>
        <th class="center">Sta Date</th>
        <th class="center">Sta Proj</th>
        <th class="center" width="220">Note</th>
        <th class="center">Sel</th>
      </tr>
      <tr class="trstrip">
        <td class="center">1</td>
        <td class="left" >Fujidenzo(B1)</td>
        <td class="left" >PS-RSD60PGDBT</td>
        <td class="center">TAUFIK A</td>
        <td class="center">RF</td>
        <td class="center">R61</td>
        <td class="center">SS</td>
        <td class="center">15 Mar 18</td>
        <td class="center">12 Apr 18</td>
        <td class="center">R00</td>
        <td class="center">12 Apr 18</td>
        <td class="center">Start</td>
        <td class="center">Start</td>
        <td class="center"></td>
        <td class="center"><input type="checkbox" /></td>
      </tr>
      <tr class="trstrip">
        <td class="center" >2</td>
        <td class="left" >Fujidenzo(B1)</td>
        <td class="left" >PS-RSD60PGDBT</td>
        <td class="center">TAUFIK A</td>
        <td class="center">RF</td>
        <td class="center">R61</td>
        <td class="center">SS</td>
        <td class="center">15 Mar 18</td>
        <td class="center">12 Apr 18</td>
        <td class="center">R00</td>
        <td class="center">12 Apr 18</td>
        <td class="center">Start</td>
        <td class="center">Start</td>
        <td class="center"></td>
        <td class="center"><input type="checkbox" /></td>
      </tr>
      <tr class="trstrip">
        <td class="center" >3</td>
        <td class="left">Fujidenzo(B1)</td>
        <td class="left" >PS-RSD60PGDBT</td>
        <td class="center">TAUFIK A</td>
        <td class="center">RF</td>
        <td class="center">R61</td>
        <td class="center">SS</td>
        <td class="center">15 Mar 18</td>
        <td class="center">12 Apr 18</td>
        <td class="center">R00</td>
        <td class="center">12 Apr 18</td>
        <td class="center">Start</td>
        <td class="center">Start</td>
        <td class="center"></td>
        <td class="center"><input type="checkbox" /></td>
      </tr>




    </table>
    <table>
    <tr>
    <td height="15" ></td></tr>
    </table>
    </div>
    
    <div id="tabr1b" class="tab-content">Tab1ba</div>
    </div>


    <div id="tabr2" class="tab-content">Tab2</div>
    <div id="tabr3" class="tab-content">Tab3</div>
    <div id="tabr4" class="tab-content">Tab4</div>
    <div id="tabr5" class="tab-content">Tab5</div>
    <div id="tabr6" class="tab-content">Tab6</div>

    


    
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


</body>
</html>
';

} else {
include_once ("psi_verify.php");  
}
?>