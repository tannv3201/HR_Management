<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>


    <form action="" method="post">
        <h1 class="container" style="padding: 100px; margin-right: 10px;">Department adding</h1>
        <div class="form-floating">
            <input required name="code" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">DepartmentCode </label>
        </div>
        <br>
        <div class="form-floating ">
            <input required name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">DepartmentName</label>
        </div>
        <br>
        <br>


        <select name="status" class="form-select" aria-label="Default select example">
            <option value="1" selected>Open this select menu</option>
            <?php
            $sql = "select distinct DepartmentStatus from tb_department";
            $qr = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($qr)) {
            ?>
                <option value="<?= $row['DepartmentStatus'] ?>">
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
        <button name="submit" type="" class="btn btn-primary">Thêm</button>
    </form>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $status = $_POST['status'];
    $sql_add = "INSERT INTO `tb_department`(`Id`, `DepartmentCode`, `DepartmentName`, `DepartmentStatus`, `CreateTime`)
     VALUES ('','$code','$name','$status','now()'";
    $qr_add = mysqli_query($conn, $sql_add);
    if ($qr_add) {
        header("Location: http://localhost/HR_Management/admin/Department/index.php ");
    } 
}

?>
<?php
include('../../footer.php');
?>