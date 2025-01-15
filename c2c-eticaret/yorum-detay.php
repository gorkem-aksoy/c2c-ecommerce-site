<?php 
require_once 'header.php'; 

islemkontrol();


$yorumsor=$db->prepare("SELECT yorum.*,kullanici.*,urun.* FROM yorum INNER JOIN kullanici ON yorum.kullanici_id=kullanici.kullanici_id INNER JOIN urun ON yorum.urun_id=urun.urun_id where yorum_id=:id order by yorum_zaman DESC");
$yorumsor->execute(array(

    'id' =>$_GET['yorum_id']

));

$say=0;

$yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC);
?>


<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">

        </div>
    </div>
</div>
<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="index.php">Anasayfa</a><span> -</span></li>
                <li style="color:#263238;"><b>Profil Ayarları</b></li>
            </ul>
        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Settings Page Start Here -->
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">
        <div class="row settings-wrapper">

            <?php require_once 'hesap-sidebar.php'; ?>


            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"> 


             <?php 

             if (isset($_GET['durum'])) {



                 if ($_GET['durum']=="ok") {?>

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="
                        glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                        Güncelleme işlemi tamamlandı.
                    </div>

                <?php } elseif ($_GET['durum']=="hata") {?>

                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        İşlem başarısız!
                    </div>

                <?php }





            }
            ?>

            <form action="nedmin/netting/islem.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content ">

                    <div class="tab-pane fade  active in" id="Profile">
                        <h3 class="title-section">Public Profile</h3>
                        <div class="public-profile inner-page-padding"> 

                            <div class="public-profile-item"> 
                                <div class="public-profile-title"> 
                                    <h4>Ad Soyad *</h4>
                                </div>
                                <div class="public-profile-content"> 
                                    <input class="profile-heading" type="text" value="<?php echo $yorumcek['kullanici_ad']." ".$yorumcek['kullanici_soyad'] ?>">
                                </div>
                            </div>

                            <div class="public-profile-item"> 
                                <div class="public-profile-title"> 
                                    <h4>Ürün Adı *</h4>
                                </div>
                                <div class="public-profile-content"> 
                                    <input class="profile-heading" type="text" value="<?php echo $yorumcek['urun_ad'] ?>">
                                </div>
                            </div>

                            <div class="public-profile-item"> 
                                <div class="public-profile-title"> 
                                    <h4>Verilen Puan *</h4>
                                </div>
                                <div class="public-profile-content"> 
                                    <input class="profile-heading" type="text" value="<?php echo $yorumcek['yorum_puan'] ?>">
                                </div>
                            </div>

                            <div class="public-profile-item"> 
                                <div class="public-profile-title"> 
                                    <h4>Yorum Bilgisi *</h4>
                                </div>
                                <div class="public-profile-content"> 
                                    <textarea class="profile-heading" rows="10"><?php echo $yorumcek['yorum_detay'] ?></textarea>

                                </div>
                            </div>

                            <div align="right">

                             <button class="update-btn" name="yorumonay" id="login-update">Onayla</button>
                             <input type="hidden" name="yorum_id" value="<?php echo $yorumcek['yorum_id'] ?>">
                             <button class="update-btn-red" name="yorumsil" id="login-update">Sil</button>

                         </div>



                     </div> 
                 </div> 


             </div>

         </form>  
     </div>


 </div>  
</div>  
</div> 
<!-- Settings Page End Here -->
<?php require_once 'footer.php'; ?>

