<?php
session_start();


//--------------------------------------------------------------------------html
echo'
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>R&D - Project Information System - Login</title>


<script src="_jscript/js/jquery.min.js"></script>
<link rel="stylesheet" href="_jscript/css/psi.css" media="all" />
<script src="_jscript/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="_jscript/css/sweetalert.css">


<style type="text/css">
  input {
  padding: 7px;
  border: solid 1px #E5E5E5;
  outline: 0;
  font: normal 18px/100% "Open Sans300",  Verdana, Tahoma, sans-serif;
  width: 100%;
  background: #FFFFFF;
  border-radius:7px;
  }
  span#resetpass {   cursor: pointer; }
  span#reqnew {   cursor: pointer; }
</style>

</head>






<body>
<center>

<table class="psi_width1" border="0">
  ';
  if (!empty($infologin)){
  echo'  
  <tr>
    <td width="800" height="40" valign="midle" class="center" bgcolor="#ffaaaa"><font color="#fff">'.$infologintxt.'</font>
    </td>
  </tr>
  ';
  }
  echo'
  <tr>
    <td class="title3" class="center">    
    <h7>Account Login</h7>
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%"  bordercolor="#0000FF">

      <tr>
        <td width="100%" height="18">
        <table border="0">
          <tr>
            <td width="15%" height="18"></td>
            <td width="70%" height="18">
            <form name="form1" method="post" action="./?link=login" autocomplete="off">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%"  bordercolor="#FF00FF">
              <tr>
                <td width="10%" height="28"></td>
                <td width="80%" height="28" class="center">
                <input id="text1" name="user_x" type="text" placeholder="Username - (without @polytron.co.id)" autocomplete="off" /></td>
                <td width="10%" height="28"></td>
              </tr>
              <tr>
                <td width="10%" height="8"></td>
                <td width="80%" height="8"></td>
                <td width="10%" height="8"></td>
              </tr>
              <tr>
                <td width="10%" height="28"></td>
                <td width="80%" height="28" class="center">
                <input id="text2" name="pass_x" type="password" placeholder="Password" autocomplete="new-password" /></td>
                <td width="10%" height="28"></td>
              </tr>
              <tr>
                <td width="10%" height="15"></td>
                <td width="80%" height="15"></td>
                <td width="10%" height="15"></td>
              </tr>
              <tr>
                <td width="10%" height="28"></td>
                <td width="80%" height="28" class="center">
                <input id="text3" name="sbmit" type="submit" value ="Enter" class="flat-button" /></td>
                <td width="10%" height="28"></td>
              </tr>
              <tr>
                <td width="10%" height="5"></td>
                <td width="80%" height="5"></td>
                <td width="10%" height="5"></td>
              </tr>
              <tr>
                <td width="10%" height="28"></td>
                <td width="80%" height="28" class="right">
                <span id="resetpass">Reset/Change Password</span></td>
                <td width="10%" height="28"></td>
              </tr>
              <tr>
                <td width="10%" height="28"></td>
                <td width="80%" height="28" class="center"></td>
                <td width="10%" height="28"></td>
              </tr>
              <tr>
                <td width="10%" height="28"></td>
                <td width="80%" height="28" class="center">
                <i><font color="grey">Silakan login dengan username email Polytron</td>
                <td width="10%" height="28"></td>
              </tr>
            </table>
            </form>
            </td>
            <td width="15%" height="18"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td width="100%" height="18"></td>
      </tr>
      <tr>
        <td width="100%" height="18"></td>
      </tr>

      <tr>
        <td class="footerrd" width="100%" height="66" >
        R&D - Project Information System 2018</td>
      </tr>
      
    </table>
    </td>
  </tr>
</table>


</body>
<script type="text/javascript">


$(function rstpswd() {
  $("#resetpass").on("click",function() {
    swal({
      title: "PASSWORD RESET",
      text: "Write your email address for reseting your password ..",
      type: "input",
      showCancelButton: true,
      closeOnConfirm: false,
      animation: "slide-from-top",
      inputPlaceholder: "email.address@polytron.co.id"
    },
    function(inputValue){
      var regex = /(\W|^)[\w.+\-]*@polytron\.co\.id(\W|$)/;
      var email = regex.exec(inputValue);
      
      if (inputValue === "") {
        swal.showInputError("You must to write your email address");
        return false
      }
      if (!email) {
        swal.showInputError("not valid polytron\'s email address");
        return false
      }

      $.ajax({
        type: "POST",
        url: "_ajaxsendresetemail.php",
        data: {email: inputValue},
        cache: false,
        success: function(html){
          swal("Done !", "Password-Reset-Link sended to: " + inputValue, "success");
        },
        error: function(){
          swal("Error !", "Email is not Active - please contact your administrator ..", "error");
        }
      });
      


    });
  });
});


$(function reqnew() {
  $("#reqnew").on("click",function() {
    window.location.href = "./?link=reqnew";
  });
});




</script>
</html>
';
break;
?>