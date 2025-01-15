<?php 


require_once 'header.php';


$kullanicisor =$db ->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
$kullanicisor ->execute(array(
    'kullanici_id' => $_GET['kullanici_id']
));

$kullanicicek =$kullanicisor ->fetch(PDO::FETCH_ASSOC);



?>
<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
            <p>Premium WordPress Themes, Web Templates and Many More ...</p>
            
        </div>
    </div>
</div>
<!-- Main Banner 1 Area End Here --> 
<!-- Inner Page Banner Area Start Here -->

<!-- Inner Page Banner Area End Here -->          
<!-- Profile Page Start Here -->
<div class="profile-page-area bg-secondary section-space-bottom">                
    <div class="container">
        <br><br><br><br><br>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 col-lg-push-3 col-md-push-4 col-sm-push-4">
                <div class="inner-page-main-body">
                    <div class="single-banner">
                        <img src="img\banner\1.jpg" alt="product" class="img-responsive">
                    </div>                                
                    <div class="author-summery">
                        <div class="single-item">
                            <div class="item-title">Bölge:</div>
                            <div class="item-details"><?php echo $kullanicicek['kullanici_ulke']." > ".$kullanicicek['kullanici_il'] ?></div>                                       
                        </div>
                        <div class="single-item">
                            <div class="item-title">Üye Tarihi:</div>
                            <div class="item-details"><?php echo $kullanicicek['kullanici_zaman'] ?></div>                                       
                        </div>
                        <div class="single-item">
                            <div class="item-title">Mağaza Değerlendirme:</div>
                            <div class="item-details">

                               


                        </div>                                       
                    </div>
                    <div class="single-item">
                        <div class="item-title">Toplam Satış:</div>
                        <div class="item-name">


                       </div>                                       
                   </div>
               </div>
           </div>
       </div>
       <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 col-lg-pull-9 col-md-pull-8 col-sm-pull-8">
        <div class="fox-sidebar">
            <div class="sidebar-item">
                <div class="sidebar-item-inner">
                    <h3 class="sidebar-item-title"><?php echo $kullanicicek['kullanici_magazaad'] ?></h3>
                    <div class="sidebar-author-info">
                        <div class="sidebar-author-img">
                            <img src="<?php echo $kullanicicek['kullanici_resim'] ?>" alt="product" class="img-responsive">
                        </div>
                        <div class="sidebar-author-content">
                            <h3><?php echo $kullanicicek['kullanici_magazatakmaad'] ?></h3>








                       </div>
                   </div>
                   <ul class="sidebar-badges-item">

                    







                </ul>
            </div>
        </div>
        <ul class="social-default">
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
        </ul>                                
        <ul class="sidebar-product-btn">
            <?php 



            if ($_SESSION['userkullanici_id']==$_GET['kullanici_id']) { ?>

              <li><a href="javascript:void(0)" class="buy-now-btn" id="buy-button"><i class="fa fa-envelope-o" aria-hidden="true"></i> Bana Ulaş</a></li>
              <li><a href="javascript:void(0)" class="add-to-cart-btn" id="cart-button">Takip Et</a></li>

          <?php  } else { ?> 

            <li><button class="buy-now-btn services__button" id="buy-button"><i class="fa fa-envelope-o" aria-hidden="true"></i> Bana Ulaş</button>
            </li>

            <div class="services__modal">
                <div class="services__modal-content">
                    <h2 class="services__modal-title">Merak ettiğin birşey mi var, BANA ULAŞ</h2>
                    <i class="glyphicon glyphicon-remove services__modal-close"></i>
                    <br>

                    <div class="services__modal-sevices ">
                       <div class="contact-us-right"> 

                        <div class="contact-form"> 
                            <form action="nedmin/netting/procedur.php" method="POST" id="contact-form">
                                <fieldset>
                                    <div class="row">

                                        <?php 

                                        $kullanicisor =$db ->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
                                        $kullanicisor ->execute(array(

                                            'kullanici_id' => $_SESSION['userkullanici_id']

                                        ));

                                        $say =$kullanicisor ->rowCount();

                                        $kullanicicek =$kullanicisor ->fetch(PDO::FETCH_ASSOC);

                                        ?>

                                        <div style="margin: 15px; width: 600px;" class="alert alert-warning " role="alert">
                                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                            Merak ettiğiniz konuyu anlaşılır ve sade bir dil ile yazınız.
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" disabled value="<?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad'] ?>" class="form-control" id="form-name" data-error="Name field is required" required="">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea placeholder="Mesajınız *" class="textarea form-control" name="mesaj_detay" id="form-message" rows="7" cols="20" data-error="Message field is required" required=""></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="kullanici_alan" value="<?php echo $_GET['kullanici_id'] ?>">



                                        <input type="hidden" name="gelen_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ?>">

                                        <div style="margin-right: 15px;" align="right" class="form-group margin-bottom-none">
                                            <button type="submit" name="kullanicimesajgonder" class="update-btn">Gönder</button>
                                        </div>


                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <li><a href="#" class="add-to-cart-btn" id="cart-button">Takip Et</a></li>


    <?php }

    ?>


