<?php

class User {

    protected $uId;
    protected $uEmail;
    protected $uPassword;

    public function __construct($aData = array()) {
        if ($aData) {
            $this->hydrate($aData);
        }
    }

    public function hydrate($aData) {
        foreach (array_keys(get_class_vars(get_class($this)))as $skey) {
            if (isset($aData[$skey])) {
                $this->$skey = $aData[$skey];
            }
        }
    }

    function getUId() {
        return $this->uId;
    }

    function getUEmail() {
        return $this->uEmail;
    }

    function getUPassword() {
        return $this->uPassword;
    }

    function setUId($uId) {
        $this->uId = $uId;
    }

    function setUEmail($uEmail) {
        $this->uEmail = $uEmail;
    }

    function setUPassword($uPassword) {
        $this->uPassword = $uPassword;
    }

}

?>