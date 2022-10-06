<?php
include('header.php');
ob_start();

?>

<!-- Form Start -->
<?php
$sql2 = "SELECT * FROM `tb_employee` WHERE EmployeeCode = '$employeecode1'";
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($res2);
$departmentcode = $row2['DepartmentCode'];
$sql4 = "SELECT * FROM `tb_salary` WHERE EmployeeCode = '$employeecode1'";
$res4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($res4);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-3">
            <div class="bg-light rounded h-100 p-4">
                <div class="mb-3">
                    <img style="margin-left: 25%; border-radius:50%" width="120" height="120" src="../img/employee.jpg" alt="">
                </div>
                <div class="mb-3">
                    <h3 style="margin-left:19%" class="c-font-bold c-text-2xl c-mt-2"><?php echo $row2['EmployeeName'] ?></h3>
                </div>
                <div class="mb-3 form-check">
                    <h5 style="margin-left:19%" class="c-font-bold c-text-2xl c-mt-2">
                        <font color="red">Nhân viên</font>
                    </h5>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-xl-9">
            <div class="bg-light rounded h-100 p-4">
                <div class="content_post">
                    <div class="panel mx-auto c-mb-3">
                        <div class="col-sm-12 dv-title">
                            <h3 style="margin-left:-1%" class="c-text-left c-uppercase c-border-l-4 c-border-green-600 c-font-bold c-text-2xl px-3"> Thông Tin Nhân Viên</h3>
                        </div>
                    </div>
                    <table class="table table-hover table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">ID:</th>
                                <th><span><?php echo $row2['Id'] ?></span>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Mã nhân viên:</th>
                                <th><b class="text-primary"><span><?php echo $row2['EmployeeCode'] ?></span> </th>
                            </tr>
                            <tr>
                                <th scope="row">Họ Và Tên:</th>
                                <th><?php echo $row2['EmployeeName'] ?>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td><b><?php echo $row2['EmployeeEmail'] ?> <i class="fas fa-check text-primary"></i></b>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Điện thoại:</th>
                                <td><b><?php echo $row2['EmployeePhone'] ?></b>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Giới tính:</th>
                                <td><b><?php if ($row2['EmployeeGender'] == 1) {
                                            echo 'Nam';
                                        } else if ($row2['EmployeeGender'] == 2) {
                                            echo 'Nữ';
                                        } ?></b>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Địa chỉ:</th>
                                <td><b><?php echo $row2['EmployeeAdress'] ?></b>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Trạng thái:</th>
                                <td><b><?php if ($row2['EmployeeStatus'] == 1) {
                                            echo 'Hoạt động';
                                        } else if ($row2['EmployeeStatus'] == 2) {
                                            echo 'Không hoạt động';
                                        } ?></b>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Phòng ban:</th>
                                <td><b><?php echo $row2['DepartmentCode'] ?></b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="updateif.php" class="btn btn-warning m-6">Sửa thông tin</a>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>