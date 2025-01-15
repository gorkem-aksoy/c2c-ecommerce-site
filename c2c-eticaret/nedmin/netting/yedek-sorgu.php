<?php


    // kullanici ekle

try {

   $kullaniciEkle = $db->prepare("
    CREATE PROCEDURE kullaniciEkle
    @kullanici_mail NVARCHAR(250),
    @kullanici_password NVARCHAR(250),
    @kullanici_ad NVARCHAR(250),
    @kullanici_soyad NVARCHAR(250),
    @kullanici_yetki NVARCHAR(250),
    @kullanici_zaman DATETIME
    AS
    BEGIN
    SET NOCOUNT ON;

    INSERT INTO kullanici (kullanici_mail, kullanici_password, kullanici_ad, kullanici_soyad, kullanici_yetki ,kullanici_zaman)
    VALUES (@kullanici_mail, @kullanici_password, @kullanici_ad, @kullanici_soyad, 1, GETDATE())
    END
    ");

   $kullaniciEkle->execute();

        // kullanici ekle


        // kullanici giriş
   $kullaniciGiris = $db->prepare("
       CREATE PROCEDURE kullaniciGiris
       @kullanici_mail NVARCHAR(250),
       @kullanici_password NVARCHAR(250),
       @kullanici_yetki NVARCHAR(250)

       AS
       BEGIN
       SET NOCOUNT ON;

    -- Kullanıcı adı ve şifreyi doğrula
    IF EXISTS (SELECT 1 FROM kullanici WHERE kullanici_mail = @kullanici_mail and kullanici_password = @kullanici_password and kullanici_yetki = @kullanici_yetki)
    BEGIN
        SELECT 1 AS GirisBasarili; -- Giriş başarılı ise 1 döndür
        
        END
        ELSE
        BEGIN
        SELECT 0 AS GirisBasarili; -- Giriş başarısız ise 0 döndür
        END
        END
        ");

   $kullaniciGiris->execute();

    // kullanici giriş


    // Bilgi Güncelle
   try {
    $sql = "
    CREATE PROCEDURE kullaniciBilgiGuncelle
    @kullanici_id INT,
    @kullanici_ad NVARCHAR(250),
    @kullanici_soyad NVARCHAR(250),
    @kullanici_gsm NVARCHAR(250)
    AS
    BEGIN
    UPDATE Kullanici
    SET kullanici_ad = @kullanici_ad,
    kullanici_soyad = @kullanici_soyad,
    kullanici_gsm = @kullanici_gsm
    WHERE kullanici_id = @kullanici_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

// Bilgi Güncelle

// adres Güncelle

try {
    $sql = "
    CREATE PROCEDURE kullaniciAdresGuncelle
    @kullanici_id INT,
    @kullanici_il NVARCHAR(250),
    @kullanici_ilce NVARCHAR(250),
    @kullanici_adres NVARCHAR(250)
    AS
    BEGIN
    UPDATE Kullanici
    SET kullanici_il = @kullanici_il,
    kullanici_ilce = @kullanici_ilce,
    kullanici_adres = @kullanici_adres
    WHERE kullanici_id = @kullanici_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

// adres Güncelle

// resim Güncelle

try {

   // Saklanmış prosedürü oluşturun
    $sql = "
    CREATE PROCEDURE kullaniciResimGuncelle
    @kullanici_id INT,
    @kullanici_resim NVARCHAR(250)
    AS
    BEGIN
    UPDATE Kullanici
    SET kullanici_resim = @kullanici_resim
    WHERE kullanici_id = @kullanici_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

// resim Güncelle

// sifre Güncelle

try {

   // Saklanmış prosedürü oluşturun
    $sql = "
    CREATE PROCEDURE kullaniciSifreGuncelle
    @kullanici_id INT,
    @kullanici_passwordone NVARCHAR(250)
    AS
    BEGIN
    UPDATE kullanici
    SET kullanici_password = @kullanici_passwordone
    WHERE kullanici_id = @kullanici_id;
    END

    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

// sifre Güncelle

// magaza basvuru


try {
    $sql = "
    CREATE PROCEDURE kullaniciMagazaBasvuru
    @kullanici_id INT,
    @kullanici_magazatakmaad NVARCHAR(250),
    @kullanici_magazaad NVARCHAR(250),
    @kullanici_magazatanitim NVARCHAR(250),
    @kullanici_tip NVARCHAR(250),
    @kullanici_tc NVARCHAR(250),
    @kullanici_ad NVARCHAR(250),
    @kullanici_soyad NVARCHAR(250),
    @kullanici_adres NVARCHAR(250),
    @kullanici_il NVARCHAR(250),
    @kullanici_ilce NVARCHAR(250),
    @kullanici_gsm NVARCHAR(250),
    @kullanici_iban NVARCHAR(250),
    @kullanici_banka NVARCHAR(250),
    @kullanici_magaza NVARCHAR(250)

    AS
    BEGIN
    UPDATE kullanici
    SET kullanici_magazatakmaad = @kullanici_magazatakmaad,
    kullanici_magazaad = @kullanici_magazaad,
    kullanici_magazatanitim = @kullanici_magazatanitim,
    kullanici_tip = @kullanici_tip,
    kullanici_tc = @kullanici_tc,
    kullanici_ad = @kullanici_ad,
    kullanici_soyad = @kullanici_soyad,
    kullanici_adres = @kullanici_adres,
    kullanici_il = @kullanici_il,
    kullanici_ilce = @kullanici_ilce,
    kullanici_gsm = @kullanici_gsm,
    kullanici_iban = @kullanici_iban,
    kullanici_banka = @kullanici_banka,
    kullanici_magaza = @kullanici_magaza
    WHERE kullanici_id = @kullanici_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}


// magaza basvuru

//admin giris

$kullaniciAdminGiris = $db->prepare("
 CREATE PROCEDURE kullaniciAdminGiris
 @kullanici_mail NVARCHAR(250),
 @kullanici_password NVARCHAR(250),
 @kullanici_yetki NVARCHAR(250)

 AS
 BEGIN
 SET NOCOUNT ON;

    -- Kullanıcı adı ve şifreyi doğrula
    IF EXISTS (SELECT 1 FROM kullanici WHERE kullanici_mail = @kullanici_mail and kullanici_password = @kullanici_password and kullanici_yetki = @kullanici_yetki)
    BEGIN
        SELECT 1 AS GirisBasarili; -- Giriş başarılı ise 1 döndür
        
        END
        ELSE
        BEGIN
        SELECT 0 AS GirisBasarili; -- Giriş başarısız ise 0 döndür
        END
        END
        ");

$kullaniciAdminGiris->execute()

//admin giris

//magaza onay

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


//magaza onay


//kategori ekle


$kategoriEkle = $db->prepare("
    CREATE PROCEDURE kategoriEkle
    @kategori_ad NVARCHAR(250),
    @kategori_sira INT,
    @kategori_durum NVARCHAR(250)
    AS
    BEGIN
    SET NOCOUNT ON;

    INSERT INTO kategori (kategori_ad, kategori_sira, kategori_durum)
    VALUES (@kategori_ad, @kategori_sira, @kategori_durum)
    END
    ");

$kategoriEkle->execute();



//kategori ekle


//urun ekle


$urunEkle = $db->prepare("
    CREATE PROCEDURE magazaUrunEkle
    @urunfoto_resimyol NVARCHAR(250),
    @kullanici_id INT,
    @kategori_id INT,
    @urun_ad NVARCHAR(250),
    @urun_keyword NVARCHAR(250),
    @urun_detay NVARCHAR(250),
    @urun_fiyat FLOAT,
    @urun_onecikar NVARCHAR(250),
    @urun_dosya NVARCHAR(250),
    @urun_zaman DATETIME
    AS
    BEGIN
    SET NOCOUNT ON;

    INSERT INTO urun (urunfoto_resimyol, kullanici_id, kategori_id, urun_ad, urun_keyword, urun_detay, urun_fiyat, urun_onecikar, urun_dosya, urun_zaman)
    VALUES (@urunfoto_resimyol, @kullanici_id, @kategori_id, @urun_ad, @urun_keyword, @urun_detay, @urun_fiyat, 1, @urun_dosya, GETDATE())
    END
    ");

$urunEkle->execute();





//urun ekle

//urun guncelle


try {
    $sql = "
    CREATE PROCEDURE magazaUrunGuncelle
    @urunfoto_resimyol NVARCHAR(250),
    @kategori_id INT,
    @urun_id INT,
    @urun_ad NVARCHAR(250),
    @urun_keyword NVARCHAR(250),
    @urun_detay NVARCHAR(250),
    @urun_fiyat FLOAT,
    @urun_dosya NVARCHAR(250)
    AS
    BEGIN
    UPDATE urun
    SET urunfoto_resimyol = @urunfoto_resimyol,
    kategori_id = @kategori_id,
    urun_ad = @urun_ad,
    urun_keyword = @urun_keyword,
    urun_detay = @urun_detay,
    urun_fiyat = @urun_fiyat,
    urun_dosya = @urun_dosya
    WHERE urun_id = @urun_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

//urun guncelle


//admin urun guncelle


try {
    $sql = "
    CREATE PROCEDURE adminUrunGuncelle
    @urun_durum NVARCHAR(250),
    @urun_id INT
    
    AS
    BEGIN
    UPDATE urun
    SET urun_durum = @urun_durum
    WHERE urun_id = @urun_id;
    END
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}

//admin urun guncelle


//site urun listele

try {

             // Saklı yordamı oluşturma veya güncelleme
    $createProcedure = $db->prepare("
        CREATE PROCEDURE urunleriListele
        @kategori_id INT
        AS
        BEGIN
        SET NOCOUNT ON;

            -- İlgili kategoriye ait ürünleri seçme
            SELECT *
            FROM urun
            WHERE urun_durum = 1 AND kategori_id = @kategori_id
            ORDER BY urun_zaman DESC
            
            END
            ");
    $createProcedure->execute();

    echo "Saklı yordam başarıyla oluşturuldu veya güncellendi.";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

        //site urun listele


 //mesaj gönder

try {

$mesajGon = $db->prepare("
    CREATE PROCEDURE kullaniciMesajGonder
    @kullanici_alan INT,
    @kullanici_gonderen INT,
    @mesaj_detay NVARCHAR(250),
    @mesaj_zaman DATETIME
    AS
    BEGIN
    SET NOCOUNT ON;

    INSERT INTO mesaj (kullanici_alan, kullanici_gonderen, mesaj_detay, mesaj_zaman)
    VALUES (@kullanici_alan, @kullanici_gonderen, @mesaj_detay, GETDATE())
    END
    ");

$mesajGon->execute();

    echo "Saklı yordam başarıyla oluşturuldu veya güncellendi.";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

 //mesaj gönder



//mesaj yanitla

try {

$mesajGon = $db->prepare("
    CREATE PROCEDURE kullaniciMesajYanitla
    @kullanici_alan INT,
    @kullanici_gonderen INT,
    @mesaj_detay NVARCHAR(250),
    @mesaj_zaman DATETIME
    AS
    BEGIN
    SET NOCOUNT ON;

    INSERT INTO mesaj (kullanici_alan, kullanici_gonderen, mesaj_detay, mesaj_zaman)
    VALUES (@kullanici_alan, @kullanici_gonderen, @mesaj_detay, GETDATE())
    END
    ");

$mesajGon->execute();

    echo "Saklı yordam başarıyla oluşturuldu veya güncellendi.";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

 //mesaj yanitla

 //siparis kaydet


try {

    $siparisKaydet = $db->prepare("
        CREATE PROCEDURE urunSiparisKaydet
        @kullanici_id INT,
        @kullanici_idsatici INT,
        @siparis_zaman DATETIME
        AS
        BEGIN
        SET NOCOUNT ON;

        INSERT INTO siparis (kullanici_id, kullanici_idsatici, siparis_zaman)
        VALUES (@kullanici_id, @kullanici_idsatici, GETDATE())
        END
        ");

    $siparisKaydet->execute();

    echo "Saklı yordam başarıyla oluşturuldu veya güncellendi.";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}


 //siparis kaydet


  //siparis detay kaydet


try {


    $siparisDetayKaydet = $db->prepare("
        CREATE PROCEDURE urunSiparisDetayKaydet
        @siparis_id INT,
        @kullanici_id INT,
        @kullanici_idsatici INT,
        @urun_id INT,
        @urun_fiyat FLOAT,
        @siparisdetay_onay NVARCHAR(250)
        AS
        BEGIN
        SET NOCOUNT ON;

        INSERT INTO siparis_detay (siparis_id, kullanici_id, kullanici_idsatici, urun_id, urun_fiyat, siparisdetay_onay)
        VALUES (@siparis_id, @kullanici_id, @kullanici_idsatici, @urun_id, @urun_fiyat, @siparisdetay_onay)
        END
        ");

    $siparisDetayKaydet->execute();

    echo "Saklı yordam başarıyla oluşturuldu veya güncellendi.";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}



 //siparis detay kaydet

 //siparis teslim


try {
    $sql = "
    CREATE PROCEDURE siparisTeslim
    @siparisdetay_id INT,
    @siparisdetay_onay NVARCHAR(250)
    AS
    BEGIN
    UPDATE siparis_detay
    SET siparisdetay_onay = @siparisdetay_onay
    WHERE siparisdetay_id = @siparisdetay_id;
    END
    ";

    $siparisTeslim = $db->prepare($sql);
    $siparisTeslim->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}


 //siparis teslim


 //siparis onay


try {
    $sql = "
    CREATE PROCEDURE siparisOnay
    @siparisdetay_id INT,
    @siparisdetay_onay NVARCHAR(250)
    AS
    BEGIN
    UPDATE siparis_detay
    SET siparisdetay_onay = @siparisdetay_onay
    WHERE siparisdetay_id = @siparisdetay_id;
    END
    ";

    $siparisOnay = $db->prepare($sql);
    $siparisOnay->execute();

    echo "Prosedür başarıyla oluşturuldu.";
} catch (PDOException $e) {
    echo "Hata oluştu: " . $e->getMessage();
}



 //siparis onay


 //ürün yorumu



 try {


    $siparisDetayKaydet = $db->prepare("
        CREATE PROCEDURE urunYorumPuanKaydet
        @yorum_detay NVARCHAR(250),
        @yorum_puan INT,
        @urun_id INT,
        @kullanici_id INT,
        @yorum_zaman DATETIME
        AS
        BEGIN
        SET NOCOUNT ON;

        INSERT INTO yorum (yorum_detay, yorum_puan, urun_id, kullanici_id, yorum_zaman)
        VALUES (@yorum_detay, @yorum_puan, @urun_id, @kullanici_id, GETDATE())
        END
        ");

    $siparisDetayKaydet->execute();

    echo "Saklı yordam başarıyla oluşturuldu veya güncellendi.";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}


 //ürün yorumu




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

    
    $kullaniciGiris = $db->prepare("EXECUTE kullaniciGiris @kullanici_mail = :kullanici_mail, @kullanici_password = :kullanici_password");
    $kullaniciGiris->bindParam(':kullanici_mail', $kullanici_mail, PDO::PARAM_STR);
    $kullaniciGiris->bindParam(':kullanici_password', $kullanici_password, PDO::PARAM_STR);
    


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
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
    $stmt->bindParam(':kullanici_ad', $kullanici_ad, PDO::PARAM_STR);
    $stmt->bindParam(':kullanici_soyad', $kullanici_soyad, PDO::PARAM_STR);
    $stmt->bindParam(':kullanici_gsm', $kullanici_gsm, PDO::PARAM_STR);
    $stmt->execute();

    echo "Kullanıcı bilgileri güncellendi.";
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

            // Bağlantıyı kapatın
        $db = null;

        header("Location:../../profil.php?durum=basarili");
    } catch (PDOException $e) {
        echo "Hata oluştu: " . $e->getMessage();
    }
    
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








?>