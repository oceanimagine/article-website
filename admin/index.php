<?php 

ob_start();
include_once './config/connect-list.php';
include_once './config/connect.php';
include_once './config/koneksi.php';
include_once './config/check-session.php';

?>
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Administrator</title>
        <script type="text/javascript" src="tinymce/js/tinymce/js/tinymce/tinymce.min.js"></script>
        <style type="text/css">
            html, body {
                font-family: consolas, monospace;
                width: 100%;
                height: 100%;
                padding: 0px;
                margin: 0px;
                cursor: default;
            }
            pre {
                font-family: consolas, monospace;   
            }
            input, textarea, select {
                font-family: consolas, monospace;
                -webkit-box-sizing: border-box;
                   -moz-box-sizing: border-box;
                    -ms-box-sizing: border-box;
                        box-sizing: border-box;
            }
            #table, #table th, #table td {
                border: black 1px solid;
            }
        </style>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",

                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste jbimages"
                ],

                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false
            });
            
            var FileReader = typeof FileReader !== "undefined" ? FileReader : {};
            function readURL(input) {
                if (typeof input === "object" && typeof input.files !== "undefined" && input.files && input.files[0] && typeof FileReader !== "undefined") {
                    var reader = new FileReader();
                    if(typeof reader.onload !== "undefined"){
                        reader.onload = function(e) {
                            var tampil_gambar = document.getElementById('tampil_gambar');
                            var gambar_photo = tampil_gambar.getElementsByTagName("img")[0];
                            if(e.target.result.substr(0,10) === "data:image"){
                                gambar_photo.src = e.target.result;
                                gambar_photo.style.display = "block";
                                gambar_photo.style.width = "250px";
                                tampil_gambar.style.display = "";
                            } else {
                                gambar_photo.src = "";
                                gambar_photo.style.display = "none";
                                gambar_photo.style.marginTop = "";
                                gambar_photo.style.width = "";
                                tampil_gambar.style.display = "none";
                            }
                        };
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        alert("Something Wrong With File Reader.");
                    }
                } else {
                    alert("Something Wrong With File Reader.");
                }
            }
        
            function confirm_delete(id_data){
                if(confirm("Are You Sure ?")){
                    document.location = "index.php?p=hapus&id=" + id_data;
                }
            }
        
        </script>
    </head>
    <body>
    <?php 
    
    $module = isset($_GET['p']) && $_GET['p'] != "" ? $_GET['p'] : "";
    
    if($module == ""){
        include_once "./module/data-show.php";
    } else {
        if(file_exists("./module/data-".$module.".php")){
            include_once "./module/data-".$module.".php";
        } else {
            echo "File Module Not Exist.";
        }
    }
    
    ?>
    </body>
</html>
<?php 

include_once "./module/action-insert.php";
include_once "./module/action-edit.php";
include_once "./module/action-delete.php";
include_once "./module/action-login.php";

ob_flush();