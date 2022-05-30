<?php

if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

session_destroy();
header("location: index.php");