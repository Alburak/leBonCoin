<?php

class Annonce {

    private $id;
    private $title;
    private $description;
    private $picture;
    private $price;
    private $creat_date;
    private $aData;

    //public static $NB_ANNONCES = 0;

    public function __construct($aData = array()) {
        if ($aData) {
            //this->setid($aResult['id']);
            //  .                               on les met ds la fonction hydrate
            //  .
            //  .
            $this->hydrate($aData);
        }
    }

    /* public static function load() {
      $aList = array();
      $sDir = 'data/annonce*.txt';
      foreach (glob($sDir) as $filename) {
      $aList[] = unserialize(file_get_contents($filename));
      }
      Annonce::$NB_ANNONCES = count($aList);
      return $aList;
      }

      public static function getById($iId) {
      $file = 'data/annonce' . str_pad($iId, 3, '0', STR_PAD_LEFT) . '.txt';
      print_r($file);
      if (file_exists($file)) {
      $oAnnonce = unserialize(file_get_contents($file));
      return $oAnnonce;
      } else {
      return false;
      }
      }

      public function save() {
      $sFile = 'annonce' . str_pad($this->iId, 3, '0', STR_PAD_LEFT) . '.txt';
      file_put_contents('data/' . $sFile, serialize($this));
      }
     */

    public function getVar($var) {
        return $this->$var;
    }

    public function setId($NewId) {
        $this->id = $NewId;
    }

    public function setTitle($NewTitle) {
        $this->title = $NewTitle;
    }

    public function setDescription($NewDescription) {
        $this->description = $NewDescription;
    }

    public function setPrice($NewPrice) {
        $this->price = $NewPrice;
    }

    public function setDate($NewDate) {
        $this->crate_date = $NewDate;
    }

    public function setImg($NewImg) {
        $this->picture = $NewImg;
    }

    public function hydrate($aData) {
        //this->setid($aResult['id']);
        //  .
        //  .
        //  .
        foreach (array_keys(get_class_vars(get_class($this)))as $skey) {
            if (isset($aData[$skey])) {
                $this->$skey = $aData[$skey];
            }
        }
    }

}
