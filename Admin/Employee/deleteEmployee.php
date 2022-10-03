<?php
  
   include('../../ConnectDatabase/connect.php');

    if(isset($_GET['EmployeeCode'])){
        $employeecode1 = $_GET['EmployeeCode'];
    }
    $sql = "UPDATE `tb_employee` SET `EmployeeStatus`= 2 WHERE EmployeeCode = '$employeecode1'";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        header('Location:index.php');
    }
    else{
        header('Location:index.php');
    }
?>
