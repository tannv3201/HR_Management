<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>
    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tài khoản</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <div style="display: flex;">
                                            <input type="text" name="EmployeeCode" class="form-control" placeholder="Mã nhân viên" aria-label="Mã nhân viên" aria-describedby="basic-addon2" style="width: 20%; height:40px;">
                                            <button class="btn btn-secondary" style="margin-left: 10px;" name="search" type="search">Tìm kiếm</button>
                                            <!-- <button class="btn btn-secondary" style="margin-left: 10px;" onclick="window.local.href = 'index.php'">Đặt lại</button>
                                            <button class="btn btn-secondary" style="margin-left: 10px;" onclick="ResetData()">Xóa dữ liệu</button> -->
                                            <!-- <button class="btn btn-secondary" style="margin-left: 45%;" onclick="">Xuất Excel</button> -->
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
                                    <!-- CODE PHP -->
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
                                </table>
                            </div>
                        </div>
                    </div>
<?php
    include('../../footer.php');
?>