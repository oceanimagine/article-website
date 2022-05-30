<?php
if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

if(isset($_POST['daftar']) && $_POST['daftar'] == "Edit Artikel"){
    $masuk_photo = 0;
    if(isset($_POST['photo_lama'])){
        $photo = mysqli_real_escape_string($connect, $_POST['photo_lama']);
    }
    if(isset($_FILES['photo']) && is_array($_FILES['photo'])){
        if(isset($_FILES['photo']['tmp_name']) && $_FILES['photo']['tmp_name'] != ""){
            if(isset($photo) && $photo != "" && file_exists("./photo/" . $photo)){
                unlink("./photo/" . $photo);
            }
            $photo = $_FILES['photo'];
            // upload
            $explode_type = explode(".", $photo['name']);
            $type = $explode_type[sizeof($explode_type) - 1];
            $name = "IMG" . date("YmdHis") . "." . $type;
            move_uploaded_file($photo['tmp_name'], "photo/" . $name);
            $masuk_photo = 1;
        }
    }
    if(!$masuk_photo){
        $name = $photo;
    }
      
    $judul = mysqli_real_escape_string($connect, $_POST['judul']);
    $isi = mysqli_real_escape_string($connect, $_POST['isi']);

    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        mysqli_query($connect, "update tbl_artikel set judul = '".$judul."', isi = '".$isi."', photo = '".$name."' where id='".$id."'");
    }
    header("location: index.php");
    
}