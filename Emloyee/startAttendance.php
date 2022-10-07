<?php
    include('../ConnectDatabase/connect.php');  
    if(isset($_GET['EmployeeCode'])){
        $employeecode1 = $_GET['EmployeeCode'];
    };
    $sql1  = "SELECT * FROM tb_employee WHERE EmployeeCode = '$employeecode1' AND EmployeeStatus = 1";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $empName = $row1['EmployeeName'];

    $sql2 = "INSERT INTO tb_attendance(EmployeeCode, EmployeeName, AttendanceDate, AttendanceStart, AttendanceEnd,AttendanceStatus)
    VALUES ('$employeecode1', '$empName', CURRENT_DATE(), CURRENT_TIME(), NULL, 1)
    ";
    $res2 = mysqli_query($conn, $sql2);

    if($res2==true) {
        header('Location:attendance.php');
    } else {
        echo 'không thành công';
    }
?>