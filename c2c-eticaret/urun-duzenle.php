     <?php 
     require_once 'header.php'; 

     islemkontrol();

       $urunsor=$db->prepare("SELECT * FROM urun where kullanici_id=:kullanici_id and urun_id=:urun_id order by urun_zaman DESC");
       $urunsor->execute(array(
          'kullanici_id' => $_SESSION['userkullanici_id'],
          'urun_id' => $_GET['urun_id']
      ));

       $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);



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
                <li><a href="urunlerim">Ürünlerim</a> <span> ></span></li>
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

            <form action="nedmin/netting/procedur.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content ">

                 <div class="tab-pane fade active in" id="Add-Product">
                    <h3 class="title-section">Ürün Bilgileri</h3>
                    <div class="public-profile inner-page-padding"> 
                        <div class="public-profile-item"> 
                            <div class="public-profile-title"> 
                                <h4>Ürün Fotoğrafı *</h4>
                            </div>
                            <div class="public-profile-content"> 

                                <img width="230" class="img-responsive" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="Avatar">

                                <div class="file-title">Ürünü temsil eden bir fotoğraf yükleyiniz...</div>
                                <div class="file-upload-area"><input name="urunfoto_resimyol" type="file"></div>

                            </div>


                        </div> 

                        <div class="public-profile-item"> 
                            <div class="public-profile-title"> 
                                <h4>Ürün Dosyaları *</h4>
                            </div>
                            <div class="public-profile-content"> 

                                <span><?php echo substr($uruncek['urun_dosya'], 11) ?></span>

                                <div class="file-title">Ürüne ait bütün dosyaları rar şeklinde sisteme yükleyiniz.</div>
                                <div class="file-upload-area"><input name="urun_dosya" type="file"></div>

                            </div>


                        </div>

                        <div class="public-profile-item"> 
                            <div class="public-profile-title"> 
                                <h4>Kategoriler *</h4>
                            </div>
                            <div class="public-profile-content"> 
                             <div class="custom-select">
                              <select name="kategori_id" class='select2'>

                                <?php 

                                $kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC ");
                                $kategorisor->execute();


                                while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 


                                    ?>

                                    <option  <?php if ($kategoricek['kategori_id']==$uruncek['kategori_id']) { echo "selected"; } ?> value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="public-profile-item"> 
                    <div class="public-profile-title"> 
                        <h4>Ad *</h4>
                    </div>
                    <div class="public-profile-content"> 
                        <input class="profile-heading" type="text" name="urun_ad" value="<?php echo $uruncek['urun_ad'] ?>" placeholder="Ürün adını giriniz...">

                    </div>
                </div>

                <div class="public-profile-item"> 
                    <div class="public-profile-title"> 
                        <h4>Ürünü Tanımla *</h4>
                    </div>
                    <div class="public-profile-content"> 
                        <input class="profile-heading" type="text" name="urun_keyword" value="<?php echo $uruncek['urun_keyword'] ?>" placeholder="Örn:Admin Panel...">

                    </div>
                </div>

                <div class="public-profile-item"> 
                    <div class="public-profile-title"> 
                        <h4>Açıklama</h4>
                    </div>
                    <div class="public-profile-content"> 
                     <textarea class="ckeditor" id="ckeditor1" name="urun_detay"><?php echo $uruncek['urun_detay'] ?></textarea>
                 </div>
             </div>

             <script src="text/javascript">

              CKEDITOR.editorConfig = function( config ) {
                config.toolbarGroups = [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                '/',
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'others', groups: [ 'others' ] }
                ];
            };




        </script>

        <div class="public-profile-item"> 
            <div class="public-profile-title"> 
                <h4>Fiyat *</h4>
            </div>
            <div class="public-profile-content"> 
                <input class="profile-heading" type="text" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat'] ?>" placeholder="Ürün fiyatını giriniz...">


            </div>
        </div>



        <input type="hidden" value="<?php echo $uruncek['urun_id'] ?>" name="urun_id">

        <input type="hidden" name="eski_imgyol" value="<?php echo $uruncek['urunfoto_resimyol'] ?>">
        <input type="hidden" name="eski_fileyol" value="<?php echo $uruncek['urun_dosya'] ?>">
        <div align="right">
            <button class="update-btn" name="magazaurunguncelle" id="login-update">Tamamla</button>
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


















