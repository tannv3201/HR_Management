<?php
include('../../ConnectDatabase/connect.php');

if (isset($_POST['caculateSalary'])) {
    $sql = "SELECT SalaryCoefficients, SalaryDay, SalaryOT, EmployeeCode
    FROM tb_salary
    WHERE SalaryStatus = 1";

    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)) {
        $SalaryCoefficients = $row['SalaryCoefficients'];
        $SalaryDay = $row['SalaryDay'];
        $SalaryOT = $row['SalaryOT'];
        $EmployeeCode = $row['EmployeeCode'];

        $SalarySum = ($SalaryCoefficients * $SalaryDay)+ ($SalaryOT * (($SalaryCoefficients * 2) / 22));

        $sql1 = "UPDATE tb_salary
                SET SalarySum = $SalarySum
                WHERE EmployeeCode = '$EmployeeCode'

        ";
        $res1 = mysqli_query($conn, $sql1);
    }

    if($res1 == true) {
        header('Location:index.php');
    }
}
?>