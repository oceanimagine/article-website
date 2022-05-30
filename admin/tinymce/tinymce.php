<!DOCTYPE html>
<html>
    <head>
        <title>Tinymce Test</title>
        <style type="text/css">
            html, body {
                font-family: consolas, monospace;
                width: 100%;
                height: 100%;
                padding: 0px;
                margin: 0px;
                cursor: default;
            }
            input, textarea, select {
                box-sizing: border-box;
            }
            .mce-tinymce {
                border-width: 0px !important;
            }
        </style>
        <script type="text/javascript" src="js/tinymce/js/tinymce/tinymce.min.js"></script>
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

        </script>
        <!-- /TinyMCE -->
    </head>
    <body>
        <div style="width: 100%; border-top: #f1f1f1 1px solid; border-right: #f1f1f1 1px solid; border-left: #f1f1f1 1px solid; display: none; text-align: center;" id="tampil_gambar"><img src="" style="margin-left: auto; margin-right: auto;" /></div>
        <input onchange="readURL(this);" accept="image/*" type="file" name="photo" id="photo" style="width: 100%; border: #f1f1f1 2px solid;" />
        <textarea>Percobaan integrasi TinyMCE pada form input!</textarea>
        <!-- Front Template -->
        <!-- https://mobirise.com/bootstrap-template/best-bootstrap-templates/ -->
    </body>
</html>