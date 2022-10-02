<?php
     session_start();
     include_once "connect.php";
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $pass = mysqli_real_escape_string($conn, $_POST['password']);
     
     if(!empty($email) && !empty($pass)){
        $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '{$email}' AND user_pass = '{$pass}' AND STATUS in (1,2)");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $level = $row['levelUser'];
            $status = $row['status'];
            if($level == 1){
                echo "admin";
                $_SESSION['id_adminSession'] = $row['id_user'];
            }
            if($level == 2){
                echo "staff";
                $_SESSION['id_staffSession'] = $row['id_user'];
            }
            if($level == 3){
                echo "customer";
                $_SESSION['id_customerSession'] = $row['id_user'];
            }
            if($level == 4)
            {
                echo "success";
            }
        }
        else{            
          echo "Tài khoản hoặc mật khẩu không chính xác.";
        }
     }
     else{
         echo "Chưa nhập tài khoản hoặc mật khẩu.";
     }
