
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
                <li style="color:#263238;"><b>Ürünlerim</b></li>
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

            
            <div class="settings-details tab-content ">



                <div class="tab-pane fade active in" id="Products">




                 <!-- Sales Statement Page Start Here -->
                 <div style="margin-left: -15px;" class="sales-statement-page-area bg-secondary section-space-bottom">
                    <div style="max-width: 878px; " class="container">
                        <h2 class="title-section">Tamamlanan Siparişler</h2>
                        <div class="sales-statement-wrapper inner-page-padding">
                            <div class="sales-statement-filter">
                                <div class="sales-statement-filter-item">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <input type="text" class="form-control rt-date" placeholder="Date" name="date" id="form-date-from" data-error="Subject field is required">
                                </div>
                                <div class="sales-statement-filter-item">
                                    <span>To</span>
                                </div>
                                <div class="sales-statement-filter-item">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <input type="text" class="form-control rt-date" placeholder="Date" name="date" id="form-date-to" data-error="Subject field is required" >
                                </div>
                                <div style="margin-top: 5px;" class="sales-statement-filter-item">
                                    <a href="#" class="find-btn" id="login-button">Bul</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sipariş Tarihi</th>
                                            <th>Sipariş Numarası</th>
                                            <th></th>  
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        $siparissor=$db->prepare("SELECT siparis.*,siparis_detay.* FROM siparis INNER JOIN siparis_detay ON siparis.siparis_id=siparis_detay.siparis_id where siparis.kullanici_idsatici=:kullanici_idsatici and siparis_detay.siparisdetay_onay=:onay order by siparis_zaman DESC");
                                        $siparissor->execute(array(
                                            'kullanici_idsatici' => $_SESSION['userkullanici_id'],
                                            'onay' =>2
                                            
                                        ));

                                        $say=0;

                                        while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                                            <tr>
                                                <th scope="row"><?php echo $say ?></th>
                                                <td><?php echo $sipariscek['siparis_zaman'] ?></td>
                                                <td><?php echo $sipariscek['siparis_id'] ?></td>

                                                <td><a href="tamamlanan-siparis-detay?siparis_id=<?php echo $sipariscek['siparis_id'] ?>"><button class="btn btn-primary btn-xs">Detay</button></a></td>

                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div> 
                    </div> 
                </div> 
                <!-- Sales Statement Page End Here -->




            </div> 


        </div>



    </div>




</div>  
</div>  
</div> 
<!-- Settings Page End Here -->
<?php require_once 'footer.php'; ?>













