<?php require_once 'header.php'; 


$urunsor=$db->prepare("SELECT urun.*,kullanici.* FROM urun INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id where urun_id=:id");
$urunsor->execute(array(
    'id' => $_GET['urun_id']
));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);


?>
<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">
    <div class="container">
        <div class="inner-banner-wrapper">
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
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Product Details Page Start Here -->
<div class="product-details-page bg-secondary">                
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                <div class="inner-page-main-body">

                    <div class="single-banner">
                        <img src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="product" class="img-responsive">
                    </div> 


                    <h2 class="title-inner-default"><?php echo $uruncek['urun_ad'] ?></h2>
                    <p class="para-inner-default">Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Illum, rerum eaque libero corporis, laboriosam error blanditiis expedita recusandae debitis molestias tempora esse quibusdam modi in amet ipsum quidem, repellat veritatis.</p>
                    <div class="product-tag-line">
                        <ul class="product-tag-item">
                            <li><a href="#">Live Preview</a></li>
                            <li><a href="#">Screenshots</a></li>
                            <li><a href="#">Documentation</a></li>
                        </ul>
                        <ul class="social-default">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-details-tab-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="product-details-title">
                                    <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Item Features</a></li>
                                    <li><a href="#contact" data-toggle="tab" aria-expanded="false">İletişim</a></li>
                                    <li><a href="#review" data-toggle="tab" aria-expanded="false">Yorumlar</a></li>
                                    
                                </ul>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="description">
                                        <ul class="product-details-content">
                                            <li>Printing and typesetting industry</li>
                                            <li>Printing and typesetting industry</li>
                                            <li>Bhen an unknown printe</li>
                                            <li>Bhen an unknown printe</li>
                                            <li>Handard dummy text</li>
                                            <li>Handard dummy text</li>
                                            <li>Desktop publishing software</li>
                                            <li>Bhen an unknown printe</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="contact">
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt rerum necessitatibus corporis tempore, quam labore animi esse quae laboriosam voluptates maxime magni quod tempora deleniti blanditiis vitae quaerat. Excepturi, saepe?</p>                      
                                    </div>
                                    <div class="tab-pane fade" id="review">
                                        


                                        
                                    </div>                                          
                            </div>
                        </div>
                    </div>
                </div> 
                <h3 class="title-inner-section">More Product by PsdBosS</h3>                               
                <div class="row more-product-item-wrapper">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img src="img\product\more1.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#">Grand Ballet - Dance</a></h4>
                                <div class="p-title">PSD Template</div>
                                <div class="p-price">$12</div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img src="img\product\more2.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#">Grand Ballet - Dance</a></h4>
                                <div class="p-title">PSD Template</div>
                                <div class="p-price">$20</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img src="img\product\more3.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#">Grand Ballet - Dance</a></h4>
                                <div class="p-title">PSD Template</div>
                                <div class="p-price">$49</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img src="img\product\more4.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#">Grand Ballet - Dance</a></h4>
                                <div class="p-title">PSD Template</div>
                                <div class="p-price">$18</div>
                            </div>
                        </div>
                    </div>                                  
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img src="img\product\more5.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#">Grand Ballet - Dance</a></h4>
                                <div class="p-title">PSD Template</div>
                                <div class="p-price">$59</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <div class="more-product-item">
                            <div class="more-product-item-img">
                                <img src="img\product\more6.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="more-product-item-details">
                                <h4><a href="#">Grand Ballet - Dance</a></h4>
                                <div class="p-title">PSD Template</div>
                                <div class="p-price">$48</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="fox-sidebar">
                <div class="sidebar-item">
                    <div class="sidebar-item-inner">
                        <h3 class="sidebar-item-title">Ürün Fiyatı</h3>
                        <ul class="sidebar-product-price">
                            <li><?php echo $uruncek['urun_fiyat'] ?><span>₺</span></li>
                            <li>
                                <form id="personal-info-form">
                                    <div class="custom-select">
                                        <select id="categories" class='select2'>
                                            <option value="0">Bronz</option>
                                            <option value="1">Altın</option>
                                            <option value="2">Platin</option>
                                        </select>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="sidebar-product-btn">

                            <?php 

                            if ($_SESSION['userkullanici_id']==$uruncek['kullanici_id']) { ?>


                             <li><a href="javascript:void(0)" class="add-to-favourites-btn" id="favourites-button"><i class="fa fa-heart-o" aria-hidden="true"></i> Kendi Ürününüz</a></li>



                         <?php } else { ?>


                           <li><a href="#" class="add-to-favourites-btn" id="favourites-button"><i class="fa fa-heart-o" aria-hidden="true"></i> Favorilere Ekle</a></li>
                           <form action="odeme" method="POST">
                            <li><button type="submit" class="buy-now-btn" id="buy-button">Satın Al</button></li>
                            <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
                        </form>

                    <?php } ?>


                </ul>
            </div>
        </div>                                
        <div class="sidebar-item">
            <div class="sidebar-item-inner">
                <ul class="sidebar-sale-info">
                    <li><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
                    <li>

                        <?php


                        $satissay=$db->prepare("SELECT count(urun_id) as say FROM siparis_detay where urun_id=:urun_id ");
                        $satissay->execute(array(

                            'urun_id' =>$_GET['urun_id']

                        ));

                        $saycek =$satissay ->fetch(PDO::FETCH_ASSOC);

                        echo $saycek['say'];



                        ?>

                    </li>
                    <li>Satış</li>                                           
                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <div class="sidebar-item-inner">
                <h3 class="sidebar-item-title">Product Information</h3>
                <ul class="sidebar-product-info">
                    <li>Released On:<span> 1 January, 2016</span></li>
                    <li>Last Update:<span> 20 April, 2016</span></li>
                    <li>Download:<span> 613</span></li>
                    <li>Version:<span> 1.1</span></li>
                    <li>Compatibility:<span> Wordpress 4+</span></li>
                    <li>Compatible Browsers:<span> IE9, IE10, IE11, Firefox, Safari, Opera, Chrome</span></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <div class="sidebar-item-inner">
                <h3 class="sidebar-item-title">Ürün Sahibi</h3>
                <div class="sidebar-author-info">
                    <img width="80" src="<?php echo $uruncek['kullanici_resim'] ?>" alt="product" class="img-responsive">
                    <div class="sidebar-author-content">
                        <h3><?php echo $uruncek['kullanici_magazaad'] ?></h3>
                        <a href="magaza-<?=seo($uruncek['kullanici_magazatakmaad']." ".$uruncek['kullanici_id']) ?>" class="view-profile">Mağaza Profili</a>
                    </div>
                </div>
                <ul class="sidebar-badges-item">
                    <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                    <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>
                    <li><img src="img\profile\badges3.png" alt="badges" class="img-responsive"></li>
                    <li><img src="img\profile\badges4.png" alt="badges" class="img-responsive"></li>
                    <li><img src="img\profile\badges5.png" alt="badges" class="img-responsive"></li>
                </ul>
            </div>
        </div>
    </div>
</div>                        
</div>
</div>
</div>
<!-- Product Details Page End Here -->
<?php require_once 'footer.php'; ?>