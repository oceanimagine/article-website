<?php 
ob_start();
include_once "./admin/config/connect-list.php";
include_once "./admin/config/connect.php";
include_once "./admin/config/koneksi.php";
function get_date_year($timestamp){
    $month_english = array(
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "July",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December",
    );
    $explode_space = explode(" ", $timestamp);
    $date_only = $explode_space[0];
    $explode_date_only = explode("-", $date_only);
    if(sizeof($explode_date_only) == 3){
        $month_string = $month_english[$explode_date_only[1]];
        return $month_string . " " . $explode_date_only[2] . ", " . $explode_date_only[0];
    } else {
        return "Undefined";
    }
}
?>
<!DOCTYPE html>
<html >
    <head>
        <!-- Site made with Mobirise Website Builder v4.8.8, https://mobirise.com -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.8.8, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
        <meta name="description" content="Responsive HTML Best Bootstrap Templates - Download Now">
        <title>Templates Article</title>
        <link rel="stylesheet" href="assets/css/mobirise-icons.css">
        <link rel="stylesheet" href="assets/css/tether.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="assets/css/style-a.css">
        <link rel="stylesheet" href="assets/css/style-b.css">
        <link rel="stylesheet" href="assets/css/mbr-additional.css" type="text/css">
        <link rel="stylesheet" href="assets/css/mbr-additional-b.css" type="text/css">
    </head>
    <body>
        
        <?php if(isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])){ ?>
        <?php 
        $id = mysqli_real_escape_string($connect, $_GET['id']);
        $query_artikel_per_id = mysqli_query($connect, "select judul, isi, photo, timestamp from tbl_artikel where id = '".$id."'");
        if(mysqli_num_rows($query_artikel_per_id) > 0){
        $hasil_artikel_per_id = mysqli_fetch_array($query_artikel_per_id);
        $judul = $hasil_artikel_per_id['judul'] == "" ? "Undefined" : $hasil_artikel_per_id['judul'];
        $isi = $hasil_artikel_per_id['isi'] == "" ? "Undefined" : $hasil_artikel_per_id['isi'];
        $timestamp = $hasil_artikel_per_id['timestamp'];
        $photo = "assets/images/ravali-yan-96009-unsplash-1110x740.jpg";
        if($hasil_artikel_per_id['photo'] != "" && file_exists("admin/photo/" . $hasil_artikel_per_id['photo'])){
            $photo = "admin/photo/" . $hasil_artikel_per_id['photo'];
        }
        ?>
        
        <section class="menu cid-qv1frvgcz3" once="menu" id="menu1-7v" data-rv-view="8334">

    

            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="menu-logo">
                    <div class="navbar-brand">

                        <span class="navbar-caption-wrap">
                            <a class="navbar-caption text-white display-4" href="index.php">
                                Back to Home
                            </a>
                        </span>
                    </div>
                </div>
            </nav>
        </section>

        <section class="mbr-section content5 cid-qvbiXHsAN2 mbr-parallax-background" id="content5-7w" data-rv-view="8336" style="background-image: url('<?php echo $photo; ?>');">



            <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(35, 35, 35);">
            </div>

            <div class="container">
                <div class="media-container-row">
                    <div class="title col-12 col-md-8">
                        <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1"><?php echo $judul; ?></h1>
                        <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5"><?php echo $judul; ?>&nbsp;</h3>


                    </div>
                </div>
            </div>
        </section>
        
        <section class="mbr-section content4 cid-qvbjfGj2Ze" id="content4-7x" data-rv-view="8339" style="padding-top: 50px; padding-bottom: 20px;">
            <div class="container">
                <div class="media-container-row">
                    <div class="title col-12 col-md-8">
                        <h2 class="align-center pb-3 mbr-fonts-style display-5"><?php echo $judul; ?></h2>
                        <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-7"><em>By Admin posted <?php echo get_date_year($timestamp); ?></em></h3>

                    </div>
                </div>
            </div>
        </section>
        
        <section class="mbr-section article content1 cid-qvbjomyZfb" id="content1-7y" data-rv-view="8341" style="min-height: 100vh;">
            <div class="container">
                <div class="media-container-row">
                    <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7"><?php echo $isi; ?>&nbsp;</div>
                </div>
            </div>
        </section>
        <?php 
        } else {
            header("location: index.php");
        } 
        ?>
        
        <?php } else { ?>
        
        <section class="header5 cid-r7o72Bhmed mbr-fullscreen" id="header5-3">


            <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(130, 130, 130);">
            </div>

            <div class="container">
                <h1 class="mbr-section-subtitle mbr-fonts-style align-center mbr-white display-4">Responsive Article Templates</h1>
                <div class="underline align-center pb-3">
                    <div class="line"></div>
                </div>
                <h2 class="mbr-section-title mbr-fonts-style align-center mbr-white pb-4 display-1">
                    Article Collection
                </h2>
            </div>

        </section>

        <?php 
        $query_artikel = mysqli_query($connect, "select id, judul, isi, photo from tbl_artikel");
        if(mysqli_num_rows($query_artikel) > 0){
            $num = 1;
            while($hasil_artikel = mysqli_fetch_array($query_artikel)){
                $id = $hasil_artikel['id'];
                $isi = substr(strip_tags($hasil_artikel['isi']), 0, 100);
                $photo = "assets/images/ravali-yan-96009-unsplash-1110x740.jpg";
                if($hasil_artikel['photo'] != "" && file_exists("admin/photo/" . $hasil_artikel['photo'])){
                    $photo = "admin/photo/" . $hasil_artikel['photo'];
                }
                if($num % 2){
                    $style = "";
                    if($num > 2){
                        $style = " padding-top: 30px;";
                    }
                    ?>
                    <section class="features1 cid-r7o8gt3azK" id="features1-4" style="<?php echo $style; ?>">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 image-element">
                                    <div class="img-wrap" style="height: 100%; width: 100%;">
                                        <img src="<?php echo $photo; ?>" alt="" title="">
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-6 text-element">


                                    <h2 class="mbr-section-title mbr-fonts-style align-center display-5">
                                        <?php echo $hasil_artikel['judul']; ?>
                                    </h2>
                                    <p class="mbr-text mbr-fonts-style mbr-lighter align-center display-7"><?php echo $isi; ?><br></p>
                                    <div class="mbr-section-btn align-center">
                                        <a class="btn btn-lg btn-primary display-4" href="index.php?id=<?php echo $id; ?>">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </section>
                    <?php
                } else {
                    ?>
                    <section class="features1 cid-r7o8w9BZe1" id="features1-8">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 image-element">
                                    <div class="img-wrap" style="height: 100%; width: 100%;">
                                        <img src="<?php echo $photo; ?>" alt="" title="">
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-6 text-element">


                                    <h2 class="mbr-section-title mbr-fonts-style align-center display-5">
                                        <?php echo $hasil_artikel['judul']; ?>
                                    </h2>
                                    <p class="mbr-text mbr-fonts-style mbr-lighter align-center display-7">
                                        <?php echo $isi; ?> 
                                    </p>
                                    <div class="mbr-section-btn align-center"><a class="btn btn-lg btn-primary display-4" href="index.php?id=<?php echo $id; ?>">Read MORE</a></div>
                                </div>
                            </div>
                        </div>          
                    </section>
                    <?php
                }
                $num++;
            }
        }
        ?>
        
        <?php } ?>
        
        <section class="footer2 cid-r7owx7axKc" once="footer" id="footer2-e">
            <div class="container">
                <div class="row justify-content-center mbr-white">
                    <div class="col-12">
                        <p class="mbr-text mb-0 mbr-fonts-style align-center display-7">
                            © Copyright 2018 Article Templates - All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/tether.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/smooth-scroll.js"></script>
        <script src="assets/js/script.min.js"></script>
        <script src="assets/js/jquery.touch-swipe.min.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/formoid.min.js"></script>
    </body>
</html>
<?php
ob_flush();