<?php

/* fonction "orirnté objet"
 * pour se conecter:
 *
 *
 */$oBdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', $aOption);
// $aOption= array(array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$PDO->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_WARNING);

$oRes = $PDO->querry('select......from.....');
$aData = $oRes->fetch(pdo::FETCH_ASSOC);
$aData = $oRes->fetch(pdo::FETCH_NUM);
$aData = $oRes->fetch(pdo::FETCH_BOTH);

$sQquery = 'select * from users where login= ? and pwd= ?';
$ostmt = $oPDO->prepare($sQquery);
$ostmt->bindValue(1, $sLogin, PDO::PARAM_STR);
$ostmt->bindValue(2, spwd, PDO::PARAM_STR);
$ostmt->execute();
$aData = $ostmt->fetch();
$iNb = $ostmt->rowCount();


// ou
$sQquery = 'select * from users where login= :login and pwd= :pwd';
$ostmt = $oPDO->prepare($sQquery);
$ostmt->bindValue(':login', $sLogin, PDO::PARAM_STR);
$ostmt->bindValue(':pwd', spwd, PDO::PARAM_STR);
$ostmt->execute();
$aData = $ostmt->fetch();






