
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

                <?php } else if ($_GET['durum']=="no") {?>

                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        İşlem başarısız!
                    </div>

                <?php }




            }

            if (isset($sipariscek['siparisdetay_onay'])) {



                if ($sipariscek['siparisdetay_onay']==1) {?>

                    <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Alıcı siparişi onayladı, 24 saat içerisin de ödeme gerçekleştirilecektir...
                    </div>

                <?php } 

            }?>


            
            <div class="settings-details tab-content ">

                <div class="tab-pane fade active in" id="Products">

                   <!-- Sales Statement Page Start Here -->
                   <div style="margin-left: -15px;" class="sales-statement-page-area bg-secondary section-space-bottom">
                    <div style="max-width: 878px; " class="container">
                        <h2 class="title-section"><?php echo $_GET['siparis_id'] ?> numaralı siparişiniz...</h2>
                        <div class="sales-statement-wrapper inner-page-padding">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Fiyatı</th>
                                            <th>Alıcı</th>
                                            <th>Onay Durumu</th>


                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        $siparissor =$db ->prepare("SELECT urun.*,kullanici.*,siparis_detay.*,siparis.* FROM siparis_detay INNER JOIN siparis ON siparis_detay.siparis_id=siparis.siparis_id INNER JOIN urun ON siparis_detay.urun_id=urun.urun_id INNER JOIN kullanici ON siparis_detay.kullanici_id=kullanici.kullanici_id where siparis.siparis_id=:siparis_id order by siparis_zaman DESC");
                                        $siparissor ->execute(array(
                                            'siparis_id' => $_GET['siparis_id']
                                        ));

                                        $say=0;

                                        while($sipariscek =$siparissor ->fetch(PDO::FETCH_ASSOC)) { $say++?>

                                            <tr>
                                                <th scope="row"><?php echo $say ?></th>
                                                <td><?php echo $sipariscek['urun_ad'] ?></td>
                                                <td><?php echo $sipariscek['urun_fiyat'] ?></td>
                                                <td><?php echo $sipariscek['kullanici_ad']." ".$sipariscek['kullanici_soyad'] ?></td>

                                                <td>
                                                    <?php

                                                    if ($sipariscek['siparisdetay_onay']==0) {?>

                                                      <a onclick="return confirm('Siparişi teslim etmek üzeresiniz, bu işlem geri alınamaz!');" href="nedmin/netting/procedur.php?siparisdetay_id=<?php echo $sipariscek['siparisdetay_id'] ?>&siparisteslim=ok&siparis_id=<?php echo $sipariscek['siparis_id'] ?>">
                                                        <button class="btn btn-danger btn-xs">Teslim Et</button>

                                                    </a>



                                                <?php }else if ($sipariscek['siparisdetay_onay']==2){ ?> 

                                                  <button class="btn btn-success btn-xs">Sipariş onaylandı</button>

                                              <?php } else if ($sipariscek['siparisdetay_onay']==1){ ?> 

                                                  <button class="btn btn-warning btn-xs">Alıcı onayı bekleniyor</button>

                                              <?php } ?>
                                          </td>

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













