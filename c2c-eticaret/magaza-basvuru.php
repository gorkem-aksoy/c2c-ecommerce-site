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
                <li style="color:#263238;"><b>Mağaza Başvuru</b></li>
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



                    <div class="tab-pane fade active in" id="Store">


                        <h2 class="title-section">Mağaza Başvuru Formu</h2>

                        

                        <div class="personal-info inner-page-padding">

                            <?php 

                            if ($kullanicicek['kullanici_magaza']==0) { ?>


                                <div class="alert alert-warning" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                    Başvuru işleminizi tamamlamak için tüm bilgilerinizin eksiksiz ve doğru olarak girilmesine özen gösteriniz. Eksik yada hatalı bilgi olduğunda başvurunuz iptal edilecektir.
                                </div>

                                <ul>
                                    <h3>Foxtar'da size ait bir mağaza olsun...</h3>
                                    <p><span style="color:#8BC04A; padding: 7px;" class="glyphicon glyphicon-chevron-right"></span>Temel listeleme ücreti ödemeden listeleme yapın, tasarımlarınızı ve scriptlerinizi tanıtma fırsatı yakalayın.</p>
                                    <br><br>
                                    <h4>Mağaza sahibi olmanın avantajları</h4>
                                    <li><span style="color:#8BC04A; padding: 10px;" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>Ürünlerinizi <b>uzun süreli</b> listeleyin</li>
                                    <li><span style="color:#8BC04A; padding: 10px;" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span><b>Ücretsiz listeleme</b> haklarına sahip olun</li>
                                    <li><span style="color:#8BC04A; padding: 10px;" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>Logonuzu ve firma bilgilerinizi mağazanıza ekleyin</li>
                                    <li><span style="color:#8BC04A; padding: 10px;" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>Mağazanıza ait web adresiyle müşterilerinize direkt ulaşın</li>
                                    <li><span style="color:#8BC04A; padding: 10px;" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>API servislerinden <b>ücretsiz</b> yararlanın</li>
                                    
                                </ul>

                                <br><hr>

                                <h4>Mağaza Bilgilerim</h4>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı Adınız *</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="kullanici_magazatakmaad" id="first-name" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mağaza Adınız *</label>
                                    <div class="col-sm-9"> 
                                        <input class="form-control" name="kullanici_magazaad"  id="last-name" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mağaza Tanıtım Yazınız *</label>
                                    <div class="col-sm-9">
                                        <textarea style="height:150px;" class="form-control" name="kullanici_magazatanitim" cols="30" rows="15"></textarea>

                                    </div>
                                </div>



                                <h4 style="margin-top: 40px;">Fatura Bilgilerim</h4>

                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Bireysel/Kurumsal</label>
                                  <div class="col-sm-9">
                                      <div class="custom-select">
                                          <select name="kullanici_tip" id="kullanici_tip" class='select2'>

                                              <option 

                                              <?php 

                                              if ($kullanicicek['kullanici_tip']=="PERSONAL") {
                                                 echo "selected";
                                             }
                                             ?>

                                             value="PERSONAL">Bireysel</option>
                                             <option  <?php 

                                             if ($kullanicicek['kullanici_tip']=="PRIVATE_COMPANY") {
                                                 echo "selected";
                                             }
                                         ?> value="PRIVATE_COMPANY">Kurumsal</option>

                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div id="tc">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">T.C *</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="kullanici_tc" id="first-name" type="text">
                                </div>
                            </div>
                        </div>

                        <div id="kurumsal">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Firma V. Dairesi *</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="kullanici_vdaire" id="first-name" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Firma V. No *</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="kullanici_vno" id="first-name" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ad *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_ad" id="first-name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Soyad *</label>
                            <div class="col-sm-9"> 
                                <input class="form-control" name="kullanici_soyad" id="last-name" type="text">
                            </div>
                        </div>

                        <h4 style="margin-top: 40px;">Fatura Adresim</h4>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Açık Adres *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_adres" id="first-name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Şehir *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_il" id="first-name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">İlçe *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_ilce" id="first-name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mahalle *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_mah" id="first-name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telefon Numarası *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_gsm" id="company-name" type="text">
                            </div>
                        </div>

                        <h4 style="margin-top: 40px;">Banka Hesap Bilgileri</h4>

                      
                        <div class="form-group">
                            <label class="col-sm-3 control-label">IBAN Numarası *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_iban" id="company-name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Banka Adı *</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="kullanici_banka" id="company-name" type="text">
                            </div>
                        </div>

                     





                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <div class="checkbox">
                                    <label><input name="kullanici_magazaonay" type="checkbox" value="">Mağaza aboneliği satın alarak <a href="javascript:void(0)">Mağaza Sözleşmesini </a>okuduğunuzu ve kabul ettiğinizi onaylıyorsunuz.</label>

                                </div>
                            </div>
                        </div>



                        <div class="form-group">  
                            <div align="right" class="col-sm-12">                                         
                                <button class="update-btn" name="kullanicimagazabasvuru" id="login-update">Ücretsiz Mağaza Aboneliği Başlat</button>
                            </div>
                        </div> 

                    <?php } else if ($kullanicicek['kullanici_magaza']==1){ ?>

                        <div class="alert alert-info ">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            Başvurunuz onay aşamasındadır...
                            <p style="margin-left: 19px;">Başvurular genellikle 24 saat içerisinde incelenir ve sonuçlandırılır.</p>
                        </div>


                    <?php } else { ?>

                     <div class="alert alert-info bg-primary">
                        <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                        Başvurunuz onaylanmıştır...
                        <p style="margin-left: 19px;">Mağaza yönetim panelinden mağazanızı yönetebilirsiniz. Foxtar teşekkür eder, iyi satışlar dileriz...</p>
                    </div>

                <?php } ?>


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


<script type="text/javascript">

    $(document).ready(function(){


        $("#kullanici_tip").change(function(){


            var tip=$("#kullanici_tip").val();

            if (tip=="PERSONAL") {


                $("#kurumsal").hide();
                $("#tc").show();




            } else if (tip=="PRIVATE_COMPANY") {

                $("#kurumsal").show();
                $("#tc").hide();


            }


        }).change();



    });


</script>












