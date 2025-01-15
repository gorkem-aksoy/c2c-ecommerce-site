<?php 
require_once 'header.php'; 


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
                <li style="color:#263238;"><b>Hesap Bilgileri</b></li>
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

            <form action="nedmin/netting/procedur.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content ">

                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Hesap Bilgilerim</h2>

                        <div class="personal-info inner-page-padding"> 

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mail Adresi *</label>
                                <div class="col-sm-9">
                                    <input class="form-control" disabled name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>" id="first-name" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ad *</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad'] ?>" id="first-name" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Soyad *</label>
                                <div class="col-sm-9"> 
                                    <input class="form-control" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad'] ?>" id="last-name" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefon Numarası *</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" id="company-name" type="text">
                                </div>
                            </div>

                            <div class="form-group">  
                                <div align="right" class="col-sm-12">                                         
                                    <button class="update-btn" name="kullanicibilgiguncelle" id="login-update">Güncelle</button>
                                </div>
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

