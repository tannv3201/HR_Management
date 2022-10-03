<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Quản lý chấm công của nhân viên
    </h1>
    <hr>
    <br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Bảng chấm công</h3>
                <div class="table-responsive" style="height: 400px;">
                    <table class="table">
                        <thead>
                            <div style="display: flex;">
                                <input type="text" name="EmployeeCode" class="form-control" placeholder="Mã nhân viên" aria-label="Mã nhân viên" aria-describedby="basic-addon2" style="width: 20%; height:40px;">
                                <button class="btn btn-secondary" style="margin-left: 10px;" name="search" type="search">Tìm kiếm</button>
                                <button class="btn btn-secondary" style="margin-left: 10px;" onclick="window.local.href = 'index.php'">Đặt lại</button>
                                <!-- <button class="btn btn-secondary" style="margin-left: 10px;">Xóa dữ liệu</button> -->

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
                                <th scope="col">Ngày chấm</th>
                                <th scope="col">Bắt đầu làm</th>
                                <th scope="col">Kết thúc làm</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                $code = $_POST['EmployeeCode'];
                                $sql = "SELECT * FROM tb_attendance WHERE AttendanceStatus = 1 AND EmployeeCode ='$code'";
                            } else {
                                $sql  = 'SELECT * FROM tb_attendance WHERE AttendanceStatus = 1';
                            }

                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $id = 0;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ++$id;
                                    $EmployeeCode = $row['EmployeeCode'];
                                    $EmployeeName = $row['EmployeeName'];
                                    $AttendanceDate = $row['AttendanceDate'];
                                    $AttendanceStart = $row['AttendanceStart'];
                                    $AttendanceEnd = $row['AttendanceEnd'];
                                    $AttendanceStatus = $row['AttendanceStatus'];
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $EmployeeCode; ?></td>
                                        <td><?php echo $EmployeeName; ?></td>
                                        <td><?php echo $AttendanceDate; ?></td>
                                        <td><?php echo $AttendanceStart; ?></td>
                                        <td><?php echo $AttendanceEnd; ?></td>
                                        <td><?php
                                            if ($AttendanceStatus == 1) {
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
                    Xác nhận xóa dữ liệu chấm công?
                </div>


                <div class="modal-footer">
                    <button type="resetData" name="resetData" class="btn btn-danger">Xóa</button>
                </div>



            </div>
        </div>
    </div>
</form>
<?php
include('../../footer.php');
?>