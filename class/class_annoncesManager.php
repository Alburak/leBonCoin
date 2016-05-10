<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class annonceManager {

    private $oDb;

    const TABLE = 'annonces';

    function __construct(PDO $oDb) {
        $this->oDb = $oDb;
    }

    function getList() {
        $reponse = $this->oDb->query("SELECT * FROM annonces");

        $alist = array();
        while ($aData = $reponse->fetch(pdo::FETCH_ASSOC)) {
            $Annaonce = new Annonce($aData);
            $alist[] = $Annaonce;
        }

        return $alist;
    }

    function get($id) {
        $oRes = $this->oDb->query("SELECT * FROM annonces where id=" . $id);
        $oResult = $oRes->fetch(pdo::FETCH_ASSOC);
        $Annaonce = new Annonce($oResult);
        return $Annaonce;
    }

    function insert(Annonce &$oAnnonce) {

        $title = $oAnnonce->getVar('title');
        $description = $oAnnonce->getVar('description');
        $picture = $oAnnonce->getVar('picture');
        $price = $oAnnonce->getVar('price');
        $id_user = $_SESSION['oUtilisateur']->getUId();
        $sql = $this->oDb->prepare('INSERT INTO `annonces` (`title`,`id_user`, `description`, `picture`, `price`)
        VALUES
                (:title, :id_user, :description , :picture, :price)');
        $sql->bindValue(':title', $title, PDO::PARAM_STR);
        $sql->bindValue(':description', $description, PDO::PARAM_STR);
        $sql->bindValue(':picture', $picture, PDO::PARAM_STR);
        $sql->bindValue(':price', $price, PDO::PARAM_INT);
        $sql->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        if ($sql->execute()) {
            $oAnnonce->setId($this->oDb->lastInsertId());
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update(Annonce $oAnnonce) {
        $oQuery = $this->oDb->prepare('UPDATE ' . self::TABLE . '
			SET
                            title = :title,
                            description = :description,
                            picture = :picture,
                            price = :price
			WHERE id = :id');
        $oQuery->bindValue(':title', $oAnnonce->getVar('title'), PDO::PARAM_STR);
        $oQuery->bindValue(':description', $oAnnonce->getVar('description'), PDO::PARAM_STR);
        $oQuery->bindValue(':picture', $oAnnonce->getVar('picture'), PDO::PARAM_STR);
        $oQuery->bindValue(':price', $oAnnonce->getVar('price'), PDO::PARAM_INT);
        $oQuery->bindValue(':id', $oAnnonce->getVar('id'), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // sql to delete a record
    public function delete(Annonce $oAnnonce) {
        $oQuery = $this->oDb->prepare('DELETE FROM `' . self::TABLE . '` WHERE id = :id');
        $oQuery->bindValue(':id', $oAnnonce->getVar('id'), PDO::PARAM_INT);

        if ($oQuery->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
