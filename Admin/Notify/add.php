<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Thêm thông báo
    </h1>
    <hr>
    <br>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4">
            <form action="" method="post">
                <div class="form-floating" style="width: 50%; margin-left:25%">
                    <input required name="name" type="text" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Tiêu đề</label>
                </div>
                <br>
                <div class="form-floating " style="width: 50%; margin-left:25%">
                    <textarea required name="content" type="text" class="form-control h-50 d-inline-block"
                        id="floatingInput" placeholder="name@example.com">
                    </textarea>
                    <label for="floatingInput">Nội dung</label>
                </div>

                <br>
                <button name="submit" type="" style="width: 15%; margin-left:25%" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>


</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $sql_add = "INSERT INTO `tb_notify`(`Id`, `NotifyName`, `NotifyContent`, `CreateTime`, `NotifyStatus`)
      VALUES ('','$name','$content',now(),1)";
    $qr_add = mysqli_query($conn, $sql_add);
    if ($qr_add) {
        header("Location: http://localhost/HR_Management/admin/Notify/index.php ");
    }
}

?>
<?php
include('../../footer.php');
?>