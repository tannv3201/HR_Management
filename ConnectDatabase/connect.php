<?php
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'hr_management');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($conn)
    {
        mysqli_query($conn, "SET NAMES 'UTF8'");
    }
    else
    {
        echo "Kết nối thất bại";
    }
?>