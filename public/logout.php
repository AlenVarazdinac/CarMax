<?php
include_once '../config.php';

session_destroy();
header("location: " . $appPath . "public/login.php?loggedout");