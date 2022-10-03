<?php

    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>

<div class="title" style="padding-top: 30px;padding-left: 30px;padding-right: 30px;">
    <h1>
        Quản lý thông báo
    </h1>
    <hr>
    <br>
</div>
<div class="container-fluid pt-4 px-4">
 <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
        <h3 class="mb-4">Bảng thông báo</h3>
            <div class="table-responsive" style="height: 400px;">
                <table class="table">
                    <thead>
                    <div style="display: flex;">
                            <button type="button" class="btn btn-secondary" style="margin-left: 10px;"><a href="add.php" style="color: white;">Thêm thông báo</a></button>
                        </div>
                    </thead>
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col">Tiêu đề thông báo</th>
                            <th scope="col">Nội dung thông báo</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `tb_notify`";
                        $qr = mysqli_query($conn, $sql);
                        while ($row  = mysqli_fetch_assoc($qr)) {
                        ?>
                            <tr>
                                <td><?= $row['Id'] ?></td>
                                <td><?= $row['NotifyName'] ?></td>
                                <td><?= $row['NotifyContent'] ?></td>
                                <td><?= $row['CreateTime'] ?></td>
                                <td><?php if ($row['NotifyStatus'] == 1) {
                                        echo "Actice";
                                    } else {
                                        echo "Disable";
                                    }
                                    ?></td>
                                <th scope="col"><a href="update.php?id=<?= $row['Id']?>"><button type="button" class="btn btn-secondary">update</button></a></th>
                                <th scope="col"><a href="delete.php?id=<?= $row['Id']?>"><button type="button" class="btn btn-secondary">delete</button></a></th>
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