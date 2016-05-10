<?php

$Id = isset($_GET['id']) ? $_GET['id'] : NULL;

//$oAnManager = new annonceManager;
$oAnnonce = $oAnManager->get($Id);
$id_user = $_SESSION['oUtilisateur']->getUId();
echo $_GET['id'];

if ($oAnnonce) {
    if ($oAnnonce == $id_user) {
        echo '<a href="?delete_ann=' . $_GET['id'] . '">supprimer</a></br>';
    }

    echo '<a href="index.php?page=detail_annonce&id=' . $_GET['id'] . '"></a></br>';
    echo '<div class="image"><img src="userfiles/img/' . $oAnnonce->getVar("picture") . '" /></div>';
    echo '<h3>' . $Id . ' ' . $oAnnonce->getVar('title') . '</h3>';
    echo '<strong class="important">' . $oAnnonce->getVar('price') . ' €</strong>';
    echo '<div>' . $oAnnonce->getVar('description') . '</div>';
} else
    echo 'pas bon';
?>
