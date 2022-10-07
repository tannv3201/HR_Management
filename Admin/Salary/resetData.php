<?php
include('../../ConnectDatabase/connect.php');

if (isset($_POST['resetData'])) {
    $sql = "UPDATE tb_salary 
            SET 
                SalaryDay = 0,
                SalaryOT = 0,
                SalarySum = 0
    ";
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        header('Location:index.php');
    }

}
?>