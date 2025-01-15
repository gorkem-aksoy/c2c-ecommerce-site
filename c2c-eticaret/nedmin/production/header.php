<?php 
ob_start();
session_start();

include '../netting/baglan.php';

include 'fonksiyon.php';

//Belirli veriyi çekme işlemi
$ayarsor =$db ->prepare("SELECT * FROM ayar where ayar_id =:id");
$ayarsor ->execute(array(
  'id' =>0
));
$ayarcek =$ayarsor ->fetch(PDO::FETCH_ASSOC);


if (isset($_SESSION['useradmin_mail'])) {

  $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
  $kullanicisor->execute(array(
    'mail'=>$_SESSION['useradmin_mail']
  ));
  $say =$kullanicisor ->rowCount();
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

}

if ($say==0) {

  header("Location:../index.php?durum=izinsizerisim");

  exit();
  
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>İlk proje scriptim</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" type="text/css" href="fontawesome-6.1.1/fontawesome-free-6.1.1-web/css/all.min.css">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



  <!-- Dropzone.js -->

  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

  <!-- CkEditör -->
  <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fas fa-store-alt"></i> <span>ADMİNİM</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Hoşgeldin,</span>
              <h2><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">

               <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa<span class="label label-success pull-right"></span></a></li>

               <li><a><i class="fa fa-cogs"></i> Site Ayarları<span ></span></a>
                <ul class="nav child_menu">
                  <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                  <li><a href="iletisim-ayar.php">İletişim Ayarları</a></li>
                  <li><a href="api-ayar.php">Api Ayarları</a></li>
                  <li><a href="sosyal-ayar.php">Sosyal Ayarları</a></li>
                  <li><a href="mail-ayar.php">Mail Ayarları</a></li>
                </ul>
              </li>

              <li><a href="hakkimizda.php"><i style="margin-right: 13px;" class="fas fa-info-circle "></i> Hakkımızda<span class="label label-success pull-right"></span></a></li>

              <li><a href="magaza-basvuru.php"><i style="margin-right: 16px;" class="fas fa-shapes"></i>Mağaza Başvuruları<span class="label label-success pull-right"></span></a></li>

               <li><a href="magazalar.php"><i style="margin-right: 10px;" class="fas fa-store-alt"></i> Mağazalar<span class="label label-success pull-right"></span></a></li>

              <li><a href="kullanicilar.php"><i style="margin-right: 10px;" class="fas fa-users"></i> Kullanıcılar<span class="label label-success pull-right"></span></a></li>

              <li><a href="menuler.php"><i class="fa fa-list"></i> Menüler<span class="label label-success pull-right"></span></a></li>

              <li><a href="kategori.php"><i class="fa fa-clone"></i> Kategoriler<span class="label label-success pull-right"></span></a></li>

              <li><a href="urun.php"><i class="fa fa-archive"></i> Ürünler<span class="label label-success pull-right"></span></a></li>

              <li><a  href="yorum.php"><i class="fa fa-comments"></i> Yorumlar<span class="label label-success pull-right"></span></a></li>

              <li><a href="slider.php"><i class="fa fa-image"></i> Slider<span class="label label-success pull-right"></span></a></li>

              <li><a href="banka.php"><i class="fa fa-bank"></i> Bankalar<span class="label label-success pull-right"></span></a></li>

              

              


            </ul>
          </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="images/img.jpg" alt=""><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad'] ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="profile.php"> Profil Bilgileri</a></li>
                
                <li><a href="Logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>
              </ul>
            </li>

            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green">6</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li>
                  <div class="text-center">
                    <a>
                      <strong>See All Alerts</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
        <!-- /top navigation -->