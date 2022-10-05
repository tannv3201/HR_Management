<?php  
    include('../../header.php');
?>

<!-- Form Start -->
<h2 style="margin-left:2%; margin-top:2%" class="mb-2">Quản lý nhân viên</h2>
<div style="width:100%; height: 5px; color:black" class="lane"></div>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">                   
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h3 class="mb-4">Cập nhật thông tin nhân viên</h3>
                            <form action="" method="POST" class="register" enctype="multipart/form-data">
                            <!-- SELECT-->
                            <?php
                                 if(isset($_GET['EmployeeCode'])){
                                    $employeecode1 = $_GET['EmployeeCode'];
                                }
                                $sql2 = "SELECT * FROM `tb_employee` WHERE EmployeeCode = '$employeecode1'";
                                $res2 = mysqli_query($conn,$sql2);
                                $row2 = mysqli_fetch_assoc($res2);      
                                $sql4 = "SELECT * FROM `tb_salary` WHERE EmployeeCode = '$employeecode1'";
                                $res4 = mysqli_query($conn,$sql4);
                                $row4 = mysqli_fetch_assoc($res4);                               
                                
                            ?>
                            <!-- INSERT -->
                                <?php
                                    if(isset($_POST['submit'])){
                                        $employeecode = $_POST['employeecode'];
                                        $employeename = $_POST['employeename'];
                                        $employeeemail = $_POST['employeeemail'];
                                        $employeephone = $_POST['employeephone'];
                                        $employeegender = $_POST['employeegender'];
                                        $employeeaddress = $_POST['employeeaddress'];
                                        $departmentcode = $_POST['departmentcode'];
                                        $salarycoefficients = $_POST['salarycoefficients'];

                                                $sql = "UPDATE `tb_employee` SET
                                                `EmployeeName`='$employeename',
                                                `EmployeeEmail`='$employeeemail',
                                                `EmployeePhone`='$employeephone',
                                                `EmployeeGender`='$employeegender',
                                                `EmployeeAdress`='$employeeaddress',
                                                `DepartmentCode`='$departmentcode' WHERE EmployeeCode = '$employeecode'";
                                                $sql3 = "UPDATE `tb_salary` SET `SalaryCoefficients`=  $salarycoefficients WHERE EmployeeCode = '$employeecode'";
                                            $res3 = mysqli_query($conn,$sql3);
                                            $res = mysqli_query($conn, $sql);
                                            if($res == true || $res3 ==true){
                                                header('Location:index.php');
                                            }
                                            else{
                                                header('Location:index.php');
                                            }
                                        }
                                    
                                ?>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeecode" readonly value ="<?php echo $row2['EmployeeCode'] ?>" >
                                <label for="floatingInput">Mã nhân viên</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name="employeename" value ="<?php echo $row2['EmployeeName'] ?>">
                                <label for="floatingPassword">Tên nhân viên</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeeemail" value ="<?php echo $row2['EmployeeEmail'] ?>">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employeephone" value ="<?php echo $row2['EmployeePhone'] ?>">
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
                                <input require type="text" class="form-control" name ="employeeaddress" value ="<?php echo $row2['EmployeeAdress'] ?>" >
                                <label for="floatingInput">Địa chỉ</label>
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="employstatus" readonly value="<?php if ($row2['EmployeeStatus'] == 1) {
                                                                                                                                                                                echo 'Hoạt động';
                                                                                                                                                                            } else if ($row2['EmployeeStatus'] == 2) {
                                                                                                                                                                                echo 'Không hoạt động';
                                                                                                                                                                            } ?>">
                                <label for="floatingInput">Trạng thái</label>
                            </div>                   
                            <div style ="width: 50%; margin-left:25%; margin-top:10px;" class="form-floating mb-3">
                                <select name="departmentcode" class="form-select" name = "employeestatus"
                                    aria-label="Floating label select example">
                                    <?php
                                    $sql2 = "SELECT * FROM `tb_department`";
                                    $res2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($res2)) {
                                        while ($row2 = mysqli_fetch_assoc($res2)) {
                                            echo '<option value="' . $row2['DepartmentCode'] . '">' . $row2['DepartmentName'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="floatingSelect">Trạng thái</label>
                           
                            </div>
                            <div style ="width: 50%; margin-left:25%" class="form-floating mb-3">
                                <input require type="text" class="form-control" name ="salarycoefficients" value ="<?php echo $row4['SalaryCoefficients'] ?>">
                                <label for="floatingInput">Hệ số lương</label>
                            </div>
                            <br>
                            <button name = "submit" style ="margin-left:43%" type="submit" class="btn btn-primary m-6">Cập nhật</button>
                            <a href="http://localhost/HR_Management/Admin/Employee/index.php" class="btn btn-secondary m-6">Hủy bỏ</a>
                            </form>
                        </div>  
                    </div>                  
            </div>
        
<?php
    include('../../footer.php');
?>