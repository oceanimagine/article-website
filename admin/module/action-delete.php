<?php
if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

if(isset($_GET['id']) && $_GET['id'] != "" && $module == "hapus"){
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $query_data_per_id = mysqli_query($connect, "select photo from tbl_artikel where id = '".$id."'");
    if(mysqli_num_rows($query_data_per_id) > 0){
        $hasil_data_per_id = mysqli_fetch_array($query_data_per_id);
        if($hasil_data_per_id['photo'] != "" && file_exists("./photo/" . $hasil_data_per_id['photo'])){
            $photo = $hasil_data_per_id['photo'];
            unlink("./photo/" . $photo);
        }
    }
    mysqli_query($connect, "delete from tbl_artikel where id='".$id."'");
    header("location: index.php");
    
}