<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_qr = "SELECT * FROM tb_notify where Id = $id";
    $qr = mysqli_query($conn, $sql_qr);
    $data = mysqli_fetch_assoc($qr);
}
?>
<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Sửa phòng ban
    </h1>
    <hr>
    <br>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="navbar-nav w-100">
                <form action="" method="post">
                    <div class="form-floating" style="width: 50%; margin-left:25%">
                        <input name="name" value="<?= $data['NotifyName'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">NotifyName</label>
                    </div>
                    <br>
                    <div class="form-floating " style="width: 50%; margin-left:25%">
                        <input name="content" value="<?= $data['NotifyContent'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">NotifyContent</label>
                    </div>
                    <br>
                    
                    <button name="submit" type="submit" style="width: 15%; margin-left:25%" class="btn btn-secondary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>





</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $sql_u = "UPDATE `tb_notify` SET 
    `NotifyName`='$name',
    `NotifyContent`='$content',
    `CreateTime`= now(),
    `NotifyStatus`='$status' 
    WHERE Id = $id";
    $qr_u = mysqli_query($conn, $sql_u);
    if ($qr_u) {
        header("Location: http://localhost/HR_Management/admin/Notify/index.php ");
    }
}

?>
<?php
include('../../footer.php');
?>