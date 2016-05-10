<?php

//traitement
if (isset($_GET['logout'])) {
    //$_SESSION['bIsConnected'] = false;
    //$_SESSION['sEmailConnected'] = NULL;
    $_SESSION['oUtilisateur'] = NULL;
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['oUtilisateur'])) {
    //$_SESSION['bIsConnected'] = false;
    //$_SESSION['sEmailConnected'] = NULL;
    $_SESSION['oUtilisateur'] = NULL;
}

// Si le tableau $_POST existe alors le formulaire a été envoyé
if (isset($_POST['loginForm'])) {
    $emailInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pwdInput = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    if ($emailInput && $pwdInput) {
        $oUser = $oUsManager->getByEmailAndPwd($emailInput, $pwdInput);
        if ($oUser instanceof user) { //oUser est une instance de la classe user
            //$_SESSION['bIsConnected'] = true;
            //$_SESSION['sEmailConnected'] = $emailInput;
            $_SESSION['oUtilisateur'] = $oUser;
        }
    }
}


//traitement envoi d'annonce
if (isset($_POST['sendAnnonce']) && $_SESSION['oUtilisateur']) {
    $titleInput = filter_input(INPUT_POST, 'annonce', FILTER_SANITIZE_STRING);
    $descriptionInput = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $prixInput = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_INT);

    $urlInput = false;
    $dossier = 'userfiles/img/';
    $fichier = basename($_FILES['image']['name']);
    $taille_maxi = 10000;
    $taille = filesize($_FILES['image']['tmp_name']);

    $extensions = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
    $extension = $_FILES['image']['type'];

    //Début des vérifications de sécurité...
    // if (!isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    //     $erreur = 'Vous devez uploader une image';
    // }
    if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
        $urlInput = $_FILES['image']['tmp_name'];
    } else {
        echo $erreur;
    }
    if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }


    if ($titleInput && $descriptionInput && $urlInput && $prixInput) {
        $oAnnonce = new Annonce();
        //$oAnnonce->setDate("12/05/1984");
        $oAnnonce->setTitle($titleInput);
        $oAnnonce->setDescription($descriptionInput);
        $oAnnonce->setPrice($prixInput);

        $oAnManager->insert($oAnnonce);

        $sFinalName = 'image' . str_pad($oAnnonce->getVar('id') /* and(0, 100) */, 3, '0', STR_PAD_LEFT) . '.png';
        if (move_uploaded_file($urlInput, $dossier . $sFinalName)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            $oAnnonce->setImg($sFinalName);
            //$oAnnonce->save();
            $oAnManager->update($oAnnonce);
        }
        echo 'Upload effectué avec succès !';
    } else { //Sinon (la fonction renvoie FALSE).
        echo 'Echec de l\'upload !';
    }
}


//traitement envoi message
if (isset($_POST['sendmsg'])) {
    $nomInput = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $sMcObjet = filter_input(INPUT_POST, 'objet', FILTER_SANITIZE_STRING);
    $sMcMessage = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($nomInput && $sMcObjet && $sMcMessage) {
        $oMessage = new MessageContact($sMcObjet, $sMcMessage);
        $oMessage->sendMessage();
    } else { //Sinon (la fonction renvoie FALSE).
        echo 'Echec de l\'envoi !';
    }
}



if (isset($_GET['delete_ann'])) {
    $oAnnonce = new Annonce;
    $oAnnonce->setId($_GET['delete_ann']);

    $oAnManager->delete($oAnnonce);
}
?>









