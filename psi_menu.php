<style type="text/css">
    .notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
<?php
switch ($currentmenu) {
    case "1":
    $cmenu1="current";
    $cmenu2="";
    $cmenu3="";
    $cmenu4="";
    break;
    case "2":
    $cmenu1="";
    $cmenu2="current";
    $cmenu3="";
    $cmenu4="";
    break;
    case "3":
    $cmenu1="";
    $cmenu2="";
    $cmenu3="current";
    $cmenu4="";
    break;
    case "4":
    $cmenu1="";
    $cmenu2="";
    $cmenu3="";
    $cmenu4="current";
    break;
}

?>
<!-- Menu Horizontal -->
<div class="container">
    <img border="0" src="_image/top_header1.png" width="500" height="50">
    <div class="SubTitle">Project Management System</div>

</div>
<div class="xt" id="xt"></div>
<div class="navbar" id="navbar">
    <ul class="menu">
        <li class="<?php echo $cmenu1 ?>"><a href="index.php"><i class="fa fa-home"></i>&nbsp;&nbsp;Beranda</a></li>
        <li class="<?php echo $cmenu2 ?>"><a href="psi_project.php">Project</a></li>

        <li class="<?php echo $cmenu3 ?>"><a href="psi_kpi.php">KPI</a>
        </li>';
        <?php 
        if ($_SESSION['role'] == "PL" || $_SESSION['role'] == "SH" || $_SESSION['role'] == "EN" || $_SESSION['role'] == "GE" ) {
            echo '';
        }else{
            ?>
            <li class="<?php echo $cmenu4; ?>"><a href="psi_setup.php">Set-Up</a>
            </li>';
            <?php 
        }
        ?>
        <li class="logout" ><a href="http://10.10.104.251/UserManagement/admin/dashboardUser.php">Logout</a></li>
    </li>
    <li class="username"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;Account : <?php echo $_SESSION['username']; ?></a></li>
    <!-- <li class="notification"><a href="#" ><i class="fa fa-bullhorn"></i><span class="badge">3</span></a></li> -->
</ul>
</div>