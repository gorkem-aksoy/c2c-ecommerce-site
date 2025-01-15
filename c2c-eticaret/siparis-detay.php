
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

                <?php } elseif ($_GET['durum']=="no") {?>

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
                        <h2 class="title-section"><?php echo $_GET['siparis_id'] ?> numaralı siparişiniz...</h2>
                        <div class="sales-statement-wrapper inner-page-padding">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Fiyatı</th>
                                            <th>Satıcı</th>
                                            <th>Onay Durumu</th>


                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        $siparissor =$db ->prepare("SELECT urun.*,kullanici.*,siparis_detay.*,siparis.* FROM siparis_detay INNER JOIN siparis ON siparis_detay.siparis_id=siparis.siparis_id INNER JOIN urun ON siparis_detay.urun_id=urun.urun_id INNER JOIN kullanici ON siparis_detay.kullanici_idsatici=kullanici.kullanici_id where siparis.siparis_id=:siparis_id order by siparis_zaman DESC");
                                        $siparissor ->execute(array(
                                            'siparis_id' => $_GET['siparis_id']
                                        ));          

                                        $sipariscek =$siparissor ->fetch(PDO::FETCH_ASSOC);




                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $say ?></th>
                                            <td><?php echo $sipariscek['urun_ad'] ?></td>
                                            <td><?php echo $sipariscek['urun_fiyat'] ?></td>
                                            <td><?php echo $sipariscek['kullanici_magazaad'] ?></td>

                                            <td>
                                                <?php

                                                if ($sipariscek['siparisdetay_onay']==1) {?>

                                                    <a onclick="return confirm('Siparişi onaylamak istiyorsanız tamam seçeneğine tıklayın, eğer bir şüpheniz varsa müşteri hizmetlerine danışınız, bu işlem geri alınamaz!');" href="nedmin/netting/procedur.php?siparisdetay_id=<?php echo $sipariscek['siparisdetay_id'] ?>&siparisonay=ok&siparis_id=<?php echo $sipariscek['siparis_id'] ?>">
                                                        <button class="btn btn-danger btn-xs">Onay Ver</button>

                                                    </a>

                                                <?php }else if ($sipariscek['siparisdetay_onay']==2){ ?> 

                                                  <button class="btn btn-success btn-xs">Sipariş İşlemi Tamamlandı</button>

                                              <?php } else if ($sipariscek['siparisdetay_onay']==0){ ?> 

                                                  <button class="btn btn-success btn-xs">Satıcının teslim etmesi bekleniyor.</button>


                                                  <?php } ?>
                                              </td>

                                          </tr>



                                      </tbody>
                                  </table>

                                  <?php 

                                  if ($sipariscek['siparisdetay_onay']==2 and $sipariscek['siparisdetay_yorum']==0) {  ?>





                                      <hr>

                                      <form action="nedmin/netting/procedur.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                                        <div class="settings-details tab-content ">


                                            <h3 class="title-section">Deneyiminizi Puan ve Yorum ile Belirleyiniz</h3>
                                            <div class="public-profile inner-page-padding"> 


                                                <div class="public-profile-item"> 
                                                    <div class="public-profile-title"> 
                                                        <h4>Puanla *</h4>
                                                    </div>
                                                    <div class="public-profile-content"> 
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio1" name="yorum_puan" value="1">
                                                            <label for="inlineRadio1"> 1</label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio2" name="yorum_puan" value="2">
                                                            <label for="inlineRadio2"> 2</label>
                                                        </div>
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="inlineRadio3" name="yorum_puan" value="3">
                                                            <label for="inlineRadio3"> 3</label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio4" name="yorum_puan" value="4">
                                                            <label for="inlineRadio4"> 4</label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="inlineRadio5" name="yorum_puan" value="5" checked="">
                                                            <label for="inlineRadio5"> 5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="public-profile-item"> 
                                                    <div class="public-profile-title"> 
                                                        <h4>Yorumunuz *</h4>
                                                    </div>
                                                    <div class="public-profile-content"> 
                                                        <textarea class="profile-heading" rows="10"  name="yorum_detay" placeholder="Yorumunuz satıcının iyi ve güvenilir olup olmadığını belirler. Lütfen yorumunuzu dikkatli ve anlaşılır bir şekilde giriniz..."></textarea>
                                                        <div align="right">
                                                            <input type="hidden" name="urun_id" value="<?php echo $sipariscek['urun_id'] ?>">
                                                            <input type="hidden" name="siparis_id" value="<?php echo $sipariscek['siparis_id'] ?>">
                                                            <input type="hidden" name="siparisdetay_id" value="<?php echo $sipariscek['siparisdetay_id'] ?>">
                                                            <button type="submit" name="urunyorumpuankaydet" class="update-btn" id="save">Yorum/Puan Kaydet</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                        </div>

                                    </form>

                                <?php } else if($sipariscek['siparisdetay_onay']==2 and $sipariscek['siparisdetay_yorum']==1) {
                                    echo "Bu ürün de yorum ve puan bilgisi mevcuttur.";
                                }  ?>

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













