<?php

session_start();

$appName = 'CarMax';
$appPath = '/CarMax/';

$dbHost = 'localhost';
$dbBase = 'carmax';
$dbUser = 'varazdinac';
$dbPw = '123';

$db = new PDO("mysql:host=" . $dbHost .";dbname=" . $dbBase, $dbUser, $dbPw);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->exec("SET CHARACTER SET utf8");
$db->exec("SET NAMES utf8");

?>