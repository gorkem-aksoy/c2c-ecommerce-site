<?php 

include 'header.php';

$kullanicisor =$db ->prepare("SELECT * FROM kullanici where kullanici_id =:id");
$kullanicisor ->execute(array(

  'id' =>$_GET['kullanici_id']

));

$kullanicicek =$kullanicisor ->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">



    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Bilgileri<small>

              <?php 

              if (isset($_GET['durum']) && $_GET['durum']=='ok') {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif (isset($_GET['durum']) && $_GET['durum']=='no') {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>



            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../netting/adminislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <?php 

              $zaman=explode(" ",$kullanicicek['kullanici_zaman']);
              ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Tarihi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="first-name" required="required" disabled="" name="kullanici_zaman" value="<?php echo $zaman[0] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Saati <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="time" id="first-name" required="required" disabled=""  name="kullanici_zaman" value="<?php echo $zaman[1] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail Adresi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <br>

              <h2 style="margin-left: 10%; color:#2A3F54;">Mağaza Bilgileri</h2>
              <br>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_magazatakmaad" value="<?php echo $kullanicicek['kullanici_magazatakmaad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mağaza Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_magazaad" value="<?php echo $kullanicicek['kullanici_magazaad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mağaza Tanıtım Bilgisi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea style="height:100px;" name="kullanici_magazatanitim" id="message" required="required" class="form-control" disabled data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                  data-parsley-validation-threshold="10"><?php echo $kullanicicek['kullanici_magazatanitim'] ?></textarea>
                </div>
              </div>

              <br>

              <h2 style="margin-left: 10%; color:#2A3F54;">Fatura Bilgisi</h2>
              <br>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başvuru Tipi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_tip" value="<?php echo $kullanicicek['kullanici_tip'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <?php if (
                $kullanicicek['kullanici_tip']=="PERSONAL") { ?>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">T.C<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_tc" readonly value="<?php echo $kullanicicek['kullanici_tc'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <?php } ?>

              <?php if (
                $kullanicicek['kullanici_tip']=="PRIVATE_COMPANY") { ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi Dairesi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi Numarası<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <?php } ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <br>

              <h2 style="margin-left: 10%; color:#2A3F54;">Fatura Adres</h2>
              <br>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Açık Adres<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şehir<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <br>

              <h2 style="margin-left: 10%; color:#2A3F54;">Banka Hesap Bilgileri</h2>
              <br>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IBAN Numarası<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_iban" value="<?php echo $kullanicicek['kullanici_iban'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka Adı<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" disabled=" " name="kullanici_banka" value="<?php echo $kullanicicek['kullanici_banka'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?> ">


            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                 <a onclick="return confirm('Mağaza başvurusunu onaylamak istediğinize emin misiniz?')" class="btn btn-success" href="../netting/procedur.php?basvuru=onay&kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>">Onayla</a>
                <a onclick="return confirm('Mağaza başvurusunu iptal etmek istediğinize emin misiniz??')" class="btn btn-danger" href="../netting/procedur.php?basvuru=red&kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>">İptal Et</a>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
