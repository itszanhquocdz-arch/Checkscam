<?php include('head.php');?>
<?php include('nav.php');?>
<?php
$don = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `ticket` WHERE `status` = 'xuly' ")) ['COUNT(*)'];
$news = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `news` WHERE `status` = 'hoantat' ")) ['COUNT(*)'];
$uytin = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `cards`")) ['COUNT(*)'];
$dv = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `category`")) ['COUNT(*)'];
$doitac = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `dttc`")) ['COUNT(*)'];
$ctv = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `usersctv`")) ['COUNT(*)'];

?>
<br>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-6">
           <div class="small-box bg-success">
            <div class="inner">
              <h3><?=$uytin;?></h3>
              <b><p>TỔNG HỒ SƠ UY TÍN</p></b>
            </div>
            <div class="icon">
              <i class="fas fa-check-double"></i>
            </div>
            <a href="suauytin.php" class="small-box-footer">Xem Ngay <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?=$don;?></h3>
              <b><p>ĐƠN TỐ CÁO</p></b>
            </div>
            <div class="icon">
              <i class="fas fa-exclamation-circle"></i>
            </div>
             <a href="ho-tro.php" class="small-box-footer">Xem Ngay <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-6 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?=$ctv;?></h3>
              <b><p>TỔNG HỒ SƠ CTV</p></b>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Xem Ngay <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?=$config['version'];?></h3>
              <p>Version</p>
            </div>
            <div class="icon">
              <i class="fas fa-cloud-download-alt"></i>
            </div>
              <a href="/" class="small-box-footer">Xem Ngay <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?=$config['tacgia'];?></h3>
              <p>Developer By</p>
            </div>
            <div class="icon">
              <i class="fas fa-book-reader"></i>
            </div>
            <a href="https://dichvuright.com" class="small-box-footer">Xem Ngay <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
<?php include('foot.php');?>