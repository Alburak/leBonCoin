<?php
include_once('class/class_annonce.php');
include_once('class/class_annoncesManager.php');
include_once('class/class_userManager.php');
include_once('class/class_user.php');
session_start();
include_once('function.php');
$oBdd = connectdb();

$oAnManager = new annonceManager($oBdd);
$oUsManager = new userManager($oBdd);

include_once('traitement.php');
include_once('data.php');
$oAnnonce = new Annonce;
logIp();
?>
<!DOCTYPE html>
<!--
N'oubliez pas de vérifier la syntaxe de votre code HTML : http://validator.w3.org
N'oubliez pas de vérifier la syntaxe de votre code CSS : http://jigsaw.w3.org/css-validator
-->
<html>
    <head>
        <script src="jquery.js"></script>
        <title>Page au format HTML/CSS - Version display-inline-block</title>

        <!-- On précise l'encodage de notre fichier HTML -->
        <meta charset="UTF-8" />

        <!-- On défini quelques balises META -->
        <meta name="description" content="Site d'annonce pour particulier" />
        <meta name="keywords" content="annonce, particulier, achat, vente" />

        <!-- On lie notre fichier HTML à notre fichier CSS -->
        <link rel="stylesheet" type="text/css" href="templates/style.css" />
    </head>
    <body>
        <!-- On utilise la nouvelle balise HTML5 "header" pour indiquer le HEADER de notre site (partie en haut du site et identique sur toutes nos pages ou presque) -->
        <header>
            <?php include_once('views/_header.php'); ?>
        </header>
        <div id='mondiv'>
            <?php
            // On inclut dynamiquement le "contenu" de la vue désirée via le paramètre GET "page"
            $sPage = isset($_GET['page']) ? $_GET['page'] : NULL;
            $sDir = 'views/';
            $sFilename = $sDir . 'view_' . $sPage . '.php';
            // Par défaut, on inclut la vue "home"
            if (!file_exists($sFilename)) {
                $sFilename = $sDir . 'view_home.php';
            }
            include($sFilename);
            ?>
        </div>
        <!-- On utilise la nouvelle balise HTML5 "footer" pour indiquer le FOOTER de notre site (partie en bas du site et identique sur toutes nos pages ou presque) -->
        <footer>
            <?php include_once('views/_footer.php'); ?>
        </footer>
        <hr>
        <?php
        echo '<pre>';
        print_r($_SERVER);
        print_r($_SESSION['oUtilisateur']);
        echo '</br></br>';
        echo $_SESSION['oUtilisateur']->getUId();
        ?>
    </body>
</html>
closedb();