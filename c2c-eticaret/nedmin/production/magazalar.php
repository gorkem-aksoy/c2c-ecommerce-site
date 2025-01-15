<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_magaza =:kullanici_magaza");
$kullanicisor->execute(array(

  'kullanici_magaza' =>2
));


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mağazalar <small>

              <?php

              if (isset($_GET['sil'])) {
                
               
                if ($_GET['sil']=="ok") {?>

                  <b style="color:green;">İşlem Başarılı...</b>

                <?php } elseif ($_GET['sil']=="no") {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                <?php }

              } 


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

           <p class="text-muted font-13 m-b-30">
            Kullanıcıların bilgilerini alt taraftaki tablo aracılığı sayesinde inceleyebilirsiniz...
          </p>


          <!-- Div İçerik Başlangıç -->

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Başvuru Tarihi</th>
                <th>Ad Soyad</th>
                <th>Başvuru Tipi</th>
                <th>Mağaza Adı</th>
                <th></th>
              </tr>
            </thead>

            <tbody>

              <?php 

              while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $kullanicicek['kullanici_zaman'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_tip'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_magazaad'] ?></td>
                  <td><center><a href="magaza-basvuru-bilgileri.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs">İncele</button></a></center></td>
                  
                 
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
