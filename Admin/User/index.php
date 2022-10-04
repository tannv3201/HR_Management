<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>
<!-- Table Start -->
<div class="title" style="padding-top:30px; padding-left:30px;padding-right:30px;">
    <h1 class="mb-2">Quản lý tài khoản</h1>
    <hr>
    <br>
</div>
<div style="width:100%; height: 5px; color:black" class="lane"></div>
     <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4" class="bg-light rounded h-100 p-4">
                            <h3 class="mb-4">Danh sách tài khoản</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <div style="display: flex;">
                                            <input type="text" name="EmployeeCode" class="form-control" placeholder="Mã nhân viên" aria-label="Mã nhân viên" aria-describedby="basic-addon2" style="width: 20%; height:40px;">
                                            <button class="btn btn-secondary" style="margin-left: 10px;" name="search" type="search">Tìm kiếm</button>                                           
                            </div>
                        </thead>
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Chức vụ</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $sql = "SELECT * FROM `tb_user`";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $username = $row['UserName'];
                                                $password = $row['Password'];
                                                $level = $row['Level'];
                                                $status = $row['status'];
                                                
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $password; ?></td>
                                <td><?php 
                                                            if($level == 1){
                                                                echo 'Quản lý';
                                                            }
                                                            if($level == 2){
                                                                echo 'Nhân viên';
                                                            }
                                                        ?></td>
                                <td><?php 
                                                            if($status == 1){
                                                                echo 'Hoạt động';
                                                            }
                                                            if($status == 2){
                                                                echo 'Không hoạt động';
                                                            }
                                                        ?></td>
                            </tr>
                            <?php
                                            }
                                        }
                                        else
                                        {

                                        }
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->
<?php
    include('../../footer.php');
?>