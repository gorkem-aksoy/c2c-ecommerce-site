<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürünler <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

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
          <div align="right">

          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Yorumlar</th>
                  <th>Ürün</th>
                  <th>Kullanıcı </th>
                  <th></th>

                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $urun_id=$uruncek['urun_id'];


                $yorumsor =$db ->prepare("SELECT * FROM yorumlar ");
                $yorumsor ->execute();


                $say=0;

                while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {$say++






                 ?>


                 <tr>
                 <td width="10"><?php echo $say ?></td>
                   <td><?php echo $yorumcek['yorum_detay'] ?></td>
                   <td width="90">
                     <?php 
                     $urun_id =$yorumcek['urun_id'];

                     $urunsor =$db ->prepare("SELECT * FROM urun where urun_id =:id");
                     $urunsor ->execute(array(

                      'id' =>$urun_id

                      ));

                     $uruncek =$urunsor ->fetch(PDO::FETCH_ASSOC);



                     echo $uruncek['urun_ad'] ?>

                   </td>
                   <td width="40">
                     <?php

                     $yakullanici_id=$yorumcek['kullanici_id'];

                     $yakullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                     $yakullanicisor->execute(array(
                      'id' => $yakullanici_id
                      ));

                     $yakullanicicek=$yakullanicisor->fetch(PDO::FETCH_ASSOC);


                     echo $yakullanicicek['kullanici_adsoyad'] ?>

                   </td>




                   <td width="25" align="center">
                    <?php

                    if ($yorumcek['yorum_onay']==0) {?>

                    <a href="../netting/adminislem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorum_onay=1&yorum_onayla=ok"><button class="btn btn-success btn-xs">Onayla</button></a>

                    <?php }else if($yorumcek['yorum_onay']==1){ ?> 

                    <a href="../netting/adminislem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorum_onay=0&yorum_onayla=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>


                    <?php } ?>
                  </td>




                  <td width="20"><center><a href="../netting/adminislem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorumsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
