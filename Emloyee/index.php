<?php
include('header.php')
?>
<div class="container-fluid pt-4 px-4" style="display: flex;">
    <div class="bg-light text-center rounded p-4" style="width: 60%; margin-right: 5%;">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Thông tin chấm công</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Ngày</th>
                        <th scope="col">Nhân viên</th>
                        <th scope="col">Phòng ban</th>
                        <th scope="col">Bắt đầu làm lúc</th>
                        <th scope="col"> Kết thúc làm lúc</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql1  = "SELECT CURRENT_DATE() AS AttendanceDate";
                    $res1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($res1);
                    $curentDate = $row1['AttendanceDate'];

                    $sql4 = "SELECT emp.EmployeeCode, emp.EmployeeName, dep.DepartmentName, att.AttendanceDate, att.AttendanceStart, att.AttendanceEnd
                                FROM tb_employee emp, tb_department dep, tb_attendance att 
                                WHERE emp.DepartmentCode = dep.DepartmentCode 
                                AND emp.EmployeeCode = att.EmployeeCode 
                                AND att.AttendanceStatus = 1
                                AND emp.EmployeeCode = '$employeecode1'
                                ";
                    $res4 = mysqli_query($conn, $sql4);

                    while ($row4 = mysqli_fetch_assoc($res4)) {
                        $empName = $row4['EmployeeName'];
                        $depName = $row4['DepartmentName'];
                        $attStart = $row4['AttendanceStart'];
                        $attDate = $row4['AttendanceDate'];
                        $attEnd = $row4['AttendanceEnd'];
                    ?>
                        <tr>
                            <td><?php echo $attDate; ?></td>
                            <td><?php echo $empName; ?></td>
                            <td><?php echo $depName; ?></td>
                            <td>
                                <?php
                                if (empty($attStart)) {
                                    echo 'Chưa bắt đầu làm';
                                } else {
                                    echo $attStart;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (empty($attEnd)) {
                                    echo 'Chưa kết thúc làm';
                                } else {
                                    echo $attEnd;
                                }
                                ?>
                            </td>
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

<?php
include('footer.php');
?>