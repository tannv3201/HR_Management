<?php
include('../../ConnectDatabase/connect.php');

if (isset($_POST['resetData'])) {
    $sql = "UPDATE tb_attendance SET AttendanceStatus = 2";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        header('Location:index.php');
    }
}
?>