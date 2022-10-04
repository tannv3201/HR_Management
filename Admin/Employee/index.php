<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>

<!-- Table Start -->
<div class="title" style="padding-top:30px; padding-left:30px;padding-right:30px;">
    <h1 class="mb-2">Quản lý nhân viên</h1>
    <hr>
    <br>
</div>
<div style="width:100%; height: 5px; color:black" class="lane"></div>
<form action="" method="POST" enctype="multipart/form-data">
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4" class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Danh sách nhân viên</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <div style="display: flex;">
                            <select type="EmployeeCode" name="EmployeeCode" id="EmployeeCode">
                                    <option value="">None</option>
                                    <?php 
                                        $sql1 = "SELECT * FROM tb_employee";
                                        $res1 = mysqli_query($conn, $sql1);

                                        while ($row1 = mysqli_fetch_assoc($res1)) {
                                            $empCode = $row1['EmployeeCode'];
                                            $empName = $row1['EmployeeName'];

                                            ?>
                                    <option value="<?php echo $empCode;?>"><?php echo $empName;?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <button class="btn btn-secondary" style="margin-left: 10px;" name="search"
                                    type="search">Tìm kiếm</button>
                                <a href="addEmployee.php" class="btn btn-secondary" style="margin-left: 10px;">Thêm nhân
                                    viên</a>
                            </div>
                        </thead>
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã nhân viên</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Mã phòng ban</th>
                                <th scope="col">Chi tiết</th>
                                <th scope="col">Sửa</th>
                                <!-- <th scope="col">Xóa</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                    if (isset($_POST['search'])) {
                                        $code = $_POST['EmployeeCode'];
                                        if($code == "") {
                                            $sql  = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1";
                                        } else {
                                            $sql = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1 AND (EmployeeCode = '$code')";
                                        }
                                        } else {
                                            $sql  = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1";
                                        }
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
                                                $employeestatus = $row['EmployeeStatus'];
                                                $departmentcode = $row['DepartmentCode'];
                                              
                                ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $employeecode;?></td>
                                <td><?php echo $employeename; ?></td>
                                <td><?php 
                                    if($employeestatus == 1){ ?>
                                       <a href ="deleteEmployee.php?EmployeeCode=<?php echo $employeecode?>" type="button" class="btn btn-square btn-outline-success m-2"><i class="fa fa-unlock"></i></a>
                                    <?php }
                                    if($employeestatus == 2){ ?>
                                        <a href ="deleteEmployee.php?EmployeeCode=<?php echo $employeecode?>" type="button" class="btn btn-square btn-outline-dark m-2"><i class="fa fa-lock"></i></a>
                                   <?php }
                                    ?>
                                </td>
                                <td><?php echo $departmentcode; ?></td>
                                <td>
                                    <a class="btn btn-square btn-outline-primary m-2" id="<?= $row['Id']?>"
                                        type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?= $row['Id'] ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop<?= $row['Id'] ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="staticBackdropLabel">Quản lý nhân viên
                                                    </h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="container-fluid pt-4 px-4">
                                                    <div class="row g-4">
                                                        <div class="col-sm-12 col-xl-12">
                                                            <div class="bg-light rounded h-100 p-4">
                                                                <h3 class="mb-4">Thông tin chi tiết nhân viên</h3>
                                                                <!-- SELECT-->
                                                                <?php
                                                            $sql2 = "SELECT * FROM `tb_employee` WHERE Id =" . $row['Id'];
                                                            $res2 = mysqli_query($conn,$sql2);
                                                            $row2 = mysqli_fetch_assoc($res2);                               
                                                            
                                                        ?>
                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeecode" readonly
                                                                        value="<?php echo $row2['EmployeeCode'] ?>">
                                                                    <label for="floatingInput">Mã nhân viên</label>
                                                                </div>
                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeename" readonly
                                                                        value="<?php echo $row2['EmployeeName'] ?>">
                                                                    <label for="floatingPassword">Tên nhân viên</label>
                                                                </div>
                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeeemail" readonly
                                                                        value="<?php echo $row2['EmployeeEmail'] ?>">
                                                                    <label for="floatingInput">Email</label>
                                                                </div>
                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeephone" readonly
                                                                        value="<?php echo $row2['EmployeePhone'] ?>">
                                                                    <label for="floatingInput">Số điện thoại</label>
                                                                </div>

                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeegender" readonly
                                                                        value="<?php if( $row2['EmployeeGender'] == 1){ echo 'Nam';} else if( $row2['EmployeeGender'] == 2){ echo 'Nữ';}?>">
                                                                    <label for="floatingInput">Giới tính</label>
                                                                </div>
                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeeaddress" readonly
                                                                        value="<?php  echo $row2['EmployeeAdress'] ?>">
                                                                    <label for="floatingInput">Địa chỉ</label>
                                                                </div>
                                                                <div style="width: 50%; margin-left:25%"
                                                                    class="form-floating mb-3">
                                                                    <input require type="text" class="form-control"
                                                                        name="employeeaddress" readonly
                                                                        value="<?php if( $row2['EmployeeStatus'] == 1){ echo 'Hoạt động';} else if( $row2['EmployeeStatus'] == 2){ echo 'Không hoạt động';} ?>">
                                                                    <label for="floatingInput">Trạng thái</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <!-- <td><a type="button" class="btn btn-square btn-outline-primary m-2"><i class="fa fa-eye"></i></a></td>                                                                                                       -->
                                <td><a href="updateEmployee.php?EmployeeCode=<?php echo $employeecode; ?>" type="button"
                                        class="btn btn-outline-warning m-2">Sửa</a></td>
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
