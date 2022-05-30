<?php
if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}
?>

<?php if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'salah'){ ?>
<script type="text/javascript">
window.onload = function(){
    setTimeout(function(){
        alert("Username atau Password salah.");
    }, 500);
};
</script>
<?php unset($_SESSION['alert']); ?>
<?php } ?>
<form method="POST">
    <table border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" style="width: 400px;" placeholder="Username"autocomplete="off" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
                <input type="password" name="password" style="width: 400px;" placeholder="Password"autocomplete="off" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="login" value="Login" style="width: 400px;" /></td>
        </tr>
    </table>
</form>