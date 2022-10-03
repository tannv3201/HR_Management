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
        <div class="form-floating" style="width: 50%;">
            <input name="code" value="<?= $data['DepartmentCode'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">DepartmentCode</label>
        </div>
        <br>
        <div class="form-floating " style="width: 50%;">
            <input name="name" value="<?= $data['DepartmentName'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">DepartmentName</label>
        </div>
        <br>
        <br>
        <div class="form-floating " style="width: 50%;">
                <select name="status" class="form-select" aria-label="Default select example" require>
                    
                    <?php
                    $sql_s = "SELECT DISTINCT DepartmentStatus from tb_department";
                    $qr_s = mysqli_query($conn,$sql_s);
                    while($row = mysqli_fetch_assoc($qr_s))
                    {
                        ?>
                        <option value="<?= $row['DepartmentStatus']?>">
                    <?php if($row['DepartmentStatus']==1){
                            echo "Hiệu lực";
                }else {
                    echo "Không hiệu lực";
                }
                        ?></option>
                        <?php
                    }
                    ?>
                </select>
                </div>

        
        <br>
        <button name="submit" type="submit" class="btn btn-secondary">Sửa</button>
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
    `DepartmentStatus`='$status',
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

