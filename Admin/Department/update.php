<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>

<body>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_qr = "SELECT * FROM tb_department where Id = $id";
        $qr = mysqli_query($conn, $sql_qr);
        $data = mysqli_fetch_assoc($qr);
    }
    ?>
    <div class="navbar-nav w-100">
    <form action="" method="post">
        <h1 class="container" style="padding: 100px; margin-right: 10px;">Department update</h1>
        <div class="form-floating">
            <input name="code" value="<?= $data['DepartmentCode'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">DepartmentCode</label>
        </div>
        <br>
        <div class="form-floating ">
            <input name="name" value="<?= $data['DepartmentName'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">DepartmentName</label>
        </div>
        <br>
        <br>


        <select name="status" value="<?= $data['DepartmentStatus'] ?>" class="form-select" aria-label="Default select example">

            <?php
            $sql = "select distinct DepartmentStatus from tb_department";
            $qr = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($qr)) {
            ?>
                <option value="<?= $row['DepartmentStatus'] == 1?>">
                    <?php
                    if ($row['DepartmentStatus'] == 1) {
                        echo "active";
                    } else {
                        echo "disable";
                    }

                    ?></option>
            <?php
            }
            ?>

        </select>
        <br>
        <button name="submit" type="submit" class="btn btn-primary">Sửa</button>
    </form>
    </div>
</body>

</html>
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
        header("Location: http://localhost/HR_Management/admin/Department/");
    }
}

?><?php
include('../../footer.php');
?>