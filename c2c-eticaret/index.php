<?php include 'header.php'; ?>
<!-- Main Banner 1 Area Start Here -->
<div class="main-banner2-area">
    <div class="container">
        <div class="main-banner2-wrapper">                       
            <h1>Welcome To Foxtar Market Place!</h1>
            <p>Premium WordPress Themes, Web Templates and Many More ...</p>
            <div class="banner-search-area input-group">
                <input class="form-control" placeholder="Search Your Keywords . . ." type="text">
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Main Banner 1 Area End Here -->            
<!-- Newest Products Area Start Here -->
<div class="newest-products-area bg-secondary section-space-default">                
    <div class="container">
        <h2 class="title-default">Let's Check Out Our Newest Release Prodcuts</h2>  
    </div>

    <div class="container-fluid" id="isotope-container">
        <div class="isotope-classes-tab isotop-box-btn-white"> 




            <a href="#" data-filter=".wordpress" class="current">WordPress</a>
            <a href="#" data-filter=".web" class="current">Web Yazılım</a>
            <a href="#" data-filter=".eticaret" class="current">E-Ticaret</a>
            <a href="#" data-filter=".mobil" class="current">Mobil</a>
            <a href="#" data-filter=".masaustu" class="current">Masaüstü</a>
        </div>
        <div class="row featuredContainer">

         <?php 

      

        try {



   
    $urunListele = $db->prepare("SELECT * FROM urun where urun_durum=:durum");
    $urunListele->execute(array(

        'durum' => 1
        

    ));

    // Sonuçları alıp ekrana yazdırma
    while ($urunCek = $urunListele->fetch(PDO::FETCH_ASSOC)) { 


        $kullanici_id=$urunCek['kullanici_id'];

            $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id ");
            $kullanicisor->execute(array(

                'id' => $kullanici_id
            ));



            $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


            $kategori_altid=$urunCek['kategori_id'];

            $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id ");
            $kategorisor->execute(array(

                'id' => $kategori_altid
            ));



            $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);



        ?>



        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wordpress">
            <div class="single-item-grid">
                <div class="item-img">
                    <a href="urun-<?=seo($urunCek['urun_ad']." ".$urunCek['urun_id']) ?>"><img src="<?php echo $urunCek['urunfoto_resimyol'] ?>" alt="product" class="img-responsive"></a>
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="urun-<?=seo($urunCek['urun_ad']." ".$urunCek['urun_id']) ?>"><?php echo $urunCek['urun_ad'] ?></a></h3>
                        <span><a style="color: #8BC396;" href="kategori-<?=seo($kategoricek['kategori_ad']." ".$kategoricek['kategori_id']) ?>"><?php echo $kategoricek['kategori_ad'] ?></a></span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img style="width: 36px;" src="<?php echo $kullanicicek['kullanici_resim'] ?>" alt="profile" class="img-responsive img-circle"></div>

                            <span> <a style="color: #475A68;"  href="magaza-<?=seo($kullanicicek['kullanici_magazatakmaad']." ".$kullanicicek['kullanici_id']) ?>"><?php echo substr($kullanicicek['kullanici_magazatakmaad'], 0,7) ?></a></span>     

                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    <?php     }
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>  


</div>
<div class="container">
    <ul class="btn-area">
        <li class="hvr-bounce-to-right"><a href="#">Yeni Eklenenler</a></li>
        <li class="hvr-bounce-to-left"><a href="#">Öne Çıkanlar</a></li>
        <li class="hvr-bounce-to-left"><a href="kategori-urun">Tüm Ürünler</a></li>
    </ul>
</div>
</div>


</div>
<!-- Newest Products Area End Here -->
<!-- Trending Products Area Start Here -->
<div class="trending-products-area section-space-default">                
    <div class="container">
        <h2 class="title-default">This Week Trending Products</h2>  
    </div>
    <div class="container=fluid">
        <div class="fox-carousel dot-control-textPrimary" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="3" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="4" data-r-large-nav="false" data-r-large-dots="true">
            <div class="single-item-grid">
                <div class="item-img">
                    <img src="img\product\20.jpg" alt="product" class="img-responsive">
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="#">Team Component Pro</a></h3>
                        <span>Joomla Component</span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                            <span>PsdBosS</span>
                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item-grid">
                <div class="item-img">
                    <img src="img\product\21.jpg" alt="product" class="img-responsive">
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="#">Team Component Pro</a></h3>
                        <span>Joomla Component</span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                            <span>PsdBosS</span>
                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item-grid">
                <div class="item-img">
                    <img src="img\product\22.jpg" alt="product" class="img-responsive">
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="#">Team Component Pro</a></h3>
                        <span>Joomla Component</span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                            <span>PsdBosS</span>
                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item-grid">
                <div class="item-img">
                    <img src="img\product\23.jpg" alt="product" class="img-responsive">
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="#">Team Component Pro</a></h3>
                        <span>Joomla Component</span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                            <span>PsdBosS</span>
                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item-grid">
                <div class="item-img">
                    <img src="img\product\20.jpg" alt="product" class="img-responsive">
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="#">Team Component Pro</a></h3>
                        <span>Joomla Component</span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                            <span>PsdBosS</span>
                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item-grid">
                <div class="item-img">
                    <img src="img\product\21.jpg" alt="product" class="img-responsive">
                    <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="#">Team Component Pro</a></h3>
                        <span>Joomla Component</span>
                        <div class="price">$15</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                            <span>PsdBosS</span>
                        </div>
                        <div class="profile-rating">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Products Area End Here -->
<!-- Why Choose Area Start Here -->
<div class="why-choose-area bg-primaryText section-space-default">                
    <div class="container">
        <h2 class="title-textPrimary">Why You Choose Foxtar Market Place?</h2>  
    </div>
    <div class="container">
        <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="why-choose-box">
                <a href="#"><i class="fa fa-gift" aria-hidden="true"></i></a>
                <h3><a href="#">Easily Buy & Sell </a></h3>
                <p>Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has been the industry's standaum.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="why-choose-box">
                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                <h3><a href="#">Quality Products</a></h3>
                <p>Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has been the industry's standaum.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="why-choose-box">
                <a href="#"><i class="fa fa-lock" aria-hidden="true"></i></a>
                <h3><a href="#">100% Secure Payment</a></h3>
                <p>Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has been the industry's standaum.</p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Why Choose Area End Here -->

<!-- Author Banner Area Start Here -->
<div class="author-banner-area">
    <div class="author-banner-wrapper">
        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
            <ul class="ri-grid-list">
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\4.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\4.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>                            
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
            </ul>
        </div>
        <div class="author-banner-content">
            <ul>
                <li><p>Over <span> 20,000</span> Author Are Involved Here!</p></li>
                <li><a href="#" class="btn-fill-textPrimary">Become A Author</a></li>
            </ul>
        </div>
    </div>               
</div>
<!-- Author Banner Area End Here -->            

<?php include 'footer.php'; ?>

