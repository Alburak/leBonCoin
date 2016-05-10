<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MessageContact {

    private $iMcId;
    private $sMcNom;
    private $sMcObjet;
    private $sMcMessage;

    function __construct($sMcObjet, $sMcMessage) {
        $this->sMcObjet = $sMcObjet;
        $this->sMcMessage = $sMcMessage;
    }

    function sendMessage() {
        echo $sMcObjet;
        echo ' ' . $sMcMessage;
    }

    function getIMcId() {
        return $this->iMcId;
    }

    function getSMcNom() {
        return $this->sMcNom;
    }

    function getSMcMessage() {
        return $this->sMcMessage;
    }

    function setIMcId($iMcId) {
        $this->iMcId = $iMcId;
    }

    function setSMcNom($sMcNom) {
        $this->sMcNom = $sMcNom;
    }

    function setSMcMessage($sMcMessage) {
        $this->sMcMessage = $sMcMessage;
    }

}
