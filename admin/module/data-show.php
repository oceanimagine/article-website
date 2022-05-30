<?php 

if(!isset($module)){
    $folder_address = "../";
    include_once '../config/check-session.php';
    exit();
}

?>
<table border="0" cellspacing="0" cellpadding="10" id="table">
    <thead>
        <tr>
            <th colspan="4"><a href="index.php?p=form" style="text-decoration: none;">Insert</a> - <a href="index.php?p=logout" style="text-decoration: none;">Logout</a></th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query_artikel = mysqli_query($connect, "select id, judul, photo from tbl_artikel");
        if(mysqli_num_rows($query_artikel) > 0){
            $no = 1;
            while($hasil_artikel = mysqli_fetch_array($query_artikel)){
                $images = "No Images.";
                if($hasil_artikel['photo'] != "" && file_exists("./photo/" . $hasil_artikel['photo'])){
                    $images = "<img src='./photo/".$hasil_artikel['photo']."' style='width: 200px;' />";
                }
                ?>
                <tr>
                    <td valign="top" style="white-space: nowrap;"><?php echo $no; ?></td>
                    <td valign="top" style="white-space: nowrap;"><?php echo $hasil_artikel['judul']; ?></td>
                    <td valign="top" style="white-space: nowrap;"><?php echo $images; ?></td>
                    <td valign="top" style="white-space: nowrap;"><a href="index.php?p=form&id=<?php echo $hasil_artikel['id']; ?>" style="text-decoration: none;">Edit</a> - <a href="javascript: confirm_delete('<?php echo $hasil_artikel['id']; ?>');" style="text-decoration: none;">Hapus</a></td>
                </tr>
                <?php 
                $no++;
            }
        } else {
            ?>
            <tr>
                <td colspan="4">No Data.</td>
            </tr>
            <?php 
        }
        ?>
    </tbody>
</table>