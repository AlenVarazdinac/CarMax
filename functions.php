<?php

function checkLogin() {
    if (!isset($_SESSION['logged'])) {
        header("location: " . $GLOBALS['pathApp'] . "public/login.php?norights"));
        exit;
    }
}