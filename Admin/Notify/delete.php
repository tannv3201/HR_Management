<?php
include('../../ConnectDatabase/connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM `tb_notify` WHERE Id = $id ";
$qr = mysqli_query($conn ,$sql );
if($qr){
    header("Location: http://localhost/HR_Management/admin/Notify/index.php ");

}else {
       echo $sql ;
}