<?php
include('header.php');
?>

<!-- Form Start -->
<?php
    $sql2 = "SELECT * FROM `tb_employee` WHERE EmployeeCode = '$employeecode1'";
    $res2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($res2);      
    $departmentcode = $row2['DepartmentCode'];
    $sql4 = "SELECT * FROM `tb_salary` WHERE EmployeeCode = '$employeecode1'";
    $res4 = mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_assoc($res4);   
?>
<div class="card-body">
    <div class="card-body">
        <center style="max-width:1140px; margin: 0 auto;">
            <div class="bia-avt">
                <div class="container">
                    <div class="c-page-title c-pull-left">
                        <img src="/images/bia.png" style="height: 350px;" alt="">

                    </div>
                </div>
            </div>
        </center>
        <div class="container c-size-md">
            <div class="col-md-12">
                <div class="text-center" style="margin-top: -128px;">             
                        <br>
                        <br>
                        <br>
                        <div class="container-avt"><img style="margin-left:3%;background-color: #f5f6fa; border: 20px solid #fff;" class="img-responsive c-rounded-full" width="100" height="100" src="../img/employee.jpg" alt="">
                            <!-- <button class="btn btn-success btn-circle btn-sm" data-bs-toggle="modal" data-bs-target="#avtModal"> <i class="fas fa-camera"></i>
                                    </button> -->
                        </div>
                  
                        <br>
                        <h3 style ="margin-left:3%" class="c-font-bold c-text-2xl c-mt-2"><?php echo $row2['EmployeeName'] ?></h3>
                        <h4 style ="margin-left:3%" class="c-font-bold c-text-2xl c-mt-2">
                            <font color="red">Nhân viên</font>
                        </h4>
                        <h2 style ="margin-left:3%"  class="c-text-xl c-font-red"><p style="color:yellow;" class="btn btn-square m-12"><i class="fa fa-star"></i></p><p style="color:yellow;" class="btn btn-square m-12"><i class="fa fa-star"></i></p><p style="color:yellow;" class="btn btn-square m-12"><i class="fa fa-star"></i></p><p style="color:yellow;" class="btn btn-square m-12"><i class="fa fa-star"></i></p><p style="color:yellow;" class="btn btn-square m-12"><i class="fa fa-star"></i></p></h2>               
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:-25px" class="menu_user bg-dark text-light px-2 pt-1 rounded"></div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-offset-md-4 col-md-3 mb-3">
            </div>
            <div class="col-xs-12 col-md-9">
                <div class="container-fluid c-ml-0 c-p-0">
                    <div class="panel mx-auto c-mb-3">
                        <div class="col-sm-12 dv-title">
                            <h3 style="margin-left:-1%" class="c-text-left c-uppercase c-border-l-4 c-border-green-600 c-font-bold c-text-2xl px-3"> Thông Tin Tài Khoản </h3>
                        </div>
                    </div>
                    <div class="content_post">
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
                                    <td><b><?php echo $row2['EmployeeEmail'] ?>  <i class="fas fa-check text-primary"></i></b>
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
                </div>
            </div>
        </div>
        <a style="margin-left:47%" href="updateif.php" class="btn btn-warning m-6">Sửa thông tin</a>
    </div>
    <br>
    <br>
    <?php
    include('footer.php');
    ?>