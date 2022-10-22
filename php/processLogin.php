<?php
     session_start();
    include_once "connect.php";
     $username = mysqli_real_escape_string($conn, $_POST['Username']);
     $password = mysqli_real_escape_string($conn, $_POST['Password']);
     if(!empty($username) && !empty($password)){
         $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE UserName = '{$username}' AND Password = '{$password}' AND status in (1,2)");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $level = $row['Level'];
            $status = $row['status'];
            if($level == 1){
                $_SESSION['id_adminSession'] = $row['UserName'];
                }
            else if($level == 2){
                $_SESSION['id_emloyeeSession'] = $row['UserName'];
                }
          
            }
        else{            
          echo "Tài khoản hoặc mật khẩu không chính xác.";
            }
     }
     else{
         echo "Chưa nhập tài khoản hoặc mật khẩu.";
     }
?>