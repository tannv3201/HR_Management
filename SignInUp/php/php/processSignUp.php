<?php
    session_start();
    include_once "connect.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($pass1) && !empty($pass2)) {
        //CHECK 
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check định dạng email
            $sql = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$email - This email already exist!";
            } else {
                if ($pass1 == $pass2) {
                    $sql2 = "INSERT INTO tb_user(firstName, lastName, email, user_pass, phoneNumber, levelUser, status, image)
                            VALUES('$fname', '$lname', '$email','$pass1', '$phone', 3, 2, 'user_default.png')";
                    $res2 = mysqli_query($conn, $sql2);
                    if ($res2 == TRUE) {
                        $sql3 = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '{$email}'");
                        if (mysqli_num_rows($sql3) > 0) {
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['id_user'] = $row['id_user'];
                            echo "Đăng ký thành công";
                        }
                    } else {
                        echo "Something went wrong!";
                    }
                } else {
                    echo "Mật khẩu không trùng nhau!";
                }
            }
        } else {
            echo "$email - Không đúng định dạng email";
        }
    } else {
        echo "Phải điền đầy đủ thông tin!";
    }
?>
