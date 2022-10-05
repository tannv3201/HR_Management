<?php
    include('../header.php');
?>
<div>
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-people-fill fa-3x text-primary"></i>
                    <div class="ms-3" style="text-align: center;">
                        <p class="mb-2">Nhân viên</p>
                        <?php
                        $sql = "Select* from tb_employee Where EmployeeStatus = 1";
                        $res = mysqli_query($conn, $sql);

                        ?>
                        <h4 class="mb-0"><?php echo mysqli_num_rows($res); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-laptop fa-3x text-primary"></i>
                    <div class="ms-3" style="text-align: center;">
                        <p class="mb-2">Phòng ban</p>
                        <?php
                        $sql1 = "Select* from tb_department Where DepartmentStatus = 1";
                        $res1 = mysqli_query($conn, $sql1);

                        ?>
                        <h4 class="mb-0"><?php echo mysqli_num_rows($res1); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-calendar-check-fill fa-3x text-primary"></i>
                    <div class="ms-3" style="text-align: center;">
                        <p class="mb-2">Chấm công</p>
                        <?php
                        $sql2 = "Select* from tb_attendance Where AttendanceStatus = 1";
                        $res2 = mysqli_query($conn, $sql2);

                        ?>
                        <h4 class="mb-0"><?php echo mysqli_num_rows($res2); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-bell-fill fa-3x text-primary" style="text-align: center;"></i>
                    <div class="ms-3" style="text-align: center;">
                        <p class="mb-2">Thông báo</p>
                        <?php
                        $sql3 = "Select* from tb_notify Where NotifyStatus = 1";
                        $res3 = mysqli_query($conn, $sql3);

                        ?>
                        <h4 class="mb-0"><?php echo mysqli_num_rows($res3); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Worldwide Sales</h6>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Salse & Revenue</h6>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->


    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4" style="display: flex;">
        <div class="bg-light text-center rounded p-4" style="width: 60%; margin-right: 5%;">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Thông tin chấm công</h6>
                <a href="http://localhost/HR_Management/Admin/Attendance">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Ngày</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Phòng ban</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Số ngày đã chấm công</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql4 = "SELECT emp.EmployeeCode, emp.EmployeeName, dep.DepartmentName, att.AttendanceStart, COUNT(*) AS NumberAttendance 
                                FROM tb_employee emp, tb_department dep, tb_attendance att 
                                WHERE emp.DepartmentCode = dep.DepartmentCode 
                                AND emp.EmployeeCode = att.EmployeeCode 
                                AND att.AttendanceStatus = 1
                                GROUP BY emp.EmployeeCode
                                ";
                        $res4 = mysqli_query($conn, $sql4);

                        while ($row4 = mysqli_fetch_assoc($res4)) {
                            $empName = $row4['EmployeeName'];
                            $depName = $row4['DepartmentName'];
                            $attStart = $row4['AttendanceStart'];
                            $numberAtt = $row4['NumberAttendance'];

                            $date = new DateTime($attStart);
                            $newDate = $date -> format('d/m/y');
                        ?>
                            <tr>
                                <td><?php echo date("d/m/y") ?></td>
                                <td><?php echo $empName; ?></td>
                                <td><?php echo $depName; ?></td>
                                <td>
                                    <?php
                                        if(date("d/m/y") == $newDate) {
                                            echo 'Đã chấm công';
                                        } else {
                                            echo 'Chưa chấm công';
                                        }
                                    ?>
                                </td>
                                <td><?php echo $numberAtt; ?></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="row g-4">

        </div>
        <div class="h-100 bg-light rounded p-4" style="width: 35%;">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Calender</h6>
            </div>
            <div id="calender"></div>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


</div>
<?php
include('../footer.php');
?>