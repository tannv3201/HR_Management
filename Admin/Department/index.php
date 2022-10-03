<?php
    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>


    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Department Table</h6>
            <div class="table-responsive">
                <a href="add.php"> <button type="button" class="btn btn-info">thêm thông báo</button></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col">DepartmentCode </th>
                            <th scope="col">DepartmentName</th>
                            <th scope="col">DepartmentStatus</th>
                            <th scope="col">CreateTime</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `tb_department`";
                        $qr = mysqli_query($conn, $sql);
                        while ($row  = mysqli_fetch_assoc($qr)) {
                        ?>
                            <tr>
                                <td><?= $row['Id'] ?></td>
                                <td><?= $row['DepartmentCode'] ?></td>
                                <td><?= $row['DepartmentName'] ?></td>
                                <td><?php if ($row['DepartmentStatus'] == 1) {
                                        echo "Actice";
                                    } else {
                                        echo "Disable";
                                    }
                                    ?></td>
                                <td><?= $row['CreateTime'] ?></td>
                                <th scope="col"><a href="update.php?id=<?= $row['Id'] ?>"><button type="button" class="btn btn-info">update</button></a></th>
                                <th scope="col"><a href="delete.php?id=<?= $row['Id'] ?>"><button type="button" class="btn btn-info">delete</button></a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
    include('../../footer.php');
?>