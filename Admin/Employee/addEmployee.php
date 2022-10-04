<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>

<!-- Form Start -->
<h2 style="margin-left:2%; margin-top:2%" class="mb-2">Quản lý nhân viên</h2>
<div style="width:100%; height: 5px; color:black" class="lane"></div>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">                   
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h3 class="mb-4">Thêm nhân viên</h3>
                            <form action="" method="POST" class="register" enctype="multipart/form-data">
                                                    <!-- INSERT -->
                                <?php
                                    if(isset($_POST['submit'])){
                                        $employeecode = $_POST['employeecode'];
                                        $employeename = $_POST['employeename'];
                                        $employeeemail = $_POST['employeeemail'];
                                        $employeephone = $_POST['employeephone'];
                                        $employeegender = $_POST['employeegender'];
                                        $employeeaddress = $_POST['employeeaddress'];
                                        $employeestatus = $_POST['employeestatus'];
                                        $departmentcode = $_POST['departmentcode'];

                                        
                                                $sql = "INSERT INTO `tb_employee`(`EmployeeCode`, `EmployeeName`, `EmployeeEmail`, `EmployeePhone`, `EmployeeGender`, `EmployeeAdress`, `EmployeeStatus`, `DepartmentCode`) 
                                                VALUES ('$employeecode','$employeename','$employeeemail','$employeephone','$employeegender','$employeeaddress','$employeestatus','$departmentcode')";
                                                $sql1= "INSERT INTO `tb_salary`(`EmployeeCode`, `EmployeeName`) 
                                                VALUES ('$employeecode','$employeename')";
                                            $res = mysqli_query($conn, $sql);
                                            $res1 = mysqli_query($conn,$sql1);                                       
                                            if($res == true && $res1 == true){
                                                echo 'cc';
                                            }
                                            else{
                                                header('Location:index.php');
                                            }
                                        }
                                    
                                ?>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeecode">
                                <label for="floatingInput">Mã nhân viên</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name="employeename">
                                <label for="floatingPassword">Tên nhân viên</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeeemail">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeephone">
                                <label for="floatingInput">Số điện thoại</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                            <div class="col-sm-10">
                            <label for="floatingInput">Giới tính:</label></br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="employeegender" value="1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Nam 
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"  name="employeegender" value="2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Nữ
                                            </label>
                                        </div>
                                    </div>
                                
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeeaddress">
                                <label for="floatingInput">Địa chỉ</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <select class="form-select" name = "employeestatus"
                                    aria-label="Floating label select example">
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                </select>
                                <label for="floatingSelect">Trạng thái</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="departmentcode">
                                <label for="floatingInput">Phòng ban</label>
                            </div>
                            <br>
                            <button name = "submit" style ="margin-left:43%" type="submit" class="btn btn-primary m-6">Thêm</button>
                            <a href="http://localhost/HR_Management/Admin/Employee/index.php" class="btn btn-secondary m-6">Hủy bỏ</a>
                            </form>
                        </div>  
                    </div>                  
            </div>
        
<?php
    include('../../footer.php');
?>