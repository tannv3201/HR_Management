<?php
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
        <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4">
            <form action="" method="post">
                <div class="form-floating" style="width: 50%; margin-left:25%">
                    <input required name="code" type="text" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Mã phòng ban</label>
                </div>
                <br>
                <div class="form-floating " style="width: 50%; margin-left:25%">
                    <input required name="name" type="text" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Tên phòng ban</label>
                </div>
                <br>
                <button name="submit" type="" style="width: 15%; margin-left:25%"
                    class="btn btn-secondary">Thêm</button>
            </form>
        </div>
    </div>
</div>



<?php
if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $sql_add = "INSERT INTO `tb_department`(`Id`, `DepartmentCode`, `DepartmentName`, `DepartmentStatus`, `CreateTime`)
     VALUES ('','$code','$name',1,now())";
     $qr_add = mysqli_query($conn,$sql_add);
     if($qr_add){
        header('Location:index.php');
     }
}
?>
<?php
   include('../../footer.php');
   ?>