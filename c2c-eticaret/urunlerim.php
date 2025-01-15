
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
                        <h2 class="title-section">Your Sales Statement</h2>
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
                                            <th>Fotoğraf</th>
                                            <th>Tarih</th>
                                            <th>Ürün Adı </th>
                                            <th></th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        $urunsor=$db->prepare("SELECT * FROM urun where kullanici_id=:kullanici_id order by urun_zaman DESC");
                                        $urunsor->execute(array(
                                            'kullanici_id' => $_SESSION['userkullanici_id']
                                        ));

                                        $say=0;

                                        while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

                                            <tr>
                                                <th scope="row"><?php echo $say ?></th>
                                                <td><img width="140" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="avatar" class="img-responsive"></td>
                                                <td><?php echo $uruncek['urun_zaman'] ?></td>
                                                <td><?php echo $uruncek['urun_ad'] ?></td>

                                                <td><a href="urun-duzenle?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></td>

                                                <td>
                                                    
                                                 <?php if ($uruncek['urun_durum']==0) {?>

                                                    <button class="btn btn-warning btn-xs">Onay Bekliyor</button>
                                                    
                                                <?php } else {?>


                                                    <a onclick="return confirm('Bu ürünü silmek istiyormusunuz? \n İşlem geri alınamaz...')" href="nedmin/netting/islem.php?urunsil=ok&urun_id=<?php echo $uruncek['urun_id'] ?>&urunfoto_resimyol=<?php echo $uruncek['urunfoto_resimyol'] ?>"><button class="btn btn-danger btn-xs">Sil</button></a>


                                                <?php } ?>



                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="total-sale">Total Sales:<span> $ 5,030</span></div> 
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













