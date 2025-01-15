



<?php 
require_once 'header.php'; 

islemkontrol();
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
                                <h4>Banner Image</h4>
                            </div>
                            <div class="public-profile-content"> 
                                <img class="img-responsive" src="img\profile\banner.jpg" alt="Avatar">
                                <div class="file-title">Upload a new homepage image:</div>
                                <div class="file-upload-area"><input name="kullanici_magazafoto" type="file"></div>
                                
                            </div>
                        </div>                         

                        <div class="public-profile-item"> 
                            <div class="public-profile-title"> 
                                <h4>Show Your Country Name on Your Profile</h4>
                            </div>
                            <div class="public-profile-content"> 
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                    <label for="inlineRadio1"> Yes</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                    <label for="inlineRadio2"> No</label>
                                </div>
                            </div>
                        </div>
                        <div class="public-profile-item"> 
                            <div class="public-profile-title"> 
                                <h4>Profile Heading</h4>
                            </div>
                            <div class="public-profile-content"> 
                                <input class="profile-heading" type="text" value="">
                                <div class="file-size">Appears on your profile page</div>
                            </div>
                        </div>
                        <div class="public-profile-item"> 
                            <div class="public-profile-title"> 
                                <h4>Hakkımda</h4>
                            </div>
                            <div class="public-profile-content"> 
                                <textarea class="profile-heading" rows="5"></textarea>
                                <div class="file-size">Here's a refresher on how to add some HTML magic to your comment.</div>

                            </div>
                        </div>

                        <div align="right">

                         <input type="hidden" name="eski_yol" value="<?php echo $kullanicicek['kullanici_resim'] ?>">
                         <button class="update-btn" name="magazabilgikaydet" id="login-update">Kaydet</button>

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

