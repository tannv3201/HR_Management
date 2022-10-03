<?php
include('../../ConnectDatabase/connect.php');

if (isset($_POST['update'])) {

    $sql1 = "SELECT COUNT(*) AS SalaryDay, EmployeeCode FROM tb_attendance
    WHERE AttendanceStatus = 1
    GROUP BY EmployeeCode";

    $sql2 = "SELECT SUM(HOUR(AttendanceStart)) AS AttendanceStart , SUM(HOUR(AttendanceEnd)) AS AttendanceEnd, EmployeeCode
        FROM tb_attendance
        WHERE AttendanceStatus = 1
        GROUP BY EmployeeCode";

    $res1 = mysqli_query($conn, $sql1);

    $res2 = mysqli_query($conn, $sql2);

    while ($row1 = mysqli_fetch_assoc($res1)) {
        $SalaryDay = $row1['SalaryDay'];
        $EmployeeCode1 = $row1['EmployeeCode'];

        $sql = "UPDATE tb_salary 
        SET 
            SalaryDay = $SalaryDay
        WHERE EmployeeCode = '$EmployeeCode1'
        ";
        $res = mysqli_query($conn, $sql);
    }

    while ($row2 = mysqli_fetch_assoc($res2)) {
        $AttendanceStart = $row2['AttendanceStart'];
        $AttendanceEnd = $row2['AttendanceEnd'];
        $EmployeeCode1 = $row2['EmployeeCode'];

        $SalaryOT = ($AttendanceEnd - $AttendanceStart - 9.5);

        if ($SalaryOT > 0) {
            $sql3 = "UPDATE tb_salary 
            SET 
                SalaryOT = $SalaryOT
            WHERE EmployeeCode = '$EmployeeCode1'
            ";
            $res3 = mysqli_query($conn, $sql3);
        }
        else {
            $sql4 = "UPDATE tb_salary 
            SET 
                SalaryOT = 0
            WHERE EmployeeCode = '$EmployeeCode1'
            ";
            $res4 = mysqli_query($conn, $sql3);
        }
    }

    if ($res == true && ($res3 == true || $res4 == true)) {
        header('Location:index.php');
    }
}
?>

