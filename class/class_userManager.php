<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userManager {
    /* public function validate($sEmail, $sPassword)
     *       {
     *               return ($this->sEmail == $sEmail) && ($this->sPassword == $sPassword);
     *      }
     *
     */

    const TABLE = 'users';

    private $oDB;

    public function __construct(PDO $oDB) {
        $this->oDB = $oDB;
    }

    public function getList() {
        // On communique avec notre base de donnÃ©es pour rÃ©cupÃ©rer nos utilisateurs
        // Le nom de la base est stockÃ©e dans self::TABLE
        $oQuery = $this->oDB->query('SELECT * FROM ' . self::TABLE);

        $aList = array();
        // On parcourt les rÃ©sultats et on les enregistre dans un tableau
        while ($aData = $oQuery->fetch(PDO::FETCH_ASSOC)) {
            // $aData contient les valeurs d'une ligne
            $aList[] = new User($aData);
        }

        // On retourne la liste des utilisateurs
        return $aList;
    }

    public function get($id) {
        $oRes = $this->oDB->prepare('SELECT * FROM user where id= ?');
        $oRes->bindValue(1, $id, PDO::PARAM_INT);
        $oRes->execute();

        $aUserData = $oRes->fetch(PDO::FETCH_ASSOC);
        if ($aUserData) {
            return new User($aUserData);
        }
    }

    public function getByEmailAndPwd($email, $pwd) {
        $oRes = $this->oDB->prepare('SELECT * FROM user WHERE uEmail = :email AND uPassword = :password');
        $oRes->bindValue(':email', $email, PDO::PARAM_STR);
        $oRes->bindValue(':password', $pwd, PDO::PARAM_STR);
        $oRes->execute();

        $aUserData = $oRes->fetch(PDO::FETCH_ASSOC);
        if ($aUserData) {
            return new User($aUserData);
        }
    }

    /* public function getEmail()
     *        {
     *                return $this->sEmail;
     *        }

     * public function getPassword()
     *      {
     *                return $this->sPassword;
     *        }
     */
}
