<?php
  
   include('../../ConnectDatabase/connect.php');

    if(isset($_GET['EmployeeCode'])){
        $employeecode1 = $_GET['EmployeeCode'];
    }
    $sql1 ="SELECT * FROM `tb_employee` WHERE EmployeeCode = '$employeecode1'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $status = $row1['EmployeeStatus'];
    if($status == 1){ 
        $sql = "UPDATE `tb_employee` SET `EmployeeStatus`= 2 WHERE EmployeeCode = '$employeecode1'";
        $sql1 = "UPDATE `tb_salary` SET `SalaryStatus`= 2 WHERE EmployeeCode = '$employeecode1'";
        $sql2 = "UPDATE `tb_user` SET `status`= 2 WHERE UserName = '$employeecode1'";
        $res = mysqli_query($conn, $sql);
        $res1 = mysqli_query($conn,$sql1);
        $res2 = mysqli_query($conn,$sql2);
        if($res==true){
            header('Location:index.php');
        }
        else{
            header('Location:index.php');
        }
    }
    else if($status == 2){
        $sql = "UPDATE `tb_employee` SET `EmployeeStatus`= 1 WHERE EmployeeCode = '$employeecode1'";
        $sql1 = "UPDATE `tb_salary` SET `SalaryStatus`= 1 WHERE EmployeeCode = '$employeecode1'";
        $sql2 = "UPDATE `tb_user` SET `status`= 1 WHERE UserName = '$employeecode1'";
        $res = mysqli_query($conn, $sql);
        $res1 = mysqli_query($conn,$sql1);
        $res2 = mysqli_query($conn,$sql2);
        if($res==true){
            header('Location:index.php');
        }
        else{
            header('Location:index.php');
        }
    }
?>
