<?php
include('../../ConnectDatabase/connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM `tb_department` WHERE Id = $id ";
$qr = mysqli_query($conn ,$sql);
if($qr){
    header("location: http://localhost/HR_Management/admin/Department/index.php ");
}else {
       echo $sql ;
}