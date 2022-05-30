<?php
if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

if(isset($_POST['daftar']) && $_POST['daftar'] == "Input Artikel"){
    if(isset($_FILES['photo']) && is_array($_FILES['photo'])){
        $judul = mysqli_real_escape_string($connect, $_POST['judul']);
        $isi = mysqli_real_escape_string($connect, $_POST['isi']);
        $photo = $_FILES['photo'];
        // upload
        $explode_type = explode(".", $photo['name']);
        $type = $explode_type[sizeof($explode_type) - 1];
        $name = "IMG" . date("YmdHis") . "." . $type;
        move_uploaded_file($photo['tmp_name'], "photo/" . $name);
        
        mysqli_query($connect, "insert into tbl_artikel set judul = '".$judul."', isi = '".$isi."', photo = '".$name."'");
        header("location: index.php");
    }
}