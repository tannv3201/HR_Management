<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Thêm phòng ban
    </h1>
    <hr>
    <br>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <form action="" method="post">
                <div class="form-floating" style="width: 50%;">
                    <input required name="code" type="code" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Mã phòng ban</label>
                </div>
                <br>
                <div class="form-floating " style="width: 50%;">
                    <input required name="name" type="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Tên phòng ban</label>
                </div>
                <br>
                <div class="form-floating " style="width: 50%;">
                <select name="status" class="form-select" aria-label="Default select example" require>
                    <option></option>
                    <option value="1">Hiệu lực</option>
                    <option value="2">Không hiệu lực</option>
                </select>
                </div>
                
                <br>
                <button name="submit" type="submit" class="btn btn-secondary">Thêm</button>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $status = $_POST['status'];
    $sql_add = "INSERT INTO `tb_department`(`DepartmentCode`, `DepartmentName`, `DepartmentStatus`, `CreateTime`)
     VALUES ('$code','$name','$status','now()'";
    $qr_add = mysqli_query($conn, $sql_add);
    if ($qr_add) {
        header("Location:index.php");
    }
}

?>
<?php
include('../../footer.php');
?>