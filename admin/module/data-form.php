<?php 

if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

$judul = "";
$isi = "";
$photo = "";
$value_button = "Input Artikel";
if(isset($_GET['id']) && $_GET['id'] != ""){
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $query_data_per_id = mysqli_query($connect, "select judul, isi, photo from tbl_artikel where id = '".$id."'");
    if(mysqli_num_rows($query_data_per_id) > 0){
        $hasil_data_per_id = mysqli_fetch_array($query_data_per_id);
        $judul = $hasil_data_per_id['judul'];
        $isi = $hasil_data_per_id['isi'];
        if($hasil_data_per_id['photo'] != "" && file_exists("./photo/" . $hasil_data_per_id['photo'])){
            $photo = $hasil_data_per_id['photo'];
        }
        $value_button = "Edit Artikel";
    }
}

?>
<form method="POST" enctype="multipart/form-data">
    <table border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td><input type="text" name="judul" style="width: 400px;" placeholder="Judul"autocomplete="off" value="<?php echo $judul; ?>" /></td>
        </tr>
        <tr>
            <td>Isi</td>
            <td>:</td>
            <td>
                <textarea name="isi" style="width: 400px; resize: none;" placeholder="Isi"><?php echo $isi; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Photo</td>
            <td>:</td>
            <td>
                <?php if($photo != ""){ ?>
                <div style="width: 400px; border-top: #f1f1f1 2px solid; border-right: #f1f1f1 2px solid; border-left: #f1f1f1 2px solid; text-align: center; box-sizing: border-box;" id="tampil_gambar"><img src="./photo/<?php echo $photo; ?>" style="margin-left: auto; margin-right: auto; display: block;width: 250px;" /></div>
                <input type="hidden" name="photo_lama" value="<?php echo $photo; ?>" />
                <?php } else { ?>
                <div style="width: 400px; border-top: #f1f1f1 2px solid; border-right: #f1f1f1 2px solid; border-left: #f1f1f1 2px solid; display: none; text-align: center; box-sizing: border-box;" id="tampil_gambar"><img src="" style="margin-left: auto; margin-right: auto;" /></div>
                <?php } ?>
                <input onchange="readURL(this);" accept="image/*" type="file" name="photo" style="width: 400px; border: #f1f1f1 2px solid;" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="daftar" value="<?php echo $value_button; ?>" style="width: 400px;" /></td>
        </tr>
         <tr>
            <td></td>
            <td></td>
            <td><input type="button" name="show" value="Show Data" style="width: 400px;" onclick="document.location='index.php';" /></td>
        </tr>
    </table>
</form>