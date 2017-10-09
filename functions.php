<?php

function checkLogin() {
    if (!isset($_SESSION['logged'])) {
        header("location: " . $GLOBALS['pathApp'] . "public/login.php?norights"));
        exit;
    }
}

function checkRole($role) {
    if(!(isset($_SESSION['logged']) && $_SESSION['logged']->role===$role)) {
        header("location: " . $GLOBALS['pathApp'] . "public/index.php");
        exit;
    }
}