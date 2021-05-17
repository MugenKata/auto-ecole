<?php 
session_start();
require "core/Functions.php";
require "core/Constants.php";
require "core/Alerts.php";

$bdd = connectBDD(HOSTNAME, DATABASE, USERNAME, PASSWORD);

if (isset($_GET['page'])) {   
    if(file_exists("controleur/".$_GET['page'].".controleur.php"))
        $page = $_GET['page'];
    else
        $page = "404";
} else {
    $page = "login";
}

ob_start();
require "controleur/".$page.".controleur.php";
$content = ob_get_contents();
ob_get_clean();

require "nav.php";

?>