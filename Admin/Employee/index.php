<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>

 <!-- Table Start -->
 <div class= "title" style="padding-top:30px; padding-left:30px;padding-right:30px;">
     <h1 class="mb-2">Quản lý nhân viên</h1>
     <hr>
    <br>
     </div>
<div style="width:100%; height: 5px; color:black" class="lane"></div>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h3 class="mb-4">Danh sách nhân viên</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <div style="display: flex;">
                                            <input type="text" name="EmployeeCode" class="form-control" placeholder="Mã nhân viên" aria-label="Mã nhân viên" aria-describedby="basic-addon2" style="width: 20%; height:40px;">
                                            <button class="btn btn-secondary" style="margin-left: 10px;" name="search" type="search">Tìm kiếm</button>
                                             <a href = "addEmployee.php" class="btn btn-secondary" style="margin-left: 10px;">Thêm nhân viên</a>
                                             <!-- <button class="btn btn-secondary" style="margin-left: 10px;" >Xóa nhân viên</button>
                                             <button class="btn btn-secondary" style="margin-left: 10px;" >Cập nhật nhân viên</button> -->
                                            <!--<button class="btn btn-secondary" style="margin-left: 45%;" onclick="">Xuất Excel</button> -->
                                        </div>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Mã nhân viên</th>
                                            <th scope="col">Tên nhân viên</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Giới tính</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Mã phòng ban</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `tb_employee`";
                                    $res = mysqli_query($conn, $sql);
                                    if($res == TRUE)
                                    {
                                        $count = mysqli_num_rows($res);
                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {   
                                                $id = $row['Id'];
                                                $employeecode = $row['EmployeeCode'];
                                                $employeename = $row['EmployeeName'];
                                                $employeeemail = $row['EmployeeEmail'];
                                                $employeephone = $row['EmployeePhone'];
                                                $employeegender = $row['EmployeeGender'];
                                                $employeeaddress= $row['EmployeeAdress'];
                                                $employeestatus = $row['EmployeeStatus'];
                                                $departmentcode = $row['DepartmentCode'];
                                              
                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $employeecode; ?></td>            
                                                    <td><?php echo $employeename; ?></td>                                                     
                                                    <td><?php echo $employeeemail; ?></td>                                                     
                                                    <td><?php echo $employeephone; ?></td>                                                     
                                                    <td><?php 
                                                            if($employeegender == 1){
                                                                echo 'Nam';
                                                            }
                                                            if($employeegender== 2){
                                                                echo 'Nữ';
                                                            }
                                                        ?></td>                                                          
                                                    <td><?php echo $employeeaddress; ?></td>                                                                                                 
                                                    <td><?php 
                                                            if($employeestatus == 1){
                                                                echo 'Hoạt động';
                                                            }
                                                            if($employeestatus == 2){
                                                                echo 'Không hoạt động';
                                                            }
                                                        ?></td>                                                     
                                                    <td><?php echo $departmentcode; ?></td>                                                                                                       
                                                    <td><a href ="updateEmployee.php?EmployeeCode=<?php echo $employeecode; ?>" type="button" class="btn btn-outline-warning m-2">Sửa</a></td>
                                                    <td><a href ="deleteEmployee.php?EmployeeCode=<?php echo $employeecode; ?>" type="button" class="btn btn-outline-danger m-2">Xóa</a></td>
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
<?php
    include('../../footer.php');
?>