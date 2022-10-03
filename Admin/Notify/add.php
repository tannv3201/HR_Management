
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
        <div class="bg-light rounded h-100 p-4">
        <form action="" method="post">
        <div class="form-floating" style="width: 50%;">
            <input required name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">NotifyName</label>
        </div>
        <br>
        <div class="form-floating " style="width: 50%;">
            <input required name="content" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">NotifyContent</label>
        </div>

        <br>
        <div class="form-floating " style="width: 50%;">
        <select name="status" class="form-select" aria-label="Default select example">
            <option value="1" selected>Open this select menu</option>
            <?php
            $sql = "select distinct NotifyStatus from tb_notify";
            $qr = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($qr)) {
            ?>
                <option value="<?= $row['NotifyStatus'] ?>">
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

        </div>
        <br>
        <button name="submit" type="" class="btn btn-primary">Thêm</button>
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
      VALUES ('','$name','$content',now(),'$status')";
    $qr_add = mysqli_query($conn, $sql_add);
    if ($qr_add) {
        header("Location: http://localhost/HR_Management/admin/Notify/index.php ");
    } 
}

?>
<?php
    include('../../footer.php');
?>