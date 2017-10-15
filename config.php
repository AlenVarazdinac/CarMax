<?php

session_start();

$appName = 'CarMax';

switch ($_SERVER['HTTP_HOST']) {
    case 'localhost':
        $appPath = '/CarMax/';
        $dbHost = 'localhost';
        $dbBase = 'carmax';
        $dbUser = 'varazdinac';
        $dbPw = '123';
        break;
    case 'vote4music.byethost7.com':
        $appPath = '/CarMax/';
        $dbHost = 'sql108.byethost7.com';
        $dbBase = 'b7_20112054_carmax';
        $dbUser = 'b7_20112054';
        $dbPw = 'p76qxry3';
        break;
    default:
        $appPath = '/';
        break;
}
        

$db = new PDO("mysql:host=" . $dbHost .";dbname=" . $dbBase, $dbUser, $dbPw);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->exec("SET CHARACTER SET utf8");
$db->exec("SET NAMES utf8");

?>