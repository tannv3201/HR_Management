<?php
include('header.php')
?>


<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Chấm công
    </h1>
    <hr>
    <br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4">
                <h3 class="mb-4">Bảng chấm công</h3>
                <div class="table-responsive" style="height: 400px;">
                    <table class="table" id="exportTable">
                        <thead>
                            <div style="display: flex;">
                                <!-- <input type="EmployeeCode" name="EmployeeCode" class="form-control" placeholder="Mã nhân viên" aria-label="Mã nhân viên" aria-describedby="basic-addon2" style="width: 20%; height:40px;"> -->
                                <button type="button" style="margin-left: 10px;" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Bắt đầu làm
                                </button>

                                <button type="button" class="btn btn-secondary" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#myModal1">
                                    Kết thúc làm
                                </button>

                            </div>
                            <br>
                        </thead>
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Ngày chấm</th>
                                <th scope="col">Bắt đầu làm</th>
                                <th scope="col">Kết thúc làm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql  = "SELECT * FROM tb_attendance WHERE EmployeeCode = '$employeecode1' AND AttendanceStatus = 1";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            $id = 0;
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ++$id;
                                    $EmployeeName = $row['EmployeeName'];
                                    $AttendanceDate = $row['AttendanceDate'];
                                    $AttendanceStart = $row['AttendanceStart'];
                                    $AttendanceEnd = $row['AttendanceEnd'];
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $AttendanceDate; ?></td>
                                        <td><?php echo $AttendanceStart; ?></td>
                                        <td><?php echo $AttendanceEnd; ?></td>
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

<form action="" method="post">
    <!-- The Modal -->
    
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chấm công</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Bắt đầu làm?
                </div>


                <div class="modal-footer">
                    <button type="startDay" name="startDay" class="btn btn-primary"><a href="./startAttendance.php?EmployeeCode=<?php echo $employeecode1;?>" style="color: white;">Bắt đầu</a></button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="" method="post">
    <!-- The Modal -->
    <div class="modal" id="myModal1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chấm công</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Kết thúc làm?
                </div>
                
                <div class="modal-footer">
                    <button type="endDay" name="endDay" class="btn btn-primary"><a href="./endAttendance.php?EmployeeCode=<?php echo $employeecode1;?>" style="color: white;">Kết thúc</a></button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include('footer.php');
?>