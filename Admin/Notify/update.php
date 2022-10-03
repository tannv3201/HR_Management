
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
    <form action="" method="post">
        <h1 class="container" style="padding: 100px; margin-right: 10px;">Notification update</h1>
        <div class="form-floating">
            <input name="name" value="<?= $data['NotifyName'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">NotifyName</label>
        </div>
        <br>
        <div class="form-floating ">
            <input name="content" value="<?= $data['NotifyContent'] ?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">NotifyContent</label>
        </div>
        <br>
        <select name="status" value="<?= $data['NotifyStatus'] ?>" class="form-select" aria-label="Default select example">

            <?php
            $sql = "select distinct NotifyStatus from tb_notify";
            $qr = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($qr)) {
            ?>
                <option value="<?= $row['NotifyStatus'] == 1  ?>">
                    <?php
                    if ($row['NotifyStatus'] == 1) {
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