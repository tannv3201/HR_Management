<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Sứa phòng ban
    </h1>
    <hr>
    <br>
</div>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_qr = "SELECT * FROM tb_department where Id = $id";
    $qr = mysqli_query($conn, $sql_qr);
    $data = mysqli_fetch_assoc($qr);
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="navbar-nav w-100">
                <form action="" method="post">
                    <div class="form-floating" style="width: 50%; margin-left:25%">
                        <input readonly name="code" value="<?= $data['DepartmentCode'] ?>" type="text"
                            class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Mã phòng ban</label>
                    </div>
                    <br>
                    <div class="form-floating" style="width: 50%; margin-left:25%">
                        <input name="name" value="<?= $data['DepartmentName'] ?>" type="text" class="form-control"
                            id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Tên phòng ban</label>
                    </div>
                    <br>

                    <button name="submit" type="submit" style="width: 15%; margin-left:25%"
                        class="btn btn-secondary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $sql_u = "UPDATE `tb_department` SET 
    `DepartmentCode`='$code',
    `DepartmentName`='$name',
    `DepartmentStatus`=1,
    `CreateTime`=  now()
     WHERE `Id` = $id";
    $qr_u = mysqli_query($conn, $sql_u);
    if ($qr_u) {
        header('Location: http://localhost/HR_Management/admin/Department/index.php');
    }
}

?>

<?php
include('../../footer.php');
?>