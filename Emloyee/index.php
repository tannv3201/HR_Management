<?php
    include('../ConnectDatabase/connect.php');
    include('header.php');  
    session_start();
    $employeecode1 = $_SESSION['id_emloyeeSession'];
    echo $employeecode1;
?>

<?php
    include('footer.php');
?>