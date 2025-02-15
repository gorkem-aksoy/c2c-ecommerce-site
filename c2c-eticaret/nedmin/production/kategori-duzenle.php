<?php 

include 'header.php';

$kategorisor =$db ->prepare("SELECT * FROM kategori where kategori_id =:id");
$kategorisor ->execute(array(

  'id' =>$_GET['kategori_id']

  ));

$kategoricek =$kategorisor ->fetch(PDO::FETCH_ASSOC);

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
            <h2>Kategori Düzenle<small>

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


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" name="kategori_ad" value="<?php echo $kategoricek['kategori_ad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sıra<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" name="kategori_sira" value="<?php echo $kategoricek['kategori_sira'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

               <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öne Çıkar<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="kategori_onecikar" required>

                <option value="1" <?php echo $kategoricek['kategori_onecikar'] == '1' ? 'selected=""' : ''; ?>>EVET</option>



                <option value="0" <?php if ($kategoricek['kategori_onecikar']== '0') { echo 'selected=""'; } ?>>HAYIR</option>

              </select>
            </div>
          </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="kategori_durum" required>

                   <!-- Kısa İf Kulllanımı 

                    <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>

                    <?php if ($kategoricek['kategori_durum']== '0') { echo 'selected=""'; } ?>

                  -->


                  <option value="1" <?php echo $kategoricek['kategori_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($kategoricek['kategori_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>

                </select>
              </div>
            </div>

            <input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id'] ?> ">


            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                <button type="submit" class="btn btn-success" name="kategoriduzenle">Güncelle</button>
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
