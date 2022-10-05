<?php
    include('../header.php');
    if(!isset($_SESSION['id_adminSession'])) //nếu chưa đăng nhập thì ra ngoài
    {
        header("Location:./index.php");
    }
?>

<?php
    include('../footer.php');
?>