<?php include('head.php');?>
<?php include('nav.php');?>
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
<?php
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
}

$AADDCC = mysqli_query($ketnoi,"SELECT * FROM `cards` WHERE `id` = '".$id."' ");
while ($row = mysqli_fetch_array($AADDCC) )
{
  if (isset($_POST["btn_submit"])) {
  mysqli_query($ketnoi,"UPDATE `cards` SET
    `username` = '".$_POST['ten']."',
    `sdt`= '".$_POST['sdt']."',
    `linkfb` = '".$_POST['linkfb']."',
    `id_fb` = '".$_POST['idfb']."',
    `qrbank` = '".$_POST['qrbank']."',
    `website` = '".$_POST['website']."',
    `dich_vu` = '".$_POST['loai']."',
    `money` = '".$_POST['money']."',
    `image` = '".$_POST['image']."',
    `telegram` = '".$_POST['telegram']."',
    `momo` = '".$_POST['momo']."',
    `mb` = '".$_POST['mb']."',
    `bidv` = '".$_POST['bidv']."',
    `scb` = '".$_POST['scb']."',
    `vcb` = '".$_POST['vcb']."',
    `agri` = '".$_POST['agri']."',
    `tsr` = '".$_POST['tsr']."',
    `zalop` = '".$_POST['zalop']."',
    `tpbank` = '".$_POST['tpbank']."',
    `vtbank` = '".$_POST['vtbank']."',
    `acb` = '".$_POST['acb']."',
    `tcb` = '".$_POST['tcb']."',
    `dichvucungcap` = '".$_POST['dichvucungcap']."',
    `ngay` = '".$_POST['ngay']."',
    `gt1s` = '".$_POST['gt1s']."' WHERE `id` = '".$id."' ");
    

    echo '<script type="text/javascript">swal("Thành Công","Save Thành Công","success");
    setTimeout(function(){ location.href = "" },500);</script>';
      
  }

?>

<div class="row">

<section class="col-lg-12 connectedSortable">
  
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa Hồ Sơ <a href="//<?=$site_tenweb;?>/profile/<?=$row['code'];?>" style="text-shadow: 1px 2px 3px Indigo;"><?=$row['username'];?></a></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                    
                  <div class="form-group">
                    <label for="exampleInputEmail1">TÊN USER</label>
                    <input type="text" name="ten" class="form-control" value="<?=$row['username'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">LINK ẢNH</label>
                    <input type="text" name="image" class="form-control" value="<?=$row['image'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">SĐT</label>
                    <input type="text" name="sdt" class="form-control" value="<?=$row['sdt'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">TELEGRAM</label>
                    <input type="text" name="telegram" class="form-control" value="<?=$row['telegram'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link Fb</label>
                    <input type="text" name="linkfb" class="form-control" value="<?=$row['linkfb'];?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">UID FB</label>
                    <input type="text" name="idfb" class="form-control" value="<?=$row['id_fb'];?>">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">TIỀN BẢO HIỂM</label>
                    <input type="number" name="money" class="form-control" value="<?=$row['money'];?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">WEBSITE</label>
                    <input type="text" name="website" class="form-control" value="<?=$row['website'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">NGÀY TẠO</label>
                    <input type="text" name="ngay" class="form-control" value="<?=$row['ngay'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">MOMO </label>
                    <input type="text" class="form-control" name="momo" value="<?=$row['momo'];?>">
                  </div>
                    
                  <div class="form-group">
                    <label for="exampleInputEmail1">MB BANK </label>
                    <input type="text" class="form-control" name="mb" value="<?=$row['mb'];?>">
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">BIDV</label>
                    <input type="text" class="form-control" name="bidv" value="<?=$row['bidv'];?>">
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">ZALO PAY </label>
                    <input type="text" class="form-control" name="zalop" value="<?=$row['zalop'];?>">
                  </div> 
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">SCB </label>
                    <input type="text" class="form-control" name="scb" value="<?=$row['scb'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">VIETCOMBANK</label>
                    <input type="text" class="form-control" name="vcb" value="<?=$row['vcb'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">AGRIBANK</label>
                    <input type="text" class="form-control" name="agri" value="<?=$row['agri'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">THESIEURE.COM</label>
                    <input type="text" name="tsr" class="form-control" value="<?=$row['tsr'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">GACHTHE1S</label>
                    <input type="text" name="gt1s" class="form-control" value="<?=$row['gt1s'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">TP BANK</label>
                    <input type="text" name="tpbank" class="form-control" value="<?=$row['tpbank'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">VIETTINBANK</label>
                    <input type="text" name="vtbank" class="form-control" value="<?=$row['vtbank'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">ACB</label>
                    <input type="text" name="acb" class="form-control" value="<?=$row['acb'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">TECHCOMBANK</label>
                    <input type="text" name="tcb" class="form-control" value="<?=$row['tcb'];?>">
                  </div>
                  <div class="form-group">
              <label for="exampleInputEmail1">QR BANK</label>
              <select name="qrbank" class="custom-select">
                <option value="mb" <?= ($row['qrbank'] == 'mb') ? 'selected' : ''; ?>>MBbank</option>
                <option value="mm" <?= ($row['qrbank'] == 'mm') ? 'selected' : ''; ?>>MOMO</option>
                 <option value="bidv" <?= ($row['qrbank'] == 'bidv') ? 'selected' : ''; ?>>BIDV</option>
                <option value="scb" <?= ($row['qrbank'] == 'scb') ? 'selected' : ''; ?>>SCB</option>
                <option value="vcb" <?= ($row['qrbank'] == 'vcb') ? 'selected' : ''; ?>>VIETCOMBANK</option>
                <option value="agri" <?= ($row['qrbank'] == 'agri') ? 'selected' : ''; ?>>AGRIBANK</option>
                 <option value="tpbank" <?= ($row['qrbank'] == 'tpbank') ? 'selected' : ''; ?>>TP BANK</option>
                <option value="vtbank" <?= ($row['qrbank'] == 'vtbank') ? 'selected' : ''; ?>>VIETTINBANK</option>
                 <option value="acb" <?= ($row['qrbank'] == 'acb') ? 'selected' : ''; ?>>ACB BANK</option>
                <option value="tcb" <?= ($row['qrbank'] == 'tcb') ? 'selected' : ''; ?>>TECHCOMBANK</option>
            </select>
            </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dịch Vụ Cung Cấp</label>
                    <input type="text" name="dichvucungcap" class="form-control" value="<?=$row['dichvucungcap'];?>">
                  </div>
                  
                   <div class="form-group">
              <label for="exampleInputEmail1">THỂ LOẠI</label>
              <select class="custom-select"  name="loai" >
                  <?php
                  $result = mysqli_query($ketnoi,"SELECT * FROM `category` ");
                  while ($row1 = mysqli_fetch_array($result) ) { ?>
                  <option value="<?=$row1['code'];?>"><?=$row1['code'];?></option>
                  <?php } ?>
                  </select>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
            </div>
</section>

</div>
<?php }?>


<?php include('foot.php');?>
<?php require_once('last.php'); ?>