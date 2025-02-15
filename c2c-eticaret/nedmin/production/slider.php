<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$slidersor=$db->prepare("SELECT * FROM slider ");
$slidersor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            

            <div class="clearfix"></div>
          </div>
          <div align="right">
            <a href="slider-ekle.php"><button class="btn btn-dark btn-xs">Yeni Ekle</button></a>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Resim</th>
                  <th>Ad</th>
                  <th>Link</th>
                  <th>Sıra</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="15"><?php echo $say ?></td>
                 <td><img width="200" src="../../<?php echo $slidercek['slider_resimyol'] ?>"></td>
                 <td><?php echo $slidercek['slider_ad'] ?></td>
                 <td width="25"><?php echo $slidercek['slider_link'] ?></td>
                 <td><?php echo $slidercek['slider_sira'] ?></td>

                 <td align="center">
                  <?php

                  if ($slidercek['slider_durum']==1) {?>

                  <button  class="btn btn-success btn-xs">Aktif</button>

                  <?php }else{ ?> 

                  <button class="btn btn-warning btn-xs">Pasif</button>

                  <?php } ?>
                </td>

                <td><center><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>

                <td><center><a href="../netting/adminislem.php?slider_id=<?php echo $slidercek['slider_id']; ?>&slidersil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
              </tr>



              <?php  }

              ?>


            </tbody>
          </table>

          <!-- Div İçerik Bitişi -->


        </div>
      </div>
    </div>
  </div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
