<?php
   include('../../header.php');

   if(isset($_POST['status'])){
        $status = $_POST['status'];
        $id = $_POST['id']; 
        if($status == 1 ){
            $status_update = 2 ;
        }else {
            $status_update = 1 ;
        }
        $sql = "UPDATE `tb_department` SET  `DepartmentStatus`= $status_update WHERE `Id`=$id";
        echo $sql ;
        $qr = mysqli_query($conn,$sql);
   }