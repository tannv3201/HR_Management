<?php

    include('../../ConnectDatabase/connect.php');
    include('../../header.php');
?>
 <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Notification Table</h6>
            <div class="table-responsive">
              <a href="add.php">  <button type="button" class="btn btn-info">thêm thông báo</button></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col">NotifyName</th>
                            <th scope="col">NotifyContent</th>
                            <th scope="col">CreateTime</th>
                            <th scope="col">NotifyStatus</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
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
                                <th scope="col"><a href="update.php?id=<?= $row['Id']?>"><button type="button" class="btn btn-info">update</button></a></th>
                                <th scope="col"><a href="delete.php?id=<?= $row['Id']?>"><button type="button" class="btn btn-info">delete</button></a></th>
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