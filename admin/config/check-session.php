<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['username']) && $_SESSION['username'] != ""){
    if(isset($folder_address)){
        header("location: ".$folder_address."index.php");
    }
} else {
    $module = isset($_GET['p']) && $_GET['p'] != "" ? $_GET['p'] : "";
    if($module != "login"){
        if(isset($folder_address)){
            header("location: ".$folder_address."index.php?p=login");
        } else {
            header("location: index.php?p=login");
        }
    }
}