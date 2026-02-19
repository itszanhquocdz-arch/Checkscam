<?php include('head.php');?>
<?php include('nav.php');?>
<?php
if (isset($_GET['delete'])) 
{
    $delete = $_GET['delete'];

    $create = mysqli_query($ketnoi,"DELETE FROM `cards` WHERE `id` = '".$delete."' ");

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành Công","Xóa thành công","success");setTimeout(function(){ location.href = "suauytin.php" },500);</script>'; 
    }
    else
    {
      echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");setTimeout(function(){ location.href = "suauytin.php" },1000);</script>'; 
    }
}
?>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>MÃ SỐ</th>
                                <th>AVATAR</th>
                                <th>TÊN LOẠI</th>
                                <th>SĐT</th>
                                <th>ID FB</th>
                                <th>WEBSITE</th>
                                <th>DỊCH VỤ</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
$result = mysqli_query($ketnoi,"SELECT * FROM `cards` ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result))
{
?>
                            <tr>
                                <td><?=$i++?></td>
                                <td class="text-center"><img src="<?=$row['image'];?>" style="border-radius: 10px;" alt="pic" height="60px"></td>
                                <td><?=$row['username'];?></td>
                                <td><?=$row['sdt'];?></td>
                                <td><?=$row['id_fb'];?></td>
                                <td><?=$row['website'];?></td>
                                <td><?=$row['dich_vu'];?></td>
                                <td>
                                    <a href="sua-uytin.php?id=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <a href="suauytin.php?delete=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script> 
$(document).ready(function(){
setInterval(function(){
      $("#table_auto").load(window.location.href + " #table_auto" );
}, 1000);
});
</script>

<?php include('foot.php');?>
<?php require_once('last.php'); ?>