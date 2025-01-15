

 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <h2 style="color: white; border-left: 5px solid #8BC34A; margin-bottom: 21px; padding-bottom: 5px; padding-left: 5px; background-color: #283538;"><b style="font-size:19px;"> <span style="margin-right: 3px;" class="glyphicon glyphicon-chevron-right"></span>ÜYE İŞLEMLERİ</b></h2>

    <ul class="settings-title">  
        <li><a href="hesap-bilgileri" >Hesap Bilgilerim</a></li>
        <li><a href="siparislerim" >Siparişlerim</a></li>
        <li><a href="profil" >Profil</a></li>
        <li><a href="adres-bilgileri">Adres Bilgilerim</a></li>
        <li><a href="sifre-guncelle">Şifre Güncelleme</a></li>
        <li><a href="magaza-basvuru">Mağaza Başvurusu</a></li>
        <li><a href="gelen-mesajlar">Gelen Mesajlar</a></li>
        <li><a href="giden-mesajlar">Giden Mesajlar</a></li>
        <li><a href="#E-mail">E-mail Settings</a></li>
        <li><a href="#Social">Social Network</a></li>
    </ul>

    <?php 

    if ($kullanicicek['kullanici_magaza']==2) { ?>     

        <hr>

        <h2 style="color: white; border-left: 5px solid #8BC34A; margin-bottom: 21px; padding-bottom: 5px; padding-left: 5px; background-color: #283538;"><b style="font-size:19px;"> <span style="margin-right: 3px;" class="glyphicon glyphicon-chevron-right"></span>MAĞAZA İŞLEMLERİ</b></h2>

        <ul class="settings-title"> 
            <li><a href="magaza-profil">Mağaza</a></li>
            <li><a href="skills">Yetenekler</a></li> 
            <li><a href="badges">Rozetler</a></li>
            <li><a href="urun-ekle">Ürün Ekle</a></li>
            <li><a href="urunlerim">Ürünlerim</a></li>
            <li><a href="yeni-siparisler">Yeni Siparişler</a></li>
            <li><a href="tamamlanan-siparisler">Tamamlanan Siparişler</a></li>
            <li><a href="yorumlar">Yorumlar</a></li>
            <li><a href="#Settings">Ayarlar</a></li>
        </ul>

    <?php } ?>
</div>