</ul>

</div>
</div>                                                
</div>
<div class="row profile-wrapper">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <ul class="profile-title">
            <li class="active"><a href="#Profile" data-toggle="tab" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Hakkımda</a></li>
            <li><a href="#Products" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i> Ürünlerim 
               
         </a></li>
         <li><a href="#Message" data-toggle="tab" aria-expanded="false"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mesajlar</a></li>
         <li><a href="#Reviews" data-toggle="tab" aria-expanded="false"><i class="fa fa-comments-o" aria-hidden="true"></i> Customer Reviews ( 20 )</a></li>
         <li><a href="#Followers" data-toggle="tab" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i> Followers (100 )</a></li>
     </ul>
 </div>
 <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12"> 
    <div class="tab-content">
        <div class="tab-pane fade active in" id="Profile">
            <div class="inner-page-details inner-page-content-box">
                <h3>About Me:</h3>
                <p>Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>
                <h3>Skills:</h3>
                <div class="skill-area">

                    <div class="progress">
                        <div class="lead">Graphic Design</div>
                        <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 90%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="100%" class="progress-bar wow fadeInLeft   animated"></div>
                    </div>
                    <div class="progress">
                        <div class="lead">WordPress</div>
                        <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 80%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="80%" class="progress-bar wow fadeInLeft   animated"></div>
                    </div>
                    <div class="progress">
                        <div class="lead">Joomla</div>
                        <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: 60%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft;" data-progress="60%" class="progress-bar wow fadeInLeft   animated"></div> 
                    </div>
                </div>
            </div> 
        </div> 
        <div class="tab-pane fade" id="Products">
            <h3 class="title-inner-section">My Products</h3>
            <div class="inner-page-main-body"> 
             <div class="row more-product-item-wrapper">



                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img style="width: 150px; height: 91px;" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#"><?php echo $uruncek['urun_ad'] ?></a></h4>
                                <div class="p-title"><?php echo $uruncek['kategori_ad'] ?></div>
                                <div class="p-price"><?php echo $uruncek['urun_fiyat'] ?> ₺</div>
                            </div>
                        </div>
                    </div> 

            

                
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="pagination-align-left">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>  
            </div>
        </div> 
    </div>
    <div class="tab-pane fade" id="Message">
        <h3 class="title-inner-section">Mesajlar</h3>
        <div class="message-wrapper">
            <div class="single-item-message">


                    
                    <div class="single-item-inner">
                        <img width="125" src="<?php echo $mesajcek['kullanici_resim'] ?>" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4><?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad'] ?></h4>
                            <span><?php echo $mesajcek['mesaj_zaman']?></span>
                            <p><?php echo $mesajcek['mesaj_detay']?></p>
                        </div> 
                    </div> 

                  
                        <div class="single-item-inner-author">
                            <img width="125" src="<?php echo $mesajaltcek['kullanici_resim'] ?>" alt="profile" class="img-responsive">
                            <div class="item-content">
                                <h4><?php echo $mesajaltcek['kullanici_ad']." ".$mesajaltcek['kullanici_soyad'] ?><span> Author</span></h4>
                                <span><?php echo $mesajaltcek['mesajyanit_zaman']?></span>
                                <p><?php echo $mesajaltcek['mesajyanit_detay']?></p>
                            </div> 
                        </div>

                  
                </div>

                <div class="single-item-message">
                    <ul class="pagination-profile-align-center">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul> 
                </div>
                <div class="single-item-message">
                    <h3>Leave A Comment</h3>
                    <div class="leave-comments-message">
                        <img src="img\profile\5.jpg" alt="profile" class="img-responsive">
                        <div class="leave-comments-box">
                            <textarea placeholder="Write your comment here ...*" class="textarea form-control" name="message"></textarea>
                            <button type="submit" class="update-btn">Post Comment</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="tab-pane fade" id="Reviews">
            <h3 class="title-inner-section">Customer Reviews  ( 20 )</h3>
            <div class="reviews-wrapper">
                <div class="single-item-message">
                    <div class="single-item-inner">
                        <img src="img\profile\3.jpg" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4>Richi Rose<span>WordPress</span></h4>
                            <span>2 days ago</span>
                            <p>Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1n printer took a galley.</p>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>                                                 
                    </div> 
                </div>
                <div class="single-item-message">
                    <div class="single-item-inner">
                        <img src="img\profile\4.jpg" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4>Richi Rose<span>WordPress</span></h4>
                            <span>2 days ago</span>
                            <p>Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1n printer took a galley.</p>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>                                                 
                    </div> 
                </div>
                <div class="single-item-message">
                    <div class="single-item-inner">
                        <img src="img\profile\5.jpg" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4>Richi Rose<span>WordPress</span></h4>
                            <span>2 days ago</span>
                            <p>Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1n printer took a galley.</p>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>                                                 
                    </div> 
                </div>
                <div class="single-item-message">
                    <div class="single-item-inner">
                        <img src="img\profile\6.jpg" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4>Richi Rose<span>WordPress</span></h4>
                            <span>2 days ago</span>
                            <p>Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1n printer took a galley.</p>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>                                                 
                    </div> 
                </div>
                <div class="single-item-message">
                    <div class="single-item-inner">
                        <img src="img\profile\7.jpg" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4>Richi Rose<span>WordPress</span></h4>
                            <span>2 days ago</span>
                            <p>Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1n printer took a galley.</p>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>                                                 
                    </div> 
                </div>
                <div class="single-item-message">
                    <div class="single-item-inner">
                        <img src="img\profile\8.jpg" alt="profile" class="img-responsive">
                        <div class="item-content">
                            <h4>Richi Rose<span>WordPress</span></h4>
                            <span>2 days ago</span>
                            <p>Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1n printer took a galley.</p>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>                                                 
                    </div> 
                </div>
                <div class="single-item-message">
                    <ul class="pagination-profile-align-center">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div> 
            </div> 
        </div>
        <div class="tab-pane fade" id="Followers">
            <h3 class="title-inner-section">Followers</h3>
            <div class="inner-page-main-body"> 
             <div class="row more-product-item-wrapper">
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\5.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Psdart</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\6.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">RadiusTheme</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\7.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Maxbox</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\8.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Dancty</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\9.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Austonea</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\10.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Branadom</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\11.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Grand Balle</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\12.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Akkas</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                    <div class="more-product-item">
                        <div class="more-product-item-img">
                            <img src="img\profile\13.jpg" alt="product" class="img-responsive">
                        </div>
                        <div class="more-product-item-details">
                            <h4><a href="#">Moinar ma</a></h4>
                            <div class="a-item">516 Items</div>
                            <div class="a-followers">406 Followers</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="pagination-align-left">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div>  
            </div>
        </div> 
    </div>                                        
</div> 
</div>  
</div>
</div>
</div>
<!-- Profile Page End Here -->            
<?php 
require_once 'footer.php';
?>

<script >

    /*==================== SERVICES MODAL ====================*/
    const modalViews = document.querySelectorAll('.services__modal'),
    modalBtns = document.querySelectorAll('.services__button'),
    modalCloses = document.querySelectorAll('.services__modal-close')

    let modal = function(modalClick){
        modalViews[modalClick].classList.add('active-modal')
    }

    modalBtns.forEach((modalBtn, i) => {
        modalBtn.addEventListener('click', () =>{
            modal(i)
        })
    })

    modalCloses.forEach((modalClose) =>{
        modalClose.addEventListener('click', () =>{
            modalViews.forEach((modalView) =>{
                modalView.classList.remove('active-modal')
            })
        })
    })
</script>