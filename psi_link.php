<?php
$url = htmlentities($_GET["link"],ENT_QUOTES);

if ($url == "home") { include '.\?link=home';
exit;
} else if ($url == "login") { include 'psi_verifycheck.php';
exit;
} else if ($url == "logout") { include 'logout3.php';
exit;
} else if ($url == "resetpassword") { include 'psi_resetpswd.php';
exit;


} else if ($url == "project") { include 'psi_project.php';
exit;
} else if ($url == "kpi") { include 'psi_kpi.php';
exit;
} else if ($url == "setup") { include '.\?link=setup';
exit;



} else {
}




?>