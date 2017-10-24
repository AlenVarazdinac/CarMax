<?php

function checkLogin() {
    if (!isset($_SESSION['logged'])) {
        header("location: " . $GLOBALS['appPath'] . "public/login.php?norights");
        exit;
    }
}

function checkRole($role) {
    if(!(isset($_SESSION['logged']) && $_SESSION['logged']->user_rights===$role)) {
        header("location: " . $GLOBALS['appPath'] . "index.php");
        exit;
    }
}