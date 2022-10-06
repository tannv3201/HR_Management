<?php
    include('../ConnectDatabase/connect.php');  
    if(isset($_GET['EmployeeCode'])){
        $employeecode1 = $_GET['EmployeeCode'];
    };
    $sql1  = "SELECT CURRENT_DATE() AS AttendanceDate";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $date = $row1['AttendanceDate'];



    $sql2 = "UPDATE tb_attendance
        SET AttendanceEnd = CURRENT_TIME()
        WHERE EmployeeCode = '$employeecode1' AND AttendanceDate LIKE '$date'
    ";
    $res2 = mysqli_query($conn, $sql2);

    if($res2==true) {
        header('Location:attendance.php');
    } else {
        echo 'không thành công';
    }
?>