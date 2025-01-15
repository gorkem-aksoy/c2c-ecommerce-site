<?php 
include 'baglan.php';


try {





    if (isset($_POST['kullaniciekle'])) {

     $kullanici_mail =$_POST['kullanici_mail'];
     $kullanici_password =md5($_POST['kullanici_password']);
     $kullanici_ad =$_POST['kullanici_ad'];
     $kullanici_soyad =$_POST['kullanici_soyad'];
     $kullanici_zaman = date('Y-m-d H:i:s');


     $kullaniciEkle = $db->prepare("EXECUTE kullaniciEkle @kullanici_mail=?, @kullanici_password=?, @kullanici_ad=?, @kullanici_soyad=?, @kullanici_yetki=?, @kullanici_zaman=?");
     $kullaniciEkle->bindParam(1, $kullanici_mail);
     $kullaniciEkle->bindParam(2, $kullanici_password);
     $kullaniciEkle->bindParam(3, $kullanici_ad);
     $kullaniciEkle->bindParam(4, $kullanici_soyad);
     $kullaniciEkle->bindParam(5, $kullanici_yetki);
     $kullaniciEkle->bindParam(6, $kullanici_zaman);
     $insert =$kullaniciEkle->execute();
     if ($insert) {

        header("Location:../../index.php?durum=kayitbasarili");
    } else {

        header("Location:../../register.php?durum=basarisiz");
    }


} 




if (isset($_POST['kullanicigiris'])) {
      // Kullanıcı girişini doğrulamak için depolanan prosedürü çağırın
    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = md5($_POST['kullanici_password']);
    $kullanici_yetki =1;

    
    $kullaniciGiris = $db->prepare("EXECUTE kullaniciGiris @kullanici_mail = :kullanici_mail, @kullanici_password = :kullanici_password , @kullanici_yetki = :kullanici_yetki");
    $kullaniciGiris->bindParam(':kullanici_mail', $kullanici_mail, PDO::PARAM_STR);
    $kullaniciGiris->bindParam(':kullanici_password', $kullanici_password, PDO::PARAM_STR);
    $kullaniciGiris->bindParam(':kullanici_yetki', $kullanici_yetki, PDO::PARAM_STR);
    


    $kullaniciGiris->execute();

    $girisSonucu = $kullaniciGiris->fetch(PDO::FETCH_ASSOC);

    if ($girisSonucu['GirisBasarili'] == 1) {
        // Giriş başarılı
        ob_start();
        session_start();
        echo $_SESSION['userkullanici_mail'] = $kullanici_mail; // Kullanıcı mailini oturum değişkenine ata
        

        header("Location:../../index.php?durum=girisbasarili");
        exit();
         //echo "basarili";
    } else {
        // Giriş başarısız
        echo "Kullanıcı adı veya şifre hatalı!";
    }
}



if (isset($_POST['kullanicibilgiguncelle'])) {
    // Depolanan prosedürü çağırma
    try {
        session_start();
        $kullanici_id = $_SESSION['userkullanici_id'];
    $kullanici_ad = $_POST['kullanici_ad']; // Kullanıcıdan alınan değer
    $kullanici_soyad = $_POST['kullanici_soyad']; // Kullanıcıdan alınan değer
    $kullanici_gsm = $_POST['kullanici_gsm']; // Kullanıcıdan alınan değer

    $sql = "EXEC kullaniciBilgiGuncelle @kullanici_id = :kullanici_id, @kullanici_ad = :kullanici_ad, @kullanici_soyad = :kullanici_soyad, @kullanici_gsm = :kullanici_gsm;";
    $bilgiGuncelle = $db->prepare($sql);
    $bilgiGuncelle->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
    $bilgiGuncelle->bindParam(':kullanici_ad', $kullanici_ad, PDO::PARAM_STR);
    $bilgiGuncelle->bindParam(':kullanici_soyad', $kullanici_soyad, PDO::PARAM_STR);
    $bilgiGuncelle->bindParam(':kullanici_gsm', $kullanici_gsm, PDO::PARAM_STR);
    $bilgiGuncelle->execute();

    if ($bilgiGuncelle) {
        header("Location:../../hesap-bilgileri.php?durum=basarili");
    }
    //echo "Kullanıcı bilgileri güncellendi.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

}




if (isset($_POST['kullaniciadresguncelle'])) {
    // Depolanan prosedürü çağırma
    try {
        session_start();
        $kullanici_id = $_SESSION['userkullanici_id'];
    $kullanici_il = $_POST['kullanici_il']; // Kullanıcıdan alınan değer
    $kullanici_ilce = $_POST['kullanici_ilce']; // Kullanıcıdan alınan değer
    $kullanici_adres = $_POST['kullanici_adres']; // Kullanıcıdan alınan değer

    $sql = "EXEC kullaniciAdresGuncelle @kullanici_id = :kullanici_id, @kullanici_il = :kullanici_il, @kullanici_ilce = :kullanici_ilce, @kullanici_adres = :kullanici_adres;";
    $adresGuncelle = $db->prepare($sql);
    $adresGuncelle->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
    $adresGuncelle->bindParam(':kullanici_il', $kullanici_il, PDO::PARAM_STR);
    $adresGuncelle->bindParam(':kullanici_ilce', $kullanici_ilce, PDO::PARAM_STR);
    $adresGuncelle->bindParam(':kullanici_adres', $kullanici_adres, PDO::PARAM_STR);
    $adresGuncelle->execute();

    if ($adresGuncelle) {
        header("Location:../../adres-bilgileri.php?durum=basarili");
    }
    //echo "Kullanıcı bilgileri güncellendi.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

}



if (isset($_POST['kullaniciresimguncelle'])) {
    // Kullanıcıdan gelen dosya bilgisini alın
    $ext=strtolower(substr($_FILES['kullanici_resim']["name"],strpos($_FILES['kullanici_resim']["name"],'.')+1));


    @$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
    @$name = $_FILES['kullanici_resim']["name"];

    $uploads_dir = '../../dimg/kullanici';
    

    $uniq=uniqid();
    $refimgyol=substr($uploads_dir, 6)."/".$uniq.".".$ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");
    
    
        // Resim dosyası başarıyla yüklendi, veritabanında güncelleme yapın
    try {
        session_start();
        $kullanici_id = $_SESSION['userkullanici_id'];

            // Saklanmış prosedürü çağırın
        $resimGuncelle = $db->prepare("EXEC kullaniciResimGuncelle @kullanici_id = :kullanici_id, @kullanici_resim = :kullanici_resim;");
        $resimGuncelle->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
        $resimGuncelle->bindParam(':kullanici_resim', $refimgyol, PDO::PARAM_STR);
        $resimGuncelle->execute();

        if ($resimGuncelle) {

            $resimsilunlink=$_POST['eski_yol'];
            unlink("../../$resimsilunlink");

            header("Location:../../profil.php?durum=basarili");

        } else {

            header("Location:../../profil.php?durum=no");

        }

    } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }

     // Bağlantıyı kapatın
    $db = null;
    
}





if (isset($_POST['kullanicisifreguncelle'])) {
    // Depolanan prosedürü çağırma
    try {
        session_start();
        $kullanici_id = $_SESSION['userkullanici_id'];
        $kullanici_passwordold = $_POST['kullanici_passwordold']; // Kullanıcıdan alınan değer
        $kullanici_passwordone = $_POST['kullanici_passwordone']; // Kullanıcıdan alınan değer
        $kullanici_passwordtwo = $_POST['kullanici_passwordtwo']; // Kullanıcıdan alınan değer

        // Şifrelerin eşleşip eşleşmediğini kontrol etme
        if ($kullanici_passwordone != $kullanici_passwordtwo) {
            header("Location:../../sifre-guncelle.php?durum=hatali");
            exit();
        }

        // Eski şifrenin doğruluğunu kontrol etme
        // Bu örnek için varsayılan olarak şifre kontrolü sağlanmamıştır.
        // Gerçek uygulamada şifre doğrulama işlemlerini yapmanız gerekmektedir.

        $password =md5($kullanici_passwordone);

        // Yeni şifreyi güncelleme
        $sql = "EXEC kullaniciSifreGuncelle @kullanici_id = :kullanici_id, @kullanici_passwordone = :kullanici_passwordone;";
        $sifreGuncelle = $db->prepare($sql);
        $sifreGuncelle->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
        $sifreGuncelle->bindParam(':kullanici_passwordone', $password, PDO::PARAM_STR);
        $sifreGuncelle->execute();

        if ($sifreGuncelle) {
            header("Location:../../sifre-guncelle.php?durum=basarili");
            exit();
        }
    } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }
}



if (isset($_POST['kullanicimagazabasvuru'])) {
    // Depolanan prosedürü çağırma
    try {
        session_start();
        $kullanici_id = $_SESSION['userkullanici_id'];
    $kullanici_magazatakmaad = $_POST['kullanici_magazatakmaad']; // Kullanıcıdan alınan değer
    $kullanici_magazaad = $_POST['kullanici_magazaad']; // Kullanıcıdan alınan değer
    $kullanici_magazatanitim = $_POST['kullanici_magazatanitim']; // Kullanıcıdan alınan değer
    $kullanici_tip = $_POST['kullanici_tip'];
    $kullanici_tc = $_POST['kullanici_tc'];
    $kullanici_ad = $_POST['kullanici_ad'];
    $kullanici_soyad = $_POST['kullanici_soyad'];
    $kullanici_adres = $_POST['kullanici_adres'];
    $kullanici_il = $_POST['kullanici_il'];
    $kullanici_ilce = $_POST['kullanici_ilce'];    
    $kullanici_gsm = $_POST['kullanici_gsm'];
    $kullanici_iban = $_POST['kullanici_iban'];
    $kullanici_banka = $_POST['kullanici_banka'];
    $kullanici_magaza = 1;

    $sql = "EXEC kullaniciMagazaBasvuru @kullanici_id = :kullanici_id, @kullanici_magazatakmaad = :kullanici_magazatakmaad, @kullanici_magazaad = :kullanici_magazaad, @kullanici_magazatanitim = :kullanici_magazatanitim ,@kullanici_tip = :kullanici_tip ,@kullanici_tc = :kullanici_tc ,@kullanici_ad = :kullanici_ad ,@kullanici_soyad = :kullanici_soyad ,@kullanici_adres = :kullanici_adres ,@kullanici_il = :kullanici_il ,@kullanici_ilce = :kullanici_ilce ,@kullanici_gsm = :kullanici_gsm ,@kullanici_iban = :kullanici_iban ,@kullanici_banka = :kullanici_banka ,@kullanici_magaza = :kullanici_magaza;";
    $magazaBasvuru = $db->prepare($sql);
    $magazaBasvuru->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
    $magazaBasvuru->bindParam(':kullanici_magazatakmaad', $kullanici_magazatakmaad, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_magazaad', $kullanici_magazaad, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_magazatanitim', $kullanici_magazatanitim, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_tip', $kullanici_tip, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_tc', $kullanici_tc, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_ad', $kullanici_ad, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_soyad', $kullanici_soyad, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_adres', $kullanici_adres, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_il', $kullanici_il, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_ilce', $kullanici_ilce, PDO::PARAM_STR); 
    $magazaBasvuru->bindParam(':kullanici_gsm', $kullanici_gsm, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_iban', $kullanici_iban, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_banka', $kullanici_banka, PDO::PARAM_STR);
    $magazaBasvuru->bindParam(':kullanici_magaza', $kullanici_magaza, PDO::PARAM_STR);
    $magazaBasvuru->execute();

    if ($magazaBasvuru) {
        header("Location:../../magaza-basvuru.php?durum=basarili");
    }
    //echo "Kullanıcı bilgileri güncellendi.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}
}


;



if (isset($_POST['kullaniciadmingiris'])) {
      // Kullanıcı girişini doğrulamak için depolanan prosedürü çağırın
    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = md5($_POST['kullanici_password']);
    $kullanici_yetki =5;

    
    $kullaniciAdminGiris = $db->prepare("EXECUTE kullaniciAdminGiris @kullanici_mail = :kullanici_mail, @kullanici_password = :kullanici_password , @kullanici_yetki = :kullanici_yetki");
    $kullaniciAdminGiris->bindParam(':kullanici_mail', $kullanici_mail, PDO::PARAM_STR);
    $kullaniciAdminGiris->bindParam(':kullanici_password', $kullanici_password, PDO::PARAM_STR);
    $kullaniciAdminGiris->bindParam(':kullanici_yetki', $kullanici_yetki, PDO::PARAM_STR);
    


    $kullaniciAdminGiris->execute();

    $girisSonucu = $kullaniciAdminGiris->fetch(PDO::FETCH_ASSOC);

    if ($girisSonucu['GirisBasarili'] == 1) {
        // Giriş başarılı
        ob_start();
        session_start();
        echo $_SESSION['useradmin_mail'] = $kullanici_mail; // Kullanıcı mailini oturum değişkenine ata
        

        header("Location:../production/index.php?durum=girisbasarili");
        exit();
         //echo "basarili";
    } else {
        // Giriş başarısız
        echo "Kullanıcı adı veya şifre hatalı!";
    }
}





if (isset($_GET['basvuru'])) {

    if ($_GET['basvuru']=="onay") {
    // Depolanan prosedürü çağırma
        try {

            $kullanici_id = $_GET['kullanici_id'];
    $kullanici_magaza = 2; // Kullanıcıdan alınan değer
    

    $sql = "EXEC kullaniciMagazaOnay @kullanici_id = :kullanici_id, @kullanici_magaza = :kullanici_magaza";
    $magazaOnay = $db->prepare($sql);
    $magazaOnay->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
    $magazaOnay->bindParam(':kullanici_magaza', $kullanici_magaza, PDO::PARAM_STR);
    $magazaOnay->execute();

    if ($magazaOnay) {

        header("Location:../production/magazalar?durum=ok");
    }
    
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

}
}



if (isset($_POST['kategoriekle'])) {


    $kategori_ad =$_POST['kategori_ad'];
    $kategori_sira =$_POST['kategori_sira'];
    $kategori_durum =$_POST['kategori_durum'];


    $kategoriEkle = $db->prepare("EXECUTE kategoriEkle @kategori_ad=?, @kategori_sira=?, @kategori_durum=?");
    $kategoriEkle->bindParam(1, $kategori_ad);
    $kategoriEkle->bindParam(2, $kategori_sira);
    $kategoriEkle->bindParam(3, $kategori_durum);
    $insert =$kategoriEkle->execute();
    if ($insert) {

        header("Location:../production/kategori.php?durum=kayitbasarili");
    } else {

        header("Location:../production/kategori-ekle.php?durum=basarisiz");
    }


}






if (isset($_POST['magazaurunekle'])) {

    try {

       $ext_urunfoto = strtolower(substr($_FILES['urunfoto_resimyol']["name"], strrpos($_FILES['urunfoto_resimyol']["name"], '.') + 1));

       $tmp_name_urunfoto = $_FILES['urunfoto_resimyol']["tmp_name"];
       $name_urunfoto = $_FILES['urunfoto_resimyol']["name"];

       $ext_urun_dosya = strtolower(substr($_FILES['urun_dosya']["name"], strrpos($_FILES['urun_dosya']["name"], '.') + 1));

       $tmp_name_urun_dosya = $_FILES['urun_dosya']["tmp_name"];
       $name_urun_dosya = $_FILES['urun_dosya']["name"];

       $uploads_dir_urunfoto = '../../dimg/urun';

       $uploads_dir_urun_dosya = '../../dfile/urun';


       $uniq_urunfoto = uniqid();
       $refimgyol_urunfoto = substr($uploads_dir_urunfoto, 6) . "/" . $uniq_urunfoto . "." . $ext_urunfoto;

       $uniq_urun_dosya = uniqid();
       $reffileyol_urun_dosya = substr($uploads_dir_urun_dosya, 6) . "/" . $uniq_urun_dosya . "." . $ext_urun_dosya;

       move_uploaded_file($tmp_name_urunfoto, "$uploads_dir_urunfoto/$uniq_urunfoto.$ext_urunfoto");
       move_uploaded_file($tmp_name_urun_dosya, "$uploads_dir_urun_dosya/$uniq_urun_dosya.$ext_urun_dosya");


       ob_start();
       session_start();
       $kullanici_id =$_SESSION['userkullanici_id'];
       $kategori_id =$_POST['kategori_id'];
       $urun_ad =$_POST['urun_ad'];
       $urun_keyword =$_POST['urun_keyword'];
       $urun_detay =$_POST['urun_detay'];
       $urun_fiyat =$_POST['urun_fiyat'];
       $urun_onecikar=1;
       $urun_zaman = date('Y-m-d H:i:s');


       $urunEkle = $db->prepare("EXECUTE magazaUrunEkle @urunfoto_resimyol=?, @kullanici_id=?, @kategori_id=?, @urun_ad=?, @urun_keyword=?, @urun_detay=? , @urun_fiyat=?, @urun_onecikar=?, @urun_dosya=?, @urun_zaman=?");
       $urunEkle->bindParam(1, $refimgyol_urunfoto);
       $urunEkle->bindParam(2, $kullanici_id);
       $urunEkle->bindParam(3, $kategori_id);
       $urunEkle->bindParam(4, $urun_ad);
       $urunEkle->bindParam(5, $urun_keyword);
       $urunEkle->bindParam(6, $urun_detay);
       $urunEkle->bindParam(7, $urun_fiyat);
       $urunEkle->bindParam(8, $urun_onecikar);
       $urunEkle->bindParam(9, $reffileyol_urun_dosya);
       $urunEkle->bindParam(10, $urun_zaman);
       $insert =$urunEkle->execute();
       if ($insert) {

        header("Location:../../urunlerim.php?durum=basarili");
    } else {

        header("Location:../../urun-ekle.php?durum=basarisiz");
    }

} catch (Exception $e) {

    echo "Hata oluştu: " . $e->getMessage();

}


}



if (isset($_POST['magazaurunguncelle'])) {

    $ext_urunfoto = strtolower(substr($_FILES['urunfoto_resimyol']["name"], strrpos($_FILES['urunfoto_resimyol']["name"], '.') + 1));

    $tmp_name_urunfoto = $_FILES['urunfoto_resimyol']["tmp_name"];
    $name_urunfoto = $_FILES['urunfoto_resimyol']["name"];

    $ext_urun_dosya = strtolower(substr($_FILES['urun_dosya']["name"], strrpos($_FILES['urun_dosya']["name"], '.') + 1));

    $tmp_name_urun_dosya = $_FILES['urun_dosya']["tmp_name"];
    $name_urun_dosya = $_FILES['urun_dosya']["name"];

    $uploads_dir_urunfoto = '../../dimg/urun';

    $uploads_dir_urun_dosya = '../../dfile/urun';

    if (!empty($tmp_name_urunfoto)) {
       $uniq_urunfoto = uniqid();
       $refimgyol_urunfoto = substr($uploads_dir_urunfoto, 6) . "/" . $uniq_urunfoto . "." . $ext_urunfoto;
       move_uploaded_file($tmp_name_urunfoto, "$uploads_dir_urunfoto/$uniq_urunfoto.$ext_urunfoto");
   } else {
        $refimgyol_urunfoto = $_POST['eski_imgyol']; // Resim yüklenmediyse, mevcut yolunu kullanın
    }

    if (!empty($tmp_name_urun_dosya)) {
       $uniq_urun_dosya = uniqid();
       $reffileyol_urun_dosya = substr($uploads_dir_urun_dosya, 6) . "/" . $uniq_urun_dosya . "." . $ext_urun_dosya;
       move_uploaded_file($tmp_name_urun_dosya, "$uploads_dir_urun_dosya/$uniq_urun_dosya.$ext_urun_dosya");
   } else {
        $reffileyol_urun_dosya = $_POST['eski_fileyol']; // Resim yüklenmediyse, mevcut yolunu kullanın
    }

    
        // Resim dosyası başarıyla yüklendi, veritabanında güncelleme yapın
    try {

        $urun_id =$_POST['urun_id'];
        

            // Saklanmış prosedürü çağırın
        $urunGuncelle = $db->prepare("EXEC magazaUrunGuncelle @urunfoto_resimyol = :urunfoto_resimyol, @kategori_id = :kategori_id, @urun_id = :urun_id, @urun_ad = :urun_ad, @urun_keyword = :urun_keyword, @urun_detay = :urun_detay, @urun_fiyat = :urun_fiyat, @urun_dosya = :urun_dosya;");
        $urunGuncelle->bindParam(1, $refimgyol_urunfoto);
        $urunGuncelle->bindParam(2, $_POST['kategori_id']);
        $urunGuncelle->bindParam(3, $urun_id);
        $urunGuncelle->bindParam(4, $_POST['urun_ad']);
        $urunGuncelle->bindParam(5, $_POST['urun_keyword']);
        $urunGuncelle->bindParam(6, $_POST['urun_detay']);
        $urunGuncelle->bindParam(7, $_POST['urun_fiyat']);
        $urunGuncelle->bindParam(8, $reffileyol_urun_dosya);
        $urunGuncelle->execute();


        if ($urunGuncelle) {
             // Eski resmi silin
            if (!empty($tmp_name_urunfoto)) {
                $resimsilunlink = $_POST['eski_imgyol'];
                unlink("../../$resimsilunlink");
            }

            if (!empty($tmp_name_urun_dosya)) {
                $filesilunlink = $_POST['eski_fileyol'];
                unlink("../../$filesilunlink");
            }

            header("Location:../../urunlerim.php?durum=basarili");
        } else {

            header("Location:../../urun-duzenle.php?durum=no&urun_id=$urun_id");

        }


        
    } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }

    // Bağlantıyı kapatın
    $db = null;
    
}





if (isset($_POST['adminurunguncelle'])) {

    try {

        $urun_id =$_POST['urun_id'];
        $urun_durum =$_POST['urun_durum'];
        

            // Saklanmış prosedürü çağırın
        $urunGuncelle = $db->prepare("EXEC adminUrunGuncelle @urun_durum = :urun_durum, @urun_id = :urun_id");
        $urunGuncelle->bindParam(1, $urun_durum);
        $urunGuncelle->bindParam(2, $urun_id);
        
        $urunGuncelle->execute();


        if ($urunGuncelle) {

            header("Location:../production/urun.php?durum=basarili");
        } else {

            header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");

        }


        
    } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }

    // Bağlantıyı kapatın
    $db = null;
    
}






if (isset($_POST['kullanicimesajgonder'])) {

    try {




       ob_start();
       session_start();
       $kullanici_alan=$_POST['kullanici_alan'];
       $kullanici_gonderen=$_SESSION['userkullanici_id'];
       $mesaj_detay=$_POST['mesaj_detay'];
       $mesaj_zaman=date('Y-m-d H:i:s');
       $gelen_url=$_POST['gelen_url'];


       $mesajGon = $db->prepare("EXECUTE kullaniciMesajGonder @kullanici_alan=?, @kullanici_gonderen=?, @mesaj_detay=?, @mesaj_zaman=?");
       $mesajGon->bindParam(1, $kullanici_alan);
       $mesajGon->bindParam(2, $kullanici_gonderen);
       $mesajGon->bindParam(3, $mesaj_detay);
       $mesajGon->bindParam(4, $mesaj_zaman);

       $insert =$mesajGon->execute();
       if ($insert) {

        header("Location:$gelen_url?durum=basarili");
    } else {

        header("Location:$gelen_url?durum=basarisiz");
    }

} catch (Exception $e) {

    echo "Hata oluştu: " . $e->getMessage();

}


}





if (isset($_POST['kullanicimesajyanitla'])) {

    try {


       ob_start();
       session_start();
       $kullanici_alan=$_POST['kullanici_gonderen'];
       $kullanici_gonderen=$_SESSION['userkullanici_id'];
       $mesaj_detay=$_POST['mesaj_detay'];
       $mesaj_zaman=date('Y-m-d H:i:s');
       $gelen_url=$_POST['gelen_url'];


       $mesajGon = $db->prepare("EXECUTE kullaniciMesajYanitla @kullanici_alan=?, @kullanici_gonderen=?, @mesaj_detay=?, @mesaj_zaman=?");
       $mesajGon->bindParam(1, $kullanici_alan);
       $mesajGon->bindParam(2, $kullanici_gonderen);
       $mesajGon->bindParam(3, $mesaj_detay);
       $mesajGon->bindParam(4, $mesaj_zaman);

       $insert =$mesajGon->execute();
       if ($insert) {

        header("Location:../../giden-mesajlar.php?durum=basarili");
    } else {

        header("Location:../../giden-mesajlar.php?durum=no");
    }

} catch (Exception $e) {

    echo "Hata oluştu: " . $e->getMessage();

}


}





if (isset($_POST['urunsipariskaydet'])) {

    try {


       ob_start();
       session_start();
       $kullanici_idsatici=$_POST['kullanici_idsatici'];
       $kullanici_id=$_SESSION['userkullanici_id'];
       $siparis_zaman =date('Y-m-d H:i:s');



       $siparisKaydet = $db->prepare("EXECUTE urunSiparisKaydet @kullanici_id=?, @kullanici_idsatici=?, @siparis_zaman=?");
       $siparisKaydet->bindParam(1, $kullanici_id);
       $siparisKaydet->bindParam(2, $kullanici_idsatici);
       $siparisKaydet->bindParam(3, $siparis_zaman);


       $insert =$siparisKaydet->execute();
       if ($insert) {


           $kullanici_idsatici=$_POST['kullanici_idsatici'];
           $kullanici_id=$_SESSION['userkullanici_id'];
           $siparis_id=$db->lastInsertId();
           $urun_id=$_POST['urun_id'];
           $urun_fiyat=$_POST['urun_fiyat'];
           $siparisdetay_onay=0;



           $siparisDetayKaydet = $db->prepare("EXECUTE urunSiparisDetayKaydet @siparis_id=?, @kullanici_id=?, @kullanici_idsatici=?, @urun_id=?, @urun_fiyat=?, @siparisdetay_onay=?");
           $siparisDetayKaydet->bindParam(1, $siparis_id);
           $siparisDetayKaydet->bindParam(2, $kullanici_id);
           $siparisDetayKaydet->bindParam(3, $kullanici_idsatici);
           $siparisDetayKaydet->bindParam(4, $urun_id);
           $siparisDetayKaydet->bindParam(5, $urun_fiyat);
           $siparisDetayKaydet->bindParam(6, $siparisdetay_onay);



           $dinsert =$siparisDetayKaydet->execute();

           if ($dinsert) {
            header("Location:../../siparislerim.php?durum=ok");
        } else{
            header("Location:../../404");
        }
    } else {

        header("Location:../../odeme.php?durum=basarisiz");
    }

} catch (Exception $e) {

    echo "Hata oluştu: " . $e->getMessage();

}


}



if (isset($_GET['siparisteslim'])) {

    if ($_GET['siparisteslim']=="ok") {
    // Depolanan prosedürü çağırma
        try {

            $siparis_id =$_GET['siparis_id'];
            $siparisdetay_id =$_GET['siparisdetay_id'];
            $siparisdetay_onay = 1; 


            $sql = "EXEC siparisTeslim @siparisdetay_id = :siparisdetay_id, @siparisdetay_onay = :siparisdetay_onay";
            $siparisTeslim = $db->prepare($sql);
            $siparisTeslim->bindParam(1, $siparisdetay_id);
            $siparisTeslim->bindParam(2, $siparisdetay_onay);
            
            $siparisTeslim->execute();

            if ($siparisTeslim) {

                header("Location:../../yeni-siparis-detay?siparis_id=$siparis_id&durum=ok");
            }

        } catch (PDOException $e) {
            echo "Hata oluştu: " . $e->getMessage();
        }

    }
}




if (isset($_GET['siparisonay'])) {

    if ($_GET['siparisonay']=="ok") {
    // Depolanan prosedürü çağırma
        try {

            $siparis_id =$_GET['siparis_id'];
            $siparisdetay_id =$_GET['siparisdetay_id'];
            $siparisdetay_onay = 2; 


            $sql = "EXEC siparisOnay @siparisdetay_id = :siparisdetay_id, @siparisdetay_onay = :siparisdetay_onay";
            $siparisOnay = $db->prepare($sql);
            $siparisOnay->bindParam(1, $siparisdetay_id);
            $siparisOnay->bindParam(2, $siparisdetay_onay);
            
            $siparisOnay->execute();

            if ($siparisOnay) {

               $siparisguncelle =$db ->prepare("UPDATE siparis SET 

                siparis_odeme =:siparis_odeme

                where siparis_id={$siparis_id}");

               $update =$siparisguncelle ->execute(array(

                'siparis_odeme' =>1

            ));

               header("Location:../../siparis-detay?siparis_id=$siparis_id&durum=ok");

           }

       } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }

}
}





if (isset($_POST['urunyorumpuankaydet'])) {

    try {


       ob_start();
       session_start();
       $yorum_detay=$_POST['yorum_detay'];
       $yorum_puan=$_POST['yorum_puan'];
       $urun_id=$_POST['urun_id'];
       $kullanici_id=$_SESSION['userkullanici_id'];
       $yorum_zaman =date('Y-m-d H:i:s');



       $siparisKaydet = $db->prepare("EXECUTE urunYorumPuanKaydet @yorum_detay=?, @yorum_puan=?, @urun_id=?, @kullanici_id=?, @yorum_zaman=?");
       $siparisKaydet->bindParam(1, $yorum_detay);
       $siparisKaydet->bindParam(2, $yorum_puan);
       $siparisKaydet->bindParam(3, $urun_id);
       $siparisKaydet->bindParam(4, $kullanici_id);
       $siparisKaydet->bindParam(5, $yorum_zaman);


       $insert =$siparisKaydet->execute();
       if ($insert) {

        $siparisguncelle =$db ->prepare("UPDATE siparis_detay SET

            siparisdetay_yorum =:siparisdetay_yorum

            where siparisdetay_id={$_POST['siparisdetay_id']}");

        $update =$siparisguncelle ->execute(array(

            'siparisdetay_yorum' =>1

        ));


        header("Location:../../siparis-detay?siparis_id=$siparis_id&durum=ok"); 
    } else {

        header("Location:../../siparis-detay?siparis_id=$siparis_id&durum=no");
    }

} catch (Exception $e) {

    echo "Hata oluştu: " . $e->getMessage();

}


}

//yorum onay

try {
    $sql = "
    CREATE PROCEDURE kullaniciMagazaOnay
    @kullanici_id INT,
    @kullanici_magaza NVARCHAR(250)
    AS
    BEGIN
    UPDATE kullanici
    SET kullanici_magaza = @kullanici_magaza
    WHERE kullanici_id = @kullanici_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}


//yorum onay


















} catch (PDOException $e) {
    die("Sorgu hatası: " . $e->getMessage());
}




?>
