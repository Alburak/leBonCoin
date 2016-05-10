<?php

session_start();
include_once('class/class_annonce.php');
include_once('class/class_annoncesManager.php');
include_once('class/class_userManager.php');
include_once('class/class_user.php');
include_once('function.php');
$oBdd = connectdb();

$oAnManager = new annonceManager($oBdd);
$oUsManager = new userManager($oBdd);

include_once('traitement.php');
include_once('data.php');
$oAnnonce = new Annonce;
logIp();
?>

<?php

// On inclut dynamiquement le "contenu" de la vue désirée via le paramètre GET "page"
$sPage = isset($_POST['action']) ? $_POST['action'] : NULL;
$sDir = 'views/';
$sFilename = $sDir . 'view_' . $sPage . '.php';
// Par défaut, on inclut la vue "home"
if (!file_exists($sFilename)) {
    $sFilename = $sDir . 'view_home.php';
}
include($sFilename);
?>