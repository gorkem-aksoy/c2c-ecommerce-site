<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$bankasor=$db->prepare("SELECT * FROM banka ");
$bankasor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Bankalar <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php } elseif ($_GET['sil']=="ok") {?>

              <b style="color:blue;">Silme İşlemi Başarılı...</b>

              <?php } elseif ($_GET['sil']=="no") {?>

              <b style="color:orange;">Silme İşlemi Başarısız...</b>

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
          <div align="right">
            <a href="banka-ekle.php"><button class="btn btn-dark btn-xs">Yeni Ekle</button></a>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Banka Adı</th>
                  <th>Banka IBAN Numarası</th>
                  <th>Banka Hesap Ad Soyad</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="15"><?php echo $say ?></td>
                 <td><?php echo $bankacek['banka_ad'] ?></td>
                 <td><?php echo $bankacek['banka_iban'] ?></td>
                 <td><?php echo $bankacek['banka_hesapadsoyad'] ?></td>

                 <td align="center">
                  <?php

                  if ($bankacek['banka_durum']==1) {?>

                  <button  class="btn btn-success btn-xs">Aktif</button>

                  <?php }else{ ?> 

                  <button class="btn btn-warning btn-xs">Pasif</button>

                  <?php } ?>
                </td>

                <td><center><a href="banka-duzenle.php?banka_id=<?php echo $bankacek['banka_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>

                <td><center><a href="../netting/adminislem.php?banka_id=<?php echo $bankacek['banka_id']; ?>&bankasil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
