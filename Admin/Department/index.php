<?php
include('../../ConnectDatabase/connect.php');
include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Quản lý phòng ban
    </h1>
    <hr>
    <br>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Bảng phòng ban</h3>
            <div class="table-responsive" style="height: 400px;">
                <table class="table">
                    <thead>
                        <div style="display: flex;">
                            <button type="button" class="btn btn-secondary" style="margin-left: 10px;"><a href="add.php" style="color: white;">Thêm phòng ban</a></button>
                        </div>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">STT </th>
                            <th scope="col">Mã phòng ban</th>
                            <th scope="col">Tên phòng ban</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `tb_department`";
                        $qr = mysqli_query($conn, $sql);
                        $id = 0;
                        while ($row  = mysqli_fetch_assoc($qr)) {
                        ?>
                            <tr>
                                <td><?php echo ++$id ?></td>
                                <td><?= $row['DepartmentCode'] ?></td>
                                <td><?= $row['DepartmentName'] ?></td>
                                <td><?php if ($row['DepartmentStatus'] == 1) {
                                        echo "Actice";
                                    } else {
                                        echo "Disable";
                                    }
                                    ?></td>
                                <td><?= $row['CreateTime'] ?></td>
                                <th scope="col"><a href="update.php?id=<?= $row['Id'] ?>"><button type="button" class="btn btn-secondary">Sửa</button></a></th>
                                <th scope="col"><a href="delete.php?id=<?= $row['Id'] ?>"><button type="button" class="btn btn-secondary">Xóa</button></a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include('../../footer.php');
?>