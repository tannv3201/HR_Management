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
        <div style="border:1px solid #ccc" class="bg-white rounded h-100 p-4">
            <h3 class="mb-4">Bảng phòng ban</h3>
            <div class="table-responsive" style="height: 400px;">
                <table class="table">
                    <thead>
                        <div style="display: flex;">
                            <button type="button" class="btn btn-secondary" style="margin-left: 10px;"><a href="add.php"
                                    style="color: white;">Thêm phòng ban</a></button>
                        </div>
                    </thead>
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">STT </th>
                            <th class="text-center" scope="col">Mã phòng ban</th>
                            <th class="text-center" scope="col">Tên phòng ban</th>
                            <th class="text-center" scope="col">Số nhân viên</th>
                            <th class="text-center" scope="col">Thời gian tạo</th>
                            <th class="text-center" scope="col">Trạng thái</th>
                            <th class="text-center" scope="col">Sửa</th>
                            <!-- <th class="text-center" scope="col">Xóa</th> -->
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
                            <td class="text-center" class='id'><?php echo ++$id ?></td>
                            <td class="text-center"><?= $row['DepartmentCode'] ?></td>
                            <td class="text-center"><?= $row['DepartmentName'] ?></td>
                            <td class="text-center">
                                <?php
                               $depCode = $row["DepartmentCode"];
                                 $sqlCount = "SELECT COUNT(tb_employee.EmployeeCode) as qltEmp FROM tb_employee, tb_department WHERE tb_employee.DepartmentCode = tb_department.DepartmentCode AND tb_department.DepartmentCode = '$depCode' GROUP BY tb_department.DepartmentCode";
                                $qrCount = mysqli_query($conn, $sqlCount);
                                $rowCount  = mysqli_fetch_assoc($qrCount);
                                 if($rowCount > 0) {
                                    echo $rowCount['qltEmp'];
                                 }
                                 else {
                                    echo '0';
                                 }
                                ?>
                            </td>
                            <td class="text-center"><?= $row['CreateTime'] ?></td>
                            <td id=<?= $id ?> style="cursor:pointer" class="status text-center"
                                name_status="<?=$row['DepartmentStatus']?>">
                                <?php if ($row['DepartmentStatus'] == 1) {
                                       ?>
                                <i class="fa-solid fa-lock-open"></i>
                                <?php
                                    } else {
                                       ?>
                                <i class="fa-solid fa-lock"></i>
                                <?php
                                    }
                                    ?>
                            </td>

                            <th class="text-center" scope="col"><a href="update.php?id=<?= $row['Id'] ?>"><button
                                        type="button" class="btn btn-secondary">Sửa</button></a>
                            </th>
                            <!-- <th class="text-center" scope="col"><a href="delete.php?id=<?= $row['Id'] ?>"><button
                                        type="button" class="btn btn-secondary">Xóa</button></a>
                            </th> -->
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

<script>
$('.fa-solid').click(function() {
    status = $(this).parent().attr('name_status')
    id = $(this).parent().attr('id')
    $.ajax({
        method: "POST",
        url: "lock.php",
        data: {
            status: status,
            id: id
        },
        // success: function(dt) {

        // }
    })
    if (status == 0) {
        $(this).parent().attr('name_status', "1")
        $(this).removeClass("fa-lock")
        $(this).addClass("fa-lock-open")
    } else {
        $(this).parent().attr('name_status', "0")
        $(this).addClass("fa-lock")
        $(this).removeClass("fa-lock-open")
    }

})
</script>