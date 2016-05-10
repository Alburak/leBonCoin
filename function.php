<?php

function logIp() {
    $sDir = 'log/';
    $sDayFile = date('Y-m-d') . '.log';
    if (!file_exists($sDir)) {
        mkdir($sDir);
    }
    //echo $sDayFile;
    $handle = fopen($sDir . $sDayFile, 'a+');
    fwrite($handle, date('Y-m-d h-i-s') . ' # ' . $_SERVER['REMOTE_ADDR'] . "\n");
    fclose($handle);
}

function connectdb() {
    $aOptions = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"');
    $oBdd = new PDO('mysql:host=127.0.0.1;dbname=leBonCoin;charset=utf8', 'root', '', $aOptions);
    var_dump($oBdd);
    return $oBdd;
}

function closedb() {
    mysql_close();
}
