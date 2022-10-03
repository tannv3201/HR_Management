<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Quản lý lương của nhân viên
    </h1>
    <hr>
    <br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Bảng lương</h3>
                <div class="table-responsive" style="height: 400px;">
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
                                <button class="btn btn-secondary" style="margin-left: 10px;" name="search" type="search">Tìm kiếm</button>
                                
                                <button type="button" style="margin-left: 10px;" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal3">
                                    Cập nhật số ngày
                                </button>

                                <button type="button" style="margin-left: 10px;" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal2">
                                    Tính lương
                                </button>

                                <button type="button" style="margin-left: 10px;" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Xóa dữ liệu
                                </button>
                                <!-- <button class="btn btn-secondary" style="margin-left: 45%;" onclick="">Xuất Excel</button> -->
                            </div>

                        </thead>
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã nhân viên</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Hệ số lương</th>
                                <th scope="col">Số ngày đi làm</th>
                                <th scope="col">Số giờ làm thêm</th>
                                <th scope="col">Thưởng</th>
                                <th scope="col">Lương</th>
                                <th scope="col">Tổng lương</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {

                                $code = $_POST['EmployeeCode'];
                                if($code == "") {
                                    $sql  = 'SELECT * FROM tb_salary WHERE SalaryStatus = 1';
                                } else {
                                    $sql = "SELECT * FROM tb_salary WHERE SalaryStatus = 1 AND EmployeeCode ='$code'";
                                }
                            } else {
                                $sql  = 'SELECT * FROM tb_salary WHERE SalaryStatus = 1';
                            }

                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $id = 0;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ++$id;
                                    $EmployeeCode = $row['EmployeeCode'];
                                    $EmployeeName = $row['EmployeeName'];
                                    $SalaryCoefficients = $row['SalaryCoefficients'];
                                    $SalaryDay = $row['SalaryDay'];
                                    $SalaryOT = $row['SalaryOT'];
                                    $SalarySum = $row['SalarySum'];
                                    $SalaryStatus = $row['SalaryStatus'];

                                    if($SalaryDay >= 22) {
                                        $bonus = 500000;
                                    } else {
                                        $bonus = 0;
                                    }
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $EmployeeCode; ?></td>
                                        <td><?php echo $EmployeeName; ?></td>
                                        <td><?php echo $SalaryCoefficients; ?></td>
                                        <td><?php echo $SalaryDay; ?></td>
                                        <td><?php echo $SalaryOT; ?></td>
                                        <td><?php echo $bonus; ?></td>
                                        <td><?php echo $SalarySum; ?></td>
                                        <td><?php echo $SalarySum + $bonus; ?></td>
                                        <td><?php
                                            if ($SalaryStatus == 1) {
                                                echo 'Hiệu lực';
                                            } else {
                                                echo 'Không hiệu lực';
                                            }
                                            ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                        </tbody>
                    </table>
                    <p style="width: 100%; text-align: center;">Không tồn tại dữ liệu</p>
                <?php
                            }
                ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>

<form action="resetData.php" method="post">
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xóa dữ liệu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Xác nhận xóa dữ liệu lương?
                </div>


                <div class="modal-footer">
                    <button type="resetData" name="resetData" class="btn btn-secondary">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="update.php" method="post">
    <!-- The Modal -->
    <div class="modal" id="myModal3">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhật số ngày lương</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Xác nhận cập nhật số ngày lương?
                </div>


                <div class="modal-footer">
                    <button type="update" name="update" class="btn btn-secondary">Cập nhật </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="caculateSalary.php" method="post">
    <!-- The Modal -->
    <div class="modal" id="myModal2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tính lương</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Xác nhận tính lương?
                </div>


                <div class="modal-footer">
                    <button type="caculateSalary" name="caculateSalary" class="btn btn-secondary">Tính lương</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include('../../footer.php');
?>