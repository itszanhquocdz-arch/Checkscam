<?php include('head.php');?>
<?php include('nav.php');?>
<div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
<?php
$time = date("h:i:s");
if (isset($_POST["submit"])) {
$ngay = date('d/m/Y');
$ten = $_POST["title"];
$code = xoadau($ten);
$create = mysqli_query($ketnoi,"INSERT INTO `cards` SET 
    `username` = '$ten',
    `ngay` = '$ngay',
    `sdt` = '".$_POST['sdt']."',
    `linkfb` = '".$_POST['linkfb']."',
    `id_fb` = '".$_POST['idfb']."',
    `website` = '".$_POST['website']."',
    `money` = '".$_POST['money']."',
    `dich_vu` = '".$_POST['loai']."',
    `momo` = '".$_POST['momo']."',
    `qrbank` = '".$_POST['qrbank']."',
    `mb` = '".$_POST['mb']."',
    `bidv` = '".$_POST['bidv']."',
    `scb` = '".$_POST['scb']."',
    `vcb` = '".$_POST['vcb']."',
    `agri` = '".$_POST['agri']."',
    `tsr` = '".$_POST['tsr']."',
    `gt1s` = '".$_POST['gt1s']."',
    `tpbank` = '".$_POST['tpbank']."',
    `vtbank` = '".$_POST['vtbank']."',
    `acb` = '".$_POST['acb']."',
    `tcb` = '".$_POST['tcb']."',
    `dichvucungcap` = '".$_POST['dichvucungcap']."',
    `zalop` = '".$_POST['zalop']."',
    `image` = '".$_POST['image']."',
    `telegram` = '".$_POST['telegram']."',
    `code` = '".$code."'  ");
 
  if($create)
  {
    echo '<script type="text/javascript">swal("Thành Công","Thêm Thành Công","success");
            setTimeout(function(){ location.href = "" },1000);</script>';
  }
  else
  {
    echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");</script>'; 
  }
}

?>
<script> 
$(document).ready(function(){
setInterval(function(){
      $("#table_auto").load(window.location.href + " #table_auto" );
}, 1000);
});
</script>
<div class="row mb-2">
    <div class="col-sm-6">

    </div>
</div>
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">THÊM HỒ SƠ UY TÍN</h3>
                            <hr>
                        </div>
                        <div class="col-md-6">
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

            </div>
            
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN</label>
                        <input type="text" class="form-control" name="title" placeholder="Nhập Tên Hồ Sơ" required="">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">LINK ẢNH</label>
                        <input type="text" class="form-control" name="image" placeholder="Nhập Link Ảnh" required="">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">SĐT</label>
                        <input type="number" class="form-control" name="sdt"
                            placeholder="Nhập Số Điện Thoại" required="">
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TELEGRAM</label>
                        <input type="text" class="form-control" name="telegram"
                            placeholder="Nhập TELEGRAM" required="">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link FB<code> LƯU Ý : anh em thêm link fb zô vui lòng chỉ lấy phần userfb ( không lấy phần ?mibextid= )</code></label>
                        <input type="text" class="form-control" name="linkfb"
                            placeholder="https://www.facebook.com/DuyKhanhRealL0" required="">
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">UID FB</label>
                        <input type="number" class="form-control" name="idfb"
                            placeholder="Nhập id FB" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TIỀN BẢO HIỂM</label>
                        <input type="number" class="form-control" name="money" placeholder="Nhập Số Tiền Hồ Sơ Đã Đóng" required="">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/1FQtorr.png" height="15"> MOMO: <code>Không Có Thì Bỏ Trống</code> </label>
                    <input type="text" class="form-control" name="momo" placeholder="Nhập số tài khoản ngân hàng" >
                    </div>
                    </div>
                   
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/ftwE7Es.png" height="15"> MB BANK <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="mb" placeholder="Nhập số tài khoản ngân hàng" >
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/LEmCjng.png" height="15"> BIDV <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="bidv" placeholder="Nhập số tài khoản ngân hàng" >
                    </div>
                    </div>
                   
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/Bqe2xw5.png" height="15"> ZALO PAY <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="zalop" placeholder="Nhập số tài khoản ngân hàng" >
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/nKqvckY.png" height="15"> SCB <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="scb" placeholder="Nhập số tài khoản ngân hàng" >
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/DoAAoml.png" height="15"> VIETCOMBANK <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="vcb" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                   
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/LUoNgQX.png" height="15"> AGRIBANK <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="agri" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                   
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/yaaWIHf.png" height="15"> THESIEURE.COM <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="tsr" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/jnN4Daf.png" height="15"> GACHTHE1S.COM <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="gt1s" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/VMDqAEz.png" height="15"> TP BANK <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="tpbank" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                   
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/3glZrQx.png" height="15"> VIETTINBANK <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="vtbank" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/F2SA7Ju.png" height="15"> ACB <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="acb" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                   
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1"><img src="https://i.imgur.com/Fwe8AU1.png" height="15"> TECHCOMBANK <code>Không Có Thì Bỏ Trống</code></label>
                    <input type="text" class="form-control" name="tcb" placeholder="Nhập số tài khoản ngân hàng">
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Dịch Vụ Cung Cấp <code>Mỗi Dịch Vụ Cách Nhau Bằng Dấu (|)</code></label>
                    <input type="text" name="dichvucungcap" class="form-control" placeholder="VD : Bán Acc FiFai" required="">
                    </div>
                    </div>
                   <div class="col-md-6">
                                        <label class="form-label" for="inputState">Chọn QR</label>
                                        <select name="qrbank" class="form-control select2bs4">
                                            <option value="mb">MBbank</option>
                                            <option value="mm">MOMO</option>
                                            <option value="bidv">BIDV</option>
                                            <option value="scb">SCB</option>
                                            <option value="vcb">VIETCOMBANK</option>
                                            <option value="agri">AGRIBANK</option>
                                            <option value="tpbank">TP BANK</option>
                                            <option value="vtbank">VIETTINBANK</option>
                                            <option value="acb">ACB BANK</option>
                                             <option value="tcb">TECHCOMBANK</option>
                                        </select>
                                    </div>
                                
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">WEBSITE</label>
                        <input type="text" class="form-control" name="website"
                            placeholder="Nhập link website" required="">
                    </div>
                    </div>
                        
                        
                    <button name="submit" type="submit" class="btn btn-info btn-block">THÊM HỒ SƠ</button>
                
                    </div>
            </form>
        </div>
    </div>
<?php include('foot.php');?>
<?php require_once('last.php'); ?>