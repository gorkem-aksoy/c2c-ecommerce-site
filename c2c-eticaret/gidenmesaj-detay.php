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
                    <li><a href="index.php">Anasayfa</a><span> ></span></li>
                    <li><a href="urun-ekle">Ürün Ekle</a> <span> ></span></li>
                    <li style="color:#263238;"><b>Ürün Düzenle</b></li>
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

                    <div class="profile-wrapper">
                        <div class="settings-details tab-content ">

                          <div class="tab-pane fade active in" id="Message">
                            <h3 class="title-inner-section">Mesajlar</h3>
                            <div style="background-color: #fff;" class="message-wrapper">

                                <?php 

                                $mesajsor =$db ->prepare("SELECT mesaj.*,kullanici.* FROM mesaj INNER JOIN kullanici ON mesaj.kullanici_gonderen=kullanici.kullanici_id where mesaj_id=:id");
                                $mesajsor ->execute(array(

                                    'id' =>$_GET['mesaj_id']

                                ));

                                $mesajcek =$mesajsor ->fetch(PDO::FETCH_ASSOC);

                                ?>

                                <div class="single-item-message">
                                    <div class="single-item-inner">
                                        <img width="125" src="<?php echo $mesajcek['kullanici_resim'] ?>" alt="profile" class="img-responsive">
                                        <div class="item-content">
                                            <h4><?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad'] ?></h4>
                                            <span><?php echo $mesajcek['mesaj_zaman']?></span>
                                            <p><?php echo $mesajcek['mesaj_detay']?></p>
                                        </div> 
                                    </div> 


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


















