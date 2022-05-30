<?php
if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

if(isset($_POST['login']) && $_POST['login'] == "Login"){
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $password_md5 = md5($password);
    $query_check = mysqli_query($connect, "select username from tbl_user where username = '".$username."' and password = '".$password_md5."'");
    // echo "select username from tbl_user where username = '".$username."' and password = '".$password."'";
    // exit();
    if(mysqli_num_rows($query_check) > 0){
        $hasil_check = mysqli_fetch_array($query_check);
        $_SESSION['username'] = $hasil_check['username'];
        header("location: index.php");
    } else {
        $_SESSION['alert'] = "salah";
        header("location: index.php?p=login");
    }
}